<?php

namespace App\Http\Controllers\Front;

use App\Models\PLargeSpecBridge;
use App\Models\PLargeSpecBridgeSearch;
use App\Models\PLargeSpecSteel;
use App\Models\PLargeSpecSteelSearch;
use App\Models\PLargeStandard;
use Illuminate\Http\Request;

class PLargeSpecController extends Controller
{
    public function index()
    {
        $bridge_search = new PLargeSpecBridgeSearch();
        $steel_search = new PLargeSpecSteelSearch();
        return view('front/products/large/specification/index', compact('bridge_search', 'steel_search'));
    }

    public function bridgeStandardIndex(Request $request, $slug)
    {
        $standard = PLargeStandard::query()->where('slug', $slug)->first();
        $bridge_search = new PLargeSpecBridgeSearch($request->all(), $slug);
        $steel_search = new PLargeSpecSteelSearch();
        if (!$standard || !$standard->isBridge()) abort(404);

        $specs = $bridge_search->getSpecs();
        return view('front/products/large/specification-bridge/standard/index', compact('specs', 'standard', 'bridge_search', 'steel_search'));
    }

    public function bridgeIndex(Request $request)
    {
        $bridge_search = new PLargeSpecBridgeSearch($request->all());
        $steel_search = new PLargeSpecSteelSearch();
        $specs = $bridge_search->getSpecs();
        return view('front/products/large/specification-bridge/index', compact('bridge_search', 'steel_search', 'specs'));
    }

    public function steelIndex(Request $request)
    {
        $bridge_search = new PLargeSpecBridgeSearch();
        $steel_search = new PLargeSpecSteelSearch($request->all());
        $specs = $steel_search->getSpecs();
        return view('front/products/large/specification-steele/index', compact('bridge_search', 'steel_search', 'specs'));
    }

    public function bridgeDetail(PLargeSpecBridge $spec_bridge)
    {
        if (!$spec_bridge->is_published) {
            abort(404);
        }

        $bridge_search = new PLargeSpecBridgeSearch();
        $steel_search = new PLargeSpecSteelSearch();

        return view('front/products/large/specification-bridge/detail', compact('bridge_search', 'steel_search', 'spec_bridge'));
    }

    public function steelDetail(PLargeSpecSteel $spec_steel)
    {
        if (!$spec_steel->is_published) {
            abort(404);
        }

        $bridge_search = new PLargeSpecBridgeSearch();
        $steel_search = new PLargeSpecSteelSearch();

        return view('front/products/large/specification-steele/detail', compact('bridge_search', 'steel_search', 'spec_steel'));
    }
}
