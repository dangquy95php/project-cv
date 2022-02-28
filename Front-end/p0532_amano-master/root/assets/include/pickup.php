<ul class="c-list48">
    <?php $featured_posts = get_field('pick_up' ,'option'); ?>
    <?php if( $featured_posts ): ?>
    <?php foreach( $featured_posts as $post ):setup_postdata($post); ?>
    <li class="c-list48__item">
        <?php
        $post_type = get_post_type_object( get_post_type($post) );
        if($post_type->name == "gyomu_kaizen"){ $class="c-list48__color1"; }
        if($post_type->name == "hr_news"){ $class="c-list48__color2"; }
        if($post_type->name == "faq_column"){ $class="c-list48__color3"; }
        ?>
        <a href="<?php the_permalink(); ?>" class="<?php echo $class; ?>">
            <div class="c-list48__inner">
                <h4 class="c-list48__tit"><?php echo $post_type->label; ?></h4>
                <p class="c-list48__txt"><?php the_title(); ?></p>
            </div>
            <div class="c-list48__img">
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                <?php if($featured_img_url && $post_type->name != "faq_column"): ?>
                <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                <?php else : ?>
                <img src="/assets/img/tayorou/common/thumb-general_q-and-a.jpg" alt="<?php the_title(); ?>">
                <?php endif; ?>
                <p class="c-list48__time"><span class="day"><?php echo get_the_date('Y.m.d'); ?></span></p>
            </div>
        </a>
    </li>
    <?php endforeach; ?>
    <?php endif; ?>
</ul>