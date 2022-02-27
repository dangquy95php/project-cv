<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;

class TechnicalTerm extends PublicationModel
{
    use Sortable;
    public $sortable = ['id', 'updated_at', 'title','status'];    // ソート対象カラム追加

    protected $guarded = ['id', 'created_at', 'updated_at', 'term_tag_ids'];

    const KANA1 = 'ア';
    const KANA2 = 'カ';
    const KANA3 = 'サ';
    const KANA4 = 'タ';
    const KANA5 = 'ナ';
    const KANA6 = 'ハ';
    const KANA7 = 'マ';
    const KANA8 = 'ヤ';
    const KANA9 = 'ラ';
    const KANA10 = 'ワ';
    const KANA11 = '0-9';

    const KANA_LINE = [
        self::KANA1 => 'ア',
        self::KANA2 => 'カ',
        self::KANA3 => 'サ',
        self::KANA4 => 'タ',
        self::KANA5 => 'ナ',
        self::KANA6 => 'ハ',
        self::KANA7 => 'マ',
        self::KANA8 => 'ヤ',
        self::KANA9 => 'ラ',
        self::KANA10 => 'ワ',
        self::KANA11 => '0-9',
    ];

    const KANA_REGEXP = [
        self::KANA1 => '^[ア-オ]',
        self::KANA2 => '^[カ-ゴ]',
        self::KANA3 => '^[サ-ゾ]',
        self::KANA4 => '^[タ-ド]',
        self::KANA5 => '^[ナ-ノ]',
        self::KANA6 => '^[ハ-ボ]',
        self::KANA7 => '^[マ-モ]',
        self::KANA8 => '^[ヤ-ヨ]',
        self::KANA9 => '^[ラ-ロ]',
        self::KANA10 => '^[ワ-ン]',
        self::KANA11 => '^[0-9]',
    ];

    const KANA1_2 = 'ア';
    const KANA2_2 = 'カ';
    const KANA3_2 = 'サ';
    const KANA4_2 = 'タ';
    const KANA5_2 = 'ナ';
    const KANA6_2 = 'ハ';
    const KANA7_2 = 'マ';
    const KANA8_2 = 'ヤ';
    const KANA9_2 = 'ラ';
    const KANA10_2 = 'ワ';
    const KANA11_2 = '0';
    const KANA12_2 = '1';
    const KANA13_2 = '2';
    const KANA14_2 = '3';
    const KANA15_2 = '4';
    const KANA16_2 = '5';
    const KANA17_2 = '6';
    const KANA18_2 = '7';
    const KANA19_2 = '8';
    const KANA20_2 = '9';

    const KANA_LINE_2 = [
        self::KANA1_2 => 'ア',
        self::KANA2_2 => 'カ',
        self::KANA3_2 => 'サ',
        self::KANA4_2 => 'タ',
        self::KANA5_2 => 'ナ',
        self::KANA6_2 => 'ハ',
        self::KANA7_2 => 'マ',
        self::KANA8_2 => 'ヤ',
        self::KANA9_2 => 'ラ',
        self::KANA10_2 => 'ワ',
        self::KANA11_2 => '0',
        self::KANA12_2 => '1',
        self::KANA13_2 => '2',
        self::KANA14_2 => '3',
        self::KANA15_2 => '4',
        self::KANA16_2 => '5',
        self::KANA17_2 => '6',
        self::KANA18_2 => '7',
        self::KANA19_2 => '8',
        self::KANA20_2 => '9',
    ];

    const KANA_LINE_ALPHABET_2 = [
        self::KANA1_2 => 'a',
        self::KANA2_2 => 'k',
        self::KANA3_2 => 's',
        self::KANA4_2 => 't',
        self::KANA5_2 => 'n',
        self::KANA6_2 => 'h',
        self::KANA7_2 => 'm',
        self::KANA8_2 => 'y',
        self::KANA9_2 => 'r',
        self::KANA10_2 => 'w',
        self::KANA11_2 => '0',
        self::KANA12_2 => '1',
        self::KANA13_2 => '2',
        self::KANA14_2 => '3',
        self::KANA15_2 => '4',
        self::KANA16_2 => '5',
        self::KANA17_2 => '6',
        self::KANA18_2 => '7',
        self::KANA19_2 => '8',
        self::KANA20_2 => '9',
    ];

