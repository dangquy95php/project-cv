<div class="c-side">

    <?php ///////////////////////////////////////////////////////
    // 新着記事
    ///////////////////////////////////////////////////////////// 
    ?>
    <div class="c-side__wrap">
        <h3 class="c-side__ttl"><span class="c-side__ttl__txt">新着記事</span></h3>
        <?php
        $the_query = new WP_Query(array(
            'posts_per_page' => 5,
            'post_type' => get_post_type()
            //'post_type' => array('hr_news', 'faq_column', 'glossary', 'gyomu_kaizen', 'news-topics', 'product_case', 'seminar', 'tool_guide'),
        ));
        if ($the_query->have_posts()) : ?>
            <ul class="c-side__list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php component_loop_10(); ?>
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div><!-- End c-side__wrap-->

    <?php /*
    <?php ///////////////////////////////////////////////////////
    // よく読まれている記事
    ///////////////////////////////////////////////////////////// 
    ?>
    <div class="c-side__wrap">
        <h3 class="c-side__ttl"><span class="c-side__ttl__txt">よく読まれる記事</span></h3>
        <ul class="c-side__list">

            <?php
            if (function_exists('wpp_get_mostpopular')) {
                $arg = array(
                    'range' => 'all',
                    'order_by' => 'views',
                    'post_type' => 'hr_news,faq_column,glossary,gyomu_kaizen,news-topics,product_case,seminar,tool_guide,download',
                    'limit' => 5
                );
                wpp_get_mostpopular($arg);
            } ?>

        </ul><!-- End c-side__list-->
    </div><!-- End c-side__wrap-->
    */ ?>

    <?php ///////////////////////////////////////////////////////
    // バナー
    ///////////////////////////////////////////////////////////// 
    ?>
    <div class="c-side__banner c-side__banner__top">
        <a href="/seminar/" class="c-side__img">
            <img class="pc-only" src="/assets/img/common/side_img03.jpg" alt="">
            <img class="sp-only" src="/assets/img/common/side_img03_sp.jpg" alt="">
        </a>
    </div>
    <div class="c-side__banner">
        <a href="/product/top/#id01" class="c-side__img">
            <img class="pc-only" src="/assets/img/common/side_img04.png" alt="">
            <img class="sp-only" src="/assets/img/common/side_img04_sp.png" alt="">
        </a>
    </div>
</div><!-- End c-side-->