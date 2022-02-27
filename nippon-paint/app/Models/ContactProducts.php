<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactProducts extends Model
{
    protected $fillable = [
        'name',
        'yomigana',
        'company',
        'dept',
        'sector',
        'email',
        'postal_code',
        'pref',
        'address',
        'phone',
        'inquiry',
        'inquiry_body',
    ];

    static $sectors = [
        '1'=> 'ゼネコン・工務店',
        '2'=> 'ゼネコン（設計）',
        '3'=> '設計事務所',
        '4'=> 'リフォーム',
        '5'=> '塗装業',
        '6'=> '塗料販売',
        '7'=> '営繕',
        '8'=> '自動車補修・鈑金',
        '9'=> '防水業',
        '10'=> '企業（メーカー）',
        '11'=> '企業（商社、他）',
        '12'=> '官公庁・公共団体',
        '13'=> '個人',
        '14'=> 'その他',
    ];

    static $inquiries = [
        '1' => 'カタログのご請求（1種類に付き1部となります）',
        '2' => '商品について',
        '3' => 'その他',
    ];

    // 入力された業種を文字列で返す
    public function getSectorAttribute($value) {
        return self::$sectors[$value];
    }

    // 入力された都道府県を文字列で返す
    public function getPrefAttribute($value) {
        return Pref::find($value)->name;
    }

    // 入力されたお問い合わせ内容を文字列で返す
    public function getInquiryAttribute($value) {
        return self::$inquiries[$value];
    }
}