    const KANA_REGEXP_2 = [
        self::KANA1_2 => '^[ア-オ]',
        self::KANA2_2 => '^[カ-ゴ]',
        self::KANA3_2 => '^[サ-ゾ]',
        self::KANA4_2 => '^[タ-ド]',
        self::KANA5_2 => '^[ナ-ノ]',
        self::KANA6_2 => '^[ハ-ボ]',
        self::KANA7_2 => '^[マ-モ]',
        self::KANA8_2 => '^[ヤ-ヨ]',
        self::KANA9_2 => '^[ラ-ロ]',
        self::KANA10_2 => '^[ワ-ン]',
        self::KANA11_2 => '^0',
        self::KANA12_2 => '^1',
        self::KANA13_2 => '^2',
        self::KANA14_2 => '^3',
        self::KANA15_2 => '^4',
        self::KANA16_2 => '^5',
        self::KANA17_2 => '^6',
        self::KANA18_2 => '^7',
        self::KANA19_2 => '^8',
        self::KANA20_2 => '^9',
    ];

    protected $requests = [];

    public function fill(array $attributes)
    {
        $this->requests = $attributes;
        return parent::fill($attributes);
    }

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($model) {
            $model->term_tags()->sync($model->requests['term_tag_ids']);
        });
        static::deleting(function ($model) {
            $model->term_tags()->detach();
        });
    }

    /**
     * クエリビルダのsearchメソッド
     * @param $query
     * @param $params
     * @param null $title_kana_2
     * @param null $slug
     */
    function scopeSearch($query, $params, $title_kana_2 = null, $slug = null) {
        // admin側の検索
        if (!empty($params['keyword'])) {
            $query->where('title', 'like', '%'.$params['keyword'].'%');
        }
        if (!empty($params['title_kana'])) {
            $kana = self::KANA_REGEXP[$params['title_kana']];
            $query->where('title_kana', 'regexp', $kana);
        }

        // front側の検索
        if (!empty($params['keywords'])) {
            $keywords = $params['keywords'];
            for ($i = 0; $i < count($keywords); $i++) {
                $query->where(function($query) use($keywords, $i) {
                    $query->orWhere('title', 'like', '%' . $keywords[$i] . '%')
                          ->orWhere('title_kana', 'like', '%' . $keywords[$i] . '%')
                          ->orWhere('contents', 'like', '%' . $keywords[$i] . '%');
                });
            }
        }
        if (!empty($title_kana_2)) {
            $kana = self::KANA_REGEXP_2[array_keys(self::KANA_LINE_ALPHABET_2, $title_kana_2)[0]];
            $query->where('title_kana', 'regexp', $kana);
        }
        if (!empty($slug)) {
            $query->whereHas('term_tags', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                }
            );
        }
    }

    /**
     * リレーション: term_tags
     * 中間テーブル: technical_term_tags
     * @return collection(App\Models\TermTag)
     */
    public function term_tags()
    {
        return $this->belongsToMany(TermTag::class, TechnicalTermTag::class, 'technical_term_id', 'term_tag_id');
    }
    
    /**
     * 利用可能なタグ配列を取得
     * @return array[] [['id' => 'タグ名 (スラッグ)'], ...]
     */
    public static function getTermTagList()
    {
        return TermTag::all()->pluck('name_with_slug', 'id');
    }

    public function getTagsArray()
    {
        $value_str = $this->term_tags->implode('id', ',');
        return collect(explode(',', old('term_tag_ids', $value_str)));
    }

    /**
     * 1件以上存在する50音のリストを取得
     * @param $kana_lines
     * @param $kana_regexp_pattern
     * @return array
     */
    public static function getEnableKanaLines($kana_lines, $kana_regexp_pattern) {
        $title_kana_lines = TechnicalTerm::query()
            ->selectRaw('DISTINCT(SUBSTRING(title_kana, 1, 1))')
            ->where('status', 1)
            ->get()
            ->toArray();

        $enable_kana_lines = [];
        foreach ($title_kana_lines as $title_kana_line) {
            $title_kana_line = reset($title_kana_line);
            foreach ($kana_regexp_pattern as $pattern) {
                if (preg_match('/' . $pattern . '/u', $title_kana_line)) {
                    $enable_kana_lines[] = $kana_lines[array_keys($kana_regexp_pattern, $pattern)[0]];
                }
            }
        }

        return $enable_kana_lines;
    }
}
