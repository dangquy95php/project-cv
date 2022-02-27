<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Network extends PublicationModel
{
    use Sortable;
    public $sortable = ['id', 'updated_at'];

    protected $fillable = [
        'id',
        'building_type',
        'name',
        'zip',
        'pref_id',
        'city',
        'block',
        'building',
        'tel',
        'fax',
        'googlemap',
        'remark',
        'status',
        'created_at',
        'updated_at',
    ];

    const HEADQUARTERS = 1;
    const BRANCH = 2;
    const SALES_OFFICE = 3;
    const FACTORY = 4;
    const OFFICE = 5;

    const BUILDING_TYPE = [
        self::HEADQUARTERS => '本社所在地',
        self::BRANCH => '支店',
        self::SALES_OFFICE => '営業所',
        self::FACTORY => '工場',
        self::OFFICE => '事務所'
    ];

    public function pref()
    {
        return $this->belongsTo('App\Models\Pref');
    }

    public function getStatusLabelAttribute()
    {
        return parent::getStatusLabelAttribute();
    }

    public function getBuildingTypeLabelAttribute()
    {
        if (!$this->building_type) {
            return null;
        }
        return self::BUILDING_TYPE[$this->building_type];
    }

    public function scopeSearch($query, $params)
    {
        if (isset($params['building_type'])) {
            $query->where('building_type', '=', $params['building_type']);
        }
        if (isset($params['name'])) {
            $query->where('name', 'like', '%'.$params['name'].'%');
        }
        if (isset($params['status'])) {
            $query->where('status', '=', $params['status']);
        }
    }
}
