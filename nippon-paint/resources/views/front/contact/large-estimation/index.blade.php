<x-header>
    <x-slot name="title">重防食用塗料積算お見積りフォーム｜日本ペイント株式会社</x-slot>
    <x-slot name="description">重防食用塗料積算見積もりフォームです。積算見積もりのみの対応になります。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">contact_large</x-slot>
    <x-slot name="unique">contact_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/contact/large-estimation/</x-slot>
</x-header>

<main class="p-contact_large-index">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
                <li><span>重防食用塗料積算見積フォーム</span></li>
            </ul>
        </div>
    </div>

    <section class="p-contact_large-index1">
        <div class="l-cont2">
            <h1 class="c-title9"><span class="c-title9__text">重防食用塗料積算お見積りフォーム</span></h1>
            <h2 class="c-title2 c-title2--small">お申し込みいただくにあたって</h2>

            <p class="c-text1">積算見積フォームの項目を正確にご記入ください。<br>場合によっては電話によるご回答をさしあげることもございますので、特に「必須」のついている項目は、正確にご記入ください。</p>

            <ul class="c-boxlist5">
                <li class="c-boxlist5__item">積算見積のみの対応になります。メーカーによる責任施工ではなく、日本塗装工業会の耐火塗装施工技術協会の施工会員による施工になります。</li>
                <li class="c-boxlist5__item">注意事項が入りますこの文章はダミーです予めご了承ください。注意事項が入りますこの文章はダミーです予めご了承ください。</li>
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
                {{ Form::open(['action' => 'Front\ContactLargeEstimationController@confirm', 'id' => 'inquiry_form', 'class' => 'h-adr']) }}
                    @include('front.elements.form.radio2', [
                        'label' => '対象',
                        'name' => 'large_target',
                        'options' => $targets,
                        'required' => true,
                        'pattern' => ''
                    ])
                    @include('front.elements.form.radio2', [
                        'label' => '耐火時間',
                        'name' => 'fireproof_time',
                        'options' => $fireproof_times,
                        'required' => true,
                        'dl_class' => 'c-form3__active01',
                        'pattern' => '--second',
                    ])
                    @include('front.elements.form.text', [
                        'label' => '仕様名',
                        'name' => 'specification',
                        'placeholder' => '仕様名を入力してください',
                        'required' => true,
                        'dl_class' => 'c-form3__active02',
                    ])
                    @include('front.elements.form.parts.error', ['name' => 'area'])
                    <dl class="c-form3__active02">
                        <dt>施工面積<span class="c-form3__label">必須</span></dt>
                        <dd>
                        <div id="area-target" class="c-form3__js-error"></div>
                            <p class="c-form3__input__text1">半角数字・半角記号で入力してください</p>
                            <div class="c-form3__wrap">
                                <div class="c-form3__input c-form3__input--num">
                                {{ Form::text('area', old('area'), ['placeholder' => '0000', 'id' => 'area', 'data-prompt-target' => 'area-target']) }}
                                </div>
                                <span class="c-form3__unit">㎡</span>
                            </div>
                        </dd>
                    </dl>
                    @include('front.elements.form.text', [
                        'label' => '足場条件',
                        'name' => 'condition',
                        'placeholder' => '足場条件を入力してください',
                        'required' => true,
                        'dl_class' => 'c-form3__active02',
                    ])
                    @include('front.elements.form.text', [
                        'label' => '施工時間',
                        'name' => 'construction_time',
                        'placeholder' => '施工時間を入力してください',
                        'required' => true,
                        'dl_class' => 'c-form3__active02',
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
                        'label' => '会社名',
                        'name' => 'company',
                        'placeholder' => '例）株式会社日本ペイント',
                        'required' => true,
                    ])
                    @include('front.elements.form.text', [
                        'label' => '部署名',
                        'name' => 'dept',
                        'placeholder' => '例）東京営業所',
                        'required' => true,
                    ])
                    @include('front.elements.form.select', [
                        'label' => '業種',
                        'name' => 'sector',
                        'options' => $sectors,
                        'placeholder' => '業種をお選びください',
                        'required' => true,
                    ])
                    @include('front.elements.form.text', [
                        'label' => 'eメール',
                        'name' => 'email',
                        'placeholder' => '例）taro@nipponpaint.co.jp',
                        'required' => true,
                        'comment' => '半角英数字で入力してください',
                        'annotation' => '※アドレスに誤りがあると返信ができません。<br class="sp-only">この場合は受信確認メールも届きませんのでご注意ください。',
                    ])
                    @include('front.elements.form.text', [
                        'label' => '郵便番号',
                        'name' => 'postal_code',
                        'placeholder' => '例）012-3456',
                        'required' => true,
                        'comment' => '半角数字で入力してください。<br>郵便番号を入力すると自動で住所が反映されます。',
                        'annotation' => '※海外のお客様は、000-0000 と入力してください。',
                        'class' => 'p-postal-code',
                    ])
                    @include('front.elements.form.select_text', [
                        'label' => 'ご住所',
                        'select_name' => 'pref',
                        'select_options' => $prefs,
                        'select_placeholder' => '都道府県をお選びください',
                        'select_class' => 'p-region-id',
                        'text_name' => 'address',
                        'text_placeholder' => '例）大阪市北区大淀2-1-2',
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
                    ])
                    @include('front.elements.form.textarea', [
                        'label' => '依頼内容',
                        'name' => 'inquiry',
                        'placeholder' => '依頼内容をご記入ください',
                        'required' => true,
                    ])
                    @include('front.elements.form.text', [
                        'label' => '工事名',
                        'name' => 'construction_name',
                        'placeholder' => '例）外装塗装',
                        'required' => false,
                    ])
                    @include('front.elements.form.select', [
                        'label' => '現場住所',
                        'name' => 'field_pref',
                        'options' => $prefs,
                        'placeholder' => '都道府県をお選びください',
                        'required' => true,
                    ])
                    @include('front.elements.form.text', [
                        'label' => '見積宛名',
                        'name' => 'estimation_company',
                        'placeholder' => '例）日本ペイント株式会社',
                        'required' => true,
                    ])
                    @include('front.elements.form.text', [
                        'label' => '見積日',
                        'name' => 'estimation_date',
                        'placeholder' => '例）2021年10月30日',
                        'required' => true,
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
