<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;

class PLargeSpecBridge extends PLargeSpec
{
    use Sortable;

    public $sortable = ['status', 'updated_at'];
    public $guarded = [
        'documents',
        'instructions',
        'section_ids',
        'processes',
        'coated_matters',
        'paint_points',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            foreach ($model->p_large_spec_bridge_processes()->get() as $child) {
                $child->delete();
            }
            foreach ($model->p_large_spec_bridge_sections()->get() as $child) {
                $child->delete();
            }
            $model->p_large_spec_bridge_coated_matters()->detach();
            $model->p_large_spec_bridge_paint_points()->detach();
            $model->documents()->detach();
            $model->instructions()->detach();
        });
    }

    public function saveRelations()
    {
        $this->p_large_spec_bridge_coated_matters()->sync($this->requests['coated_matters']);
        $this->p_large_spec_bridge_paint_points()->sync($this->requests['paint_points']);
        $this->documents()->sync($this->requests['documents']);
        $this->instructions()->sync($this->requests['instructions']);
        $this->p_large_spec_bridge_processes()->delete();
        if(isset($this->requests['processes'])){
            $this->p_large_spec_bridge_processes()->saveMany(PLargeSpecBridgeProcess::getNewEntityArray($this->requests['processes']));
        }
        $this->p_large_spec_bridge_sections()->delete();
        if(isset($this->requests['section_ids'])){
            $this->p_large_spec_bridge_sections()
                ->saveMany(PLargeSpecBridgeSection::getNewEntityArray($this->requests['section_ids']));
        }
    }

    public function instructions()
    {
        return $this->belongsToMany(Document::class, 'instruction_p_large_spec_bridge', 'p_large_spec_bridge_id', 'document_id')
            ->withPivot('sort')
            ->orderBy('pivot_sort')
            ->withTimestamps();
    }

    public function published_instructions()
    {
        return $this->belongsToMany(Document::class, 'instruction_p_large_spec_bridge', 'p_large_spec_bridge_id', 'document_id')
            ->published()
            ->withPivot('sort')
            ->orderBy('pivot_sort');
    }

    public function p_large_spec_bridge_sections()
    {
        return $this->hasMany(PLargeSpecBridgeSection::class);
    }

    /**
     * 塗装工程リレーション
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function p_large_spec_bridge_processes()
    {
        return $this->hasMany(PLargeSpecBridgeProcess::class)->orderBy('sort');
    }

    /**
     * 被塗物リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function p_large_spec_bridge_coated_matters()
    {
        return $this->belongsToMany(PLargeSpecBridgeCoatedMatter::class)->withTimestamps();
    }

    /**
     * 塗装箇所リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function p_large_spec_bridge_paint_points()
    {
        return $this->belongsToMany(PLargeSpecBridgePaintPoint::class)->withTimestamps();
    }

    /**
     * 被塗物リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getCoatedMatterList()
    {
        return PLargeSpecBridgeCoatedMatter::all()->pluck('name', 'id');
    }

    /**
     * 塗装箇所リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getPaintPointList()
    {
        return PLargeSpecBridgePaintPoint::all()->pluck('name', 'id');
    }

    /**
     * 仕様規格リストを返す
     * @return \Illuminate\Support\Collection
     */
    public static function getStandardList()
    {
        return PLargeStandard::query()
            ->where('p_large_standard_category_id', self::BRIDGE)
            ->orWhere('p_large_standard_category_id', self::CONCRETE)
            ->get()
            ->pluck('standard_full_name', 'id')
            ->prepend('日本ペイント民間規格', 0);
    }

    public function getValuesArray($field)
    {
        $relation_name = 'p_large_spec_bridge_' . $field;
        $value_str = $this->$relation_name->implode('id', ',');
        return collect(explode(',', old($field, $value_str)));
    }

    /**
     * 塗装工程の取得
     * @return \Illuminate\Support\Collection
     */
    public function getProcessesArray()
    {
        $processes = collect(old('processes', $this->p_large_spec_bridge_processes));
        return self::mapProcessesArray($processes);
    }

    /**
     * 検索スコープ
     * @param $query
     * @param $params
     */
    public function scopeSearch($query, $params)
    {
        if (isset($params['p_large_standard_id'])) {
            $query->where('p_large_standard_id', $params['p_large_standard_id']);
        }
        if (isset($params['section_id'])) {
            $query->whereHas('p_large_spec_bridge_sections', function ($q) use ($params) {
                $q->where('section_id', $params['section_id']);
            });
        }
        if (isset($params['p_large_spec_bridge_coated_matter_id'])) {
            $query->whereHas('p_large_spec_bridge_coated_matters', function ($query) use ($params) {
                $query->where('p_large_spec_bridge_coated_matter_id', $params['p_large_spec_bridge_coated_matter_id']);
            });
        }
        if (isset($params['p_large_spec_bridge_paint_point_id'])) {
            $query->whereHas('p_large_spec_bridge_paint_points', function ($query) use ($params) {
                $query->where('p_large_spec_bridge_paint_point_id', $params['p_large_spec_bridge_paint_point_id']);
            });
        }
        if (isset($params['keyword'])) {
            $query->where('name', 'like', '%' . $params['keyword'] . '%');
        }
    }

    /**
     * 検索スコープ（フロント）
     * @param $query
     * @param $params
     */
    public function scopeSearchFront($query, $params)
    {
        if (isset($params['standard']) && is_array($params['standard'])) {
            $query->whereIn('p_large_standard_id', $params['standard']);
        }
        if (isset($params['section']) && is_array($params['section'])) {
            $query->whereHas('p_large_spec_bridge_sections', function ($q) use ($params) {
                $q->whereIn('section_id', $params['section']);
            });
        }
        if (isset($params['coated_matter']) && is_array($params['coated_matter'])) {
            $query->whereHas('p_large_spec_bridge_coated_matters', function ($q) use ($params) {
                $q->whereIn('p_large_spec_bridge_coated_matter_id', $params['coated_matter']);
            });
        }
        if (isset($params['paint_point']) && is_array($params['paint_point'])) {
            $query->whereHas('p_large_spec_bridge_paint_points', function ($q) use ($params) {
                $q->whereIn('p_large_spec_bridge_paint_point_id', $params['paint_point']);
            });
        }
    }

    /**
     * 製品の関連資料が存在するかをチェックする
     * @param $spec_bridge
     * @return bool
     */
    public function checkPublishedInstructions($spec_bridge)
    {
        foreach ($spec_bridge->p_large_spec_bridge_processes as $process) {
            if ($process->p_large && $process->p_large->published_instructions->isNotEmpty()) {
                return true;
            }
        }

        return false;
    }
}
