<x-header>
    <x-slot name="title">nax E-cube WB 水性システムコンセプトブックダウンロードフォーム｜日本ペイント株式会社</x-slot>
    <x-slot name="description">水性塗料導入を検討している方、必見！地域環境・従業員に配慮し、ユーザーとのエンゲージメントを高める製品「nax E-CUBE WB 水性システム」のコンセプトブックPDFデータのダウンロードフォームです。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">contact_naxe</x-slot>
    <x-slot name="unique">contact_naxe</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/contact/naxecube-conceptbook/</x-slot>
</x-header>

<main class="p-contact_naxe-index">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
                <li><span>nax E-cube WB 水性システムコンセプトブックダウンロードフォーム</span></li>
            </ul>
        </div>
    </div>
    <section class="p-contact_naxe-index1">
        <div class="l-cont2">
            <h1 class="c-title9"><span class="c-title9__text">nax E-cube WB 水性システム コンセプトブックダウンロードフォーム</span></h1>
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
                {{ Form::open(['action' => 'Front\ContactNaxecubeConceptbookController@confirm', 'id' => 'inquiry_form', 'class' => 'h-adr']) }}
                    @include('front.elements.form.select', [
                        'label' => '業種',
                        'name' => 'sector',
                        'options' => $sectors,
                        'placeholder' => '業種をお選びください',
                        'required' => false,
                    ])
                    @include('front.elements.form.text', [
                        'label' => '会社名（団体名）',
                        'name' => 'company',
                        'placeholder' => '例）日本ペイント株式会社',
                        'required' => true,
                        'comment' => '個人の方は「個人」とご入力ください。',
                    ])
                    @include('front.elements.form.text', [
                        'label' => '部署名',
                        'name' => 'dept',
                        'placeholder' => '例）東京営業所',
                        'required' => false,
                    ])
                    @include('front.elements.form.text', [
                        'label' => '役職',
                        'name' => 'post',
                        'placeholder' => '例）部長',
                        'required' => false,
                    ])
                    @include('front.elements.form.text', [
                        'label' => 'お名前',
                        'name' => 'name',
                        'placeholder' => '例）山田 太郎',
                        'required' => true,
                    ])
                    @include('front.elements.form.text', [
                        'label' => 'よみがな',
                        'name' => 'yomigana',
                        'placeholder' => '例）やまだ たろう',
                        'required' => true,
                        'comment' => '全角ひらがなで入力してください',
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
                    @include('front.elements.form.radio2', [
                        'label' => '「nax E-CUBE WB水性システム」について詳しい説明を',
                        'name' => 'description',
                        'options' => $descriptions,
                        'required' => true,
                        'error_text' => 'blahblahblah',
                        'pattern' => ''
                    ])
                    @include('front.elements.form.textarea', [
                        'label' => 'その他お問い合わせ',
                        'name' => 'etc_inquiry',
                        'placeholder' => 'その他お問い合わせをご記入ください',
                        'required' => false,
                        'error_text' => 'blahblahblah',
                    ])
                    <span class="p-country-name" style="display:none;">Japan</span>
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
            <ul class="c-boxlist5">
                <li class="c-boxlist5__item">お客様にご記入いただいた情報は、当社からのご回答、当社から当社の製品・サービス・活動などに関する情報提供ならびに当社の製品・サービス・活動の向上のために利用させていただくことがございます。</li>
                <li class="c-boxlist5__item">当社からお客様へのご回答の全部または一部を、当社の許可なくお客様ご本人以外の方に広く利用され得る状態にすること（ウェブサイトで公開すること、不特定多数の人にeメールで転送すること等）は、ご遠慮ください。また、当社の許可なくご回答の全部または一部を複製・改変することは、著作権侵害となる場合がありますので、ご注意ください。</li>
                <li class="c-boxlist5__item">個人情報の取り扱いについては、「<a href="/privacypolicy/">個人情報の取扱いについて</a>」ページをご覧ください。</li>
            </ul>
        </div>
    </section>

</main>
{{ no_captcha()->script() }}
<script>
    var inquiry_form = document.getElementById('inquiry_form');
    //フォーム要素にイベントハンドラを設定
    inquiry_form.onsubmit = function(event) {
        //デフォルトの動作（送信）を停止
        event.preventDefault();
        //トークンを取得
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
