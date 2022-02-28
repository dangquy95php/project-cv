<section class="c-download c-download--blue">
    <div class="l-container">

        <?php
        $download_post = get_field('single_postList_download');
        if ($download_post) { ?>
            <h2 class="c-title01 c-title01--blue">
                <span class="c-title01__sm">人事・労務の課題解決に役立つ</span>
                <span class="c-title01__big">お役立ちコンテンツ<br class="sp-only">ダウンロード</span>
            </h2>
            <ul class="c-list07">
                <?php foreach ($download_post as $post) : setup_postdata($post);
                    component_loop_5();
                endforeach;
                wp_reset_postdata(); ?>

            </ul>
            <div class="c-btn01 c-btn01--blue">
                <?php component_btn_1("/download", "ダウンロード資料一覧をみる"); ?>
            </div>


        <?php } else { ?>
            <?php
            $the_query_download = new WP_Query(array(
                'posts_per_page' => 6,
                'post_type' => 'download',
            ));
            if (isset($the_query_download) && $the_query_download->have_posts()) : ?>
                <h2 class="c-title01 c-title01--blue">
                    <span class="c-title01__sm">人事・労務の課題解決に役立つ</span>
                    <span class="c-title01__big">お役立ちコンテンツ<br class="sp-only">ダウンロード</span>
                </h2>
                <ul class="c-list07">
                    <?php while ($the_query_download->have_posts()) : $the_query_download->the_post(); ?>
                        <?php component_loop_5(); ?>
                    <?php endwhile; ?>
                </ul>
                <div class="c-btn01 c-btn01--blue">
                    <?php component_btn_1("/download", "ダウンロード資料一覧をみる"); ?>
                </div>

            <?php endif; ?>

        <?php } ?>


    </div>
</section>