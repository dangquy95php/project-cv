<?php

namespace App\Models;

use App\Traits\InitialSearch;
use App\Traits\KanaSearch;
use App\Traits\S3Handler;
use Kyslik\ColumnSortable\Sortable;

class PBuilding extends Product
{
    use KanaSearch{
        KanaSearch::__construct as kanaConstructor;
    }
    use InitialSearch{
        InitialSearch::__construct as InitialConstructor;
    }

    use Sortable;
    public $sortable = ['id', 'updated_at', 'status'];

    private $p_buildings = null;
    private $p_larges = null;

    protected $guarded = [
        'created_at',
        'updated_at',
        'documents',
        'materials',
        'resins',
        'jis_numbers',
        'purposes',
        'sealers',
        'middle_coats',
        'topcoats',
        'finish_samples',
        'packings',
        'painting_methods_suitable',
        'painting_methods_usable',
        'painting_methods_na',
        'additional_related_pages'
    ];

    public static $thumbnail_path = 'product/building/thumbnail';

    const RELATED_INFO_FIRESAFE = 1;
    const RELATED_INFO_FORM = 2;
    const RELATED_INFO_STANDARD = 3;
    const RELATED_INFO_LIST = [
        self::RELATED_INFO_FIRESAFE => '防火材料等証明書',
        self::RELATED_INFO_FORM => 'ホルムアルデヒド放散等級登録商品',
        self::RELATED_INFO_STANDARD => '公共建築工事標準仕様書ダウンロード',
    ];
    const RELATED_INFO_URL = [
        self::RELATED_INFO_FIRESAFE => 'products/building/fire-protecting-material/',
        self::RELATED_INFO_FORM => 'products/building/formaldehyde-emission/',
        self::RELATED_INFO_STANDARD => 'products/building/public-building-specifications/',
    ];

    const BEST = 1;
    const SUITABLE = 2;
    const USABLE = 3;
    const NOT_AVAILABLE = 4;
    const NO_VALUE = 5;
    const SUITABILITY = [
        self::BEST => '◎',
        self::SUITABLE => '◯',
        self::USABLE => '△',
        self::NOT_AVAILABLE => '×',
    ];
    const SUITABILITY_MARK = [
        self::BEST => 'dbround',
        self::SUITABLE => 'round',
        self::USABLE => 'triangle',
        self::NOT_AVAILABLE => 'multiply',
        self::NO_VALUE => 'minus'
    ];

    const HOUSING = 1;
    const CONDO = 2;
    const INSTITUTION = 3;
    const OFFICE = 4;
    const FACTORY = 5;
    const STEEL_STRUCTURE = 6;
    const USE = [
        self::HOUSING => '戸建住宅',
        self::CONDO => 'マンション',
        self::INSTITUTION => '教育施設/病院',
        self::OFFICE => 'オフィス/商業施設/ホテル',
        self::FACTORY => '工場/倉庫',
        self::STEEL_STRUCTURE => '鋼構造物',
    ];

    const USE_FIELD = [
        self::HOUSING => 'use_housing',
        self::CONDO => 'use_condominium',
        self::INSTITUTION => 'use_institution',
        self::OFFICE => 'use_office',
        self::FACTORY => 'use_factory',
        self::STEEL_STRUCTURE => 'use_steel_structure',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->kanaConstructor();
        $this->InitialConstructor();
    }

    public function p_building_subcategory()
    {
        return $this->belongsTo(PBuildingSubcategory::class);
    }

    public function catalogs()
    {
        return $this->belongsToMany(Document::class)
            ->published()
            ->searchByCategory(DocumentCategory::CATALOG_CATEGORIES);
    }

    public function fire_safe_certs()
    {
        return $this->belongsToMany(Document::class)
            ->published()
            ->searchByCategory(DocumentCategory::FIRESAFE_CATEGORIES);
    }

    public function p_building_resins()
    {
        return $this->belongsToMany(PBuildingResin::class)->withTimestamps();
    }

    public function p_building_materials()
    {
        return $this->belongsToMany(PBuildingMaterial::class)->withTimestamps();
    }

    public function p_building_jis_numbers()
    {
        return $this->belongsToMany(PBuildingJisNumber::class)->withTimestamps();
    }

    public function p_building_purposes()
    {
        return $this->belongsToMany(PBuildingPurpose::class)->withTimestamps();
    }

    public function p_building_lusters()
    {
        return $this->belongsToMany(PBuildingLuster::class)->withTimestamps();
    }

