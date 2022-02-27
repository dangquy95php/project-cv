<p>お問い合わせがありました。</p>

<p>対象: {{ $contacts->target_str }}</p>
@if ($contacts->target === '1')
    <p>耐火時間: {{ $contacts->fireproof_time }}</p>
@endif
@if ($contacts->target === '2')
    <p>仕様名: {{ $contacts->specification }}</p>
@endif
@if ($contacts->target === '2')
    <p>施工面積: {{ $contacts->area }}㎡</p>
@endif
@if ($contacts->target === '2')
    <p>足場条件: {{ $contacts->condition }}</p>
@endif
@if ($contacts->target === '2')
    施工時間: {{ $contacts->construction_time }}
@endif
<p>お名前: {{ $contacts->name }}</p>
<p>よみがな: {{ $contacts->yomigana }}</p>
<p>会社名: {{ $contacts->company }}</p>
<p>部署名: {{ $contacts->dept }}</p>
<p>業種: {{ $contacts->sector }}</p>
<p>eメール: {{ $contacts->email }}</p>
<p>郵便番号: {{ $contacts->postal_code }}</p>
<p>住所: {{ $contacts->pref }}{{ $contacts->address }}</p>
<p>電話番号: {{ $contacts->phone }}</p>
<p>依頼内容: {{ $contacts->inquiry }}</p>
@if (!empty($contacts->construction_name))
    <p>工事名: {{ $contacts->construction_name }}</p>
@endif
<p>現場住所: {{ $contacts->field_pref }}</p>
<p>見積宛名: {{ $contacts->estimation_company }}</p>
<p>見積日: {{ $contacts->estimation_date }}</p>
