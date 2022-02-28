<?php $pageid = "psolutions"; ?>
<?php $pageclass="product";?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/wp/wp-load.php'); ?>
<?php $term = get_queried_object();  ?>
<main class="p-psolutions">
    <div class="c-breadcrumb">
        <ul class="c-breadcrumb__inner">
            <li class="c-breadcrumb__item"><a href="/product/">製品情報</a></li>
            <li class="c-breadcrumb__item"><a href="/product_solutions/">ソリューション</a></li>
            <li class="c-breadcrumb__item"><span><?php echo $term->name; ?></span></li>
        </ul>
    </div>
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">課題別ソリューション</h2>
        </div>
    </div>
    <section class="p-psolutions2">
        <div class="l-container">
            <?php
            
            $args = array(
                'post_type' => 'product_feature',
                'posts_per_page'=> -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'term_id',
                        'terms' => $term->term_id
                    )
                ),
            );
            $query = new WP_Query( $args );
            ?>
            <?php if( $query->have_posts() ) : ?>
            <?php echo '<div class="c-box34"><h3 class="c-title07">'.$term->name.'</h3>'; ?>
            <?php echo '<ul class="c-list54">'; ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
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
                <?php endwhile; ?>
            <?php echo "</ul></div>"; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </section>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>