<?php ///////////////////////////////////////////
// $pageid、$pageclass
// for php
////////////////////////////////////////////////
$setcookie = false;
if (isset($pageid)) {
    if (
        $pageid == "product" ||
        $pageid == "product-top" ||
        $pageid == "biometrics" ||
        $pageid == "clouza" ||
        $pageid == "cyberxeed" ||
        $pageid == "handsfree" ||
        $pageid == "ic_card_authentication" ||
        $pageid == "ic-card" ||
        $pageid == "real-time-monitoring" ||
        $pageid == "system-timeclock" ||
        $pageid == "timecard" ||
        $pageid == "timepronx" ||
        $pageid == "timeproVG" ||
        $pageid == "timeproVGzeem" ||
        $pageid == "VGCloud" ||
        $pageid == "beep" ||
        $pageid == "strengths" ||
        $pageid == "customerSupport"||
        $pageid == "product_case_list"||
        $pageid == "redirect"
    ) {
        $pageclass = "product";
        setcookie('header_ref', $pageclass, 0, '/');
        $setcookie = true;
    } elseif ( $pageid == "movie" ) {
        $pageclass = "movie";
    } elseif (
        $pageid == "tayorou-top" ||
        $pageid == "tayorou-gyomu_kaizen" ||
        $pageid == "tayorou-tool_guide" ||
        $pageid == "tayorou-seminar" ||
        $pageid == "tayorou-hr_news" ||
        $pageid == "tayorou-glossary" ||
        $pageid == "tayorou-download" ||
        $pageid == "tayorou-faq_column" || 
        $pageid == "tayorou-tag"
    ) {
        $pageclass = "tayorou";
    }
}

////////////////////////////////////////////////
// $pageid、$pageclass
// for wordpress
////////////////////////////////////////////////
//if (!isset($pageclass) && function_exists('is_home')) {
if (!isset($pageid)) {
    if (
        is_home() ||

        // hr_news
        is_singular("hr_news") ||
        is_post_type_archive("hr_news") ||
        is_tax("hr_news_tag") ||

        // tool_guide
        is_singular("tool_guide") ||
        is_post_type_archive("tool_guide") ||
        is_tax("tool_guide_tag") ||

        // faq_column
        is_singular("faq_column") ||
        is_post_type_archive("faq_column") ||
        is_tax("faq_column_tag") ||

        // gyomu_kaizen
        is_singular("gyomu_kaizen") ||
        is_post_type_archive("gyomu_kaizen") ||
        is_tax("gyomu_kaizen_tag") ||

        // glossary
        is_singular("glossary") ||
        is_post_type_archive("glossary") ||
        is_tax("glossary_tag") ||

        //tag
        is_tag()

    ) {
        $pageclass = "media";
        setcookie('header_ref', $pageclass, 0, '/');
    } elseif (

        // news-topics
        is_singular("news-topics") ||
        is_post_type_archive("news-topics") ||
        is_tax("news-topics_cat") ||


        // product_case
        is_singular("product_case") ||
        is_post_type_archive("product_case") ||
        is_tax("product_case_tag") ||

        // product_faq
        is_singular("semiproduct_faqnar") ||
        is_post_type_archive("product_faq") ||

        // product_solutions
        is_singular("product_solutions") ||
        is_post_type_archive("product_solutions")

    ) {
        $pageclass = "product";
        if (!$setcookie) {
            setcookie('header_ref', $pageclass, 0, '/');
        }
    } elseif (
        // download
        is_singular("download") ||
        is_post_type_archive("download") ||
        is_tax("download_tag") ||

        // seminar
        is_singular("seminar") ||
        is_post_type_archive("seminar") ||
        is_tax("seminar_tag")
    ) {
        $pageclass = "media";
        if (isset($_COOKIE['header_ref'])) {
            $pageclass = $_COOKIE['header_ref'];
        }
    }
}
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width">
    <?php if($pageclass == "tayorou"): ?>
    <link rel="shortcut icon" href="/assets/img/tayorou/common/favicon.ico">
    <link rel="icon" href="/assets/img/tayorou/common/favicon_tayorou.svg" type="image/svg+xml" sizes="any">
    <link rel="apple-touch-icon" href="/assets/img/tayorou/common/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/img/tayorou/common/android-chrome-192x192.png">
    <?php else : ?>
    <link rel="shortcut icon" href="/assets/img/common/favicon.ico">
    <?php endif; ?>
    <?php //==========================================
    // noindex
    // ===============================================
    ?>

    <?php if (isset($pageid)) { if ($pageid == "redirect"){ ?>
    <meta name="robots" content="noindex , nofollow" />
    <?php } } ?>

    <?php //==========================================
    // Meta
    // ===============================================
    ?>

    <?php
    if (!isset($pageid)) {
        include('meta_wp.php');
    } else {
        include('meta.php');
    }
    ?>

    <?php //=========================================
    // Font
    //===============================================
    ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <?php //=========================================
    // CSS
    //===============================================
    ?>
    <link href="/assets/css/style.min.css?ver.20210601" rel="stylesheet">

    <?php //========================================
    // JS
    //===============================================
    ?>
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>

    <?php //=========================================
    // WPhead
    //===============================================
    ?>
    <?php if (function_exists('is_home')) {
        wp_head();
    }
    ?>

    <?php //=========================================
    // Gtag
    //===============================================
    ?>

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MKBC42C');
    </script>
    <!-- End Google Tag Manager -->

    <?php //==========================================
    // Meta refresh
    // ===============================================
    ?>
    <?php if (isset($redirectid)) { include('meta_refresh.php'); } ?>

