<x-header>
    <x-slot name="title">タフガードQ-R工法カタログお申し込みフォーム｜日本ペイント株式会社</x-slot>
    <x-slot name="description">タフガードQ-R工法のカタログお申し込みフォームです。製品カタログをPDFファイルでダウンロードすることができます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">contact_tough</x-slot>
    <x-slot name="unique">contact_tough</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/contact/tough-guard-catalog/</x-slot>
</x-header>

<main class="p-contact_tough-index">
    <div class="c-breadcrumb c-breadcrumb__style1">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
                <li><span>タフガードQ-R工法カタログお申し込みフォーム</span></li>
            </ul>
        </div>
    </div>

    <section class="p-contact_tough-index1">
        <div class="l-cont2">
            <h1 class="c-title9"><span class="c-title9__text">タフガードQ-R工法カタログお申し込みフォーム</span></h1>
            <h2 class="c-title2 c-title2--small">お申し込みに関する注意事項</h2>
            <p class="c-text1">お手数ですが、下記のフォームでお申し込みください。<br>
                タフガードQ-R工法の製品カタログをPDFファイルでダウンロードすることができます。</p>
            <ul class="c-boxlist5">
                <li class="c-boxlist5__item">土日祝祭日、年末年始ほか、当社休業日にいただいたお問い合わせについては、翌営業日以降の対応となりますので、ご了承ください。</li>
                <li class="c-boxlist5__item">
                    お客様にご記入いただいた情報は、当社からのご回答、当社から当社の製品・サービス・活動などに関する情報提供ならびに当社の製品・サービス・活動の向上のために利用させていただくことがございます。</li>
                <li class="c-boxlist5__item">内容によっては、ご回答にお時間をいただく場合や、お答えできかねる場合もあります。</li>
                <li class="c-boxlist5__item">
                    当社からお客様へのご回答の全部または一部を、当社の許可なくお客様ご本人以外の方に広く利用され得る状態にすること（ウェブサイトで公開すること、不特定多数の人にeメールで転送すること等）は、ご遠慮ください。また、当社の許可なくご回答の全部または一部を複製・改変することは、著作権侵害となる場合がありますので、ご注意ください。
                </li>
                <li class="c-boxlist5__item">個人情報の取り扱いについては、「<a href="/privacypolicy/" target="_blank">個人情報の取扱いについて</a>」ページをご覧ください。
                </li>
                <li class="c-boxlist5__item">
                    このお問い合わせフォームはSSL（SecureSocketLayer）に対応しています、SSLとは、情報を暗号化してインターネット上で通信するための技術で、お客さまの個人情報はこれにより保護されます。
                </li>
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
                {{ Form::open(['action' => 'Front\ContactToughGuardCatalogController@confirm', 'id' => 'inquiry_form']) }}
                @include('front.elements.form.text', [
                'label' => 'お名前',
                'name' => 'name',
                'placeholder' => '例）山田 太郎',
                'required' => true,
                'error_text' => '名前を入力してください',
                ])
                @include('front.elements.form.text', [
                'label' => '会社名',
                'name' => 'company',
                'placeholder' => '例）日本ペイント株式会社',
                'required' => true,
                ])
                @include('front.elements.form.text', [
                'label' => '部署名',
                'name' => 'dept',
                'placeholder' => '例）東京営業所',
                'required' => true,
                ])
                @include('front.elements.form.text', [
                'label' => 'お電話',
                'name' => 'phone',
                'placeholder' => '例）012-3456-7890',
                'required' => true,
                'comment' => '半角数字で入力してください',
                'error_text' => '半角数字で入力してください',
                ])
                <div class="c-form3__btn">
                    <div class="c-form3__div">
                        {{ Form::submit('確認する', ['id' => 'submit_btn']) }}
                    </div>
                    <div class="c-form3__img">
                        <img src="/images/common/form_img.svg">
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
