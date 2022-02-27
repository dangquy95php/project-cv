<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StorePLargeStandard;
use App\Models\PLargeStandard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PLargeStandardController extends Controller
{
    public function index(Request $request){
        $p_large_standards = PLargeStandard::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/p_large/standard/index', compact('p_large_standards', 'request'));
    }

    public function create()
    {
        $p_large_standard = new PLargeStandard();
        return view('admin/p_large/standard/edit', compact('p_large_standard'));
    }

    public function store(StorePLargeStandard $request)
    {
        $result = DB::transaction(function () use ($request) {
            try {
                $p_large_standard = new PLargeStandard();
                $p_large_standard->fill($request->all())->save();
                return redirect('admin/product/large/standard')->with('flash_message', '登録しました。');
            } catch (\Exception $e) {
                return redirect('admin/product/large/standard/create')->with('error_message', '登録に失敗しました。');
            }
        });

        return $result;
    }

    public function edit(PLargeStandard $p_large_standard)
    {
        return view('admin/p_large/standard/edit', compact('p_large_standard'));
    }

    public function update(StorePLargeStandard $request, PLargeStandard $p_large_standard)
    {
        $result = DB::transaction(function () use ($request, $p_large_standard) {
            try {
                $p_large_standard->fill($request->all())->save();
                return redirect('admin/product/large/standard')->with('flash_message', '登録しました。');
            } catch (\Exception $e) {
                return redirect()->back()->with('error_message', $e->getMessage());
            }
        });

        return $result;
    }

    public function delete(PLargeStandard $p_large_standard)
    {
        $result = DB::transaction(function () use ($p_large_standard) {
            try {
                $p_large_standard->delete();
                return redirect('admin/product/large/standard')->with('flash_message', '削除しました');
            } catch (\Exception $e) {
                return redirect('admin/product/large/standard')->with('error_message', '削除に失敗しました');
            }
        });

        return $result;
    }

    public function sort()
    {
        $p_large_standards = PLargeStandard::query()
            ->orderByRaw('sort is null asc') //nullを配列最後に回すため
            ->orderBy('sort', 'asc')
            ->get()
            ->map(function ($item){ //draggable-list-component用(例外的なのでAttributeは使わない)
                $item->name = $item->standard_name;
                return $item;
            })
            ->groupBy('p_large_standard_category_id')
            ->sortKeys();

        $p_large_standard_category_list = PLargeStandard::getStandardCategoryList();

        return view('admin/p_large/standard/sort', compact('p_large_standards', 'p_large_standard_category_list'));
    }

    public function sort_update(Request $request)
    {
        $params = $request->input('sort');

        DB::beginTransaction();
        try {
            $sort = 1;
            foreach ($params as $id) {
                $p_large_standard = PLargeStandard::find($id);
                $p_large_standard->fill([
                    'sort' => $sort
                ])->save();
                $sort++;
            }
            DB::commit();
            return redirect('admin/product/large/standard/sort')->with('flash_message', '登録しました');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/product/large/standard/sort')->with('error_message', '登録に失敗しました');
        }
    }
}
