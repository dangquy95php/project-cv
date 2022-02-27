<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StorePLarge;
use App\Models\PLarge;
use App\Models\PLargeStandard;
use App\Models\PLargeSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PLargeController extends Controller
{
    public function index(Request $request)
    {
        $p_larges = PLarge::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/p_large/product/index', compact('p_larges', 'request'));
    }

    public function create()
    {
        $p_large = new PLarge;
        return view('admin/p_large/product/edit', compact('p_large'));
    }

    public function store(StorePLarge $request)
    {
        $p_large = new PLarge;
        if ($p_large->fill($request->all())->save()) {
            return redirect('admin/product/large')->with('flash_message', '登録しました。');
        }
        return redirect('admin/large/large/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(PLarge $p_large)
    {
        return view('admin/p_large/product/edit', compact('p_large'));
    }

    public function update(StorePLarge $request, PLarge $p_large)
    {
        if ($p_large->fill($request->all())->save()) {
            return redirect('admin/product/large')->with('flash_message', '更新しました。');
        }
        return redirect('admin/product/large' . $p_large->id . '/edit')->with('error_message', '更新に失敗しました。');
    }

    public function delete(PLarge $p_large)
    {
        $result = DB::transaction(function () use ($p_large) {
            try {
                $p_large->delete();
                return redirect('admin/product/large')->with('flash_message', '削除しました');
            } catch (\Exception $e) {
                return redirect('admin/product/large')->with('error_message', '削除に失敗しました');
            }
        });

        return $result;
    }

    public function copy(Request $request)
    {
        $p_large = PLarge::find($request->p_large);
        $p_large->thumbnail = '';

        return view('admin/p_large/product/edit', compact('p_large'));
    }

    public function preview(PLarge $p_large)
    {
        $systems = PLargeSystem::all();
        $standards = PLargeStandard::all();

        return view('front/products/large/detail', compact('p_large', 'systems', 'standards'));
    }
}
