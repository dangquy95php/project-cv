<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id', 'message_id', 'account_id', 'body'
    ];
}
