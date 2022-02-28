<?php
$the_query = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'product_faq',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_faq_cat',
            'field'    => 'slug',
            'terms'    => $faq_terms,
        ),
    ),
    'meta_query' => array(
        array(
            'key' => 'product_faq_show',
            'value' => '1',
            'compare' => '='
        ),
    ),            
));
if ($the_query->have_posts()) : ?>
<div class="c-product_faq <?php if($pageid == "timecard" || $pageid == "cyberxeed"){ echo 'pd-b'; } ?>">
    <div class="l-container">
        <h2 class="c-title01 c-title01--blue">
            <span class="c-title01__big">よくあるご質問</span>
        </h2>
            <ul class="c-faq">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php component_loop_9(); ?>
                <?php endwhile; ?>
            </ul>
        <?php if($faq_terms == "cat2"): $anchor = "#faq2"; endif; ?>
        <?php if($faq_terms == "cat3"): $anchor = "#faq3"; endif; ?>
        <?php if($faq_terms == "cat5"): $anchor = "#faq4"; endif; ?>
        <?php if($faq_terms == "cat6"): $anchor = "#faq5"; endif; ?>
        <?php if($faq_terms == "cat7"): $anchor = "#faq6"; endif; ?>
        <?php if($faq_terms == "cat8"): $anchor = "#faq7"; endif; ?>
        <div class="c-btn07 c-btn07--blue">
            <a href="/product_faq/<?php echo $anchor; ?>" class="c-btn07__txt">もっと見る</a>
        </div>
    </div>
</div>
<?php endif; ?>