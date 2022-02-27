<x-header>
    <x-slot name="title">{{ $spec_bridge->name }}｜橋梁・コンクリート｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「{{ $spec_bridge->name }}／重防食用塗料／橋梁・コンクリート」の仕様詳細ページです。塗装工程、使用量、乾燥時間、希釈剤、仕様書などの関連資料をご覧いただけます。
    </x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">{規格名}から探す｜橋梁・コンクリート｜仕様を探す｜日本ペイント株式会社</x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/large/specification-bridge/id/</x-slot>
</x-header>

<main class="p-bridgedt">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/large/">重防食用塗料</a></li>
                <li><a href="/products/large/specification/">仕様を探す</a></li>
                <li><a href="/products/large/specification-bridge/">橋梁・コンクリート</a></li>
                <li><span>{{ $spec_bridge->name }}</span></li>
            </ul>
        </div>
    </div>
    <section class="c-mainimg7">
        <div class="l-cont">
            <p class="c-mainimg7__tit">重防食用塗料</p>
            @if($spec_bridge->spec_number)
                <p class="c-mainimg7__tit">仕様番号：{{ $spec_bridge->spec_number }}</p>
            @endif
            <h1 class="c-mainimg7__title">{{ $spec_bridge->name }}<span>／ 橋梁・コンクリート</span></h1>
            @if($spec_bridge->general_name)
                <p class="c-mainimg7__text">一般名称：{{ $spec_bridge->general_name }}</p>
            @endif
            <ul class="c-mainimg7__tag">
                <li>{{ $spec_bridge->standard_name }}</li>
                @foreach($spec_bridge->p_large_spec_bridge_sections as $section)
                    <li>{{ $section->section_label }}</li>
                @endforeach
                @foreach($spec_bridge->p_large_spec_bridge_coated_matters as $coated_matter)
                    <li>{{ $coated_matter->name }}</li>
                @endforeach
                @foreach($spec_bridge->p_large_spec_bridge_paint_points as $paint_point)
                    <li>{{ $paint_point->name }}</li>
                @endforeach
            </ul>
        </div>
    </section>
    @if ($spec_bridge->p_large_spec_bridge_processes->isNotEmpty()
        || $spec_bridge->remark
        || $spec_bridge->published_documents->isNotEmpty()
        || $spec_bridge->published_instructions->isNotEmpty())
        <section class="p-bridgedt1">
            <div class="l-cont">
                @if ($spec_bridge->p_large_spec_bridge_processes->isNotEmpty())
                    <div class="p-bridgedt1__tb">
                        @include('components.table4', ['processes' => $spec_bridge->p_large_spec_bridge_processes])
                    </div>
                    <p class="c-text2">
                        ※上記の各数値は全て標準のものです。施工方法･施工条件等により各々多少の幅を生ずることがあります。<br>
                        @if($spec_bridge->remark)
                            {!! nl2br(e($spec_bridge->remark)) !!}
                        @endif
                    </p>
                @endif
                @if ($spec_bridge->published_documents->isNotEmpty()
                    || $spec_bridge->published_instructions->isNotEmpty())
                    <h2 class="c-title2 c-title2--small">関連資料</h2>
                    <div class="c-list6 c-list6--col4">
                        @if($spec_bridge->published_documents->isNotEmpty())
                            <ul class="c-list6__box">
                                @foreach($spec_bridge->published_documents as $document)
                                    <li class="c-list6__item">
                                        <a href="{{ $document->document_url_path }}" target="_blank"
                                           class="c-list6__txt">{{ $document->document_category }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if($spec_bridge->published_instructions->isNotEmpty())
                            <ul class="c-list6__box">
                                @foreach($spec_bridge->published_instructions as $instruction)
                                    <li class="c-list6__item">
                                        <a href="{{ $instruction->document_url_path }}" target="_blank"
                                           class="c-list6__txt">{{ $instruction->document_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
            </div>
        </section>
    @endif
    <section class="p-specification1">
        <div class="l-cont">
            <h2 class="c-title2 c-title2--center">仕様を探す</h2>
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
        </div>
    </section>
    <section class="p-specification2">
        <div class="l-cont">
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
                <a href="/" class="c-boxlink__inner">
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
