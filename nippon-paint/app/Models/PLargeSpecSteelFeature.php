<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PLargeSpecSteelFeature extends Model
{
    public function p_large_spec_steels()
    {
        return $this->belongsToMany(PLargeSpecSteel::class);
    }
}
