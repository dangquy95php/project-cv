<?php $pageid = "product_case_list"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>

<main class="p-pclist">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/breadcrumb.php'); ?>
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">導入企業一覧</h2>
        </div>
    </div>
    <section class="p-pclist1">
        <div class="l-container">
            <p class="p-pclist1__txt">
                アマノのソリューションをご導入いただいた<br class="sp-only">企業様を紹介します。
                <br>企業規模・業種を問わず多様なお客様に<br class="sp-only">ご利用いただいております。
            </p>
            <div class="c-list34 c-list34--center">
                <?php if ( have_rows('case_study', 'option') ) : ?>
	            <?php while( have_rows('case_study', 'option') ) : the_row(); ?>
		            <?php
                    $case_study_url = get_sub_field('case_logo_postLink');
                    $case_study_url = (is_object($case_study_url) || is_numeric($case_study_url))
                        ? get_the_permalink($case_study_url) : $case_study_url;
                    if ($case_study_url): ?>
                        <a href="<?php echo esc_url($case_study_url); ?>" class="c-list34__item">
                            <figure class="c-list34__img">
                                <img src="<?php echo get_sub_field('case_logo_img'); ?>" alt="<?php echo get_sub_field('case_logo_name'); ?>">
                            </figure>
                            <p class="c-list34__txt">導入事例を見る</p>
                        </a>
                    <?php else: ?>
                        <div class="c-list34__item">
                            <figure class="c-list34__img">
                                <img src="<?php echo get_sub_field('case_logo_img'); ?>" alt="<?php echo get_sub_field('case_logo_name'); ?>">
                            </figure>
                            <p class="c-list34__txt">導入事例を見る</p>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="c-list34">
                <?php if ( have_rows('case_list', 'option') ) : ?>
                <?php while( have_rows('case_list', 'option') ) : the_row(); ?>
                    <?php
                    $case_logo_url = get_sub_field('case_logo_postLink');
		            $case_logo_url = (is_object($case_logo_url) || is_numeric($case_logo_url))
                        ? get_the_permalink($case_logo_url) : $case_logo_url;
                    if ($case_logo_url): ?>
                        <a href="<?php echo esc_url($case_logo_url); ?>" class="c-list34__item">
                            <figure class="c-list34__img">
                                <img src="<?php echo get_sub_field('case_logo_img'); ?>" alt="<?php echo get_sub_field('case_logo_name'); ?>">
                            </figure>
                        </a>
                    <?php else: ?>
                        <div class="c-list34__item">
                            <figure class="c-list34__img">
                                <img src="<?php echo get_sub_field('case_logo_img'); ?>" alt="<?php echo get_sub_field('case_logo_name'); ?>">
                            </figure>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php'); ?>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>