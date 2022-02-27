<x-header>
    <x-slot name="title">色見本帳お申し込みフォーム｜日本ペイント株式会社</x-slot>
    <x-slot name="description">色見本帳のお申し込みフォームです。建築用塗料の色見本帳セットを無料でお届けいたします。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">contact_color</x-slot>
    <x-slot name="unique">contact_color</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/contact/color-sample/</x-slot>
</x-header>

<main class="p-contact_color-index">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
                <li><span>色見本帳お申し込みフォーム</span></li>
            </ul>
        </div>
    </div>

    <section class="p-contact_color-index1">
        <div class="l-cont2">
            <h1 class="c-title9"><span class="c-title9__text">色見本帳お申し込みフォーム</span></h1>
            <h2 class="c-title2 c-title2--small">お申し込みいただくにあたって</h2>

            <p class="c-text1">お申し込みフォームの項目を正確にご記入ください。<br>場合によっては電話によるご回答をさしあげることもございますので、特に「必須」のついている項目は、正確にご記入ください。</p>

            <ul class="c-boxlist5">
                <li class="c-boxlist5__item">発送は原則としてお一人様１セットとさせていただきます。</li>
                <li class="c-boxlist5__item">１社様より同時に複数名様でご依頼の場合、発送は原則として１名様分のみとなりますことを予めご了承ください。</li>
                <li class="c-boxlist5__item">発送は、日本国内のみとさせていただきます。</li>
            </ul>

            <p class="c-text1">最近の新型コロナウイルス感染拡大に対する防止策の実施により、お問合せへのご回答、カタログ・色見本帳セット等の発送が遅れる場合がございます。<br>ご迷惑をお掛けし恐縮ですが、何卒ご理解の程お願い申し上げます。
            </p>

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
                {{ Form::open(['action' => 'Front\ContactColorSampleController@confirm', 'id' => 'inquiry_form', 'class' => 'h-adr']) }}
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
                <span class="p-country-name" style="display:none;">Japan</span>
                <div class="c-form4">
                    <h3 class="c-title2 c-title2__style3">よろしければ、<br class="sp-only">アンケートにご協力ください。</h3>
                    <h4 class="c-form4__txt1">塗料に関する情報をどのような方法で入手されますか？（複数回答可）</h4>
                    <h5 class="c-form4__txt2"><span>01.</span>専門誌</h5>
                    @include('front.elements.form.parts.error', ['name' => 'pro_journal_checkbox'])
                    <ul class="c-form4__checkbox">
                    @foreach($pro_journals as $key => $option)
                        <li>
                            {{ Form::checkbox('pro_journal_checkbox[]', $key
                            , (is_array(old('pro_journal_checkbox')) && in_array("$key", old('pro_journal_checkbox'), true)), ['id' => 'pro_journal'.$key]) }}
                            {{ Form::label('pro_journal'.$key, $option) }}
                            @if ($option === 'その他')
                            {{ Form::text('pro_journal_text', old('pro_journal_text'), ['placeholder' => 'その他を選択した方はこちらにご記入ください']) }}
                            @endif
                        </li>
                    @endforeach
                    </ul>

                    <h5 class="c-form4__txt2"><span>02.</span>ホームページ</h5>
                    @include('front.elements.form.parts.error', ['name' => 'homepage_checkbox'])
                    <ul class="c-form4__checkbox">
                    @foreach($homepages as $key => $option)
                        <li>
                            {{ Form::checkbox('homepage_checkbox[]', $key
                            , (is_array(old('homepage_checkbox')) && in_array("$key", old('homepage_checkbox'), true)), ['id' => 'homepage'.$key]) }}
                            {{ Form::label('homepage'.$key, $option) }}
                            @if ($option === 'その他')
                            {{ Form::text('homepage_text', old('homepage_text'), ['placeholder' => 'その他を選択した方はこちらにご記入ください']) }}
                            @endif
                        </li>
                    @endforeach
                    </ul>

                    <h5 class="c-form4__txt2"><span>03.</span>上記以外の方法</h5>
                    @include('front.elements.form.parts.error', ['name' => 'other_checkbox'])
                    <ul class="c-form4__checkbox">
                    @foreach($others as $key => $option)
                        <li>
                            {{ Form::checkbox('other_checkbox[]', $key
                            , (is_array(old('other_checkbox')) && in_array("$key", old('other_checkbox'), true)), ['id' => 'other'.$key]) }}
                            {{ Form::label('other'.$key, $option) }}
                            @if ($option === 'その他')
                            {{ Form::text('other_text', old('other_text'), ['placeholder' => 'その他を選択した方はこちらにご記入ください']) }}
                            @endif
                        </li>
                    @endforeach
                    </ul>

                    <h4 class="c-form4__txt1">お客さまの携わる主な工事内容を教えてください。（複数回答可）</h4>
                    @include('front.elements.form.parts.error', ['name' => 'construction_checkbox'])
                    <ul class="c-form4__checkbox">
                    @foreach($constructions as $key => $option)
                        <li>
                            {{ Form::checkbox('construction_checkbox[]', $key
                            , (is_array(old('construction_checkbox')) && in_array("$key", old('construction_checkbox'), true)), ['id' => 'construction'.$key]) }}
                            {{ Form::label('construction'.$key, $option) }}
                            @if ($option === 'その他')
                            {{ Form::text('construction_text', old('construction_text'), ['placeholder' => 'その他を選択した方はこちらにご記入ください']) }}
                            @endif
                        </li>
                    @endforeach
                    </ul>
                </div>

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
                <li class="c-boxlist5__item">ご請求をいただいた後、10日以内にお届けする予定です。</li>
                <li class="c-boxlist5__item">お客様にご記入いただいた情報は、当社からのご回答、当社から当社の製品・サービス・活動などに関する情報提供ならびに当社の製品・サービス・活動の向上のために利用させていただくことがございます。</li>
                <li class="c-boxlist5__item">当社からお客様へのご回答の全部または一部を、当社の許可なくお客様ご本人以外の方に広く利用され得る状態にすること（ウェブサイトで公開すること、不特定多数の人にeメールで転送すること等）は、ご遠慮ください。また、当社の許可なくご回答の全部または一部を複製・改変することは、著作権侵害となる場合がありますので、ご注意ください。</li>
                <li class="c-boxlist5__item">個人情報の取り扱いについては、「<a href="/privacypolicy/">個人情報の取扱いについて</a>」ページをご覧ください。</li>
            </ul>
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
