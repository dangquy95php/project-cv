<?php

namespace App\Http\Controllers\Front;

use App\Models\Document;

class PLargeCatalogController extends Controller
{
    public function index()
    {
        $catalogs = Document::query()
            ->where('document_category_id', Document::LARGE_CATALOG)
            ->published()
            ->get();

        return view('front/products/large/catalog/index', compact('catalogs'));
    }
}
