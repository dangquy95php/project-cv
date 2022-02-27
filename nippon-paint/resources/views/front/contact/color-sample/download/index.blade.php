<html lang="ja">
<head>
    <title>データ - 見本帳請求データCSVダウンロード</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
</head>
<body>
<div class="d-flex align-items-center justify-content-center" style="padding-top: 50px">
    <h1 class="first">見本帳請求データCSVダウンロード</h1>
</div>
<div class="d-flex align-items-center justify-content-center" style="padding-top: 20px">
    <input type="button" class="btn btn-outline-primary mr-2" value="今日のお問い合わせ分"
           onclick="location.href='{{ url('contact/color-sample/download-Lrz1cuaKI34mw44O7sEnqS52UPzFxwJ0/?period=today') }}'">
    <input type="button" class="btn btn-outline-primary mr-2" value="今月のお問い合わせ分"
           onclick="location.href='{{ url('contact/color-sample/download-Lrz1cuaKI34mw44O7sEnqS52UPzFxwJ0/?period=this_month') }}'">
    <input type="button" class="btn btn-outline-primary" value="先月のお問い合わせ分"
           onclick="location.href='{{ url('contact/color-sample/download-Lrz1cuaKI34mw44O7sEnqS52UPzFxwJ0/?period=prev_month') }}'">
</div>
</body>
</html>
