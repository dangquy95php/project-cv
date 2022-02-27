<x-header>
    <x-slot name="title">{{ $kana_line }}行｜日本ペイント株式会社</x-slot>
    <x-slot name="description">「{{ $kana_line }}行」の用語一覧です。ニッペラボの用語解説では、塗料・塗装の専門用語や関連する用語の意味をわかりやすく解説します。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">term-initial</x-slot>
    <x-slot name="unique">nippelab_term</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/nippelab/term/initial/{a}/</x-slot>
</x-header>

<main class="p-term-initial">

    <section class="p-term-initial1">
        <div class="l-cont">
            <h1 class="c-title2 c-title2__style2">{{ $kana_line }}行<span>／用語解説</span></h1>

            <div class="c-block1 c-block1--style2">
                @include('front.elements.nippelab.term.input', [
                   'keywords' => $request->get('keywords') ? implode(' ', $request->get('keywords')) : '',
                ])

                @include('front.elements.nippelab.term.kana_line', [
                   'kana_lines' => $kana_lines,
                   'kana_line_alphabets' => $kana_line_alphabets,
                   'enable_kana_lines' => $enable_kana_lines,
                ])

                @include('front.elements.nippelab.term.tag', [
                    'term_tags' => $term_tags,
                ])
                <!-- / c-list14 -->
            </div>
        </div>
    </section><!-- / p-term-initial1 -->

    <section class="p-term-initial2">
        <div class="l-cont">
            <div class="c-block2">
                <div class="c-block2__header">
                    <h4 class="c-block2__header__title">該当件数<span class="c-num">{{ $technical_terms->total() }}</span>件</h4>
                    <div class="c-block2__header__right">
                        <p class="c-block2__header__label">表示件数</p>
                        <div class="c-block2__header__select">
                            <div id="app">
                                <pagination-pulldown-component :terms_count="{{ $technical_terms->total() }}" :per_page="{{ $per_page }}"></pagination-pulldown-component>
                            </div>
                        </div>
                    </div>
                </div><!-- / c-block2__header -->
                @include('front.elements.nippelab.term.list', [
                   '$technical_terms' => $technical_terms,
                ])
            </div><!-- / c-block2 -->
            {{ $technical_terms->appends(['per_page' => $per_page])->links('pagination::front-pager') }}
            <!-- / c-nav2 -->
        </div>
    </section><!-- / p-term-initial2 -->

    <section class="p-term-initial3">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_text">塗料を探す</x-slot>
                <x-slot name="title2_class">c-title2--center</x-slot>
            </x-title2>
            <x-list10></x-list10>
        </div>
    </section><!-- / p-term-initial3 -->
    <script src="{{ asset('js/front/app.js') }}"></script>
</main>

<div class="c-breadcrumb">
    <div class="l-cont">
        <ul>
            <li><a href="/">日本ペイントHOME</a></li>
            <li><a href="/nippelab/">ニッペラボ</a></li>
            <li><span>用語解説</span></li>
        </ul>
    </div>
</div>

<x-footer></x-footer>
