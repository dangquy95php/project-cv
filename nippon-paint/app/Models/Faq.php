<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;

class Faq extends PublicationModel
{
    use Sortable;
    public $sortable = ['id', 'question_category_id', 'pickup_sort', 'updated_at'];

    protected $fillable = [
        'id',
        'question',
        'answer',
        'question_parent_category_id',
        'question_category_id',
        'published_status',
        'pickup_sort',
        'created_at',
        'updated_at',
    ];

    public function __construct(array $attributes = [])
    {
        $this->status_field = 'published_status';
        parent::__construct($attributes);
    }

    public function question_category()
    {
        return $this->belongsTo(QuestionCategory::class);
    }

    public static function getQuestionCategoryList()
    {
        return QuestionCategory::getNestedList();
    }

    public static function getParentQuestionCategoryList()
    {
        return QuestionCategory::getParentCategoryList();
    }

    public static function getParentCategory($question_category_id)
    {
        return QuestionCategory::getParentCategory($question_category_id);
    }

    public function getParentCategoryNameAttribute()
    {
        if (!$this->question_category || !$this->question_category->parent_category_id) {
            return '未設定';
        }
        return QuestionCategory::PARENT_CATEGORY[$this->question_category->parent_category_id];
    }

    public function getParentCategoryIdAttribute()
    {
        if (!$this->question_category || !$this->question_category->parent_category_id) {
            return 'none';
        }
        return $this->question_category->parent_category_id;
    }

    public function getQuestionCategoryNameAttribute()
    {
        if (!$this->question_category) {
            return '未設定';
        }
        return $this->question_category->category_name;
    }

    public function getPickupSelectStyleAttribute()
    {
        return $this->faq_id . ': ' . $this->question_category_name . '｜' . $this->question;
    }

    public static function getParentQuestionCategoryFaqsList($parent_category_id)
    {
        return self::query()
            ->join('question_categories', 'faqs.question_category_id', '=', 'question_categories.id')
            ->where('question_categories.parent_category_id', $parent_category_id)
            ->orderBy('faqs.pickup_sort', 'desc')
            ->select('faqs.id AS faq_id', 'faqs.*', 'question_categories.*')
            ->get()->map(function ($item) {
                return [
                    'name' => $item->pickup_select_style,
                    'id' => $item->faq_id
                ];
            });
    }

    public static function getPickedUpFaqsList($parent_category_id)
    {
        return self::query()
            ->join('question_categories', 'faqs.question_category_id', '=', 'question_categories.id')
            ->where('question_categories.parent_category_id', $parent_category_id)
            ->whereNotNull('faqs.pickup_sort')
            ->orderBy('faqs.pickup_sort', 'asc')
            ->select('faqs.id AS faq_id', 'faqs.*', 'question_categories.*')
            ->get()->map(function ($item) {
                return [
                    'id' => $item->faq_id,
                    'sort' => $item->pickup_sort,
                ];
            });
    }

    public function scopeSearch($query, $params)
    {
        if (isset($params['keyword'])) {
            $query->where('question', 'like', '%'.$params['keyword'].'%');
        }
        if (isset($params['question_category_id'])) {
            $query->where('question_category_id', '=', $params['question_category_id']);
        }
    }

    public function scopeFrontSearch($query, $params)
    {
        if (!empty($params['keywords'])) {
            $keywords = $params['keywords'];
            foreach ($keywords as $keyword) {
                $query->where(function($query) use($keyword) {
                    $query->orWhere('question', 'like', '%' . $keyword . '%')
                        ->orWhere('answer', 'like', '%' . $keyword . '%');
                });
            }
        }
    }

    public function scopeGetPickUps($query)
    {
        $query->join('question_categories', 'faqs.question_category_id', '=', 'question_categories.id')
            ->whereNotNull('faqs.pickup_sort')
            ->orderBy('question_categories.parent_category_id', 'asc')
            ->orderBy('faqs.pickup_sort', 'asc')
            ->select('faqs.id AS faq_id', 'faqs.*', 'question_categories.*');
    }
}
