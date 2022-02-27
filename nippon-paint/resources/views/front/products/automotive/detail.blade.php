<x-header>
    <x-slot name="title">{{ $p_automotive->product_name }}｜日本ペイント株式会社</x-slot>
    <x-slot name="description">{{ $p_automotive->product_name }} の製品詳細ページです。豊富なラインナップでお客様のあらゆるニーズにお応えする日本ペイントの自動車補修用製品です。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">detail</x-slot>
    <x-slot name="unique">products_index</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/automotive/id/</x-slot>
</x-header>

<main class="p-detail">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/automotive/">自動車補修用塗料</a></li>
                <li><span>{{ $p_automotive->product_name }}</span></li>
            </ul>
        </div>
    </div>

    <section class="c-mainimg3">
        <ul class="c-mainimg3__breadcrumb sp-only">
            <li><a href="{{ url('products/automotive') }}">自動車補修用塗料</a></li>
            @if ($p_automotive->parent_category)
                <li>
                    <a href="{{ url('products/automotive/cat/'.$p_automotive->parent_category->slug) }}">{{ $p_automotive->parent_category_name }}</a>
                </li>
            @endif
        </ul>
        <div class="l-cont">
            <div class="c-mainimg3__content">
                <ul class="c-mainimg3__breadcrumb pc-only">
                    <li><a href="{{ url('products/automotive') }}">自動車補修用塗料</a></li>
                    @if ($p_automotive->parent_category)
                        <li>
                            <a href="{{ url('products/automotive/cat/'.$p_automotive->parent_category->slug) }}">{{ $p_automotive->parent_category_name }}</a>
                        </li>
                    @endif
                    @if($p_automotive->child_category)
                        <li>{{ $p_automotive->child_category_name }}</li>
                    @endif
                </ul>
                <h1 class="c-mainimg3__title">{{ $p_automotive->product_name }}</h1>
                @foreach($p_automotive->labels_array as $label)
                    <span class="c-mainimg3__tag">{{ $label->name }}</span>
                @endforeach
            </div>
            @if ($p_automotive->image_url_front || $p_automotive->logo_url_front)
                <div class="c-mainimg3__img pc-only">
                    @if ($p_automotive->image_url_front)
                        <img src="{{ $p_automotive->image_url_front }}"
                             alt="{{ $p_automotive->product_name }}">
                    @endif
                    @if ($p_automotive->logo_url_front)
                        <img src="{{ $p_automotive->logo_url_front }}"
                             alt="{{ $p_automotive->product_name }}">
                    @endif
                </div>
                <div class="c-mainimg3__img sp-only">
                    @if ($p_automotive->image_url_front)
                        <img src="{{ $p_automotive->image_url_front }}"
                             alt="{{ $p_automotive->product_name }}">
                    @endif
                    @if ($p_automotive->logo_url_front)
                        <img src="{{ $p_automotive->logo_url_front }}"
                             alt="{{ $p_automotive->product_name }}">
                    @endif
                </div>
            @endif
        </div>
    </section>

    <section class="p-detail1">
        <div class="l-cont">
            <div class="l-aside">
                <article>
                    @if ($p_automotive->description)
                        <p>{{ $p_automotive->description }}</p>
                    @endif
                    @if($p_automotive->feature)
                        <section>
                            <x-title2>
                                <x-slot name="title2_text">特長</x-slot>
                                <x-slot name="title2_class">c-title2--small</x-slot>
                            </x-title2>
                            {!! $p_automotive->feature !!}
                        </section>
                    @endif
                    @if ($p_automotive->classification
                        || $p_automotive->p_automotive_base
                        || $p_automotive->p_automotive_pack_type
                        || $p_automotive->fire_laws_classifications
                        || $p_automotive->p_automotive_hardener_ratio
                        || $p_automotive->hardener_ratio_supplement
                        || $p_automotive->p_automotive_characteristics->isNotEmpty()
                        || $p_automotive->content
                        || $p_automotive->color
                        || $p_automotive->hardeners->isNotEmpty()
                        || $p_automotive->diluents->isNotEmpty()
                        || $p_automotive->mixing_ratio
                        || $p_automotive->applicable_material
                        || $p_automotive->applicable_clear_paints->isNotEmpty()
                        || $p_automotive->mixing_ratio_table
                        || $p_automotive->drying_time
                        || $p_automotive->pot_life
                        || $p_automotive->resin_specs
                    )
                        <section>
                            <x-title2>
                                <x-slot name="title2_text">製品詳細情報</x-slot>
                                <x-slot name="title2_class">c-title2--small</x-slot>
                            </x-title2>
                            <div class="c-table c-table__style2">
                                <!-- 製品詳細情報 ここから -->
                                <table>
                                    <tbody>
                                    @if($p_automotive->classification)
                                        <tr>
                                            <th>製品分類</th>
                                            <td>{{ $p_automotive->p_automotive_classification->name }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->p_automotive_base)
                                        <tr>
                                            <th>水性/溶剤</th>
                                            <td>{{ $p_automotive->p_automotive_base->name }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->p_automotive_pack_type)
                                        <tr>
                                            <th>１液/２液</th>
                                            <td>{{ $p_automotive->p_automotive_pack_type->name }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->fire_laws_classifications)
                                        <tr>
                                            <th>消防法区分</th>
                                            <td>{{ $p_automotive->fire_laws_classifications_array->implode('name', '、') }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->p_automotive_hardener_ratio || $p_automotive->hardener_ratio_supplement)
                                        <tr>
                                            <th>硬化剤比率</th>
                                            <td>
                                                {{ $p_automotive->p_automotive_hardener_ratio->name }}
                                                {{ $p_automotive->hardener_ratio_supplement }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->p_automotive_characteristics->isNotEmpty())
                                        <tr>
                                            <th>特徴</th>
                                            <td>{{ $p_automotive->p_automotive_characteristics->implode('name', '、') }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->content)
                                        <tr>
                                            <th>容量</th>
                                            <td>{{ $p_automotive->content }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->color)
                                        <tr>
                                            <th>色相</th>
                                            <td>{{ $p_automotive->color }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->hardeners->isNotEmpty())
                                        <tr>
                                            <th>硬化剤</th>
                                            <td>{{ $p_automotive->hardeners->implode('product_name', '、') }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->diluents->isNotEmpty())
                                        <tr>
                                            <th>希釈剤</th>
                                            <td>{{ $p_automotive->diluents->implode('product_name', '、') }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->mixing_ratio)
                                        <tr>
                                            <th>希釈率</th>
                                            <td>{{ $p_automotive->mixing_ratio }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->applicable_material)
                                        <tr>
                                            <th>適応素材</th>
                                            <td>{{ $p_automotive->applicable_material }}</td>
                                        </tr>
                                    @endif
                                    @if($p_automotive->applicable_clear_paints->isNotEmpty())
                                        <tr>
                                            <th>適応クリヤー</th>
                                            <td>{{ $p_automotive->applicable_clear_paints->implode('product_name', '、') }}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <!-- 製品詳細情報 ここまで -->
                            </div>
                            @if($p_automotive->mixing_ratio_table)
                                <x-title2>
                                    <x-slot name="title2_text">混合比</x-slot>
                                    <x-slot name="title2_class">c-title2__style3</x-slot>
                                </x-title2>
                                <!-- 混合比 ここから -->
                                <div class="c-table c-table--large">
                                    <div class="c-table__scroll sp-only">
                                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                                    </div>
                                    {!! $p_automotive->mixing_ratio_table !!}
                                </div>
                            @endif
                            @if($p_automotive->drying_time)
                                <x-title2>
                                    <x-slot name="title2_text">乾燥</x-slot>
                                    <x-slot name="title2_class">c-title2__style3</x-slot>
                                </x-title2>
                                <!-- 乾燥 ここから -->
                                <div class="c-table c-table--large">
                                    <div class="c-table__scroll sp-only">
                                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                                    </div>
                                    {!! $p_automotive->drying_time !!}
                                </div>
                                <p class="c-text2 c-text2--comment">{※塗装ブース内での塗装・乾燥をお願いします}</p>
                                <p class="c-text2 c-text2--comment">{※乾燥後室温放置24時間以内でのポリッシュを推奨しています}</p>
                            @endif
                            @if($p_automotive->pot_life)
                                <x-title2>
                                    <x-slot name="title2_text">ポットライフ</x-slot>
                                    <x-slot name="title2_class">c-title2__style3</x-slot>
                                </x-title2>
                                <!-- ポットライフ ここから -->
                                <div class="c-table c-table--large">
                                    <div class="c-table__scroll sp-only">
                                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                                    </div>
                                    {!! $p_automotive->pot_life !!}
                                </div>
                            @endif
                            @if($p_automotive->resin_specs)
                                <x-title2>
                                    <x-slot name="title2_text">樹脂仕様</x-slot>
                                    <x-slot name="title2_class">c-title2__style3</x-slot>
                                </x-title2>
                                <!-- 樹脂仕様 ここから -->
                                <div class="c-table c-table--large">
                                    <div class="c-table__scroll sp-only">
                                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                                    </div>
                                    {!! $p_automotive->resin_specs !!}
                                </div>
                            @endif
                            @if($p_automotive->free_area)
                                {!! $p_automotive->free_area !!}
                            @endif
                        </section>
                    @endif
                    @if ($p_automotive->published_documents->isNotEmpty()
                        || $p_automotive->published_catalogs->isNotEmpty()
                        || $p_automotive->p_automotive_related_pages->isNotEmpty()
                    )
                        <section>
                            <x-title2>
                                <x-slot name="title2_text">製品関連情報</x-slot>
                                <x-slot name="title2_class">c-title2--small</x-slot>
                            </x-title2>
                            @if($p_automotive->published_documents->isNotEmpty())
                                <x-title2>
                                    <x-slot name="title2_text">資料</x-slot>
                                    <x-slot name="title2_class">c-title2__style3</x-slot>
                                </x-title2>
                                <!-- 製品関連情報 資料 ここから -->
                                <ul class="c-list6__box c-list6__box--fwidth">
                                    @foreach($p_automotive->published_documents as $document)
                                        <li class="c-list6__item">
                                            <a href="{{ $document->document_url_path }}"
                                               class="c-list6__txt">{{ $document->document_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($p_automotive->published_catalogs->isNotEmpty())
                                <x-title2>
                                    <x-slot name="title2_text">カタログ・コンセプトブック</x-slot>
                                    <x-slot name="title2_class">c-title2__style3</x-slot>
                                </x-title2>
                                <!-- カタログ・コンセプトブック ここから -->
                                <ul class="c-list9 c-list9__style3">
                                    @foreach($p_automotive->published_catalogs as $catalog)
                                        <li class="c-list9__item">
                                            <a href="{{ $catalog->document_url_path }}" class="c-list9__item__inner">
                                                <img
                                                    src="{{ $catalog->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg'}}">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($p_automotive->p_automotive_related_pages->isNotEmpty())
                                <x-title2>
                                    <x-slot name="title2_text">関連ページ</x-slot>
                                    <x-slot name="title2_class">c-title2__style3</x-slot>
                                </x-title2>
                                <!-- 関連情報ページ ここから -->
                                <ul class="c-list6__box c-list6__box--fwidth">
                                    @foreach($p_automotive->p_automotive_related_pages as $pages)
                                        <li class="c-list6__item {{ $pages->type_mark }}">
                                            <a href="{{ $pages->url }}"
                                               class="c-list6__txt">{{ $pages->indication }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </section>
                    @endif
                </article>
                <div class="l-sidebar">
                    @include('components.side4')
                </div>
            </div>
        </div>
    </section><!-- / p-detail1 -->

    <section class="p-detail2">
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
    </section><!-- / p-detail2 -->

</main>

<x-footer></x-footer>
