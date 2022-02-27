<?php
namespace App\Traits;

trait InitialSearch
{
    public static $initial_start_regexp;
    public static $initial_key_long;

    public function __construct()
    {
        $initial_key = [
            'ア', 'イ', 'ウ', 'エ', 'オ',
            'カ', 'キ', 'ク', 'ケ', 'コ',
            'サ', 'シ', 'ス', 'セ', 'ソ',
            'タ', 'チ', 'ツ', 'テ', 'ト',
            'ナ', 'ニ', 'ヌ', 'ネ', 'ノ',
            'ハ', 'ヒ', 'フ', 'ヘ', 'ホ',
            'マ', 'ミ', 'ム', 'メ', 'モ',
            'ヤ', 'ユ', 'ヨ',
            'ラ', 'リ', 'ル', 'レ', 'ロ',
            'ワ', '0-9',
        ];
        $initial_regexp = [
            '^[ア]', '^[イ]', '^[ウヴ]', '^[エ]', '^[オ]',
            '^[カガ]', '^[キギ]', '^[クグ]', '^[ケゲ]', '^[コゴ]',
            '^[サザ]', '^[シジ]', '^[スズ]', '^[セゼ]', '^[ソゾ]',
            '^[タダ]', '^[チヂ]', '^[ツヅ]', '^[テデ]', '^[トド]',
            '^[ナ]', '^[ニ]', '^[ヌ]', '^[ネ]', '^[ノ]',
            '^[ハバパ]', '^[ヒビピ]', '^[フブプ]', '^[ヘべぺ]', '^[ホボポ]',
            '^[マ]', '^[ミ]', '^[ム]', '^[メ]', '^[モ]',
            '^[ヤ]', '^[ユ]', '^[ヨ]',
            '^[ラ]', '^[リ]', '^[ル]', '^[レ]', '^[ロ]',
            '^[ワ]', '^[0-9]',
            ];

        self::$initial_key_long = $initial_key;
        self::$initial_start_regexp = collect($initial_regexp)->combine($initial_key);
    }

    public function scopeSearchInitial($query, $field, $key)
    {
        return $query->where($field, 'regexp', self::$initial_start_regexp->search($key));
    }

    public function scopeQueryInitialCounts($query)
    {
        return $query->selectRaw('LEFT(product_name_kana, 1) AS `initial`, count(*) AS `count`')
            ->published()
            ->whereNotNull('product_name_kana')
            ->where('product_name_kana', '<>', '')
            ->groupByRaw('LEFT(product_name_kana, 1)');
    }

    public function scopeGetLongInitialCounts($query)
    {
        $looseInitials = $query->get()
            ->pluck('initial')
            ->toArray();
        foreach (self::$initial_start_regexp as $pattern => $value) {
            $initialsCount[$value] = count(preg_grep("/$pattern/u", $looseInitials));
        }

        return $initialsCount;
    }
}
