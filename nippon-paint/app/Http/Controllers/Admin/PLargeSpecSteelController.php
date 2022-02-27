<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StorePLargeSpecSteel;
use App\Models\PLargeSpecBridgeSearch;
use App\Models\PLargeSpecSteel;
use App\Models\PLargeSpecSteelSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PLargeSpecSteelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $spec_steels = PLargeSpecSteel::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/p_large/spec/steel/index', compact('spec_steels', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spec_steel = new PLargeSpecSteel;
        return view('admin/p_large/spec/steel/edit', compact('spec_steel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePLargeSpecSteel $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePLargeSpecSteel $request)
    {
        $result = DB::transaction(function () use ($request) {
            try {
                $spec_steel = new PLargeSpecSteel;
                $spec_steel->fill($request->all())->save();
                $spec_steel->saveRelations();
                return redirect('admin/product/large/specification/steel')->with('flash_message', '登録しました。');
            } catch (\Exception $e) {
                return redirect('admin/product/large/specification/steel/create')->with('error_message', $e->getMessage());
            }
        });

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PLargeSpecSteel $spec_steel
     * @return \Illuminate\Http\Response
     */
    public function edit(PLargeSpecSteel $spec_steel)
    {
        return view('admin/p_large/spec/steel/edit', compact('spec_steel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePLargeSpecSteel $request
     * @param PLargeSpecSteel $spec_steel
     * @return \Illuminate\Http\Response
     */
    public function update(StorePLargeSpecSteel $request, PLargeSpecSteel $spec_steel)
    {
        $result = DB::transaction(function () use ($request, $spec_steel) {
            try {
                $spec_steel->fill($request->all())->save();
                $spec_steel->saveRelations();
                return redirect('admin/product/large/specification/steel')->with('flash_message', '更新しました。');
            } catch (\Exception $e) {
                return redirect()->back()->with('error_message', '更新に失敗しました。');
            }
        });

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PLargeSpecSteel $spec_steel
     * @return \Illuminate\Http\Response
     */
    public function delete(PLargeSpecSteel $spec_steel)
    {
        $result = DB::transaction(function () use ($spec_steel) {
            try {
                $spec_steel->delete();
                return redirect('admin/product/large/specification/steel')->with('flash_message', '削除しました。');
            } catch (\Exception $e) {
                return redirect('admin/product/large/specification/steel')->with('error_message', '削除に失敗しました。');
            }
        });

        return $result;
    }

    public function copy(Request $request)
    {
        $spec_steel = PLargeSpecSteel::find($request->spec_steel);

        return view('admin/p_large/spec/steel/edit', compact('spec_steel'));
    }

    public function preview(PLargeSpecSteel $spec_steel)
    {
        $bridge_search = new PLargeSpecBridgeSearch();
        $steel_search = new PLargeSpecSteelSearch();

        return view('front/products/large/specification-steele/detail', compact('spec_steel', 'bridge_search', 'steel_search'));
    }
}
