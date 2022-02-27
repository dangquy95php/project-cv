<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StorePBuildingSubcategory;
use App\Models\PBuildingSubcategory;
use Illuminate\Http\Request;

class PBuildingSubcategoryController extends Controller
{
    public function index(Request $request)
    {
        $building_subcategories = PBuildingSubcategory::query()
            ->where('parent_id', '!=' ,null)
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/building_subcategory/index', compact('building_subcategories', 'request'));
    }

    public function create()
    {
        $building_subcategory = new PBuildingSubcategory;
        return view('admin/building_subcategory/edit', compact('building_subcategory'));
    }

    public function store(StorePBuildingSubcategory $request)
    {
        $building_subcategory = new PBuildingSubcategory;
        if ($building_subcategory->fill($request->all())->save()) {
            return redirect('admin/product/building/category')->with('flash_message', '登録しました。');
        }
        return redirect('admin/product/building/category/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(PBuildingSubcategory $building_subcategory)
    {
        if(!$building_subcategory->parent_id)abort(403);
        return view('admin/building_subcategory/edit', compact('building_subcategory'));
    }

    public function update(StorePBuildingSubcategory $request, PBuildingSubcategory $building_subcategory)
    {
        if ($building_subcategory->fill($request->all())->save()) {
            return redirect('admin/product/building/category')->with('flash_message', '更新しました。');
        }
        return redirect('admin/product/building/category/'.$building_subcategory->id.'/edit')->with('error_message', '更新に失敗しました。');
    }

    public function delete(PBuildingSubcategory $building_subcategory)
    {
        if(!$building_subcategory->parent_id){
            return redirect('admin/product/building/category/')->with('error_message', '中カテゴリは削除できません');
        }
        if( $building_subcategory->delete()){
            return redirect('admin/product/building/category')->with('flash_message', '削除しました');
        }
        return redirect('admin/product/building/category')->with('error_message', '削除に失敗しました');
    }
}