</head>

<?php //=========================================
//body ページ別クラス追加
//===============================================
?>
<?php
$class = "";

if (!isset($pageid)) {
    //if (function_exists('is_home')) {
    if (is_page('top') || is_home()) {
        $class = "page-top";
    } elseif (is_page()) {
        $class = "page-" . get_page($page_id)->post_name;
    } elseif (is_archive()) {
        $class = "archive-" . get_post_type();
    } elseif (is_single()) {
        $class = "single";
        $class .= " single-" . get_post_type();
        $class .= " single-" . $post->post_name;
    } elseif (is_404()) {
        $class = "page-404";
    }
}

$class_ie = "";
$ua = $_SERVER['HTTP_USER_AGENT'];
if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
    $class_ie = " ie";
}

if (isset($pageid)) {
    $class .= "page-" . $pageid;
}
if (isset($pageclass)) {
    $class .= " u-" . $pageclass;
}


?>

<?php //=========================================
//wp-load
//===============================================
if (isset($pageid)) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/wp/wp-load.php');
}
?>

<?php //=========================================
// USER ID
//===============================================
$userName = "";
$userNameDisplayAll = "displayall";
if (is_user_logged_in()) {
    $user = wp_get_current_user();
    $userName = $user->user_login;
}
?>

<body id="pagetop" class="<?php echo $class; ?><?php echo $class_ie; ?>">

    <?php if ($userName) { ?>
    <!--
        $pageid:<?php echo $pageid; ?> /
        $userName:<?php echo $userName; ?> /
        -->
    <?php } ?>

    <?php //=========================================
    //Gtag noscript
    //===============================================
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKBC42C" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="wrapper">
        <?php if ($pageclass == "media" || $pageclass == "product") : ?>
        <header class="c-header">
            <div class="c-header1">
                <div class="c-header1__logo">
                    <?php if ($pageclass == "product") { ?>
                    <a href="/product/">
                        <img class="c-header1__logo__img pc-only" src="/assets/img/common/product_logo.svg" alt="勤怠管理で人事部門のDXを促進" />
                        <img class="c-header1__logo__img sp-only" src="/assets/img/common/product_logo_sp.svg" alt="勤怠管理で人事部門のDXを促進" />
                    </a>
                    <?php } else { ?>
                    <a href="/product/">
                        <img class="c-header1__logo__img pc-only" src="/assets/img/common/logo.svg" alt="AMANO 人事・労務担当者のソリューションサイト" />
                        <img class="c-header1__logo__img sp-only" src="/assets/img/common/logo_sp.svg" alt="AMANO 人事・労務担当者のソリューションサイト" />
                    </a>
                    <?php } ?>
                    <a class="c-header1__logo__bnt" href="https://www.amano.co.jp/" target="_blank">アマノコーポレートサイト</a>
                </div>
                <div class="c-header1__nav">
                    <ul class="c-header1__nav__link">
                        <li>
                            <a href="/" <?php if ($pageclass=="media" ) { echo 'class="is-active"' ; } ?>>お役立ち情報</a>
                        </li>
                        <li class="u-bg-none">
                            <a href="/product/" <?php if ($pageclass=="product" ) { echo 'class="is-active"' ; } ?>>製品情報</a>
                        </li>
                        <li class="u-window2 pc-only">
                            <a href="https://www.tis.amano.co.jp/atms/atms.html" target="_blank" <?php if ($pageclass=="support" ) { echo 'class="is-active"' ; } ?>>保守契約者専用ページ</a>
                        </li>
                    </ul>
                    <div class="c-header__search">
                        <form action="//www.amano.co.jp/search.html" method="GET" id="cse-search-box">
                            <input type="hidden" name="charset" value="UTF-8">
                            <input type="text" name="q" maxlength="255" class="srch-text" placeholder="キーワードを入力してください">
                            <input type="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
            <nav class="c-header2">
                <?php if ($pageclass == "media") { ?>
                <h1 class="c-header2__logo">
                    <a href="/">
                        <img src="/assets/img/common/media.svg" alt="人事・労務のためのHR改善ナビBy AMANO" />
                    </a>
                </h1>
                <?php } ?>
                <?php if ($pageclass == "product") { ?>
                <h1 class="c-header2__logo">
                    <a class="c-header2__txt" href="/product/">製品情報</a>
                </h1>
                <?php } ?>
                <div class="c-header2__nav">
                    <ul class="c-header2__nav__link">
                        <?php if ($pageclass == "media") { ?>
                            <?php if ($userName == $userNameDisplayAll) { ?>
                            <li <?php if ((function_exists('is_home')) && (is_singular("tool_guide") || is_post_type_archive("tool_guide") || is_tax("tool_guide_tag"))) { echo 'class="is-active"' ; } ?>>
                                <a href="/tool_guide">ツールガイド</a>
                            </li>
                            <?php } ?>
                            <li <?php if ((function_exists('is_home')) && (is_singular("gyomu_kaizen") || is_post_type_archive("gyomu_kaizen") || is_tax("gyomu_kaizen_tag"))) { echo 'class="is-active"' ; } ?>>
                                <a href="/gyomu_kaizen">業務改善ガイド</a>
                            </li>
                            <li <?php if ((function_exists('is_home')) && (is_singular("faq_column") || is_post_type_archive("faq_column") || is_tax("faq_column_tag"))) { echo 'class="is-active"' ; } ?>>
                                <a href="/faq_column">なんでもQ&A</a>
                            </li>
                            <li <?php if ((function_exists('is_home')) && (is_singular("hr_news") || is_post_type_archive("hr_news") || is_tax("hr_news_tag"))) { echo 'class="is-active"' ; } ?>>
                                <a href="/hr_news">HR News</a>
                            </li>
                            <li <?php if ((function_exists('is_home')) && (is_singular("glossary") || is_post_type_archive("glossary") || is_tax("glossary_tag"))) { echo 'class="is-active"' ; } ?>>
                                <a href="/glossary">用語集</a>
                            </li>
                        <?php } ?>
                        <?php if ($pageclass == "product") { ?>
                            <li <?php if ($pageid=="strengths" ) { echo 'class="is-active"' ; } ?>>
                                <a href="/strengths/">アマノの強み</a>
                            </li>
                            <li <?php if ($pageid=="timeproVG" || $pageid=="beep" || $pageid=="product-detail" || $pageid=="product-top" || $pageid=="product_faq" || $pageid=="clouza" || $pageid=="biometrics" || $pageid=="cyberxeed" || $pageid=="ic_card_authentication" || $pageid=="handsfree" || $pageid=="timecard" || $pageid=="real-time-monitoring" || $pageid=="system-timeclock" || $pageid=="ic-card" || $pageid=="timeproVGzeem" || $pageid=="VGCloud" || $pageid=="timepronx" ) { echo 'class="is-active"' ; } ?>>
                                <a  href="/product/top/">製品ラインナップ</a>
                                <div class="subnav">
                                    <div class="subnav__cont">
                                        <div class="subnav__wrap">
                                            <div class="subnav__box box1">
                                                <p class="subnav__ttl">HRソリューション製品</p>
                                                <div class="subnav__inner">
                                                    <ul class="subnav__list1">
                                                        <li class="subnav__item">
                                                            <a href="/product/top/#id02">システムタイムレコーダー</a>
                                                        </li>
                                                        <li class="subnav__item">
                                                            <a href="/product/ic-card/">ICカード発行</a>
                                                        </li>
                                                        <li class="subnav__item">
                                                            <a href="/product/top/#id03">セキュリティ（入退室管理）</a>
                                                        </li>
                                                        <li class="subnav__item">
                                                            <a href="/product/top/#id05">人事・給与・会計</a>
                                                        </li>
                                                    </ul>
                                                    <div class="subnav__box2">
                                                        <p class="subnav__ttl2">e-AMANOシリーズ</p>
                                                        <ul class="subnav__list2">
                                                            <li class="subnav__item2 is-news">
                                                                <a href="/product/e-amano_shift/">
                                                                    <figure class="icon">
                                                                        <img src="/assets/img/common/icon/icon69.svg" alt="" class="off">
                                                                        <img src="/assets/img/common/icon/icon69-white.svg" alt="" class="on">
                                                                    </figure>
                                                                    <span class="txt">シフト作成支援サービス<br>（シフト管理）</span>
                                                                </a>
                                                            </li>
                                                            <li class="subnav__item2">
                                                                <a href="/e-amano/">
                                                                    <figure class="icon">
                                                                        <img src="/assets/img/common/icon/icon70.svg" alt="" class="off">
                                                                        <img src="/assets/img/common/icon/icon70-white.svg" alt="" class="on">
                                                                    </figure>
                                                                    <span class="txt">人事届出サービス<br>（労務管理）</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="subnav__box box2">
                                                <p class="subnav__ttl">勤怠管理システム</p>
                                                <div class="subnav__inner">
                                                    <ul class="subnav__list3">
                                                        <li class="subnav__item3">
                                                            <a href="/product/timepro-vg/">
                                                                <div class="wrap">
                                                                    <figure class="logo">
                                                                        <img src="/assets/img/common/timepro.svg" alt="">
                                                                    </figure>
                                                                    <div class="info">
                                                                        <span class="txt">あらゆる働き方を支援する<br>勤怠管理システムの<br>ハイエンドモデル</span>
                                                                    </div>
                                                                </div>
                                                                <p class="number">300名～30,000名規模向け</p>
                                                            </a>
                                                        </li>
                                                        <li class="subnav__item3">
                                                            <a href="/product/vg_cloud/">
                                                                <div class="wrap">
                                                                    <figure class="logo">
                                                                        <img src="/assets/img/common/cloud.svg" alt="">
                                                                    </figure>
                                                                    <div class="info">
                                                                        <span class="txt">ハイエンドモデルの<br>TimePro-VGを<br>クラウドサービスで</span>
                                                                    </div>
                                                                </div>
                                                                <p class="number">50名～500名規模向け</p>
                                                            </a>
                                                        </li>
                                                        <li class="subnav__item3">
                                                            <a href="/product/timepro-nx/">
                                                                <div class="wrap">
                                                                    <figure class="logo">
                                                                        <img src="/assets/img/common/timepro-nx.svg" alt="">
                                                                    </figure>
                                                                    <div class="info">
                                                                        <span class="txt">「就業、人事、給与、<br>セキュリティ」<br>トータルパッケージ</span>
                                                                    </div>
                                                                </div>
                                                                <p class="number">～500名規模向け</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="subnav__action">
                                                        <a href="/product/top/" class="subnav__btn btn1">すべての製品</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="solutions<?php if ($pageid == " psolutions") { echo ' is-active' ; } ?>">
                                <a href="/product_solutions/manufacturing/">お悩み改善</a>
                                <div class="subnav">
                                    <div class="subnav__cont">
                                        <div class="subnav__wrap">
                                            <p class="subnav__ttl">【業種別】勤怠管理のお悩み改善</p>
                                            <ul class="subnav__list4">
                                                <li class="subnav__item4">
                                                    <a href="/product_solutions/manufacturing/">
                                                        <figure class="icon">
                                                            <img src="/assets/img/common/icon/icon63.svg" alt="" class="off">
                                                            <img src="/assets/img/common/icon/icon63-white.svg" alt="" class="on">
                                                        </figure>
                                                        <span class="txt">製造業</span>
                                                    </a>
                                                </li>
                                                <li class="subnav__item4">
                                                    <a href="/product_solutions/hospital/">
                                                        <figure class="icon">
                                                            <img src="/assets/img/common/icon/icon67.svg" alt="" class="off">
                                                            <img src="/assets/img/common/icon/icon67-white.svg" alt="" class="on">
                                                        </figure>
                                                        <span class="txt">病院</span>
                                                    </a>
                                                </li>
                                                <li class="subnav__item4">
                                                    <a href="/product_solutions/public-organization/">
                                                        <figure class="icon">
                                                            <img src="/assets/img/common/icon/icon68.svg" alt="" class="off">
                                                            <img src="/assets/img/common/icon/icon68-white.svg" alt="" class="on">
                                                        </figure>
                                                        <span class="txt">行政・自治体</span>
                                                    </a>
                                                </li>
                                                <li class="subnav__item4">
                                                    <a href="/product_solutions/retail/">
                                                        <figure class="icon">
                                                            <img src="/assets/img/common/icon/icon71.svg" alt="" class="off">
                                                            <img src="/assets/img/common/icon/icon71-white.svg" alt="" class="on">
                                                        </figure>
                                                        <span class="txt">小売業</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="case" <?php if ((function_exists('is_home')) && (is_singular("product_case") || is_post_type_archive("product_case") || is_tax("product_case_tag"))) { echo 'class="is-active"' ; } ?>>
                                <a href="/product_case">導入事例</a>
                                <div class="subnav">
                                    <div class="subnav__cont">
                                        <div class="subnav__wrap">
                                            <ul class="subnav__list3">
                                                <li class="subnav__item3">
                                                    <a href="/product_case/customer_03/">
                                                        <div class="wrap">
                                                            <figure class="logo">
                                                                <img src="/assets/img/common/logo-header1.png" alt="">
                                                            </figure>
                                                            <div class="info">
                                                                <span class="ttl">KNT-CTホールディングス<br>株式会社 様</span>
                                                                <span class="txt">各種申請書のシステム化による<br>書類管理業務の廃止と紙コストの削減</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="subnav__item3">
                                                    <a href="/product_case/customer_01/">
                                                        <div class="wrap">
                                                            <figure class="logo">
                                                                <img src="/assets/img/common/logo-header2.png" alt="">
                                                            </figure>
                                                            <div class="info">
                                                                <span class="ttl">株式会社丸井グループ 様</span>
                                                                <span class="txt">システム開発コストを約50％削減、<br>決め手は直観的に利用できるUI</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="subnav__item3">
                                                    <a href="/product_case/customer_02/">
                                                        <div class="wrap">
                                                            <figure class="logo">
                                                                <img src="/assets/img/common/logo-header3.png" alt="">
                                                            </figure>
                                                            <div class="info">
                                                                <span class="ttl">株式会社両備システムズ 様</span>
                                                                <span class="txt">両備システムズグループ全体の<br>労務管理レベルを向上</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="subnav__action">
                                                <a href="/product_case/" class="subnav__btn btn2">すべての導入事例</a>
                                                <a href="/product/case_list/" class="subnav__btn btn3">導入企業一覧</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li <?php if ((function_exists('is_home')) && (is_singular("product_faq") || is_post_type_archive("product_faq") || is_tax("product_faq_tag"))) { echo 'class="is-active"' ; } ?>>
                                <a href="/product_faq/">よくあるご質問</a>
                            </li>
                            <li <?php if ($pageid=="customerSupport" ) { echo 'class="is-active"' ; } ?>>
                                <a href="/customer-support">サポート</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="c-header__bnt">
                        <?php if ($pageclass == "media") { ?>
                        <a class="c-header__bnt1" href="/seminar">人事・労務の<br>改善セミナー</a>
                        <a class="c-header__bnt2" href="/download">お役立ち<br>コンテンツ<br>ダウンロード</a>
                        <?php } ?>
                        <?php if ($pageclass == "product") { ?>
                        <a class="c-header__bnt3" href="https://amano.inboundtools.com/1tisinquiry">お問合せ</a>
                        <a class="c-header__bnt4" href="https://amano.inboundtools.com/1tisrequest">資料請求</a>
                        <a class="c-header__bnt5" href="https://amano.inboundtools.com/1tisdemo">デモ依頼</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="c-icon1"><span></span></div>
            </nav>

            <div class="c-headersp">
                <div class="c-headersp__inner">
                    <div class="c-header__search">
                        <form action="//www.amano.co.jp/search.html" method="GET" id="cse-search-box">
                            <input type="hidden" name="charset" value="UTF-8">
                            <input type="text" name="q" maxlength="255" class="srch-text" placeholder="キーワードを入力してください">
                            <input type="submit" value="submit">
                        </form>
                    </div>
                    <ul class="c-headersp__nav1">
                        <?php if ($pageclass == "media") { ?>
                        <?php if ($userName == $userNameDisplayAll) { ?>
                        <li class="c-headersp__nav1__item">
                            <a class="text" href="/tool_guide">ツールガイド</a>
                        </li>
                        <?php } ?>
                        <li class="c-headersp__nav1__item">
                            <a class="text" href="/gyomu_kaizen">業務改善ガイド</a>
                        </li>
                        <li class="c-headersp__nav1__item">
                            <a class="text" href="/faq_column">なんでもQ&A</a>
                        </li>
                        <li class="c-headersp__nav1__item">
                            <a class="text" href="/hr_news">HR News</a>
                        </li>
                        <li class="c-headersp__nav1__item">
                            <a class="text" href="/glossary">用語集</a>
                        </li>
                        <?php } ?>
                        <?php if ($pageclass == "product") { ?>
                        <li class="c-headersp__nav1__item submenu">
                            <a class="text" href="/product/top/">製品ラインナップ</a>
                            <div class="subnav">
                                <div class="subnav__cont">
                                    <div class="subnav__wrap">
                                        <div class="subnav__box box2">
                                            <p class="subnav__ttl">勤怠管理システム</p>
                                            <div class="subnav__inner">
                                                <ul class="subnav__list3">
                                                    <li class="subnav__item3">
                                                        <a href="/product/timepro-vg/">
                                                            <div class="wrap">
                                                                <figure class="logo">
                                                                    <img src="/assets/img/common/timepro.svg" alt="">
                                                                </figure>
                                                                <div class="info">
                                                                    <span class="txt">あらゆる働き方を支援する勤怠管理システムのハイエンドモデル</span>
                                                                </div>
                                                            </div>
                                                            <p class="number">300名～30,000名規模向け</p>
                                                        </a>
                                                    </li>
                                                    <li class="subnav__item3">
                                                        <a href="/product/vg_cloud/">
                                                            <div class="wrap">
                                                                <figure class="logo">
                                                                    <img src="/assets/img/common/cloud.svg" alt="">
                                                                </figure>
                                                                <div class="info">
                                                                    <span class="txt">ハイエンドモデルのTimePro-VGをクラウドサービスで</span>
                                                                </div>
                                                            </div>
                                                            <p class="number">50名～500名規模向け</p>
                                                        </a>
                                                    </li>
                                                    <li class="subnav__item3">
                                                        <a href="/product/timepro-nx/">
                                                            <div class="wrap">
                                                                <figure class="logo">
                                                                    <img src="/assets/img/common/timepro-nx.svg" alt="">
                                                                </figure>
                                                                <div class="info">
                                                                    <span class="txt">「就業、人事、給与、セキュリティ」トータルパッケージ</span>
                                                                </div>
                                                            </div>
                                                            <p class="number">～500名規模向け</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="subnav__box box1">
                                            <p class="subnav__ttl">HRソリューション製品</p>
                                            <div class="subnav__inner">
                                                <div class="subnav__box2">
                                                    <p class="subnav__ttl2">e-AMANOシリーズ</p>
                                                    <ul class="subnav__list2">
                                                        <li class="subnav__item2 is-news">
                                                            <a href="/product/e-amano_shift/">
                                                                <figure class="icon">
                                                                    <img src="/assets/img/common/icon/icon69.svg" alt="" class="off">
                                                                    <img src="/assets/img/common/icon/icon69-white.svg" alt="" class="on">
                                                                </figure>
                                                                <span class="txt">シフト作成支援サービス<br>（シフト管理）</span>
                                                            </a>
                                                        </li>
                                                        <li class="subnav__item2">
                                                            <a href="/e-amano/">
                                                                <figure class="icon">
                                                                    <img src="/assets/img/common/icon/icon70.svg" alt="" class="off">
                                                                    <img src="/assets/img/common/icon/icon70-white.svg" alt="" class="on">
                                                                </figure>
                                                                <span class="txt">人事届出サービス<br>（労務管理）</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="subnav__list1">
                                                    <li class="subnav__item">
                                                        <a href="/product/top/#id02">システムタイムレコーダー</a>
                                                    </li>
                                                    <li class="subnav__item">
                                                        <a href="/product/ic-card/">ICカード発行</a>
                                                    </li>
                                                    <li class="subnav__item">
                                                        <a href="/product/real-time-monitoring/">セキュリティ（入退室管理）</a>
                                                    </li>
                                                    <li class="subnav__item">
                                                        <a href="/product/top/#id05">人事・給与・会計</a>
                                                    </li>
                                                </ul>
                                                <div class="subnav__action">
                                                    <a href="/product/top/" class="subnav__btn btn1">すべての製品</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="c-headersp__nav1__item">
                            <a class="text" href="/strengths/">アマノの強み</a>
                        </li>
                        <li class="c-headersp__nav1__item submenu">
                            <a class="text" href="/product_solutions/manufacturing/">お悩み改善</a>
                            <div class="subnav">
                                <div class="subnav__cont">
                                    <div class="subnav__wrap">
                                        <p class="subnav__ttl">【業種別】勤怠管理のお悩み改善</p>
                                        <ul class="subnav__list4">
                                            <li class="subnav__item4">
                                                <a href="/product_solutions/manufacturing/">
                                                    <figure class="icon">
                                                        <img src="/assets/img/common/icon/icon63.svg" alt="" class="off">
                                                        <img src="/assets/img/common/icon/icon63-white.svg" alt="" class="on">
                                                    </figure>
                                                    <span class="txt">製造業</span>
                                                </a>
                                            </li>
                                            <li class="subnav__item4">
                                                <a href="/product_solutions/hospital/">
                                                    <figure class="icon">
                                                        <img src="/assets/img/common/icon/icon67.svg?ver" alt="" class="off">
                                                        <img src="/assets/img/common/icon/icon67-white.svg" alt="" class="on">
                                                    </figure>
                                                    <span class="txt">病院</span>
                                                </a>
                                            </li>
                                            <li class="subnav__item4">
                                                <a href="/product_solutions/public-organization/">
                                                    <figure class="icon">
                                                        <img src="/assets/img/common/icon/icon68.svg" alt="" class="off">
                                                        <img src="/assets/img/common/icon/icon68-white.svg" alt="" class="on">
                                                    </figure>
                                                    <span class="txt">行政・自治体</span>
                                                </a>
                                            </li>
                                            <li class="subnav__item4">
                                                <a href="/product_solutions/retail/">
                                                    <figure class="icon">
                                                        <img src="/assets/img/common/icon/icon71.svg" alt="" class="off">
                                                        <img src="/assets/img/common/icon/icon71-white.svg" alt="" class="on">
                                                    </figure>
                                                    <span class="txt">小売業</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </li>
                        <li class="c-headersp__nav1__item submenu case">
                            <a class="text" href="/product_case/">導入事例</a>
                            <div class="subnav">
                                <div class="subnav__cont">
                                    <div class="subnav__wrap">
                                        <ul class="subnav__list3">
                                            <li class="subnav__item3">
                                                <a href="/product_case/case_03/">
                                                    <div class="wrap">
                                                        <figure class="logo">
                                                            <img src="/assets/img/common/logo-header1.png" alt="">
                                                        </figure>
                                                        <div class="info">
                                                            <span class="ttl">KNT-CTホールディングス株式会社 様</span>
                                                            <span class="txt">各種申請書のシステム化による書類管理業務の廃止と紙コストの削減</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="subnav__item3">
                                                <a href="/product_case/customer_01/">
                                                    <div class="wrap">
                                                        <figure class="logo">
                                                            <img src="/assets/img/common/logo-header2.png" alt="">
                                                        </figure>
                                                        <div class="info">
                                                            <span class="ttl">株式会社丸井グループ 様</span>
                                                            <span class="txt">システム開発コストを約50％削減、決め手は直観的に利用できるUI</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="subnav__item3">
                                                <a href="/product_case/customer_02/">
                                                    <div class="wrap">
                                                        <figure class="logo">
                                                            <img src="/assets/img/common/logo-header3.png" alt="">
                                                        </figure>
                                                        <div class="info">
                                                            <span class="ttl">株式会社両備システムズ 様</span>
                                                            <span class="txt">両備システムズグループ全体の労務管理レベルを向上</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="subnav__action">
                                            <a href="/product_case/" class="subnav__btn btn2">すべての導入事例</a>
                                            <a href="/product/case_list/" class="subnav__btn btn3">導入企業一覧</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="c-headersp__nav1__item">
                            <a class="text" href="/product_faq">よくあるご質問</a>
                        </li>
                        <li class="c-headersp__nav1__item">
                            <a class="text" href="/customer-support">サポート</a>
                        </li>
                        <?php } ?>
                    </ul>

                    <?php if ($pageclass == "media") : ?>
                    <div class="c-headersp__nav2">
                        <p class="c-headersp__nav2__bnt is-active">テーマから探す</p>
                        <div class="c-headersp__nav2__item" style="display: block;">
                            <ul>
                                <?php
                                        if (function_exists('is_home')) {
                                            $terms = get_terms('post_tag');
                                            foreach ($terms as $term) {
                                                echo "<li><a href='" . get_term_link($term, 'post_tag') . "'>" . $term->name . "</a></li>";
                                            }
                                        } else {
                                        ?>
                                <li><a href="/tag/law/">法律</a></li>
                                <li><a href="/tag/joseikin/">助成金</a></li>
                                <li><a href="/tag/hatarakikata-kaikaku/">働き方改革</a></li>
                                <li><a href="/tag/make-efficient/">業務効率化</a></li>
                                <li><a href="/tag/kintai-kanri/">勤怠管理</a></li>
                                <li><a href="/tag/roumu-kanri/">労務管理</a></li>
                                <li><a href="/tag/kyuyo/">給与計算</a></li>
                                <li><a href="/tag/nenmatsu-chousei/">年末調整</a></li>
                                <li><a href="/tag/jinji-hyouka/">人事評価制度</a></li>
                                <li><a href="/tag/workflow/">申請・ワークフロー</a></li>
                                <li><a href="/tag/simulation/">診断</a></li>
                                <li><a href="/tag/contract/">契約書</a></li>
                                <li><a href="/tag/kyuugyou/">休業・休職</a></li>
                                <li><a href="/tag/rules/">就業規則</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="c-header__bnt">
                        <?php if ($pageclass == "media") { ?>
                        <a class="c-header__bnt1" href="/seminar/">人事・労務の<br class="pc-only">改善セミナー</a>
                        <a class="c-header__bnt2" href="/download/">お役立ち<br class="pc-only">コンテンツ<br class="pc-only">ダウンロード</a>
                        <a class="c-header__bnt6" href="/product/">製品情報</a>
                        <?php } ?>
                        <?php if ($pageclass == "product") { ?>
                        <a class="c-header__bnt3" href="https://amano.inboundtools.com/1tisinquiry">お問合せ</a>
                        <a class="c-header__bnt4" href="https://amano.inboundtools.com/1tisrequest">資料請求</a>
                        <a class="c-header__bnt5" href="https://amano.inboundtools.com/1tisdemo">デモ依頼</a>
                        <?php } ?>
                    </div>

                    <?php if ($pageclass == "media") : ?>
                    <a href="/product/top/#id01" class="c-headersp__banner"><img src="/assets/img/common/banner3.png" alt="小～大規模向け勤怠管理システムを試してみませんか？" /></a>
                    <?php endif; ?>
                </div>
                <button class="c-headersp__close">閉じる</button>
            </div>
        </header>
        <?php elseif ($pageclass == "tayorou") : ?>
        <header class="c-header3">
            <div class="c-header3__logo">
                <a href="/">
                    <img class="c-header3__logo__img pc-only" src="/assets/img/tayorou/common/logo.svg" alt="タヨロウ勤怠管理・労務管理のAMANOが運営するお役立ち情報メディア" />
                    <img class="c-header3__logo__img sp-only" src="/assets/img/tayorou/common/logo_sp.svg" alt="タヨロウ勤怠管理・労務管理のAMANOが運営するお役立ち情報メディア" />
                </a>
                <a class="c-header3__logo__bnt" href="/product/" target="_blank">アマノの製品情報</a>
            </div>
            <ul class="c-header3__nav">
                <li class="c-header3__nav__item <?php if($pageid == "tayorou-gyomu_kaizen"){ echo " is-current";} ?>"><a href="/gyomu_kaizen/">業務改善ガイド</a></li>
                <li class="c-header3__nav__item <?php if($pageid == "tayorou-hr_news"){ echo " is-current";} ?>"><a href="/hr_news/">HR News</a></li>
                <li class="c-header3__nav__item <?php if($pageid == "tayorou-faq_column"){ echo " is-current";} ?>"><a href="/faq_column/">なんでもQ&A</a></li>
                <li class="c-header3__nav__item <?php if($pageid == "tayorou-download"){ echo " is-current";} ?>"><a href="/download/">ダウンロード</a></li>
                <li class="c-header3__nav__item <?php if($pageid == "tayorou-seminar"){ echo " is-current";} ?>"><a href="/seminar/">セミナー</a></li>
            </ul>
        </header>
        <?php else : ?>
        <header class="c-header blue">
            <div class="c-header1">
                <div class="c-header1__logo">
                    <a href="/">
                        <img class="c-header1__logo__img pc-only" src="/assets/img/common/logo4.svg" alt="AMANO 就業・勤怠/入室/人事/給与管理システムの専門サイト" />
                        <img class="c-header1__logo__img sp-only" src="/assets/img/common/logo4_sp.svg" alt="AMANO 就業・勤怠/入室/人事/給与管理システムの専門サイト" />
                    </a>
                </div>
            </div>
        </header>
        <?php endif; ?>

        <?php ///////////////////////////////////////////
        // searchbar
        ////////////////////////////////////////////////

        if (isset($pageclass)) {
            if ($pageclass == "media") {
                include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/searchbar.php');
            }
        }

        ?>