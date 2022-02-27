<x-header>
    <x-slot name="title">建築用塗料カタログダウンロード｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の建築用塗料カタログの検索ページです。PDFで閲覧・ダウンロードすることができます。豊富なラインナップからお選びください。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">bcatalog</x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/building/catalog/</x-slot>
</x-header>

<main class="p-bcatalog">
    <section class="c-mainimg2">
        <div class="l-cont">
            <h1 class="c-mainimg2__title">建築用塗料カタログダウンロード</h1>
            <p class="c-mainimg2__text">公共建築工事標準仕様書ダウンロードについて説明が入ります。この文章はダミーです。予めご了承下さい。公共建築工事標準仕様書ダウンロードについて説明が入ります。この文章はダミーです。予めご了承下さい。公共建築工事標準仕様書ダウンロードについて説明が入ります。この文章はダミーです。予めご了承下</p>
        </div>
    </section>

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/building/">建築用塗料</a></li>
                <li><span>建築用塗料カタログダウンロード</span></li>
            </ul>
        </div>
    </div>

    <section class="p-bcatalog1">
        @include('components.form2')
    </section><!-- / p-bcatalog1 -->

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
