<?php

namespace App\Models;

use App\Traits\InitialSearch;
use App\Traits\S3Handler;
use Kyslik\ColumnSortable\Sortable;
use App\Traits\KanaSearch;

class PAutomotive extends Product
{
    use KanaSearch{
        KanaSearch::__construct as kanaConstructor;
    }
    use InitialSearch{
        InitialSearch::__construct as InitialConstructor;
    }
    use Sortable;
    public $sortable = ['id', 'updated_at', 'status'];

    protected $guarded = [
        'created_at',
        'updated_at',
        'characteristics',
        'documents',
        'catalogs',
        'additional_related_pages',
        'hardeners',
        'diluents',
        'applicable_clear_paints',
    ];

    public static $logo_path = 'product/automotive/logo';
    public static $image_path = 'product/automotive/image';

    public function __construct()
    {
        parent::__construct();
        $this->kanaConstructor();
        $this->InitialConstructor();
    }

    public function p_automotive_subcategory()
    {
        return $this->belongsTo(PAutomotiveSubcategory::class);
    }

    public function p_automotive_related_pages()
    {
        return $this->hasMany(PAutomotiveRelatedPages::class);
    }

    public function p_automotive_characteristics()
    {
        return $this->belongsToMany(PAutomotiveCharacteristic::class)->withTimestamps();
    }

    public function diluents()
    {
        return $this->belongsToMany(PAutomotive::class, 'p_automotive_diluent', 'p_automotive_id', 'diluent_id')->withTimestamps();
    }

    public function diluent_holders()
    {
        return $this->belongsToMany(PAutomotive::class, 'p_automotive_diluent', 'diluent_id', 'p_automotive_id');
    }

    public function hardeners()
    {
        return $this->belongsToMany(PAutomotive::class, 'p_automotive_hardener', 'p_automotive_id', 'hardener_id')->withTimestamps();
    }

    public function hardener_holders()
    {
        return $this->belongsToMany(PAutomotive::class, 'p_automotive_hardener', 'hardener_id', 'p_automotive_id');
    }

    public function applicable_clear_paints()
    {
        return $this->belongsToMany(PAutomotive::class, 'p_automotive_applicable_clear_paints', 'p_automotive_id', 'applicable_clear_paint_id')->withTimestamps();
    }

    public function applicable_clear_paint_holders()
    {
        return $this->belongsToMany(PAutomotive::class, 'p_automotive_applicable_clear_paints', 'applicable_clear_paint_id', 'p_automotive_id');
    }

    public function p_automotive_classification()
    {
        return $this->belongsTo(PAutomotiveClassification::class, 'classification');
    }

    public function p_automotive_base()
    {
        return $this->belongsTo(PAutomotiveBase::class, 'base_id');
    }

    public function p_automotive_pack_type()
    {
        return $this->belongsTo(PAutomotivePackType::class, 'pack_type_id');
    }

