<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PLargeSpecSteelSearch extends Model
{
    private $requests = [];

    public $sections = [];
    public $systems;
    public $solvent_types;
    public $points;
    public $features;

    private $section_count;

    public function __construct(array $requests = [])
    {
        parent::__construct();
        $this->requests = collect($requests);

        $this->sections = PLargeSpecSteel::SECTIONS;
        $this->systems = PLargeSpecSteelSystem::all();
        $this->solvent_types = PLargeSpecSteelSolventType::all();
        $this->points = PLargeSpecSteelPoint::all();
        $this->features = PLargeSpecSteelFeature::all();

        $this->countSection();
        $this->countBtm('system');
        $this->countBtm('solvent_type');
        $this->countBtm('point');
        $this->countBtm('feature');

        $this->setCheck('system');
        $this->setCheck('solvent_type');
        $this->setCheck('point');
        $this->setCheck('feature');
    }

    public function totalCount()
    {
        return $this->getQuery()->count();
    }

    /*
     * belongsToManyリレーションのアイテムをカウント
     */
    private function countBtm($relation)
    {
        $query = DB::table("p_large_spec_steel_p_large_spec_steel_{$relation}")
            ->join('p_large_spec_steels', "p_large_spec_steel_p_large_spec_steel_{$relation}.p_large_spec_steel_id", 'p_large_spec_steels.id')
            ->select(DB::raw("p_large_spec_steel_p_large_spec_steel_{$relation}.p_large_spec_steel_{$relation}_id as id, count(*) as count"))
            ->where('p_large_spec_steels.status', PLargeSpecSteel::TO_PUBLIC)
            ->groupBy("p_large_spec_steel_p_large_spec_steel_{$relation}.p_large_spec_steel_{$relation}_id");

        $this->setDisableClass($query->get(), Str::plural($relation));
    }

    /*
     * 塗装区分
     */
    private function countSection()
    {
        $this->section_count = DB::table("p_large_spec_steel_sections")
            ->join('p_large_spec_steels', 'p_large_spec_steel_id', 'p_large_spec_steels.id')
            ->select(DB::raw("p_large_spec_steel_sections.section_id as id, count(*) as count"))
            ->where('p_large_spec_steels.status', PLargeSpec::TO_PUBLIC)
            ->groupBy('p_large_spec_steel_sections.section_id')
            ->get();
    }

    public function isSectionDisable($key)
    {
        $count = $this->section_count->firstWhere('id', $key);
        return !($count && $count->count > 0);
    }

    public function isSectionChecked($key)
    {
        $count = $this->section_count->firstWhere('id', $key);
        if($count && $count->count > 0 && is_array($this->requests->get('section')) && in_array($key, $this->requests->get('section'))){
            return 'checked';
        }
        return '';
    }

    private function setDisableClass($counts, $relation)
    {
        $this->{$relation}->map(function ($item) use ($counts) {
            $count = $counts->firstWhere('id', $item->id)->count ?? 0;
            $item->is_disable = $count > 0 ? '' : 'is-disable';
            return $item;
        });
    }

    /*
     * チェックボックスを選択済みにする
     */
    private function setCheck($name)
    {
        $params = $this->requests->get($name);
        if(is_array($params)){
            $relation = Str::plural($name);
            $this->{$relation}->map(function ($item) use ($params) {
                $item->is_checked = (in_array($item->id, $params) && !$item->is_disable) ? 'checked' : '';
                return $item;
            });
        }
    }

    private static function getQueryToPublic()
    {
        return PLargeSpecSteel::query()
            ->published('p_large_spec_steels.status');
    }

    private function getQuery()
    {
        $query = self::getQueryToPublic();
        if($this->requests){
            $query->searchFront($this->requests->toArray());
        }
        return $query;
    }

    public function getSpecs()
    {
        return $this->getQuery()->paginate($this->requests->get('limit') ?? 10)
            ->appends($this->requests->except('page')->toArray());
    }

    public function getConditionsStr()
    {
        $cons = [];
        if ($this->requests->has('section') && is_array($this->requests->get('section'))){
            foreach($this->requests->get('section') as $section_id){
                if(array_key_exists($section_id, $this->sections)){
                    $cons[] = $this->sections[$section_id];
                }
            }
        }
        if ($this->requests->has('system') && is_array($this->requests->get('system'))){
            foreach($this->requests->get('system') as $system_id){
                if($system = $this->systems->firstWhere('id', $system_id)){
                    $cons[] = $system->name;
                }
            }
        }
        if ($this->requests->has('solvent_type') && is_array($this->requests->get('solvent_type'))){
            foreach($this->requests->get('solvent_type') as $solvent_type_id){
                if($solvent_type = $this->solvent_types->firstWhere('id', $solvent_type_id)){
                    $cons[] = $solvent_type->name;
                }
            }
        }
        if ($this->requests->has('point') && is_array($this->requests->get('point'))){
            foreach($this->requests->get('point') as $point_id){
                if($point = $this->points->firstWhere('id', $point_id)){
                    $cons[] = $point->name;
                }
            }
        }
        if ($this->requests->has('feature') && is_array($this->requests->get('feature'))){
            foreach($this->requests->get('feature') as $feature_id){
                if($feature = $this->features->firstWhere('id', $feature_id)){
                    $cons[] = $feature->name;
                }
            }
        }
        if(count($cons) > 0){
            return implode(', ', $cons);
        }
        return '全て';
    }
}
