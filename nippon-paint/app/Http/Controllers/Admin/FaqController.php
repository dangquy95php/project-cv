<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreFaq;
use App\Models\Faq;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faq::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/faq/index', compact('faqs', 'request'));
    }

    public function create()
    {
        $faq = new Faq;
        return view('admin/faq/edit', compact('faq'));
    }

    public function store(StoreFaq $request)
    {
        $faq = new Faq;
        if ($faq->fill($request->all())->save()) {
            return redirect('admin/faq')->with('flash_message', '登録しました。');
        }
        return redirect('admin/faq/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(Faq $faq)
    {
        return view('admin/faq/edit', compact('faq'));
    }

    public function update(StoreFaq $request, Faq $faq)
    {
        if ($faq->fill($request->all())->save()) {
            return redirect('admin/faq')->with('flash_message', '更新しました。');
        }
        return redirect('admin/faq/create')->with('error_message', '更新に失敗しました。');
    }

    public function delete(Faq $faq)
    {
        if ($faq->delete()) {
            return redirect('admin/faq')->with('flash_message', '削除しました');
        }
        return redirect('admin/faq')->with('error_message', '削除に失敗しました');
    }

    public function preview(Faq $faq)
    {
        $faq_parent_categories = QuestionCategory::PARENT_CATEGORY;
        if (empty($faq->question_category->parent_category_id)) {
            $title = '｜よくあるご質問';
        } else {
            $title = $faq_parent_categories[$faq->question_category->parent_category_id] . '｜よくあるご質問';
        }

        $categories = QuestionCategory::getCategories();

        return view('front/support/faq/show', compact('faq', 'title', 'categories'));
    }
}
