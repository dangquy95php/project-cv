<section class="c-block01">
    <div class="l-cont">
        <h2 class="c-title02">
            <span class="c-title02_eng u-white">works</span>
            <span class="c-title02_jp">当社の施工事例をご紹介します</span>
        </h2>
        <p class="sc01_text u-center">テキストが入りますテキストが入りますテキストが入りますテキストが入ります<br>テキストが入りますテキストが入りますテキストが入りますテキスト</p>
    </div>
</section><!-- End c-block01-->

<section class="construction_sc">
    <div class="l-cont">
        <?php
            $obj = get_queried_object();
            $id  = $obj->term_id;
            $obj_slug = $obj->slug;
            $list_cats = the_category_list("construction");
            if($list_cats) {
        ?>
        <ul class="c-cate">

            <?php
                foreach($list_cats as $key => $items) {
                   $term_id = $items->term_id;
                   $slug    = $items->slug;
                   $name    = $items->name;
                   if($slug == "construction") {
                       $cat_name = "すべて";
                   } else {
                       $cat_name = $name;
                   }
                   if($id == $term_id) {

            ?>

            <li class="c-cate_item active"><a href="<?php echo get_term_link($term_id); ?>"><?php echo $cat_name; ?></a></li>

            <?php
                    } //if($id == $term_id)
                    else {
            ?>

            <?php if ($key != 5): ?>
                <li class="c-cate_item"><a href="<?php echo get_term_link($term_id); ?>"><?php echo $cat_name; ?></a></li>
            <?php endif; ?>

            <?php
                    }
                } // foreach($list_cats as $items)
            ?>

        </ul><!-- End c-cate-->

        <?php } // if($list_cats) ?>

        <?php
        $the_query = new WP_Query( array(
            'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
            'post_type'      => 'post',
            'category_name'  => $obj_slug,
            'posts_per_page' => 12,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status'    => 'publish',
        ) );
        if ( $the_query->have_posts() ):
        ?>

        <ul class="c-list01">

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <li>
                <a href="<?php the_permalink(); ?>">
                    <div class="c-list01_img">
                        <?php $gallery = get_field( 'gallery' ); ?>
                        <?php if ( $image = get_field( 'image' ) ): ?>
							<img src="<?php echo $image['sizes']['img245x245']; ?>" alt="<?php the_title_attribute(); ?>">
						<?php elseif ( $after = get_field( 'image_after' )  ): ?>
                            <img src="<?php echo $after['sizes']['img245x245']; ?>" alt="<?php the_title_attribute(); ?>">
                        <?php else: ?>
                            <img src="<?php bloginfo( 'template_directory' ); ?>/img/common/img245x245.jpg" alt="<?php the_title_attribute(); ?>">
						<?php endif; ?>
                    </div>
                    <h3 class="c-title04">
                        <?php
							$post_cats = get_the_category(get_the_ID());
							if ($post_cats) {
								foreach ($post_cats as $cat) {
									// Only show child categories (exclude parents)
									if ($cat->category_parent != '0') { ?>
                                        <span class="c-title04_t"><?php echo $cat->cat_name; ?></span>
									<?php }
								}
							}
						?>
                        <span class="c-title04_b"><?php the_title() ?></span>
                    </h3>
                </a>
            </li>

            <?php endwhile; ?>

        </ul><!-- End c-list01-->

        <?php wp_pagenavi( array( 'query' => $the_query ) ); ?>
        <?php wp_reset_postdata(); ?>

        <?php else: ?>
            <p class="text-center">※施工実績の情報が整い次第、掲載いたしますので、お待ちください。</p>
        <?php endif; ?>
    </div>
</section><!-- End construction_sc-->