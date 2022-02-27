<x-header>
    <x-slot name="title">{{ $standard->standard_name }}｜製品規格から探す｜重防食用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「{{ $standard->standard_name }}」に該当する製品の一覧です。製品詳細をご覧いただけます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">{{ $standard->standard_name }}｜製品規格から探す｜重防食用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/large/paint/standard/{{ $standard->slug }}/</x-slot>
</x-header>

<main class="p-standardDetail">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/large">重防食用塗料</a></li>
                <li><a href="/products/large/specification">仕様を探す</a></li>
                <li><span>[{{ $standard->p_large_standard_category->name }}] {{ $standard->standard_name }}</span></li>
            </ul>
        </div>
    </div>

    <section class="p-standardDetail1">
        <div class="l-cont">
            <h1 class="c-title2 c-title2__style2">[{{ $standard->p_large_standard_category->name }}] {{ $standard->standard_name }}<span>／ 製品規格から探す ／ 重防食用塗料</span></h1>

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
                            <h4 class="c-block2__header__title">該当件数<span class="c-num">40</span>件</h4>
                            <div class="c-block2__header__right">
                                <p class="c-block2__header__label">表示件数</p>
                                <div class="c-block2__header__select">
                                    <select name="" id="">
                                        <option value="10">10件</option>
                                        <option value="20">20件</option>
                                        <option value="30">30件</option>
                                        <option value="50">50件</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!-- / c-block2 -->

                    @foreach($standard->p_large_standard_p_larges as $standard_p_large)
                    @include('front.elements.products.large_spec.product', ['product' => $standard_p_large->p_large])
                    @endforeach

                    <x-pagenavi></x-pagenavi>
                </article>

                <div class="l-sidebar">
                    <aside class="c-side">
                        <div class="c-side__box">
                            <h4 class="c-side__title">塗料系統で探す</h4>
                            <ul class="c-side__list">
                                <li class="c-side__item">
                                    <a href="">前処理塗料</a>
                                </li>
                                <li class="c-side__item">
                                    <a href="">油性・フタル酸系一般さび止め塗料</a>
                                </li>
                                <li class="c-side__item">
                                    <a href="">特殊さび止め塗料</a>
                                </li>
                                <li class="c-side__item">
                                    <a href="">エポキシ系さび止め塗料</a>
                                </li>
                                <li class="c-side__item">
                                    <a href="">フタル酸(アルキド)樹脂塗料(中・上塗り)</a>
                                </li>
                            </ul>
                            <div class="c-side__more">
                                <ul class="c-side__list">
                                    <li class="c-side__item">
                                        <a href="">鉄部用塗料</a>
                                    </li>
                                    <li class="c-side__item">
                                        <a href="">床・路面用塗料</a>
                                    </li>
                                    <li class="c-side__item">
                                        <a href="">屋上防水材</a>
                                    </li>
                                    <li class="c-side__item">
                                        <a href="">シーリング材</a>
                                    </li>
                                    <li class="c-side__item">
                                        <a href="">現場用添加剤</a>
                                    </li>
                                </ul>
                                <div class="c-side__btn">
                                    <span>もっと見る</span>
                                </div>
                            </div>
                        </div>
                        <div class="c-side__box">
                            <h4 class="c-side__title">製品規格から探す</h4>
                            <ul class="c-side__list">
                                <li class="c-side__item">
                                    <a href="">日本道路協会（塩害対策指針）（昭和59年2月）</a>
                                </li>
                                <li class="c-side__item">
                                    <a href="">日本道路協会（便覧）（平成26年3月）</a>
                                </li>
                                <li class="c-side__item">
                                    <a href="">NEXCO（東日本・中日本・西日本）高速道路㈱（令和1年7月）</a>
                                </li>
                                <li class="c-side__item">
                                    <a href="">首都高速道路㈱（剥落）（平成26年8月）</a>
                                </li>
                                <li class="c-side__item">
                                    <a href="">首都高速道路㈱（SDK）（平成29年8月）</a>
                                </li>
                            </ul>
                            <div class="c-side__more">
                                <ul class="c-side__list">
                                    <li class="c-side__item">
                                        <a href="">鉄部用塗料</a>
                                    </li>
                                    <li class="c-side__item">
                                        <a href="">床・路面用塗料</a>
                                    </li>
                                    <li class="c-side__item">
                                        <a href="">屋上防水材</a>
                                    </li>
                                    <li class="c-side__item">
                                        <a href="">シーリング材</a>
                                    </li>
                                    <li class="c-side__item">
                                        <a href="">現場用添加剤</a>
                                    </li>
                                </ul>
                                <div class="c-side__btn">
                                    <span>もっと見る</span>
                                </div>
                            </div>
                        </div>

                        <div class="c-banner">
                            <a href="#" class="c-banner__text"><span>耐火塗料の優れた特長</span></a>
                        </div>
                    </aside>
                </div>
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
                <a href="/" class="c-boxlink__inner">
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
