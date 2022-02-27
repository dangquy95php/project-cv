<?php

namespace App\Http\Controllers\Admin;

use App\Models\TermTag;
use Illuminate\Http\Request;
use App\Models\TechnicalTerm;
use App\Http\Requests\Admin\StoreTechnicalTerm;
use Illuminate\Support\Facades\DB;

class TechnicalTermController extends Controller
{
    public function getIndex(Request $request)
    {
        $technical_terms = TechnicalTerm::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        // 全件取得 +ページネーション

        return view('admin/nippelab/term/index', compact('technical_terms', 'request'));
    }

    public function create()
    {
        $technical_term = new TechnicalTerm;
        return view('admin/nippelab/term/edit', compact('technical_term'));
    }

    public function store(StoreTechnicalTerm $request)
    {
        $result = DB::transaction(function () use ($request) {
            try {
                $technical_term = new TechnicalTerm;
                $technical_term->fill($request->all())->save();
                return redirect('admin/nippelab/term')->with('flash_message', '登録しました。');
            } catch (\Exception $e) {
                return redirect('admin/nippelab/term/create')->with('error_message', '登録に失敗しました。');
            }
        });

        return $result;
    }

    public function edit(TechnicalTerm $technical_term)
    {
        return view('admin/nippelab/term/edit', compact('technical_term'));
    }

    public function update(StoreTechnicalTerm $request, TechnicalTerm $technical_term)
    {
        $result = DB::transaction(function () use ($request, $technical_term) {
            try {
                $technical_term->fill($request->all())->save();
                return redirect('admin/nippelab/term')->with('flash_message', '登録しました。');
            } catch (\Exception $e) {
                return redirect('admin/nippelab/term')->with('error_message', '登録に失敗しました。');
            }
        });

        return $result;
    }

    public function delete(TechnicalTerm $technical_term)
    {
        $result = DB::transaction(function () use ($technical_term) {
            try {
                $technical_term->delete();
                return redirect('admin/nippelab/term')->with('flash_message', '削除しました');
            } catch (\Exception $e) {
                return redirect('admin/nippelab/term')->with('error_message', '削除に失敗しました');
            }
        });

        return $result;
    }

    public function preview($id)
    {
        $technical_term = TechnicalTerm::query()
            ->where('id', $id)
            ->first();

        if (empty($technical_term)) {
            abort(404);
        }

        $kana_lines = TechnicalTerm::KANA_LINE_2;
        $kana_line_alphabets = TechnicalTerm::KANA_LINE_ALPHABET_2;
        $enable_kana_lines = TechnicalTerm::getEnableKanaLines(TechnicalTerm::KANA_LINE_2, TechnicalTerm::KANA_REGEXP_2);
        $term_tags = TermTag::getEnableTermTags();

        return view('front/nippelab/term/show'
            , compact('technical_term', 'kana_lines', 'kana_line_alphabets', 'enable_kana_lines', 'term_tags'));
    }
}
