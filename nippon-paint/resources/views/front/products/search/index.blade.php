<x-header>
    <x-slot name="title">”{{ $productSearch->displayKeywords }}”の検索結果｜日本ペイント株式会社</x-slot>
    <x-slot name="description">本ペイント株式会社の製品検索「{{ $productSearch->displayKeywords }}」での検索結果一覧です。建築用塗料、重防食用塗料、自動車補修用塗料の製品説明書や塗装仕様など条件に合わせて検索できます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">searchindex</x-slot>
    <x-slot name="unique">products_search</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/search?{q=keyword,keyword2}</x-slot>
</x-header>

<main class="p-search_index">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products">製品情報</a></li>
                <li><span>”{{ $productSearch->displayKeywords }}”の検索結果</span></li>
            </ul>
        </div>
    </div>

    <div class="p-search_index1 l-cont">
        <h1 class="c-title2 c-title2__style2">”{{ $productSearch->displayKeywords }}”の検索結果</h1>
    </div><!-- /.p-search_index1 -->
    <div class="l-cont">
        <div class="c-block1">
            <div class="c-block1__form">
                @include('front.elements.products.search.form', [
                    'type_value' => $request->get('type'),
                    'keywords_value' => $request->get('keywords'),
                    'limit_change' => true
                ])
            </div>
            <div class="c-initials">
                @include('front.elements.products.initial_box_long', [
                    'href_base_url' => url('/products/initial/'),
                    'initials_count' => $productSearch->getInitialsCountLong()
                ])
            </div><!-- / c-initials -->
        </div>
    </div>

    <div class="p-search_index3 l-cont">
        <div class="c-block2 c-block2__style1">
            <div class="c-block2__header">
                <h4 class="c-block2__header__title">該当件数<span class="c-num">{{ count($productSearch->baseData) }}</span>件</h4>
                <div class="c-block2__header__right">
                    <p class="c-block2__header__label">表示件数</p>
                    <div class="c-block2__header__select" id="app">
                        <change-limit
                            :limit="{{$productSearch->limit}}"
                        ></change-limit>
                    </div>
                </div>
            </div><!-- / c-block2__header -->
            @include('front.elements.products.all_products_index')
        </div><!-- /.c-block2 -->
    </div><!-- /.p-search_index3 -->

    <div class="p-search_index4 l-cont">
{{--        <x-pagenavi></x-pagenavi>--}}
        {{ $productSearch->pager->onEachSide(1)->links('pagination::front-pager') }}
    </div><!-- /.p-search_index4 -->

</main>

<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>
