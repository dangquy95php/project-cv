<x-header>
    <x-slot name="title">仕様を探す｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「重防食用塗料」製品仕様一覧ページです。橋梁・コンクリート、プラント・鉄塔・鋼構造物の規格から仕様を絞り込むことができます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/large/specification/</x-slot>
</x-header>


<main class="p-largeSpec">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/large/">重防食用塗料</a></li>
                <li><span>仕様を探す</span></li>
            </ul>
        </div>
    </div>
    <section class="c-mainimg">
        <div class="l-cont">
            <h1 class="c-mainimg__title">
                <span class="c-mainimg__title__jap">仕様を探す</span>
                <span class="c-mainimg__title__eng">Search for Specification</span>
            </h1>
        </div>
    </section><!-- / c-mainimg -->
    <section class="p-largeSpec1">
        <div class="l-cont">
            <div class="c-block1 c-block1--style1">
                <div class="c-block1__form">
                    @include('front.elements.products.search.form', [
                        'type_value' => \App\Models\ProductSearch::F_LARGE_SPEC_KEY,
                        'keywords_value' => null
                    ])
                </div>
            </div>
            @include('front.elements.products.large_spec.searchbox')

            <div class="c-box4">
                <h2 class="c-title2 c-title2--center c-title2--white">タフガードQ-R工法</h2>
                <p class="c-box4__txt">
                    塗るだけでコンクリート片のはく落を防止コンクリート片はく落防止システム。
                    <br>我々の生活空間の多くを構成するコンクリート。地球環境の劇的な変化によって、そのコンクリートを取り巻く
                    <br>環境も厳しいものに変わってきました。｢タフガードQ-R 工法｣は、責任施工で品質向上に貢献します。
                </p>
                <div class="u-center">
                    <a href="#" class="c-btn2 ">詳細を見る</a>
                </div>
            </div>
            <div class="c-block1 c-block1--style1">
                <div class="c-block1__form">
                    @include('front.elements.products.search.form', [
                        'type_value' => \App\Models\ProductSearch::F_LARGE_SPEC_KEY,
                        'keywords_value' => null
                    ])
                </div>

                @include('front.elements.products.kana_box', [
                    'href_base_url' => url('/products/large/paint/initial/'),
                    'kana_count' => (new \App\Models\PLargePaintKanaSearch())->getKanaCount()
                ])
            </div>
            <div class="c-boxlink">
                <a href="" class="c-boxlink__inner">
                    <h2 class="c-boxlink__text">塗装ガイドブック</h2>
                    <div class="c-boxlink__img">
                        <img src="/images/common/boxlink_img.jpg" alt="塗装ガイドブック" class="pc-only">
                        <img src="/images/common/boxlink_img-sp.jpg" alt="塗装ガイドブック" class="sp-only">
                    </div>
                </a>
            </div>
            <h2 class="c-title2 c-title2--center">技術資料・積算資料</h2>
            <div class="c-list6 c-list6--col4">
                <ul class="c-list6__box">
                    <li class="c-list6__item">
                        <a href="/" target="_blank" class="c-list6__txt">JIS規格一覧表・塗装略号一覧表</a>
                    </li>
                    <li class="c-list6__item">
                        <a href="/" target="_blank" class="c-list6__txt">さび止め色相表</a>
                    </li>
                    <li class="c-list6__item arrow">
                        <a href="/" class="c-list6__txt">カタログ一覧</a>
                    </li>
                    <li class="c-list6__item arrow">
                        <a href="/" class="c-list6__txt">耐火認定</a>
                    </li>
                    <li class="c-list6__item arrow">
                        <a href="/" class="c-list6__txt">技術資料（塗膜異常、技術解説資料）</a>
                    </li>
                    <li class="c-list6__item">
                        <a href="/" target="_blank" class="c-list6__txt">積算資料</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</main>

<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>