    public function p_building_diluents()
    {
        return $this->belongsToMany(PBuildingDiluent::class)->withTimestamps();
    }

    public function p_building_processes()
    {
        return $this->belongsToMany(PBuildingProcess::class)->withTimestamps();
    }

    public function p_building_sealers()
    {
        return $this->hasMany(PBuildingSealer::class);
    }

    public function p_building_middle_coats()
    {
        return $this->hasMany(PBuildingMiddleCoat::class);
    }

    public function p_building_topcoats()
    {
        return $this->hasMany(PBuildingTopcoat::class);
    }

    public function p_building_packings()
    {
        return $this->hasMany(PBuildingPacking::class);
    }

    public function p_building_finish_samples()
    {
        return $this->hasMany(PBuildingFinishSample::class);
    }

    public function p_building_painting_methods_suitable()
    {
        return $this->belongsToMany(PBuildingPaintingMethod::class, 'p_building_p_building_painting_method_suitable')->withTimestamps();
    }

    public function p_building_painting_methods_usable()
    {
        return $this->belongsToMany(PBuildingPaintingMethod::class, 'p_building_p_building_painting_method_usable')->withTimestamps();
    }

    public function p_building_painting_methods_na()
    {
        return $this->belongsToMany(PBuildingPaintingMethod::class, 'p_building_p_building_painting_method_na')->withTimestamps();
    }

    public function p_building_additional_related_pages()
    {
        return $this->hasMany(PBuildingAdditionalRelatedPage::class);
    }

    public function p_building_base()
    {
        return $this->belongsTo(PBuildingBase::class, 'base_id');
    }

    public function p_building_pack_type()
    {
        return $this->belongsTo(PBuildingPackType::class, 'pack_type_id');
    }

    public static function getSubcategoryList()
    {
        $parent_categories = PBuildingSubcategory::query()
            ->where('parent_id', null);
        $category_list = [];
        foreach ($parent_categories->get() as $parent_category){
            if($parent_category->child_categories->count() > 0){
                $category_list[$parent_category->category_name] = $parent_category->child_categories->pluck('category_name', 'id')->toArray();
            }else{
                $category_list[$parent_category->id] = $parent_category->category_name;
            }
        }
        return $category_list;
    }

    public static function getDocumentsList()
    {
        return Document::getAttachableDocumentsList(self::BUILDING);
    }

    public static function getResinList()
    {
        return PBuildingResin::all()->pluck('name', 'id');
    }

    public static function getMaterialsList()
    {
        return PBuildingMaterial::all()->pluck('name', 'id');
    }

    public static function getBaseList()
    {
        return PBuildingBase::all()->pluck('name', 'id');
    }

    public static function getPackTypeList()
    {
        return PBuildingPackType::all()->pluck('name', 'id');
    }

    public static function getJisList()
    {
        return PBuildingJisNumber::all()->pluck('name', 'id');
    }

    public static function getPurposeList()
    {
        return PBuildingPurpose::all()->pluck('name', 'id');
    }

    public static function getLusterList()
    {
        return PBuildingLuster::all()->pluck('name', 'id');
    }

    public static function getDiluentList()
    {
        return PBuildingDiluent::all()->pluck('name', 'id');
    }

    public static function getProcessList()
    {
        return PBuildingProcess::all()->pluck('name', 'id');
    }

    public static function getApplicablePaintList()
    {
        $p_buildings =  self::query()
            ->get()
            ->mapWithKeys(function ($item) {
                if (!empty($item->p_building_subcategory->category_name)) {
                    $category = self::PRODUCT_CATEGORY[self::BUILDING].'｜'.$item->p_building_subcategory->category_name;
                    if($item->p_building_subcategory->parent_category){
                        $category = $category.'｜'.$item->p_building_subcategory->parent_category->category_name;
                    }

                    $choice = $category.'｜'.$item->product_name;
                }
                else {
                    $choice = self::PRODUCT_CATEGORY[self::BUILDING].'｜※カテゴリ未選択'.'｜'.$item->product_name;
                }
                return [self::BUILDING.':'.$item->id => $choice];
            });

        $p_larges = PLarge::query()
            ->get()
            ->mapWithKeys(function ($item) {
                return [self::LARGE.':'.$item->id => '重防食用塗料｜'.$item->product_name];
            });

        return collect(array_merge($p_buildings->toArray(), $p_larges->toArray()));
    }

    public function getPaintingMethodsList()
    {
        return PBuildingPaintingMethod::all()->pluck('name', 'id');
    }

