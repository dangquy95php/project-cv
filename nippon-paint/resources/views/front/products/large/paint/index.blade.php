<x-header>
    <x-slot name="title">製品を探す｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「重防食用塗料」製品検索ページです。製品詳細や仕様をご覧いただけます。豊富なラインナップであらゆるニーズにお応えします。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/large/paint/</x-slot>
</x-header>

<main class="p-paint">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/large/">重防食用塗料</a></li>
                <li><span>製品を探す</span></li>
            </ul>
        </div>
    </div>

    <section class="c-mainimg">
        <div class="l-cont">
            <h1 class="c-mainimg__title">
                <span class="c-mainimg__title__jap">製品を探す</span>
                <span class="c-mainimg__title__eng">Search for Products</span>
            </h1>
        </div>
    </section>

    <section class="p-paint1">
        <div class="l-cont">
            <h2 class="c-title2 c-title2--center">塗料系統で探す</h2>
            <div class="c-list6 c-list6--col5">
                <ul class="c-list6__box">
                    @foreach ($systems as $system)
                        <li class="c-list6__item arrow">
                            <a href="{{ url("/products/large/paint/system/$system->slug") }}" class="c-list6__txt">{{ $system->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class="p-paint2">
        <div class="l-cont">
            <h2 class="c-title2 c-title2--center">製品規格から探す</h2>
            <div class="c-list6 c-list6--col4">
                <ul class="c-list6__box">
                    @foreach ($standards as $standard)
                        <li class="c-list6__item arrow">
                            <a href="{{ url("/products/large/paint/standard/$standard->slug") }}" class="c-list6__txt">[{{ $standard->p_large_standard_category->name }}] {{ $standard->standard_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class="p-paint3">
        <div class="l-cont">
            <div class="c-box4">
                <h2 class="c-title2 c-title2--center c-title2--white">耐火塗料の優れた<br class="sp-only">特長</h2>
                <p class="c-box4__txt">鉄骨用発泡性耐火被覆塗料は鉄骨意匠をデザインできる耐火被覆材として欧州で一般的に使われている材料で、<br class="pc-only">火災時に発泡して断熱層を形成し、鉄骨を倒壊から保護する塗料です。<br class="pc-only">日本ペイントの長年の研究による、優れた性能をご紹介します。</p>
                <div class="u-center">
                    <a href="{{ url('/products/large/fireproof/') }}" class="c-btn2 ">詳細を見る</a>
                </div>
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

    <section class="p-paint4">
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
