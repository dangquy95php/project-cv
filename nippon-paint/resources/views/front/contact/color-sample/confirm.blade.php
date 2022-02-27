<x-header>
    <x-slot name="title">色見本帳お申し込みフォーム｜日本ペイント株式会社</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">colorConfirm</x-slot>
    <x-slot name="unique">contact_color</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/contact/color-sample/confirm/</x-slot>
</x-header>

<main class="p-contact_color-confirm">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
                <li><span>色見本帳お申し込みフォーム</span></li>
            </ul>
        </div>
    </div>

    <section class="p-contact_color-confirm1">
        <div class="l-cont2">
            <h1 class="c-title9"><span class="c-title9__text">色見本帳お申し込みフォーム</span></h1>
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
                            <th>お名前</th>
                            <td>{{ $contacts->name }}</td>
                        </tr>
                        <tr>
                            <th>よみがな</th>
                            <td>{{ $contacts->yomigana }}</td>
                        </tr>
                        @if (!empty($contacts->company))
                        <tr>
                            <th>会社名</th>
                            <td>{{ $contacts->company }}</td>
                        </tr>
                        @endif
                        @if (!empty($contacts->dept))
                        <tr>
                            <th>部署名</th>
                            <td>{{ $contacts->dept }}</td>
                        </tr>
                        @endif
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
                            <th>塗料に関する情報をどのような方法で入手されますか？（複数回答可）</th>
                            <td>
                                <p class="c-table__txt"><span>01.</span>専門誌</p>
                                @if (!empty($contacts->pro_journal_str))
                                <p>{{ $contacts->pro_journal_str }}</p>
                                @endif
                                @if (!empty($contacts->pro_journal_text))
                                <p>{{ $contacts->pro_journal_text }}</p>
                                @endif
                                @if (empty($contacts->pro_journal_str) && empty($contacts->pro_journal_text))
                                <p>ご記入なし</p>
                                @endif

                                <br>

                                <p class="c-table__txt"><span>02.</span>ホームページ</p>
                                @if (!empty($contacts->homepage_str))
                                <p>{{ $contacts->homepage_str }}</p>
                                @endif
                                @if (!empty($contacts->homepage_text))
                                <p>{{ $contacts->homepage_text }}</p>
                                @endif
                                @if (empty($contacts->homepage_str) && empty($contacts->homepage_text))
                                <p>ご記入なし</p>
                                @endif

                                <br>

                                <p class="c-table__txt"><span>03.</span>上記以外の方法</p>
                                @if (!empty($contacts->other_str))
                                <p>{{ $contacts->other_str }}</p>
                                @endif
                                @if (!empty($contacts->other_text))
                                <p>{{ $contacts->other_text }}</p>
                                @endif
                                @if (empty($contacts->other_str) && empty($contacts->other_text))
                                <p>ご記入なし</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>お客さまの携わる主な工事内容を教えて下さい。（複数回答可）</th>
                            <td>
                                @if (!empty($contacts->construction_str))
                                <p>{{ $contacts->construction_str }}</p>
                                @endif
                                @if (!empty($contacts->construction_text))
                                <p>{{ $contacts->construction_text }}</p>
                                @endif
                                @if (empty($contacts->construction_str) && empty($contacts->construction_text))
                                <p>ご記入なし</p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{ Form::open(['action' => 'Front\ContactColorSampleController@store', 'id' => 'post-input']) }}
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
