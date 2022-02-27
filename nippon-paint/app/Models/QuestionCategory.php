<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class QuestionCategory extends Model
{
    use Sortable;
    public $sortable = ['id', 'updated_at'];

    protected $fillable = [
        'id',
        'category_name',
        'parent_category_id',
        'slug',
        'created_at',
        'updated_at',
    ];

    const BUILDING = 1;
    const LARGE = 2;
    const AUTOMOTIVE = 3;
    const WEB_SITE = 4;
    const PAINTING_MATERIAL = 5;

    const PARENT_CATEGORY = [
        self::BUILDING => '建築用塗料について',
        self::LARGE => '重防食用塗料について',
        self::AUTOMOTIVE => '自動車補修用塗料について',
        self::WEB_SITE => '当サイトについて',
        self::PAINTING_MATERIAL => '塗料について',
    ];

    const PARENT_CATEGORY_URL = [
        self::BUILDING => 'building',
        self::LARGE => 'large',
        self::AUTOMOTIVE => 'automotive',
        self::WEB_SITE => 'web_site',
        self::PAINTING_MATERIAL => 'painting_material',
    ];

    public function getParentCategoryAttribute()
    {
        return self::PARENT_CATEGORY[$this->parent_category_id];
    }

    public static function getParentCategoryList():array
    {
        return self::PARENT_CATEGORY;
    }

    public static function getNestedList()
    {
        return self::all()->collect()
            ->mapToGroups(function ($item) {
                $parent_category = self::PARENT_CATEGORY[$item->parent_category_id];
                return [$parent_category => $item];
            })->map(function ($item) {
                return $item->pluck('category_name', 'id');
            });
    }

    public static function getParentCategory($id)
    {
        return self::find($id);
    }

    public function getCategoryUrlAttribute()
    {
        return url('support/faq/cat/'.self::PARENT_CATEGORY_URL[$this->parent_category_id].'/'.$this->slug);
    }

    public static function getCategories()
    {
        return self::all()
            ->groupBy('parent_category_id')
            ->mapWithKeys(function ($item, $key) {
                return [self::PARENT_CATEGORY[$key] => $item];
            });
    }

    // リレーションを定義
    public function published_faqs()
    {
        // hasManyのリレーションを定義
        return $this->hasMany(Faq::class)->where('published_status', Faq::TO_PUBLIC);
    }

    public function published_pickup_faqs()
    {
        return $this->hasMany(Faq::class)
            ->where('published_status', Faq::TO_PUBLIC)
            ->where('pickup_sort', '!=', null);
    }

    // $parent_categoryが不正な場合はfalseを返す。
    public static function parentCategory2Id($parent_category)
    {
        if(in_array($parent_category, self::PARENT_CATEGORY_URL)){
            return array_search($parent_category, self::PARENT_CATEGORY_URL);
        }
        return false;
    }

    public static function childCategory2Id($child_category)
    {
        $child_category_url_list = self::pluck('slug','id')->toArray();

        if (in_array($child_category, $child_category_url_list)) {
            return array_search($child_category, $child_category_url_list);
        }

        return false;
    }

    public static function getParentTitle($parent_category_id)
    {
        return self::PARENT_CATEGORY[$parent_category_id];
    }

    public static function getChildTitle($child_category_id)
    {
        return self::find($child_category_id)->category_name;
    }

    public static function getParentCategoryQuestions($parent_category_id)
    {
        return self::query()
            ->where('parent_category_id', $parent_category_id)
            ->get()
            ->map(function ($item) {
                return $item->published_faqs;
            })->flatten();
    }

    public static function getPickupFaqsByParentCat($parent_cat_id)
    {
        return self::query()
            ->where('parent_category_id', $parent_cat_id)
            ->get()
            ->map(function ($cat){
                return $cat->published_pickup_faqs;
            })
            ->flatten()
            ->sortBy('pickup_sort');
    }
}
