<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp/wp-load.php');
$featured_post = get_field('single_postList_download');
?>

<section class="c-download c-download--gray">
    <div class="l-container">
        <h2 class="c-title09">
            <span class="c-title09__main c-title09__small">コンテンツダウンロード</span>
        </h2>

        <?php
        ///////////////////////////////////////////////////////
        // ダウンロード記事の指定があれば表示
        ///////////////////////////////////////////////////////
        if ($featured_post) : ?>
        <ul class="c-list07">
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
                'posts_per_page' => 6,
                'post_type' => 'download',
            ));
            if (isset($the_query_download) && $the_query_download->have_posts()) : ?>
        <ul class="c-list07">
            <?php while ($the_query_download->have_posts()) : $the_query_download->the_post(); ?>
            <?php component_loop_5(); ?>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section><!-- End c-download2-->