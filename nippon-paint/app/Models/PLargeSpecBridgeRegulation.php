<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PLargeSpecBridgeRegulation extends Model
{
    /**
     * 仕様リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function p_large_spec_bridges()
    {
        return $this->belongsToMany(PLargeSpecBridge::class);
    }
}
