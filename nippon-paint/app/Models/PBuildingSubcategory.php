<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;

class PBuildingSubcategory extends Model
{
    use Sortable;
    public $sortable = ['id', 'updated_at'];
    protected $guarded = ['created_at', 'updated_at'];

    public function parent_category()
    {
        return $this->belongsTo(PBuildingSubcategory::class, 'parent_id', 'id');
    }

    public function child_categories()
    {
        return $this->hasMany(PBuildingSubcategory::class, 'parent_id', 'id');
    }

    public function published_p_buildings_with_catalog()
    {
        return $this->hasMany(PBuilding::class)
            ->published()
            ->whereHas('catalogs');
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

    public static function getCategoryIdListByParentId($parent_id)
    {
        $child_categories = self::find($parent_id)->child_categories;
        if($child_categories->count() > 0){
            return $child_categories->pluck('id');
        }
        return [$parent_id];
    }

    public static function getCategoryIdListByParentIdList($parent_id_list)
    {
        $parent_id_list_str = implode(',', $parent_id_list);
        $count = self::query()->select(DB::raw("parent_id, count(*) as count"))
            ->groupBy("parent_id")->toSql();
        return self::query()
            ->select('id')
            ->leftJoinSub($count, 'child_count', 'child_count.parent_id', 'p_building_subcategories.id')
            ->where('child_count.count', null)
            ->whereRaw("ifnull(p_building_subcategories.parent_id, id) in ($parent_id_list_str)")
            ->get()->map(function ($item) {
                return $item->id;
            })->toArray();
    }

    public static function getSubcategories($parent_cat_id = null)
    {
        return self::query()->where('parent_id', $parent_cat_id)->get();
    }

    public function getSubcategoryUrlAttribute()
    {
        if(!$this->parent_id){
            return url('products/building/cat/'.$this->slug);
        }
    }
}
