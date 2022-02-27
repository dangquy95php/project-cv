<?php

namespace App\Http\Controllers\Front;

use App\Models\Topic;
use App\Models\PublicationModel;

class TopController extends Controller
{
    public function index()
    {
        $topics = Topic::query()
            ->where('status',PublicationModel::TO_PUBLIC)
            ->orderBy('publication_date', 'desc')
            ->take(5)
            ->get();

        return view('front/top',compact('topics'));
    }
}
