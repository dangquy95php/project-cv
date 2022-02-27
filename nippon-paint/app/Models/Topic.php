<?php

namespace App\Models;

use App\Traits\S3Handler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;

class Topic extends AdditionalRelatedPage
{
    use Sortable;
    public $sortable = ['id', 'publication_date', 'updated_at'];

    protected $fillable = [
        'id',
        'title',
        'content',
        'redirect_url',
        'redirect_url_type',
        'article_category_id',
        'status',
        'publication_date',
        'created_at',
        'updated_at',
        'thumbnail'
    ];

    protected $dates = [
        'publication_date',
    ];

    public static $thumbnail_path = 'news/thumbnail';

    const TO_RESERVE = 4;

    const STATUS_SEARCH_LIST = [
        self::TO_PUBLIC => '公開',
        self::TO_PRIVATE => '非公開',
        self::TO_DRAFT => '下書き',
        self::TO_RESERVE => '公開(予約)'
    ];

    const GENERAL_INFO = 1;
    const PRODUCT = 2;
    const SEMINAR = 3;
    const EVENT = 4;
    const CAMPAIGN = 5;
    const MAINTENANCE = 6;
    const CSR_HPP = 7;
    const CSR_IU = 8;

    const MAIN_CATEGORIES_KEY_LIST = [
        self::GENERAL_INFO,
        self::PRODUCT,
        self::SEMINAR,
        self::EVENT,
        self::CAMPAIGN,
        self::MAINTENANCE,
    ];

    const CSR_CATEGORIES_KEY_LIST = [
        self::CSR_HPP,
        self::CSR_IU,
    ];

    const ARTICLE_CATEGORY = [
        self::GENERAL_INFO => 'お知らせ',
        self::PRODUCT => '製品',
        self::SEMINAR => 'セミナー',
        self::EVENT => 'イベント',
        'CSR' => [
            self::CSR_HPP => 'HAPPY PAINT PROJECT',
            self::CSR_IU => '産学共同事業',
        ],
        self::CAMPAIGN => 'キャンペーン',
        self::MAINTENANCE => 'メンテナンス',
    ];

