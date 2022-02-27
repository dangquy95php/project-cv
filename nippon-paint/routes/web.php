<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
|--------------------------------------------------------------------------
| Front
|--------------------------------------------------------------------------
*/
/*
一時的に設定変更→チェック後削除ここから
*/
Route::view('/500/', 'errors/500');
Route::view('/503/', 'errors/503');
/*
一時的に設定変更→チェック後削除ここまで
*/
Route::view('/component/', 'front/component');

Route::get('/', 'Front\TopController@index');
Route::view('/products/', 'front/products/index')->name('front.products');
Route::get('/products/search/', 'Front\ProductController@search')->name('front.products.search');
Route::get('/products/initial/{initial}/', 'Front\ProductController@initial');
Route::get('/products/building/', 'Front\PBuildingController@index');
Route::get('/products/building/search/', 'Front\PBuildingController@search');
Route::get('/products/building/initial/{initial}/', 'Front\PBuildingController@initialIndex');
Route::get('/products/building/cat/{parent_category}/', 'Front\PBuildingController@parentCatIndex');
Route::get('/products/building/fire-protecting-material/', 'Front\PBuildingController@fireProtectingMaterial');
Route::get('/products/building/formaldehyde-emission/', 'Front\PBuildingController@formaldehydeEmission');
Route::view('/products/building/public-building-specifications/', 'front/products/building/public-building-specifications/index');
Route::get('/products/building/catalog/', 'Front\PBuildingController@catalog');
Route::get('/products/building/catalog/cat/', 'Front\PBuildingController@catalogCategory');
Route::get('/products/building/catalog/initial/{initial}/', 'Front\PBuildingController@catalogInitial');
Route::get('/products/building/samplebook/', 'Front\PBuildingController@samplebook');
Route::get('/products/building/{p_building}/', 'Front\PBuildingController@detail')->name('front.pBuilding.detail');

