<x-header>
    <x-slot name="title">{{ $title }} の検索結果｜よくあるご質問｜日本ペイント株式会社</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">support_faq</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/support/faq/</x-slot>
</x-header>

<main class="p-sfaqsearch">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/support/">お客様サポート</a></li>
                <li><a href="/support/faq/">よくあるご質問</a></li>
                <li><span>{{ $title }} の検索結果</span></li>
            </ul>
        </div>
    </div>
    <section class="p-sfaqsearch1">
        <div class="l-cont">
            <h1 class="c-title2 c-title2__style2">{{ $title }} の検索結果<span>／ よくあるご質問</span></h1>
            <div class="c-form1 c-form1--style3">
                <h2 class="c-form1__text">
                    <span class="c-form1__text1">キーワードから探す</span>
                    <span class="c-form1__text2">Keyword</span>
                </h2>
                <!-- / c-form1__text -->
                @include('front.elements.support.faq.search', [
                    'keywords' => $request->get('keywords') ? implode(' ', $request->get('keywords')) : '',
                ])
                <!-- / c-form1__form -->
            </div>
            <h4 class="c-title6 c-title6__style2"><span class="c-title6__text">{{ $title }} で該当するページがありませんでした。</span></h4>
            <p class="c-text1">
                公開が終了しているか、URLが誤っている可能性がございます。
                <br>ブラウザの再読み込みを行ってもこのページが表示される場合は、お手数ですが、サイトマップより目的のページをお探しいただくか、製品検索をご利用ください。
            </p>
            <ul class="c-list12">
                <li class="c-list12__item">キーワードに誤字・脱字がないか確認してください。</li>
                <li class="c-list12__item">別のキーワードを試してください。</li>
                <li class="c-list12__item">一般的なキーワードに変えて検索してください。</li>
            </ul>
            <div class="u-center">
                <a href="{{ url('support/faq') }}" class="c-btn2 c-btn2__style4">よくあるご質問TOPページ</a>
            </div>
        </div>
    </section>
</main>


<x-footer></x-footer>
