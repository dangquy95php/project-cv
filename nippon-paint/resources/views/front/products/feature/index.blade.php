<x-header>
    <x-slot name="title">製品特集ページ一覧｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の製品特集ページです。パーフェクトシリーズ、アカルクス、サーモアイ、EMO paint、nax E-CUBE WB オール水性システムなど</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">feature</x-slot>
    <x-slot name="unique">products_feature</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/feature/</x-slot>
</x-header>

<main class="p-feature">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><span>製品特集ページ</span></li>
            </ul>
        </div>
    </div>

    <x-mainimg>
        <x-slot name="title_jap">製品特集ページ一覧</x-slot>
        <x-slot name="title_eng">Feature</x-slot>
        <x-slot name="text">リード文が入りますこの文章はダミーです。予めご了承ください。リード文が入りますこの文章はダミーです。予めご了承ください。リード文が入りますこの文章はダミーです。予めご了承ください。（100文字程度）</x-slot>
    </x-mainimg>

    <section class="p-feature1">
        <div class="l-cont">
            <x-block1>
                <x-slot name="select_list">1</x-slot>
                <x-slot name="placeholder">製品名・仕様名・キーワードを入力してください</x-slot>
            </x-block1>
        </div>
    </section><!-- / p-feature1 -->

    <div class="p-feature2">
        <div class="l-cont">

            <x-list11></x-list11>

            <x-btn2>
                <x-slot name="btn2_text">製品特集TOP</x-slot>
            </x-btn2>

        </div>
    </div><!-- / p-feature2 -->

    <section class="p-feature3">
        <div class="l-cont">

            <x-title3>
                <x-slot name="title3_text">みなさまへのお知らせ</x-slot>
                <x-slot name="title3_class">c-title3__style3</x-slot>
            </x-title3>

            <x-list13></x-list13>

        </div>
    </section><!-- / p-feature3 -->

</main>

<x-footer></x-footer>
