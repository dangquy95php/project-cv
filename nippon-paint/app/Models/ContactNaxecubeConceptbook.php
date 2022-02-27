<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactNaxecubeConceptbook extends Model
{
    protected $fillable = [
        'sector',
        'company',
        'dept',
        'post',
        'name',
        'yomigana',
        'email',
        'postal_code',
        'pref',
        'address',
        'phone',
        'description',
        'etc_inquiry',
    ];

    static $sectors = [
        '1' => 'ゼネコン・工務店',
        '2' => 'ゼネコン（設計）',
        '3' => '設計事務所',
        '4' => 'リフォーム',
        '5' => '塗装業',
        '6' => '塗料販売',
        '7' => '営繕',
        '8' => '自動車補修・鈑金',
        '9' => '防水業',
        '10' => '企業（メーカー）',
        '11' => '企業（商社、他）',
        '12' => '官公庁・公共団体',
        '13' => '個人',
        '14' => 'その他',
    ];

    static $descriptions = [
        '1' => '聞きたい',
        '2' => '聞きたくない',
    ];

    // 入力された「業種」を文字列で返す
    public function getSectorAttribute($value) {
        if (!$value) {
            return '';
        }

        return self::$sectors[$value];
    }

    // 入力された「都道府県」を文字列で返す
    public function getPrefAttribute($value) {
        return Pref::find($value)->name;
    }

    // 入力された「詳しい説明」の有無を文字列で返す
    public function getDescriptionAttribute($value) {
        return self::$descriptions[$value];
    }
}
