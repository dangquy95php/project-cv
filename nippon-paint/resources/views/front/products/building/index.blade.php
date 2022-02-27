<x-header>
    <x-slot name="title">建築用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「建築用塗料」製品検索ページです。ビル・集合住宅・戸建て住宅用塗料の新製品・外装用仕上げ塗材・屋根用塗料・鉄部用塗料のカテゴリページです。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">建築用塗料</x-slot>
    <x-slot name="unique">products_building</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/building/</x-slot>
</x-header>

<main class="p-building">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><span>建築用塗料</span></li>
            </ul>
        </div>
    </div>

    <x-mainimg>
        <x-slot name="title_jap">建築用塗料</x-slot>
        <x-slot name="title_eng">Paint For Construction</x-slot>
        <x-slot name="text">戸建て住宅やマンション、ビルなどで使用される建築用塗料。建物を太陽光や雨から守るとともに、外壁やインテリアに彩りを与え、さらには様々な機能で人々の生活に快適さも付与できます。</x-slot>
    </x-mainimg>

    <section class="p-building1">
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
            </div>

            <div class="c-form2">
                <div class="c-form2__header">
                    <h3 class="c-form2__title1">
                        <span class="c-form2__title1__jap">条件で絞り込む</span>
                        <span class="c-form2__title1__eng">Filter</span>
                    </h3>
                    <div class="c-form2__title2">該当件数<div class="c-form2__title2__number"><div id="count-building" class="count-number">{{ $p_building_search->totalCount() }}</div><div class="odometer"></div></div>件</div>
                </div><!-- / c-form2__header -->
                <div class="c-form2__body">
                    <form action="{{ url('products/building/search') }}" class="c-form2__form" data-name="building">
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
    </section>
    <!-- / p-building1 -->

    <section class="p-building2">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_class">c-title2--center</x-slot>
                <x-slot name="title2_text">塗料を探す</x-slot>
            </x-title2>

            @include('components.list5')
        </div>
    </section>
    <!-- / p-building2 -->

    <section class="p-building3">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_class">c-title2--center</x-slot>
                <x-slot name="title2_text">各種資料</x-slot>
            </x-title2>

            <ul class="c-list6">
                <li class="c-list6__row">
                    <p class="c-list6__ttl">設計価格表／積算資料</p>
                    <ul class="c-list6__box">
                        <li class="c-list6__item">
                            <a href="/images/products/building/pricelist.pdf" target="_blank" class="c-list6__txt">建築用塗料外装仕上げ塗材設計価格表</a>
                        </li>
                        <li class="c-list6__item">
                            <a href="/images/products/building/pricelist_1.pdf" target="_blank" class="c-list6__txt">鋼構造物塗料積算資料</a>
                        </li>
                    </ul>
                </li>
                <li class="c-list6__row">
                    <p class="c-list6__ttl">各種証明書</p>
                    <ul class="c-list6__box">
                        <li class="c-list6__item arrow">
                            <a href="/products/building/fire-protecting-material/" class="c-list6__txt">防火材料等証明書</a>
                        </li>
                        <li class="c-list6__item arrow">
                            <a href="/products/building/formaldehyde-emission/" class="c-list6__txt">ホルムアルデヒド放散等級の証明書</a>
                        </li>
                    </ul>
                </li>
                <li class="c-list6__row">
                    <p class="c-list6__ttl">規格・仕様書</p>
                    <ul class="c-list6__box">
                        <li class="c-list6__item arrow">
                            <a href="/products/building/public-building-specifications/" class="c-list6__txt">公共建築工事標準仕様書</a>
                        </li>
                        <li class="c-list6__item">
                            <a href="/images/products/building/JIS1.pdf" target="_blank" class="c-list6__txt">JIS規格・塗料略号一覧表</a>
                        </li>
                        <li class="c-list6__item">
                            <a href="/images/products/building/JIS2.pdf" target="_blank" class="c-list6__txt">Jis A6909 建築用仕上塗材組合わせ一覧表</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <!-- / p-building3 -->

    <section class="p-building4">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_class">c-title2--center</x-slot>
                <x-slot name="title2_text">建築用塗料に関する<br class="sp-only">よくあるご質問</x-slot>
            </x-title2>

            @include('components.list7')

            <div class="u-center">
                <x-btn2>
                    <x-slot name="btn2_text">よくあるご質問を見る</x-slot>
                </x-btn2>
            </div>
        </div>
    </section>
</main>

<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>
