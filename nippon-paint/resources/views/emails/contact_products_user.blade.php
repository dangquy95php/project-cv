<p>お問い合わせありがとうございます。</p>

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
<p>お問い合わせ内容: {{ $contacts->inquiry }}</p>
<p>具体的な内容: {{ $contacts->inquiry_body }}</p>
