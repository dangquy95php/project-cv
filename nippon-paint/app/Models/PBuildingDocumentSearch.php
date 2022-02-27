<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Traits\KanaSearch;

class PBuildingDocumentSearch extends Model
{
    use KanaSearch {
        KanaSearch::__construct as kanaConstructor;
    }

    private $requests = [];
    private $category_list = [];

    public $initial;

    public $subcategories;

    public $conditions = [];

    public function __construct($requests = [], $searcher = [])
    {
        parent::__construct();

        $this->kanaConstructor();
        $this->requests = collect($requests);

        if(isset($searcher['initial']) && self::$kana->search($searcher['initial'])){
            $this->initial = $searcher['initial'];
        }
        $this->setCategorySearchList();
        $this->subcategories = PBuildingSubcategory::query()->where('parent_id', null)->get();
        $this->countSubcategory();
        $this->setConditions();
        $this->setCheck();
    }

    public function setCategorySearchList()
    {
        if($this->requests->has('q')){
            $this->category_list = PBuildingSubcategory::getCategoryIdListByParentIdList($this->requests->get('q'));
        }
    }

    public function getSubcategory()
    {
        $query = PBuildingSubcategory::query()->where('parent_id', null);
        if($this->requests->has('q')){
            $query->whereIn('id', $this->requests->get('q'));
        }
        return $query->get();
    }

    public function getDocsByInitial()
    {
        $query = self::getQueryToPublic()
            ->join('document_p_building', 'document_p_building.p_building_id', 'p_buildings.id')
            ->join('documents', 'document_p_building.document_id', 'documents.id')
            ->published('documents.status')
            ->whereIn('documents.document_category_id', DocumentCategory::CATALOG_CATEGORIES)
            ->searchKana('documents.document_name_kana', $this->initial)
            ->orderBy('documents.document_name_kana');

        return $query->get();
    }

    public function getCount()
    {
        $query = self::getQueryToPublic()
            ->select(DB::raw("count(*) as count"))
            ->join('document_p_building', 'document_p_building.p_building_id', 'p_buildings.id')
            ->join('documents', 'document_p_building.document_id', 'documents.id')
            ->published('documents.status')
            ->whereIn('documents.document_category_id', DocumentCategory::CATALOG_CATEGORIES);

        if($this->requests->has('q')){
            $category = implode(',', $this->requests->get('q'));
            $query->join('p_building_subcategories', 'p_buildings.p_building_subcategory_id', 'p_building_subcategories.id')
                ->leftJoin('p_building_subcategories as parent_categories', 'p_building_subcategories.parent_id', 'parent_categories.id')
                ->whereRaw("ifnull(parent_categories.id, p_buildings.p_building_subcategory_id) in ({$category})");
        }

        return $query->first()->count;
    }

    public function hasDocsInCategory($category)
    {
        return $this->subcategories->firstWhere('id', $category->id)->count > 0;
    }

    /*
     * カテゴリごとの製品登録数をカウントしてメンバ変数にセットする
     */
    private function countSubcategory()
    {
        $counts = self::getQueryToPublic()
            ->select(DB::raw("ifnull(parent_categories.id, p_buildings.p_building_subcategory_id) as id, count(*) as count"))
            ->join('p_building_subcategories', 'p_buildings.p_building_subcategory_id', 'p_building_subcategories.id')
            ->leftJoin('p_building_subcategories as parent_categories', 'p_building_subcategories.parent_id', 'parent_categories.id')
            ->join('document_p_building', 'document_p_building.p_building_id', 'p_buildings.id')
            ->join('documents', 'document_p_building.document_id', 'documents.id')
            ->published('documents.status')
            ->whereIn('documents.document_category_id', DocumentCategory::CATALOG_CATEGORIES)
            ->groupBy('id')
            ->get();

        $this->setDisableClass($counts, 'subcategories');
    }

    public function countKana($kana)
    {
        return self::getQueryToPublic()
            ->select(DB::raw("count(*) as count"))
            ->join('p_building_subcategories', 'p_buildings.p_building_subcategory_id', 'p_building_subcategories.id')
            ->leftJoin('p_building_subcategories as parent_categories', 'p_building_subcategories.parent_id', 'parent_categories.id')
            ->join('document_p_building', 'document_p_building.p_building_id', 'p_buildings.id')
            ->join('documents', 'document_p_building.document_id', 'documents.id')
            ->published('documents.status')
            ->whereIn('documents.document_category_id', DocumentCategory::CATALOG_CATEGORIES)
            ->searchKana('documents.document_name_kana', $kana)
            ->first()->count;
    }

    private function setDisableClass($counts, $relation)
    {
        $this->{$relation}->map(function ($item) use ($counts) {
            $count = $counts->firstWhere('id', $item->id)->count ?? 0;
            $item->count = $count;
            $item->is_disable = $count > 0 ? '' : 'is-disable';
            return $item;
        });
    }

    /*
     * チェックボックスを選択済みにする
     */
    private function setCheck()
    {
        if($this->requests->has('q')){
            $this->subcategories->map(function ($item) {
                if(in_array($item['id'], $this->requests->get('q')) && !$item->is_disable){
                    $item['is_checked'] = 'checked';
                }else{
                    $item['is_checked'] = '';
                }
                return $item;
            });
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
    }

    private static function getQueryToPublic()
    {
        return PBuilding::query()
            ->published('p_buildings.status');
    }
}
