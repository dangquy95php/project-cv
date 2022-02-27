<x-header>
    <x-slot name="title">建築用塗料50音検索「{{$initial}}」｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の建築用塗料「{{ $initial }}」の製品一覧ページです。ビル・集合住宅・戸建て住宅用塗料を条件から製品を絞り込むことができます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">products_building</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/building/initial/{{$initial}}/</x-slot>
</x-header>

<main class="p-initialDetail">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/building/">建築用塗料</a></li>
                <li><span>建築用塗料{{ $initial }}行</span></li>
            </ul>
        </div>
    </div>

    <section class="p-initialDetail1">
        <div class="l-cont">
            <h1 class="c-title2 c-title2__style2">建築用塗料 50音検索「{{ $initial }}」</h1>

            <div class="c-block1">
                <div class="c-block1__form">
                    @include('front.elements.products.search.form', [
                        'type_value' => \App\Models\ProductSearch::F_BUILDING_ID,
                        'keywords_value' => null
                    ])
                </div>
                <div class="c-initials">
                    @include('front.elements.products.initial_box_long', [
                        'href_base_url' => url('/products/building/initial/'),
                        'initials_count' => (new \App\Models\PBuildingSearch())->getInitialsCountLong()
                    ])
                </div><!-- / c-initials -->
            </div>
        </div>
    </section><!-- / p-initialDetail1 -->

    <section class="p-initialDetail2">
        <div class="l-cont">
            <div class="l-aside">
                <article>
                    <div class="c-block2">
                        <div class="c-block2__header">
                            <h4 class="c-block2__header__title">該当件数<span class="c-num">{{ $p_buildings->total() }}</span>件</h4>
                            <div class="c-block2__header__right">
                                <p class="c-block2__header__label">表示件数</p>
                                <div class="c-block2__header__select" id="app">
                                    <change-limit-without-form-component
                                        :limit="{{$p_buildings->perPage()}}"
                                    ></change-limit-without-form-component>
                                </div>
                            </div>
                        </div><!-- / c-block2__header -->
                    </div><!-- / c-block2 -->

                    @foreach($p_buildings as $p_building)
                        @include('front.elements.products.building.product', ['product' => $p_building])
                    @endforeach

                    {{ $p_buildings->onEachSide(1)->links('pagination::front-pager') }}

                </article>
                <div class="l-sidebar">
                    @include('components.side')
                </div>
            </div><!-- / l-aside -->
        </div>

    </section><!-- / p-initialDetail2 -->

    <section class="p-initialDetail3">
        <div class="l-cont">
            <div class="c-block1">
                <div class="c-block1__form">
                    @include('front.elements.products.search.form', [
                        'type_value' => \App\Models\ProductSearch::F_BUILDING_ID,
                        'keywords_value' => null
                    ])
                </div>
                <div class="c-initials">
                    @include('front.elements.products.initial_box_long', [
                        'href_base_url' => url('/products/building/initial/'),
                        'initials_count' => (new \App\Models\PBuildingSearch())->getInitialsCountLong()
                    ])
                </div><!-- / c-initials -->

            </div><!-- / c-block1 -->

        </div>
    </section><!-- / p-childcat3 -->
</main>


<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>
