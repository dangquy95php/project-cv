<x-header>
    <x-slot name="title">{{ $spec_steel->name }}｜プラント・鉄塔・鋼構造物｜日本ペイント株式会社</x-slot>
    <x-slot name="description">
        日本ペイント株式会社の「{{ $spec_steel->name }}／重防食用塗料／プラント・鉄塔・鋼構造物」の仕様詳細ページです。塗装工程、使用量、乾燥時間、希釈剤、仕様書などの関連資料をご覧いただけます。
    </x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">large-steele-detail</x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/large/specification-steele/id/</x-slot>
</x-header>

<main class="p-large-steele-detail">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/large/">重防食用塗料</a></li>
                <li><a href="/products/large/specification/">仕様を探す</a></li>
                <li><a href="/products/large/specification-steele/">プラント・鉄塔・鋼構造物</a></li>
                <li><span>{{ $spec_steel->name }}</span></li>
            </ul>
        </div>
    </div>
    <section class="c-mainimg7">
        <div class="l-cont">
            <p class="c-mainimg7__tit">重防食用塗料</p>
            @if($spec_steel->spec_number)
                <p class="c-mainimg7__tit">仕様番号：{{ $spec_steel->spec_number }}</p>
            @endif
            <h1 class="c-mainimg7__title">{{ $spec_steel->name }}<span>／ プラント・鉄塔・鋼構造物</span></h1>
            @if($spec_steel->general_name)
                <p class="c-mainimg7__text">一般名称：{{ $spec_steel->general_name }}</p>
            @endif
            <ul class="c-mainimg7__tag">
                <li>{{ $spec_steel->standard_name }}</li>
                @foreach($spec_steel->p_large_spec_steel_sections as $section)
                    <li>{{ $section->section_label }}</li>
                @endforeach
                @foreach($spec_steel->p_large_spec_steel_systems as $system)
                    <li>{{ $system->name }}</li>
                @endforeach
                @foreach($spec_steel->p_large_spec_steel_solvent_types as $solvent_type)
                    <li>{{ $solvent_type->name }}</li>
                @endforeach
                @foreach($spec_steel->p_large_spec_steel_points as $point)
                    <li>{{ $point->name }}</li>
                @endforeach
                @foreach($spec_steel->p_large_spec_steel_features as $feature)
                    <li>{{ $feature->name }}</li>
                @endforeach
            </ul>
        </div>
    </section>
    @if ($spec_steel->p_large_spec_steel_processes->isNotEmpty()
        || $spec_steel->remark)
        <section class="p-large-steele-detail1">
            <div class="l-cont">
                @if ($spec_steel->p_large_spec_steel_processes->isNotEmpty())
                    @include('components.table4', ['processes' => $spec_steel->p_large_spec_steel_processes])

                    <p class="c-text2 pc-only">
                        ※上記の各数値は全て標準のものです。施工方法･施工条件等により各々多少の幅を生ずることがあります。
                        <br>※ISO Sa2 1/2：International standard ISO‐8501(素地調整の規格)<br>
                        @if($spec_steel->remark)
                            {!! nl2br(e($spec_steel->remark)) !!}
                        @endif
                    </p>
                @endif
            </div>
        </section><!-- / p-large-steele-detail1 -->
    @endif

    @if ($spec_steel->published_documents->isNotEmpty()
        || $spec_steel->published_instructions->isNotEmpty() )
        <section class="p-large-steele-detail2">
            <div class="l-cont">
                <x-title2>
                    <x-slot name="title2_text">関連資料</x-slot>
                    <x-slot name="title2_class">c-title2--small</x-slot>
                </x-title2>

                <div class="p-large-steele-detail2__list">
                    <div class="c-list6 c-list6--col4">
                        @if($spec_steel->published_documents->count() > 0)
                            <ul class="c-list6__box">
                                @foreach($spec_steel->published_documents as $document)
                                    <li class="c-list6__item">
                                        <a href="{{ $document->document_url_path }}" target="_blank"
                                           class="c-list6__txt">{{ $document->document_category }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if($spec_steel->published_instructions->count() > 0)
                            <ul class="c-list6__box">
                                @foreach($spec_steel->published_instructions as $instruction)
                                    <li class="c-list6__item">
                                        <a href="{{ $instruction->document_url_path }}" target="_blank"
                                           class="c-list6__txt">{{ $instruction->document_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div><!-- / c-list6 c-list6--col4 -->

                </div>
            </div>
        </section><!-- / p-large-steele-detail2 -->
    @endif

    <section class="p-large-steele-detail3">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_text">仕様を探す</x-slot>
                <x-slot name="title2_class">c-title2--center</x-slot>
            </x-title2>

            <div class="c-block1 c-block1--style1">
                <div class="c-block1__form">
                    @include('front.elements.products.search.form', [
                        'type_value' => \App\Models\ProductSearch::F_LARGE_SPEC_KEY,
                        'keywords_value' => null
                    ])
                </div>
            </div><!-- / c-block1 c-block1--style1 -->
            @include('front.elements.products.large_spec.searchbox', ['active' => 'steel'])
        </div>
    </section><!-- / p-large-steele-detail3 -->

    <section class="p-large-steele-detail4">
        <div class="l-cont">
            <div class="c-box4">
                <h2 class="c-title2 c-title2--center c-title2--white">タフガードQ-R工法</h2>
                <p class="c-box4__txt">塗るだけでコンクリート片のはく落を防止コンクリート片はく落防止システム。<br>我々の生活空間の多くを構成するコンクリート。地球環境の劇的な変化によって、そのコンクリートを取り巻く環境も厳しいものに変わってきました。｢タフガードQ-R
                    工法｣は、責任施工で品質向上に貢献します。</p>
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
            </div><!-- / c-block1 c-block1--style1 -->

            <x-boxlink></x-boxlink>
        </div>
    </section><!-- / p-large-steele-detail4 -->

    <section class="p-large-steele-detail5">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_text">技術資料・積算資料</x-slot>
                <x-slot name="title2_class">c-title2--center</x-slot>
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
                </ul><!-- / c-list6__box -->

            </div><!-- / c-list6 c-list6--col4 -->

        </div>
    </section><!-- / p-large-steele-detail5 -->

</main>

<x-footer></x-footer>
