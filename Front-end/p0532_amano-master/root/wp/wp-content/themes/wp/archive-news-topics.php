<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<main class="p-topics">
    <?php ///////////////////////////////////////////////////////
    // パンくず
    ///////////////////////////////////////////////////////////// 
    ?> <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/breadcrumb.php'); ?>
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">ニュース</h2>
        </div>
    </div>
    <div class="p-topics__wrap">
        <div class="l-container">
            <div class="l-content">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query($query_string . '&posts_per_page=15&paged=' . get_query_var('paged'));
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <ul class="c-list08">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php component_loop_8(); ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php if (function_exists('wp_pagenavi')) : ?>
                        <div class="c-pagenavi">
                            <?php wp_pagenavi(array('query' => $the_query)); ?>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php'); ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>