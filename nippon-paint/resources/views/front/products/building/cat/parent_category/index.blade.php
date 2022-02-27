<x-header>
    <x-slot name="title">{{ $category->category_name }}｜建築用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の建築用塗料「{{ $category->category_name }}」製品一覧ページです。複層仕上げ塗材、単層弾性塗料、薄付仕上げ塗材など豊富なラインナップを取り揃えています。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">childcat</x-slot>
    <x-slot name="unique">products_building</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/building/cat/{{ $category->category_name }}/</x-slot>
</x-header>

<main class="p-childcat">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/building/">建築用塗料</a></li>
                <li><span>{{ $category->category_name }}</span></li>
            </ul>
        </div>
    </div>

    <section class="p-childcat1">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_text">{{ $category->category_name }}<span>／ 建築用塗料</span></x-slot>
                <x-slot name="title2_class">c-title2__style2</x-slot>
            </x-title2>
        </div>

        <div class="c-form2">
            <div class="l-cont">
                <div class="c-form2__header">
                    <h3 class="c-form2__title1">
                        <span class="c-form2__title1__jap">{{ $category->category_name }}を条件で絞り込む</span>
                        <span class="c-form2__title1__eng">Filter</span>
                    </h3>

                    <div class="c-form2__title2">該当件数<div class="c-form2__title2__number"><div id="count-building" class="count-number">{{ $p_building_search->totalCount() }}</div><div class="odometer"></div></div>件</div>
                </div><!-- / c-form2__header -->

                <div class="c-form2__text sp-only">
                    <div class="c-form2__text__inner">
                        @foreach($p_building_search->conditions as $condition)
                        <div class="c-form2__text__row">
                            <p class="c-form2__text1"><strong>{{ $condition['label'] }}</strong>／</p>
                            <p class="c-form2__text2">{{ $condition['condition'] }}</p>
                        </div>
                        @endforeach
                    </div><!-- / c-form2__text__inner -->

                </div><!-- / c-form2__text -->

                <div class="c-form2__body">
                    <form action="" class="c-form2__form" id="search-form" data-name="building" data-parent="{{ $p_building_search->parent_category->slug }}">
                        <div class="c-form2__form__inner">
                            <div class="c-form2__btnclose js-c-form2__btnclose"><span class="c-form2__btnclose__text">閉じる</span></div>
                            @include('front.elements.products.building.searchbox', [
                                'category_label' => $category->category_name.'<br class="pc-only">カテゴリー',
                                'category_name' => 'child_category'
                            ])
                        </div>
                        <div class="c-form2__btn">
                            <button type="submit">絞り込む</button>
                        </div>
                    </form>
                </div><!-- / c-form2__body -->

            </div>
        </div><!-- / c-form2 -->

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
                <div class="l-sidebar">
                    @include('components.side')
                </div>
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
