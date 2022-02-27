<?php

namespace App\Models;

use App\Traits\InitialSearch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PBuildingSearch extends Model
{
    use InitialSearch {
        InitialSearch::__construct as initialConstructor;
    }

    public $parent_category = null;
    public $initial = null;
    private $requests = [];
    private $category_list = [];

    public $subcategories;
    public $resins;
    public $bases;
    public $pack_types;
    public $materials;
    public $jis_numbers;
    public $usages;
    public $purposes;

    public $conditions = [];
    private $use_count = [];

    public function __construct($requests = [], $searcher = [])
    {
        parent::__construct();
        $this->initialConstructor();

        $this->requests = collect($requests);

        if(isset($searcher['parent_category'])){
            $this->parent_category = PBuildingSubcategory::query()
                ->where('slug', $searcher['parent_category'])->first();
        }
        if(isset($searcher['initial']) && self::$initial_start_regexp->search($searcher['initial'])){
            $this->initial = $searcher['initial'];
        }

        $this->setCategorySearchList();

        $this->subcategories = PBuildingSubcategory::query()->where('parent_id', $this->parent_category->id ?? null)->get();
        $this->resins = PBuildingResin::all();
        $this->bases = PBuildingBase::all();
        $this->pack_types = PBuildingPackType::all();
        $this->materials = PBuildingMaterial::all();
        $this->jis_numbers = PBuildingJisNumber::all();
        $this->usages = PBuilding::getPBuildingUse();
        $this->purposes = PBuildingPurpose::all();

        $this->countBt('base');
        $this->countBt('pack_type');
        $this->countBtm('resin');
        $this->countBtm('material');
        $this->countBtm('jis_number');
        $this->countBtm('purpose');
        $this->countSubcategory();
        $this->countUse();

        $this->setConditions();
        $this->setCheck('child_category');
        $this->setCheck('subcategory');
        $this->setCheck('base');
        $this->setCheck('pack_type');
        $this->setCheck('resin');
        $this->setCheck('material');
        $this->setCheck('jis_number');
        $this->setCheck('purpose');
    }

    public function setCategorySearchList()
    {
        if($this->parent_category){
            $this->category_list = PBuildingSubcategory::getCategoryIdListByParentIdList([$this->parent_category->id]);
        }elseif($this->requests->has('subcategory')){
            $this->category_list = PBuildingSubcategory::getCategoryIdListByParentIdList($this->requests->get('subcategory'));
        }
    }

    public function getQuery()
    {
        $query = self::getQueryToPublic();
        if($this->initial){
            $query->searchInitial('product_name_kana', $this->initial);
        }else{
            $query->category($this->requests->get('child_category') ?? $this->category_list)
                ->searchFront($this->requests->toArray());
        }
        return $query;
    }

    public function getProductsPerPage()
    {
        return $this->getQuery()->paginate($this->requests->get('limit') ?? 10)
            ->appends($this->requests->except('page')->toArray());
    }

    private static function getQueryToPublic()
    {
        return PBuilding::query()
            ->published('p_buildings.status');
    }

    public function totalCount()
    {
        return $this->getQuery()->count();
    }

    /*
     * カテゴリごとの製品登録数をカウントしてメンバ変数にセットする
     */
    private function countSubcategory()
    {
        if($this->parent_category){
            $query = self::getQueryToPublic()
                ->select(DB::raw("p_buildings.p_building_subcategory_id as id, count(*) as count"))
                ->join('p_building_subcategories', 'p_buildings.p_building_subcategory_id', 'p_building_subcategories.id')
                ->groupBy('id');
        }else{
            $query = self::getQueryToPublic()
                ->select(DB::raw("ifnull(parent_categories.id, p_buildings.p_building_subcategory_id) as id, count(*) as count"))
                ->join('p_building_subcategories', 'p_buildings.p_building_subcategory_id', 'p_building_subcategories.id')
                ->leftJoin('p_building_subcategories as parent_categories', 'p_building_subcategories.parent_id', 'parent_categories.id')
                ->groupBy('id');
        }
        $this->setDisableClass($query->get(), 'subcategories');
    }

    /*
     * belongsToManyリレーションのアイテムをカウント
     */
    private function countBtm($relation)
    {
        $query = DB::table("p_building_p_building_{$relation}")
            ->join('p_buildings', "p_building_p_building_{$relation}.p_building_id", 'p_buildings.id')
            ->select(DB::raw("p_building_p_building_{$relation}.p_building_{$relation}_id as id, count(*) as count"))
            ->where('p_buildings.status', PBuilding::TO_PUBLIC)
            ->groupBy("p_building_p_building_{$relation}.p_building_{$relation}_id");

        if($this->parent_category){
            $query->whereIn('p_buildings.p_building_subcategory_id', $this->category_list);
        }

        $this->setDisableClass($query->get(), Str::plural($relation));
    }

    /*
     * belongsToのアイテムをカウント
     */
    private function countBt($relation)
    {
        $query = self::getQueryToPublic()
            ->select(DB::raw("{$relation}_id as id, count(*) as count"))
            ->groupBy("{$relation}_id")
            ->where("{$relation}_id", '!=', null);

        if($this->parent_category){
            $query->whereIn('p_buildings.p_building_subcategory_id', $this->category_list);
        }
        $this->setDisableClass($query->get(), Str::plural($relation));
    }

    private function countUse()
    {
        foreach (PBuilding::USE_FIELD as $key => $field){
            $query = self::getQueryToPublic()
                ->select(DB::raw("count(*) as count"))
                ->where($field, '<=', PBuilding::USABLE);
            if($this->parent_category){
                $query->whereIn('p_buildings.p_building_subcategory_id', $this->category_list);
            }
            $this->use_count[$key] = $query->first()->count;
        }
    }

    public function isUseDisable($key)
    {
        return $this->use_count[$key] > 0 ? '' : 'is-disable';
    }

    public function isUseChecked($key)
    {
        if($this->requests->has('usage') && in_array($key, $this->requests->get('usage')) && $this->use_count[$key] > 0){
            return 'checked';
        }
    }

    private function setDisableClass($counts, $relation)
    {
        $this->{$relation}->map(function ($item) use ($counts) {
            $count = $counts->firstWhere('id', $item->id)->count ?? 0;
            $item->is_disable = $count > 0 ? '' : 'is-disable';
            return $item;
        });
    }

    /*
     * チェックボックスを選択済みにする
     */
    private function setCheck($name)
    {
        if(is_array($this->requests->get($name))){
            $param = $this->requests->get($name);
            if($name == 'child_category'){
                $name = 'subcategory';
            }
            $relation = Str::plural($name);
            $new_relation = $this->{$relation}->map(function ($item) use ($param) {
                $item['is_checked'] = (in_array($item['id'], $param) && !$item->is_disable) ? 'checked' : '';
                return $item;
            });
            $this->{$relation} = $new_relation;
        }
    }

    /*
     * 現在の検索条件を文字列で表示
     */
    public function setConditions()
    {
        if($this->requests->has('child_category') && is_array($this->requests->get('child_category'))){
            $condition = $this->subcategories->filter(function ($item){
                return in_array($item->id, $this->requests->get('child_category'));
            })->implode('category_name', '、');
            $this->conditions[] = ['label' => $this->parent_category->category_name ?? '系統', 'condition' => $condition];
        }
        if($this->requests->has('resin') && is_array($this->requests->get('resin'))){
            $condition = $this->getConditionsStr('resin');
            $this->conditions[] = ['label' => '樹脂', 'condition' => $condition];
        }

        if($this->requests->has('base') && is_array($this->requests->get('base'))){
            $condition = $this->getConditionsStr('base');
            $this->conditions[] = ['label' => '水性/溶剤', 'condition' => $condition];
        }

        if($this->requests->has('pack_type') && is_array($this->requests->get('pack_type'))){
            $condition = $this->getConditionsStr('pack_type');
            $this->conditions[] = ['label' => '1液/2液', 'condition' => $condition];
        }

        if($this->requests->has('material') && is_array($this->requests->get('material'))){
            $condition = $this->getConditionsStr('material');
            $this->conditions[] = ['label' => '素材', 'condition' => $condition];
        }

        if($this->requests->has('jis_number') && is_array($this->requests->get('jis_number'))){
            $condition = $this->getConditionsStr('jis_number');
            $this->conditions[] = ['label' => 'JIS', 'condition' => $condition];
        }

        if($this->requests->has('usage') && is_array($this->requests->get('usage'))){
            $condition = $this->usages->filter(function ($item, $key) {
                return in_array($key, $this->requests->get('usage'));
            })->implode('、');
            $this->conditions[] = ['label' => '用途', 'condition' => $condition];
        }

        if($this->requests->has('purpose') && is_array($this->requests->get('purpose'))){
            $condition = $this->getConditionsStr('purpose');
            $this->conditions[] = ['label' => '機能', 'condition' => $condition];
        }
    }

    private function getConditionsStr($name)
    {
        $relation = Str::plural($name);
        return $this->{$relation}->filter(function ($item) use ($name) {
            return in_array($item->id, $this->requests[$name]);
        })->implode('name', '、');
    }

    public function getInitialsCountLong()
    {
        $initialsCount = PBuilding::query()
            ->queryInitialCounts()
            ->getLongInitialCounts();

        return $initialsCount;
    }
}
