<section class="news-detail_sc">
	<div class="l-cont">
		<div class="news-detail_wrapper">
			<?php mark_new_post( 7, '<p class="news-detail_label">NEWS</p>' ); ?>
			<h2 class="news-detail_title"><?php the_title() ?></h2>
			<p class="news-detail_date"><?php the_time( 'Y.m.d' ); ?></p>
			<div class="news-detail_content wp-content clearfix">
				<?php the_content(); ?>
			</div>
		</div>

		<div class="c-navi">
			<?php previous_post_link( '<div class="c-navi_pre" rel="prev">%link</div>', '', true ); ?>
			<div class="c-navi_back"><a href="<?php bloginfo( 'url' ); ?>/news/">一覧へ戻る</a></div>
			<?php next_post_link( '<div class="c-navi_next" rel="next">%link</div>', '', true ); ?>
		</div><!-- End .c-detailnavi -->
	</div>
</section>