Route::view('/products/large/', 'front/products/large/index');
Route::get('/products/large/paint/', 'Front\PLargePaintController@index');
Route::get('/products/large/paint/standard/{standard}/', 'Front\PLargePaintController@standard_search');
Route::get('/products/large/paint/system/{system}/', 'Front\PLargePaintController@system_search');
Route::get('/products/large/paint/initial/{initial}/', 'Front\PLargePaintController@initial_search');
Route::get('/products/large/specification/', 'Front\PLargeSpecController@index');
Route::get('/products/large/specification-bridge/standard/{slug}/', 'Front\PLargeSpecController@bridgeStandardIndex');
Route::get('/products/large/specification-bridge/', 'Front\PLargeSpecController@bridgeIndex');
Route::get('/products/large/specification-steele/', 'Front\PLargeSpecController@steelIndex');
Route::get('/products/large/specification-bridge/{spec_bridge}/', 'Front\PLargeSpecController@bridgeDetail')->name('front.pLargeSpecBridge.detail');
Route::get('/products/large/specification-steele/{spec_steel}/', 'Front\PLargeSpecController@steelDetail')->name('front.pLargeSpecSteel.detail');
Route::get('/products/large/catalog/', 'Front\PLargeCatalogController@index');
Route::view('/products/large/fireproof/', 'front/products/large/fireproof/index');
Route::view('/products/large/fireproof/mechanism/', 'front/products/large/fireproof/mechanism/index');
Route::view('/products/large/fireproof/system/', 'front/products/large/fireproof/system/index');
Route::view('/products/large/fireproof/results/', 'front/products/large/fireproof/results/index');
Route::view('/products/large/tough-guard/', 'front/products/large/tough-guard/index');
Route::view('/products/large/tough-guard/about/', 'front/products/large/tough-guard/about/index');
Route::view('/products/large/tough-guard/process/', 'front/products/large/tough-guard/process/index');
Route::view('/products/large/tough-guard/results/', 'front/products/large/tough-guard/results/index');
Route::view('/products/large/tough-guard/be-mesh-method/', 'front/products/large/tough-guard/be-mesh-method/index');
Route::view('/products/large/technic/', 'front/products/large/technic/index');
Route::view('/products/large/guidebook/', 'front/products/large/guidebook/index');
Route::get('/products/large/{p_large}/', 'Front\PLargePaintController@show')->name('front.pLarge.detail');;
Route::get('/products/automotive/', 'Front\PAutomotiveController@index');
Route::get('/products/automotive/search/', 'Front\PAutomotiveController@search');
Route::get('/products/automotive/initial/{initial}/', 'Front\PAutomotiveController@initialIndex');
Route::get('/products/automotive/cat/{parent_category}/', 'Front\PAutomotiveController@parentCategoryIndex');
Route::get('/products/automotive/nax-training/', 'Front\PAutomotiveController@naxTraining');
Route::get('/products/automotive/catalog-download/', 'Front\PAutomotiveController@catalogDownload');
Route::get('/products/automotive/{p_automotive}/', 'Front\PAutomotiveController@detail')->name('front.pAutomotive.detail');
Route::view('/products/feature/', 'front/products/feature/index');
Route::view('/products/feature/perfect/', 'front/products/feature/perfect/index');
Route::view('/products/feature/perfect/01.html', 'front/products/feature/perfect/01');
Route::view('/products/feature/perfect/02.html', 'front/products/feature/perfect/02');
Route::view('/products/feature/thermoeye/', 'front/products/feature/thermoeye/index');
Route::view('/products/feature/thermoeye/factory/', 'front/products/feature/thermoeye/factory/index');
Route::view('/products/feature/thermoeye/factory/company/index.html', 'front/products/feature/thermoeye/factory/company/index');
Route::view('/products/feature/thermoeye/factory/company/sitemap.html', 'front/products/feature/thermoeye/factory/company/sitemap');
Route::view('/products/feature/thermoeye/factory/concept/index.html', 'front/products/feature/thermoeye/factory/concept/index');
Route::view('/products/feature/thermoeye/factory/download/index.html', 'front/products/feature/thermoeye/factory/download/index');
Route::view('/products/feature/thermoeye/factory/mechanism/index.html', 'front/products/feature/thermoeye/factory/mechanism/index');
Route::view('/products/feature/thermoeye/factory/mechanism/mechanism2.html', 'front/products/feature/thermoeye/factory/mechanism/mechanism2');
Route::view('/products/feature/thermoeye/factory/mechanism/mechanism3.html', 'front/products/feature/thermoeye/factory/mechanism/mechanism3');
Route::view('/products/feature/thermoeye/factory/point/index.html', 'front/products/feature/thermoeye/factory/point/index');
Route::view('/products/feature/thermoeye/factory/products/index.html', 'front/products/feature/thermoeye/factory/products/index');
Route::view('/products/feature/thermoeye/factory/proof/index.html', 'front/products/feature/thermoeye/factory/proof/index');
Route::view('/products/feature/thermoeye/factory/proof/proof2.html', 'front/products/feature/thermoeye/factory/proof/proof2');
Route::view('/products/feature/thermoeye/factory/proof/proof3.html', 'front/products/feature/thermoeye/factory/proof/proof3');
Route::view('/products/feature/thermoeye/factory/proof/case01.html', 'front/products/feature/thermoeye/factory/proof/case01');
Route::view('/products/feature/thermoeye/factory/proof/case02.html', 'front/products/feature/thermoeye/factory/proof/case02');
Route::view('/products/feature/thermoeye/factory/proof/case03.html', 'front/products/feature/thermoeye/factory/proof/case03');
Route::view('/products/feature/thermoeye/factory/proof/case2011_01.html', 'front/products/feature/thermoeye/factory/proof/case2011_01');
Route::view('/products/feature/thermoeye/factory/proof/case2011_02.html', 'front/products/feature/thermoeye/factory/proof/case2011_02');
Route::view('/products/feature/thermoeye/factory/proof/case2011_03.html', 'front/products/feature/thermoeye/factory/proof/case2011_03');
Route::view('/products/feature/thermoeye/factory/proof/case2011_04.html', 'front/products/feature/thermoeye/factory/proof/case2011_04');
Route::view('/products/feature/thermoeye/factory/proof/case2011_05.html', 'front/products/feature/thermoeye/factory/proof/case2011_05');
Route::view('/products/feature/thermoeye/factory/simcolor/index.html', 'front/products/feature/thermoeye/factory/simcolor/index');
Route::view('/products/feature/thermoeye/factory/simcolor/simcolor.html', 'front/products/feature/thermoeye/factory/simcolor/simcolor');
Route::view('/products/feature/thermoeye/family/', 'front/products/feature/thermoeye/family/index');
Route::view('/products/feature/thermoeye/family/co2co2/index.html', 'front/products/feature/thermoeye/family/co2co2/index');
Route::view('/products/feature/thermoeye/family/column/index.html', 'front/products/feature/thermoeye/family/column/index');
Route::view('/products/feature/thermoeye/family/column/column2.html', 'front/products/feature/thermoeye/family/column/column2');
Route::view('/products/feature/thermoeye/family/column/column3.html', 'front/products/feature/thermoeye/family/column/column3');
Route::view('/products/feature/thermoeye/family/column/column4.html', 'front/products/feature/thermoeye/family/column/column4');
Route::view('/products/feature/thermoeye/family/column/column5.html', 'front/products/feature/thermoeye/family/column/column5');
Route::view('/products/feature/thermoeye/family/column/column6.html', 'front/products/feature/thermoeye/family/column/column6');
Route::view('/products/feature/thermoeye/family/column/column7.html', 'front/products/feature/thermoeye/family/column/column7');
Route::view('/products/feature/thermoeye/family/company/index.html', 'front/products/feature/thermoeye/family/company/index');
Route::view('/products/feature/thermoeye/family/company/sitemap.html', 'front/products/feature/thermoeye/family/company/sitemap');
Route::view('/products/feature/thermoeye/family/download/index.html', 'front/products/feature/thermoeye/family/download/index');
Route::view('/products/feature/thermoeye/family/download/howto.html', 'front/products/feature/thermoeye/family/download/howto');
Route::view('/products/feature/thermoeye/family/faq/index.html', 'front/products/feature/thermoeye/family/faq/index');
Route::view('/products/feature/thermoeye/family/point/index.html', 'front/products/feature/thermoeye/family/point/index');
Route::view('/products/feature/thermoeye/family/products/flow.html', 'front/products/feature/thermoeye/family/products/flow');
Route::view('/products/feature/thermoeye/family/products/flow2.html', 'front/products/feature/thermoeye/family/products/flow2');
Route::view('/products/feature/thermoeye/family/products/index.html', 'front/products/feature/thermoeye/family/products/index');
Route::view('/products/feature/thermoeye/family/products/product01.html', 'front/products/feature/thermoeye/family/products/product01');
Route::view('/products/feature/thermoeye/family/products/product02.html', 'front/products/feature/thermoeye/family/products/product02');
Route::view('/products/feature/thermoeye/family/products/product03.html', 'front/products/feature/thermoeye/family/products/product03');
Route::view('/products/feature/thermoeye/family/products/product04.html', 'front/products/feature/thermoeye/family/products/product04');
Route::view('/products/feature/thermoeye/family/products/product05.html', 'front/products/feature/thermoeye/family/products/product05');
Route::view('/products/feature/thermoeye/family/products/product06.html', 'front/products/feature/thermoeye/family/products/product06');
Route::view('/products/feature/thermoeye/family/proof/case01.html', 'front/products/feature/thermoeye/family/proof/case01');
Route::view('/products/feature/thermoeye/family/proof/case02.html', 'front/products/feature/thermoeye/family/proof/case02');
Route::view('/products/feature/thermoeye/family/proof/case2011_02.html', 'front/products/feature/thermoeye/family/proof/case2011_02');
Route::view('/products/feature/thermoeye/family/proof/case2011_03.html', 'front/products/feature/thermoeye/family/proof/case2011_03');
Route::view('/products/feature/thermoeye/family/proof/case2011_04.html', 'front/products/feature/thermoeye/family/proof/case2011_04');
Route::view('/products/feature/thermoeye/family/proof/case2011_05.html', 'front/products/feature/thermoeye/family/proof/case2011_05');
Route::view('/products/feature/thermoeye/family/proof/index.html', 'front/products/feature/thermoeye/family/proof/index');
Route::view('/products/feature/thermoeye/family/proof/proof2.html', 'front/products/feature/thermoeye/family/proof/proof2');
Route::view('/products/feature/thermoeye/family/proof/proof3.html', 'front/products/feature/thermoeye/family/proof/proof3');
Route::view('/products/feature/thermoeye/family/proof/proof4.html', 'front/products/feature/thermoeye/family/proof/proof4');
Route::view('/products/feature/thermoeye/family/simcolor/index.html', 'front/products/feature/thermoeye/family/simcolor/index');
Route::view('/products/feature/thermoeye/family/simcolor/simcolor.html', 'front/products/feature/thermoeye/family/simcolor/simcolor');
Route::view('/products/feature/thermoeye/family/style/index.html', 'front/products/feature/thermoeye/family/style/index');
Route::view('/products/feature/thermoeye/family/tv/index.html', 'front/products/feature/thermoeye/family/tv/index');
Route::view('/products/feature/acalux/', 'front/products/feature/acalux/index');
Route::view('/products/feature/acalux/about/', 'front/products/feature/acalux/about/index');
Route::view('/products/feature/acalux/column/', 'front/products/feature/acalux/column/index');
Route::view('/products/feature/acalux/column/column02.html', 'front/products/feature/acalux/column/column02');
Route::view('/products/feature/acalux/column/column03.html', 'front/products/feature/acalux/column/column03');
Route::view('/products/feature/acalux/column/column04.html', 'front/products/feature/acalux/column/column04');
Route::view('/products/feature/acalux/column/column05.html', 'front/products/feature/acalux/column/column05');
Route::view('/products/feature/acalux/column/column06.html', 'front/products/feature/acalux/column/column06');
Route::view('/products/feature/acalux/company/', 'front/products/feature/acalux/company/index');
Route::view('/products/feature/acalux/company/sitemap.html', 'front/products/feature/acalux/company/sitemap');
Route::view('/products/feature/acalux/developer/', 'front/products/feature/acalux/developer/index');
Route::view('/products/feature/acalux/mechanism/', 'front/products/feature/acalux/mechanism/index');
Route::view('/products/feature/acalux/performance/', 'front/products/feature/acalux/performance/index');
Route::view('/products/feature/acalux/product/', 'front/products/feature/acalux/product/index');
Route::view('/products/feature/acalux/qanda/', 'front/products/feature/acalux/qanda/index');
Route::view('/products/feature/acalux/quiz/', 'front/products/feature/acalux/quiz/index');
Route::view('/products/feature/naxe-cube-wp-system/', 'front/products/feature/naxe-cube-wp-system/index');
Route::get('/nippelab/term/search', 'Front\TermController@searchKeywords')->name('term.searchKeywords');
Route::get('/nippelab/term/{id}/', 'Front\TermController@show');
Route::view('/products/special/{※各コンテツごと設定}', 'front/products/special/index');
Route::view('/nippelab/', 'front/nippelab/index');
Route::view('/nippelab/beginner/', 'front/nippelab/beginner/index');
Route::view('/nippelab/detached-home/', 'front/nippelab/detached-home/index');
Route::view('/nippelab/condominium/', 'front/nippelab/condominium/index');
Route::view('/nippelab/interior/', 'front/nippelab/interior/index');
Route::get('/nippelab/{theme}/{article}/', 'Front\NippelabArticleController@show');
Route::get('/nippelab/term/', 'Front\TermController@index');
Route::get('/nippelab/term/search/notfound/', 'Front\TermController@_redirect');
Route::get('/nippelab/term/initial/{title_kana_2}/', 'Front\TermController@searchKanaLine');
Route::get('/nippelab/term/tag/{slug}/', 'Front\TermController@searchTag');
Route::view('/about/', 'front/about/index');
Route::view('/about/company/', 'front/about/company/index');
Route::view('/about/message/', 'front/about/message/index');
Route::get('/about/network/', 'Front\NetworkController@index');
Route::view('/recruit/', 'front/recruit/index');
Route::view('/recruit/businessfields/', 'front/recruit/businessfields/index');
Route::view('/recruit/career/', 'front/recruit/career/index');
Route::view('/recruit/talented/', 'front/recruit/talented/index');
Route::view('/legalnotice/', 'front/legalnotice/index');
Route::view('/privacypolicy/', 'front/privacypolicy/index');
Route::view('/sitemap/', 'front/sitemap/index');
Route::get('/csr/', 'Front\TopicController@csr');
Route::view('/support/', 'front/support/index');
Route::get('/support/faq/', 'Front\FaqController@index');
Route::get('/support/faq/search', 'Front\FaqController@searchKeywords')->name('faq.searchKeywords');
Route::get('/support/faq/search/notfound', 'Front\FaqController@_redirect');
Route::get('/support/faq/cat/{parent_category}/', 'Front\FaqController@parent_category');
Route::get('/support/faq/cat/{parent_category}/{child_category}/', 'Front\FaqController@child_category');
Route::get('/support/faq/{id}/', 'Front\FaqController@show');
Route::view('/support/information/', 'front/support/information/index');
Route::view('/support/information/fire/', 'front/support/information/fire/index');
Route::view('/support/information/attention/', 'front/support/information/attention/index');
Route::view('/support/information/pallet/', 'front/support/information/pallet/index');
Route::view('/contact/', 'front/contact/index');
Route::get('/contact/products/', 'Front\ContactProductsController@index');
Route::post('/contact/products/confirm/', 'Front\ContactProductsController@confirm');
Route::post('/contact/products/complete/', 'Front\ContactProductsController@store');
Route::view('/contact/products/transmission_error', 'front/contact/transmission_error');
Route::get('/contact/tough-guard-catalog/', 'Front\ContactToughGuardCatalogController@index');
Route::post('/contact/tough-guard-catalog/confirm/', 'Front\ContactToughGuardCatalogController@confirm');
Route::post('/contact/tough-guard-catalog/complete/', 'Front\ContactToughGuardCatalogController@store');
Route::view('/contact/tough-guard-catalog/transmission_error', 'front/contact/transmission_error');
Route::get('/contact/color-sample/', 'Front\ContactColorSampleController@index');
Route::post('/contact/color-sample/confirm/', 'Front\ContactColorSampleController@confirm');
Route::post('/contact/color-sample/complete/', 'Front\ContactColorSampleController@store');
Route::get('/contact/color-sample/download-Lrz1cuaKI34mw44O7sEnqS52UPzFxwJ0/', 'Front\ContactColorSampleController@download');
Route::view('/contact/paintkawaraban/', 'front/contact/paintkawaraban/index');
Route::get('/contact/large-estimation/', 'Front\ContactLargeEstimationController@index');
Route::post('/contact/large-estimation/confirm/', 'Front\ContactLargeEstimationController@confirm');
Route::post('/contact/large-estimation/complete/', 'Front\ContactLargeEstimationController@store');
Route::view('/contact/large-estimation/transmission_error', 'front/contact/transmission_error');
Route::get('/contact/naxecube-conceptbook/', 'Front\ContactNaxecubeConceptbookController@index');
Route::post('/contact/naxecube-conceptbook/confirm/', 'Front\ContactNaxecubeConceptbookController@confirm');
Route::post('/contact/naxecube-conceptbook/complete/', 'Front\ContactNaxecubeConceptbookController@store');
Route::view('/contact/naxecube-conceptbook/transmission_error', 'front/contact/transmission_error');
Route::get('/news', 'Front\TopicController@index');
Route::get('/news/csr/', 'Front\TopicController@news_csr');
Route::get('/news/csr/{topic_category}', 'Front\TopicController@news_csr');
Route::get('/news/{topic_category}/', 'Front\TopicController@index');
Route::get('/news/{publication_date}/{id}/', 'Front\TopicController@show');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
// Authentication Routes...
Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\Auth\LoginController@login');
Route::post('/admin/logout', 'Admin\Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('/admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/admin/password/reset', 'Admin\Auth\ResetPasswordController@reset');

// ログインを必要とする画面
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
    Route::prefix('/admin/faq')->group(function () {
        Route::get('', 'Admin\FaqController@index');
        Route::get('/create', 'Admin\FaqController@create');
        Route::put('/create', 'Admin\FaqController@store');
        Route::get('/{faq}/edit', 'Admin\FaqController@edit');
        Route::put('/{faq}/edit', 'Admin\FaqController@update');
        Route::delete('/{faq}/delete', 'Admin\FaqController@delete');
        Route::get('/{faq}/preview', 'Admin\FaqController@preview');

        Route::get('/category', 'Admin\QuestionCategoryController@index');
        Route::get('/category/create', 'Admin\QuestionCategoryController@create');
        Route::put('/category/create', 'Admin\QuestionCategoryController@store');
        Route::get('/category/{category}/edit', 'Admin\QuestionCategoryController@edit');
        Route::put('/category/{category}/edit', 'Admin\QuestionCategoryController@update');
        Route::delete('/category/{category}/delete', 'Admin\QuestionCategoryController@delete');

        Route::get('/pickup', 'Admin\FaqsPickupController@index');
        Route::post('/pickup', 'Admin\FaqsPickupController@update');
    });

    Route::get('/admin/nippelab/term', 'Admin\TechnicalTermController@getIndex');
    Route::group(['prefix' => '/admin/nippelab/term'], function () {
        Route::get('/create', 'Admin\TechnicalTermController@create');
        Route::put('/create', 'Admin\TechnicalTermController@store');
        Route::get('/{technical_term}/edit/', 'Admin\TechnicalTermController@edit');
        Route::put('/{technical_term}/edit/', 'Admin\TechnicalTermController@update');
        Route::delete('/{technical_term}/delete', 'Admin\TechnicalTermController@delete');
        Route::get('/{technical_term}/preview', 'Admin\TechnicalTermController@preview');
    });

    Route::prefix('/admin/news')->group(function () {
        Route::get('', 'Admin\TopicController@index');
        Route::get('/create', 'Admin\TopicController@create');
        Route::put('/create', 'Admin\TopicController@store');
        Route::get('/{topic}/edit', 'Admin\TopicController@edit');
        Route::put('/{topic}/edit', 'Admin\TopicController@update');
        Route::delete('/{topic}/delete', 'Admin\TopicController@delete');
        Route::get('/{topic}/preview', 'Admin\TopicController@preview');
    });

    Route::prefix('/admin/product/building')->group(function () {
        Route::get('/category', 'Admin\PBuildingSubcategoryController@index');
        Route::get('/category/create', 'Admin\PBuildingSubcategoryController@create');
        Route::put('/category/create', 'Admin\PBuildingSubcategoryController@store');
        Route::get('/category/{building_subcategory}/edit', 'Admin\PBuildingSubcategoryController@edit');
        Route::put('/category/{building_subcategory}/edit', 'Admin\PBuildingSubcategoryController@update');
        Route::delete('/category/{building_subcategory}/delete', 'Admin\PBuildingSubcategoryController@delete');

        Route::get('', 'Admin\PBuildingController@index');
        Route::get('/create', 'Admin\PBuildingController@create');
        Route::put('/create', 'Admin\PBuildingController@store');
        Route::get('/{p_building}/edit', 'Admin\PBuildingController@edit');
        Route::put('/{p_building}/edit', 'Admin\PBuildingController@update');
        Route::delete('/{p_building}/delete', 'Admin\PBuildingController@delete');
        Route::get('/{p_building}/copy', 'Admin\PBuildingController@copy');
        Route::put('/{p_building}/copy', 'Admin\PBuildingController@store');
        Route::get('/{p_building}/preview', 'Admin\PBuildingController@preview');
    });

    Route::prefix('/admin/product/automotive')->group(function () {
        Route::get('/category', 'Admin\PAutomotiveSubcategoryController@index');
        Route::get('/category/create', 'Admin\PAutomotiveSubcategoryController@create');
        Route::put('/category/create', 'Admin\PAutomotiveSubcategoryController@store');
        Route::get('/category/{automotive_subcategory}/edit', 'Admin\PAutomotiveSubcategoryController@edit');
        Route::put('/category/{automotive_subcategory}/edit', 'Admin\PAutomotiveSubcategoryController@update');
        Route::delete('/category/{automotive_subcategory}/delete', 'Admin\PAutomotiveSubcategoryController@delete');

        Route::get('', 'Admin\PAutomotiveController@index');
        Route::get('/create', 'Admin\PAutomotiveController@create');
        Route::put('/create', 'Admin\PAutomotiveController@store');
        Route::get('/{p_automotive}/edit', 'Admin\PAutomotiveController@edit');
        Route::put('/{p_automotive}/edit', 'Admin\PAutomotiveController@update');
        Route::delete('/{p_automotive}/delete', 'Admin\PAutomotiveController@delete');
        Route::get('/{p_automotive}/copy', 'Admin\PAutomotiveController@copy');
        Route::put('/{p_automotive}/copy', 'Admin\PAutomotiveController@store');
        Route::get('/{p_automotive}/preview', 'Admin\PAutomotiveController@preview');
    });

    Route::prefix('/admin/product/document')->group(function () {
        Route::get('', 'Admin\DocumentController@index');
        Route::get('/create', 'Admin\DocumentController@create');
        Route::put('/create', 'Admin\DocumentController@store');
        Route::get('/{document}/edit', 'Admin\DocumentController@edit');
        Route::put('/{document}/edit', 'Admin\DocumentController@update');
        Route::delete('/{document}/delete', 'Admin\DocumentController@delete');
    });

    Route::prefix('/admin/network')->group(function () {
        Route::get('', 'Admin\NetworkController@index');
        Route::get('/create', 'Admin\NetworkController@create');
        Route::put('/create', 'Admin\NetworkController@store');
        Route::get('/{network}/edit', 'Admin\NetworkController@edit');
        Route::put('/{network}/edit', 'Admin\NetworkController@update');
        Route::delete('/{network}/delete', 'Admin\NetworkController@delete');

        Route::get('/sort', 'Admin\NetworkSortController@index');
        Route::post('/sort', 'Admin\NetworkSortController@update');
    });

    Route::prefix('/admin/nippelab/article')->group(function () {
        Route::get('', 'Admin\NippelabArticleController@index');
        Route::get('/create', 'Admin\NippelabArticleController@create');
        Route::put('/create', 'Admin\NippelabArticleController@store');
        Route::get('/{article}/edit', 'Admin\NippelabArticleController@edit');
        Route::put('/{article}/edit', 'Admin\NippelabArticleController@update');
        Route::delete('/{article}/delete', 'Admin\NippelabArticleController@delete');
        Route::get('/{nippelab_article}/preview', 'Admin\NippelabArticleController@preview');
    });

    // 重防食用塗料
    Route::prefix('admin/product/large')->group(function () {
        // 製品
        Route::get('', 'Admin\PLargeController@index');
        Route::get('/create', 'Admin\PLargeController@create');
        Route::put('/create', 'Admin\PLargeController@store');
        Route::get('/{p_large}/edit', 'Admin\PLargeController@edit');
        Route::put('/{p_large}/edit', 'Admin\PLargeController@update');
        Route::delete('/{p_large}/delete', 'Admin\PLargeController@delete');
        Route::get('/{p_large}/copy', 'Admin\PLargeController@copy');
        Route::put('/{p_large}/copy', 'Admin\PLargeController@store');
        Route::get('/{p_large}/preview', 'Admin\PLargeController@preview');
        // 規格
        Route::prefix('standard')->group(function () {
            Route::get('', 'Admin\PLargeStandardController@index');
            Route::get('/create', 'Admin\PLargeStandardController@create');
            Route::put('/create', 'Admin\PLargeStandardController@store');
            Route::get('/{p_large_standard}/edit', 'Admin\PLargeStandardController@edit');
            Route::put('/{p_large_standard}/edit', 'Admin\PLargeStandardController@update');
            Route::delete('/{p_large_standard}/delete', 'Admin\PLargeStandardController@delete');
            Route::get('/sort', 'Admin\PLargeStandardController@sort');
            Route::post('/sort', 'Admin\PLargeStandardController@sort_update');
        });
        // 仕様
        Route::prefix('specification')->group(function () {
            // 橋梁・コンクリート
            Route::prefix('bridge')->group(function () {
                Route::get('', 'Admin\PLargeSpecBridgeController@index');
                Route::get('/create', 'Admin\PLargeSpecBridgeController@create');
                Route::put('/create', 'Admin\PLargeSpecBridgeController@store');
                Route::get('/{spec_bridge}/edit', 'Admin\PLargeSpecBridgeController@edit');
                Route::put('/{spec_bridge}/edit', 'Admin\PLargeSpecBridgeController@update');
                Route::delete('/{spec_bridge}/delete', 'Admin\PLargeSpecBridgeController@delete');
                Route::get('/{spec_bridge}/copy', 'Admin\PLargeSpecBridgeController@copy');
                Route::put('/{spec_bridge}/copy', 'Admin\PLargeSpecBridgeController@store');
                Route::get('/{spec_bridge}/preview', 'Admin\PLargeSpecBridgeController@preview');
            });
            // プラント・鉄塔・鋼構造物
            Route::prefix('steel')->group(function () {
                Route::get('', 'Admin\PLargeSpecSteelController@index');
                Route::get('/create', 'Admin\PLargeSpecSteelController@create');
                Route::put('/create', 'Admin\PLargeSpecSteelController@store');
                Route::get('/{spec_steel}/edit', 'Admin\PLargeSpecSteelController@edit');
                Route::put('/{spec_steel}/edit', 'Admin\PLargeSpecSteelController@update');
                Route::delete('/{spec_steel}/delete', 'Admin\PLargeSpecSteelController@delete');
                Route::get('/{spec_steel}/copy', 'Admin\PLargeSpecSteelController@copy');
                Route::put('/{spec_steel}/copy', 'Admin\PLargeSpecSteelController@store');
                Route::get('/{spec_steel}/preview', 'Admin\PLargeSpecSteelController@preview');
            });
        });

    });
    Route::get('/admin/file', 'Admin\FileController@index');

    Route::get('/admin/nippelab/term_tag', 'Admin\TermTagController@index');
    Route::post('/admin/nippelab/term_tag', 'Admin\TermTagController@store');
    Route::put('/admin/nippelab/term_tag/{term_tag}', 'Admin\TermTagController@update');
    Route::delete('/admin/nippelab/term_tag/{term_tag}', 'Admin\TermTagController@delete');

    Route::prefix('/admin/user')->group(function () {
        Route::get('', 'Admin\UserController@index');
        Route::get('/create', 'Admin\UserController@create');
        Route::put('/create', 'Admin\UserController@store');
        Route::get('/{user}/edit', 'Admin\UserController@edit');
        Route::put('/{user}/edit', 'Admin\UserController@update');
        Route::delete('/{user}/delete', 'Admin\UserController@delete');

        Route::get('/my_profile', 'Admin\MyProfileController@edit');
        Route::put('/my_profile', 'Admin\MyProfileController@update');
        Route::get('/my_profile/password', 'Admin\MyProfileController@password');
        Route::put('/my_profile/password', 'Admin\MyProfileController@password_update');
    });
});
