<?php

namespace App\Http\Controllers\Front\Api;

use Illuminate\Http\Request;
use App\Models\Topic;
use Carbon\Carbon;

class TopicController extends ApiController
{
    public function index(Request $request, $parent_category = null)
    {
        $year = $request->input('year') ?? '';
        $topic_category = $request->input('topic_category') ?? '';
        $topic_categories = Topic::ARTICLE_CATEGORY;
        $category_url_list = Topic::MAIN_CATEGORY_URL;
        // 記事カテゴリ全てのキー値を取得
        $selected_category = array_merge(Topic::MAIN_CATEGORIES_KEY_LIST, Topic::CSR_CATEGORIES_KEY_LIST);

        if ($parent_category === 'csr') {
            $topic_categories = Topic::ARTICLE_CATEGORY['CSR'];
            $category_url_list = Topic::CSR_URL;
            $selected_category = Topic::CSR_CATEGORIES_KEY_LIST;
        }

        // 不正な記事カテゴリを指定された場合、404エラーを発生
        if ($topic_category !== '' && !in_array($topic_category, $category_url_list)) {
            abort(404);
        }

        // 正規の記事カテゴリを指定された場合、その記事カテゴリのキー値を取得
        if (in_array($topic_category, $category_url_list)) {
            $selected_category = (array)array_search($topic_category, $category_url_list, true);
        }

        $category_topics = Topic::query()
            ->whereIn('article_category_id', $selected_category)
            ->where('publication_date', '<=', Carbon::now())
            ->published()
            ->orderBy('publication_date', 'desc')
            ->get();

        // 指定したカテゴリに記事が1件もない場合、早期returnする
        if (!$category_topics->count()) {
            return view('front/topic/index', compact('topic_categories', 'category_url_list'));
        }

        // 詳細ページorリダイレクト先URLを格納するカラムを作成
        foreach ($category_topics as $i => $data) {
            if (isset($data->redirect_url) && empty($data->redirect_url)) {
                $category_topics[$i]->topic_url = (url("news/{$data->publication_date->format('Ymd')}/{$data->id}"));
            } else {
                $category_topics[$i]->topic_url = (url($data->redirect_url));
            }
        }

        $unique_years = Topic::createUniqueYearList($category_topics);

        $topics = Topic::searchSelectedYearTopics($category_topics, $year, $unique_years);

        $result = [
            'topics' => $topics,
        ];

        return json_encode($result);
    }
}
