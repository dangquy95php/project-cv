<?php

namespace App\Http\Controllers\Front;

use App\Models\NippelabArticle;

class NippelabArticleController extends Controller
{
    public function show($theme, $article)
    {
        $today = date("Y-m-d H:i:s");

        $nippelab_article = NippelabArticle::query()
            ->where('slug', $article)
            ->published()
            ->where('publication_date', '<=', $today)
            ->first();

        if ($nippelab_article === null || $theme !== $nippelab_article->themeslug) {
            abort(404);
        }

        return view('front/nippelab/'.$theme.'/detail', compact('nippelab_article'));
    }
}
