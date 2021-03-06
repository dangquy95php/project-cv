<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    @if (strpos($unique,'family') !== false || strpos($unique,'factory') !== false || strpos($unique,'acalux') !== false)
    <meta name="viewport" content="width=1200">
    @else
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @endif

    <meta name="description" content="{{$description ?? ''}}">
    <meta name="keywords" content="{{$keywords ?? ''}}">
    <meta property="og:title" content="{{$title ?? ''}}">
    <meta property="og:type" content="{{$og_type ?? ''}}">
    <meta property="og:description" content="{{$description ?? ''}}">
    <meta property="og:image" content="https://www.nipponpaint.co.jp/assets/image/common/logo.png">
    <meta property="og:url" content="{{$url ?? ''}}">

    <title>{{$title ?? ''}}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="canonical" href="{{$url ?? ''}}">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-M8PWWZ8');</script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="/assets/css/front/base.css">
    <link rel="stylesheet" href="/assets/css/front/component_basic.css">

    @if ($unique == 'top')
    <link rel="stylesheet" href="/assets/css/front/top/index.css">
    @endif

    @if ($unique == 'products_index')
    <link rel="stylesheet" href="/assets/css/front/products/index.css">
    @endif

    @if ($unique == 'products_search')
    <link rel="stylesheet" href="/assets/css/front/products/search.css">
    @endif

    @if ($unique == 'products_feature')
    <link rel="stylesheet" href="/assets/css/front/products/feature.css">
    @endif

    @if ($unique == 'products_building')
    <link rel="stylesheet" href="/assets/css/front/products/building.css">
    @endif

    @if (Request::path() == 'nippelab/beginner' || Request::path() == 'nippelab/beginner/detail' || $unique == 'nippelab_beginner')
    <link rel="stylesheet" href="/assets/css/front/nippelab/index.css">
    @endif

    @if ($unique == 'nippelab_detached-home')
    <link rel="stylesheet" href="/assets/css/front/nippelab/detached-home.css">
    @endif

    @if ($unique == 'nippelab_term')
    <link rel="stylesheet" href="/assets/css/front/nippelab/term.css">
    @endif

    @if ($unique == 'products_largeAfter')
    <link rel="stylesheet" href="/assets/css/front/products/large_after.css">
    @endif

    @if ($unique == 'products_large')
    <link rel="stylesheet" href="/assets/css/front/products/large.css">
    @endif

    @if ($unique == 'nippelab_index')
    <link rel="stylesheet" href="/assets/css/front/nippelab/index.css">
    @endif

    @if ($unique == 'perfect')
    <link rel="stylesheet" href="/assets/products/feature/perfect/css/common.css">
    @endif

    @if ($unique == 'thermoeye')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/css/style.css">
    @endif

    @if (strpos($unique,'family') !== false)
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/css/default.css">
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/css/common.css">
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/css/style.css">
    <script src="/assets/products/feature/thermoeye/js/swfobject.js"></script>
    <script src="/assets/products/feature/thermoeye/family/js/smartRollover.js"></script>
    @endif

    @if ($unique == 'family-column')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/column/css/column.css">
    @endif

    @if ($unique == 'family-howto')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/download/css/howto.css">
    @endif

    @if ($unique == 'family-flow')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/products/css/flow.css">
    @endif

    @if ($unique == 'family-products-sw')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/products/css/products-sw.css">
    @endif

    @if ($unique == 'family-faq')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/faq/css/faq.css">
    @endif

    @if ($unique == 'family-tv')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/tv/css/tv.css">
    @endif

    @if ($unique == 'family-simcolor_fla')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/simcolor/css/simcolor.css">
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/simcolor/css/simcolor_fla.css">
    @endif

    @if ($unique == 'family-style')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/style/css/style.css">
    @endif

    @if ($unique == 'family-download' || $unique == 'factory-products' || $unique == 'family-products')
    <script type="text/javascript" src="/assets/products/feature/thermoeye/js/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="/assets/products/feature/thermoeye/js/thickbox/thickbox.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/products/feature/thermoeye/js/thickbox/thickbox.css" />
    @endif

    @if (strpos($unique,'factory') !== false)
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/css/default.css">
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/css/common.css">
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/css/style.css">
    <script src="/assets/products/feature/thermoeye/factory/js/smartRollover.js"></script>
    <script src="/assets/products/feature/thermoeye/js/swfobject.js"></script>
    @endif

    @if ($unique == 'factory')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/css/top.css">
    @endif

    @if ($unique == 'factory-company')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/company/css/sitemap.css">
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/company/css/company.css">
    @endif

    @if ($unique == 'family-company')
        <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/company/css/sitemap.css">
        <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/company/css/company.css">
    @endif

    @if ($unique == 'factory-concept')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/concept/css/concept.css">
    @endif

    @if ($unique == 'factory-download')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/download/css/download.css">
    @endif

    @if ($unique == 'family-download')
        <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/download/css/download.css">
    @endif

    @if ($unique == 'factory-download' || $unique == 'factory-simcolor' || $unique == 'family-simcolor')
    <script src="/js/front/common/page/thermoeye/popup.js"></script>
    @endif

    @if ($unique == 'factory-mechanism')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/mechanism/css/mechanism.css">
    @endif

    @if ($unique == 'factory-point')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/point/css/point.css">
    @endif

    @if ($unique == 'family-point')
        <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/point/css/point.css">
    @endif

    @if ($unique == 'factory-products')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/products/css/products.css">
    @endif

    @if ($unique == 'family-products')
        <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/products/css/products.css">
    @endif

    @if ($unique == 'factory-proof')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/proof/css/proof.css">
    @endif

    @if ($unique == 'family-proof')
        <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/proof/css/proof.css">
    @endif

    @if ($unique == 'factory-simcolor' || $unique == 'factory-simcolor_fla')
    <link rel="stylesheet" href="/assets/products/feature/thermoeye/factory/simcolor/css/simcolor.css">
    @endif

    @if ($unique == 'family-simcolor')
        <link rel="stylesheet" href="/assets/products/feature/thermoeye/family/simcolor/css/simcolor.css">
    @endif

    @if(strpos($unique,'acalux') !== false)
    <link rel="stylesheet" href="/assets/products/feature/acalux/shared/css/flash.css" type="text/css">
    <link rel="stylesheet" href="/assets/products/feature/acalux/shared/css/common.css">
    <link rel="stylesheet" href="/assets/products/feature/acalux/shared/css/column.css">
    <link rel="stylesheet" href="/assets/products/feature/acalux/shared/css/column00.css">
    <script src="/assets/products/feature/acalux/shared/js/swfobject.js"></script>
    <script src="/assets/products/feature/acalux/shared/js/swfaddress.js"></script>
    <script src="/assets/products/feature/acalux/shared/js/jquery.js"></script>
    <script src="/assets/products/feature/acalux/shared/js/resize.js"></script>
    @endif

    @if($unique == 'acalux')
    <script src="/assets/products/feature/acalux/shared/js/flash-top.js"></script>
    @endif

    @if($unique == 'acalux-about' || $unique == 'acalux-developer' || $unique == 'acalux-performance' || $unique == 'acalux-mechanism' || $unique == 'acalux-qanda' || $unique == 'acalux-quiz' || $unique == 'acalux-product' || $unique == 'acalux-company')
    <script src="/assets/products/feature/acalux/shared/js/flash.js"></script>
    @endif

    @if($unique == 'acalux-column')
    <script src="/assets/products/feature/acalux/shared/js/flash-column.js"></script>
    @endif

    @if($unique == 'naxe-cube')
    <link rel="stylesheet" href="/assets/css/front/products/font.css">
    <link rel="stylesheet" href="/assets/css/front/products/style.css">
    <link rel="stylesheet" href="/assets/css/front/products/colorbox.css">
    <link rel="stylesheet" href="/assets/css/front/products/cfg_renew.css">
    <link rel="stylesheet" href="/assets/css/front/products/cfg_renew_small.css">
    <link rel="stylesheet" href="/assets/css/front/common/origin/win_renew.css">
    <link rel="stylesheet" href="/assets/css/front/common/origin/win_renew_small.css">
    @endif

    @if ($unique == 'contact_index')
    <link rel="stylesheet" href="/assets/css/front/contact/index.css">
    @endif

    @if ($unique == 'contact_tough')
    <link rel="stylesheet" href="/assets/css/front/contact/tough.css">
    @endif

    @if ($unique == 'contact_large')
    <link rel="stylesheet" href="/assets/css/front/contact/large.css">
    @endif

    @if ($unique == 'contact_paint')
    <link rel="stylesheet" href="/assets/css/front/contact/paint.css">
    @endif

    @if ($unique == 'contact_naxe')
    <link rel="stylesheet" href="/assets/css/front/contact/naxe.css">
    @endif

    @if ($unique == 'contact_products')
    <link rel="stylesheet" href="/assets/css/front/contact/products.css">
    @endif

    @if ($unique == 'contact_color')
    <link rel="stylesheet" href="/assets/css/front/contact/color.css">
    @endif

    @if ($unique == 'error')
    <link rel="stylesheet" href="/assets/css/front/maintenance/error.css">
    @endif

    @if ($unique == 'support_infor')
    <link rel="stylesheet" href="/assets/css/front/support/infor.css">
    @endif

    @if ($unique == 'support_index')
    <link rel="stylesheet" href="/assets/css/front/support/index.css">
    @endif

    @if ($unique == 'support_faq')
    <link rel="stylesheet" href="/assets/css/front/support/faq.css">
    @endif

    @if ($unique == 'about')
    <link rel="stylesheet" href="/assets/css/front/about/index.css">
    @endif

    @if ($unique == 'about_company')
    <link rel="stylesheet" href="/assets/css/front/about/company.css">
    @endif

    @if ($unique == 'about_message')
    <link rel="stylesheet" href="/assets/css/front/about/message.css">
    @endif

    @if ($unique == 'about_network')
    <link rel="stylesheet" href="/assets/css/front/about/network.css">
    @endif

    @if ($unique == 'news')
    <link rel="stylesheet" href="/assets/css/front/news/index.css">
    @endif

    @if ($unique == 'privacypolicy')
    <link rel="stylesheet" href="/assets/css/front/privacypolicy/index.css">
    @endif

    @if ($unique == 'legalnotice')
    <link rel="stylesheet" href="/assets/css/front/legalnotice/index.css">
    @endif

    @if ($unique == 'sitemap')
    <link rel="stylesheet" href="/assets/css/front/sitemap/index.css">
    @endif

    @if ($unique == 'csr')
    <link rel="stylesheet" href="/assets/css/front/csr/index.css">
    @endif

    @if(strpos($unique,'recruit') !== false)
    <link rel="stylesheet" href="/assets/css/front/common/origin/win_renew.css">
    <link rel="stylesheet" href="/assets/css/front/common/origin/win_renew_small.css">
    <link rel="stylesheet" href="/assets/css/front/recruit/cfg_renew.css">
    <link rel="stylesheet" href="/assets/css/front/recruit/cfg_renew_small.css">
    @endif


