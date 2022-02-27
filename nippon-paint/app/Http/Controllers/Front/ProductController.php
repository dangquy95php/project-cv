<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\ProductSearch;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $productSearch = new ProductSearch();
        $productSearch->search(ProductSearch::ST_KEYWORDS, $request->all());
        if ($productSearch->baseData->isEmpty()) {
            return view('front/products/search/notfound', compact('request', 'productSearch'));
        }
        return view('front/products/search/index', compact('request', 'productSearch'));
    }

    public function initial(Request $request, $initial)
    {
        $productSearch = new ProductSearch();
        $productSearch->search(ProductSearch::ST_INITIAL, $request->all(), ['initial' => $initial]);
        if($productSearch->baseData->isEmpty() || empty($productSearch->initial)) abort(404);
        return view('front/products/initial/index', compact('request', 'productSearch'));
    }
}
