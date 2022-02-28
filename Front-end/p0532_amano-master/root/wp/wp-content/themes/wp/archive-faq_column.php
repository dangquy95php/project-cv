<?php $pageid = "tayorou-faq_column"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<main class="p-tayorou-faq_column">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><span>なんでもQ&A</span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-faq_column1">
        <div class="l-container2">
            <div class="l-layout1">
                <div class="l-layout1__left">
                    <div class="c-title23 blue">
                        <div class="c-title23__inner">
                            <p class="c-title23__txt">様々な課題を抱える<br class="sp-only">ご担当者様に向けて</p>
                            <div class="c-title23__tit">
                                <img class="c-title23__tit__img" src="/assets/img/tayorou/faq_column/icon.svg" alt="">
                                <h2 class="c-title23__tit__txt">人事・労務<br class="sp-only">なんでもQ＆A</h2>
                            </div>
                        </div>
                        <img class="c-title23__img" src="/assets/img/tayorou/faq_column/illust-category03.svg" alt="">
                    </div>
                    <?php
                    $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'faq_column',
                        'posts_per_page' => '12',
                        'paged' => $current_page,
                        'post_status' => 'publish',
                    );
                    $query = new WP_Query( $args );
                    ?>
                    <?php if( $query->have_posts() ) : ?>
                    <ul class="c-list46">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
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
                        <?php endwhile; ?>
                    </ul>
                    <div class="c-pagenavi2"><?php wp_pagenavi(array('query' => $query)); ?></div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
                <div class="l-layout1__right">
                    <div class="c-side01">
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/tag.php'); ?>
                        <div class="c-side01__inner2">
                            <h3 class="c-title25">
                                <span class="c-title25__jp">ピックアップ記事</span>
                                <span class="c-title25__en">PICK UP</span>
                            </h3>
                            <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/pickup.php'); ?>
                            <div class="c-btn12 c-btn12--logo sp-only">
                                <a href="/" class="c-btn12__txt"><span>ホームへ</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>