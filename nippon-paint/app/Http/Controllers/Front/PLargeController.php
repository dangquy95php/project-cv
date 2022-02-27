<?php

namespace App\Http\Controllers\Front;

class PLargeController extends Controller
{
    public function index()
    {
        return view('front/products/large/index');
    }

    public function technic()
    {
        return view('front/products/large/technic/index');
    }

    public function guidebook()
    {
        return view('front/products/large/guidebook/index');
    }
}
