<x-header>
    <x-slot name="title">{{ $p_large->product_name }}｜重防食用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「{{ $p_large->product_name }}／重防食用塗料」の製品詳細ページです。製品資料、製品使用説明書、製品カタログ、製品詳細情報、塗料単価、技術資料・積算資料をご覧いただけます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">large-detail</x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/large/id/</x-slot>
</x-header>

<main class="p-largedt">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/large/">重防食用塗料</a></li>
                <li><span>{{ $p_large->product_name }}</span></li>
            </ul>
        </div>
    </div>
    <section class="c-mainimg7">
        <div class="l-cont">
            <p class="c-mainimg7__tit">重防食用塗料</p>
            <h1 class="c-mainimg7__title">{{ $p_large->product_name }}</h1>
            @if ($p_large->general_name)
                <p class="c-mainimg7__text">{{ $p_large->general_name }}</p>
                <p class="c-mainimg7__txt">※一般塗料名称は塗装仕様によって変更になる場合がございます</p>
            @endif
        </div>
    </section>
    <section class="p-largedt1">
        <div class="l-cont">
            <div class="l-aside">
                <article>
                    @if (isset($p_large->description))
                        <p class="p-largedt1__txt">{{ $p_large->description }}</p>
                    @endif

                    @if (!$p_large->published_documents->isEmpty())
                        <h2 class="c-title2 c-title2--small">製品使用説明書、製品カタログ</h2>
                        <ul class="c-list6__box c-list6__box--fwidth">
                            @foreach ($p_large->published_documents as $document)
                                <li class="c-list6__item">
                                    <a href="{{ $document->document_url_path }}" target="_blank"
                                       class="c-list6__txt">{{ $document->document_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <h2 class="c-title2 c-title2--small">製品詳細情報</h2>
                    <div class="c-table c-table__style2">
                        <table>
                            @if ($p_large->p_large_systems->count() > 0)
                                <tr>
                                    <th>塗料系統</th>
                                    <td>
                                        @foreach ($p_large->p_large_systems as $system)
                                            {{ $system->name }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                            @if (isset($p_large->jis_number))
                                <tr>
                                    <th>JIS 規格</th>
                                    <td>{{ $p_large->jis_number }}</td>
                                </tr>
                            @endif
                            @if (isset($p_large->p_large_solvent_type))
                                <tr>
                                    <th>溶剤種別</th>
                                    <td>{{ $p_large->p_large_solvent_type->name }}</td>
                                </tr>
                            @endif
                            @if ($p_large->color)
                                <tr>
                                    <th>色相</th>
                                    <td>{{ $p_large->color }}</td>
                                </tr>
                            @endif
                            @if (!$p_large->p_large_diluents->isEmpty())
                                <tr>
                                    <th>希釈剤</th>
                                    <td>
                                        @foreach ($p_large->p_large_diluents as $diluent)
                                            {{ $diluent->name }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                            @if (isset($p_large->content))
                                <tr>
                                    <th>容量</th>
                                    <td>{{ $p_large->content }}</td>
                                </tr>
                            @endif
                            @if (isset($p_large->mixing_ratio))
                                <tr>
                                    <th>混合比</th>
                                    <td>{{ $p_large->mixing_ratio }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    @if (isset($p_large->unit_price))
                        <h2 class="c-title2 c-title2--small">塗料単価</h2>
                        <div class="c-table">
                            {!! $p_large->unit_price !!}
                        </div>
                    @endif
                    @if (isset($p_large->fire_laws_indication))
                        <h2 class="c-title2 c-title2--small">消防法表示</h2>
                        <div class="c-table">
                            {!! $p_large->fire_laws_indication !!}
                        </div>
                    @endif

                    @if($p_large->p_large_standards_with_specs->count() > 0 ||
                        $p_large->private_standard->getRelatedSpecBridges($p_large->id)->isNotEmpty() ||
                        $p_large->private_standard->getRelatedSpecSteels($p_large->id)->isNotEmpty())
                        <h2 class="c-title2 c-title2--small">塗装仕様</h2>
                        <div class="c-accordion">
                            @foreach($p_large->p_large_standards_with_specs as $standard)
                                @include('front.elements.products.large.spec')
                            @endforeach
                            @if($p_large->private_standard->getRelatedSpecBridges($p_large->id)->isNotEmpty() ||
                                $p_large->private_standard->getRelatedSpecSteels($p_large->id)->isNotEmpty())
                                @include('front.elements.products.large.spec', ['standard' => $p_large->private_standard])
                            @endif
                        </div>
                    @endif
                </article>

                @include('front.elements.products.large.sidebar')
            </div>
        </div>
    </section>
    <section class="p-largedt2">
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
