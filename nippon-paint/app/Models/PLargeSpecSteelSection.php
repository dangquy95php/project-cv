<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PLargeSpecSteelSection extends Model
{
    public $guarded = ['id', 'created_at', 'updated_at'];

    public static function getNewEntityArray($params)
    {
        $models = [];
        foreach ($params as $param) {
            $models[] = new static(['section_id' => $param]);
        }
        return $models;
    }

    public function getSectionLabelAttribute()
    {
        return PLargeSpec::SECTIONS[$this->section_id];
    }
}
