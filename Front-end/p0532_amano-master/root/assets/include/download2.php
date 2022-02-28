<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp/wp-load.php');
$featured_post = get_field('single_postList_download');
$flag = true;
if ($pageid == "timeproVG" || $pageid == "VGCloud" || $pageid == "timepronx" || $pageid == "guide-detail" || $pageid == "glossary-detail" || $pageid == "faq-detail" || $pageid == "product-top" || $pageid == "timeproVGzeem" || $pageid == "ic-card" || $pageid == "handsfree" || $pageid == "system-timeclock" || $pageid == "real-time-monitoring" || $pageid == "cyberxeed" || $pageid == "clouza" || $pageid == "timecard" || $pageid == "biometrics" || $pageid == "ic_card_authentication" || is_singular('tool_guide')) { $flag = false; }
?>

<section class="c-download2<?php if($flag == false) { echo ' c-download2--blue'; }  ?>">
    <div class="l-container">
        <h2 class="c-title01<?php if($flag == true) { echo ' c-title01--white'; }  ?>">
            <span class="c-title01__big">お役立ちコンテンツ<br class="sp-only">ダウンロード</span>
        </h2>

        <?php
        ///////////////////////////////////////////////////////
        // ダウンロード記事の指定があれば表示
        ///////////////////////////////////////////////////////
        if ($featured_post) : ?>
        <ul class="c-list07 c-list07--border">
            <?php foreach ($featured_post as $post) : setup_postdata($post);
                    component_loop_5();
                endforeach;
                ?>
        </ul>
        <?php
            ///////////////////////////////////////////////////////
            // ダウンロード記事の指定がないなら最新記事を表示
            ///////////////////////////////////////////////////////
            ?>

        <?php else : ?>

        <?php
            $the_query_download = new WP_Query(array(
                'posts_per_page' => 3,
                'post_type' => 'download',
            ));
            if (isset($the_query_download) && $the_query_download->have_posts()) : ?>
        <ul class="c-list07 c-list07--border">
            <?php while ($the_query_download->have_posts()) : $the_query_download->the_post(); ?>
            <?php component_loop_5(); ?>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

        <div class="c-btn01<?php if ($flag == true) { echo ' c-btn01--white'; } ?>">
            <a href="/download" class="c-btn01__link"><span class="c-btn01__txt">ダウンロード資料一覧をみる</span></a>
        </div>

    </div>
</section><!-- End c-download2-->