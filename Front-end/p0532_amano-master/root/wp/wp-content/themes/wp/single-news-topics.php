<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>

<main class="p-topicsdetail">
    <?php ///////////////////////////////////////////////////////
    // パンくず
    ///////////////////////////////////////////////////////////// 
    ?> <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/breadcrumb.php'); ?>
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">ニュース</h2>
        </div>
    </div>
    <div class="p-topicsdetail__wrap <?php if (get_field('single_contact_hidden')) {
                                            echo 'p-topicsdetail__wrap--nocontact';
                                        } ?>">
        <div class="l-container is-outlinkarea">
            <!-- TO DO SOMETHING -->
            <?php
            $terms = get_the_terms($post->ID, 'news-topics_cat');
            if ($terms) : ?>
                <div class='c-list08_tag'>
                    <?php foreach ($terms as $term) : ?>
                        <?php $term_link = get_term_link($term); ?>
                        <a class="c-tag" href="<?= esc_url($term_link) ?>"><?= $term->name ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <h2 class="c-title09 c-title09__left">
                <span class="c-title09__main c-title09__small"><?php the_title(); ?></span>
            </h2>
            <p class="c-datetime"><?php echo get_the_time('Y.m.d'); ?></p>
            <div class="l-content">
                <section class="c-box4">


                    <?php ///////////////////////////////////////////////////////
                    // 柔軟コンテンツ
                    ///////////////////////////////////////////////////////////// 
                    ?>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/single_flexible_content.php'); ?>
                </section>
            </div>
        </div>
    </div>

    <?php if (!get_field('single_contact_hidden')) {
        include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php');
    } ?>

</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>