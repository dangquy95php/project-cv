<?php

namespace App\Models;

use App\Traits\S3Handler;

abstract class Product extends AdditionalRelatedPage
{
    const BUILDING = 1; // 建築用カテゴリID
    const LARGE = 2; // 重防カテゴリID
    const LARGE_SPEC = 3; // 重防仕様カテゴリID
    const AUTOMOTIVE = 4; // 自動車カテゴリID

    const PRODUCT_CATEGORY = [
        self::BUILDING => '建築用塗料',
        self::LARGE => '重防食用塗料-製品',
        self::LARGE_SPEC => '重防食用塗料-仕様',
        self::AUTOMOTIVE => '自動車補修用塗料',
    ];

    const UNIT_KG = 1;
    const UNIT_L = 2;
    const UNIT_ML = 3;
    const UNIT_KG_SET = 4;
    const UNIT_MM = 5;
    const UNIT_MICRO_M = 6;
    const UNIT_MIN = 7;
    const UNIT_H = 8;
    const UNIT_D = 9;
    const UNIT_M_SQ = 10;

    const UNIT_EMPTY = 99;

    const UNIT_LIST_VOL = [
        self::UNIT_KG => 'kg',
        self::UNIT_L => 'L',
        self::UNIT_ML => 'ml',
        self::UNIT_KG_SET => 'Kgセット',
    ];

    const UNIT_LIST_LEN = [
        self::UNIT_MM => 'mm',
        self::UNIT_MICRO_M => 'μm',
        self::UNIT_EMPTY => 'なし',
    ];

    const UNIT_LIST_TIME = [
        self::UNIT_MIN => '分',
        self::UNIT_H => '時間',
        self::UNIT_D => '日',
    ];

    const UNIT_LIST_AREA = [
        self::UNIT_M_SQ => '㎡/㎡',
    ];

    protected $requests = [];

    /*
     * 資料リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents()
    {
        return $this->belongsToMany(Document::class)
            ->withPivot('sort')
            ->orderBy('pivot_sort')
            ->withTimestamps();
    }

    /*
     * 資料リレーション（公開中のもののみ）
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function published_documents()
    {
        return $this->belongsToMany(Document::class)
            ->withPivot('sort')
            ->orderBy('pivot_sort')
            ->published();
    }

    public function fill(array $attributes)
    {
        $this->requests = $attributes;
        return parent::fill($attributes);
    }

    /**
     * 登録した資料IDを配列で返す
     * @return array
     */
    public function getDocumentsArray()
    {
        $values = $this->documents
            ->map(function ($item) {
                return ['id' => $item->id, 'sort' => $item->pivot->sort];
            })->toJson();
        return old('documents', $values);
    }

    /*
     *
     */
    public static function getS3Url($path)
    {
        return S3Handler::getFileUrl($path);
    }
}
