<x-header>
    <x-slot name="title">”{{ $productSearch->displayKeywords }}”の検索結果｜日本ペイント株式会社</x-slot>
    <x-slot name="description">本ペイント株式会社の製品検索「{{ $productSearch->displayKeywords }}」での検索結果一覧です。建築用塗料、重防食用塗料、自動車補修用塗料の製品説明書や塗装仕様など条件に合わせて検索できます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">search_notfoundnotfound</x-slot>
    <x-slot name="unique">products_search</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/search?{q=keyword,keyword2}</x-slot>
</x-header>

<main class="p-search_notfound">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="{{ route('front.products') }}">製品情報</a></li>
                <li><span>”{{ $productSearch->displayKeywords }}”の検索結果</span></li>
            </ul>
        </div>
    </div>

    <div class="p-search_notfound1 l-cont">
        <x-title2>
            <x-slot name="title2_class">c-title2__style2</x-slot>
            <x-slot name="title2_text">”{{ $productSearch->displayKeywords }}”の検索結果</x-slot>
        </x-title2>
    </div><!-- /.p-search_notfound1 -->

    <div class="p-search_notfound2 l-cont">
        <div class="c-block1__form">
            @include('front.elements.products.search.form', [
                'type_value' => $request->get('type'),
                'keywords_value' => $request->get('keywords')
            ])
        </div>
        <div class="c-initials">
            @include('front.elements.products.initial_box_long', [
                'href_base_url' => url('/products/initial/'),
                'initials_count' => $productSearch->getInitialsCountLong()
            ])
        </div><!-- / c-initials -->
    </div><!-- /.p-search_notfound2 -->

    <div class="p-search_notfound3 l-cont">
        <x-title6>
            <x-slot name="title6_text">“{{ $productSearch->displayKeywords }}”で該当するページがありませんでした。</x-slot>
            <x-slot name="title6_class">c-title6__style2</x-slot>
        </x-title6>
        <x-list12></x-list12>
    </div><!-- /.p-search_notfound3 -->

    <div class="p-search_notfound4 l-cont">
        <x-btn2>
            <x-slot name="btn2_text">製品情報TOPページ</x-slot>
            <x-slot name="btn2_href">{{ route('front.products') }}</x-slot>
            <x-slot name="btn2_class">c-btn2__style4</x-slot>
        </x-btn2>
    </div><!-- /.p-search_notfound4 -->

</main>

<x-footer></x-footer>
