<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuestionCategory;
use App\Http\Requests\Admin\StoreQuestionCategory;

class QuestionCategoryController extends Controller
{
    public function index()
    {
        $categories = QuestionCategory::query()
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/question_category/index', compact('categories'));
    }

    public function create()
    {
        $category = new QuestionCategory;
        return view('admin/question_category/edit', compact('category'));
    }

    public function store(StoreQuestionCategory $request)
    {
        $category = new QuestionCategory;
        if ($category->fill($request->all())->save()) {
            return redirect('admin/faq/category')->with('flash_message', '登録しました。');
        }
        return redirect('admin/faq/category/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(QuestionCategory $category)
    {
        return view('admin/question_category/edit', compact('category'));
    }

    public function update(StoreQuestionCategory $request, QuestionCategory $category)
    {
        if ($category->fill($request->all())->save()) {
            return redirect('admin/faq/category')->with('flash_message', '更新しました。');
        }
        return redirect('admin/faq/category/create')->with('error_message', '更新に失敗しました。');
    }

    public function delete(QuestionCategory $category)
    {
        if ($category->delete()) {
            return redirect('admin/faq/category')->with('flash_message', '削除しました');
        }
        return redirect('admin/faq/category')->with('error_message', '削除に失敗しました');
    }
}
