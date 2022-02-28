<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>

<main class="p-psolutionsdetail">
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/breadcrumb.php'); ?>

    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">
                <?php the_title(); ?>
            </h2>
        </div>
    </div>

    <section class="p-psolutionsdetail1">
        <div class="l-container">
            <?php if (get_field('solution_lead_title')) { ?>
                <h2 class="c-title09"><span class="c-title09__main c-title09__small">
                        <?php the_field('solution_lead_title'); ?>
                    </span></h2>
            <?php } ?>
            <?php if (get_field('solution_lead_text')) { ?>
                <p class="c-text03">
                    <?php the_field('solution_lead_text'); ?>
                </p>
            <?php } ?>

            <div class="c-title19">
                <h2 class="c-title19__inner"><?php the_field('solution_indexTitle'); ?></h2>
            </div>

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/index_solution.php'); ?>

        </div>
    </section>

    <section class="p-psolutionsdetail2">
        <div class="l-container">
            <div class="c-box16">
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/single_flexible_content.php'); ?>
            </div>
        </div>
    </section>

    <?php if (get_field('solution_dl_link')) { ?>
        <?php
        $img = get_field('solution_dl_img');
        if ($img) {
            $img_url = esc_url($img['url']);
        }
        ?>
        <section class="c-box15" id="doc">
            <div class="l-container">
                <div class="c-title19">
                    <h2 class="c-title19__inner"><?php the_field('solution_dl_title1'); ?></h2>
                </div>
                <div class="c-box15__inner">
                    <figure class="c-box15__img"><img src="<?php echo $img_url; ?>" alt="<?php echo strip_tags(get_field('solution_dl_title2')); ?>"></figure>
                    <div class="c-box15__content">
                        <h4 class="c-box15__title"><?php the_field('solution_dl_title2'); ?></h4>
                        <p class="c-box15__txt"><?php the_field('solution_dl_text'); ?></p>
                        <div class="c-btn04 c-btn04--blue"><a href="<?php the_field('solution_dl_link'); ?>" class="c-btn04__link"><span class="c-btn04__txt">ダウンロードはこちら</span></a></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="c-downloadfile is-active">
            <div class="pc-only">
                <div class="c-downloadfile__status">
                    <img class="on" src="/assets/img/common/icon/icon-remove.svg" alt="">
                    <img class="off" src="/assets/img/common/icon/icon-add.svg" alt="">
                </div>
                <div class="c-downloadfile__close">
                    <img class="on" src="/assets/img/common/icon/icon_close7.svg" alt="">
                </div>
                <div class="c-downloadfile__content">
                    <div class="c-downloadfile__img">
                        <img src="/assets/img/common/thumb_amano.png" alt="">
                    </div>
                    <p class="c-downloadfile__title">
                        <span class="on"><?php the_field('solution_dl_title2'); ?>無料配布中です</span>
                        <span class="off">カタログ<br>無料配布中です</span>
                    </p>
                    <div class="c-btn04 c-btn04--blue">
                        <a href="<?php the_field('solution_dl_link'); ?>" class="c-btn04__link"><span class="c-btn04__txt">ダウンロードはこちら</span></a>
                    </div>
                </div>
            </div>
            <div class="sp-only">
                <div class="c-downloadfile__close">
                    <img class="on" src="/assets/img/common/icon/icon_close7.svg" alt="">
                </div>
                <a href="<?php the_field('solution_dl_link'); ?>">
                    <div class="c-downloadfile__content">
                        <div class="c-downloadfile__img">
                            <img src="/assets/img/common/thumb_amano.png" alt="">
                        </div>
                        <p class="c-downloadfile__title">
                            <span class="on"><?php the_field('solution_dl_title2'); ?></span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>

    <?php /*
        <?php
        $the_query = new WP_Query(array(
            'posts_per_page' => 6,
            'post_type' => 'product_solutions',
        )); ?>
        <?php if ($the_query->have_posts()) : ?>
            <section class="p-psolutions3">
                <div class="l-container">
                    <h2 class="c-title09">
                        <span class="c-title09__main c-title09__small">課題解決のご紹介</span>
                    </h2>
                    <ul class="c-list12 c-list12--black">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php component_loop_16(); ?>
                        <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <div class="u-noentry">該当する事例はありません</div>
                </div>
            </section>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    */ ?>

    <?php
    $terms_cat = get_the_terms($post->ID, 'product_solutions_cat');
    $i = 0;
    $tmpTitle = "";
    if ($terms_cat) {
        foreach ($terms_cat as $cat) {
            if ($i != 0) {
                $tmpTitle .= "・";
            }
            $tmpTitle .= $cat->name;
            $i++;
        }
    }
    if ($tmpTitle) {
        $tmpTitle .= "の";
    }
    ?>
    <section class="p-psolutionsdetail4">
        <div class="l-container">
            <h2 class="c-title09">
                <span class="c-title09__main c-title09__small"><?php echo $tmpTitle; ?>導入事例</span>
            </h2>

            <?php /////////////////////////////////////////////////
            // 導入実績の関連投稿の連絡があればそれを表示、
            // なければ導入実績の最新4件を表示
            ///////////////////////////////////////////////////////

            $featured_posts = get_field('single_postList_product_case');
            if ($featured_posts) {

                $has_type1 = "";
                $has_type2 = "";
                foreach ($featured_posts as $post) {
                    setup_postdata($post);

                    $tmp = get_field('case_type');
                    if ($tmp["value"] == "type1") {
                        $has_type1 = true;
                    }
                    if ($tmp["value"] == "type2") {
                        $has_type2 = true;
                    }
                }

                //実名事例
                if ($has_type1) {
                    foreach ($featured_posts as $post) {
                        setup_postdata($post);
                        $tmp = get_field('case_type');
                        if ($tmp["value"] == "type1") {
                            component_loop_12();
                        }
                    }
                    wp_reset_postdata();
                }

                //その他事例
                if ($has_type2) {
                    $i = 1;
                    echo '<ul class="c-list12 c-list12--blue">';
                    foreach ($featured_posts as $post) :
                        setup_postdata($post);
                        $tmp = get_field('case_type');
                        if ($tmp["value"] == "type2" && $i <= 3) {
                            component_loop_17();
                            $i++;
                        }
                    endforeach;
                    wp_reset_postdata();
                    echo '</ul>';
                }
            } else {

                $the_query = new WP_Query(array(
                    'posts_per_page' => 1,
                    'post_type' => 'product_case',
                ));
                if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php component_loop_12(); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

                <?php
                $the_query = new WP_Query(array(
                    'posts_per_page' => 3,
                    'offset' => 1,
                    'post_type' => 'product_case',
                )); ?>
                <?php if ($the_query->have_posts()) : ?>
                    <ul class="c-list12 c-list12--blue">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php component_loop_17(); ?>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            <?php } ?>

        </div>
    </section>


    <?php
    $type = "product_solutions";
    include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/download3.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php');
    ?>

</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>