<?php

namespace App\Http\Controllers\Front\Api;

use App\Models\PAutomotiveSearch;
use App\Models\PBuildingDocumentSearch;
use App\Models\PBuildingSearch;
use App\Models\PLargeSpecBridgeSearch;
use App\Models\PLargeSpecSteelSearch;
use Illuminate\Http\Request;

class CountController extends ApiController
{
    public function building(Request $request)
    {
        if($request->has('parent_category')){
            $p_building_search = new PBuildingSearch($request->all(), ['parent_category' => $request->get('parent_category')]);
        }else{
            $p_building_search = new PBuildingSearch($request->all());
        }
        return $p_building_search->totalCount();
    }

    public function buildingCatalog(Request $request)
    {
        $p_building_search = new PBuildingDocumentSearch($request->all());
        return $p_building_search->getCount();
    }

    public function automotive(Request $request)
    {
        if($request->has('parent_category')){
            $p_automotive_search = new PAutomotiveSearch($request->all(), ['parent_category' => $request->get('parent_category')]);
        }else{
            $p_automotive_search = new PAutomotiveSearch($request->all());
        }
        return $p_automotive_search->totalCount();
    }

    public function largeSpecBridge(Request $request)
    {
        $bridge_search = new PLargeSpecBridgeSearch($request->all());
        return $bridge_search->totalCount();
    }

    public function largeSpecSteel(Request $request)
    {
        $steel_search = new PLargeSpecSteelSearch($request->all());
        return $steel_search->totalCount();
    }
}
