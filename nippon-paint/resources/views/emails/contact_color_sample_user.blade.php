<p>お問い合わせありがとうございます。</p>

<br>

<p>お名前: {{ $contacts->name }}</p>
<p>よみがな: {{ $contacts->yomigana }}</p>
@if (!empty($contacts->company))
    <p>会社名: {{ $contacts->company }}</p>
@endif
@if (!empty($contacts->dept))
    <p>部署名: {{ $contacts->dept }}</p>
@endif
<p>業種: {{ $contacts->sector }}</p>
<p>eメール: {{ $contacts->email }}</p>
<p>郵便番号: {{ $contacts->postal_code }}</p>
<p>住所: {{ $contacts->pref }}{{ $contacts->address }}</p>
<p>電話番号: {{ $contacts->phone }}</p>

<br>

<p>塗料に関する情報をどのような方法で入手されますか？（複数回答可）</p>
<p>1.専門誌</p>
@if (!empty($contacts->pro_journal_str))
    <p>{{ $contacts->pro_journal_str }}</p>
@endif
@if (!empty($contacts->pro_journal_text))
    <p>{{ $contacts->pro_journal_text }}</p>
@endif
@if (empty($contacts->pro_journal_str) && empty($contacts->pro_journal_text))
    <p>ご記入なし</p>
@endif

<p>2.ホームページ</p>
@if (!empty($contacts->homepage_str))
    <p>{{ $contacts->homepage_str }}</p>
@endif
@if (!empty($contacts->homepage_text))
    <p>{{ $contacts->homepage_text }}</p>
@endif
@if (empty($contacts->homepage_str) && empty($contacts->homepage_text))
    <p>ご記入なし</p>
@endif

<p>3.上記以外の方法</p>
@if (!empty($contacts->other_str))
    <p>{{ $contacts->other_str }}</p>
@endif
@if (!empty($contacts->other_text))
    <p>{{ $contacts->other_text }}</p>
@endif
@if (empty($contacts->other_str) && empty($contacts->other_text))
    <p>ご記入なし</p>
@endif

<br>

<p>お客さまの携わる主な工事内容を教えて下さい。（複数回答可）</p>
@if (!empty($contacts->construction_str))
    <p>{{ $contacts->construction_str }}</p>
@endif
@if (!empty($contacts->construction_text))
    <p>{{ $contacts->construction_text }}</p>
@endif
@if (empty($contacts->construction_str) && empty($contacts->construction_text))
    <p>ご記入なし</p>
@endif
