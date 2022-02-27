<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\InitialSearch;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductSearch extends Model
{
    //searchType
    const ST_KEYWORDS = 1;
    const ST_INITIAL = 2;
    //searchTypeList
    const ST_LIST = [
        self::ST_KEYWORDS,
        self::ST_INITIAL
    ];

    //category_keys
    const F_BUILDING_ID = 1;
    const F_LARGE_ID = 2;
    const F_LARGE_SPEC_BRIDGE_ID = 3;
    const F_LARGE_SPEC_STEEL_ID = 4;
    const F_AUTOMOTIVE_ID = 5;

    const F_CATEGORY_NAME_LIST = [
        self::F_BUILDING_ID => '建築用塗料',
        self::F_LARGE_ID => '重防食用塗料',
        self::F_LARGE_SPEC_BRIDGE_ID => '重防食用塗料仕様/橋梁・コンクリート',
        self::F_LARGE_SPEC_STEEL_ID => '重防食用塗料仕様/プラント・鉄塔・鋼構造物',
        self::F_AUTOMOTIVE_ID => '自動車補修用塗料'
    ];

    const F_DETAIL_PAGE_NAME = [
        self::F_BUILDING_ID => 'front.pBuilding.detail',
        self::F_LARGE_ID => 'front.pLarge.detail',
        self::F_LARGE_SPEC_BRIDGE_ID => 'front.pLargeSpecBridge.detail',
        self::F_LARGE_SPEC_STEEL_ID => 'front.pLargeSpecSteel.detail',
        self::F_AUTOMOTIVE_ID => 'front.pAutomotive.detail'
    ];
    const F_DETAIL_PAGE_ARGUMENT = [
        self::F_BUILDING_ID => 'p_building',
        self::F_LARGE_ID => 'p_large',
        self::F_LARGE_SPEC_BRIDGE_ID => 'spec_bridge',
        self::F_LARGE_SPEC_STEEL_ID => 'spec_steel',
        self::F_AUTOMOTIVE_ID => 'p_automotive'
    ];

    const F_ALL_KEY = 'all';
    const F_LARGE_SPEC_KEY = 'large_spec';
    const F_FORM_SELECT_OPTIONS = [
        self::F_ALL_KEY => 'すべて',
        self::F_BUILDING_ID => '建築用塗料',
        self::F_LARGE_ID => '重防食用塗料（製品）',
        self::F_LARGE_SPEC_KEY => '重防食用塗料（仕様）',
        self::F_AUTOMOTIVE_ID => '自動車補修用塗料'
    ];

    use InitialSearch {
        InitialSearch::__construct as initialConstructor;
    }

    public $searchType = 10;

    public $limit = 10;
    public $page = 1;
    public $type = 'all';  //keywords用
    public $keywordsRaw = '';
    public $displayKeywords = '';
    public $regexpPattern = ''; //keywords用
    public $initial = '';

    public $pBuildings = [];
    public $pLarges = [];
    public $pAutomotives = [];
    public $pLargeSpecBridges = [];
    public $pLargeSpecSteels = [];

    /*
     * $baseData, $sliceBaseData
     * id, updated_at, type:category_key
     */
    public $baseData = null;
    public $sliceBaseData = null;


    /*
     * $detailData
     * 肉付けデータ
     * {
     *      category_key: [
     *          record_id: {Object},
     *          ....
     */
    public $detailData = [];
    public $pager = null;

    public function __construct()
    {
        parent::__construct();
        $this->initialConstructor();
    }

    public function search($searchType, $requests = [], $searcher = [])
    {
        $this->searchType = $searchType;

        if (array_search($this->searchType, self::ST_LIST) === false) {
            throw new \Exception('notFound or illegality: $this->>searchType');
        }

        self::createParameters($requests, $searcher);
        self::searchDB();

        if(self::createBaseData() === false) {
            return; //検索結果が0件の場合早期return
        }
        // 表示範囲のbaseデータを作成
        $this->sliceBaseData = $this->baseData->forPage($this->page, $this->limit);
        self::createPager();
        self::createDetailData();
    }

    private function createParameters($requests, $searcher)
    {
        if (!empty($requests['page'])) {
            $this->page = (int)$requests['page'];
        }
        if (!empty($requests['limit'])) {
            $this->limit = $requests['limit'];
        }

        //keywords
        if ($this->searchType === self::ST_KEYWORDS) {
            if (!empty($requests['type'])) {
                $this->type = (string)$requests['type'];
            }
            if (!empty($requests['keywords'])) {
                $this->keywordsRaw = str_replace('　', ' ', $requests['keywords']);
                $keywords = explode(" ", $this->keywordsRaw);
                $this->displayKeywords = implode(', ', $keywords);
                foreach($keywords as $word) {
                    $this->regexpPattern .= "(?=.*" . $word . ")";
                }
            }
        }

        //initial
        if ($this->searchType === self::ST_INITIAL) {
            if(isset($searcher['initial']) && self::$initial_start_regexp->search($searcher['initial'])){
                $this->initial = $searcher['initial'];
            }
        }
    }

    private function searchDB()
    {
        //keywords
        if ($this->searchType === self::ST_KEYWORDS) {
            self::searchKeywordsPBuildings();
            self::searchKeywordsPLarges();
            self::searchKeywordsPAutomotives();
            self::searchKeywordsPLargeSpecBridges();
            self::searchKeywordsPLargeSpecSteels();
        }
        //initial
        if ($this->searchType === self::ST_INITIAL) {
            self::searchInitialPBuildings();
            self::searchInitialPLarges();
            self::searchInitialPAutomotives();
        }
    }

    private function searchKeywordsPBuildings()
    {
        if (!($this->type == self::F_ALL_KEY || $this->type == self::F_BUILDING_ID)) {
            return;
        }
        $this->pBuildings = PBuilding::query()
            ->selectRaw('id, updated_at, ? AS type', [self::F_BUILDING_ID])
            ->published()
            ->whereRaw('CONCAT(
                IFNULL(product_name, ""),
                IFNULL(description, ""),
                IFNULL(standard, "")
                ) REGEXP ?', //検索軸のフィールドを文字列結合し一気に検索をかけて、クエリ処理の速度を稼ぐ作戦
                [$this->regexpPattern])
            ->get();
    }

    private function searchKeywordsPLarges() {
        if (!($this->type == self::F_ALL_KEY || $this->type == self::F_LARGE_ID)) {
            return;
        }
        $this->pLarges = PLarge::query()
            ->selectRaw('id, updated_at, ? AS type', [self::F_LARGE_ID])
            ->published()
            ->whereRaw('CONCAT(
                IFNULL(product_name, ""),
                IFNULL(description, ""),
                IFNULL(general_name, ""),
                IFNULL(general_standard_number, "")
                ) REGEXP ?',
                [$this->regexpPattern])
            ->get();
    }

    private function searchKeywordsPAutomotives()
    {
        if (!($this->type == self::F_ALL_KEY || $this->type == self::F_AUTOMOTIVE_ID)) {
            return;
        }
        $this->pAutomotives = PAutomotive::query()
            ->selectRaw('id, updated_at, ? AS type', [self::F_AUTOMOTIVE_ID])
            ->published()
            ->whereRaw('CONCAT(
                IFNULL(product_name, ""),
                IFNULL(description, "")
                ) REGEXP ?',
                [$this->regexpPattern])
            ->get();
    }

    private function searchKeywordsPLargeSpecBridges()
    {
        if (!($this->type == self::F_ALL_KEY || $this->type == self::F_LARGE_SPEC_KEY)) {
            return;
        }
        $this->pLargeSpecBridges = PLargeSpecBridge::query()
            ->selectRaw('id, updated_at, ? AS type', [self::F_LARGE_SPEC_BRIDGE_ID])
            ->published()
            ->whereRaw('CONCAT(
                IFNULL(name, ""),
                IFNULL(spec_number, "")
                ) REGEXP ?',
                [$this->regexpPattern])
            ->get();
    }

    private function searchKeywordsPLargeSpecSteels()
    {
        if (!($this->type == self::F_ALL_KEY || $this->type == self::F_LARGE_SPEC_KEY)) {
            return;
        }
        $this->pLargeSpecSteels = PLargeSpecSteel::query()
            ->selectRaw('id, updated_at, ? AS type', [self::F_LARGE_SPEC_STEEL_ID])
            ->published()
            ->whereRaw('CONCAT(
                IFNULL(name, ""),
                IFNULL(spec_number, "")
                ) REGEXP ?',
                [$this->regexpPattern])
            ->get();
    }

    private function searchInitialPBuildings()
    {

        $this->pBuildings = PBuilding::query()
            ->selectRaw('id, updated_at, ? AS type', [self::F_BUILDING_ID])
            ->published()
            ->searchInitial('product_name_kana', $this->initial)
            ->get();
    }

    private function searchInitialPLarges()
    {
        $this->pLarges = PLarge::query()
            ->selectRaw('id, updated_at, ? AS type', [self::F_LARGE_ID])
            ->published()
            ->searchInitial('product_name_kana', $this->initial)
            ->get();
    }

    private function searchInitialPAutomotives()
    {
        $this->pAutomotives = PAutomotive::query()
            ->selectRaw('id, updated_at, ? AS type', [self::F_AUTOMOTIVE_ID])
            ->published()
            ->searchInitial('product_name_kana', $this->initial)
            ->get();
    }

    /*
     * create $baseData
     * 複数テーブルの検索結果を一つのリストにまとめる
     * メモリ対策のため、ID、元テーブル判別子、レコード更新日時のみをもつ
     */
    private function createBaseData()
    {
        $this->baseData = collect([]);
        $this->baseData = $this->baseData->merge($this->pBuildings);
        $this->baseData = $this->baseData->merge($this->pLarges);
        $this->baseData = $this->baseData->merge($this->pAutomotives);
        $this->baseData = $this->baseData->merge($this->pLargeSpecBridges);
        $this->baseData = $this->baseData->merge($this->pLargeSpecSteels);

        if ($this->baseData->isEmpty()) {
            return false;
        }

        $this->baseData = $this->baseData->sortByDesc('updated_at');
    }

    /*
     * create $pager
     */
    private function createPager()
    {
        $query = [
            'limit' => $this->limit,
        ];
        //keywords
        if ($this->searchType === self::ST_KEYWORDS) {
            $query['type'] = $this->type;
            $query['keywords'] = $this->keywordsRaw;
            $path = route('front.products.search');
        }

        //initial
        if ($this->searchType === self::ST_INITIAL) {
            $path = url('products/initial/' . $this->initial . '/');
        }

        $this->pager = new LengthAwarePaginator(
            $this->sliceBaseData,
            $this->baseData->count(),
            $this->limit,
            $this->page,
            [
                'path' => $path,
                'query' => $query
            ]
        );
    }
    /*
     * create $detailData
     * $pagerを元に表示用肉付けデータを抽出
     */
    private function createDetailData()
    {
        $TypedData = $this->sliceBaseData->groupBy('type');
        foreach ($TypedData as $type => $ids) {
            if ($type === self::F_BUILDING_ID) {
                $this->detailData[self::F_BUILDING_ID] = PBuilding::query()
                    ->whereIn('id', $ids->pluck('id'))
                    ->get()
                    ->keyBy('id');
            }
            if ($type === self::F_LARGE_ID) {
                $this->detailData[self::F_LARGE_ID] = PLarge::query()
                    ->whereIn('id', $ids->pluck('id'))
                    ->get()
                    ->keyBy('id');
            }
            if ($type === self::F_LARGE_SPEC_BRIDGE_ID) {
                $this->detailData[self::F_LARGE_SPEC_BRIDGE_ID] = PLargeSpecBridge::query()
                    ->whereIn('id', $ids->pluck('id'))
                    ->get()
                    ->keyBy('id');
            }
            if ($type === self::F_LARGE_SPEC_STEEL_ID) {
                $this->detailData[self::F_LARGE_SPEC_STEEL_ID] = PLargeSpecSteel::query()
                    ->whereIn('id', $ids->pluck('id'))
                    ->get()
                    ->keyBy('id');
            }
            if ($type === self::F_AUTOMOTIVE_ID) {
                $this->detailData[self::F_AUTOMOTIVE_ID] = PAutomotive::query()
                    ->whereIn('id', $ids->pluck('id'))
                    ->get()
                    ->keyBy('id');
            }
        }
    }

    public function getDetailData($base)
    {
        return $this->detailData[$base['type']][$base['id']];
    }

    public function getCategoryName($base)
    {
        return self::F_CATEGORY_NAME_LIST[$base['type']];
    }

    public function getDetailPageUrl($base)
    {
        return route(self::F_DETAIL_PAGE_NAME[$base['type']], [self::F_DETAIL_PAGE_ARGUMENT[$base['type']] => $base['id']]);
    }

    public function getInitialsCountLong()
    {
        $initialsCount = [];
        $buildingsInitialsCount = PBuilding::query()
            ->queryInitialCounts()
            ->getLongInitialCounts();
        $largesInitialsCount= PLarge::query()
            ->queryInitialCounts()
            ->getLongInitialCounts();
        $automotivesInitialsCount = PAutomotive::query()
            ->queryInitialCounts()
            ->getLongInitialCounts();

        //合算
        foreach (self::$initial_key_long as $initial) {
            $initialsCount[$initial] =
                $buildingsInitialsCount[$initial]
                + $largesInitialsCount[$initial]
                + $automotivesInitialsCount[$initial];
        }
        return $initialsCount;
    }
}
