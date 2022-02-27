<?php

namespace App\Http\Controllers\Admin;

use App\Models\PBuilding;
use App\Models\PBuildingSubcategory;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StorePBuilding;
use Illuminate\Support\Facades\DB;

class PBuildingController extends Controller
{
    public function index(Request $request)
    {
        $p_buildings = PBuilding::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/building_product/index', compact('p_buildings', 'request'));
    }

    public function create()
    {
        $p_building = new PBuilding;
        return view('admin/building_product/edit', compact('p_building'));
    }

    public function store(StorePBuilding $request)
    {
        $p_building = new PBuilding;
        if ($p_building->fill($request->all())->save()) {
            $p_building->saveRelations();
            $p_building->deleteFile();
            return redirect('admin/product/building')->with('flash_message', '登録しました。');
        }
        return redirect('admin/building/building/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(PBuilding $p_building)
    {
        return view('admin/building_product/edit', compact('p_building'));
    }

    public function update(StorePBuilding $request, PBuilding $p_building)
    {
        if ($p_building->fill($request->all())->save()) {
            $p_building->saveRelations();
            $p_building->deleteFile();
            return redirect('admin/product/building')->with('flash_message', '更新しました。');
        }
        return redirect('admin/product/building' . $p_building->id . '/edit')->with('error_message', '更新に失敗しました。');
    }

    public function delete(PBuilding $p_building)
    {
        $result = DB::transaction(function () use ($p_building) {
            try {
                $p_building->delete();
                return redirect('admin/product/building')->with('flash_message', '削除しました。');
            } catch (\Exception $e) {
                return redirect('admin/product/building')->with('error_message', '削除に失敗しました。');
            }
        });

        return $result;
    }

    public function copy(Request $request)
    {
        $p_building = PBuilding::find($request->p_building);
        $p_building->thumbnail = '';
        $p_building->p_building_finish_samples = collect([]);

        return view('admin/building_product/edit', compact('p_building'));
    }

    public function preview(PBuilding $p_building)
    {
        $subcategories = PBuildingSubcategory::getSubcategories();

        return view('front/products/building/detail', compact('p_building', 'subcategories'));
    }
}
