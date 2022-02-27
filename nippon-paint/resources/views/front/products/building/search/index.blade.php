<x-header>
    <x-slot name="title"></x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">products_building</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url"></x-slot>
</x-header>

<main class="p-">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/building/">建築用塗料</a></li>
                <li><span>検索結果一覧</span></li>
            </ul>
        </div>
    </div>

    <section class="p-childcat1">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_text">建築用塗料</x-slot>
                <x-slot name="title2_class">c-title2__style2</x-slot>
            </x-title2>

            <div class="c-form2">
                <div class="c-form2__header">
                    <h3 class="c-form2__title1">
                        <span class="c-form2__title1__jap">条件で絞り込む</span>
                        <span class="c-form2__title1__eng">Filter</span>
                    </h3>
                    <!-- <h4 class="c-form2__title2">該当件数<span id="count-building">{{ $products->total() }}</span>件</h4> -->
                    <div class="c-form2__title2">該当件数<div class="c-form2__title2__number"><div id="count-building" class="count-number">{{ $products->total() }}</div><div class="odometer"></div></div>件</div>
                </div><!-- / c-form2__header -->
                <div class="c-form2__body">
                    <form action="{{ url('products/building/search') }}" class="c-form2__form" id="search-form" data-name="building">
                        <div class="c-form2__form__inner">
                            @include('front.elements.products.building.searchbox',  [
                                'category_label' => '系統',
                                'category_name' => 'subcategory'
                            ])
                        </div>
                        <div class="c-form2__btn is-open">
                            <button type="submit">絞り込む</button>
                        </div>
                    </form>
                </div><!-- / c-form2__body -->
            </div><!-- / c-form2 -->
        </div>

    </section><!-- / p-childcat1 -->

    <section class="p-childcat2">
        <div class="l-cont">
            <div class="l-aside">
                <article>
                    <div class="c-block2">
                        <div class="c-block2__header">
                            <h4 class="c-block2__header__title">該当件数<span class="c-num">{{ $products->total() }}</span>件</h4>
                            <div class="c-block2__header__right">
                                <p class="c-block2__header__label">表示件数</p>
                                <div class="c-block2__header__select" id="app">
                                    <change-limit
                                        :limit="{{$products->perPage()}}"
                                    ></change-limit>
                                </div>
                            </div>
                        </div><!-- / c-block2__header -->

                        @foreach($products as $product)
                            @include('front.elements.products.building.product')
                        @endforeach

                    </div><!-- / c-block2 -->
                    {{ $products->onEachSide(1)->links('pagination::front-pager') }}

                </article>
{{--                <div class="l-sidebar">--}}
{{--                    @include('components.side')--}}
{{--                </div>--}}
            </div><!-- / l-aside -->
        </div>

    </section><!-- / p-childcat2 -->

    <section class="p-childcat3">
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
                        'initials_count' => $p_building_search->getInitialsCountLong()
                    ])
                </div><!-- / c-initials -->

            </div><!-- / c-block1 -->

        </div>
    </section><!-- / p-childcat3 -->

</main>

<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>
