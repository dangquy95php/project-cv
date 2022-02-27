<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PLargeStandard extends Model
{
    use Sortable;
    public $sortable = ['id', 'updated_at', 'status'];
    protected $guarded = [
        'created_at',
        'updated_at',
        'products'
    ];

    private $requests = [];

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($p_large_standard) {
            if (isset($p_large_standard->requests['products'])) {
                $p_large_standard->p_large_standard_p_larges()->delete();
                $p_large_standard->p_large_standard_p_larges()->saveMany(PLargeStandardPLarge::getNewEntityArray($p_large_standard->requests['products']));
            }
        });
        static::deleting(function ($p_large_standard) {
            foreach ($p_large_standard->p_large_standard_p_larges()->get() as $p_large_standard_p_large){
                $p_large_standard_p_large->delete();
            }
        });
    }

    public function fill(array $attributes)
    {
        $this->requests = $attributes;
        return parent::fill($attributes);
    }

    public function p_large_standard_p_larges()
    {
        return $this->hasMany(PLargeStandardPLarge::class);
    }

    public function p_large_standard_category()
    {
        return $this->belongsTo(PLargeStandardCategory::class);
    }

    public function p_large_spec_bridges()
    {
        return $this->hasMany(PLargeSpecBridge::class);
    }

    public function p_large_spec_steels()
    {
        return $this->hasMany(PLargeSpecSteel::class);
    }

    public static function getStandardCategoryList()
    {
        return PLargeStandardCategory::all()->pluck('name', 'id');
    }

    public static function getPLargeList()
    {
        return PLarge::all()->pluck('product_name','id');
    }

    public function getProductsArray()
    {
        $products = collect(old('products', $this->p_large_standard_p_larges));
        return $products->reject(function($val) {
            return !$val['general_name'] && !$val['p_large_id'] && !$val['general_standard_number'];
        })->values();
    }

    public function getStandardFullNameAttribute()
    {
        return $this->p_large_standard_category->name . '｜' . $this->standard_name;
    }

    public function scopeSearch($query, $params = [])
    {
        if(isset($params['standard_name'])){
            $query->where('standard_name', 'like', '%'.$params['standard_name'].'%');
        }
        if(isset($params['p_large_standard_category_id'])){
            $query->where('p_large_standard_category_id', $params['p_large_standard_category_id']);
        }
    }

    public function isBridge()
    {
        return in_array($this->p_large_standard_category_id, [PLargeSpecBridge::BRIDGE, PLargeSpecBridge::CONCRETE]);
    }

    public static function getSortedStandards()
    {
        return self::query()
            ->orderByRaw('sort is null asc') //nullを配列最後に回すため
            ->orderBy('p_large_standard_category_id', 'asc')
            ->orderBy('sort', 'asc')
            ->get();
    }

    public function getRelatedSpecBridges($p_large_id)
    {
        return $this->hasMany(PLargeSpecBridge::class, 'p_large_standard_id')
            ->published()
            ->whereHas('p_large_spec_bridge_processes', function ($q) use ($p_large_id) {
                $q->where('p_large_id', $p_large_id);
            })->get();
    }

    public function getRelatedSpecSteels($p_large_id)
    {
        return $this->hasMany(PLargeSpecSteel::class, 'p_large_standard_id')
            ->published()
            ->whereHas('p_large_spec_steel_processes', function ($q) use ($p_large_id) {
                $q->where('p_large_id', $p_large_id);
            })->get();
    }
}

