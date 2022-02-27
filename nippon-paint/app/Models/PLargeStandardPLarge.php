<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PLargeStandardPLarge extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function p_large()
    {
        return $this->belongsTo(PLarge::class);
    }

    public static function getNewEntityArray($params)
    {
        $models = [];
        foreach ($params as $param){
            $models[] = new static($param);
        }
        return $models;
    }
}
