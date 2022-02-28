<?php


//default
$title = "";
$description = "";
$keyword = "";

/* ================================================
// WP meta
================================================ */
if (is_tag()) {
    $title = esc_html(get_queried_object()->name);
    $description = esc_html(get_queried_object()->name)."の一覧ページです。";
} elseif (is_category()) {
    $title = esc_html(get_queried_object()->name);
    $description = esc_html(get_queried_object()->name)."の一覧ページです。";
} elseif (is_post_type_archive(array('download', 'product_list', 'hr_news', 'faq_column', 'glossary', 'seminar', 'tool_guide', 'gyomu_kaizen', 'news-topics', 'writer'))) {
    $title = esc_html(get_post_type_object(get_post_type())->label);
    $description = esc_html(get_post_type_object(get_post_type())->label)."の一覧ページです。";
} elseif (is_post_type_archive('product_faq')) {
    $title = "よくあるご質問｜勤怠管理、労務管理システムのアマノ";
    $description = "勤怠管理システムTimeProシリーズをはじめとしたアマノ製品全般のよくあるご質問とその回答をご紹介します。";
} elseif (is_post_type_archive('product_case')) {
    $title = "勤怠管理システムの導入事例｜アマノ";
    $description = "勤怠管理システム「TimePro(タイムプロ)シリーズ」の導入事例をご紹介。TimeProシリーズは出荷本数5万本以上、累計2万社以上に導入された勤怠管理のノウハウが凝縮させたシステムです。";
}

if ($pageid) {
    $title .= " | 人事・労務のためのHR改善ナビ By AMANO";
}

?>

<title><?php echo $title; ?></title>
<?php if(!is_single() && !is_home()) {?>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keyword; ?>">
<meta property="og:url" content="<?php echo(empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $description; ?>" />
<meta property="og:site_name" content="人事・労務のためのHR改善ナビ By AMANO" />
<meta property="og:image" content="https://www.tis.amano.co.jp/assets/img/common/ogp.png" />
<?php } ?>
