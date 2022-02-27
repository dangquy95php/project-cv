<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class PublicationModel extends Model
{
    const TO_PUBLIC = 1; // 公開ステータスID
    const TO_PRIVATE = 2; // 非公開ステータスID
    const TO_DRAFT = 3; // 下書きステータスID

    const STATUS_LIST = [
        self::TO_PUBLIC => '公開',
        self::TO_PRIVATE => '非公開',
        self::TO_DRAFT => '下書き',
    ];

    public $status_field = 'status';

    public function getStatusLabelAttribute()
    {
        return self::STATUS_LIST[$this->{$this->status_field}];
    }

    public function getIsPublishedAttribute()
    {
        return $this->status === self::TO_PUBLIC;
    }

    public function scopePublished($query, $status_field = null)
    {
        $query->where($status_field ?? $this->status_field, self::TO_PUBLIC);
    }
}
