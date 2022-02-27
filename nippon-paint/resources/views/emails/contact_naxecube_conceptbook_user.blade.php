<p>お問い合わせありがとうございます。</p>

@if (!empty($contacts->sector))
    <p>業種: {{ $contacts->sector }}</p>
@endif
<p>会社名: {{ $contacts->company }}</p>
@if (!empty($contacts->dept))
    <p>部署名: {{ $contacts->dept }}</p>
@endif
@if (!empty($contacts->post))
    <p>役職: {{ $contacts->post}}</p>
@endif
<p>お名前: {{ $contacts->name }}</p>
<p>よみがな: {{ $contacts->yomigana }}</p>
<p>eメール: {{ $contacts->email }}</p>
<p>郵便番号: {{ $contacts->postal_code }}</p>
<p>ご住所: {{ $contacts->pref }}{{ $contacts->address }}</p>
<p>お電話: {{ $contacts->phone }}</p>
<p>詳しい説明: {{ $contacts->description }}</p>
@if (!empty($contacts->etc_inquiry))
    <p>その他お問い合わせ: {{ $contacts->etc_inquiry }}</p>
@endif
