<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreNippelabArticle;
use App\Models\NippelabArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NippelabArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = NippelabArticle::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/nippelab/article/index', compact('articles', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new NippelabArticle;
        return view('admin/nippelab/article/edit', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreNippelabArticle  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNippelabArticle $request)
    {
        $article = new NippelabArticle;
        if ($article->fill($request->input())->save()) {
            return redirect('admin/nippelab/article')->with('flash_message', '登録しました。');
        }

        return redirect('admin/nippelab/article/create')->with('error_message', '登録に失敗しました。');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NippelabArticle  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(NippelabArticle $article)
    {
        return view('admin/nippelab/article/edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreNippelabArticle  $request
     * @param  \App\Models\NippelabArticle  $article
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNippelabArticle $request, NippelabArticle $article)
    {
        if ($article->fill($request->input())->save()) {
            return redirect('admin/nippelab/article')->with('flash_message', '登録しました。');
        }

        return redirect('admin/nippelab/article/create')->with('error_message', '登録に失敗しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NippelabArticle  $article
     * @return \Illuminate\Http\Response
     */
    public function delete(NippelabArticle $article)
    {
        if ($article->delete()) {
            return redirect('admin/nippelab/article')->with('flash_message', '削除しました。');
        }

        return redirect('admin/nippelab/article')->with('error_message', '削除に失敗しました。');
    }

    public function preview(NippelabArticle $nippelab_article)
    {
        return view('front/nippelab/article/show', compact('nippelab_article'));
    }
}
