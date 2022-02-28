<?php
function new_acticle($obj) {
    $class="c-list48__color1";
    if($obj["tax"] == "hr_news"){ $class="c-list48__color2";  }
    if($obj["tax"] == "faq_column"){ $class="c-list48__color3"; }
    $args = array(
        'posts_per_page' => 4,
        'post_type' => $obj["tax"],
        'post_status' => 'publish',
    );
    $query = new WP_Query( $args );
    ?>
<?php if( $query->have_posts() ) : ?>
<ul class="c-list48">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <li class="c-list48__item">
        <a href="<?php the_permalink(); ?>" class="<?php echo $class; ?>">
            <div class="c-list48__inner">
                <p class="c-list48__txt"><?php the_title(); ?></p>
            </div>
            <div class="c-list48__img">
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                <?php if($featured_img_url): ?>
                <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                <?php else : ?>
                <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                <?php endif; ?>
                <p class="c-list48__time"><span><?php echo get_the_date('Y.m.d'); ?></span></p>
            </div>
        </a>
    </li>
    <?php endwhile; ?>
</ul>
<?php endif; ?>
<?php wp_reset_query();
}
add_shortcode( 'new_acticle', 'new_acticle' );


function glosary($obj) {
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'glossary',
    'meta_query' => array(
        array(
          'key'     => 'word_kana',
          'value'   => $obj["key"],
          'compare' => 'LIKE',
        ),
    )
);
$query = new WP_Query( $args );
?>
<?php if( $query->have_posts() ) : ?>
<div class="c-list42 is-style1">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="c-list42__item">
        <div class="c-list42__content">
            <p class="c-list42__title"><?php the_title(); ?></p>
            <p class="c-list42__tit"><?php echo get_field('word_yomi'); ?></p>
        </div>
    </a>
    <?php endwhile; ?>
</div>
<?php endif; ?>
<?php wp_reset_query();
}
add_shortcode( 'glosary', 'glosary' );