</head>

<body class="page-{{$slug ?? ''}}">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M8PWWZ8"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header class="l-header">
        <div class="l-header__logo">
            @if ($unique == 'top')
            <h1><a href="/"><img src="/images/common/logo.svg" alt="logo"><img src="/images/common/logo_top.svg" alt="logo" class="top_logo"></a></h1>
            @endif
            @if ($unique != 'top')
                <a href="/"><img src="/images/common/logo.svg" alt="logo"><img src="/images/common/logo_top.svg" alt="logo" class="top_logo"></a>
            @endif
        </div>
        <div class="l-header__btn js-l-header__btn">
            <span></span>
            <span>menu</span>
        </div>

        <div class="l-header__content">
            <div class="l-header__top">
                <div class="l-header__top__link">
                    <a href="/recruit/" class="l-header__top__share">????????????</a>
                    <a href="/contact/" class="l-header__top__contact">??????????????????</a>
                </div>
                <div class="l-header__social">
                    <a href="https://www.youtube.com/channel/UCnzJbOdSo0rXkRfgyJ3dGCg" class="l-header__youtube" target="_blank"></a>
                    <a href="https://www.facebook.com/nptu.nipponpaint/" class="l-header__facebook" target="_blank"></a>
                </div>

            </div><!-- / l-header__top -->

            <div class="l-header__bottom">
                <nav class="l-header__nav">
                    <ul class="l-header__menu">
                        <li class="l-header__item">
                            <span class="l-header__itemchild js-l-header__item">????????????</span>
                            <span class="l-header__item__txt <?php if (\Request::is('products') || \Request::is('products/*')) { echo 'is-active';} ?> pc2-only">????????????</span>
                            <div class="l-header__child">
                                <div class="l-header__child__content pc2-only">
                                    <div class="l-header__child1">
                                        <div class="l-header__child1__box">
                                            <h2 class="l-header__child1__tit"><a href="/products/">????????????</a></h2>
                                            <p class="l-header__child1__txt">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                        </div>
                                    </div>
                                    <div class="l-header__child2">
                                        <h3 class="l-header__child2__tit">???????????????</h3>
                                        <div class="c-form1">
                                            <form class="c-form1__form" action="{{ route('front.products.search') }}">
                                                <div class="c-form1__select">
                                                    {{ Form::select('type', \App\Models\ProductSearch::F_FORM_SELECT_OPTIONS, \App\Models\ProductSearch::F_ALL_KEY, []) }}
                                                </div>
                                                <div class="c-form1__input">
                                                    <input name="keywords" type="text" placeholder="??????????????????????????????JIS??????????????????????????????">
                                                </div>
                                                <button class="c-form1__btn"></button>
                                            </form>
                                        </div>
                                        <div class="l-header__list1">
                                            <div class="l-header__list1__item">
                                                <div class="l-header__list1__img">
                                                    <img src="/images/common/menu1.jpg" alt="???????????????" />
                                                    <img src="/images/common/menu1_hv.jpg" alt="???????????????" />
                                                </div>
                                                <a class="l-header__list1__txt" href="/products/building/">???????????????</a>
                                            </div>
                                            <div class="l-header__list1__item">
                                                <div class="l-header__list1__img">
                                                    <img src="/images/common/menu2.jpg" alt="??????????????????" />
                                                    <img src="/images/common/menu2_hv.jpg" alt="??????????????????" />
                                                </div>
                                                <a class="l-header__list1__txt" href="/products/large/">??????????????????</a>
                                            </div>
                                            <div class="l-header__list1__item">
                                                <div class="l-header__list1__img">
                                                    <img src="/images/common/menu3.jpg" alt="????????????????????????" />
                                                    <img src="/images/common/menu3_hv.jpg" alt="????????????????????????" />
                                                </div>
                                                <a class="l-header__list1__txt" href="/products/automotive/">????????????????????????</a>
                                            </div>
                                        </div>
                                        <h3 class="l-header__child2__tit">????????????</h3>
                                        <div class="l-header__list2 is-col4">
                                            <p class="l-header__list2__item"><a href="/products/feature/perfect/">??????????????????????????????</a></p>
                                            <p class="l-header__list2__item"><a href="/products/feature/naxe-cube-wp-system/">nax E-CUBE WB ??????????????????</a></p>
                                            <p class="l-header__list2__item"><a href="/products/feature/thermoeye/">THERMOEYE ???????????????</a></p>
                                            <p class="l-header__list2__item"><a href="http://emo-paint.com/" target="_blank">EMO</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="l-header__child__content pad-only">
                                    <p class="l-header__child__txt1"><a href="/products/">????????????TOP</a></p>
                                    <p class="l-header__child__txt2"><a href="/products/building/">???????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/products/large/">??????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/products/automotive/">????????????????????????</a></p>
                                    <p class="l-header__child__txt1"><a href="/products/feature/">????????????TOP</a></p>
                                    <p class="l-header__child__txt2"><a href="/products/feature/perfect/">??????????????????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/products/feature/naxe-cube-wp-system/">nax E-CUBE WB ??????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/products/feature/thermoeye/">???????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="http://emo-paint.com/" target="_blank">EMO</a></p>
                                </div>
                            </div>
                        </li>
                        <li class="l-header__item">
                            <span class="l-header__itemchild js-l-header__item">???????????????</span>
                            <span class="l-header__item__txt <?php if (\Request::is('nippelab') || \Request::is('nippelab/*')) { echo 'is-active';} ?> pc2-only">???????????????</span>
                            <div class="l-header__child">
                                <div class="l-header__child__content pc2-only">
                                    <div class="l-header__child1">
                                        <div class="l-header__child1__box">
                                            <h2 class="l-header__child1__tit"><a href="/nippelab/">???????????????</a></h2>
                                            <p class="l-header__child1__txt">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                        </div>
                                    </div>
                                    <div class="l-header__child2">
                                        <div class="l-header__list1">
                                            <div class="l-header__list1__item">
                                                <div class="l-header__list1__img">
                                                    <img src="/images/common/menu4.jpg" alt="?????????????????????" />
                                                    <img src="/images/common/menu4_hv.jpg" alt="?????????????????????" />
                                                </div>
                                                <a class="l-header__list1__txt" href="/nippelab/beginner/">?????????????????????</a>
                                            </div>
                                            <div class="l-header__list1__item">
                                                <div class="l-header__list1__img">
                                                    <img src="/images/common/menu5.jpg" alt="??????????????????????????????" />
                                                    <img src="/images/common/menu5_hv.jpg" alt="??????????????????????????????" />
                                                </div>
                                                <a class="l-header__list1__txt" href="/nippelab/detached-home/">??????????????????????????????</a>
                                            </div>
                                            <div class="l-header__list1__item">
                                                <div class="l-header__list1__img">
                                                    <img src="/images/common/menu6.jpg" alt="???????????????????????????" />
                                                    <img src="/images/common/menu6_hv.jpg" alt="???????????????????????????" />
                                                </div>
                                                <a class="l-header__list1__txt" href="/nippelab/condominium/">???????????????????????????</a>
                                            </div>
                                            <div class="l-header__list1__item">
                                                <div class="l-header__list1__img">
                                                    <img src="/images/common/menu7.jpg" alt="??????????????????" />
                                                    <img src="/images/common/menu7_hv.jpg" alt="??????????????????" />
                                                </div>
                                                <a class="l-header__list1__txt" href="/nippelab/interior/">??????????????????</a>
                                            </div>
                                            <div class="l-header__list1__item">
                                                <div class="l-header__list1__img">
                                                    <img src="/images/common/menu8.jpg" alt="??????????????????" />
                                                    <img src="/images/common/menu8_hv.jpg" alt="??????????????????" />
                                                </div>
                                                <a class="l-header__list1__txt" href="/nippelab/term/">??????????????????</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="l-header__child__content pad-only">
                                    <p class="l-header__child__txt1"><a href="/nippelab/">???????????????TOP</a></p>
                                    <p class="l-header__child__txt2"><a href="/nippelab/beginner/">?????????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/nippelab/detached-home/">?????????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/nippelab/interior/">??????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/nippelab/term/">????????????</a></p>
                                </div>
                            </div>
                        </li>
                        <li class="l-header__item">
                            <span class="l-header__itemchild js-l-header__item">?????????????????????</span>
                            <span class="l-header__item__txt <?php if (\Request::is('support') || \Request::is('support/*') || \Request::is('contact') || \Request::is('contact/*')) { echo 'is-active';} ?> pc2-only">?????????????????????</span>
                            <div class="l-header__child">
                                <div class="l-header__child__content pc2-only">
                                    <div class="l-header__child1">
                                        <div class="l-header__child1__box">
                                            <h2 class="l-header__child1__tit"><a href="/support/">?????????????????????</a></h2>
                                            <p class="l-header__child1__txt">???????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                        </div>
                                    </div>
                                    <div class="l-header__child2">
                                        <div class="l-header__list3">
                                            <div class="l-header__list3__item">
                                                <a class="l-header__list3__txt" href="/support/faq/">?????????????????????</a>
                                            </div>
                                            <div class="l-header__list3__item">
                                                <a class="l-header__list3__txt" href="/support/information/">??????????????????????????????</a>
                                            </div>
                                            <div class="l-header__list3__item">
                                                <a class="l-header__list3__txt" href="/contact/">??????????????????</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="l-header__child__content pad-only">
                                    <p class="l-header__child__txt1"><a href="/support/">?????????????????????TOP</a></p>
                                    <p class="l-header__child__txt2"><a href="/support/faq/">?????????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/support/information/">??????????????????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/contact/">??????????????????</a></p>
                                </div>
                            </div>
                        </li>
                        <li class="l-header__item">
                            <span class="l-header__itemchild js-l-header__item">??????????????????????????????</span>
                            <span class="l-header__item__txt <?php if (\Request::is('about') || \Request::is('about/*') || \Request::is('recruit') || \Request::is('recruit/*') || \Request::is('privacypolicy') || \Request::is('privacypolicy/*')) { echo 'is-active';} ?> pc2-only">??????????????????????????????</span>
                            <div class="l-header__child">
                                <div class="l-header__child__content pc2-only">
                                    <div class="l-header__child1">
                                        <div class="l-header__child1__box">
                                            <h2 class="l-header__child1__tit"><a href="/about/">?????????????????????<br class="pc-only">?????????</a></h2>
                                            <p class="l-header__child1__txt">???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? </p>
                                        </div>
                                    </div>
                                    <div class="l-header__child2">
                                        <div class="l-header__list3">
                                            <div class="l-header__list3__item">
                                                <a class="l-header__list3__txt" href="/about/company/">????????????</a>
                                            </div>
                                            <div class="l-header__list3__item">
                                                <a class="l-header__list3__txt" href="/about/network/">????????????</a>
                                            </div>
                                            <div class="l-header__list3__item">
                                                <a class="l-header__list3__txt" href="/recruit/">????????????</a>
                                            </div>
                                        </div>
                                        <div class="l-header__list2">
                                            <p class="l-header__list2__item"><a href="//legalnotice/">????????????????????????</a></p>
                                            <p class="l-header__list2__item"><a href="/privacypolicy/">????????????????????????????????????</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="l-header__child__content pad-only">
                                    <p class="l-header__child__txt1"><a href="/about/">??????????????????????????????TOP</a></p>
                                    <p class="l-header__child__txt2"><a href="/about/company/">????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/about/network/">??????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/recruit/">????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/legalnotice/">????????????????????????</a></p>
                                    <p class="l-header__child__txt2"><a href="/privacypolicy/">???????????????????????????????????????</a></p>
                                </div>
                            </div>
                        </li>
                        <li class="l-header__item">
                            <!-- <span class="l-header__item__txt">???????????????</span> -->
                            <span class="l-header__itemchild js-l-header__item">???????????????</span>
                            <span class="l-header__item__txt <?php if (\Request::is('news') || \Request::is('news/*')) { echo 'is-active';} ?> pc2-only"><a href="/news/">???????????????</a></span>
                        </li>
                    </ul>
                </nav>
                <div class="l-header__bnt pad-only">
                    <div class="l-header__bnt1">
                        <p class="contact"><a href="/contact/">??????????????????</a></p>
                        <p class="user"><a href="/recruit/">????????????</a></p>
                    </div>
                    <div class="l-header__bnt1">
                        <p class="youtube"><a href="https://www.youtube.com/channel/UCnzJbOdSo0rXkRfgyJ3dGCg">??????YouTube</a></p>
                        <p class="facebook"><a href="https://www.facebook.com/nptu.nipponpaint/">??????facebook</a></p>
                    </div>
                    <p class="l-header__bnt2"><a href="/">??????????????????????????????????????????</a></p>
                    <ul class="l-header__bnt3">
                        <li><a href="/legalnotice/">????????????????????????</a></li>
                        <li><a href="/privacypolicy/">???????????????????????????????????????</a></li>
                    </ul>
                </div>
            </div>
            <button class="l-header__bnt4 pad-only"><span>????????????????????????</span></button>
        </div>
    </header>
