<?php

namespace App\Models;


class PLargeSpec extends Product
{
    const SECTION_NEW = 1;
    const SECTION_REPAINTING = 2;
    const SECTIONS = [
        self::SECTION_NEW => '新設',
        self::SECTION_REPAINTING => '塗替'
    ];

    const BRIDGE = 1;
    const PLANT = 2;
    const CONCRETE = 3;
    const STEEL = 4;
    const STEEL_STRUCTURE = 5;

    /*
    * 規格リレーション
    */
    public function p_large_standard()
    {
        return $this->belongsTo(PLargeStandard::class);
    }

    /*
     * 塗装仕様書
     */
    public function published_spec_docs()
    {
        return $this->belongsToMany(Document::class)
            ->published()
            ->searchByCategory([DocumentCategory::PAINTING_SPECS]);
    }

    /**
     * 関連資料リスト
     */
    public function getDocumentsList()
    {
        return Document::getAttachableDocumentsList(self::LARGE_SPEC);
    }

    /*
     * 製品使用説明書リスト
     */
    public function getInstructionsList()
    {
        return Document::getPLargeInstructionsList();
    }

    /*
     * 塗装工程の製品リスト
     */
    public static function getProductListByStandardId($standard_id)
    {
        // 規格IDが0の時はすべての製品を返す
        if(!$standard_id){
            return PLarge::all()->pluck('product_name', 'id');
        }
        return PLargeStandard::find($standard_id)->p_large_standard_p_larges
            ->mapWithKeys(function($item) {
                return [$item->p_large->id => $item->p_large->product_name];
            });
    }

    /**
     * 希釈剤リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getDiluentList()
    {
        return PLargeDiluent::all()->pluck('name', 'id')->prepend('-');
    }

    /**
     * 塗装方法リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getPaintingMethodList()
    {
        return PLargeSpecPaintingMethod::all()->pluck('name', 'id');
    }

    /**
     * 塗装場所リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getPlaceList()
    {
        return PLargeSpecPlace::all()->pluck('name', 'id');
    }

    /*
     * 規格名のアクセサ ない場合は日本ペイント民間規格
     */
    public function getStandardNameAttribute()
    {
        return $this->p_large_standard->standard_name ?? '日本ペイント民間規格';
    }

    /*
     * 塗装区分
     */
    public function getSectionAttribute()
    {
        return self::SECTIONS[$this->section_id] ?? '';
    }

    protected static function mapProcessesArray($processes)
    {
        return $processes->reject(function ($val) {
            return !$val['process_name'];
        })->map(function ($item){
            if(isset($item['p_large_spec_place_ids']) && is_string($item['p_large_spec_place_ids'])){
                $item['p_large_spec_place_ids'] = explode(',',  $item['p_large_spec_place_ids']);
            }
            if(isset($item['p_large_spec_painting_method_ids']) && is_string($item['p_large_spec_painting_method_ids'])){
                $item['p_large_spec_painting_method_ids'] = explode(',',  $item['p_large_spec_painting_method_ids']);
            }
            return $item;
        })->values();
    }

    /*
     * 製品使用説明書
     */
    public function getInstructionsArray()
    {
        $values = $this->instructions
            ->map(function ($item) {
                return ['id' => $item->id, 'sort' => $item->pivot->sort];
            })->toJson();
        return old('instructions', $values);
    }
}
