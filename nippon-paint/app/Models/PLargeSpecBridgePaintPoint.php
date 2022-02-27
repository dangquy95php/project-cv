<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PLargeSpecBridgePaintPoint extends Model
{
    public function p_large_spec_bridges()
    {
        return $this->belongsToMany(PLargeSpecBridge::class);
    }
}
