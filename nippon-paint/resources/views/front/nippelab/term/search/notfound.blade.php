<x-header>
    <x-slot name="title">{{ $keywords }}の検索結果｜日本ペイント株式会社</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">term-notfound</x-slot>
    <x-slot name="unique">nippelab_term</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url"></x-slot>
</x-header>

<main class="p-term-notfound">
    <section class="p-term-notfound1">
        <div class="l-cont">
            <h1 class="c-title2 c-title2__style2">{{ $keywords }}の検索結果<span>／用語解説</span></h1>

            <x-title6>
                <x-slot name="title6_text">“{{ $keywords }}”で該当するページがありませんでした。</x-slot>
                <x-slot name="title6_class">c-title6__style2</x-slot>
            </x-title6>

            <ul class="c-list12">
                <li class="c-list12__item">キーワードに誤字・脱字がないか確認してください。</li>
                <li class="c-list12__item">別のキーワードを試してください。</li>
                <li class="c-list12__item">一般的なキーワードに変えて検索してください。</li>
            </ul>
        </div>
    </section><!-- / p-term-notfound1 -->

    <section class="p-term-notfound2">
        <div class="l-cont">
            <div class="c-block1 c-block1--style2">
                <!-- / c-form1__text -->
                @include('front.elements.nippelab.term.input', [
                   'keywords' => $keywords,
                ])
                <!-- / c-form1__form -->
                @include('front.elements.nippelab.term.kana_line', [
                   'kana_lines' => $kana_lines,
                   'kana_line_alphabets' => $kana_line_alphabets,
                   'enable_kana_lines' => $enable_kana_lines,
               ])

                @include('front.elements.nippelab.term.tag', [
                   'term_tags' => $term_tags,
               ])
            </div><!-- / c-block1 -->
            <x-btn2>
                <x-slot name="btn2_text">製品情報TOPページ</x-slot>
                <x-slot name="btn2_class">c-btn2__style4</x-slot>
                <x-slot name="btn2_href">/nippelab/term</x-slot>
            </x-btn2>
        </div>
    </section><!-- / p-term-notfound2 -->

    <section class="p-term-notfound3">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_text">塗料を探す</x-slot>
                <x-slot name="title2_class">c-title2--center</x-slot>
            </x-title2>
            <x-list10></x-list10>
        </div>
    </section><!-- / p-term-notfound3 -->

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
