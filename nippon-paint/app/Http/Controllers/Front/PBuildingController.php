<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\PBuildingSearchRequest;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\PBuilding;
use App\Models\PBuildingSearch;
use App\Models\PBuildingDocumentSearch;
use App\Models\PBuildingSubcategory;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class PBuildingController extends Controller
{
    public function index()
    {
        $p_building_search = new PBuildingSearch();
        $faq_pickups = QuestionCategory::getPickupFaqsByParentCat(QuestionCategory::BUILDING);
        return view('front/products/building/index', compact('p_building_search', 'faq_pickups'));
    }

    public function search(PBuildingSearchRequest $request)
    {
        $p_building_search = new PBuildingSearch($request->all());
        $products = $p_building_search->getProductsPerPage()
            ->appends($request->except('page'));

        return view('front/products/building/search/index', compact('products', 'p_building_search'));
    }

    public function parentCatIndex(PBuildingSearchRequest $request, $parent_category)
    {
        $p_building_search = new PBuildingSearch($request->all(), ['parent_category' => $parent_category]);
        $category = $p_building_search->parent_category;
        if (!$category) abort(404);

        $subcategories = PBuildingSubcategory::getSubcategories();
        $products = $p_building_search->getProductsPerPage();

        return view('front/products/building/cat/parent_category/index', compact('category', 'products', 'p_building_search', 'subcategories'));
    }

    public function initialIndex(Request $request, $initial)
    {
        $p_building_search = new PBuildingSearch($request->all(), ['initial' => $initial]);
        if (!$p_building_search->initial) abort(404);

        $subcategories = PBuildingSubcategory::getSubcategories();
        $p_buildings = $p_building_search->getProductsPerPage();

        return view('front/products/building/initial/detail/index', compact('subcategories', 'p_buildings', 'initial'));
    }

    public function detail(PBuilding $p_building)
    {
        if (!$p_building->is_published) {
            abort(404);
        }

        $subcategories = PBuildingSubcategory::getSubcategories();
        return view('front/products/building/detail', compact('p_building', 'subcategories'));
    }

    public function fireProtectingMaterial()
    {
        $fire_certs = Document::getFireCertsWithProducts();

        $ape_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_AEP);
        $sop_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_SOP);
        $fe_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_FE);
        $nad_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_NAD);
        $epg_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_EPG);
        $ept_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_EPT);
        $ys_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_YS);
        $ms_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_MS);
        $fk_certs = $fire_certs->where('document_category_id', DocumentCategory::FIRESAFE_CERT_FK);

        return view('front/products/building/fire-protecting-material/index', compact(
            'ape_certs',
            'sop_certs',
            'fe_certs',
            'nad_certs',
            'epg_certs',
            'ept_certs',
            'ys_certs',
            'ms_certs',
            'fk_certs'
        ));
    }

    public function formaldehydeEmission()
    {
        return view('front/products/building/formaldehyde-emission/index');
    }

    public function catalog()
    {
        $p_building_search = new PBuildingDocumentSearch();
        return view('front/products/building/catalog/index', compact('p_building_search'));
    }

    public function catalogCategory(Request $request)
    {
        $p_building_search = new PBuildingDocumentSearch($request->all());
        $categories = $p_building_search->getSubcategory();
        return view('front/products/building/catalog/cat/index', compact('p_building_search', 'categories'));
    }

    public function catalogInitial($initial)
    {
        $p_building_search = new PBuildingDocumentSearch([], ['initial' => $initial]);
        if (!$p_building_search->initial) abort(404);
        $p_buildings = $p_building_search->getDocsByInitial();

        return view('front/products/building/catalog/initial/initial/index', compact('p_building_search', 'p_buildings'));
    }

    public function samplebook()
    {
        return view('front/products/building/samplebook/index');
    }
}
