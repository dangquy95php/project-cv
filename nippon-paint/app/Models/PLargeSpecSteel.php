<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;

class PLargeSpecSteel extends PLargeSpec
{
    use Sortable;

    public $sortable = ['status', 'updated_at'];
    public $guarded = [
        'documents',
        'instructions',
        'section_ids',
        'processes',
        'features',
        'systems',
        'solvent_types',
        'points',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            foreach ($model->p_large_spec_steel_processes()->get() as $child) {
                $child->delete();
            }
            foreach ($model->p_large_spec_steel_sections()->get() as $child) {
                $child->delete();
            }
            $model->p_large_spec_steel_features()->detach();
            $model->p_large_spec_steel_systems()->detach();
            $model->p_large_spec_steel_solvent_types()->detach();
            $model->p_large_spec_steel_points()->detach();
            $model->documents()->detach();
            $model->instructions()->detach();
        });
    }

    public function saveRelations()
    {
        $this->p_large_spec_steel_features()->sync($this->requests['features']);
        $this->p_large_spec_steel_systems()->sync($this->requests['systems']);
        $this->p_large_spec_steel_solvent_types()->sync($this->requests['solvent_types']);
        $this->p_large_spec_steel_points()->sync($this->requests['points']);
        $this->documents()->sync($this->requests['documents']);
        $this->instructions()->sync($this->requests['instructions']);

        // hasManyのフィールドを保存
        $this->p_large_spec_steel_processes()->delete();
        if(isset($this->requests['processes'])){
            $this->p_large_spec_steel_processes()
                ->saveMany(PLargeSpecSteelProcess::getNewEntityArray($this->requests['processes']));
        }
        $this->p_large_spec_steel_sections()->delete();
        if(isset($this->requests['section_ids'])){
            $this->p_large_spec_steel_sections()
                ->saveMany(PLargeSpecSteelSection::getNewEntityArray($this->requests['section_ids']));
        }
    }

    public function instructions()
    {
        return $this->belongsToMany(Document::class, 'instruction_p_large_spec_steel', 'p_large_spec_steel_id', 'document_id')
            ->withPivot('sort')
            ->orderBy('pivot_sort')
            ->withTimestamps();
    }

    public function published_instructions()
    {
        return $this->belongsToMany(Document::class, 'instruction_p_large_spec_steel', 'p_large_spec_steel_id', 'document_id')
            ->published()
            ->withPivot('sort')
            ->orderBy('pivot_sort');
    }

    public function p_large_spec_steel_sections()
    {
        return $this->hasMany(PLargeSpecSteelSection::class);
    }

    /**
     * 塗装工程リレーション
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function p_large_spec_steel_processes()
    {
        return $this->hasMany(PLargeSpecSteelProcess::class)->orderBy('sort');
    }

    /**
     * 特徴リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function p_large_spec_steel_features()
    {
        return $this->belongsToMany(PLargeSpecSteelFeature::class)->withTimestamps();
    }

    /**
     * 塗料系統リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function p_large_spec_steel_systems()
    {
        return $this->belongsToMany(PLargeSpecSteelSystem::class)->withTimestamps();
    }

    /**
     * 溶剤種別リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function p_large_spec_steel_solvent_types()
    {
        return $this->belongsToMany(PLargeSpecSteelSolventType::class)->withTimestamps();
    }

    /**
     * 適用部位リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function p_large_spec_steel_points()
    {
        return $this->belongsToMany(PLargeSpecSteelPoint::class)->withTimestamps();
    }

    /**
     * 特徴リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getFeatureList()
    {
        return PLargeSpecSteelFeature::all()->pluck('name', 'id');
    }

    /**
     * 塗料系統リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getSystemList()
    {
        return PLargeSpecSteelSystem::all()->pluck('name', 'id');
    }

    /**
     * 溶剤種別リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getSolventTypeList()
    {
        return PLargeSpecSteelSolventType::all()->pluck('name', 'id');
    }

    /**
     * 適用部位リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getPointList()
    {
        return PLargeSpecSteelPoint::all()->pluck('name', 'id');
    }

    /**
     * 仕様規格リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getStandardList()
    {
        return PLargeStandard::query()
            ->where('p_large_standard_category_id', self::PLANT)
            ->orWhere('p_large_standard_category_id', self::STEEL)
            ->orWhere('p_large_standard_category_id', self::STEEL_STRUCTURE)
            ->get()
            ->pluck('standard_full_name', 'id')
            ->prepend('日本ペイント民間規格', 0);
    }

    /**
     * 配列を取得する
     * @param $field
     * @return \Illuminate\Support\Collection
     */
    public function getValuesArray($field)
    {
        $relation_name = 'p_large_spec_steel_' . $field;
        $value_str = $this->$relation_name->implode('id', ',');
        return collect(explode(',', old($field, $value_str)));
    }

    /**
     * 塗装工程の取得
     * @return \Illuminate\Support\Collection
     */
    public function getProcessesArray()
    {
        $processes = collect(old('processes', $this->p_large_spec_steel_processes));
        return self::mapProcessesArray($processes);
    }

    /**
     * 検索スコープ
     * @param $query
     * @param $params
     */
    public function scopeSearch($query, $params)
    {
        if (isset($params['p_large_spec_steel_feature_id'])) {
            $query->whereHas('p_large_spec_steel_features', function ($query) use ($params) {
                $query->where('p_large_spec_steel_feature_id', $params['p_large_spec_steel_feature_id']);
            });
        }
        if (isset($params['section_id'])) {
            $query->whereHas('p_large_spec_steel_sections', function ($q) use ($params) {
                $q->where('section_id', $params['section_id']);
            });
        }
        if (isset($params['p_large_spec_steel_system_id'])) {
            $query->whereHas('p_large_spec_steel_systems', function ($query) use ($params) {
                $query->where('p_large_spec_steel_system_id', $params['p_large_spec_steel_system_id']);
            });
        }
        if (isset($params['p_large_spec_steel_solvent_type_id'])) {
            $query->whereHas('p_large_spec_steel_solvent_types', function ($query) use ($params) {
                $query->where('p_large_spec_steel_solvent_type_id', $params['p_large_spec_steel_solvent_type_id']);
            });
        }
        if (isset($params['p_large_spec_steel_point_id'])) {
            $query->whereHas('p_large_spec_steel_points', function ($query) use ($params) {
                $query->where('p_large_spec_steel_point_id', $params['p_large_spec_steel_point_id']);
            });
        }
        if (isset($params['keyword'])) {
            $query->where('name', 'like', '%'.$params['keyword'].'%');
        }
    }

    /**
     * 検索スコープ（フロント）
     * @param $query
     * @param $params
     */
    public function scopeSearchFront($query, $params)
    {
        if(isset($params['section']) && is_array($params['section'])){
            $query->whereHas('p_large_spec_steel_sections', function ($q) use ($params) {
                $q->whereIn('section_id', $params['section']);
            });
        }
        if(isset($params['system']) && is_array($params['system'])){
            $query->whereHas('p_large_spec_steel_systems', function ($q) use ($params) {
                $q->whereIn('p_large_spec_steel_system_id', $params['system']);
            });
        }
        if(isset($params['solvent_type']) && is_array($params['solvent_type'])){
            $query->whereHas('p_large_spec_steel_solvent_types', function ($q) use ($params) {
                $q->whereIn('p_large_spec_steel_solvent_type_id', $params['solvent_type']);
            });
        }
        if(isset($params['point']) && is_array($params['point'])){
            $query->whereHas('p_large_spec_steel_points', function ($q) use ($params) {
                $q->whereIn('p_large_spec_steel_point_id', $params['point']);
            });
        }
        if(isset($params['feature']) && is_array($params['feature'])){
            $query->whereHas('p_large_spec_steel_features', function ($q) use ($params) {
                $q->whereIn('p_large_spec_steel_feature_id', $params['feature']);
            });
        }
    }

    /**
     * 製品の関連資料が存在するかをチェックする
     * @param $spec_steel
     * @return bool
     */
    public function checkPublishedInstructions($spec_steel)
    {
        foreach ($spec_steel->p_large_spec_steel_processes as $process) {
            if ($process->p_large && $process->p_large->published_instructions->isNotEmpty()) {
                return true;
            }
        }

        return false;
    }
}
