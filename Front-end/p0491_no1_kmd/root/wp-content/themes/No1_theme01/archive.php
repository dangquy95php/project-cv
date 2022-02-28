<?php
if ( is_category( 'recruit-detail' ) ) {
	header( 'Location: ' . bloginfo( 'url' ) . '/recruit/' );
}

$cat_title = 'お知らせ';
$cat_slug  = 'news';
$cat_page  = get_template_directory() . '/libs/page/news.php';

if ( is_category( 'construction' ) || is_current_slug( 'construction' ) ):
	$cat_title = '施工事例';
	$cat_slug  = 'construction';
	$cat_page  = get_template_directory() . '/libs/page/construction.php';
endif;

get_header();
?>

<main id="wrap" class="<?php echo $cat_slug; ?>">

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
			<?php _bcn_display(); ?>
		</ul>
    </div> <!--End .breadcrumb-->

	<?php include( $cat_page ); ?>

</main>

<?php get_footer(); ?>
