<?php get_header(); ?>

<main class="page-404">

	<section class="mainvisual">
		<div class="mainvisual_content">
			<h2 class="mainvisual_ttl">
					<span class="mainvisual_eng">404　ERROR</span>
					<span class="mainvisual_jp">404 エラー</span>
			</h2>
		</div>
	</section><!-- End mainvisual-->

	<div class="breadcrumb">
		<ul class="l-cont breadcrumb_list">
			<?php _bcn_display(); ?>
		</ul>
    </div> <!--End .breadcrumb-->

	<section class="section-404">
		<div class="l-cont">
			<h2>404 見つかりません</h2>
			<p>お手数ですが、トップページから改めてお探しください。</p>
			<p>※このページは5秒後にトップページに移動します。</p>
			<p>※切り替わらない場合は<a href="<?php bloginfo( 'url' ); ?>" title="ホーム">こちら</a>をクリックしてください。</p>
		</div>
	</section>

</main>

<?php get_footer(); ?>
