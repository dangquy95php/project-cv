<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StorePAutomotiveSubcategory;
use App\Models\PAutomotiveSubcategory;
use Illuminate\Http\Request;

class PAutomotiveSubcategoryController extends Controller
{
    public function index(Request $request)
    {
        $automotive_subcategories = PAutomotiveSubcategory::query()
            ->where('parent_id', '!=' ,null)
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/automotive_subcategory/index', compact('automotive_subcategories', 'request'));
    }

    public function create()
    {
        $automotive_subcategory = new PAutomotiveSubcategory;
        return view('admin/automotive_subcategory/edit', compact('automotive_subcategory'));
    }

    public function store(StorePAutomotiveSubcategory $request)
    {
        $automotive_subcategory = new PAutomotiveSubcategory;
        if ($automotive_subcategory->fill($request->all())->save()) {
            return redirect('admin/product/automotive/category')->with('flash_message', '登録しました。');
        }
        return redirect('admin/product/automotive/category/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(PAutomotiveSubcategory $automotive_subcategory)
    {
        if(!$automotive_subcategory->parent_id)abort(403);
        return view('admin/automotive_subcategory/edit', compact('automotive_subcategory'));
    }

    public function update(StorePAutomotiveSubcategory $request, PAutomotiveSubcategory $automotive_subcategory)
    {
        if ($automotive_subcategory->fill($request->all())->save()) {
            return redirect('admin/product/automotive/category')->with('flash_message', '更新しました。');
        }
        return redirect('admin/product/automotive/category/'.$automotive_subcategory->id.'/edit')->with('error_message', '更新に失敗しました。');
    }

    public function delete(PAutomotiveSubcategory $automotive_subcategory)
    {
        if(!$automotive_subcategory->parent_id){
            return redirect('admin/product/automotive/category/')->with('error_message', '中カテゴリは削除できません');
        }
        if( $automotive_subcategory->delete()){
            return redirect('admin/product/automotive/category')->with('flash_message', '削除しました');
        }
        return redirect('admin/product/automotive/category')->with('error_message', '削除に失敗しました');
    }
}
