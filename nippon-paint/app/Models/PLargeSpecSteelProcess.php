<?php

namespace App\Models;

class PLargeSpecSteelProcess extends PLargeSpecProcess
{
    protected $touches = ['p_large_spec_steel'];

    /**
     * プラント・鉄橋・鋼構造物リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function p_large_spec_steel()
    {
        return $this->belongsTo(PLargeSpecSteel::class);
    }

    /*
     * 一般塗料名称
     */
    public function getPLargeGeneralNameAttribute()
    {
        if($standard = $this->p_large_spec_steel->p_large_standard){
            $p_large_standard_p_large = $standard->p_large_standard_p_larges
                ->firstWhere('p_large_id', $this->p_large_id);
            if($p_large_standard_p_large){
                return $p_large_standard_p_large->general_name;
            }
        }
        return $this->p_large->general_name;
    }
}
