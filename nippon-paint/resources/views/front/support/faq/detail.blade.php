<x-header>
    <x-slot name="title">{{ $title }}｜日本ペイント株式会社</x-slot>
    <x-slot name="description">よくあるご質問「Q.ピカピカと光輝く亜鉛めっき鋼面には塗装できないと聞いたが本当ですか？」の回答ページです。建築用塗料、大型構造物・重防食用塗料、自動車補修用塗料について、よくお寄せいただくご質問をご紹介します。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">support_faq</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/support/faq/id</x-slot>
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
            <h1 class="c-title2 c-title2__style2">{{ $title }}<span>／ よくあるご質問</span></h1>
            <div class="c-text4">
                <h2 class="c-text4__tit">{{ $faq->question }}</h2>
                <div class="c-text4__txt">
                   {!!  $faq->answer !!}
                </div>

            </div><!-- / p-sfaqdt__content -->
            
        </div>
        
        <div class="l-cont2">
            
            <div class="c-form1 c-form1--style3">
                <h2 class="c-form1__text">
                    <span class="c-form1__text1">キーワードから探す</span>
                    <span class="c-form1__text2">Keyword</span>
                </h2><!-- / c-form1__text -->
                @include('front.elements.support.faq.search', [
                    'keywords' => $request->get('keywords') ? implode(' ', $request->get('keywords')) : '',
                ])<!-- / c-form1__form -->
            </div>
            <div class="p-sfaqcatbox">
                <h2 class="p-sfaqcatbox__txt c-title2 c-title2--center">カテゴリーから探す</h2>
                @include('front.elements.support.faq.category')
            </div>
        </div>
    </section>
</main>

<x-footer></x-footer>