<?php $pageid = "tayorou-download"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<?php $post_type = get_post_type_object( get_post_type($post) ); ?>
<main class="p-tayorou-downloadDetail">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><a href="/<?php echo $post_type->name; ?>/"><?php echo $post_type->label; ?></a></li>
                <li class="c-breadcrumb2__item"><span><?php the_title(); ?></span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-downloadDetail1">
        <div class="l-container2">
            <!-- ========================================= -->
            <div class="c-box27 green2">
                <p class="c-box27__tit"><?php echo $post_type->label; ?></p>
                <h2 class="c-box27__txt"><?php the_title(); ?></h2>
                <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                <?php if ($local_tags) : ?>
                <ul class="c-box27__category">
                    <?php foreach ($local_tags as $tag) : ?>
                    <li><a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php
                $u_time = get_the_time('U');
                $u_modified_time = get_the_modified_time('U');
                ?>
                <p class="c-box27__time"><span>公開日時：<?php echo get_the_date('Y.m.d'); if ($u_modified_time >= $u_time + 86400) { echo ' ／ 更新日時：';the_modified_time('Y.m.d');}?></span></p>
            </div>
            <!-- ========================================= -->
            <div class="c-imgtext08">
                <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                <?php if($url): ?>
                <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
                <div class="c-imgtext08__txt"><?php the_content(); ?></div>
            </div>
            <!-- ========================================= -->
            <div class="c-btn12 c-btn12--down green2">
                <a href="<?php echo get_field('download_url'); ?>" target="_blank" class="c-btn12__txt"><span>ダウンロード</span></a>
            </div>
            <!-- ========================================= -->
        </div>
    </section>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>