<?php
// ---------------------------
// 表示中ページ判別ワーク設定
// ---------------------------
$slug = get_current_slug();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php if (is_404()) : ?>
		<meta http-equiv="refresh" content="5;URL=<?php blog_url(); ?>" />
	<?php endif; ?>

	<?php
	// All in One SEO Pack 以外のSEOタグ設定
	// All in One SEO Pack で設定できない部分のカテゴリ一覧・詳細ページはここで設定してください。function.phpに連動してます。
	if ($slug == "index" || is_category() || in_category($slug)) : ?>
		<meta name="keywords" content="<?php echo_keyword($slug, $post); ?>">
		<meta name="description" content="<?php echo_description($slug, $post); ?>">
	<?php endif; ?>

	<title><?php echo get_post_meta($post->ID, '_aioseop_title', true); ?></title>

	<?php wp_head(); ?>

	<link href="<?php template_url('/favicon.ico'); ?>" rel="shortcut icon">
	<link href="<?php template_url('/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

	<?php
	// Top Page CSS
	if (is_home() || is_front_page()) : ?>
		<link href="<?php template_url('/css/slick.css'); ?>" rel="stylesheet">
		<link href="<?php template_url('/css/jquery.bxslider.min.css'); ?>" rel="stylesheet">
	<?php endif; ?>

	<?php
	// Works detail page css
	if ($slug == "construction" && is_singular() ||  $slug == "recruit") : ?>
		<link href="<?php template_url('/css/lightbox.css'); ?>" rel="stylesheet">
	<?php endif; ?>
	<link href="<?php template_url('/css/slick.css'); ?>" rel="stylesheet">
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" media="all">
	<link href="<?php template_url('/css/import.css'); ?>" rel="stylesheet" media="all">
	<link href="<?php template_url('/css/print.css'); ?>" rel="stylesheet" media="print">
</head>
<?php $page_class = 'page-' . $slug; ?>

<body id="area" <?php body_class($page_class); ?>>

	<div id="wrapper">
		<header id="header">
			<div class="header-h1">
				<h1><?php echo_h1($slug, $post); ?></h1>
			</div>
			<div class="h_box">

				<div class="logo">
					<a href="<?php bloginfo('url'); ?>/">
						<img src="<?php bloginfo('template_directory'); ?>/img/common/logo_white.svg" alt="株式会社ＫＭＤ" class="logo_top">
						<img src="<?php bloginfo('template_directory'); ?>/img/common/logo.svg" alt="株式会社ＫＭＤ" class="logo_page">
					</a>
				</div>

				<div class="gnav_menu">
					<div class="contact_phone_pad">
						<span class="phone_number">03-6883-4551</span>
					</div>
					<div class="sp_btn">
						<span class="tel_link">03-6883-4551</span>
					</div>
					<div class="sp_menu_btn">
						<div><span class="top"></span><span class="middle"></span><span class="bottom"></span></div>
					</div>
				</div>

				<nav id="gnav">
					<ul>
						<li class="item_nav item_nav--home <?php is_menu_active('active', 'index'); ?>">
							<a href="<?php bloginfo('url'); ?>/">
								<span class="ttl_eng">HOME</span>
								<span class="ttl_jap">ホーム</span>
							</a>
						</li>
						<li class="item_nav item_nav--commitment <?php is_menu_active('active', 'commitment'); ?>">
							<a href="<?php bloginfo('url'); ?>/commitment/">
								<span class="ttl_eng">COMMITMENT</span>
								<span class="ttl_jap">こだわり</span>
							</a>
						</li>
						<li class="item_nav item_nav--service <?php is_menu_active('active', 'service'); ?>">
							<a href="<?php bloginfo('url'); ?>/service/">
								<span class="ttl_eng">SERVICE</span>
								<span class="ttl_jap">事業案内</span>
							</a>
						</li>
						<li class="item_nav <?php is_menu_active('active', 'company'); ?>">
							<a href="<?php bloginfo('url'); ?>/company/">
								<span class="ttl_eng">COMPANY</span>
								<span class="ttl_jap">会社案内</span>
							</a>
						</li>
						<li class="item_nav <?php is_menu_active('active', 'construction', 'construction-detail'); ?>">
							<a href="<?php bloginfo('url'); ?>/construction/">
								<span class="ttl_eng">CONSTRUCTION</span>
								<span class="ttl_jap">施工事例</span>
							</a>
						</li>
						<li class="nav_list_sub item_nav item_nav_last <?php is_menu_active('active', 'recruit', 'recruit-detail', 'staff', 'workflow', 'faq'); ?>">
							<a href="<?php bloginfo('url'); ?>/recruit/">
								<span class="ttl_eng">recruit</span>
								<span class="ttl_jap">採用案内</span>
							</a>
							<ul>
								<li><a href="<?php bloginfo('url'); ?>/staff/"><span>先輩社員の声</span></a></li>
								<li><a href="<?php bloginfo('url'); ?>/workflow/"><span>一日の流れ</span></a></li>
								<li><a href="<?php bloginfo('url'); ?>/faq/"><span>よくある質問</span></a></li>
							</ul>
						</li>
						<li class="item_nav pad-sp-only <?php is_menu_active('active', 'staff'); ?>">
							<a href="<?php bloginfo('url'); ?>/staff/">
								<span class="ttl_eng">staff</span>
								<span class="ttl_jap">先輩社員の声</span>
							</a>
						</li>
						<li class="item_nav pad-sp-only <?php is_menu_active('active', 'workflow'); ?>">
							<a href="<?php bloginfo('url'); ?>/workflow/">
								<span class="ttl_eng">workflow</span>
								<span class="ttl_jap">一日の流れ</span>
							</a>
						</li>
						<li class="item_nav pad-sp-only <?php is_menu_active('active', 'faq'); ?>">
							<a href="<?php bloginfo('url'); ?>/faq/">
								<span class="ttl_eng">faq</span>
								<span class="ttl_jap">よくある質問</span>
							</a>
						</li>
						<li class="item_nav pad-sp-only <?php is_menu_active('active', 'news'); ?>">
							<a href="<?php bloginfo('url'); ?>/news/">
								<span class="ttl_eng">news</span>
								<span class="ttl_jap">お知らせ</span>
							</a>
						</li>
						<li class="g_btn <?php is_menu_active('active', 'contact'); ?>">
							<a href="<?php bloginfo('url'); ?>/contact/">
								<span class="ttl_eng">contact</span>
								<span class="ttl_jap">お問い合わせ</span>
							</a>
						</li>
					</ul>
				</nav><!-- end of gnav -->
			</div>
		</header>