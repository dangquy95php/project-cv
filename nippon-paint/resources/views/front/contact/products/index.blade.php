<x-header>
    <x-slot name="title">製品に関するお問い合わせ｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の製品に関するお問い合わせフォームです。こちらからお問い合わせください。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">contactPro</x-slot>
    <x-slot name="unique">contact_products</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/contact/products/</x-slot>
</x-header>

<main class="p-contact_products-index">
    <div class="c-breadcrumb c-breadcrumb__style1">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
                <li><span>製品に関するお問い合わせ</span></li>
            </ul>
        </div>
    </div>

    <section class="p-contact_products-index1">
        <div class="l-cont2">
            <h1 class="c-title9"><span class="c-title9__text">製品に関する<br class="sp-only">お問い合わせ</span></h1>
            <h2 class="c-title2 c-title2--small">お問い合わせに関する注意事項</h2>
            <p class="c-text1">お問い合わせフォームの項目を正確にご記入ください。<br>
                場合によっては電話によるご回答をさしあげることもございますので、特に「必須」のついている項目は、正確にご記入ください。</p>
            <ul class="c-boxlist5">
                <li class="c-boxlist5__item">土日祝祭日、年末年始ほか、当社休業日にいただいたお問い合わせについては、翌営業日以降の対応となりますので、ご了承ください。</li>
                <li class="c-boxlist5__item">お問い合わせ内容を送信いただくと同時に、自動的に受信確認メールをお送りしています。</li>
                <li class="c-boxlist5__item">お客様にご記入いただいた情報は、当社の製品・サービス・活動などのために利用させていただくことがあります。</li>
                <li class="c-boxlist5__item">内容によっては、ご回答にお時間をいただく場合や、お答えできかねる場合もあります。</li>
                <li class="c-boxlist5__item">
                    当社からお客様へのご回答の全部または一部を、当社の許可なくお客様ご本人以外の方に広く利用され得る状態にすること（ウェブサイトで公開すること、不特定多数の人にメールで転送すること等）は、ご遠慮ください。また、当社の許可なく回答の全部または一部を複製・改変することは、著作権侵害となる場合がありますので、ご注意ください。
                </li>
                <li class="c-boxlist5__item">個人情報の取り扱いについては、「<a href="/privacypolicy/" target="_blank">個人情報の取扱いについて</a>」ページをご覧ください。
                </li>
                <li class="c-boxlist5__item">
                    このお問い合わせフォームはSSL（SecureSocketLayer）に対応しています、SSLとは、情報を暗号化してインターネット上で通信するための技術で、お客さまの個人情報はこれにより保護されます。
                </li>
                <li class="c-boxlist5__item">お電話でのお問い合わせは最寄りの営業所にて承ります。「<a href="/about/network/" target="_blank">拠点情報</a>」ページをご覧ください。
                </li>
                <li class="c-boxlist5__item">カタログのご入手につきましては、出来るだけ「<a href="/" target="_blank">カタログダウンロード</a>」をご利用くださいますようお願い申し上げます。</li>
            </ul>
            <p class="c-text1">最近の新型コロナウイルス感染拡大に対する防止策の実施により、お問合せへのご回答、カタログ・色見本帳セット等の発送が遅れる場合がございます。<br>
                ご迷惑をお掛けし恐縮ですが、何卒ご理解の程お願い申し上げます。</p>
            <ul class="c-nav4">
                <li class="c-nav4__item is-active"><a href="">
                        <p class="c-nav4__num">01</p>
                        <p class="c-nav4__text">入力</p>
                    </a></li>
                <li class="c-nav4__item"><a href="">
                        <p class="c-nav4__num">02</p>
                        <p class="c-nav4__text">確認</p>
                    </a></li>
                <li class="c-nav4__item"><a href="">
                        <p class="c-nav4__num">03</p>
                        <p class="c-nav4__text">完了</p>
                    </a></li>
            </ul>
            <div class="c-form3 c-form3--error">
                {{ Form::open(['action' => 'Front\ContactProductsController@confirm', 'id' => 'inquiry_form', 'class' => 'h-adr']) }}
                @include('front.elements.form.text', [
                'label' => 'お名前',
                'name' => 'name',
                'placeholder' => '例）山田 太郎',
                'required' => true,
                'error_text' => '名前を入力してください',
                ])
                @include('front.elements.form.text', [
                'label' => 'よみがな',
                'name' => 'yomigana',
                'placeholder' => '例）やまだ たろう',
                'required' => true,
                'comment' => '全角ひらがなで入力してください',
                'error_text' => '全角ひらがなで入力してください',
                ])
                @include('front.elements.form.text', [
                'label' => '会社名',
                'name' => 'company',
                'placeholder' => '例）日本ペイント株式会社',
                'required' => false,
                ])
                @include('front.elements.form.text', [
                'label' => '部署名',
                'name' => 'dept',
                'placeholder' => '例）東京営業所',
                'required' => false,
                ])
                @include('front.elements.form.select', [
                'label' => '業種',
                'name' => 'sector',
                'options' => $sectors,
                'placeholder' => '業種をお選びください',
                'required' => true,
                'error_text' => '業種を選択してください',
                ])
                @include('front.elements.form.text', [
                'label' => 'eメール',
                'name' => 'email',
                'placeholder' => '例）taro@nipponpaint.co.jp',
                'required' => true,
                'comment' => '半角英数字で入力してください',
                'annotation' => '※アドレスに誤りがあると返信ができません。<br class="sp-only">この場合は受信確認メールも届きませんのでご注意ください。',
                'error_text' => '半角英数字で入力してください',
                ])
                @include('front.elements.form.text', [
                'label' => '郵便番号',
                'name' => 'postal_code',
                'placeholder' => '例）012-3456',
                'required' => true,
                'comment' => '半角数字で入力してください。<br>郵便番号を入力すると自動で住所が反映されます。',
                'annotation' => '※海外のお客様は、000-0000 と入力してください。',
                'error_text' => '半角数字で入力してください。',
                'class' => 'p-postal-code',
                ])
                @include('front.elements.form.select_text', [
                'label' => 'ご住所',
                'select_name' => 'pref',
                'select_options' => $prefs,
                'select_placeholder' => '都道府県をお選びください',
                'select_error_text' => '都道府県を選択してください。',
                'select_class' => 'p-region-id',
                'text_name' => 'address',
                'text_placeholder' => '例）大阪市北区大淀2-1-2',
                'text_error_text' => '市区町村・番地を入力してください',
                'required' => true,
                'comment' => '市区町村・番地を入力してください',
                'class' => 'p-locality p-street-address p-extended-address'
                ])
                @include('front.elements.form.text', [
                'label' => 'お電話',
                'name' => 'phone',
                'placeholder' => '例）012-3456-7890',
                'required' => true,
                'comment' => '半角数字で入力してください',
                'error_text' => '半角数字で入力してください',
                ])
                @include('front.elements.form.radio', [
                'label' => 'お問い合わせ内容',
                'name' => 'inquiry',
                'options' => $inquiries,
                'required' => true,
                'error_text' => '選択してください',
                ])
                @include('front.elements.form.textarea', [
                'label' => '具体的な内容',
                'name' => 'inquiry_body',
                'placeholder' => 'お問い合わせ内容をご記入ください',
                'required' => true,
                'error_text' => '入力してください',
                ])
                <span class="p-country-name" style="display:none;">Japan</span>
                <div class="c-form3__btn">
                    <div class="c-form3__div">
                        {{ Form::submit('確認する', ['id' => 'submit_btn']) }}
                    </div>
                    <div class="c-form3__img">
                        <span id="ss_gmo_img_wrapper_100-50_image_ja">
                            <a href="https://jp.globalsign.com/" target="_blank" rel="nofollow">
                                <img alt="SSL　GMOグローバルサインのサイトシール" border="0" id="ss_img" src="//seal.globalsign.com/SiteSeal/images/gs_noscript_100-50_ja.gif">
                            </a>
                        </span>
                        <script type="text/javascript" src="//seal.globalsign.com/SiteSeal/gmogs_image_100-50_ja.js" defer="defer"></script>
                    </div>
                </div>

                {{ no_captcha()->input() }}
                {{ Form::close() }}
            </div>
        </div>
    </section>

</main>

{{ no_captcha()->script() }}
<script>
    function successform(params) {
        var inquiry_form = document.getElementById('inquiry_form');
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('no-captcha.sitekey') }}', {
                    action: 'contact'
                }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
                inquiry_form.submit();
            });
        });
    }
</script>
<x-footer></x-footer>
