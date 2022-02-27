<x-header>
    <x-slot name="title">自動車補修用塗料製品カタログ一覧｜日本ペイント株式会社</x-slot>
    <x-slot name="description">ベース、クリヤー、プラサフ、パテ、プラサフ、プライマー、調色システムなどのnax主要製品カタログ一覧ページです。PDFにて閲覧・ダウンロードいただけます</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">catalog</x-slot>
    <x-slot name="unique">products_index</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/automotive/catalog-download/</x-slot>
</x-header>

<main class="p-catalog">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/automotive/">自動車補修用塗料</a></li>
                <li><span>自動車補修用塗料製品カタログ一覧</span></li>
            </ul>
        </div>
    </div>

    <section class="c-mainimg">
        <div class="l-cont">
            <h1 class="c-mainimg__title">
                <span class="c-mainimg__title__jap">自動車補修用塗料製品カタログ一覧</span>
                <span class="c-mainimg__title__eng">Catalog</span>
            </h1>
        </div>
    </section>

    <section class="p-catalog1">
        <div class="l-cont">
            @if($base_catalogs->isNotEmpty())
            <x-title2>
                <x-slot name="title2_text">ベース</x-slot>
                <x-slot name="title2_class">c-title2--small</x-slot>
            </x-title2>
            <ul class="c-list16">
                @foreach($base_catalogs as $base_catalog)
                    <li class="c-list16__item">
                        <a href="{{ $base_catalog->document_url_path }}" target="_blank">
                            <img src="{{ $base_catalog->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg' }}" alt="">
                            <span class="c-list16__text">{{ $base_catalog->document_name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            @endif
            @if($clear_catalogs->isNotEmpty())
            <x-title2>
                <x-slot name="title2_text">クリヤー</x-slot>
                <x-slot name="title2_class">c-title2--small</x-slot>
            </x-title2>
            <ul class="c-list16">
                @foreach($clear_catalogs as $clear_catalog)
                    <li class="c-list16__item">
                        <a href="{{ $clear_catalog->document_url_path }}" target="_blank">
                            <img src="{{ $clear_catalog->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg' }}" alt="">
                            <span class="c-list16__text">{{ $clear_catalog->document_name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            @endif
            @if($putty_catalogs->isNotEmpty())
            <x-title2>
                <x-slot name="title2_text">パテ</x-slot>
                <x-slot name="title2_class">c-title2--small</x-slot>
            </x-title2>
            <ul class="c-list16">
                @foreach($putty_catalogs as $putty_catalog)
                    <li class="c-list16__item">
                        <a href="{{ $putty_catalog->document_url_path }}" target="_blank">
                            <img src="{{ $putty_catalog->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg' }}" alt="">
                            <span class="c-list16__text">{{ $putty_catalog->document_name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            @endif
            @if($prasaf_catalogs->isNotEmpty())
            <x-title2>
                <x-slot name="title2_text">プラサフ</x-slot>
                <x-slot name="title2_class">c-title2--small</x-slot>
            </x-title2>
            <ul class="c-list16">
                @foreach($prasaf_catalogs as $prasaf_catalog)
                    <li class="c-list16__item">
                        <a href="{{ $prasaf_catalog->document_url_path }}" target="_blank">
                            <img src="{{ $prasaf_catalog->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg' }}" alt="">
                            <span class="c-list16__text">{{ $prasaf_catalog->document_name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            @endif
            @if($primer_catalogs->isNotEmpty())
            <x-title2>
                <x-slot name="title2_text">プライマー</x-slot>
                <x-slot name="title2_class">c-title2--small</x-slot>
            </x-title2>
            <ul class="c-list16">
                @foreach($primer_catalogs as $primer_catalog)
                    <li class="c-list16__item">
                        <a href="{{ $primer_catalog->document_url_path }}" target="_blank">
                            <img src="{{ $primer_catalog->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg' }}" alt="">
                            <span class="c-list16__text">{{ $primer_catalog->document_name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            @endif
            @if($adjuster_catalogs->isNotEmpty())
            <x-title2>
                <x-slot name="title2_text">調色システム</x-slot>
                <x-slot name="title2_class">c-title2--small</x-slot>
            </x-title2>
            <ul class="c-list16">
                @foreach($adjuster_catalogs as $adjuster_catalog)
                <li class="c-list16__item">
                    <a href="{{ $adjuster_catalog->document_url_path }}" target="_blank">
                        <img src="{{ $adjuster_catalog->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg' }}" alt="">
                        <span class="c-list16__text">{{ $adjuster_catalog->document_name }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
            <div class="c-box3">
                <p class="c-box3__text1">コンテンツご利用上の注意</p>
                <p class="c-text2 c-text2--comment">※本コンテンツに掲載されている製品のご使用に際しては、必ず、事前にそれぞれの取扱説明書や安全データシート（ＳＤＳ）、製品のラベルに記載されている内容等をよくお読みになり、用途や使用方法、安全衛生上の注意事項を十分理解した上でご使用ください。</p>
                <p class="c-text2 c-text2--comment">※本コンテンツに記載されている製品は、日本国内での使用に限定し、輸出される場合は事前にご相談ください。</p>
                <p class="c-text2 c-text2--comment">※本コンテンツに掲載されている製品につきましては、改良などの理由により予告なくの仕様変更をすることがありますのでご了承ください。</p>
                <p class="c-text2 c-text2--comment">※ウェブサイト上に掲載したカタログデータ他、掲載資料の内容を改変することを禁止させていただきます。内容を転載する場合には日本ペイント株式会社からの引用である旨を明記してください。</p>
            </div>
        </div>
    </section><!-- / p-catalog1 -->

    <section class="p-catalog2">
        <div class="l-cont">
            <div class="c-block1 c-block1--style1">
                <div class="c-block1__form">
                    @include('front.elements.products.search.form', [
                        'type_value' => \App\Models\ProductSearch::F_AUTOMOTIVE_ID,
                        'keywords_value' => null
                    ])
                </div>
               @include('front.elements.products.kana_box', [
                    'href_base_url' => url('/products/automotive/initial/'),
                    'kana_count' => (new \App\Models\PAutomotiveSearch())->getKanaCount()
                ])
            </div><!-- / c-block1 c-block1--style1 -->
            <x-automotive></x-automotive>
        </div>
    </section><!-- / p-catalog2 -->

</main>

<x-footer></x-footer>
