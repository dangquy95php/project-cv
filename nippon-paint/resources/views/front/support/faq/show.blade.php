<x-header>
    <x-slot name="title">{{$title}}｜日本ペイント株式会社</x-slot>
    <x-slot name="description">「{{$title}}」の回答ページです。建築用塗料、大型構造物・重防食用塗料、自動車補修用塗料について、よくお寄せいただくご質問をご紹介します。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">support_faq</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/support/faq/id/</x-slot>
</x-header>

<main class="p-sfaqdt">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/support/">お客様サポート</a></li>
                <li><a href="/support/faq/">よくあるご質問</a></li>
                <li><span>{{ $title }}</span></li>
            </ul>
        </div>
    </div>

    <section class="p-sfaqdt1">
        <div class="l-cont2">

            <div class="p-sfaqdt__content">
                <h1>{{ $title }}<span>／ よくあるご質問</span></h1>
                <h2>{{ $faq->question }}</h2>
                @if ($faq->answer)
                    <div>
                        <p>{!! $faq->answer !!}</p>
                    </div>
                @endif
            </div>

            <div class="c-form1 c-form1--style3">
                <h2 class="c-form1__text">
                    <span class="c-form1__text1">キーワードから探す</span>
                    <span class="c-form1__text2">Keyword</span>
                </h2><!-- / c-form1__text -->

                @include('front.elements.support.faq.search', [
                    'keywords' => '',
                ])
            </div>

        </div>
    </section>

    <section class="p-sfaqdt2">
        <div class="l-cont2">
            <h2 class="p-sfaqcatbox__txt c-title2 c-title2--center">カテゴリーから探す</h2>
            @include('front.elements.support.faq.category')
        </div>
    </section>

</main>
<x-footer></x-footer>
