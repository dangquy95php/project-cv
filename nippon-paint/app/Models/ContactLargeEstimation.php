<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactLargeEstimation extends Model
{
    protected $fillable = [
        'target',
        'fireproof_time',
        'specification',
        'area',
        'condition',
        'construction_time',
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
        'construction_name',
        'field_pref',
        'estimation_company',
        'estimation_date',
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

    static $targets = [
        '1' => '耐火',
        '2' => 'コンクリート',
    ];

    static $fireproof_times = [
        '1' => '1h',
        '2' => '2h',
    ];

    // 入力された対象を文字列で返す
    public function getTargetStrAttribute() {
        return self::$targets[$this->target];
    }

    // 入力された業種を文字列で返す
    public function getSectorAttribute($value) {
        return self::$sectors[$value];
    }

    // 入力された耐火時間を文字列で返す
    public function getFireproofTimeAttribute($value) {
        return self::$fireproof_times[$value];
    }

    // 入力された都道府県(ご住所)を文字列で返す
    public function getPrefAttribute($value) {
        return Pref::find($value)->name;
    }

    // 入力された都道府県(現場住所)を文字列で返す
    public function getFieldPrefAttribute($value) {
        return Pref::find($value)->name;
    }
}
