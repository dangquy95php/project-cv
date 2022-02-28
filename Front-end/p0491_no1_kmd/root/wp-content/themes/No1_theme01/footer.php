<footer id="footer" class="footer">
	<div class="l-cont">
		<div id="pagetop"><a href="#"><span></span></a></div>
		<div class="footer_wrap">
			<div class="footer_logo">
				<div class="footer_logo__img">
					<a href="<?php bloginfo( 'url' ); ?>/">
						<img src="<?php bloginfo('template_directory'); ?>/img/common/logo.svg" alt="株式会社ＫＭＤ">
					</a>
				</div>
				<div class="footer_logo__address">
					<p class="footer_logo__txt">〒132-0003 東京都江戸川区春江町3-17-20</p>
					<p class="footer_logo__num"><span class="tel_link">03-6883-4551</span></p>
				</div>
			</div><!-- End footer_logo-->

			<div class="footer_navi">
				<div class="footer_navi__list">
					<ul class="footer_list">
						<li><a href="<?php bloginfo( 'url' ); ?>/">ホーム</a></li>
						<li><a href="<?php bloginfo( 'url' ); ?>/commitment/">こだわり</a></li>
						<li><a href="<?php bloginfo( 'url' ); ?>/service/">事業案内</a></li>
						<li><a href="<?php bloginfo( 'url' ); ?>/company/">会社案内</a></li>
					</ul>
					<ul class="footer_list">
						<li><a href="<?php bloginfo( 'url' ); ?>/construction/">施工事例</a></li>
						<li><a href="<?php bloginfo( 'url' ); ?>/recruit/">採用案内</a></li>
						<li><a href="<?php bloginfo( 'url' ); ?>/staff/">先輩社員の声</a></li>
						<li><a href="<?php bloginfo( 'url' ); ?>/workflow/">一日の流れ</a></li>
					</ul>
					<ul class="footer_list">
						<li><a href="<?php bloginfo( 'url' ); ?>/faq/">よくある質問</a></li>
						<li><a href="<?php bloginfo( 'url' ); ?>/news/">お知らせ</a></li>
					</ul>
				</div><!-- End footer_navi__list-->
				<div class="footer_contact">
					<a href="<?php bloginfo( 'url' ); ?>/contact/"><span>お問い合わせ</span></a>
				</div>
			</div><!-- End footer_navi-->
		</div><!-- End footer_wrap-->
	</div>
	<div class="copyright">© 2020 株式会社ＫＭＤ</div>
</footer> <!--End footer-->

<?php wp_footer(); ?>

<script src="<?php template_url( '/js/jquery-1.11.0.min.js' ); ?>"></script>
<script src="<?php template_url( '/js/jquery-migrate-1.2.1.min.js' ); ?>"></script>
<script src="<?php template_url( '/js/heightLine.min.js' ); ?>"></script>
<script src="<?php template_url( '/js/footerFixed.min.js' ); ?>"></script>
<script src="<?php template_url( '/js/animsition.min.js' ); ?>"></script>
<script src="<?php template_url( '/js/slick.min.js' ); ?>"></script>
<script src="<?php template_url( '/js/common.min.js' ); ?>"></script>

<?php
// ---------------------------
// 表示中ページ判別ワーク設定
// ---------------------------
$slug = get_current_slug();

/* Top Page JS
/*---------------------------------------------------------*/
if ( is_home() || is_front_page() ) : ?>
	<script src="<?php template_url( '/js/slick.min.js' ); ?>"></script>
	<script src="<?php template_url( '/js/jquery.bxslider.min.js' ); ?>"></script>
	<script src="<?php template_url( '/js/top.min.js' ); ?>"></script>
<?php endif; ?>

<?php
/*	Works detail page js
/*---------------------------------------------------------*/
if ( $slug == "construction" && is_singular() ||  $slug == "recruit"): ?>
	<script src="<?php template_url( '/js/lightbox.js' ); ?>"></script>
<?php endif; ?>

<?php
/*	Contact page js
/*---------------------------------------------------------*/
if ( is_page( 'contact' ) ) : ?>
	<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
	<script type="text/javascript">
		$(".js-button").click(function () {
			AjaxZip3.zip2addr('postal_code', '', 'district', 'city_address');
		});

		document.addEventListener('wpcf7mailsent', function () {
			location = "<?php blog_url( '/contact/thanks/' ); ?>";
		}, false);
	</script>
<?php endif; ?>

</div><!--End #wrapper-->

</body>

</html>
