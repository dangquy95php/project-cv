<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<?php
///////////////////////////////////////////////////////
// パラメータ取得
///////////////////////////////////////////////////////
$em = array();
if (isset($_GET["em"])) {
    $em = $_GET["em"];
}
$ty = array();
if (isset($_GET["ty"])) {
    $ty = $_GET["ty"];
}
$pr = array();
if (isset($_GET["pr"])) {
    $pr = $_GET["pr"];
}

///////////////////////////////////////////////////////
// 絞り込み条件
///////////////////////////////////////////////////////
$tax_query_arg = array();
if ($em) {
    $tax_query_arg[] = array(
        'taxonomy' => 'product_case_cat1',
        'field' => 'slug',
        'terms' => $em,
        'operator' => 'AND'
    );
}
if ($ty) {
    $tax_query_arg[] = array(
        'taxonomy' => 'product_case_cat2',
        'field' => 'slug',
        'terms' => $ty,
        'operator' => 'AND'
    );
}
if ($pr) {
    $tax_query_arg[] = array(
        'taxonomy' => 'product_case_cat3',
        'field' => 'slug',
        'terms' => $pr,
        'operator' => 'AND'
    );
}

if (count($tax_query_arg) > 1) {
    $tax_query_arg["relation"] = "AND";
}

///////////////////////////////////////////////////////
// チェックボックス テンプレ
///////////////////////////////////////////////////////
function checktmpl($data, $name, $id, $label)
{
    $checked = "";
    if (in_array($id, $data)) {
        $checked = " checked";
    }
    echo '<li><input type="checkbox" name="' . $name . '" id="' . $id . '" value="' . $id . '"' . $checked . '><label for="' . $id . '">' . $label . '</label></li>';
}

// HTML case_logo_slider.php
ob_start();
include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/case_logo_slider.php');
$case_logo_html = ob_get_contents();
ob_end_clean();
?>


