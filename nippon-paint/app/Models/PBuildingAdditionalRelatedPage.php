<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PBuildingAdditionalRelatedPage extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function getNewEntityArray($params)
    {
        $models = [];
        foreach ($params as $param){
            $models[] = new static($param);
        }
        return $models;
    }
}
