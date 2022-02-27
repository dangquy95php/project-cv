<x-header>
    <x-slot name="title">重防食用塗料カタログ一覧｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「重防食用塗料」カタログ一覧です。PDF形式で閲覧・ダウンロードいただけます。豊富なラインアップであらゆるニーズにお応えします。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">large-catalog</x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/large/catalog/</x-slot>
</x-header>

<main class="p-large-catalog">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/large/">重防食用塗料</a></li>
                <li><span>重防食用塗料カタログ一覧</span></li>
            </ul>
        </div>
    </div>

    <section class="p-large-catalog1">
        <div class="l-cont">
            
            <h1 class="c-title2 c-title2__style2">重防食用塗料カタログ一覧</h1>

            <ul class="c-block2__bottom__list col-4">
                @foreach ($catalogs as $catalog)
                    <li class="c-block2__bottom__item">
                        <a href="{{ $catalog->document_url_path }}" target="_blank">{{ $catalog->document_name }}</a>
                    </li>
                @endforeach
            </ul>

            <ul class="c-list10 c-list10--col2">
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="{{ url('/products/large/paint/') }}">
                        <div class="c-list10__img">
                            <img src="/images/products/large/img_03.jpg" alt="建築用塗料" class="pc-only">
                            <img src="/images/products/large/img_03_sp.jpg" alt="建築用塗料" class="sp-only">
                        </div>
                        <span class="c-list10__text">製品を探す</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="{{ url("/products/large/specification/") }}">
                        <div class="c-list10__img">
                            <img src="/images/products/large/img_04.jpg" alt="重防食用塗料" class="pc-only">
                            <img src="/images/products/large/img_04_sp.jpg" alt="重防食用塗料" class="sp-only">
                        </div>
                        <span class="c-list10__text">仕様を探す</span>
                    </a>
                </li>
            </ul>

            <x-boxlink></x-boxlink>
        </div>
    </section>

    <section class="p-large-catalog2">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_class">c-title2--center</x-slot>
                <x-slot name="title2_text">技術資料・積算資料</x-slot>
            </x-title2>

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
            </div><!-- / c-block1 c-block1--style1 -->
        </div>
    </section>

</main>

<x-footer></x-footer>
