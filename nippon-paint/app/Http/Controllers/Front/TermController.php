<?php

namespace App\Http\Controllers\Front;

use App\Models\TechnicalTerm;
use App\Models\TermTag;
use Illuminate\Http\Request;
use App\Http\Requests\Front\KeywordsRequest;

class TermController extends Controller
{
    private $kana_lines;
    private $kana_line_alphabets;
    private $enable_kana_lines;
    private $term_tags;

    function __construct()
    {
        $this->kana_lines = TechnicalTerm::KANA_LINE_2;
        $this->kana_line_alphabets = TechnicalTerm::KANA_LINE_ALPHABET_2;
        $this->enable_kana_lines = TechnicalTerm::getEnableKanaLines(TechnicalTerm::KANA_LINE_2, TechnicalTerm::KANA_REGEXP_2);
        $this->term_tags = TermTag::getEnableTermTags();
    }

    public function index(Request $request)
    {
        $per_page = $request->input('per_page') ? $request->input('per_page') : '30';

        $technical_terms = TechnicalTerm::query()->where('status', 1)->paginate($per_page);

        if ($technical_terms->isEmpty()) {
            abort(404);
        }

        $kana_lines = $this->kana_lines;
        $kana_line_alphabets = $this->kana_line_alphabets;
        $enable_kana_lines = $this->enable_kana_lines;
        $term_tags = $this->term_tags;

        return view('front/nippelab/term/index'
            , compact('request', 'technical_terms', 'kana_lines', 'kana_line_alphabets', 'enable_kana_lines', 'term_tags', 'per_page'));
    }

    public function show($id)
    {
        $technical_term = TechnicalTerm::query()
            ->where('id', $id)
            ->where('status', 1)
            ->first();

        if (empty($technical_term)) {
            abort(404);
        }

        $kana_lines = $this->kana_lines;
        $kana_line_alphabets = $this->kana_line_alphabets;
        $enable_kana_lines = $this->enable_kana_lines;
        $term_tags = $this->term_tags;

        return view('front/nippelab/term/show'
            , compact('technical_term', 'kana_lines', 'kana_line_alphabets', 'enable_kana_lines', 'term_tags'));
    }

    public function searchKeywords(KeywordsRequest $request)
    {
        if (empty($request->input('keywords'))) {
            return redirect('nippelab/term');
        }

        $per_page = $request->input('per_page') ? $request->input('per_page') : '30';

        $technical_terms = TechnicalTerm::query()->search($request->all())->where('status', 1);

        // 検索結果に重み付けを行う
        if (!empty($request->input('keywords')[0])) {
            $technical_terms->orderByRaw('title REGEXP ? DESC', [$request->input('keywords')[0]])
                ->orderByRaw('CHAR_LENGTH(title) ASC');
        }

        $technical_terms = $technical_terms->paginate($per_page);

        $kana_lines = $this->kana_lines;
        $kana_line_alphabets = $this->kana_line_alphabets;
        $enable_kana_lines = $this->enable_kana_lines;
        $term_tags = $this->term_tags;

        if ($technical_terms->isEmpty()) {
            $_request = [
                'keywords' => $request->input('keywords'),
                'kana_lines' => $kana_lines,
                'kana_line_alphabets' => $kana_line_alphabets,
                'enable_kana_lines' => $enable_kana_lines,
                'term_tags' => $term_tags,
            ];

            return redirect('nippelab/term/search/notfound')->withInput($_request);
        }

        return view('front/nippelab/term/search/index'
            , compact('request', 'technical_terms', 'kana_lines', 'kana_line_alphabets', 'enable_kana_lines', 'term_tags', 'per_page'));
    }

    public function searchKanaLine(KeywordsRequest $request, $title_kana_2 = null)
    {
        // かなが空か、存在しないものが入力された時
        if (empty($title_kana_2) || !array_keys(TechnicalTerm::KANA_LINE_ALPHABET_2, $title_kana_2)) {
            abort(404);
        }

        $per_page = $request->input('per_page') ? $request->input('per_page') : '30';

        $technical_terms = TechnicalTerm::query()
            ->search($request->all(), $title_kana_2)
            ->where('status', 1)
            ->paginate($per_page);

        if ($technical_terms->isEmpty()) {
            abort(404);
        }

        $kana_lines = $this->kana_lines;
        $kana_line_alphabets = $this->kana_line_alphabets;
        $enable_kana_lines = $this->enable_kana_lines;
        $term_tags = $this->term_tags;
        $kana_line = $kana_lines[array_keys($kana_line_alphabets, $title_kana_2)[0]];

        return view('front/nippelab/term/initial/initial/index'
            , compact('request', 'technical_terms', 'kana_lines', 'kana_line_alphabets', 'enable_kana_lines', 'term_tags', 'per_page', 'kana_line'));
    }

    public function searchTag(KeywordsRequest $request, $slug = null)
    {
        if (empty($slug)) {
            abort(404);
        }

        $per_page = $request->input('per_page') ? $request->input('per_page') : '30';
        $technical_terms = TechnicalTerm::query()
            ->search($request->all(), null, $slug)
            ->where('status', 1)
            ->paginate($per_page);

        if ($technical_terms->isEmpty()) {
            abort(404);
        }

        $kana_lines = $this->kana_lines;
        $kana_line_alphabets = $this->kana_line_alphabets;
        $enable_kana_lines = $this->enable_kana_lines;
        $term_tags = $this->term_tags;
        $tag_name = TermTag::query()->where('slug', $slug)->firstOrFail('name');

        return view('front/nippelab/term/tag/tag/index'
            , compact('request', 'technical_terms', 'kana_lines', 'kana_line_alphabets', 'enable_kana_lines', 'term_tags', 'per_page', 'tag_name'));
    }

    /**
     * notfoundページにリダイレクト
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function _redirect(Request $request)
    {
        $_redirect = $request->old();
        if (empty($_redirect)) {
            return redirect('nippelab/term');
        }

        $keywords = implode(' ', $_redirect['keywords']);
        $kana_lines = $_redirect['kana_lines'];
        $kana_line_alphabets = $_redirect['kana_line_alphabets'];
        $enable_kana_lines = $_redirect['enable_kana_lines'];
        $term_tags = $_redirect['term_tags'];

        return view('front/nippelab/term/search/notfound'
            , compact('keywords', 'kana_lines', 'kana_line_alphabets', 'enable_kana_lines', 'term_tags'));
    }
}
