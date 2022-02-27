<x-header>
    <x-slot name="title">ページが見つかりません | 日本ペイント株式会社</x-slot>
    <x-slot name="description">ページが見つかりません | 日本ペイント株式会社</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">error_notfound</x-slot>
    <x-slot name="unique">error</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/404/</x-slot>
</x-header>

<main class="p-404">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><span>ページが見つかりません</span></li>
            </ul>
        </div>
    </div>

    <section class="c-mainimg">
        <div class="l-cont">
            <h1 class="c-mainimg__title">
                <span class="c-mainimg__title__jap">ページが<br class="sp-only">見つかりません</span>
                <span class="c-mainimg__title__eng">404 Not Found</span>
            </h1>
        </div>
    </section>

    <section class="p-404__wrap">
        <div class="l-cont">
            <div class="p-404__info">
                <x-title6>
                    <x-slot name="title6_text">申し訳ございません。<br>お客様がお探しのページは見つかりませんでした。</x-slot>
                    <x-slot name="title6_class">c-title6__style2</x-slot>
                </x-title6>
                <p class="c-text1">公開が終了しているか、URLが誤っている可能性がございます。<br class="pc-only">ブラウザの再読み込みを行ってもこのページが表示される場合は、お手数ですが、サイトマップより目的のページをお探しいただくか、製品検索をご利用ください。</p>
            </div>

            <div class="p-404__box">
                <x-title2>
                    <x-slot name="title2_text">製品を探す</x-slot>
                    <x-slot name="title2_class">c-title2--center</x-slot>
                </x-title2>
                <div class="c-block1">
                    <div class="c-block1__form">
                        @include('front.elements.products.search.form', [
                            'type_value' => \App\Models\ProductSearch::F_ALL_KEY,
                            'keywords_value' => ''
                        ])
                    </div>
                    <div class="c-initials">
                        @include('front.elements.products.initial_box_long', [
                            'href_base_url' => url('/products/initial/'),
                            'initials_count' => (new \App\Models\ProductSearch())->getInitialsCountLong()
                        ])
                    </div><!-- / c-initials -->
                </div>

                <div class="u-center">
                    <a href="/" class="c-btn2 c-btn2__style4">TOPページへ移動する</a>
                </div>
            </div>
        </div>
    </section>
</main>

<x-footer></x-footer>
