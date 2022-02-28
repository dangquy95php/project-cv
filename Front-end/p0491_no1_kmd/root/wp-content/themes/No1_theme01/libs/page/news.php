<section class="news_sc01">
	<div class="l-cont">

		<h2 class="c-title02">
			<span class="c-title02_eng">News</span>
			<span class="c-title02_jp">お知らせ</span>
		</h2>

		<?php
			$the_query = new WP_Query( array(
				'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
				'post_type'      => 'post',
				'category_name'  => 'news',
				'posts_per_page' => 10,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'post_status'    => 'publish',
			) );
			if ( $the_query->have_posts() ):
		?>

		<ul class="c-newslist">

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<li class="c-newslist_item">
				<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
					<?php mark_new_post( 7, '<span class="c-newslist_label">NEW</span>' ); ?>
					<span class="c-newslist_date"><?php the_time( 'Y.m.d' ); ?></span>
					<span class="c-newslist_title"><?php the_title() ?></span>
				</a>
			</li> <!--End .c-newslist_item-->

			<?php endwhile; ?>

		</ul>

		<?php wp_pagenavi( array( 'query' => $the_query ) ); ?>
		<?php wp_reset_postdata(); ?>

		<?php else: ?>
			<p class="text-center">※新着情報が整い次第、掲載いたしますので、お待ちください。</p>
		<?php endif; ?>

	</div>
</section>