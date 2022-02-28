<section class="construction-detail_sc">
    <div class="l-cont">
        <div class="construction-detail_name">
            <p class="name">
                <?php
                    $post_cats = get_the_category(get_the_ID());
                    if ($post_cats) {
                        foreach ($post_cats as $cat) {
                            // Only show child categories (exclude parents)
                            if ($cat->category_parent != '0') { ?>
                                <span class="name_cate"><?php echo $cat->cat_name; ?></span>
                            <?php }
                        }
                    }
                ?>
                <span class="name_ttl"><?php the_title(); ?></span>
            </p>
            <p class="date"><?php the_time( 'Y.m.d' ); ?></p>
        </div>
        <?php if ( $image = get_field( 'image' ) ): ?>
        <div class="construction-detail_main">
            <img src="<?php echo $image['url']; ?>" alt="<?php the_title_attribute(); ?>">
        </div>
        <?php endif; ?>

        <?php
            $image_before = get_field( 'image_before' );
            $image_after = get_field( 'image_after' );
            if($image_before && $image_after) :
        ?>
        <ul class="c-list02">
            <li>
                <div class="c-list02__wrap">
                    <img src="<?php echo $image_before['sizes']['img480x328']; ?>" alt="<?php the_title_attribute(); ?>">
                    <p class="c-list02__txt"><span class="c-list02__text">before</span></p>
                </div>
            </li>
            <li>
                <div class="c-list02__wrap">
                    <img src="<?php echo $image_after['sizes']['img480x328']; ?>" alt="<?php the_title_attribute(); ?>">
                    <p class="c-list02__txt c-list02__other"><span class="c-list02__text">after</span></p>
                </div>
            </li>
        </ul><!-- End c-list02-->

        <?php endif; ?>

        <?php if ( $images = get_field( 'gallery' ) ): ?>
        <ul class="c-list03">
            <?php foreach ( $images as $img ): ?>
            <li>
                <a href="<?php echo $img['url']; ?>" data-lightbox="image-groups" title="<?php the_title_attribute(); ?>">
				<img src="<?php echo $img['sizes']['img200x200']; ?>" alt="<?php the_title_attribute(); ?>"/>
				</a>
            </li>
            <?php endforeach; ?>
        </ul><!-- End c-list03-->
        <?php endif; ?>

        <div class="construction-detail_des">
            <?php if(get_field("construction_date")) : ?>
            <p class="c-title04">
                <span class="c-title04_t">施工年月</span>
                <span class="c-title04_b"> <?php echo get_field("construction_date"); ?> </span>
            </p>
            <?php endif; ?>
            <?php if(get_field("construction_name")) : ?>
            <p class="c-title04">
                <span class="c-title04_t">工事名</span>
                <span class="c-title04_b"> <?php echo get_field("construction_name"); ?></span>
            </p>
            <?php endif; ?>
            <?php if(get_field("construction_content")) : ?>
            <div class="c-title04">
                <span class="c-title04_t">工事内容</span>
                <div class="sc01_text"> <?php echo get_field("construction_content"); ?> </div>
            </div>
            <?php endif; ?>
        </div><!-- End construction-detail_des-->

        <div class="c-navi">
            <?php previous_post_link( '<div class="c-navi_pre" rel="prev">%link</div>', '', true ); ?>
            <div class="c-navi_back"><a href="<?php bloginfo( 'url' ); ?>/construction/">一覧へ戻る</a></div>
            <?php next_post_link( '<div class="c-navi_next" rel="next">%link</div>', '', true ); ?>
        </div><!-- End .c-detailnavi -->
    </div>
</section><!-- End construction-detail_sc-->