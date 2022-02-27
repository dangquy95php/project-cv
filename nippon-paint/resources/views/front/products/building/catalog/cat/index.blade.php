<x-header>
    <x-slot name="title">塗料系統で絞り込む｜建築用塗料カタログダウンロード｜日本ペイント株式会社</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">bcatalogcat</x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url"></x-slot>
</x-header>

<main class="p-bcatalogcat">
    <section class="c-mainimg2">
        <div class="l-cont">
            <h2 class="c-mainimg2__title">塗料系統で絞り込む<span>／ 建築用塗料カタログダウンロード</span></h2>
        </div>
    </section>

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/building">建築用塗料</a></li>
                <li><a href="/products/building/catalog/">建築用塗料カタログダウンロード</a></li>
                <li><span>塗料系統で絞り込む</span></li>
            </ul>
        </div>
    </div>

    <section class="p-bcatalog1">
        @include('components.form2')
    </section><!-- / p-bcatalog1 -->

    @foreach($categories as $category)
        @if($p_building_search->hasDocsInCategory($category))
        <section class="p-bcatalogcat1">
            <div class="l-cont">
                <x-title2>
                    <x-slot name="title2_text">{{ $category->category_name }}</x-slot>
                    <x-slot name="title2_class">c-title2--small</x-slot>
                </x-title2>
                @if($category->child_categories->count() > 0)
                @foreach($category->child_categories as $child_category)
                    @if($child_category->published_p_buildings_with_catalog->count() > 0)
                        <x-title2>
                            <x-slot name="title2_text">{{ $child_category->category_name }}</x-slot>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                        </x-title2>
                        @include('front.elements.products.building.doc_table', ['category' => $child_category])
                    @endif
                @endforeach
                @elseif($category->published_p_buildings_with_catalog->count() > 0)
                    @include('front.elements.products.building.doc_table', ['category' => $category])
                @endif
            </div>
        </section><!-- / p-bcatalogcat1 -->
        @endif
    @endforeach

    <section class="c-grblock1">
        <div class="l-cont">
            @include('front.elements.products.building.kana_search_small')
            <x-block1>
                <x-slot name="select_list">2</x-slot>
            </x-block1>
        </div>
    </section><!-- / p-bcatalogcat2 -->

</main>

<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>
