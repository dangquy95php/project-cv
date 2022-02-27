<x-header>
    <x-slot name="title">title｜日本ペイント株式会社</x-slot>
    <x-slot name="description">title の用語解説ページです。ニッペラボの用語解説では、塗料・塗装の専門用語や関連する用語の意味をわかりやすく解説します。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">term-detail</x-slot>
    <x-slot name="unique">nippelab_term</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/nippelab/term/id/</x-slot>
</x-header>

<main class="p-term-detail">
<div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/nippelab/">ニッペラボ</a></li>
                <li><span>用語解説</span></li>
            </ul>
        </div>
    </div>
    <section class="p-term-detail1">
        <div class="l-cont">
            <h2>用語解説</h2>

            <h1>{{ $technical_term->title }}<span>{{ '読み：' . $technical_term->title_kana }}</span></h1>

            @if ($technical_term->contents)
                {!! $technical_term->contents !!}
            @endif

            <?php if (count($technical_term->term_tags) > 0)  {?>
            <ul>
                <?php $technical_term->term_tags->each(function ($tag) { ?>
                <li>
                    <a href="{{ url("nippelab/term/tag/{$tag['slug']}") }}">{{ $tag['name'] }}</a>
                </li><?php return; }) ?>
            </ul>
            <?php }?>
        </div>

    </section>

    <section class="p-term-detail2">
        <div class="l-cont">
            <div class="c-block1 c-block1--style2">

                @include('front.elements.nippelab.term.input', [
                    'keywords' => '',
                ])

                @include('front.elements.nippelab.term.kana_line', [
                    'kana_lines' => $kana_lines,
                    'kana_line_alphabets' => $kana_line_alphabets,
                    'enable_kana_lines' => $enable_kana_lines,
                ])

                @include('front.elements.nippelab.term.tag', [
                    'term_tags' => $term_tags,
                ])

            </div>
        </div>
    </section><!-- / p-term-detail2 -->

    <section class="p-term-detail3">
        <div class="l-cont">
            <x-title2>
                <x-slot name="title2_text">塗料を探す</x-slot>
                <x-slot name="title2_class">c-title2--center</x-slot>
            </x-title2>
            <x-list10></x-list10>
        </div>
    </section><!-- / p-term-detail3 -->

</main>

<x-footer></x-footer>