    const MAIN_CATEGORY_URL = [
        self::GENERAL_INFO => 'information',
        self::PRODUCT => 'product',
        self::SEMINAR => 'seminar',
        self::EVENT => 'event',
        self::CAMPAIGN => 'campaign',
        self::MAINTENANCE => 'maintenance',
    ];
    const CSR_URL = [
        self::CSR_HPP => 'happypaintproject',
        self::CSR_IU => 'industry-university'
    ];

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($topic) {
            if($topic->getOriginal('thumbnail') && $topic->getOriginal('thumbnail') !== $topic->thumbnail){
                S3Handler::deleteFromS3(self::$thumbnail_path.'/'.$topic->getOriginal('thumbnail'));
            }
        });
        static::deleted(function($topic) {
            if($topic->thumbnail){
                S3Handler::deleteFromS3(self::$thumbnail_path.'/'.$topic->thumbnail);
            }
        });
    }

    /**
     * モデルの配列形態に追加するアクセサ
     *
     * @var array
     */
    protected $appends = ['thumbnail_url_path', 'topic_url'];

    public function getArticleCategoryAttribute()
    {
        if($this->article_category_id){
            return self::getFlattenCategoryList()->get($this->article_category_id);
        }
        return '未設定';
    }

    public function getStatusLabelAttribute()
    {
        $publication_date = new Carbon($this->publication_date);
        if($this->status == self::TO_PUBLIC && Carbon::now()->lt($publication_date)){
            return '公開(予約)';
        }
        return parent::getStatusLabelAttribute();
    }

    public function getTitleShortenAttribute()
    {
        $length = 40;
        if(mb_strlen($this->title) > $length){
            return mb_substr($this->title, 0, $length).'...';
        }
        return $this->title;
    }

    public function getTopicUrlAttribute()
    {
        if (empty($this->redirect_url)) {
            if (empty($this->publication_date)) {
                return false;
            }
            return url("news/{$this->publication_date->format('Ymd')}/{$this->id}");
        } else {
            return url($this->redirect_url);
        }
    }

    public static function getFlattenCategoryList($type = null)
    {
        $array = [];
        foreach (self::ARTICLE_CATEGORY as $parent_key => $parent_cat) {
            if(is_array($parent_cat)){
                foreach ($parent_cat as $child_key => $child_cat){
                    $array[$child_key] = $parent_key . '｜' . $child_cat;
                    if (!empty($type) && 'front') {
                        $array[$child_key] = $child_cat; //フロント用の表記用に加工しやすい形式にする
                    }
                }

            }else{
                $array[$parent_key] = $parent_cat;
            }
        }
        return collect($array);
    }

    public static function getFlattenCategoryListFront($type = null)
    {
        return self::getFlattenCategoryList('front');
    }

    /**
     * サムネイルのS3のフルパスを返す
     * @return string
     */
    public function getThumbnailUrlPathAttribute()
    {
        return S3Handler::getFileUrl(self::$thumbnail_path . '/' . old('thumbnail', $this->thumbnail));
    }

    public function getPublicationDateIdAttribute()
    {
        return $this->publication_date . '-' . $this->id;
    }

    public static function getYearOptions()
    {
        $year_options = [];
        $now_year = Carbon::now()->format('Y');
        foreach (range(2012, $now_year + 3) as $year){
            $year_options[$year] = $year;
        }
        return $year_options;
    }

    public function scopeSearch($query, $params)
    {
        if (isset($params['article_category_id'])) {
            $query->where('article_category_id', '=', $params['article_category_id']);
        }
        if(isset($params['publication_year']) && is_numeric($params['publication_year'])){
            $query->where('publication_date', '>=', $params['publication_year'].'-01-01 00:00:00')
                ->where('publication_date', '<=', $params['publication_year'].'-12-31 23:59:59');
        }
        if(isset($params['status'])){
            $now = Carbon::now()->format('Y-m-d H:i:s');
            if($params['status'] == self::TO_RESERVE){
                $query->where('status', '=', self::TO_PUBLIC)
                    ->where('publication_date', '>', $now);
            }elseif($params['status'] == self::TO_PUBLIC){
                $query->where('status', '=', self::TO_PUBLIC)
                    ->where('publication_date', '<=', $now);
            }else{
                $query->where('status', '=', $params['status']);
            }
        }
        if (isset($params['keyword'])) {
            $query->where('title', 'like', '%'.$params['keyword'].'%');
        }
    }

    /**
     * 詳細画面で表示する記事の前後の記事を取得
     * @param $topic
     * @return array
     */
    public static function getPrevAndNextTopics($topic) {
        $year = date('Y', strtotime($topic->publication_date));
        $from_year = $year -1;
        $until_year = $year + 1;

        // 年をまたぐ可能性があるため、念の為3年分取得
        $topics_3years = Topic::query()
            ->where('redirect_url', '')
            ->where('content', '!=',  '')
            ->whereYear('publication_date', '>=', $from_year)
            ->whereYear('publication_date', '<=', $until_year)
            ->orderBy('publication_date', 'desc')
            ->get();

        $prev_topic = $topics_3years
            ->where('publication_date_id', '<', $topic->publication_date_id)
            ->first();

        $next_topic = $topics_3years
            ->where('publication_date_id', '>', $topic->publication_date_id)
            ->last();

        return ['prev_topic' => $prev_topic, 'next_topic' => $next_topic];
    }

    /**
     * 記事一覧の配列の日付を年にフォーマットし、重複を除く
     * @param $topics
     * @return array
     */
    public static function createUniqueYearList($topics) {
        foreach ($topics as $topic) {
            $unique_years[] = $topic->publication_date->format('Y');
        }

        $unique_years = array_values(array_unique($unique_years));

        return $unique_years;
    }

    /**
     * 記事の公開日を年月日にフォーマットし、URLを生成
     * @param $topic
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function createPaginateUrl($topic) {
        if (empty($topic)) {
            return '';
        }

        $id = $topic->id;
        $publication_date = $topic->publication_date->format('Ymd');
        return url("news/{$publication_date}/{$id}");
    }

    /**
     * 記事一覧の中からプルダウンで指定された年の記事を検索
     * @param $topics
     * @param $year
     * @param $unique_years
     * @return mixed
     */
    public static function searchSelectedYearTopics($topics, $year, $unique_years) {
        $year = in_array($year, $unique_years, true) ? $year : $unique_years[0];

        foreach ($topics as $topic) {
            if (preg_match("/^{$year}/", $topic['publication_date'])) {
                $topics_year[] = $topic;
            }
        }

        return $topics_year;
    }

    /**
     * 記事が1件以上ある記事カテゴリを格納した配列を生成
     * @return array
     */
    public static function getAvailabilityTopicCategories() {
        $topic_category_count = Topic::query()
            ->select(DB::raw('article_category_id, COUNT(*) AS count'))
            ->whereNotIn('article_category_id', self::CSR_CATEGORIES_KEY_LIST)
            ->groupBy('article_category_id')
            ->get();

        // article_category_idのみを格納した一次元配列を生成
        $topic_category_count = $topic_category_count->toArray();
        $availability_topic_categories = [];
        foreach ($topic_category_count as $count) {
            $availability_topic_categories[] = $count['article_category_id'];
        }

        return $availability_topic_categories;
    }

    /**
     * カテゴリを指定し、記事が1件以上ある記事カテゴリを格納した配列を生成
     * @return array
     */
    public static function getAssignAvailabilityTopicCategories($categories) {
        $topic_category_count = Topic::query()
            ->select(DB::raw('article_category_id, COUNT(*) AS count'))
            ->whereIn('article_category_id', $categories)
            ->groupBy('article_category_id')
            ->get();

        // article_category_idのみを格納した一次元配列を生成
        $topic_category_count = $topic_category_count->toArray();
        $availability_topic_categories = [];
        foreach ($topic_category_count as $count) {
            $availability_topic_categories[] = $count['article_category_id'];
        }

        return $availability_topic_categories;
    }

    public function getLabelAttribute()
    {
        return self::getFlattenCategoryListFront()->toArray()[$this->article_category_id];
    }
}
