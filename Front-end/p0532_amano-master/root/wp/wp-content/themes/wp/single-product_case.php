<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>

<main class="p-productcasedetail">
    <?php ///////////////////////////////////////////////////////
    // パンくず
    ///////////////////////////////////////////////////////////// 
    ?> <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/breadcrumb.php'); ?>
    <!-- End c-breadcrumb-->
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">導入事例</h2>
        </div>
    </div>
    <div class="p-productcasedetail__wrap1 is-outlinkarea">
        <div class="l-container">
            <?php $case_type = get_field('case_type');
            if ($case_type) : ?>
                <p class="c-tag"><?php echo $case_type["label"]; ?></p>
            <?php endif; ?>
            <h2 class="c-title09 c-title09__left">
                <span class="c-title09__main c-title09__small"><?php the_title(); ?></span>
            </h2>
            <div class="c-box9 c-box9--style2">
                <div class="c-box9__info">
                    <h3 class="c-box9__ttl"><?php echo get_field('case_company'); ?></h3>
                    <div class="c-taglist">
                        <?php for ($i = 1; $i <= 3; $i++) {
                            $terms_cat = get_the_terms($post->ID, 'product_case_cat' . $i);
                            if ($terms_cat) {
                                foreach ($terms_cat as $cat) { ?>
                                    <span class="c-tag2"><?= $cat->name; ?></span>
                        <?php }
                            }
                        } ?>
                    </div>
                    <?php if(get_field('case_dep')) { ?>
                    <p class="c-box9__subttl"><?php echo get_field('case_dep'); ?></p>
                    <?php } ?>
                    <p class="c-box9__txt"><?php echo get_field('case_lead'); ?></p>
                </div>
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                <figure class="c-box9__img">
                    <?php if ($featured_img_url) : ?>
                        <img src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                        <img src="/assets/img/common/default.png" alt="">
                    <?php endif; ?>
                </figure>
            </div>
        </div>
    </div>
    <div class="p-productcasedetail__wrap2 is-outlinkarea">
        <div class="l-container">
            <div class="l-content">
                <div class="c-text10">
                    <dl class="c-text10__q">
                        <dt><img src="/assets/img/common/icon/icon44.svg" alt="課題" /></dt>
                        <dd><?php echo get_field('case_kadai'); ?></dd>
                    </dl>
                    <dl class="c-text10__a">
                        <dt><img src="/assets/img/common/icon/icon45.svg" alt="解決策" /></dt>
                        <dd><?php echo get_field('case_kaiketsu'); ?></dd>
                    </dl>
                </div>
                <?php
                $posts = get_field('case_product');
                if ($posts) : ?>
                    <table class="c-text11">
                        <tr>
                            <th>導入製品</th>
                            <td>
                                <?php foreach ($posts as $post) : setup_postdata($post);
                                    $logo = get_field('product_logo');
                                    $url = get_field('product_url'); ?>
                                    <?php if ($url) { ?>
                                        <a href="<?php echo $url; ?>">
                                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo get_field("product_title") ?>" />
                                        </a>
                                    <?php } else { ?>
                                        <span>
                                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo get_field("product_title") ?>" />
                                        </span>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    </table>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php
                $case_point = get_field('case_kaiketsu');
                if ($case_point) : ?>
                    <dl class="c-text12">
                        <dt class="c-text12__tit">選定のポイント</dt>
                        <dd class="c-text12__txt"><?php echo $case_point; ?></dd>
                    </dl>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="p-productcasedetail__wrap3 is-outlinkarea">
        <div class="l-container">
            <div class="l-content">
                <?php ///////////////////////////////////////////////////////
                // 目次
                ///////////////////////////////////////////////////////////// 
                ?>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/checkExistsH2AndH3.php'); ?>
                <div class="c-box4">
                    <?php ///////////////////////////////////////////////////////
                    // 柔軟コンテンツ
                    ///////////////////////////////////////////////////////////// 
                    ?>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/single_flexible_content.php'); ?>
                </div>
            </div>
        </div>
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

    <?php $type = "product_case";
    include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/recommnded.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/download-blue.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php'); ?>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>