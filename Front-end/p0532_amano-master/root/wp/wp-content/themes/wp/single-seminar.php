<?php $pageid = "tayorou-seminar"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>

<main class="p-tayorou-seminar-detail">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><a href="/seminar/">セミナー・イベント情報</a></li>
                <li class="c-breadcrumb2__item"><span><?php the_title(); ?></span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-seminar-detail1">
        <div class="l-container2">
            <div class="c-box27 purple">
                <p class="c-box27__tit">セミナー・イベント情報</p>
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
            <div class="c-imgtext08">
                <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                <?php if($url): ?><img src="<?php echo $url; ?>" alt=""><?php endif; ?>
                <div class="c-imgtext08__inner">
                    <div class="c-imgtext08__txt"><?php echo get_field('seminar_lead'); ?></div>
                    <div class="c-time2">
                        <?php
                        $week = array("日", "月", "火", "水", "木", "金", "土");
                        $date = date_create('' . get_field('seminar_date') . '');
                        ?>
                        <div class="c-time2__txt1">開催日：<br class="sp-only"><?php echo date_format($date, 'Y/m/d') . "(" . $week[(int)date_format($date, 'w')] . ")"; ?> <?php echo get_field('seminar_time'); ?>～<?php echo get_field('seminar_time_end'); ?></div>
                        <div class="c-time2__txt2">開催場所：<br class="sp-only"><?php echo get_field('seminar_address'); ?></div>
                    </div>
                </div>
            </div>
            <!-- ========================================= -->
            <div class="c-box29 purple">
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/single_media_flexible_content.php'); ?>
            </div>
            <!-- ========================================= -->
        </div>
    </section>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>