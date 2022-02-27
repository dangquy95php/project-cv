<x-header>
    <x-slot name="title">{{ $p_automotive_search->parent_category->category_name }}｜自動車補修用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の自動車補修用塗料「{{ $p_automotive_search->parent_category->category_name }}」 の製品一覧ページです。豊富なラインナップでお客様のあらゆるニーズにお応えする日本ペイントの自動車補修用製品です。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">cat</x-slot>
    <x-slot name="unique">products_index</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/automotive/cat/{{ $p_automotive_search->parent_category->category_name }}/</x-slot>
</x-header>

<main class="p-cat">
    <div class="c-breadcrumb c-breadcrumb__style1">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/automotive/">自動車補修用塗料</a></li>
                <li><span>{{ $p_automotive_search->parent_category->category_name }}</span></li>
            </ul>
        </div>
    </div>

    <section class="p-cat1">
        <div class="l-cont">
            <h1 class="c-title2 c-title2__style2">{{ $p_automotive_search->parent_category->category_name }}<span>／ 自動車補修用塗料</span></h1>
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
            @include('components.form4')
        </div>
    </section><!-- / p-cat1 -->

    <section class="p-cat2">
        <div class="l-cont">
            <div class="l-aside">
                <article>
                    <div class="c-block2 c-block2__style1">
                        <div class="c-block2__header">
                            <h4 class="c-block2__header__title">該当件数<span class="c-num">{{ $p_automotives->total() }}</span>件</h4>
                            <div class="c-block2__header__right">
                                <p class="c-block2__header__label">表示件数</p>
                                <div class="c-block2__header__select" id="app">
                                    <change-limit
                                            :limit="{{$p_automotives->perPage()}}"
                                    ></change-limit>
                                </div>
                            </div>
                        </div>

                        @foreach($p_automotives as $p_automotive)
                            @include('front.elements.products.automotive.product')
                        @endforeach
                    </div>
                    {{ $p_automotives->onEachSide(1)->links('pagination::front-pager') }}
                </article>
                <div class="l-sidebar">
                    @include('components.side4')
                </div>
            </div>
        </div>
    </section><!-- / p-cat2 -->

    <section class="p-cat3">
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
    </section><!-- / p-cat3 -->

</main>

<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>
