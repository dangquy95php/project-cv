<?php $pageid = "tayorou-download"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<?php $post_type = get_post_type_object( get_post_type($post) ); ?>
<main class="p-tayorou-download">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><span><?php echo $post_type->label; ?></span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-download1">
        <div class="l-container2">
            <div class="c-title23 green2">
                <div class="c-title23__inner">
                    <div class="c-title23__tit">
                        <img class="c-title23__tit__img" src="/assets/img/tayorou/download/icon.svg" alt="">
                        <h2 class="c-title23__tit__txt">お役立ちコンテンツ<br class="sp-only">ダウンロード</h2>
                    </div>
                </div>
                <img class="c-title23__img pc-only" src="/assets/img/tayorou/download/illust-business04.svg" alt="">
            </div>

            <p class="c-text03">人事・労務のお仕事に役立つセミナーや勤怠管理システム導入相談会のご案内です。 社内の勉強会にもご利用いただけます。</p>
            <?php
            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'download',
                'posts_per_page' => '9',
                'paged' => $current_page,
                'post_status' => 'publish',
            );
            $query = new WP_Query( $args );
            ?>
            <?php if( $query->have_posts() ) : ?>
            <ul class="c-list43">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="c-list43__item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="c-list43__inner">
                            <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                            <?php if($url): ?>
                            <img class="c-list43__img" src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img class="c-list43__img" src="/assets/img/tayorou/common/780x500.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <h3 class="c-list43__tit"><?php the_title(); ?></h3>
                            <div class="c-list43__txt"><?php the_content(); ?></div>
                        </div>
                        <div class="c-btn12 c-btn12--down">
                            <p class="c-btn12__txt"><span>ダウンロード</span></p>
                        </div>
                    </a>
                </li>
                <?php endwhile; ?>
            </ul>
            <div class="c-pagenavi2"><?php wp_pagenavi(array('query' => $query)); ?></div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </section>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>