    public function getMiddleCategoryAttribute()
    {
        if($this->p_building_subcategory){
            if($this->p_building_subcategory->parent_category){
                return $this->p_building_subcategory->parent_category->category_name;
            }
            return $this->p_building_subcategory->category_name;
        }
        return '未設定';
    }

    public function getMiddleCategorySlugAttribute()
    {
        if($this->p_building_subcategory){
            if($this->p_building_subcategory->parent_category){
                return $this->p_building_subcategory->parent_category->slug;
            }
            return $this->p_building_subcategory->slug;
        }
    }

    public function getMiddleCategoryUrlAttribute()
    {
        return url('/products/building/'.$this->middle_category_slug);
    }

    public function getSmallCategoryAttribute()
    {
        if($this->p_building_subcategory){
            if($this->p_building_subcategory->parent_category){
                return $this->p_building_subcategory->category_name;
            }
            return 'なし';
        }
        return '未設定';
    }

    public function getSmallCategorySlugAttribute()
    {
        if($this->p_building_subcategory){
            if($this->p_building_subcategory->parent_category){
                return $this->p_building_subcategory->slug;
            }
        }
    }

    public function getSmallCategoryFrontAttribute()
    {
        if($this->p_building_subcategory){
            if($this->p_building_subcategory->parent_category){
                return $this->p_building_subcategory->category_name;
            }
        }
    }

    public function getSmallCategoryUrlAttribute()
    {
        return $this->middle_category_url.'?child_category[]='.$this->p_building_subcategory_id;
    }

    public function deleteFile()
    {
        if($this->thumbnail && $this->thumbnail !== $this->requests['thumbnail']){
            S3Handler::deleteFromS3(self::$thumbnail_path.'/'.$this->thumbnail);
        }
    }

    public function getValuesArray($field)
    {
        $relation_name = 'p_building_'.$field;
        $value_str = $this->$relation_name->implode('id', ',');
        return collect(explode(',', old($field, $value_str)));
    }

    public function getApplicablePaintValuesArray($field)
    {
        $relation_name = 'p_building_'.$field;
        $org = $this->$relation_name
            ->map(function ($item) {
                return $item->category_id.':'.$item->product_id;
            })->join(',');

        return collect(explode(',', old($field, $org)));
    }

    public function getPackingsArray()
    {
        $packings = collect(old('packings', $this->p_building_packings));
        return $packings->reject(function($val) {
            return !$val['type'] && !$val['amount'] && !isset($val['unit_id']);
        })->values();
    }

    public function getFinishSamplesArray()
    {
        return collect(old('finish_samples', $this->p_building_finish_samples))
            ->reject(function($val) {
                return !$val['image_title'] && !isset($val['image']) && !isset($val['id']);
            })->values()
            ->map(function ($item) {
                if(isset($item['image'])){
                    $item['img_url'] = S3Handler::getFileUrl(PBuildingFinishSample::$sample_img_path . '/' . $item['image']);
                }else{
                    $item['image'] = '';
                    $item['img_url'] = '';
                }
                return $item;
            });
    }

    public function getRelatedPagesArray()
    {
        return collect(old('additional_related_pages', $this->p_building_additional_related_pages))
            ->reject(function ($val) {
                return !$val['indication'] && !$val['url'];
            })->values();
    }

    public function saveRelations()
    {
        // belongsToManyのフィールドを保存
        $this->documents()->sync($this->requests['documents']);
        $this->p_building_resins()->sync($this->requests['resins']);
        $this->p_building_materials()->sync($this->requests['materials']);
        $this->p_building_jis_numbers()->sync($this->requests['jis_numbers']);
        $this->p_building_purposes()->sync($this->requests['purposes']);
        $this->p_building_painting_methods_suitable()->sync($this->requests['painting_methods_suitable']);
        $this->p_building_painting_methods_usable()->sync($this->requests['painting_methods_usable']);
        $this->p_building_painting_methods_na()->sync($this->requests['painting_methods_na']);

        // hasManyのフィールドを保存
        $this->p_building_finish_samples()->delete();
        $this->p_building_finish_samples()->saveMany(PBuildingFinishSample::getNewEntityArray($this->requests['finish_samples']));
        $this->p_building_packings()->delete();
        $this->p_building_packings()->saveMany(PBuildingPacking::getNewEntityArray($this->requests['packings']));
        $this->p_building_sealers()->delete();
        $this->p_building_sealers()->saveMany(PBuildingSealer::getNewEntityArray($this->requests['sealers']));
        $this->p_building_middle_coats()->delete();
        $this->p_building_middle_coats()->saveMany(PBuildingMiddleCoat::getNewEntityArray($this->requests['middle_coats']));
        $this->p_building_topcoats()->delete();
        $this->p_building_topcoats()->saveMany(PBuildingTopcoat::getNewEntityArray($this->requests['topcoats']));
        $this->p_building_additional_related_pages()->delete();
        $this->p_building_additional_related_pages()->saveMany(PBuildingAdditionalRelatedPage::getNewEntityArray($this->requests['additional_related_pages']));
    }

