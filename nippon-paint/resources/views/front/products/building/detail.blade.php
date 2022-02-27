<x-header>
    <x-slot name="title">{{ $p_building->product_name }}_建築用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の建築用塗料「{製品名_建築用塗料} 」の製品情報ページです。豊富なラインナップであらゆるニーズにお応えします。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">building</x-slot>
    <x-slot name="unique">products_building</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/building/id/</x-slot>
</x-header>

<main class="p-building-detail">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/building/">建築用塗料</a></li>
                <li><span>{{ $p_building->product_name }}</span></li>
            </ul>
        </div>
    </div>

    <section class="c-mainimg3">
        <ul class="c-mainimg3__breadcrumb sp-only">
            <li><a href="{{url('/products/building/')}}">建築用塗料</a></li>
            <li><a href="{{ $p_building->middle_category_url }}">{{ $p_building->middle_category }}</a></li>
            @if($p_building->small_category_front)
                <li><a href="{{ $p_building->small_category_url }}">{{ $p_building->small_category_front }}</a></li>
            @endif
        </ul>
        <div class="l-cont">
            <div class="c-mainimg3__content">
                <ul class="c-mainimg3__breadcrumb pc-only">
                    <li><a href="{{ url('products/building/') }}">建築用塗料</a></li>
                    <li>
                        <a href="{{ url('products/building/cat/'.$p_building->middle_category_slug) }}">{{ $p_building->middle_category }}</a>
                    </li>
                    @if($p_building->small_category_front)
                        <li>
                            <a href="{{ url('products/building/cat/'.$p_building->middle_category_slug).'?child_category='.$p_building->p_building_subcategory_id }}">{{ $p_building->small_category_front }}</a>
                        </li>
                    @endif
                </ul>
                <h1 class="c-mainimg3__title">{{ $p_building->product_name }}</h1>
                @if ($p_building->general_name)
                    <p class="c-mainimg3__text">{{ $p_building->general_name }}</p>
                @endif
            </div>
            @if ($p_building->thumbnail_url_front)
                <div class="c-mainimg3__img">
                    <img src="{{ $p_building->thumbnail_url_front }}"
                         alt="{{ $p_building->product_name }}" class="pc-only">
                    <img src="{{ $p_building->thumbnail_url_front }}"
                         alt="{{ $p_building->product_name }}" class="sp-only">
                </div>
            @endif
        </div>
    </section><!-- / c-mainimg3 -->

    <div class="l-cont l-aside">
        <article>
            @if($p_building->published_documents->count() > 0)
                <section class="p-building1">
                    <p class="p-building1__text c-text1">{{ $p_building->description }}</p>
                    <x-title2>
                        <x-slot name="title2_text">製品資料</x-slot>
                        <x-slot name="title2_class">c-title2--small</x-slot>
                    </x-title2>

                    <ul class="p-building1__list">
                        @foreach($p_building->documents as $document)
                            <li class="p-building1__item">
                                <a href="{{ $document->document_url_path }}">
                                    <img
                                        src="{{ $document->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg' }}"
                                        alt="{{ $document->document_category }}を見る">
                                    <p class="p-building1__item__text">{{ $document->document_name}}を見る</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </section><!-- / p-building1 -->
            @endif

            @if($p_building->p_building_finish_samples->count() > 0)
                <section class="p-building2">
                    <x-title2>
                        <x-slot name="title2_text">仕上がりサンプル</x-slot>
                        <x-slot name="title2_class">c-title2--small</x-slot>
                    </x-title2>

                    <ul class="p-building1__list">
                        @foreach($p_building->p_building_finish_samples as $sample)
                            <li class="p-building1__item">
                                <div class="p-building1__item__inner">
                                    <img src="{{ $sample->img_url }}" alt="{{ $sample->image_title }}">
                                    <p class="p-building1__item__text">{{ $sample->image_title }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul><!-- / p-building1__list -->

                    <p class="c-text2">※画面上の模様は下地の状態等によって、実際の模様と<span>は異なる場合があります。</span></p>
                </section><!-- / p-building2 -->
            @endif

            @if($p_building->color_lineup)
                <section class="p-building3">
                    <x-title2>
                        <x-slot name="title2_text">カラーラインナップ</x-slot>
                        <x-slot name="title2_class">c-title2--small</x-slot>
                    </x-title2>

                    {!! $p_building->color_lineup !!}

                    <p class="c-text2">※全日射：全日射反射率（％）<br>※近赤外：近赤外日射反射率（％）<br><span>本ページに掲載の色相はモニター上での表示のた<br
                                class="sp-only">め、実際の塗料の色相とは異なります。実際により近い色相は、色見本帳にてご確認ください。</span></p>
                </section><!-- / p-building3 -->
            @endif

            @if($p_building->feature)
                <section class="p-building4">
                    <x-title2>
                        <x-slot name="title2_text">製品特長</x-slot>
                        <x-slot name="title2_class">c-title2--small</x-slot>
                    </x-title2>
                    {!! $p_building->feature !!}

                </section><!-- / p-building4 -->
            @endif

            <section class="p-building5">
                <x-title2>
                    <x-slot name="title2_text">製品詳細情報</x-slot>
                    <x-slot name="title2_class">c-title2--small</x-slot>
                </x-title2>

                <div class="c-table c-table__style2">
                    <table>
                        @if($p_building->p_building_resins->count() > 0)
                            <tr>
                                <th>樹脂</th>
                                <td>{{ $p_building->resins_implode }}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_base)
                            <tr>
                                <th>水性/溶剤</th>
                                <td>{{ $p_building->p_building_base->name }}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_pack_type)
                            <tr>
                                <th>1液/2液</th>
                                <td>{{ $p_building->p_building_pack_type->name }}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_packings->count() > 0)
                            <tr>
                                <th>荷姿</th>
                                <td>{!! $p_building->packings_implode !!}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_materials->count() > 0)
                            <tr>
                                <th>素材</th>
                                <td>{{ $p_building->materials_implode }}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_jis_numbers->count() > 0)
                            <tr>
                                <th>JIS</th>
                                <td>{{ $p_building->jis_implode }}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_purposes->count() > 0)
                            <tr>
                                <th>機能</th>
                                <td>{{ $p_building->purpose_implode }}</td>
                            </tr>
                        @endif
                        @if($p_building->standard)
                            <tr>
                                <th>規格</th>
                                <td>{!! $p_building->standard !!}</td>
                            </tr>
                        @endif
                        @if($p_building->applicable_base)
                            <tr>
                                <th>適用下地</th>
                                <td>{!! $p_building->applicable_base !!}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_sealers->count() > 0)
                            <tr>
                                <th>適用下塗り塗料・<br class="pc-only">下塗り材</th>
                                <td>{{ $p_building->sealers_implode }}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_middle_coats->count() > 0)
                            <tr>
                                <th>中塗り塗料</th>
                                <td>{{ $p_building->middle_coats_implode }}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_topcoats->count() > 0)
                            <tr>
                                <th>適用上塗り塗料・<br class="pc-only">上塗り材</th>
                                <td>{{ $p_building->topcoats_implode }}</td>
                            </tr>
                        @endif
                        @if($p_building->color)
                            <tr>
                                <th>色相</th>
                                <td>{!! $p_building->color !!}</td>
                            </tr>
                        @endif
                        @if($p_building->lusters)
                            <tr>
                                <th>つや</th>
                                <td>{{$p_building->lusters_implode}}</td>
                            </tr>
                        @endif
                        @if($p_building->p_building_painting_methods_suitable->count() > 0
                        || $p_building->p_building_painting_methods_usable->count() > 0
                        || $p_building->p_building_painting_methods_na->count() > 0
                        || $p_building->painting_method_exception)
                            <tr>
                                <th>施工方法</th>
                                <td>
                                    @if($p_building->p_building_painting_methods_suitable->count() > 0)
                                        <dl>
                                            <dt>適:</dt>
                                            <dd>{{ $p_building->painting_methods_suitable_implode }}</dd>
                                        </dl>
                                    @endif
                                    @if($p_building->p_building_painting_methods_usable->count() > 0)
                                        <dl>
                                            <dt>可:</dt>
                                            <dd>{{ $p_building->painting_methods_usable_implode }}</dd>
                                        </dl>
                                    @endif
                                    @if($p_building->p_building_painting_methods_na->count() > 0)
                                        <dl>
                                            <dt>不適:</dt>
                                            <dd>{{ $p_building->painting_methods_na_implode }}</dd>
                                        </dl>
                                    @endif
                                    {!! $p_building->painting_method_exception !!}
                                </td>
                            </tr>
                        @endif
                        @if($p_building->diluents)
                            <tr>
                                <th>希釈剤</th>
                                <td>{{$p_building->diluents_implode}}</td>
                            </tr>
                        @endif
                        @if($p_building->processes)
                            <tr>
                                <th>工程</th>
                                <td>{{$p_building->processes_implode}}</td>
                            </tr>
                        @endif
                        @if($p_building->pot_life)
                            <tr>
                                <th>ポット<br class="sp-only">ライフ</th>
                                <td>{!! $p_building->pot_life !!}</td>
                            </tr>
                        @endif
                    </table>
                </div>

                <x-title2>
                    <x-slot name="title2_class">c-title2__style3</x-slot>
                    <x-slot name="title2_text">用途</x-slot>
                </x-title2>

                <div class="c-table c-table__style1">
                    <table>
                        <tr>
                            <td>戸建住宅</td>
                            <td>マンション</td>
                            <td>教育施設/病院</td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="/images/products/building/icon_{{ $p_building->getSuitabilityMark('use_housing') }}.svg"
                                    alt="{{ $p_building->getSuitabilityMark('use_housing') }}">
                            </td>
                            <td><img
                                    src="/images/products/building/icon_{{ $p_building->getSuitabilityMark('use_condominium') }}.svg"
                                    alt="{{ $p_building->getSuitabilityMark('use_condominium') }}"></td>
                            <td><img
                                    src="/images/products/building/icon_{{ $p_building->getSuitabilityMark('use_institution') }}.svg"
                                    alt="{{ $p_building->getSuitabilityMark('use_institution') }}"></td>
                        </tr>
                        <tr>
                            <td>オフィス/商業施設/ホテル</td>
                            <td>工場/倉庫</td>
                            <td>鋼構造物</td>
                        </tr>
                        <tr>
                            <td><img
                                    src="/images/products/building/icon_{{ $p_building->getSuitabilityMark('use_office') }}.svg"
                                    alt="{{ $p_building->getSuitabilityMark('use_office') }}"></td>
                            <td><img
                                    src="/images/products/building/icon_{{ $p_building->getSuitabilityMark('use_factory') }}.svg"
                                    alt="{{ $p_building->getSuitabilityMark('use_factory') }}"></td>
                            <td><img
                                    src="/images/products/building/icon_{{ $p_building->getSuitabilityMark('use_steel_structure') }}.svg"
                                    alt="{{ $p_building->getSuitabilityMark('use_steel_structure') }}"></td>
                        </tr>
                    </table>
                </div>

                <div class="c-table__signal">
                    <p class="c-table__signal__item dbround">最適</p>
                    <p class="c-table__signal__item round">適</p>
                    <p class="c-table__signal__item triangle">可</p>
                    <p class="c-table__signal__item multiply">不可</p>
                </div>

                @if($p_building->use_detail)
                    <div class="c-table c-table__style1 c-table--large">
                        <div class="c-table__scroll sp-only">
                            <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                            <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                        </div>
                        {!! $p_building->use_detail !!}
                    </div>

                    <div class="c-table__signal">
                        <p class="c-table__signal__item dbround">最適</p>
                        <p class="c-table__signal__item round">適</p>
                        <p class="c-table__signal__item triangle">可</p>
                        <p class="c-table__signal__item multiply">不可</p>
                    </div>
                @endif


                @if($p_building->usage)
                    <x-title2>
                        <x-slot name="title2_class">c-title2__style3</x-slot>
                        <x-slot name="title2_text">使用量、<br class="sp-only">{1缶当たりの塗り面積（m²）}</x-slot>
                    </x-title2>

                    <div class="c-table">
                        {!! $p_building->usage !!}
                    </div>

                    <p class="c-text2">{※1缶当たりの塗り面積は目安です。施工方法、施工条件<span>等により増減します。}</span></p>
                @endif

                @if($p_building->dilution_rate)
                    <x-title2>
                        <x-slot name="title2_class">c-title2__style3</x-slot>
                        <x-slot name="title2_text">希釈率</x-slot>
                    </x-title2>

                    <div class="c-table4 c-table4--style1 c-table--large">
                        <div class="c-table__scroll sp-only">
                            <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                            <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                        </div>
                        <div class="c-table c-table--large">
                            <div class="c-table__scroll sp-only">
                                <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                                <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                            </div>
                            {!! $p_building->dilution_rate !!}
                        </div>
                    </div><!-- / c-table4 c-table4--style1 -->
                @endif

                @if($p_building->drying_time)
                    <x-title2>
                        <x-slot name="title2_class">c-title2__style3</x-slot>
                        <x-slot name="title2_text">乾燥時間</x-slot>
                    </x-title2>

                    <div class="c-table c-table--large">
                        <div class="c-table__scroll sp-only">
                            <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                            <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                        </div>
                        {!! $p_building->drying_time !!}
                    </div>

                    <p class="c-text2 is-last">{※1缶当たりの塗り面積は目安です。施工方法、施工条件等により増減しま<span>す。}</span></p>
                @endif

            </section><!-- / p-building5 -->

            @if($p_building->price)
                <section class="p-building6">
                    <x-title2>
                        <x-slot name="title2_text">価格</x-slot>
                        <x-slot name="title2_class">c-title2--small</x-slot>
                    </x-title2>

                    <div class="c-table">
                        {!! $p_building->price !!}
                    </div>
                </section><!-- / p-building6 -->
            @endif

            @if($p_building->free_area)
                <section class="p-building7">
                    {!! $p_building->free_area !!}
                </section><!-- / p-building7 -->
            @endif

            @if(count($p_building->related_pages) > 0 || $p_building->p_building_additional_related_pages->count() > 0)
                <section class="p-building8">
                    <x-title2>
                        <x-slot name="title2_text">関連情報ページ</x-slot>
                        <x-slot name="title2_class">c-title2--small</x-slot>
                    </x-title2>

                    <ul class="p-building8__list">
                        @foreach($p_building->related_pages as $page)
                            <li class="p-building8__item">
                                <a href="{{$page['url']}}">
                                    {{ $page['label'] }}
                                </a>
                            </li>
                        @endforeach
                        @foreach($p_building->p_building_additional_related_pages as $additional_page)
                            <li class="p-building8__item">
                                <a href="{{ $additional_page->url }}">
                                    {{ $additional_page->indication }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="p-building8__box">
                        <p class="p-building8__text1">安全データシート（SDS）について</p>
                        <p class="p-building8__text2">SDSは、塗料を購入または購入予定の塗料販売店からお客様へお渡ししております。<br>また、塗装を塗装会社様、工務店様などへご依頼して施工された場合は、それらの会社様を通じてご請求ください。
                        </p>
                    </div>
                </section><!-- / p-building8 -->
            @endif

        </article>
        <div class="l-sidebar">
            @include('components.side')
        </div>
    </div>


</main>
<x-footer></x-footer>