    public function p_automotive_hardener_ratio()
    {
        return $this->belongsTo(PAutomotiveHardenerRatio::class, 'hardener_ratio');
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class)
            ->withPivot('sort')
            ->orderBy('pivot_sort')
            ->withTimestamps();
    }

    public function catalogs()
    {
        return $this->belongsToMany(Document::class, 'catalog_p_automotive', 'p_automotive_id', 'document_id')
            ->withPivot('sort')
            ->orderBy('pivot_sort')
            ->withTimestamps();
    }

    public function published_catalogs()
    {
        return $this->belongsToMany(Document::class, 'catalog_p_automotive', 'p_automotive_id', 'document_id')
            ->published()
            ->withPivot('sort')
            ->orderBy('pivot_sort');
    }

    public static function getSubcategoryList()
    {
        $parent_categories = PAutomotiveSubcategory::query()
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

    public static function getParentCategoryList()
    {
        return PAutomotiveSubcategory::query()->whereNull('parent_id')->get();
    }

    public static function getLabelList()
    {
        return PAutomotiveLabel::all()->pluck('name', 'id');
    }

    public static function getClassificationList()
    {
        return PAutomotiveClassification::all()->pluck('name', 'id');
    }

    public static function getFireLawClassificationList()
    {
        return PAutomotiveFireLawClassification::all()->pluck('name', 'id');
    }

    public static function getHardenerRatioList()
    {
        return PAutomotiveHardenerRatio::all()->pluck('name', 'id');
    }


    public static function getCharacteristicsList()
    {
        return PAutomotiveCharacteristic::all()->pluck('name', 'id');
    }

    public static function getBaseList()
    {
        return PAutomotiveBase::all()->pluck('name', 'id');
    }

    public static function getPackTypeList()
    {
        return PAutomotivePackType::all()->pluck('name', 'id');
    }

    public static function getApplicableClearPaintList()
    {
        return self::getPAutomotiveListSearchParentCat(PAutomotiveSubcategory::CAT_CLEAR);
    }

    public static function getPAutomotiveList()
    {
        return self::query()
            ->get()
            ->mapWithKeys(function ($item) {
                if (!empty($item->p_automotive_subcategory->category_name)) {
                    $category = $item->p_automotive_subcategory->category_name;
                    if($item->p_automotive_subcategory->parent_category){
                        $category = $category.'｜'.$item->p_automotive_subcategory->parent_category->category_name;
                    }

                    $choice = $category.'｜'.$item->product_name;
                }
                else {
                    $choice = '※カテゴリ未選択'.'｜'.$item->product_name;
                }
                return [$item->id => $choice];
            });
    }

    public static function getPAutomotiveListSearchParentCat($cat_id)
    {
        return self::query()
            ->join('p_automotive_subcategories','p_automotives.p_automotive_subcategory_id','=','p_automotive_subcategories.id')
            ->where('p_automotive_subcategories.parent_id', $cat_id)
            ->select('p_automotives.id AS p_automotive_id', 'p_automotives.*', 'p_automotive_subcategories.*')
            ->get()
            ->mapWithKeys(function ($item) {
                $category = $item->p_automotive_subcategory->category_name;
                if ($item->p_automotive_subcategory->parent_category) {
                    $category = $category . '｜' . $item->p_automotive_subcategory->parent_category->category_name;
                }
                $choice = $category.'｜'.$item->product_name;

                return [$item->p_automotive_id => $choice];
            });
    }

    public static function getDocumentsList()
    {
        return Document::getAutomotiveDocsList();
    }

    public static function getCatalogsList()
    {
        return Document::getAutomotiveCatalogsList();
    }

    public function getCatalogsArray()
    {
        $values = $this->catalogs
            ->map(function ($item) {
                return ['id' => $item->id, 'sort' => $item->pivot->sort];
            })->toJson();
        return old('catalogs', $values);
    }

    public function getValuesArray($field)
    {
        $relation_name = 'p_automotive_'.$field;
        $value_str = $this->$relation_name->implode('id', ',');
        return collect(explode(',', old($field, $value_str)));
    }

    public function getRelatedPagesArray()
    {
        return collect(old('additional_related_pages', $this->p_automotive_related_pages))
            ->reject(function ($val) {
                return !$val['indication'] && !$val['url'];
            })->values();
    }

    public function getParentCategoryAttribute()
    {
        if($this->p_automotive_subcategory){
            if($this->p_automotive_subcategory->parent_category){
                return $this->p_automotive_subcategory->parent_category;
            }
            return $this->p_automotive_subcategory;
        }
    }

    public function getParentCategoryNameAttribute()
    {
        if($this->parent_category){
            return $this->parent_category->category_name;
        }
        return '未設定';
    }

    public function getChildCategoryAttribute()
    {
        if($this->p_automotive_subcategory){
            if($this->p_automotive_subcategory->parent_category){
                return $this->p_automotive_subcategory;
            }
        }
    }

    public function getChildCategoryNameAttribute()
    {
        if(!$this->p_automotive_subcategory){
            return '未設定';
        }
        if($this->child_category){
            return $this->child_category->category_name;
        }
        return 'なし';
    }

    public function getHardenersValuesArray()
    {
        return collect(explode(',', old('hardeners', $this->hardeners->implode('id', ','))));
    }

    public function getDiluentsValuesArray()
    {
        return collect(explode(',', old('diluents', $this->diluents->implode('id', ','))));
    }

    public function getApplicableClearPaintValuesArray()
    {
        return collect(explode(',', old('applicable_clear_paints', $this->applicable_clear_paints->implode('id', ','))));
    }

    public function getCharacteristicsValuesArray()
    {
        return collect(explode(',', old('characteristics', $this->p_automotive_characteristics->implode('id', ','))));
    }

    public function getLogoUrlAttribute()
    {
        return S3Handler::getFileUrl(self::$logo_path . '/' . old('logo', $this->logo));
    }

    public function getImageUrlAttribute()
    {
        return S3Handler::getFileUrl(self::$image_path . '/' . old('image', $this->image));
    }

    public function getLogoUrlFrontAttribute()
    {
        if($this->logo){
            return S3Handler::getFileUrl(self::$logo_path . '/' . $this->logo);
        }
    }

    public function getImageUrlFrontAttribute()
    {
        if($this->image){
            return S3Handler::getFileUrl(self::$image_path . '/' . $this->image);
        }
    }

    public function getThumbnailUrlFrontAttribute()
    {
        if($this->image){
            return S3Handler::getFileUrl(self::$image_path . '/' . $this->image);
        }
        return null;
    }

    public function getLabelsArrayAttribute()
    {
        return PAutomotiveLabel::query()->whereIn('id', explode(',', $this->labels))->get();
    }

    public function getFireLawsClassificationsArrayAttribute()
    {
        return PAutomotiveFireLawClassification::query()->whereIn('id', explode(',', $this->fire_laws_classifications))->get();
    }

    public function saveRelations()
    {
        $this->p_automotive_characteristics()->sync($this->requests['characteristics']);
        $this->hardeners()->sync($this->requests['hardeners']);
        $this->diluents()->sync($this->requests['diluents']);
        $this->applicable_clear_paints()->sync($this->requests['applicable_clear_paints']);
        $this->documents()->sync($this->requests['documents']);
        $this->catalogs()->sync($this->requests['catalogs']);
        $this->p_automotive_related_pages()->delete();
        $this->p_automotive_related_pages()->saveMany(PAutomotiveRelatedPages::getNewEntityArray($this->requests['additional_related_pages']));
    }

    public function scopeSearch($query, $params)
    {
        if(isset($params['capital_kana'])){
            $query->searchKana('product_name_kana', $params['capital_kana']);
        }
        if(isset($params['p_automotive_subcategory_id'])){
            $query->where('p_automotive_subcategory_id', $params['p_automotive_subcategory_id']);
        }
        if(isset($params['product_name'])){
            $query->where('product_name', 'like', '%'.$params['product_name'].'%');
        }
    }

    public function save(array $options = [])
    {
        if($this->getOriginal('logo') && $this->logo !== $this->getOriginal('logo')){
            S3Handler::deleteFromS3(self::$logo_path.'/'.$this->getOriginal('logo'));
        }
        if($this->getOriginal('image') && $this->image !== $this->getOriginal('image')){
            S3Handler::deleteFromS3(self::$image_path.'/'.$this->getOriginal('image'));
        }
        return parent::save($options);
    }

    public function delete()
    {
        if($this->logo){
            S3Handler::deleteFromS3(self::$logo_path . '/' . $this->logo);
        }
        if($this->image){
            S3Handler::deleteFromS3(self::$image_path . '/' . $this->image);
        }
        foreach ($this->p_automotive_related_pages()->get() as $p_automotive_related_page){
            $p_automotive_related_page->delete();
        }
        $this->p_automotive_characteristics()->detach();
        $this->hardeners()->detach();
        $this->hardener_holders()->detach();
        $this->diluents()->detach();
        $this->diluent_holders()->detach();
        $this->applicable_clear_paints()->detach();
        $this->applicable_clear_paint_holders()->detach();
        $this->documents()->detach();
        $this->catalogs()->detach();
        return parent::delete();
    }

    public function scopeCategory($query, $category_list)
    {
        if(count($category_list) > 0){
            $query->whereIn('p_automotive_subcategory_id', $category_list);
        }
    }

    public function scopeSearchFront($query, $params)
    {
        if(isset($params['hardener_ratio']) && is_array($params['hardener_ratio'])){
            $query->whereIn('hardener_ratio', $params['hardener_ratio']);
        }

        if(isset($params['base']) && is_array($params['base'])){
            $query->whereIn('base_id', $params['base']);
        }

        if(isset($params['characteristic']) && is_array($params['characteristic'])){
            $query->whereHas('p_automotive_characteristics', function ($q) use ($params) {
                $q->whereIn('p_automotive_characteristic_id', $params['characteristic']);
            });
        }
    }
}
