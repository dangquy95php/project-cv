<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateStandard extends Model
{
    protected $fillable = ['id', 'standard_name'];
    protected $attributes = [
        'id' => 0,
        'standard_name' => '日本ペイント民間規格'
    ];

    private $p_large_id;

    public function __construct($p_large_id)
    {
        $this->p_large_id = $p_large_id;
        parent::__construct($this->attributes);
    }

    public function getRelatedSpecBridges($p_large_id)
    {
        return $this->hasMany(PLargeSpecBridge::class, 'p_large_standard_id')
            ->published()
            ->whereHas('p_large_spec_bridge_processes', function ($q) use ($p_large_id) {
                $q->where('p_large_id', $this->p_large_id);
            })->get();
    }

    public function getRelatedSpecSteels($p_large_id)
    {
        return $this->hasMany(PLargeSpecSteel::class, 'p_large_standard_id')
            ->published()
            ->whereHas('p_large_spec_steel_processes', function ($q) use ($p_large_id) {
                $q->where('p_large_id', $this->p_large_id);
            })->get();
    }
}
