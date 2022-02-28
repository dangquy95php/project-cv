<?php
global $post;

$page_title = $post->post_title;
$page_slug  = $post->post_name;

if ( $post->post_parent != 0 ) {
	$post_parent_id = array_pop( get_post_ancestors( $post->ID ) );
	$post_parent    = get_post( $post_parent_id );
	$page_title     = $post_parent->post_title;
	$page_slug      = $post_parent->post_name;
}

get_header();
?>

<main id="wrap" class="<?php echo $page_slug; ?>">

	<section class="mainvisual">
		<div class="mainvisual_content">
			<h2 class="mainvisual_ttl">
					<span class="mainvisual_eng"><?php echo $page_slug; ?></span>
					<span class="mainvisual_jp"><?php echo $page_title; ?></span>
			</h2>
		</div>
	</section><!-- End mainvisual-->

	<div class="breadcrumb">
	<?php if (is_page(['staff', 'workflow', 'faq'])): ?>
		<ul class="l-cont breadcrumb_list">
			<li class="breadcrumb_item"><a href="<?php bloginfo('url') ?>"><span>HOME</span></a></li>
			<li class="breadcrumb_item"><a href="<?php bloginfo('url') ?>/recruit/"><span>採用案内</span></a></li>
			<?php if (is_page('staff')) : ?>
				<li class="breadcrumb_item"><span>先輩社員の声</span></li>
			<?php elseif(is_page('workflow')): ?>
				<li class="breadcrumb_item"><span>一日の流れ</span></li>
			<?php else: ?>
				<li class="breadcrumb_item"><span>よくある質問</span></li>
			<?php endif; ?>
		</ul>
		<?php else: ?>
		<ul class="l-cont breadcrumb_list">
			<?php _bcn_display(); ?>
		</ul>
	<?php endif; ?>

    </div> <!--End .breadcrumb-->

	<?php
		while ( have_posts() ) {
			the_post();
			the_content();
		}

		if ( is_page( 'recruit' ) ):

	?>

	<section class="recruit_sc04">
		<div class="l-cont">
			<h2 class="c-title02">
				<span class="c-title02_eng">recruit</span>
				<span class="c-title02_jp">募集一覧</span>
			</h2>

			<?php
				$the_query = new WP_Query( array(
					'post_type'      => 'post',
					'category_name'  => 'recruit-detail',
					'posts_per_page' => - 1,
					'orderby'        => 'date',
					'order'          => 'DESC',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ):
			?>

			<ul class="c-newslist">

				<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>

				<li class="c-newslist_item">
					<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
						<?php mark_new_post( 7, '<span class="c-newslist_label">NEW</span>' ); ?>
						<span class="c-newslist_date"><?php the_time( 'Y.m.d' ); ?></span>
						<span class="c-newslist_title"><?php the_title() ?></span>
					</a>
				</li> <!--End .c-newslist_item-->

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</ul><!-- End c-newslist-->

			<?php else: ?>

			<p class="text-center">※只今、当社では新規の募集は行っておりません。<br>募集の際には、このページで掲載する予定です。またのお越しをお待ちしております。</p>

			<?php endif; ?>

		</div>
	</section><!-- End recruit_sc04-->

	<?php

	endif;

	?>

</main>

<?php get_footer(); ?>
