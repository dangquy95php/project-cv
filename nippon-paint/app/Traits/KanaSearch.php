<?php
namespace App\Traits;

trait KanaSearch
{
    public static $kana;

    public static $kana_start_regexp;

    public function __construct()
    {
        $kana_key = ['ア', 'カ', 'サ', 'タ', 'ナ', 'ハ', 'マ', 'ヤ', 'ラ', 'ワ', '0-9',];
        $kana_regexp = ['^[ア-オ]', '^[カ-ゴ]', '^[サ-ゾ]', '^[タ-ド]', '^[ナ-ノ]', '^[ハ-ボ]', '^[マ-モ]', '^[ヤ-ヨ]', '^[ラ-ロ]', '^[ワ-ン]', '^[0-9]',];

        self::$kana = collect($kana_key)->combine($kana_key);
        self::$kana_start_regexp = collect($kana_regexp)->combine($kana_key);
    }

    public function scopeSearchKana($query, $field, $key)
    {
        return $query->where($field, 'regexp', self::$kana_start_regexp->search($key));
    }

    public function scopeQueryKanaCounts($query)
    {
        return $query->selectRaw('LEFT(product_name_kana, 1) AS `kana`, count(*) AS `count`')
            ->published()
            ->whereNotNull('product_name_kana')
            ->where('product_name_kana', '<>', '')
            ->groupByRaw('LEFT(product_name_kana, 1)');
    }

    public function scopeGetKanaCounts($query)
    {
        $looseKana = $query->get()
            ->pluck('kana')
            ->toArray();
        foreach (self::$kana_start_regexp as $pattern => $value) {
            $kanaCount[$value] = count(preg_grep("/$pattern/u", $looseKana));
        }

        return $kanaCount;
    }
}
