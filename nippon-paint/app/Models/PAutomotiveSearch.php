<?php

namespace App\Models;

use App\Traits\KanaSearch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PAutomotiveSearch extends Model
{
    use KanaSearch {
        KanaSearch::__construct as KanaConstructor;
    }

    public $parent_category = null;
    public $initial = null;
    public $requests = [];
    private $category_list = [];

    public $subcategories;
    public $hardener_ratios;
    public $bases;
    public $characteristics;

    public $conditions = [];

    public function __construct(array $requests = [], $searcher = [])
    {
        parent::__construct();
        $this->KanaConstructor();
        $this->requests = collect($requests);

        if(isset($searcher['parent_category'])){
            $this->parent_category = PAutomotiveSubcategory::query()
                ->where('slug', $searcher['parent_category'])->first();
        }

        if(isset($searcher['initial']) && self::$kana_start_regexp->search($searcher['initial'])){
            $this->initial = $searcher['initial'];
        }

        $this->setCategorySearchList();

        $this->subcategories = PAutomotiveSubcategory::query()->where('parent_id', $this->parent_category->id ?? null)->get();
        $this->hardener_ratios = PAutomotiveHardenerRatio::all();
        $this->bases = PAutomotiveBase::all();
        $this->characteristics = PAutomotiveCharacteristic::all();

        $this->countSubcategory();
        $this->countBase();
        $this->countRatio();
        $this->countCharacteristic();

        $this->setConditions();

        $this->setCheck('child_category');
        $this->setCheck('subcategory');
        $this->setCheck('base');
        $this->setCheck('hardener_ratio');
        $this->setCheck('characteristic');
    }

    public function setCategorySearchList()
    {
        if($this->parent_category){
            $this->category_list = PAutomotiveSubcategory::getCategoryIdListByParentIdList([$this->parent_category->id]);
        }elseif($this->requests->has('subcategory')){
            $this->category_list = PAutomotiveSubcategory::getCategoryIdListByParentIdList($this->requests->get('subcategory'));
        }
    }

    private static function getQueryToPublic()
    {
        return PAutomotive::query()
            ->published('p_automotives.status');
    }

    public function getQuery()
    {
        $query =  self::getQueryToPublic();

        if($this->initial){
            $query->searchKana('product_name_kana', $this->initial);
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
                ->select(DB::raw("p_automotives.p_automotive_subcategory_id as id, count(*) as count"))
                ->join('p_automotive_subcategories', 'p_automotives.p_automotive_subcategory_id', 'p_automotive_subcategories.id')
                ->groupBy('id');
        }else{
            $query = self::getQueryToPublic()
                ->select(DB::raw("ifnull(parent_categories.id, p_automotives.p_automotive_subcategory_id) as id, count(*) as count"))
                ->join('p_automotive_subcategories', 'p_automotives.p_automotive_subcategory_id', 'p_automotive_subcategories.id')
                ->leftJoin('p_automotive_subcategories as parent_categories', 'p_automotive_subcategories.parent_id', 'parent_categories.id')
                ->groupBy('id');
        }
        $this->setDisableClass($query->get(), 'subcategories');
    }

    /*
     * belongsToManyリレーションのアイテムをカウント
     */
    private function countCharacteristic()
    {
        $query = DB::table("p_automotive_p_automotive_characteristic")
            ->join('p_automotives', "p_automotive_p_automotive_characteristic.p_automotive_id", 'p_automotives.id')
            ->select(DB::raw("p_automotive_p_automotive_characteristic.p_automotive_characteristic_id as id, count(*) as count"))
            ->where('p_automotives.status', PBuilding::TO_PUBLIC)
            ->groupBy("p_automotive_p_automotive_characteristic.p_automotive_characteristic_id");

        if($this->parent_category){
            $query->whereIn('p_automotives.p_automotive_subcategory_id', $this->category_list);
        }

        $this->setDisableClass($query->get(), 'characteristics');
    }

    /*
     * belongsToのアイテムをカウント
     */
    private function countBase()
    {
        $query = self::getQueryToPublic()
            ->select(DB::raw("base_id as id, count(*) as count"))
            ->groupBy("base_id")
            ->where("base_id", '!=', null);

        if($this->parent_category){
            $query->whereIn('p_automotives.p_automotive_subcategory_id', $this->category_list);
        }
        $this->setDisableClass($query->get(), 'bases');
    }

    /*
     * belongsToのアイテムをカウント
     */
    private function countRatio()
    {
        $query = self::getQueryToPublic()
            ->select(DB::raw("hardener_ratio as id, count(*) as count"))
            ->groupBy("hardener_ratio")
            ->where("hardener_ratio", '!=', null);

        if($this->parent_category){
            $query->whereIn('p_automotives.p_automotive_subcategory_id', $this->category_list);
        }
        $this->setDisableClass($query->get(), 'hardener_ratios');
    }

    /*
     * 検索を無効にするクラスをセット
     */
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
        if($this->requests->has('subcategory') && is_array($this->requests->get('subcategory'))){
            $condition = $this->subcategories->filter(function ($item){
                return in_array($item->id, $this->requests->get('subcategory'));
            })->implode('category_name', '、');
            $this->conditions[] = ['label' => 'カテゴリー', 'condition' => $condition];
        }
        if($this->requests->has('child_category') && is_array($this->requests->get('child_category'))){
            $condition = $this->subcategories->filter(function ($item){
                return in_array($item->id, $this->requests->get('child_category'));
            })->implode('category_name', '、');
            $this->conditions[] = ['label' => $this->parent_category->category_name ?? '系統', 'condition' => $condition];
        }
        if($this->requests->has('base') && is_array($this->requests->get('base'))){
            $condition = $this->getConditionsStr('base');
            $this->conditions[] = ['label' => '1液/2液', 'condition' => $condition];
        }
        if($this->requests->has('hardener_ratio') && is_array($this->requests->get('hardener_ratio'))){
            $condition = $this->getConditionsStr('hardener_ratio');
            $this->conditions[] = ['label' => '硬化剤比率', 'condition' => $condition];
        }
        if($this->requests->has('characteristic') && is_array($this->requests->get('characteristic'))){
            $condition = $this->getConditionsStr('characteristic');
            $this->conditions[] = ['label' => '特徴', 'condition' => $condition];
        }
    }

    private function getConditionsStr($name)
    {
        $relation = Str::plural($name);
        return $this->{$relation}->filter(function ($item) use ($name) {
            return in_array($item->id, $this->requests[$name]);
        })->implode('name', '、');
    }

    public function getKanaCount()
    {
        $kanaCount = PAutomotive::query()
            ->queryKanaCounts()
            ->getKanaCounts();

        return $kanaCount;
    }
}
