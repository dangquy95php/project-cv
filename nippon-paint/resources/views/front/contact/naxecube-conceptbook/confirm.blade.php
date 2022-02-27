<x-header>
    <x-slot name="title">nax E-cube WB 水性システムコンセプトブックダウンロードフォーム｜日本ペイント株式会社</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">contactNaxConfirm</x-slot>
    <x-slot name="unique">contact_naxe</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/contact/naxecube-conceptbook/comfirm/</x-slot>
</x-header>

<main class="p-contact_naxe-confirm">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
                <li><span>nax E-cube WB 水性システムコンセプトブックダウンロードフォーム</span></li>
            </ul>
        </div>
    </div>
    <section class="p-contact_naxe-confirm1">
        <div class="l-cont2">
            <h1 class="c-title9"><span class="c-title9__text">nax E-cube WB 水性システム コンセプトブックダウンロードフォーム</span></h1>
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
                        @if (!empty($contacts->sector))
                        <tr>
                            <th>業種</th>
                            <td>{{ $contacts->sector }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>会社名（団体名）</th>
                            <td>{{ $contacts->company }}</td>
                        </tr>
                        @if (!empty($contacts->dept))
                        <tr>
                            <th>部署名</th>
                            <td>{{ $contacts->dept }}</td>
                        </tr>
                        @endif
                        @if (!empty($contacts->post))
                        <tr>
                            <th>役職</th>
                            <td>{{ $contacts->post}}</td>
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
                            <th>詳しい説明</th>
                            <td>{{ $contacts->description }}</td>
                        </tr>
                        @if (!empty($contacts->etc_inquiry))
                        <tr>
                            <th>その他お問い合わせ</th>
                            <td>{{ $contacts->etc_inquiry }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ Form::open(['action' => 'Front\ContactNaxecubeConceptbookController@store', 'id' => 'post-input']) }}
                <div class="u-center">
                    {{ Form::submit('内容を変更する', ['name' => 'back', 'class' => 'c-btn-confirm']) }}
                    {{ Form::submit('送信する', ['name' => 'send', 'class' => 'c-btn-confirm c-btn-confirm__style1']) }}
                    <div class="c-btn-confirm__img">
                        <img src="/images/common/form_img.svg">
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>

</main>
<x-footer></x-footer>
