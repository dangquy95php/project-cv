<?php


//default
$title = "";
$description = "";
$keyword = "";
$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp.png";


if ($pageid == "customerSupport") {
    $title = "サポート｜勤怠管理、労務管理システムのアマノ";
    $description = "アマノでは、お客様が安心してシステムをお使いいただけるよう、お得で充実した保守サービスをご用意しています。設定変更から部品修理まで、アマノのトータル保守サービスをご利用ください。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp.png";
} 
elseif ($pageid == "strengths") {
    $title = "アマノの強み";
    $description = "利用ユーザー約1,500万人、勤怠管理と向き合い90年。アマノは国産第一号のタイムレコーダーを製造してから現在まで、時代の変化に合わせた勤怠管理システムを提供し続けてきたパイオニアです。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp.png";
} 
elseif ($pageid == "product") {
    $title = "勤怠管理、労務管理システムのアマノ";
    $description = "アマノは勤怠管理システム「TimePro(タイムプロ)シリーズ」をはじめとしたバックオフィス業務に役立つ製品を多数ラインナップ。人事部門のDX促進に貢献します。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp.png";
} 
elseif ($pageid == "product-top") {
    $title = "「勤怠管理・労務管理」製品ラインナップ｜アマノ";
    $description = "アマノでは勤怠管理システム、シフト作成支援サービス、人事届け出サービス、タイムレコーダー、入退室管理、人事・給与管理、会計管理において豊富な製品を揃えています。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp.png";
} 
elseif ($pageid == "clouza") {
    $title = "【30日間無料体験】勤怠管理サービス「CLOUZA」｜アマノ";
    $description = "CLOUZA（クラウザ）はシンプルかつ分かりやすい操作で好評なクラウド勤怠管理システムです。初期費用・基本料金がないから、少人数でも割高になりません。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_clouza.png";
} 
elseif ($pageid == "cyberxeed") {
    $title = "勤怠・人事・給与クラウドパッケージ「CYBER XEED」｜アマノ";
    $description = "CYBER XEED（サイバーエクシード）は、就業・人事・給与データを一元管理することで、シームレスなデータ連携を実現。人事・総務部門の業務負担を軽減し、戦略的人事活動をサポートします";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_cyber_xeed.png.png";
} 
elseif ($pageid == "handsfree") {
    $title = "ハンズフリー入退場管理・在場管理システムならアマノ";
    $description = "入退場と在場管理にまつわる「安全」「安心」「コスト」の課題をハンズフリーでスマートに解決します。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_hands-free.png.png";
} 
elseif ($pageid == "ic_card_authentication") {
    $title = "非接触ICカード認証方式のシステムタイムレコーダーならアマノ";
    $description = "ICカードをかざすだけのカンタン運用ができるシステムタイムレコーダー。他システムで利用しているICカードをそのまま活用出来ます。扉の開閉と同時に出勤、退勤時刻も記録する、ドアセキュリティとの併用運用も可能です。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_ic-card.png.png";
} 
elseif ($pageid == "ic-card") {
    $title = "ICカード社員証の作成ならアマノ ";
    $description = "お客様の自由なデザインで社員証/職員証/身分証などを1枚から作成できます。デザインのアドバイスからサンプルカードの作成、システムの認証まで当社の営業がサポートします。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_ic_card_authentication.png";
} 
elseif ($pageid == "real-time-monitoring") {
    $title = "リアルタイム監視の入退室管理ならアマノ";
    $description = "リアルタイム通信で充実のアクセスコントロールを実現した入退室管理ソリューション。豊富な認証方法と充実したセキュリティ制御機能でニーズにあった最適な運用を可能にします。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_real-time-monitoring.png.png";
} 
elseif ($pageid == "system-timeclock") {
    $title = "簡易認証の入退室管理ならアマノ ";
    $description = "1ドアから導入でき追加増設も簡単な入退室管理リーダーです。ログの受信、遠隔解錠コマンドの送信でLAN接続やモデム通信など各種情報インフラにも対応し、入室管理+タイムレコーダーの組み合わせで出退勤管理も可能。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp.png";
} 
elseif ($pageid == "biometrics") {
    $title = "生体認証方式のシステムタイムレコーダーならアマノ";
    $description = "指整脈認証でなりすまし打刻防止を実現したシステムタイムレコーダー。指内部の静脈パターンを読み取るため、指表面の変化（肌荒れ・むくみ・乾燥や濡れ）に影響されず、安定した高精度の生体認証が可能です。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_biometrics_authentication.png.png";
} 
elseif ($pageid == "timecard") {
    $title = "紙カード方式のシステムタイムレコーダーならアマノ";
    $description = "紙のタイムカードに時刻を記録しながら、出退勤データをネットワーク経由で打刻データを取得可能です。使い慣れた紙カードを使いながら、勤怠管理をシステム化できます。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_system-timeclock.png.png";
} 
elseif ($pageid == "timepronx") {
    $title = "勤怠・給与・人事をこれ一つで「TimePro-NX」｜アマノ";
    $description = "TimePro-NX（タイムプロエヌエックス）は、就業・給与・人事・セキュリティシステムを1つのシステムに集約した統合型人事労務パッケージです。1つのシステムで、各データをシームレスに連携できます。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_timepro-nx.png.png";
} 
elseif ($pageid == "timeproVG") {
    $title = "勤怠管理システムならアマノ「TimePro-VG」";
    $description = "TimePro-VG（タイムプロブイジー）はオンプレミス、クラウドどちらにも対応した多様な働き方を実現できる勤怠管理システムです。基本的な計算はもちろん、法令違反のチェック、見込み残業のシミュレーションなど、多角的なアラートで労務リスクから企業を守ります。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_timepro-vg.png.png";
} 
elseif ($pageid == "timeproVGzeem") {
    $title = "勤怠管理システムに人事・給与・会計を統合「ZeeM」｜アマノ";
    $description = "TimePro-VG by ZeeM（タイムプロブイジーバイジーム）は、アマノの勤怠管理システムとシームレスに連携可能な人事・給与・会計の統合パッケージです。バックオフィス業務が一元管理でき、多様化する人材マネジメントへも適応しています。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_timepro-vg_zeem.png.png";
} 
elseif ($pageid == "VGCloud") {
    $title = "クラウド勤怠管理システムならアマノ「VG CLOUD」";
    $description = "VG CLOUD（ブイジークラウド）はお求めやすい価格で利用できるハイエンドなクラウド勤怠管理システムです。勤務データの自動集計はもちろん、法令違反のチェック、見込み残業のシミュレーションなど、多角的なアラートで労務リスクから企業を守ります。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/product/ogp_vg_cloud.png.png";
}
elseif ($pageid == "product_case_list") {
    $title = "勤怠管理システムの導入事例｜アマノ";
    $description = "アマノのソリューションをご導入いただいた企業様を紹介します。企業規模・業種を問わず多様なお客様にご利用いただいております。勤怠管理システムから入退室管理のセキュリティまで幅広くバックオフィスを支援いたします。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp.png";
}
elseif ($pageid == "seminar_2017") {
    $title = "【無料セミナー】弁護士が解説 実録！労務問題訴訟ファイル 〜勤怠管理が大切な本当の理由とは？〜";
    $description = "2021年7月15日開催の無料webセミナーのご案内です。勤怠管理が元で発生した労務問題を実例に、労働時間管理について解説いたします。今の働き方管理について、少しでも不安に感じている方は確認も兼ねてぜひご視聴ください。";
	$ogp_img = "";
}
elseif ($pageid == "movie") {
    $title = "【2021年7月15日開催】AMANOオンラインセミナーアーカイブ動画『弁護士は見た！労務問題訴訟ファイル 〜勤怠管理が大切な本当の理由とは？〜』";
    $description = "働き方改革の本格施行から３年目。労働時間管理を含めた労務管理に対する労働者や社会の目はますます厳しくなっています。今回は使用者側労務専門弁護士として活躍される岸田鑑彦先生にご登壇いただき、企業が陥りがちな労務トラブルや、働き方改革時代に求められる労働時間管理について解説します。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp.png";
} 
elseif ($pageid == "beep") {
    $title = "シフト表の自動作成なら「e-AMANO シフト作成支援サービス」";
    $description = "スタッフの能力・希望を考慮しシフトを自動作成！ 従業員はスマホのアプリから希望シフトの登録・変更依頼が可能。人員不足の場合はシステムから自動で応援要請を通知することで管理者の調整作業をお手伝いします。";
	$ogp_img = "https://www.tis.amano.co.jp/assets/img/common/ogp_e-amano-shift.png";
} 
elseif ($pageid == "tayorou-top") {
    $title = "タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」";
    $description = "タヨロウ（バックオフィスを支援する「頼れる労務ONLINE」）は勤怠管理のパイオニアであるアマノが運営するお役立ち情報メディアです。人事・労務の最前線情報をはじめ、効率化・ノウハウから法律や助成金まで労務全般の課題解決に役立つコンテンツを随時発信してまいります。";
} 
elseif ($pageid == "tayorou-download") {
    $title = "お役立ちコンテンツダウンロード｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」";
    $description = "お役立ちコンテンツダウンロードの一覧ページです。";
} 


// if ($pageid) {
//     $title .= "";
// }

?>

<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keyword; ?>">
<meta property="og:url" content="<?php echo(empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $description; ?>" />
<?php if ($pageid == "tayorou-hr_news" || $pageid == "tayorou-tool_guide" || $pageid == "tayorou-seminar" || $pageid == "tayorou-gyomu_kaizen" || $pageid == "tayorou-faq_column" || $pageid == "tayorou-glossary" || $pageid == "tayorou-hr_news" ) { ?>
<meta property="og:site_name" content="タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」" />
<?php } else { ?>
<meta property="og:site_name" content="人事・労務のためのHR改善ナビ By AMANO" />
<?php } ?>
<meta property="og:image" content="<?php echo $ogp_img; ?>" />
