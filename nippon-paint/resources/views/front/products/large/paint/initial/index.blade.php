<x-header>
    <x-slot name="title">{{ $p_large_paint_search->initial }}行｜重防食用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">{{ $p_large_paint_search->initial }}行｜重防食用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="unique">products_large</x-slot>
</x-header>

<main class="p-standardDetail">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/large/">重防食用塗料</a></li>
                <li><a href="/products/large/paint/">製品を探す</a></li>
                <li><span>重防食用塗料{{ $p_large_paint_search->initial }}行</span></li>
            </ul>
        </div>
    </div>

    <section class="p-standardDetail1">
        <div class="l-cont">
            <h2 class="c-title2 c-title2__style2">{{ $p_large_paint_search->initial }}行
                <span>／ 重防食用塗料</span></h2>

            <div class="c-block1 c-block1--style1">
                <div class="c-block1__form">
                    @include('front.elements.products.search.form', [
                        'type_value' => \App\Models\ProductSearch::F_LARGE_ID,
                        'keywords_value' => null
                    ])
                </div>

                @include('front.elements.products.kana_box', [
                    'href_base_url' => url('/products/large/paint/initial/'),
                    'kana_count' => (new \App\Models\PLargePaintKanaSearch())->getKanaCount()
                ])
            </div>
        </div>
    </section>

    <section class="p-standardDetail2">
        <div class="l-cont">
            <div class="l-aside">
                <article>
                    <div class="c-block2 c-block2--full">
                        <div class="c-block2__header">
                            <h4 class="c-block2__header__title">該当件数<span class="c-num">{{ $p_larges->total() }}</span>件</h4>
                            @if ($p_larges->total() >= 10)
                                <div class="c-block2__header__right">
                                    <p class="c-block2__header__label">表示件数</p>
                                    <div class="c-block2__header__select" id="app">
                                        <change-limit-without-form-component
                                            :limit="{{ $p_larges->perPage() }}"
                                        ></change-limit-without-form-component>
                                    </div>
                                </div>
                            @endif
                        </div><!-- / c-block2__header -->

                        @foreach ($p_larges as $p_large)
                            @include('front.elements.products.large.product')
                        @endforeach

                    </div><!-- / c-block2 -->

                    {{ $p_larges->links('pagination::front-pager') }}
                </article>

                @include('front.elements.products.large.sidebar')
            </div>
        </div>
    </section>

    <section class="p-standardDetail3">
        <div class="l-cont">
            <div class="c-block1 c-block1--style1">
                <div class="c-block1__form">
                    @include('front.elements.products.search.form', [
                        'type_value' => \App\Models\ProductSearch::F_LARGE_ID,
                        'keywords_value' => null
                    ])
                </div>

                @include('front.elements.products.kana_box', [
                    'href_base_url' => url('/products/large/paint/initial/'),
                    'kana_count' => (new \App\Models\PLargePaintKanaSearch())->getKanaCount()
                ])
            </div>
            <div class="c-boxlink">
                <a href="{{ url("/products/large/guidebook/") }}" class="c-boxlink__inner">
                    <h2 class="c-boxlink__text">塗装ガイドブック</h2>
                    <div class="c-boxlink__img">
                        <img src="/images/common/boxlink_img.jpg" alt="塗装ガイドブック" class="pc-only">
                        <img src="/images/common/boxlink_img-sp.jpg" alt="塗装ガイドブック" class="sp-only">
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="p-standardDetail4">
        <div class="l-cont">
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
                        <a href="{{ url('/products/large/catalog/') }}" class="c-list6__txt">カタログ一覧</a>
                    </li>
                    <li class="c-list6__item arrow">
                        <a href="{{ url('/products/large/fireproof/') }}" class="c-list6__txt">耐火塗料の優れた特長</a>
                    </li>
                    <li class="c-list6__item arrow">
                        <a href="{{ url('/products/large/technic/') }}" class="c-list6__txt">技術資料（塗膜異常、技術解説資料）</a>
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
