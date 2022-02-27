<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;

class TermTag extends PublicationModel
{
    use Sortable;
    public $sortable = ['id', 'updated_at', 'name', 'slug'];    // ソート対象カラム追加

    protected $guarded = ['id', 'created_at', 'updated_at'];

    function scopeSearch($query, $params) {
        if (!empty($params['keyword'])) {
            $query->where('name', 'like', "%{$params['keyword']}%")
                ->orWhere('slug', 'like', "%{$params['keyword']}%");
        }
    }

    /**
     * リレーション: technical_terms
     * 中間テーブル: technical_term_tags
     * @return collection(App\Models\TechnicalTerm)
     */
    public function technical_terms()
    {
        return $this->belongsToMany(TechnicalTerm::class, TechnicalTermTag::class, 'term_tag_id', 'technical_term_id');
    }

    /**
     * 用語との関連付け削除
     * @return int detachedCount
     */
    public function detachTerms()
    {
        return TechnicalTermTag::where('term_tag_id', $this->id)->delete();
    }

    /**
     * name_with_slug アトリビュート
     * @return string "$name ($slug)"
     */
    public function getNameWithSlugAttribute()
    {
        return "{$this->name} ({$this->slug})";
    }

    /**
     * 1件以上存在するタグのリストを取得
     * @return array
     */
    public static function getEnableTermTags() {
        $term_tags = self::query()
            ->whereHas('technical_terms',  function ($term_tags) {
                $term_tags->where('status', 1)
                          ->whereNotNull('technical_term_tags.technical_term_id');
            })
            ->groupBy(['term_tags.name', 'term_tags.slug'])
            ->get(['term_tags.name', 'term_tags.slug'])
            ->toArray();

        return $term_tags;
    }
}
