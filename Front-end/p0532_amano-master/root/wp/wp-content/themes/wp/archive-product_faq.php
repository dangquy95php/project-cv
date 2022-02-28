<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>

<main class="p-productFaq">
    <?php ///////////////////////////////////////////////////////
    // パンくず
    ///////////////////////////////////////////////////////////// 
    ?> <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/breadcrumb.php'); ?>
    <!-- End c-breadcrumb-->
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">よくあるご質問</h2>
        </div>
    </div><!-- End c-mv6-->

    <?php $terms = get_terms('product_faq_cat'); ?>

    <div class="l-container">
        <ul class="c-list09 c-list09--col3 c-list09--style2">
            <?php $i = 1;
            foreach ($terms as $term) { ?>
                <li class="c-list09__item">
                    <a href="#faq<?php echo $i++; ?>" class="c-list09__txt"><?php echo $term->name; ?></a>
                </li>
            <?php } ?>
        </ul><!-- End c-list09-->

        <?php
        $i = 1;
        foreach ($terms as $term) { ?>
            <section class="p-productFaq__box is-outlinkarea" id="faq<?php echo $i++; ?>">
                <h2 class="c-title09">
                    <?php if($term->name == '製品全般') { ?>
                    <span class="c-title09__main"><?php echo $term->name; ?></span>
                    <p class="c-title09__des">CLOUZAのよくあるご質問については<a href="https://clouza.jp/faq/" target="_blank">専用サイト</a>でご確認いただけます。</p>
                    <?php } else { ?>
                    <span class="c-title09__main"><?php echo $term->name; ?></span>
                    <?php } ?>
                </h2>
                <?php
                $the_query = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'product_faq',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_faq_cat',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                ));
                if ($the_query->have_posts()) : ?>
                    <ul class="c-faq">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php component_loop_9(); ?>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
                <?php if ($term->name != '製品全般'):
                    $url="/product/timepro-vg/";
                    $termName="TimePro-VG";
                    if($term->name == "VG Cloud（勤怠）"){ $url="/product/vg_cloud/"; $termName="VG Cloud"; }
                    if($term->name == "TimePro-NX（勤怠・人事・給与）"){ $url="/product/timepro-nx/"; $termName="TimePro-NX"; }
                    if($term->name == "CYBER XEED（勤怠・人事・給与）"){ $url="/product/cyber_xeed/"; $termName="CYBER XEED"; }
                    if($term->name == "ICカード"){ $url="/product/ic_card_authentication/"; $termName="ICカード"; }
                    if($term->name == "システムタイムレコーダー"){ $url="/product/top/#id02"; $termName="システムタイムレコーダー"; }
                ?>
                <div class="c-btn01">
                    <a href="<?php echo $url; ?>" class="c-btn01__link"><span class="c-btn01__txt"><?php echo $termName; ?>の詳細を見る</span></a>
                </div>
                <?php endif; ?>
            </section><!-- End p-productFaq__box-->
        <?php } ?>

    </div><!-- End l-container-->

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/download-blue.php'); ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php'); ?>

</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>