    public function scopeSearch($query, $params)
    {
        if(isset($params['capital_kana'])){
            $query->searchKana('product_name_kana', $params['capital_kana']);
        }
        if(isset($params['p_building_subcategory_id'])){
            $query->where('p_building_subcategory_id', $params['p_building_subcategory_id']);
        }
        if(isset($params['product_name'])){
            $query->where('product_name', 'like', '%'.$params['product_name'].'%');
        }
    }

    public function delete()
    {
        if($this->thumbnail){
            S3Handler::deleteFromS3(self::$thumbnail_path . '/' . $this->thumbnail);
        }

        foreach ($this->p_building_sealers()->get() as $child){
            $child->delete();
        }
        foreach ($this->p_building_middle_coats()->get() as $child){
            $child->delete();
        }
        foreach ($this->p_building_topcoats()->get() as $child){
            $child->delete();
        }
        foreach ($this->p_building_packings()->get() as $child){
            $child->delete();
        }
        foreach ($this->p_building_finish_samples()->get() as $child){
            $child->delete();
        }
        foreach ($this->p_building_additional_related_pages()->get() as $child){
            $child->delete();
        }

        $this->documents()->detach();
        $this->p_building_resins()->detach();
        $this->p_building_materials()->detach();
        $this->p_building_jis_numbers()->detach();
        $this->p_building_purposes()->detach();
        $this->p_building_painting_methods_suitable()->detach();
        $this->p_building_painting_methods_usable()->detach();
        $this->p_building_painting_methods_na()->detach();

        $sealer_pivots = PBuildingSealer::query()
            ->where('product_id', $this->id)->where('category_id', self::BUILDING)->get();
        $middle_coat_pivots = PBuildingMiddleCoat::query()
            ->where('product_id', $this->id)->where('category_id', self::BUILDING)->get();
        $topcoat_pivots = PBuildingTopcoat::query()
            ->where('product_id', $this->id)->where('category_id', self::BUILDING)->get();

        foreach ($sealer_pivots as $pivot){
            $pivot->delete();
        }

        foreach ($middle_coat_pivots as $pivot){
            $pivot->delete();
        }

        foreach ($topcoat_pivots as $pivot){
            $pivot->delete();
        }

        return parent::delete();
    }

    public function scopeSearchFront($query, $params)
    {
        if(isset($params['resin']) && is_array($params['resin'])){
            $query->whereHas('p_building_resins', function ($q) use ($params) {
                $q->whereIn('p_building_resin_id', $params['resin']);
            });
        }
        if(isset($params['base']) && is_array($params['base'])){
            $query->whereIn('base_id', $params['base']);
        }
        if(isset($params['pack_type']) && is_array($params['pack_type'])){
            $query->whereIn('pacK_type_id', $params['pack_type']);
        }
        if(isset($params['material']) && is_array($params['material'])){
            $query->whereHas('p_building_materials', function ($q) use ($params) {
                $q->whereIn('p_building_material_id', $params['material']);
            });
        }
        if(isset($params['usage']) && is_array($params['usage'])){
            $query->where(function ($q) use ($params) {
                foreach ($params['usage'] as $param){
                    if(array_key_exists($param, self::USE_FIELD)){
                        $q->orWhere(self::USE_FIELD[$param], '<=', self::USABLE);
                    }
                }
            });
        }
        if(isset($params['jis_number']) && is_array($params['jis_number'])){
            $query->whereHas('p_building_jis_numbers', function ($q) use ($params) {
                $q->whereIn('p_building_jis_number_id', $params['jis_number']);
            });
        }
        if(isset($params['purpose']) && is_array($params['purpose'])){
            $query->whereHas('p_building_purposes', function ($q) use ($params) {
                $q->whereIn('p_building_purpose_id', $params['purpose']);
            });
        }
    }

