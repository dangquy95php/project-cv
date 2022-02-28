<?php $pageid = "tayorou-glossary"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<main class="p-tayorou-glossary-detail u-detail">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><a href="/glossary/">人事・労務の注目用語</a></li>
                <li class="c-breadcrumb2__item"><span><?php the_title(); ?></span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-glossary-detail1">
        <div class="l-container2">
            <div class="l-layout1">
                <div class="l-layout1__left">
                    <div class="c-box27 gray">
                        <p class="c-box27__tit">人事・労務の注目用語</p>
                        <h2 class="c-box27__txt"><?php the_title(); ?></h2>
                        <P class="c-box27__txt2"><?php echo get_field('word_yomi'); ?></P>
                        <?php $u_time = get_the_time('U'); $u_modified_time = get_the_modified_time('U'); ?>
                        <p class="c-box27__time"><span>公開日時：<?php echo get_the_date('Y.m.d'); if ($u_modified_time >= $u_time + 86400) { echo ' ／ 更新日時：';the_modified_time('Y.m.d');}?></span></p>
                    </div>
                    <div class="c-box29 gray">
                        <div class="c-box29__txt"><?php the_content(); ?></div>
                        <!-- ===================================================== -->
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/single_media_flexible_content.php'); ?>
                    </div>
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
                                <span class="c-title25__jp">新着用語</span>
                                <span class="c-title25__en c-title25__en--color3">NEW ARTICLES</span>
                            </h3>
                            <?php
                            $args = array(
                                'posts_per_page' => 4,
                                'post_type' => 'glossary',
                            );
                            $query = new WP_Query( $args );
                            ?>
                            <?php if( $query->have_posts() ) : ?>
                            <div class="c-new-articles">
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="c-new-articles__item">
                                    <p class="c-new-articles__title"><?php the_title(); ?></p>
                                    <p class="c-new-articles__text"><?php echo get_field('word_yomi'); ?></p>
                                </a>
                                <?php endwhile; ?>
                            </div>
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
    <?php $featured_posts = get_field('single_postList_glossary');
    if( $featured_posts ): ?>
    <section class="c-recommend2">
        <div class="l-container2">
            <div class="c-title21 c-title21--icon2">
                <h2 class="c-title21__jp">おすすめ記事</h2>
                <p class="c-title21__en">RECOMMEND</p>
            </div>
            <!-- ========================================= -->
            <div class="c-list42 is-style2">
                <?php foreach( $featured_posts as $post ): setup_postdata($post); ?>
                <a href="<?php the_permalink(); ?>" class="c-list42__item">
                    <div class="c-list42__content">
                        <p class="c-list42__title"><?php the_title(); ?></p>
                        <p class="c-list42__tit"><?php echo get_field('word_yomi'); ?></p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <!-- ========================================= -->
            <div class="c-btn12 c-btn12--logo">
                <a href="/" class="c-btn12__txt"><span>ホームへ</span></a>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>