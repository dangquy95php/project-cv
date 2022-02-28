<?php $pageid = "psolutions"; ?>
<?php $pageclass="product";?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/wp/wp-load.php'); ?>

<main class="p-psolutions">
    <div class="c-breadcrumb">
        <ul class="c-breadcrumb__inner">
            <li class="c-breadcrumb__item"><a href="/product">製品情報</a></li>
            <li class="c-breadcrumb__item"><span>ソリューション</span></li>
        </ul>
    </div>
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">ソリューション</h2>
        </div>
    </div>

    <section class="p-psolutions1">
        <div class="l-container">
            <ul class="c-list53">
                <li class="c-list53__item">
                    <a href="#id1" class="c-list53__inner">
                        <span class="c-list53__icon">
                            <img src="/assets/img/common/icon/icon66.svg" alt="" class="off">
                            <img src="/assets/img/common/icon/icon66_white.svg" alt="" class="on">
                        </span>
                        <span class="c-list53__txt">業種から探す</span>
                    </a>
                </li>
                <li class="c-list53__item">
                    <a href="#id2" class="c-list53__inner">
                        <span class="c-list53__icon">
                            <img src="/assets/img/common/icon/icon65.svg" alt="" class="off">
                            <img src="/assets/img/common/icon/icon65_white.svg" alt="" class="on">
                        </span>
                        <span class="c-list53__txt">課題から探す</span>
                    </a>
                </li>
            </ul>

            <h2 class="c-title09" id="id1">
                <span class="c-title09__main">業種から探す</span>
            </h2>

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/list35.php'); ?>
        </div>
    </section>

    <section class="p-psolutions2 u-bg01" id="id2">
        <div class="l-container">
            <h2 class="c-title09">
                <span class="c-title09__main">課題から探す</span>
            </h2>
            <?php
            $taxonomy = 'product_feature_cat';
            $args = array(
                'orderby' => 'name',
                'order' => 'ASC',
                'taxonomy' => $taxonomy
            );
            $categories = get_categories($args);
            foreach($categories as $category):
            echo '<div class="c-box34"><h3 class="c-title07">'.$category->name.'</h3>';
            $post_args = array(
                'post_type' => 'product_feature',
                'posts_per_page'=> -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'term_id',
                        'terms' => $category->term_id
                    )
                ),
            );
            $wp_query = new WP_Query($post_args);
                if ($wp_query->have_posts()) :
                    echo '<ul class="c-list54">';
                    while ($wp_query->have_posts()) : $wp_query->the_post();?>
                    <li class="c-list54__item">
                        <?php if ( get_field('product_feature_img') ) : $img = get_field('product_feature_img');?>
                        <figure class="c-list54__icon">
                            <img src="<?php echo $img['product_feature_img1']; ?>" alt="<?php the_title(); ?>" class="off">
                            <img src="<?php echo $img['product_feature_img2']; ?>" alt="<?php the_title(); ?>" class="on">
                        </figure>
                        <?php endif; ?>
                        <div class="c-list54__info">
                            <p class="c-list54__txt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                            <?php $local_tags = get_the_terms($post->ID, 'product_feature_tag'); ?>
                            <?php if ($local_tags) : ?>
                            <div class="c-list54__listtag">
                                <?php foreach ($local_tags as $tag) : ?>
                                <a class="c-list54__tag" href="<?php echo get_tag_link($tag); ?>"># <?php echo $tag->name; ?></a>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endwhile;
                    echo "</ul>";
                endif;
            endforeach
            ?>
        </div>
    </section>
    <section class="p-psolutions3 u-bg05">
        <div class="l-container">
            <h2 class="c-title09">
                <span class="c-title09__main">製品一覧</span>
            </h2>
        </div>

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/block09.php'); ?>
    </section>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php'); ?>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>