    public function scopeCategory($query, $category_list)
    {
        if(count($category_list) > 0){
            $query->whereIn('p_building_subcategory_id', $category_list);
        }
    }

    public static function getPBuildingUse()
    {
        return collect(self::USE);
    }


    public function getThumbnailUrlAttribute()
    {
        return S3Handler::getFileUrl(self::$thumbnail_path . '/' . old('thumbnail', $this->thumbnail));
    }

    public function getThumbnailUrlFrontAttribute()
    {
        if($this->thumbnail){
            return S3Handler::getFileUrl(self::$thumbnail_path . '/' . $this->thumbnail);
        }
        return null;
    }

    public function getResinsImplodeAttribute()
    {
        if($this->p_building_resins){
            return $this->p_building_resins->implode('name', '、');
        }
    }

    public function getPackingsImplodeAttribute()
    {
        return $this->p_building_packings->map(function ($item) {
            return $item->type.$item->amount.self::UNIT_LIST_VOL[$item->unit_id];
        })->join('、');
    }

    public function getMaterialsImplodeAttribute()
    {
        if($this->p_building_materials){
            return $this->p_building_materials->implode('name', '、');
        }
    }

    public function getJisImplodeAttribute()
    {
        if($this->p_building_jis_numbers){
            return $this->p_building_jis_numbers->implode('name', '、');
        }
    }

    public function getPurposeImplodeAttribute()
    {
        if($this->p_building_purposes){
            return $this->p_building_purposes->implode('name', '、');
        }
    }

    public function getLustersImplodeAttribute()
    {
        $value_arr = explode(',', $this->lusters);
        return PBuildingLuster::all()
            ->filter(function ($item) use ($value_arr) {
                return in_array($item->id, $value_arr);
            })
            ->implode('name', '、');
    }

    public function getDiluentsImplodeAttribute()
    {
        $value_arr = explode(',', $this->diluents);
        return PBuildingDiluent::all()
            ->filter(function ($item) use ($value_arr) {
                return in_array($item->id, $value_arr);
            })
            ->implode('name', '、');
    }

    public function getProcessesImplodeAttribute()
    {
        $value_arr = explode(',', $this->processes);
        return PBuildingProcess::all()
            ->filter(function ($item) use ($value_arr) {
                return in_array($item->id, $value_arr);
            })
            ->implode('name', '、');
    }

    public function getSuitabilityMark($field)
    {
        if($this->$field){
            return self::SUITABILITY_MARK[$this->$field];
        }
        return self::SUITABILITY_MARK[self::NO_VALUE];
    }

    public function getPaintingMethodsSuitableImplodeAttribute()
    {
        if($this->p_building_painting_methods_suitable){
            return $this->p_building_painting_methods_suitable->implode('name', '、');
        }
    }

    public function getPaintingMethodsUsableImplodeAttribute()
    {
        if($this->p_building_painting_methods_usable){
            return $this->p_building_painting_methods_usable->implode('name', '、');
        }
    }

    public function getPaintingMethodsNaImplodeAttribute()
    {
        if($this->p_building_painting_methods_na){
            return $this->p_building_painting_methods_na->implode('name', '、');
        }
    }

    public function getSealersImplodeAttribute()
    {
        return $this->getProductsImplode($this->p_building_sealers);
    }

    public function getMiddleCoatsImplodeAttribute()
    {
        return $this->getProductsImplode($this->p_building_middle_coats);
    }

    public function getTopcoatsImplodeAttribute()
    {
        return $this->getProductsImplode($this->p_building_topcoats);
    }

    private function getProductsImplode($pivot)
    {
        if(!$this->p_buildings){
            $this->p_buildings = self::all();
        }
        if(!$this->p_larges){
            $this->p_larges = PLarge::all();
        }
        return $pivot->map(function ($item) {
            if($item->category_id === self::BUILDING){
                return $this->p_buildings->firstWhere('id', $item->product_id);
            }elseif($item->category_id === self::LARGE){
                return $this->p_larges->firstWhere('id', $item->product_id);
            }
        })->implode('product_name', '、');
    }

    public function getRelatedPagesAttribute()
    {
        if(!$this->related_information) return [];
        $pages = [];
        $explode = explode(',', $this->related_information) ?? [];
        foreach ($explode as $info){
            $pages[] = ['url' => url(self::RELATED_INFO_URL[$info]), 'label' => self::RELATED_INFO_LIST[$info]];
        }
        return $pages;
    }
}
