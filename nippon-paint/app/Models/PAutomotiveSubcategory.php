<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class PAutomotiveSubcategory extends Model
{
    use Sortable;
    public $sortable = ['id', 'updated_at'];
    protected $guarded = ['created_at', 'updated_at'];

    const CAT_CLEAR = 2;

    public function parent_category()
    {
        return $this->belongsTo(PAutomotiveSubcategory::class, 'parent_id', 'id');
    }

    public function child_categories()
    {
        return $this->hasMany(PAutomotiveSubcategory::class, 'parent_id', 'id');
    }

    public static function getParentCategoryList()
    {
        return self::query()->where('parent_id', null)->pluck('category_name', 'id');
    }

    public static function getParentCategoryAndSlugList()
    {
        return self::query()->where('parent_id', null)->get()->pluck('category_name_and_slug', 'id');
    }

    public function getCategoryNameAndSlugAttribute()
    {
        return $this->category_name . '｜' . $this->slug;
    }

    public static function getCategoryIdListByParentIdList($parent_id_list)
    {
        $parent_id_list_str = implode(',', $parent_id_list);
        $count = self::query()->select(DB::raw("parent_id, count(*) as count"))
            ->groupBy("parent_id")->toSql();
        return self::query()
            ->select('id')
            ->leftJoinSub($count, 'child_count', 'child_count.parent_id', 'p_automotive_subcategories.id')
            ->where('child_count.count', null)
            ->whereRaw("ifnull(p_automotive_subcategories.parent_id, id) in ($parent_id_list_str)")
            ->get()->map(function ($item) {
                return $item->id;
            })->toArray();
    }
}
