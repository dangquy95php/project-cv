<?php

namespace App\Models;

use App\Traits\S3Handler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use App\Models\PublicationModel;

class NippelabArticle extends PublicationModel
{
    use Sortable;

    public $sortable = ['id', 'publication_date', 'updated_at'];

    public $fillable = [
        'id',
        'status',
        'publication_date',
        'theme_id',
        'category_id',
        'title',
        'slug',
        'meta_description',
        'og_description',
        'og_image',
        'body',
        'created_at',
        'updated_at'
    ];

    public static $img_dir = 'imgs/nippelab';

    const THEME_BEGINNER = 1;
    const THEME_DETACHED_HOME = 2;
    const THEME_CONDOMINIUM = 3;
    const THEME_INTERIOR = 4;

    const THEMES= [
        self::THEME_BEGINNER => '塗料の基礎知識',
        self::THEME_DETACHED_HOME => '戸建て塗替え',
        self::THEME_CONDOMINIUM => 'マンション塗替え',
        self::THEME_INTERIOR => '内装ペイント'
    ];

    const F_DETAIL_BLADE_LIST = [
        self::THEME_BEGINNER => 'front/nippelab/beginner/detail',
        self::THEME_DETACHED_HOME => 'front/nippelab/detached-home/detail',
        self::THEME_CONDOMINIUM => 'front/nippelab/condominium/detail',
        self::THEME_INTERIOR => 'front/nippelab/interior/detail'
    ];

    const CATEGORY_BEGINNER = [
        101 => '塗料の基本',
        102 => '塗料の分類',
        103 => '塗料について',
        104 => '塗料の＋α知識',
    ];
    const CATEGORY_DETACHED_HOME = [
        201 => '戸建て塗替え_カテゴリ1',
        202 => '戸建て塗替え_カテゴリ2',
        203 => '戸建て塗替え_カテゴリ3',
        204 => '戸建て塗替え_カテゴリ4',
    ];
    const CATEGORY_CONDOMINIUM = [
        301 => 'マンション塗替え_カテゴリ1',
        302 => 'マンション塗替え_カテゴリ2',
        303 => 'マンション塗替え_カテゴリ3',
        304 => 'マンション塗替え_カテゴリ4',
    ];
    const CATEGORY_INTERIOR = [
        401 => '内装ペイント_カテゴリ1',
        402 => '内装ペイント_カテゴリ2',
        403 => '内装ペイント_カテゴリ3',
        404 => '内装ペイント_カテゴリ4',
    ];

    const CATEGORIES = [
        self::THEME_BEGINNER => self::CATEGORY_BEGINNER,
        self::THEME_DETACHED_HOME => self::CATEGORY_DETACHED_HOME,
        self::THEME_CONDOMINIUM => self::CATEGORY_CONDOMINIUM,
        self::THEME_INTERIOR => self::CATEGORY_INTERIOR,
    ];

    const THEME_SLUG = [
        self::THEME_BEGINNER => 'beginner',
        self::THEME_DETACHED_HOME => 'detached-home',
        self::THEME_CONDOMINIUM => 'condominium',
        self::THEME_INTERIOR => 'interior'
    ];

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($article) {
            if($article->getOriginal('og_image') && $article->getOriginal('og_image') !== $article->og_image){
                S3Handler::deleteFromS3(self::$img_dir.'/'.$article->getOriginal('og_image'));
            }
        });
        static::deleted(function($article) {
            S3Handler::deleteFromS3(self::$img_dir . '/' . $article->og_image);
        });
    }

    public function getThemeAttribute()
    {
        if (!$this->theme_id) {
            return null;
        }
        return self::THEMES[$this->theme_id];
    }

    public function getCategoryAttribute()
    {
        if (!$this->theme_id || !$this->category_id) {
            return null;
        }
        return self::CATEGORIES[$this->theme_id][$this->category_id];
    }

    public function getThemeSlugAttribute()
    {
        return self::THEME_SLUG[$this->theme_id] ?? '';
    }

    public function scopeSearch($query, $params)
    {
        if (isset($params['theme_id'])) {
            $query->where('theme_id', '=', $params['theme_id']);
        }
        if (isset($params['category_id'])) {
            $query->where('category_id', '=', $params['category_id']);
        }
        if (isset($params['keyword'])) {
            $query->where('title', 'like', '%'.$params['keyword'].'%');
        }
    }

    /**
     * S3に画像を保存する
     * @param Request $request
     * @return bool
     */
    public function saveFile(Request $request)
    {
        if ($request->hasFile('og_image')) {
            if ($filename = S3Handler::uploadToS3($request->file('og_image'), self::$img_dir)) {
                // 新しい画像ファイルがアップロードされたら古い画像ファイルを削除する
                if ($this->og_image && $this->og_image !== $filename) {
                    S3Handler::deleteFromS3(self::$img_dir .'/' . $this->og_image);
                }
            } else {
                return false;
            }
            $this->setAttribute('og_image', $filename);
        }
        return true;
    }

    /**
     * 画像の絶対パス返す
     * @return string
     */
    public function getOgImageUrlAttribute()
    {
        return S3Handler::getFileUrl(self::$img_dir . '/' . old('og_image', $this->og_image));
    }

    public function getPrevUrlAttribute()
    {
        $prev_article = self::query()
            ->published()
            ->where('category_id', $this->category_id)
            ->where('publication_date', '<', $this->publication_date)
            ->first();

        if (!$prev_article) {
            return '';
        }

        return $prev_article->url;
    }

    public function getNextUrlAttribute()
    {
        $today = date("Y-m-d H:i:s");

        $next_article = self::query()
            ->published()
            ->where('category_id', $this->category_id)
            ->where('publication_date', '>', $this->publication_date)
            ->where('publication_date', '<=', $today)
            ->orderBy('publication_date', 'asc')
            ->first();

        if (!$next_article) {
            return '';
        }

        return $next_article->url;
    }

    public function getUrlAttribute()
    {
        $slug = $this->slug;
        $theme = self::THEME_SLUG[$this->theme_id];
        return url("nippelab/{$theme}/{$slug}");
    }
}
