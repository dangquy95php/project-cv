<x-header>
    <x-slot name="title">重防食用塗料積算お見積りフォーム｜日本ペイント株式会社</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">contactLConfirm</x-slot>
    <x-slot name="unique">contact_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/contact/large-estimation/confirm/</x-slot>
</x-header>

<main class="p-contact_large-confirm">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
                <li><span>重防食用塗料積算見積フォーム</span></li>
            </ul>
        </div>
    </div>

    <section class="p-contact_large-confirm1">
        <div class="l-cont2">
            <h1 class="c-title9"><span class="c-title9__text">重防食用塗料積算見積フォーム</span></h1>
            <ul class="c-nav4">
                <li class="c-nav4__item"><a href="">
                        <p class="c-nav4__num">01</p>
                        <p class="c-nav4__text">入力</p>
                    </a></li>
                <li class="c-nav4__item is-active"><a href="">
                        <p class="c-nav4__num">02</p>
                        <p class="c-nav4__text">確認</p>
                    </a></li>
                <li class="c-nav4__item"><a href="">
                        <p class="c-nav4__num">03</p>
                        <p class="c-nav4__text">完了</p>
                    </a></li>
            </ul>
            <div class="c-table c-table__style2 c-table__confirm">
                <table>
                    <tbody>
                        <tr>
                            <th>対象</th>
                            <td>{{ $contacts->target_str }}</td>
                        </tr>
                        @if ($contacts->target === '1')
                        <tr>
                            <th>耐火時間</th>
                            <td>{{ $contacts->fireproof_time }}</td>
                        </tr>
                        @endif
                        @if ($contacts->target === '2')
                        <tr>
                            <th>仕様名</th>
                            <td>{{ $contacts->specification }}</td>
                        </tr>
                        @endif
                        @if ($contacts->target === '2')
                        <tr>
                            <th>施工面積</th>
                            <td>{{ $contacts->area }}㎡</td>
                        </tr>
                        @endif
                        @if ($contacts->target === '2')
                        <tr>
                            <th>足場条件</th>
                            <td>{{ $contacts->condition }}</td>
                        </tr>
                        @endif
                        @if ($contacts->target === '2')
                        <tr>
                            <th>施工時間</th>
                            <td>{{ $contacts->construction_time }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>お名前</th>
                            <td>{{ $contacts->name }}</td>
                        </tr>
                        <tr>
                            <th>よみがな</th>
                            <td>{{ $contacts->yomigana }}</td>
                        </tr>
                        <tr>
                            <th>会社名</th>
                            <td>{{ $contacts->company }}</td>
                        </tr>
                        <tr>
                            <th>部署名</th>
                            <td>{{ $contacts->dept }}</td>
                        </tr>
                        <tr>
                            <th>業種</th>
                            <td>{{ $contacts->sector }}</td>
                        </tr>
                        <tr>
                            <th>eメール</th>
                            <td>{{ $contacts->email }}</td>
                        </tr>
                        <tr>
                            <th>郵便番号</th>
                            <td>{{ $contacts->postal_code }}</td>
                        </tr>
                        <tr>
                            <th>ご住所</th>
                            <td>{{ $contacts->pref }}<br>{{ $contacts->address }}</td>
                        </tr>
                        <tr>
                            <th>お電話</th>
                            <td>{{ $contacts->phone }}</td>
                        </tr>
                        <tr>
                            <th>依頼内容</th>
                            <td>{{ $contacts->inquiry }}</td>
                        </tr>
                        @if (!empty($contacts->construction_name))
                        <tr>
                            <th>工事名</th>
                            <td>{{ $contacts->construction_name }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>現場住所</th>
                            <td>{{ $contacts->field_pref }}</td>
                        </tr>
                        <tr>
                            <th>見積宛名</th>
                            <td>{{ $contacts->estimation_company }}</td>
                        </tr>
                        <tr>
                            <th>見積日</th>
                            <td>{{ $contacts->estimation_date }}</td>
                        </tr>
                    </tbody>
                </table>
                {{ Form::open(['action' => 'Front\ContactLargeEstimationController@store', 'id' => 'post-input']) }}
                <div class="u-center">
                    {{ Form::submit('内容を変更する', ['name' => 'back', 'class' => 'c-btn-confirm']) }}
                    {{ Form::submit('送信する', ['name' => 'send', 'class' => 'c-btn-confirm c-btn-confirm__style1']) }}
                    <div class="c-btn-confirm__img">
                        <img src="/images/common/form_img.svg">
                    </div>
                </div>
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

<x-footer></x-footer>
