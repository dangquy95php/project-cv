<?php $pageid = "tayorou-gyomu_kaizen"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<?php $post_type = get_post_type_object( get_post_type($post) ); ?>
<main class="p-tayorou-gyomu_kaizen_detail u-detail">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><a href="/<?php echo $post_type->name; ?>/"><?php echo $post_type->label; ?></a></li>
                <li class="c-breadcrumb2__item"><span><?php the_title(); ?></span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-gyomu_kaizen_detail1">
        <div class="l-container2">
            <div class="l-layout1">
                <div class="l-layout1__left">
                    <!-- ========================================= -->
                    <div class="c-box27">
                        <p class="c-box27__tit"><?php echo $post_type->label; ?></p>
                        <h2 class="c-box27__txt"><?php the_title(); ?></h2>
                        <!-- ------------------------------------------- -->
                        <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                        <?php if ($local_tags) : ?>
                        <ul class="c-box27__category">
                            <?php foreach ($local_tags as $tag) : ?>
                            <li><a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <!-- ------------------------------------------- -->
                        <?php
                        $u_time = get_the_time('U');
                        $u_modified_time = get_the_modified_time('U');
                        ?>
                        <p class="c-box27__time"><span>公開日時：<?php echo get_the_date('Y.m.d'); if ($u_modified_time >= $u_time + 86400) { echo ' ／ 更新日時：';the_modified_time('Y.m.d');}?></span></p>
                        <!-- ------------------------------------------- -->
                    </div>
                    <!-- ========================================= -->
                    <?php if ( get_field('single_lead_img') && get_field('single_lead')  ) : ?>
                    <div class="c-imgtext08">
                        <?php $image = get_field('single_lead_img'); ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="">
                        <div class="c-imgtext08__txt"><?php echo get_field('single_lead'); ?></div>
                    </div>
                    <?php endif; ?>
                    <!-- ========================================= -->
                    <div class="c-box28">
                        <?php $checkExistsH2AndH3 = get_field('single_flexible_content');
                        if ($checkExistsH2AndH3 && (count(array_column($checkExistsH2AndH3, 'single_h2_text')) > 0 || count(array_column($checkExistsH2AndH3, 'single_h3_text')) > 0)) :
                        if (have_rows('single_flexible_content')) :
                        $h2 = 1;
                        $h3 = 1;
                        $i = 1;
                        ?>
                        <div class="c-box28__wrap">
                            <?php while (have_rows('single_flexible_content')) : the_row(); ?>
                            <?php if (get_row_layout() == 'single_h2') : ?>
                            <a class="c-box28__ttl" href="#h2-<?php echo $h2 ?>"><span><?php echo $h2; ?></span><?php the_sub_field('single_h2_text'); ?></a>
                            <?php $h2++; ?>
                            <?php $i = 1; ?>
                            <?php endif; ?>
                            <?php if (get_row_layout() == 'single_h3') : ?>
                            <a class="c-box28__txt" href="#h3-<?php echo $h3 ?>"><span><?php echo $h2-1; ?>.<?php echo $i; $i++; ?></span><?php the_sub_field('single_h3_text'); ?></a>
                            <?php $h3++;?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- ========================================= -->
                    <div class="c-box29">
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/single_media_flexible_content.php'); ?>
                    </div>
                    <!-- ========================================= -->
                </div>
                <div class="l-layout1__right">
                    <div class="c-side01">
                        <div class="c-side01__inner2">
                            <!-- ========================================= -->
                            <h3 class="c-title25">
                                <span class="c-title25__jp">ピックアップ記事</span>
                                <span class="c-title25__en">PICK UP</span>
                            </h3>
                            <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/pickup.php'); ?>
                            <!-- ========================================= -->
                            <h3 class="c-title25">
                                <span class="c-title25__jp">業務改善ガイド新着記事</span>
                                <span class="c-title25__en">NEW ARTICLES</span>
                            </h3>
                            <?php echo do_shortcode('[new_acticle tax="gyomu_kaizen"]'); ?>
                            <!-- ========================================= -->
                        </div>
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/tag.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $featured_posts = get_field('single_postList_gyomu_kaizen');
    if( $featured_posts ): ?>
    <section class="c-recommend2">
        <div class="l-container2">
            <div class="c-title21 c-title21--icon2">
                <h2 class="c-title21__jp">おすすめ記事</h2>
                <p class="c-title21__en">RECOMMEND</p>
            </div>
            <!-- ========================================= -->
            <ul class="c-list46 c-list46--col4">
                <?php foreach( $featured_posts as $post ): setup_postdata($post); ?>
                <li class="c-list46__item color1">
                    <?php $post_type = get_post_type_object( get_post_type($post) ); ?>
                    <div class="c-list46__img">
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                        <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                        <p class="c-list46__time">
                            <span class="title pc-only"><?php echo $post_type->label; ?></span>
                            <span class="day"><?php echo get_the_date('Y.m.d'); ?></span>
                        </p>
                    </div>
                    <div class="c-list46__info">
                        <p class="c-list46__subtit sp-only"><?php echo $post_type->label; ?></p>
                        <h3 class="c-list46__tit"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                        <?php if ($local_tags) : ?>
                        <div class="c-tag9  pc-only">
                            <?php $i = false ; foreach ($local_tags as $tag) : ?>
                            <?php if($i == false) { $i = true; } else { echo ","; } ?>
                            <a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <!-- ========================================= -->
            <div class="c-btn12 c-btn12--logo">
                <a href="/" class="c-btn12__txt">
                    <span>ホームへ</span>
                </a>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>