<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PLargeSpecProcess extends Model
{
    public $guarded = ['id', 'created_at', 'updated_at', 'p_large_spec_place_ids', 'p_large_spec_painting_method_ids'];
    protected $appends = ['p_large_spec_place_ids', 'p_large_spec_painting_method_ids'];

    private $requests;

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($process) {
            if(isset($process->requests['p_large_spec_place_ids'])){
                $process->p_large_spec_places()->sync($process->requests['p_large_spec_place_ids']);
            }
            if(isset($process->requests['p_large_spec_painting_method_ids'])){
                $process->p_large_spec_painting_methods()->sync($process->requests['p_large_spec_painting_method_ids']);
            }
        });
        static::deleting(function ($process) {
            $process->p_large_spec_places()->detach();
            $process->p_large_spec_painting_methods()->detach();
        });
    }

    /**
     * 希釈剤リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function p_large_spec_diluent()
    {
        return $this->belongsTo(PLargeDiluent::class);
    }

    public function fill(array $attributes)
    {
        $this->requests = $attributes;
        return parent::fill($attributes);
    }

    /*
     * 製品リレーション
     */
    public function p_large()
    {
        return $this->belongsTo(PLarge::class);
    }

    public function p_large_spec_places()
    {
        return $this->belongsToMany(PLargeSpecPlace::class);
    }

    public function p_large_spec_painting_methods()
    {
        return $this->belongsToMany(PLargeSpecPaintingMethod::class);
    }

    public static function getNewEntityArray($params)
    {
        $models = [];
        foreach ($params as $param) {
            $models[] = new static($param);
        }
        return $models;
    }

    public function getUnitAttribute()
    {
        return PLargeSpec::UNIT_LIST_LEN[$this->film_thickness_unit];
    }

    public function getPLargeSpecPlaceIdsAttribute()
    {
        return $this->p_large_spec_places()->pluck('p_large_spec_place_id');
    }

    public function getPLargeSpecPaintingMethodIdsAttribute()
    {
        return $this->p_large_spec_painting_methods()->pluck('p_large_spec_painting_method_id');
    }

    public function getThicknessAttribute()
    {
        if($this->film_thickness_unit === PLargeSpec::UNIT_EMPTY){
            return '-';
        }
        return "{$this->film_thickness}<br>{$this->unit}";
    }

    public function getDiluentAttribute()
    {
        if(!$this->p_large_spec_diluent){
            return '-';
        }
        return "{$this->p_large_spec_diluent->name}<br>({$this->dilution_rate})";
    }

    public function getPlaceAttribute()
    {
        if($this->p_large_spec_places->isNotEmpty()){
            return $this->p_large_spec_places->implode('name', '、');
        }
        return  '-';
    }

    public function getPaintingMethodAttribute()
    {
        if($this->p_large_spec_painting_methods->isNotEmpty()){
            return $this->p_large_spec_painting_methods->implode('name', '、');
        }
        return  '-';
    }
}
