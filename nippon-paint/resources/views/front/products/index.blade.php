<x-header>
    <x-slot name="title">製品情報｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の製品情報ページです。ビル・集合住宅・戸建て住宅などの「建築用塗料」、「大型構造物・重防食用塗料」、「自動車補修用塗料」の製品情報の検索や、関連資料・カタログの閲覧・ダウンロード等。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">products_index</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/</x-slot>
</x-header>

<main class="p-products">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><span>製品情報</span></li>
            </ul>
        </div>
    </div>

    <x-mainimg>
        <x-slot name="title_jap">製品情報</x-slot>
        <x-slot name="title_eng">Product</x-slot>
        <x-slot name="text">リード文が入りますこの文章はダミーです。予めご了承ください。リード文が入りますこの文章はダミーです。予めご了承ください。リード文が入りますこの文章はダミーです。予めご了承ください。（100文字程度）</x-slot>
    </x-mainimg>

    <section class="p-products1">
        <div class="l-cont">
            <div class="c-block1__form">
                @include('front.elements.products.search.form', [
                    'type_value' => \App\Models\ProductSearch::F_ALL_KEY,
                    'keywords_value' => null
                ])
            </div>
            <div class="c-initials">
                @include('front.elements.products.initial_box_long', [
                    'href_base_url' => url('products/initial/'),
                    'initials_count' => (new \App\Models\ProductSearch())->getInitialsCountLong()
                ])
            </div><!-- / c-initials -->
        </div>
    </section><!-- / p-products1 -->

    <section class="p-products2">
        <div class="l-cont">

            <x-title2>
                <x-slot name="title2_text">塗料を探す</x-slot>
                <x-slot name="title2_class">c-title2--center</x-slot>
            </x-title2>

            <x-list10></x-list10>

        </div>
    </section><!-- / p-products2 -->

    <section class="p-products3">
        <div class="l-cont">

            <x-title2>
                <x-slot name="title2_text">特集ページ</x-slot>
                <x-slot name="title2_class">c-title2--center</x-slot>
            </x-title2>

            <x-list11></x-list11>

            <x-btn2>
                <x-slot name="btn2_text">製品特集TOP</x-slot>
            </x-btn2>

        </div>
    </section><!-- / p-products3 -->

    <section class="p-products4">
        <div class="l-cont">

            <x-title3>
                <x-slot name="title3_text">みなさまへのお知らせ</x-slot>
                <x-slot name="title3_class">c-title3__style3</x-slot>
            </x-title3>

            <x-list13></x-list13>

        </div>
    </section><!-- / p-products4 -->

</main>

<x-footer></x-footer>
