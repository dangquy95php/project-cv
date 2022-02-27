<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class PBuildingApplicablePaint extends Model
{
    protected $guarded = ['created_at', 'updated_at',];

    public static function getNewEntityArray($params)
    {
        $models = [];
        foreach ($params as $param){
            $explode = explode(':', $param);
            $models[] = new static(['category_id' => $explode[0], 'product_id' => $explode[1]]);
        }
        return $models;
    }
}
