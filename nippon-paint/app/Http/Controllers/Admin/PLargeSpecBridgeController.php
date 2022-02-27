<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StorePLargeSpecBridge;
use App\Models\PLargeSpecBridge;
use App\Models\PLargeSpecBridgeSearch;
use App\Models\PLargeSpecSteelSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PLargeSpecBridgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $spec_bridges = PLargeSpecBridge::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/p_large/spec/bridge/index', compact('spec_bridges', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spec_bridge = new PLargeSpecBridge;
        return view('admin/p_large/spec/bridge/edit', compact('spec_bridge'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePLargeSpecBridge $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePLargeSpecBridge $request)
    {
        $result = DB::transaction(function () use ($request) {
            try {
                $spec_bridge = new PLargeSpecBridge;
                $spec_bridge->fill($request->all())->save();
                $spec_bridge->saveRelations();
                return redirect('admin/product/large/specification/bridge')->with('flash_message', '登録しました。');
            } catch (\Exception $e) {
                return redirect('admin/product/large/specification/bridge/create')->with('error_message', '登録に失敗しました。');
            }
        });

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PLargeSpecBridge $spec_bridge
     * @return \Illuminate\Http\Response
     */
    public function edit(PLargeSpecBridge $spec_bridge)
    {
        return view('admin/p_large/spec/bridge/edit', compact('spec_bridge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePLargeSpecBridge $request
     * @param PLargeSpecBridge $spec_bridge
     * @return \Illuminate\Http\Response
     */
    public function update(StorePLargeSpecBridge $request, PLargeSpecBridge $spec_bridge)
    {
        $result = DB::transaction(function () use ($request, $spec_bridge) {
            try {
                $spec_bridge->fill($request->all())->save();
                $spec_bridge->saveRelations();
                return redirect('admin/product/large/specification/bridge')->with('flash_message', '更新しました。');
            } catch (\Exception $e) {
                return redirect()->back()->with('error_message', '更新に失敗しました。');
            }
        });

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PLargeSpecBridge $spec_bridge
     * @return \Illuminate\Http\Response
     */
    public function delete(PLargeSpecBridge $spec_bridge)
    {
        $result = DB::transaction(function () use ($spec_bridge) {
            try {
                $spec_bridge->delete();
                return redirect('admin/product/large/specification/bridge')->with('flash_message', '削除しました。');
            } catch (\Exception $e) {
                return redirect('admin/product/large/specification/bridge')->with('error_message', '削除に失敗しました。');
            }
        });

        return $result;
    }

    public function copy(Request $request)
    {
        $spec_bridge = PLargeSpecBridge::find($request->spec_bridge);

        return view('admin/p_large/spec/bridge/edit', compact('spec_bridge'));
    }

    public function preview(PLargeSpecBridge $spec_bridge)
    {
        $bridge_search = new PLargeSpecBridgeSearch();
        $steel_search = new PLargeSpecSteelSearch();

        return view('front/products/large/specification-bridge/detail', compact('spec_bridge', 'bridge_search', 'steel_search'));
    }
}
