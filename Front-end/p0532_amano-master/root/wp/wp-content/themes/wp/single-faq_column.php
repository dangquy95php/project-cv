<?php $pageid = "tayorou-faq_column"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<main class="p-tayorou-faq_columnDetail u-detail">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><a href="/faq_column/">なんでもQ&A</a></li>
                <li class="c-breadcrumb2__item"><span><?php the_title(); ?></span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-faq_columnDetail1">
        <div class="l-container2">
            <div class="l-layout1">
                <div class="l-layout1__left">
                    <!-- ===================================================== -->
                    <div class="c-faq-detail">
                        <p class="c-faq-detail__text">人事・労務なんでもQ＆A</p>
                        <?php if(get_field('faq_q_txt')): ?><div class="c-faq-detail__question"><?php echo get_field('faq_q_txt'); ?></div><?php endif; ?>
                        <?php if(get_field('faq_a_txt')): ?><div class="c-faq-detail__answer"><?php echo get_field('faq_a_txt'); ?></div><?php endif; ?>
                    </div>
                    <!-- ===================================================== -->
                    <?php $u_time = get_the_time('U'); $u_modified_time = get_the_modified_time('U'); ?>
                    <div class="c-faq-detail__time"><img src="/assets/img/tayorou/common/icon-clock2.svg" alt="">公開日時：<?php echo get_the_date('Y.m.d'); if ($u_modified_time >= $u_time + 86400) { echo ' ／ 更新日時：';the_modified_time('Y.m.d');}?></div>
                    <!-- ===================================================== -->
                    <div class="c-faq-detail__btn">
                        <a href="#">詳しく解説</a>
                    </div>
                    <!-- ===================================================== -->
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
                    <div class="c-box29 blue">
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
                                <span class="c-title25__jp">新着Q＆A</span>
                                <span class="c-title25__en c-title25__en--color4">NEW ARTICLES</span>
                            </h3>
                            <?php
                            $args = array(
                                'posts_per_page' => 4,
                                'post_type' => 'faq_column',
                            );
                            $query = new WP_Query( $args );
                            ?>
                            <?php if( $query->have_posts() ) : ?>
                            <ul class="c-list51">
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                            <!-- ========================================= -->
                        </div>
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/tag.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $featured_posts = get_field('single_postList_faq_column');
    if( $featured_posts ): ?>
    <section class="c-recommend2">
        <div class="l-container2">
            <div class="c-title21 c-title21--icon2">
                <h2 class="c-title21__jp">おすすめ記事</h2>
                <p class="c-title21__en">RECOMMEND</p>
            </div>
            <ul class="c-list46 c-list46--col4">
                <?php foreach( $featured_posts as $post ): setup_postdata($post); ?>
                <li class="c-list46__item color3">
                    <div class="c-list46__img">
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                        <?php if($featured_img_url): ?>
                        <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                        <?php else : ?>
                        <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <p class="c-list46__time"><span class="day"><?php echo get_the_date('Y.m.d'); ?></span></p>
                    </div>
                    <div class="c-list46__info">
                        <h3 class="c-list46__tit"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                        <?php if ($local_tags) : ?>
                        <div class="c-tag9">
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