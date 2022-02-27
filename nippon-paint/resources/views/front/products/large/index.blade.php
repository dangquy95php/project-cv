<x-header>
    <x-slot name="title">重防食用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「重防食用塗料」製品検索ページです。製品詳細や仕様をご覧いただけます。豊富なラインナップであらゆるニーズにお応えします。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/large/</x-slot>
</x-header>

<main class="p-large">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><span>重防食用塗料</span></li>
            </ul>
        </div>
    </div>

    <x-mainimg>
        <x-slot name="title_jap">重防食用塗料</x-slot>
        <x-slot name="title_eng">Paint For Heavy Anticorrosion Coat</x-slot>
        <x-slot name="text">橋梁やプラントを厳しい腐食環境から守る重防食塗料。大切な社会インフラを長期間保護することで、社会貢献の一翼を担っています。</x-slot>
    </x-mainimg>


    <section class="p-large1">
        <div class="l-cont">
            <ul class="c-list10 c-list10--col2">
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="{{ url('/products/large/paint/') }}">
                        <div class="c-list10__img">
                            <img src="/images/products/large/img_03.jpg" alt="製品を探す" class="pc-only">
                            <img src="/images/products/large/img_03_sp.jpg" alt="製品を探す" class="sp-only">
                        </div>
                        <span class="c-list10__text">製品を探す</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="{{ url("/products/large/specification/") }}">
                        <div class="c-list10__img">
                            <img src="/images/products/large/img_04.jpg" alt="仕様を探す" class="pc-only">
                            <img src="/images/products/large/img_04_sp.jpg" alt="仕様を探す" class="sp-only">
                        </div>
                        <span class="c-list10__text">仕様を探す</span>
                    </a>
                </li>
            </ul>

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

    <section class="p-large2">
        <div class="l-cont">
            <h2 class="c-title2 c-title2--center">技術資料・積算資料</h2>
            <div class="c-list6 c-list6--col4">
                <ul class="c-list6__box">
                    <li class="c-list6__item">
                        <a href="/images/products/large/JIS_koukouzobutsu.pdf" target="_blank" class="c-list6__txt">JIS規格一覧表・塗装略号一覧表</a>
                    </li>
                    <li class="c-list6__item">
                        <a href="/images/products/large/civicp.pdf" target="_blank" class="c-list6__txt">さび止め色相表</a>
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
                        <a href="/images/products/large/pricelist.pdf" target="_blank" class="c-list6__txt">積算資料</a>
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
            </div>
        </div>
    </section>
</main>

<x-footer></x-footer>
