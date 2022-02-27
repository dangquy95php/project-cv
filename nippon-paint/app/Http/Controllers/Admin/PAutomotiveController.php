<?php

namespace App\Http\Controllers\Admin;

use App\Models\PAutomotive;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StorePAutomotive;
use Illuminate\Support\Facades\DB;

class PAutomotiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $p_automotives = PAutomotive::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/automotive_product/index', compact('p_automotives', 'request'));
    }

    public function create()
    {
        $p_automotive = new PAutomotive;
        return view('admin/automotive_product/edit', compact('p_automotive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePAutomotive $request)
    {
        $p_automotive = new PAutomotive;
        if ($p_automotive->fill($request->all())->save()) {
            $p_automotive->saveRelations();
            return redirect('admin/product/automotive')->with('flash_message', '登録しました。');
        }
        return redirect('admin/product/automotive/create')->with('error_message', '登録に失敗しました。');
    }

    /**
     * Edit the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function edit(PAutomotive $p_automotive)
    {
        return view('admin/automotive_product/edit', compact('p_automotive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePAutomotive $request, PAutomotive $p_automotive)
    {
        if ($p_automotive->fill($request->all())->save()) {
            $p_automotive->saveRelations();
            return redirect('admin/product/automotive')->with('flash_message', '更新しました。');
        }
        return redirect('admin/product/automotive' . $p_automotive->id . '/edit')->with('error_message', '更新に失敗しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(PAutomotive $p_automotive)
    {
        $result = DB::transaction(function () use ($p_automotive) {
            try {
                $p_automotive->delete();
                return redirect('admin/product/automotive')->with('flash_message', '削除しました');
            } catch (\Exception $e) {
                return redirect('admin/product/automotive')->with('error_message', '削除に失敗しました');
            }
        });

        return $result;
    }

    public function copy(Request $request)
    {
        $p_automotive = PAutomotive::find($request->p_automotive);
        $p_automotive->logo = '';
        $p_automotive->image = '';

        return view('admin/automotive_product/edit', compact('p_automotive'));
    }

    public function preview(PAutomotive $p_automotive)
    {
        $parent_categories = PAutomotive::getParentCategoryList();

        return view('front/products/automotive/detail', compact('p_automotive', 'parent_categories'));
    }
}