<main class="p-productcase">

    <?php ///////////////////////////////////////////////////////
    // パンくず
    ///////////////////////////////////////////////////////////// 
    ?> <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/breadcrumb.php'); ?>

    <?php ///////////////////////////////////////////////////////
    // タイトル
    ///////////////////////////////////////////////////////////// 
    ?>
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">導入事例</h2>
        </div>
    </div>

    <!-- 導入企業企業ロゴ -->

    <!-- <div class="margin_top"> -->
		<ul class="c-price margin_bottom">
			<li class="c-price__item">
				<p class="c-tag3">累計出荷本数</p>
				<p class="c-price__number">50,000<span>本以上</span></p>
			</li>
			<li class="c-price__item">
				<p class="c-tag3">導入企業</p>
				<p class="c-price__number">20,000<span>社以上</span></p>
			</li>
		</ul>

        <div class="c-btn01">
            <a href="/product/case_list/" class="c-btn01__link"><span class="c-btn01__txt">導入企業一覧</span></a>
        </div>

		<?php echo $case_logo_html; ?>
    <!-- </div> -->

    <div class="p-productcase__wrap">
        <div class="l-container">

            <?php ///////////////////////////////////////////////////////
            // 絞り込み条件
            ///////////////////////////////////////////////////////////// 
            ?>
            <?php if ($userName == $userNameDisplayAll) { ?>
            <form action="/product_case/">
                <div class="c-form1">
                    <div class="c-form1__box">
                        <dl class="c-form1__row">
                            <dt class="c-form1__heading">
                                <p class="c-form1__tit icon1">従業員数で絞り込み</p>
                            </dt>
                            <dd class="c-form1__info">
                                <ul class="c-form1__list">
                                    <?php
                                    checktmpl($em, "em[]", "employees_10", "10～50名");
                                    checktmpl($em, "em[]", "employees_50", "50〜100名");
                                    checktmpl($em, "em[]", "employees_100", "100〜300名");
                                    checktmpl($em, "em[]", "employees_300", "300〜500名");
                                    checktmpl($em, "em[]", "employees_500", "500〜1000名");
                                    checktmpl($em, "em[]", "employees_1000", "1000名以上");
                                    ?>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="c-form1__row">
                            <dt class="c-form1__heading">
                                <p class="c-form1__tit icon2">業種で絞り込み</p>
                            </dt>
                            <dd class="c-form1__info">
                                <ul class="c-form1__list">
                                    <?php
                                    checktmpl($ty, "ty[]", "type_1", "製造");
                                    checktmpl($ty, "ty[]", "type_2", "小売");
                                    checktmpl($ty, "ty[]", "type_3", "電子機器");
                                    checktmpl($ty, "ty[]", "type_4", "食品メーカー");
                                    checktmpl($ty, "ty[]", "type_5", "外食チェーン");
                                    checktmpl($ty, "ty[]", "type_6", "IT・通信");
                                    checktmpl($ty, "ty[]", "type_7", "サービス");
                                    checktmpl($ty, "ty[]", "type_8", "商社");
                                    checktmpl($ty, "ty[]", "type_9", "病院");
                                    checktmpl($ty, "ty[]", "type_10", "建設業");
                                    ?>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="c-form1__row">
                            <dt class="c-form1__heading">
                                <p class="c-form1__tit icon3">導入製品で絞り込み</p>
                            </dt>
                            <dd class="c-form1__info">
                                <ul class="c-form1__list">
                                    <?php
                                    checktmpl($pr, "pr[]", "product_1", "TimePro-VG");
                                    checktmpl($pr, "pr[]", "product_2", "VG Cloud");
                                    checktmpl($pr, "pr[]", "product_3", "TimePro-VG Powered by ZEEM");
                                    checktmpl($pr, "pr[]", "product_4", "TimePro-NX");
                                    checktmpl($pr, "pr[]", "product_5", "CYBER XEED");
                                    checktmpl($pr, "pr[]", "product_6", "クラウザ");
                                    checktmpl($pr, "pr[]", "product_7", "e-amano");
                                    ?>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                    <button type="submit" class="c-form1__submit"><span>絞り込み</span></button>
                </div>
            </form>
            <?php } ?>

            <?php ///////////////////////////////////////////////////////
            // お客様の声
            ///////////////////////////////////////////////////////////// 
            ?>

            <?php
            $the_query = new WP_Query(array(
                'tax_query' => $tax_query_arg,
                'posts_per_page' => -1,
                'post_type' => 'product_case',
                'meta_query' => array(
                    array(
                        'key'     => 'case_type',
                        'value'   => 'type1',
                        'compare' => '=',
                    )
                )
            ));
            if ($the_query->have_posts()) : ?>
                <div class="p-productcase__list">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php component_loop_12(); ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="u-noentry">該当する事例はありません</div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

			</div>
		
			<section class="c-box15">
				<div class="l-container">
					<div class="c-title19">
						<h2 class="c-title19__inner">多様な業種別 勤怠管理システム<br class="sp-only">活用事例を<span>無料公開中！</span></h2>
					</div>
					<div class="c-box15__inner">
						<figure class="c-box15__img"><img src="/assets/img/common/case_solution_img.png" alt="人事労務ソリューション導入事例集"></figure>
						<div class="c-box15__content">
							<h4 class="c-box15__title">人事労務ソリューション導入事例集</h4>
							<p class="c-box15__txt">IT・通信、サービス、製造、金融、建設、医療、電子など、業種別に8ケースの導入事例をご紹介しております。それぞれの業種特有の勤怠管理の課題を解決するソリューションをご提案いたします。</p>
							<p class="c-box15__chath"><span>このような方へおすすめ</span></p>
							<ul class="c-singlelist">
								<li class="c-singlelist__item">勤怠管理システムの活用例を具体的に知りたい</li>
								<li class="c-singlelist__item">業種・業界固有の労務課題を解決したい</li>
							</ul>
							<div class="c-btn04 c-btn04--blue"><a href="https://amano.inboundtools.com/1tisdownload4" class="c-btn04__link"><span class="c-btn04__txt">ダウンロードはこちら</span></a></div>
						</div>
					</div>
				</div>
			</section>
			
			<div class="l-container">
	
            <?php ///////////////////////////////////////////////////////
            // その他の事例
            ///////////////////////////////////////////////////////////// 
            ?>
            <h2 class="c-title09"><span class="c-title09__main">その他の事例</span></h2>

            <?php
            $the_query = new WP_Query(array(
                'tax_query' => $tax_query_arg,
                'posts_per_page' => -1,
                'post_type' => 'product_case',
                'meta_query' => array(
                    array(
                        'key'     => 'case_type',
                        'value'   => 'type2',
                        'compare' => '=',
                    )
                )
            )); ?>
            <?php if ($the_query->have_posts()) : ?>
                <ul class="c-list12">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php component_loop_13(); ?>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <div class="u-noentry">該当する事例はありません</div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

        </div>

    </div>

    <?php echo $case_logo_html; ?>

	<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php'); ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>