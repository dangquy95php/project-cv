<?php

namespace App\Models;

use App\Traits\KanaSearch;
use App\Traits\InitialSearch;
use App\Traits\S3Handler;
use Kyslik\ColumnSortable\Sortable;

class PLarge extends Product
{
    use InitialSearch{
        InitialSearch::__construct as InitialConstructor;
    }

    use Sortable;
    use KanaSearch {
        KanaSearch::__construct as KanaConstructor;
    }

    public $sortable = ['id', 'updated_at', 'status'];
    protected $guarded = [
        'created_at',
        'updated_at',
        'documents',
        'systems',
        'diluents',
    ];

    public static $thumbnail_path = 'product/large/thumbnail';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->KanaConstructor();
        $this->InitialConstructor();
    }

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($p_large) {
            $p_large->p_large_diluents()->sync($p_large->requests['diluents']);
            $p_large->p_large_systems()->sync($p_large->requests['systems']);
            $p_large->documents()->sync($p_large->requests['documents']);
            if ($p_large->getOriginal('thumbnail') && $p_large->thumbnail !== $p_large->getOriginal('thumbnail')) {
                S3Handler::deleteFromS3(self::$thumbnail_path . '/' . $p_large->getOriginal('thumbnail'));
            }
        });
        static::deleting(function ($p_large) {
            $p_large->p_large_diluents()->detach();
            $p_large->p_large_systems()->detach();
            $p_large->documents()->detach();

            // 建築製品に紐づいていた場合中間テーブルを削除
            $sealer_pivots = PBuildingSealer::query()
                ->where('product_id', $p_large->id)->where('category_id', self::LARGE)->get();
            $middle_coat_pivots = PBuildingMiddleCoat::query()
                ->where('product_id', $p_large->id)->where('category_id', self::LARGE)->get();
            $topcoat_pivots = PBuildingTopcoat::query()
                ->where('product_id', $p_large->id)->where('category_id', self::LARGE)->get();

            foreach ($sealer_pivots as $pivot) {
                $pivot->delete();
            }
            foreach ($middle_coat_pivots as $pivot) {
                $pivot->delete();
            }
            foreach ($topcoat_pivots as $pivot) {
                $pivot->delete();
            }
        });
        static::deleted(function($p_large) {
            if ($p_large->thumbnail) {
                S3Handler::deleteFromS3(self::$thumbnail_path . '/' . $p_large->thumbnail);
            }
        });
    }

    public function p_large_systems()
    {
        return $this->belongsToMany(PLargeSystem::class)->withTimestamps();
    }

    public function p_large_diluents()
    {
        return $this->belongsToMany(PLargeDiluent::class)->withTimestamps();
    }

    public function p_large_standards()
    {
        return $this->belongsToMany(PLargeStandard::class, PLargeStandardPLarge::class, 'p_large_id', 'p_large_standard_id')
            ->withPivot('p_large_standard_id', 'general_name', 'general_standard_number');
    }

    public function p_large_standards_with_specs()
    {
        return $this->belongsToMany(PLargeStandard::class, PLargeStandardPLarge::class, 'p_large_id', 'p_large_standard_id')
            ->whereHas('p_large_spec_bridges', function ($q) {
                $q->published()->whereHas('p_large_spec_bridge_processes', function ($q) {
                    $q->where('p_large_id', $this->id);
                });
            })
            ->orWhereHas('p_large_spec_steels', function ($q) {
                $q->published()->whereHas('p_large_spec_steel_processes', function ($q) {
                    $q->where('p_large_id', $this->id);
                });
            })
            ->withPivot('p_large_standard_id', 'general_name', 'general_standard_number');
    }

    public function p_large_solvent_type()
    {
        return $this->belongsTo(PLargeSolventType::class, 'solvent_type');
    }

    public function published_instructions()
    {
        return $this->belongsToMany(Document::class)
            ->published()
            ->where('document_category_id',  DocumentCategory::LARGE_INSTRUCTION);
    }

    public function scopeSearch($query, $params)
    {
        if(isset($params['capital_kana'])){
            $query->searchKana('product_name_kana', $params['capital_kana']);
        }
        if (isset($params['p_large_system_id'])) {
            $query->whereHas('p_large_systems', function ($query) use ($params) {
                $query->where('p_large_system_id', $params['p_large_system_id']);
            });
        }
        if (isset($params['product_name'])) {
            $query->where('product_name', 'like', '%' . $params['product_name'] . '%');
        }
    }

    public static function getSelectedStandardPLarge($slug)
    {
        $p_larges = PLarge::query()
            ->whereHas('p_large_standards', function ($p_larges) use ($slug) {
                $p_larges->where('slug', $slug)
                    ->whereNotNull('p_large_standard_p_larges.p_large_standard_id');
            })
            ->published('p_larges.status');

        return $p_larges;
    }

    public static function getSelectedSystemPLarge($slug)
    {
        $p_larges = PLarge::query()
            ->whereHas('p_large_systems', function ($p_larges) use ($slug) {
                $p_larges->where('slug', $slug);
            })
            ->published('p_larges.status');

        return $p_larges;
    }

    public static function getDocumentsList()
    {
        return Document::getAttachableDocumentsList(Product::LARGE);
    }

    public static function getSystemList()
    {
        return PLargeSystem::all()->pluck('name', 'id');
    }

    public static function getSolventTypeList()
    {
        return PLargeSolventType::all()->pluck('name', 'id');
    }

    public static function getDiluentList()
    {
        return PLargeDiluent::all()->pluck('name', 'id');
    }

    public function getSystemsArray()
    {
        $value_str = $this->p_large_systems->implode('id', ',');
        return collect(explode(',', old('systems', $value_str)));
    }

    public function getDiluentsArray()
    {
        $value_str = $this->p_large_diluents->implode('id', ',');
        return collect(explode(',', old('diluents', $value_str)));
    }

    public function getSystemsAttribute()
    {
        return $this->p_large_systems->implode('name', '、');
    }

    public function getThumbnailUrlAttribute()
    {
        return S3Handler::getFileUrl(self::$thumbnail_path . '/' . old('thumbnail', $this->thumbnail));
    }

    public function getThumbnailUrlFrontAttribute()
    {
        if($this->thumbnail){
            return S3Handler::getFileUrl(self::$thumbnail_path . '/' . $this->thumbnail);
        }
        return null;
    }

    /*
     * 日本ペイント民間規格の仕様を紐づける
     */
    public function getPrivateStandardAttribute()
    {
        return new PrivateStandard($this->id);
    }
}
