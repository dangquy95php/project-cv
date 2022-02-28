<?php
global $query_string;
parse_str( $query_string, $category );

$cat_title = 'お知らせ';
$cat_slug  = 'news';
$cat_page  = get_template_directory() . '/libs/page/news-detail.php';

if ( $category['category_name'] == 'construction' || is_current_slug('construction') ):
	$cat_title = '施工事例';
	$cat_slug  = 'construction';
	$cat_page  = get_template_directory() . '/libs/page/construction-detail.php';
elseif ( $category['category_name'] == 'recruit-detail' ):
	$cat_title = '採用案内';
	$cat_slug  = 'recruit';
	$cat_page  = get_template_directory() . '/libs/page/recruit-detail.php';
endif;

get_header();
?>

<main id="wrap" class="<?php echo $cat_slug; ?>-detail">

	<section class="mainvisual">
		<div class="mainvisual_content">
			<h2 class="mainvisual_ttl">
					<span class="mainvisual_eng"><?php echo $cat_slug; ?></span>
					<span class="mainvisual_jp"><?php echo $cat_title; ?></span>
			</h2>
		</div>
	</section><!-- End mainvisual-->

	<div class="breadcrumb">
		<ul class="l-cont breadcrumb_list">
			<?php if($cat_slug  == 'construction'): ?>
				<li class="breadcrumb_item"><a href="<?php bloginfo('url') ?>"><span>HOME</span></a></li>
				<li class="breadcrumb_item"><a href="<?php bloginfo('url') ?>/construction/"><span>施工事例</span></a></li>
				<li class="breadcrumb_item"><span><?php the_title() ?></span></li>
			<?php else: ?>
				<?php _bcn_display(); ?>
			<?php endif; ?>
		</ul>
    </div> <!--End .breadcrumb-->


	<?php
		while ( have_posts() ) {
			the_post();
			include( $cat_page );
		}
	?>

</main>

<?php get_footer(); ?>
