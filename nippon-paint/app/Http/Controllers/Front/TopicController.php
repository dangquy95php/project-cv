<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Topic;
use Carbon\Carbon;

class TopicController extends Controller
{
    public function index(Request $request, $topic_category = null)
    {
        $year = $request->input('year');
        $topic_categories = Topic::getFlattenCategoryListFront()->toArray();
        $category_url_list = Topic::MAIN_CATEGORY_URL;

        // 不正な記事カテゴリを指定された場合、404エラーを発生
        if (!empty($topic_category) && !in_array($topic_category, $category_url_list)) {
            abort(404);
        }

        $availability_topic_categories = Topic::getAvailabilityTopicCategories();
        //csr系はヘッダーをまとめるので別途取得
        $csr_availability_topic_categories = Topic::getAssignAvailabilityTopicCategories(Topic::CSR_CATEGORIES_KEY_LIST);

        // 記事カテゴリ全てのキー値を取得
        $selected_category = array_merge(Topic::MAIN_CATEGORIES_KEY_LIST, Topic::CSR_CATEGORIES_KEY_LIST);
        $title = 'トピックス';

        // 正規の記事カテゴリを指定された場合、その記事カテゴリのキー値を取得
        if (in_array($topic_category, $category_url_list)) {
            $selected_category = (array)array_search($topic_category, $category_url_list, true);
            $title = $topic_categories[$selected_category[0]] . '｜トピックス';
        }

        // blade読み込み時にAPIで取得しているので消すべきだが、各コードの依存度が高いため一旦放置
        // ここから
        $category_topics = Topic::query()
            ->whereIn('article_category_id', $selected_category)
            ->where('publication_date', '<=', Carbon::now())
            ->published()
            ->orderBy('publication_date', 'desc')
            ->get();

        // 指定したカテゴリに記事が1件もない場合、早期returnする
        if(!$category_topics->count()) {
            return view('front/topic/index', compact('title', 'topic_categories', 'category_url_list'));
        }

        $unique_years = Topic::createUniqueYearList($category_topics);

        $topics = Topic::searchSelectedYearTopics($category_topics, $year, $unique_years);

        $year = in_array($year, $unique_years, true) ? $year : $unique_years[0];
        // ここまで

        return view('front/topic/index'
            , compact('title', 'topics', 'topic_categories', 'availability_topic_categories', 'csr_availability_topic_categories', 'category_url_list', 'unique_years', 'year', 'topic_category'));
    }

    /*
     * /news配下のCSRページ
     */
    public function news_csr(Request $request, $topic_category = null)
    {
        $year = $request->input('year');
        $topic_categories = Topic::getFlattenCategoryListFront()->toArray();
        $category_url_list = Topic::MAIN_CATEGORY_URL;
        $csr_category_url_list = Topic::CSR_URL;

        // 不正な記事カテゴリを指定された場合、404エラーを発生
        if (!empty($topic_category) && !in_array($topic_category, $csr_category_url_list)) {
            abort(404);
        }

        $availability_topic_categories = Topic::getAvailabilityTopicCategories();
        $csr_availability_topic_categories = Topic::getAssignAvailabilityTopicCategories(Topic::CSR_CATEGORIES_KEY_LIST); //csr系はヘッダーをまとめたりするので別途取得

        // 記事カテゴリ全てのキー値を取得
        $selected_category = Topic::CSR_CATEGORIES_KEY_LIST;
        $title = 'CSR｜トピックス';

        // 正規の記事カテゴリを指定された場合、その記事カテゴリのキー値を取得
        if (in_array($topic_category, $csr_category_url_list)) {
            $selected_category = (array)array_search($topic_category, $csr_category_url_list, true);
            $title = $topic_categories[$selected_category[0]] . '｜CSR｜トピックス';
        }

        $category_topics = Topic::query()
            ->whereIn('article_category_id', $selected_category)
            ->where('publication_date', '<=', Carbon::now())
            ->published()
            ->orderBy('publication_date', 'desc')
            ->get();

        // 指定したカテゴリに記事が1件もない場合、早期returnする
        if(!$category_topics->count()) {
            return redirect('/news');
        }

        $unique_years = Topic::createUniqueYearList($category_topics);

        $topics = Topic::searchSelectedYearTopics($category_topics, $year, $unique_years);

        $year = in_array($year, $unique_years, true) ? $year : $unique_years[0];

        return view('front/topic/csr'
            , compact('title', 'topics', 'topic_categories', 'availability_topic_categories', 'csr_availability_topic_categories', 'category_url_list', 'csr_category_url_list', 'unique_years', 'year', 'topic_category'));
    }

    public function show($publication_date, $id)
    {
        $topic = Topic::query()
            ->where('id', $id)
            ->where('publication_date', '<=', Carbon::now())
            ->published()
            ->first();

        if (empty($topic) || $topic->publication_date->format('Ymd') !== $publication_date) {
            abort(404);
        }

        $prev_next_topics = Topic::getPrevAndNextTopics($topic);

        $pagination_url['prev'] = Topic::createPaginateUrl($prev_next_topics['prev_topic']);
        $pagination_url['next'] = Topic::createPaginateUrl($prev_next_topics['next_topic']);

        $topic_categories = Topic::getFlattenCategoryListFront()->toArray();
        $publication_date = date('Y/m/d', strtotime($publication_date));

        return view('front/topic/show'
            , compact('topic', 'publication_date', 'topic_categories', 'pagination_url'));
    }

    /*
     * CSRカテゴリの専用ページ
     */
    public function csr()
    {
        $topic_categories = Topic::getFlattenCategoryListFront()->toArray();
        $hpp_topics = Topic::query()
            ->where('article_category_id', Topic::CSR_HPP)
            ->where('publication_date', '<=', Carbon::now())
            ->published()
            ->orderBy('publication_date' , 'desc')
            ->limit(5)
            ->get();

        $iu_topics = Topic::query()
            ->where('article_category_id', Topic::CSR_IU)
            ->where('publication_date', '<=', Carbon::now())
            ->published()
            ->orderBy('publication_date' , 'desc')
            ->limit(5)
            ->get();

        return view('front/csr/index'
            , compact('topic_categories', 'hpp_topics', 'iu_topics'));
    }
}
