<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TermTag;
use App\Http\Requests\Admin\StoreTermTag;

class TermTagController extends Controller
{
    /**
     * GET /admin/nippelab/term_tag/
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 全件取得 + ページネーション
        $term_tags = TermTag::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/nippelab/term_tag/index', compact('term_tags', 'request'));
    }

    /**
     * POST /admin/nippelab/term_tag/
     * @param App\Http\Requests\Admin\StoreTermTag $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermTag $request)
    {
        $term_tag = new TermTag;
        if ($term_tag->fill($request->all())->save()) {
            return redirect(@$_SERVER['HTTP_REFERER'] ?: 'admin/nippelab/term_tag')->with('flash_message', '登録しました。');
        }
        return redirect(@$_SERVER['HTTP_REFERER'] ?: 'admin/nippelab/term_tag')->with('error_message', '登録に失敗しました。');
    }

    /**
     * PUT /admin/nippelab/term_tag/{term_tag}
     * @param App\Http\Requests\Admin\StoreTermTag $request
     * @param App\Models\TermTag $term_tag
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTermTag $request, TermTag $term_tag)
    {
        return response()->json(['result' => $term_tag->fill($request->all())->save()]);
    }

    /**
     * DELETE /admin/nippelab/term_tag/{term_tag}
     * @param App\Models\TermTag $tag
     * @return \Illuminate\Http\Response
     */
    public function delete(TermTag $term_tag)
    {
        $term_tag->detachTerms(); // 関連付け削除
        if ($term_tag->delete() > 0) {
            return redirect(@$_SERVER['HTTP_REFERER'] ?: 'admin/nippelab/term_tag')->with('flash_message', '削除しました');
        }
        return redirect(@$_SERVER['HTTP_REFERER'] ?: 'admin/nippelab/term_tag')->with('error_message', '削除に失敗しました');
    }
}
