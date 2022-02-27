<x-header>
    <x-slot name="title">{{ $title }}｜日本ペイント株式会社</x-slot>
    <x-slot name="description">「重防食用塗料」に関するご質問一覧です。建築用塗料、大型構造物・重防食用塗料、自動車補修用塗料について、みなさまからよくお寄せいただくご質問をご紹介します。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">support_faq</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/support/faq/cat/{{ $title }} /</x-slot>
</x-header>

<main class="p-sfaqcat">
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
    <section class="p-sfaqcat1">
        <div class="l-cont">
            <h1 class="c-title2 c-title2__style2">{{ $title }}<span>／ よくあるご質問</span></h1>
            <p class="p-sfaqcat1__txt">{{ $title }}お寄せいただくよくあるご質問をご紹介します。</p>
            <div class="c-form1 c-form1--style3">
                <h2 class="c-form1__text">
                    <span class="c-form1__text1">キーワードから探す</span>
                    <span class="c-form1__text2">Keyword</span>
                </h2><!-- / c-form1__text -->
                <form class="c-form1__form">
                    <div class="c-form1__input">
                        <input type="text" placeholder="キーワードを入力して下さい">
                    </div>
                    <button class="c-form1__btn"></button>
                </form><!-- / c-form1__form -->
            </div>
            <ul class="c-list7 c-list7__full">
                @foreach($faqs as $faq)
                    <li class="c-list7__item">
                        <a href="{{ url("/support/faq/{$faq->id}") }}" class="c-list7__txt">{{ $faq->question }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="p-sfaqcatbox">
                <h2 class="p-sfaqcatbox__txt c-title2 c-title2--center">カテゴリーから探す</h2>
                @include('front.elements.support.faq.category')
            </div>
        </div>
    </section>
</main>

<x-footer></x-footer>
