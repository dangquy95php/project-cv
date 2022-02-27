<?php

namespace App\Http\Controllers\Front;

use App\Models\PLargePaintKanaSearch;
use Illuminate\Http\Request;
use App\Models\PLarge;
use App\Models\PLargeSystem;
use App\Models\PLargeStandard;

class PLargePaintController extends Controller
{
    private $systems;
    private $standards;

    public function __construct()
    {
        $this->systems = PLargeSystem::all();
        $this->standards = PLargeStandard::getSortedStandards();
    }

    public function index()
    {
        $systems = $this->systems;
        $standards = $this->standards;

        return view('front/products/large/paint/index', compact('systems', 'standards'));
    }

    public function standard_search(Request $request, $slug)
    {
        $systems = $this->systems;
        $standards = $this->standards;

        $selected_standard = PLargeStandard::query()
            ->where('slug', $slug)
            ->first();
        $p_larges = PLarge::getSelectedStandardPLarge($slug)
            ->paginate($request->input('limit') ?? 10)
            ->appends($request->except('page'));

        if ($p_larges->isEmpty()) {
            abort(404);
        }

        return view('front/products/large/paint/standard/index'
            , compact('systems', 'standards', 'selected_standard', 'p_larges'));
    }

    public function system_search(Request $request, $slug)
    {
        $systems = $this->systems;
        $standards = $this->standards;

        $selected_system = PLargeSystem::query()
            ->where('slug', $slug)
            ->first();
        $p_larges = PLarge::getSelectedSystemPLarge($slug)
            ->paginate($request->input('limit') ?? 10)
            ->appends($request->except('page'));

        if ($p_larges->isEmpty()) {
            abort(404);
        }

        return view('front/products/large/paint/system/index'
            , compact('systems', 'standards', 'selected_system', 'p_larges'));
    }

    public function initial_search(Request $request, $initial)
    {
        $systems = $this->systems;
        $standards = $this->standards;

        $p_large_paint_search = new PLargePaintKanaSearch($request->all(), ['initial' => $initial]);
        $p_larges = $p_large_paint_search->getProductsPerPage();
        if (!$p_large_paint_search->initial) {
            abort(404);
        }

        return view('front/products/large/paint/initial/index'
            , compact('systems', 'standards', 'p_larges', 'p_large_paint_search'));
    }

    public function show(PLarge $p_large)
    {
        if (!$p_large->is_published) {
            abort(404);
        }

        $systems = $this->systems;
        $standards = $this->standards;

        return view('front/products/large/detail', compact('systems', 'standards', 'p_large'));
    }
}
