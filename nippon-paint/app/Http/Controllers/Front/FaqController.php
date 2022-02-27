<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests\Front\KeywordsRequest;
use App\Models\Faq;
use App\Models\PublicationModel;
use App\Models\QuestionCategory;

class FaqController extends Controller
{
    public function searchKeywords(KeywordsRequest $request)
    {
        if (empty($request->input('keywords'))) {
            return redirect('support/faq');
        }
        $title = implode(' ', $request['keywords']);
        $title = $title . 'の検索結果｜よくあるご質問';
        $faqs = Faq::query()
            ->frontSearch($request->all())
            ->where('published_status', PublicationModel::TO_PUBLIC)
            ->get();

        if ($faqs->isEmpty()) {
            $_request = [
                'keywords' => $request->input('keywords'),
            ];

            return redirect('support/faq/search/notfound')->withInput($_request);
        }

        $categories = QuestionCategory::getCategories();

        return view('front/support/faq/search/index'
            , compact('request', 'faqs', 'categories', 'title'));
    }

    public function index(Request $request)
    {
        $categories = QuestionCategory::getCategories();
        $faqs = Faq::query()->where('published_status', PublicationModel::TO_PUBLIC)->get();

        return view('front/support/faq/index', compact('request', 'categories', 'faqs'));
    }

    public function parent_category(Request $request, $parent_category = null)
    {
        $categories = QuestionCategory::getCategories();

        if (!$parent_category_id = QuestionCategory::parentCategory2Id($parent_category)) {
            abort(404);
        }
        $title = QuestionCategory::getParentTitle($parent_category_id);
        $faqs = QuestionCategory::getParentCategoryQuestions($parent_category_id);

        return view('front/support/faq/parent_category', compact('faqs', 'request', 'categories', 'title'));
    }

    public function child_category(Request $request, $parent_category = null, $child_category = null)
    {
        $categories = QuestionCategory::getCategories();

        if (!$parent_category_id = QuestionCategory::parentCategory2Id($parent_category)) {
            abort(404);
        }

        $parent_title = QuestionCategory::getParentTitle($parent_category_id);
        if (!$child_category_id = QuestionCategory::childCategory2Id($child_category)) {
            abort(404);
        }
        $title = QuestionCategory::getChildTitle($child_category_id);
        $faqs = Faq::query()
            ->where('question_category_id', $child_category_id)
            ->published()
            ->get();

        return view('front/support/faq/child_category', compact('faqs', 'request', 'categories', 'title', 'parent_title', 'parent_category'));
    }

    public function show($id)
    {
        $faq = Faq::query()
            ->where('id', $id)
            ->where('published_status', PublicationModel::TO_PUBLIC)
            ->first();

        if (empty($faq)) {
            abort(404);
        }

        $faq_parent_categories = QuestionCategory::PARENT_CATEGORY;
        $title = $faq_parent_categories[$faq->question_category->parent_category_id];

        $categories = QuestionCategory::getCategories();

        return view('front/support/faq/show', compact('faq', 'title', 'categories'));
    }

    public function _redirect(Request $request)
    {
        $_redirect = $request->old();
        if (empty($_redirect)) {
            return redirect('support/faq');
        }

        $title = implode(' ', $_redirect['keywords']);
        $result = '"' . $title . '"で該当する検索結果がありませんでした。';
        $request->request->add(['keywords' => $_redirect['keywords']]);
        return view('front/support/faq/search/notfound'
            , compact('_redirect', 'title', 'result', 'request'));
    }
}
