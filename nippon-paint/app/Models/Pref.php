<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    public function network()
    {
        return $this->hasMany('App\Models\Network');
    }
}
