<?php

namespace App\Http\Controllers\Front;

use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\PAutomotive;
use App\Models\PAutomotiveSearch;
use Illuminate\Http\Request;

class PAutomotiveController extends Controller
{
    public function index()
    {
        $p_automotive_search = new PAutomotiveSearch();
        return view('front/products/automotive/index', compact('p_automotive_search'));
    }

    public function search(Request $request)
    {
        $p_automotive_search = new PAutomotiveSearch($request->all());
        $p_automotives = $p_automotive_search->getProductsPerPage();
        return view('front/products/automotive/search/index', compact('p_automotive_search', 'p_automotives'));
    }

    public function initialIndex($initial)
    {
        $p_automotive_search = new PAutomotiveSearch([], ['initial' => $initial]);
        if (!$p_automotive_search->initial) {
            abort(404);
        }
        $p_automotives = $p_automotive_search->getProductsPerPage();
        return view('front/products/automotive/initial/initial/index', compact('p_automotive_search', 'p_automotives'));
    }

    public function parentCategoryIndex(Request $request, $parent_category)
    {
        $p_automotive_search = new PAutomotiveSearch($request->all(), ['parent_category' => $parent_category]);
        if (!$p_automotive_search->parent_category) abort(404);
        $p_automotives = $p_automotive_search->getProductsPerPage();
        $parent_categories = PAutomotive::getParentCategoryList();
        return view('front/products/automotive/cat/parent_category/index', compact('p_automotive_search', 'p_automotives', 'parent_categories'));
    }

    public function naxTraining()
    {
        $parent_categories = PAutomotive::getParentCategoryList();;
        return view('front/products/automotive/nax-training/index', compact('parent_categories'));
    }

    public function catalogDownload()
    {
        $base_catalogs = Document::getDocsByCategory(DocumentCategory::AUTO_CATALOG_BASE);
        $clear_catalogs = Document::getDocsByCategory(DocumentCategory::AUTO_CATALOG_CLEAR);
        $putty_catalogs = Document::getDocsByCategory(DocumentCategory::AUTO_CATALOG_PUTTY);
        $prasaf_catalogs = Document::getDocsByCategory(DocumentCategory::AUTO_CATALOG_PRASAF);
        $primer_catalogs = Document::getDocsByCategory(DocumentCategory::AUTO_CATALOG_PRIMER);
        $adjuster_catalogs = Document::getDocsByCategory(DocumentCategory::AUTO_CATALOG_ADJUSTER);

        return view('front/products/automotive/catalog-download/index', compact(
            'base_catalogs',
            'clear_catalogs',
            'putty_catalogs',
            'prasaf_catalogs',
            'primer_catalogs',
            'adjuster_catalogs',
        ));
    }

    public function detail(PAutomotive $p_automotive)
    {
        if (!$p_automotive->is_published) {
            abort(404);
        }

        $parent_categories = PAutomotive::getParentCategoryList();
        return view('front/products/automotive/detail', compact('p_automotive', 'parent_categories'));
    }

}
