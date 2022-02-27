<x-header>
    <x-slot name="title">よくあるご質問｜日本ペイント株式会社</x-slot>
    <x-slot name="description">建築用塗料、大型構造物・重防食用塗料、自動車補修用塗料について、みなさまからよくお寄せいただくご質問をご紹介します。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">support_faq</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/support/faq/</x-slot>
</x-header>

<main class="p-sfaq">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/support/">お客様サポート</a></li>
                <li><span>よくあるご質問</span></li>
            </ul>
        </div>
    </div>
    <section class="c-mainimg">
        <div class="l-cont">
            <h1 class="c-mainimg__title">
                <span class="c-mainimg__title__jap">よくあるご質問</span>
                <span class="c-mainimg__title__eng">FAQ</span>
            </h1>
            <p class="c-mainimg__text">みなさまからよくお寄せいただくご質問をご紹介します。</p>
        </div>
    </section>
    <section class="p-sfaq1">
        <div class="l-cont">
            <div class="c-form1 c-form1--style3">
                <h2 class="c-form1__text">
                    <span class="c-form1__text1">キーワードから探す</span>
                    <span class="c-form1__text2">Keyword</span>
                </h2>
                @include('front.elements.support.faq.search', [
                    'keywords' => $request->get('keywords') ? implode(' ', $request->get('keywords')) : '',
                ])
            </div>
            <div class="p-sfaq1__block">
                <div class="c-box2">
                    <p class="c-box2__text1">安全データシート（SDS）について</p>
                    <p class="c-box2__text2">
                        SDSは、塗料を購入または購入予定の塗料販売店からお客様へお渡ししております。
                        <br>また、塗装を塗装会社様、工務店様などへご依頼して施工された場合は、それらの会社様を通じてご請求ください。
                    </p>
                </div>
                <div class="c-box2">
                    <p class="c-box2__text1">塗り板の作成について</p>
                    <p class="c-box2__text2">
                        塗り板見本のご請求につきましては、当窓口では、受付致しておりません。
                        <br>塗り板見本作成につきましては、塗料販売店（当社代理店）と弊社との取引きの一環として作成しております。お取引き頂いている塗料販売店様、もしくはお取引先の施工店様経由で塗料販売店様へご依頼（発注）いただけますよう、お願い申し上げます。
                    </p>
                </div>
            </div>
            <div class="p-sfaqcatbox">
                <h2 class="p-sfaqcatbox__txt c-title2 c-title2--center">カテゴリーから探す</h2>
                @include('front.elements.support.faq.category')
            </div>
            <h2 class="p-sfaq1__title2 c-title2 c-title2--center">よく見られている<br class="sp-only">ご質問</h2>
            <ul class="c-list7">
                @foreach($faqs as $faq)
                    <li class="c-list7__item">
                        <a class="c-list7__txt" href="{{ url("/support/faq/{$faq->id}") }}" class="c-list7__txt">{{ $faq->question }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <section class="p-sfaqlink">
        <div class="l-cont">
            <h2 class="c-title3 c-title3__style3"><span>みなさまへのお知らせ</span></h2>
            <ul class="c-list13">
                <li class="c-list13__item">
                    <a href="#" class="c-list13__txt">自然発火にご注意ください</a>
                </li>
                <li class="c-list13__item">
                    <a href="#" class="c-list13__txt">当社の名をかたる塗り替え業者の勧誘にご注意ください</a>
                </li>
                <li class="c-list13__item">
                    <a href="#" class="c-list13__txt">パレット回収にご協力ください</a>
                </li>
            </ul>
        </div>
    </section>
</main>
<x-footer></x-footer>
