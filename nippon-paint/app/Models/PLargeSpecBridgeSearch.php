<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PLargeSpecBridgeSearch extends Model
{
    private $requests = [];
    private $slug;

    public $standards;
    public $sections = [];
    public $coated_matters;
    public $paint_points;

    private $section_count;

    public function __construct($requests = [], $slug = null)
    {
        parent::__construct();
        $this->requests = collect($requests);
        if($slug){
            $this->slug = $slug;
        }

        $this->standards = PLargeStandard::getSortedStandards();
        $this->sections = PLargeSpecBridge::SECTIONS;
        $this->coated_matters = PLargeSpecBridgeCoatedMatter::all();
        $this->paint_points = PLargeSpecBridgePaintPoint::all();

        $this->countSection();
        $this->countStandard();
        $this->countBtm('coated_matter');
        $this->countBtm('paint_point');

        $this->setCheck('standard');
        $this->setCheck('coated_matter');
        $this->setCheck('paint_point');
    }

    public function totalCount()
    {
        if($this->slug){
            return self::getQueryToPublic()->count();
        }
        return $this->getQuery()->count();
    }

    private function countStandard()
    {
        $query = self::getQueryToPublic()
            ->select(DB::raw("p_large_standard_id as id, count(*) as count"))
            ->groupBy("p_large_standard_id")
            ->where("p_large_standard_id", '!=', 0);

        $this->setDisableClass($query->get(), 'standards');
    }

    /*
     * belongsToManyリレーションのアイテムをカウント
     */
    private function countBtm($relation)
    {
        $query = DB::table("p_large_spec_bridge_p_large_spec_bridge_{$relation}")
            ->join('p_large_spec_bridges', "p_large_spec_bridge_p_large_spec_bridge_{$relation}.p_large_spec_bridge_id", 'p_large_spec_bridges.id')
            ->select(DB::raw("p_large_spec_bridge_p_large_spec_bridge_{$relation}.p_large_spec_bridge_{$relation}_id as id, count(*) as count"))
            ->where('p_large_spec_bridges.status', PLargeSpecBridge::TO_PUBLIC)
            ->groupBy("p_large_spec_bridge_p_large_spec_bridge_{$relation}.p_large_spec_bridge_{$relation}_id");

        $this->setDisableClass($query->get(), Str::plural($relation));
    }

    /*
     * 塗装区分
     */
    private function countSection()
    {
        $this->section_count = DB::table("p_large_spec_bridge_sections")
            ->join('p_large_spec_bridges', 'p_large_spec_bridge_id', 'p_large_spec_bridges.id')
            ->select(DB::raw("p_large_spec_bridge_sections.section_id as id, count(*) as count"))
            ->where('p_large_spec_bridges.status', PLargeSpecBridge::TO_PUBLIC)
            ->groupBy('p_large_spec_bridge_sections.section_id')
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
        return PLargeSpecBridge::query()
            ->published('p_large_spec_bridges.status');
    }

    private function getQuery()
    {
        $query = self::getQueryToPublic();
        if($this->slug){
            $query->whereHas('p_large_standard', function ($q) {
                $q->where('slug', $this->slug);
            });
        }elseif($this->requests){
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
        if ($this->requests->has('standard') && is_array($this->requests->get('standard'))){
            foreach($this->requests->get('standard') as $standard_id){
                if($standard = $this->standards->firstWhere('id', $standard_id)){
                    $cons[] = $standard->standard_name;
                }
            }
        }
        if ($this->requests->has('section') && is_array($this->requests->get('section'))){
            foreach($this->requests->get('section') as $section_id){
                if(array_key_exists($section_id, $this->sections)){
                    $cons[] = $this->sections[$section_id];
                }
            }
        }
        if ($this->requests->has('coated_matter') && is_array($this->requests->get('coated_matter'))){
            foreach($this->requests->get('coated_matter') as $coated_matter_id){
                if($coated_matter = $this->coated_matters->firstWhere('id', $coated_matter_id)){
                    $cons[] = $coated_matter->name;
                }
            }
        }
        if ($this->requests->has('paint_point') && is_array($this->requests->get('paint_point'))){
            foreach($this->requests->get('paint_point') as $paint_point_id){
                if($paint_point = $this->paint_points->firstWhere('id', $paint_point_id)){
                    $cons[] = $paint_point->name;
                }
            }
        }
        if(count($cons) > 0){
            return implode(', ', $cons);
        }
        return '全て';
    }
}
