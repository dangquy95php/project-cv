<section class="c-download">
    <div class="l-container">
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
            <!-- <p class="c-text01 c-text01--center">
                この文章はダミーですあらかじめご了承くださいこの文章はダミーですあらかじめご了承くださいこの文章はダミーです。
            </p> -->
            <ul class="c-list07">
                <?php while ($the_query_download->have_posts()) : $the_query_download->the_post(); ?>
                    <?php component_loop_5(); ?>
                    <!-- End c-list07__item-->
                <?php endwhile; ?>
            </ul><!-- End c-list07-->
            <div class="c-btn01 c-btn01--blue">
                <?php component_btn_1("/download", "お役立ちダウンロードコンテンツの記事をみる"); ?>
            </div>
        <?php endif; ?>
    </div>
</section>