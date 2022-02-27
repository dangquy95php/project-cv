<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactColorSample extends Model
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
        'pro_journal_checkbox',
        'pro_journal_text',
        'homepage_checkbox',
        'homepage_text',
        'other_checkbox',
        'other_text',
        'construction_checkbox',
        'construction_text',
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

    static $pro_journals = [
        '1' => '積算資料（ポケット版）',
        '2' => '建設物価',
        '3' => '積算資料',
        '4' => '日経アーキテクチュア',
        '5' => '近代建築',
        '6' => '建築仕上技術',
        '7' => 'その他',
    ];

    static $homepages = [
        '1' => '塗料メーカーのホームページ',
        '2' => 'アーキマップ',
        '3' => '建材ナビ',
        '4' => 'ｄｂｎｅｔ',
        '5' => '建設ＭＩＬ',
        '6' => 'けんせつＰＬＡＺＡ',
        '7' => '建設Ｎａｖｉ',
        '8' => 'ＫＩＳＳ',
        '9' => '建設工業調査会',
        '10' => 'その他',
    ];

    static $others = [
        '1' => 'お取引業者様からのご紹介',
        '2' => '塗料メーカーにお問い合せ',
        '3' => 'その他',
    ];

    static $constructions = [
        '1' => '新築',
        '2' => '改修',
        '3' => '戸建住宅',
        '4' => '分譲マンション',
        '5' => '賃貸住宅',
        '6' => 'オフィスビル／商業施設',
        '7' => '工場／倉庫',
        '8' => 'その他',
    ];

    // 入力された業種を文字列で返す
    public function getSectorAttribute($value) {
        return self::$sectors[$value];
    }

    // 入力された都道府県を文字列で返す
    public function getPrefAttribute($value) {
        return Pref::find($value)->name;
    }

    // チェックされた「専門誌」を配列で返す
    public function getProJournalsAttribute() {
        if (empty($this->pro_journal_checkbox)) {
            return null;
        }

        $result = [];
        foreach ($this->pro_journal_checkbox as $value) {
            $result[] = self::$pro_journals[$value];
        }

        return $result;
    }

    // チェックされた「ホームページ」を配列で返す
    public function getHomepagesAttribute() {
        if (empty($this->homepage_checkbox)) {
            return null;
        }

        $result = [];
        foreach ($this->homepage_checkbox as $value) {
            $result[] = self::$homepages[$value];
        }

        return $result;
    }

    // チェックされた「上記以外の方法」を配列で返す
    public function getOthersAttribute() {
        if (empty($this->other_checkbox)) {
            return null;
        }

        $result = [];
        foreach ($this->other_checkbox as $value) {
            $result[] = self::$others[$value];
        }

        return $result;
    }

    // チェックされた「主な工事内容」を配列で返す
    public function getConstructionsAttribute() {
        if (empty($this->construction_checkbox)) {
            return null;
        }

        $result = [];
        foreach ($this->construction_checkbox as $value) {
            $result[] = self::$constructions[$value];
        }

        return $result;
    }

    // チェックされた「専門誌」を文字列で返す
    public function getProJournalStrAttribute() {
        if (empty($this->pro_journal_checkbox)) {
            return null;
        }

        $result = [];
        foreach ($this->pro_journal_checkbox as $value) {
            $result[] = self::$pro_journals[$value];
        }
        $result = implode('、', $result);

        return $result;
    }

    // チェックされた「ホームページ」を文字列で返す
    public function getHomepageStrAttribute() {
        if (empty($this->homepage_checkbox)) {
            return null;
        }

        $result = [];
        foreach ($this->homepage_checkbox as $value) {
            $result[] = self::$homepages[$value];
        }
        $result = implode('、', $result);

        return $result;
    }

    // チェックされた「上記以外の方法」を文字列で返す
    public function getOtherStrAttribute() {
        if (empty($this->other_checkbox)) {
            return null;
        }

        $result = [];
        foreach ($this->other_checkbox as $value) {
            $result[] = self::$others[$value];
        }
        $result = implode('、', $result);

        return $result;
    }

    // チェックされた「主な工事内容」を文字列で返す
    public function getConstructionStrAttribute() {
        if (empty($this->construction_checkbox)) {
            return null;
        }

        $result = [];
        foreach ($this->construction_checkbox as $value) {
            $result[] = self::$constructions[$value];
        }
        $result = implode('、', $result);

        return $result;
    }
}
