<x-header>
    <x-slot name="title">自動車補修用塗料｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の「自動車補修用塗料」製品情報ページです。製品検索、製品カタログ、仕事に役立つ情報をタイムリーに入手できるnaxウェブVIFをご覧いただけます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">automotive</x-slot>
    <x-slot name="unique">products_index</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/automotive/</x-slot>
</x-header>

<main class="p-automotive">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><span>自動車補修用塗料</span></li>
            </ul>
        </div>
    </div>

    <x-mainimg>
        <x-slot name="title_jap">自動車補修用塗料</x-slot>
        <x-slot name="title_eng">Paint For Automotive Repair</x-slot>
        <x-slot name="text">総合塗料メーカーとして50年以上の新車塗装で培った最先端技術を補修分野へ応用すると共に、補修に適した塗料製品や塗装技術を生み出しています。</x-slot>
    </x-mainimg>

    <section class="p-automotive1">
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
            @include('components.form4')
        </div>
    </section><!-- / p-automotive1 -->

    <section class="p-automotive2">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_text">カテゴリーから探す</x-slot>
                <x-slot name="title2_class">c-title2--center</x-slot>
            </x-title2>

            <ul class="c-list5">
                @foreach($p_automotive_search->subcategories as $category)
                <li class="c-list5__item">
                    <a href="{{ url('/products/automotive/cat/'.$category->slug) }}" class="c-list5__inner">
                        <figure class="c-list5__img">
                            <img src="/images/products/automotive/icon{{ $category->id }}.svg" alt="">
                        </figure>
                        <p class="c-list5__ttl">{{ $category->category_name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>

        </div>
    </section><!-- / p-automotive2 -->

    <section class="p-automotive3">
        <div class="l-cont">
            <x-automotive></x-automotive>
        </div>
    </section><!-- / p-automotive3 -->

</main>

<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>

