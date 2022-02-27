<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PBuildingMaterial extends Model
{
    protected $touches = ['p_buildings'];

    public function p_buildings()
    {
        return $this->belongsToMany(PBuilding::class);
    }
}
