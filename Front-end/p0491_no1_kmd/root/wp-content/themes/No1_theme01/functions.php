<?php

/* Load up the theme
/*---------------------------------------------------------*/
require( __DIR__ . '/inc/theme-options.php' );
require( __DIR__ . '/inc/my-category-class.php' );
require( __DIR__ . '/inc/my-functions.php' );

/*	カスタムフィールド画像サイズを指定します。
/*---------------------------------------------------------*/
add_image_size( 'img245x245', 245, 245, true );
add_image_size( 'img200x200', 200, 200, true );
add_image_size( 'img480x328', 480, 328, true );

/*	カテゴリーのSEOタグ設定　KEYWORD
/*---------------------------------------------------------*/
function get_current_keyword( $slug ) {
	$keyword_array = array(
		"index"                 => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"commitment"            => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"service"               => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"company"               => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"construction"          => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"construction-detail"   => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"recruit"               => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"recruit-detail"        => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"staff"                 => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"workflow"              => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"faq"                   => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"contact"               => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"news"                  => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用",
		"news-detail"           => "ダクト工事,ダクト修理,株式会社KMD,東京,千葉,空調,換気,排気,求人,採用"
	);

	if(is_single() && isset($keyword_array[$slug . '-detail'])) {
		$slug = $slug . '-detail';
	}
	
	return isset( $keyword_array[ $slug ] ) ? $keyword_array[ $slug ] : '';
}

/*	カテゴリーのSEOタグ設定　DESCRIPTION
/*---------------------------------------------------------*/
function get_current_description( $slug ) {
	$description_array = array(
		"index"                 => "東京都江戸川区の株式会社KMDは、空調用から換気用、排煙用、厨房用、産業用まで、さまざまなダクト工事を行う空調ダクト工事の専門会社です。東京・千葉エリアでダクト工事・ダクト修理がご必要の際は、お気軽にKMDまでご連絡ください。",
		"commitment"            => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」のこだわりです。チームワークと対応力、安全への取り組み、専門業者との連携によるワンストップ対応が当社の強みです。給排気設備、換気工事は当社へお任せください。",
		"service"               => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」の事業案内です。空調用から換気用、排煙用、厨房用、産業用まで、さまざまなダクト工事を承っております。江戸川区を中心とした東京・千葉、関東エリアでの施工に対応可能です。",
		"company"               => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」の会社案内です。空調用から換気用、排煙用、厨房用、産業用まで、さまざまなダクト工事を承っております。こちらでは、会社概要、アクセスマップなどが確認頂けます。",
		"construction"          => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」の施工事例です。空調用から換気用、排煙用、厨房用、産業用まで、さまざまなダクト工事を承っております。オフィス、工場、店舗など、当社の施工事例はこちらよりご確認ください。",
		"construction-detail"   => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」の施工事例詳細です。空調用から換気用、排煙用、厨房用、産業用まで、さまざまなダクト工事を承っております。オフィス、工場、店舗など、当社の施工事例の詳細が確認頂けます。",
		"recruit"               => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」の採用案内です。当社で働くメリット、漫画で見るKMD、募集一覧などが確認頂けます。知識や技術を身につける他、モノづくりの面白さを感じられるお仕事です。",
		"recruit-detail"        => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」の採用案内詳細（募集要項）です。知識や技術を身につける他、モノづくりの面白さを感じられるお仕事です。未経験からでも基礎からしっかり学べ、資格取得支援制度が充実しています。",
		"staff"                 => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」の先輩社員の声です。入ったきっかけ、仕事のやりがいや目標・面白さ、これから一緒に働く仲間（求職者）に向けてのメッセージなどが確認頂けます。",
		"workflow"              => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」の一日の流れです。現場でダクト工事に対応する先輩社員の日々の仕事・業務の流れを分かり易くご紹介。朝礼、安全確認、作業開始、休憩、片付け等が確認頂けます。",
		"faq"                   => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」のよくある質問です。採用・求人募集中です。社風、未経験、応募資格、社宅など、採用に関するよくある質問はこちらをご覧ください。",
		"contact"               => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」のお問い合わせページです。採用・求人募集中です。お仕事のご依頼・ご相談、見積依頼や、求人応募等、電話、メールにてお気軽にお問い合わせください。",
		"news"                  => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」のお知らせです。空調用から換気用、排煙用、厨房用、産業用まで、さまざまなダクト工事を承っております。このページでは、当社の最新の情報・お知らせ・ニュースを発信しています。",
		"news-detail"           => "東京・千葉のダクト工事・ダクト修理「株式会社KMD」のお知らせ詳細です。空調用から換気用、排煙用、厨房用、産業用まで、さまざまなダクト工事を承っております。このページでは、当社の最新の情報・お知らせ・ニュースの詳細が確認頂けます。"
	);
	
	if(is_single() && isset($description_array[$slug . '-detail'])) {
		$slug = $slug . '-detail';
	}

	return isset( $description_array[ $slug ] ) ? $description_array[ $slug ] : '';
}

/*	スぺてページのSEOタグ設定　H1
/*---------------------------------------------------------*/
function get_current_h1( $slug ) {
	$h1_array = array(
		"index"                 => "東京・千葉のダクト工事・ダクト修理ならKMD",
		"commitment"            => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-こだわり",
		"service"               => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-事業案内",
		"company"               => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-会社案内",
		"construction"          => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-施工事例",
		"construction-detail"   => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-施工事例詳細",
		"recruit"               => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-採用案内",
		"recruit-detail"        => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-採用案内詳細",
		"staff"                 => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-先輩社員の声",
		"workflow"              => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-一日の流れ",
		"faq"                   => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-よくある質問",
		"contact"               => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-お問い合わせ",
		"news"                  => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-お知らせ",
		"news-detail"           => "東京・千葉のダクト工事・ダクト修理なら「株式会社KMD」-お知らせ詳細"
	);

	if(is_single() && isset($h1_array[$slug . '-detail'])) {
		$slug = $slug . '-detail';
	}
	
	return isset( $h1_array[ $slug ] ) ? $h1_array[ $slug ] : '';
}

/*	カテゴリーのSEOタグ設定　TITLE
/*---------------------------------------------------------*/
function get_current_title( $slug ) {
	// 使ってはいけません
	// 以下の関数を使用します no1_theme1_custom_aioseop_title()
	$title_array = array(
		"index"                 => "株式会社KMD｜東京・千葉のダクト工事・ダクト修理ならKMD【求人募集中】",
		"commitment"            => "こだわり｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"service"               => "事業案内｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"company"               => "会社案内｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"construction"          => "施工事例｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"construction-detail"   => "施工事例詳細｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"recruit"               => "採用案内｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"recruit-detail"        => "採用案内詳細｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"staff"                 => "先輩社員の声｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"workflow"              => "一日の流れ｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"faq"                   => "よくある質問｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"contact"               => "お問い合わせ｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"news"                  => "お知らせ｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」",
		"news-detail"           => "お知らせ詳細｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」"
	);

	return isset( $title_array[ $slug ] ) ? $title_array[ $slug ] : '';
}

/*	カテゴリーのSEOタグ設定　TITLE Aioseop
/*---------------------------------------------------------*/
add_filter( 'aioseop_prev_link', '__return_empty_string' );
add_filter( 'aioseop_next_link', '__return_empty_string' );
add_filter( 'aioseop_title', 'no1_theme1_custom_aioseop_title' );
function no1_theme1_custom_aioseop_title( $title ) {
	$blogname = get_bloginfo( 'name', 'display' );

	if ( is_home() || is_front_page() ) {
		$title = '株式会社KMD'.'｜'.'東京・千葉のダクト工事・ダクト修理ならKMD【求人募集中】';
	} elseif ( is_category( 'construction' ) || in_category( 'construction' ) ) {
		$title = '施工事例'. '｜' . '東京・千葉のダクト工事・ダクト修理「株式会社KMD」';
		if (is_single()) {
			$title = '施工事例詳細｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」';
		}
	} elseif ( is_category( 'recruit-detail' ) || in_category( 'recruit-detail' ) ) {
		$title = '採用案内詳細'.'｜' . '東京・千葉のダクト工事・ダクト修理「株式会社KMD」';
	} elseif ( is_category( 'news' ) || in_category( 'news' ) ) {
		$title = 'お知らせ'.'｜'. '東京・千葉のダクト工事・ダクト修理「株式会社KMD」';
		if (is_single()) {
			$title = 'お知らせ詳細｜東京・千葉のダクト工事・ダクト修理「株式会社KMD」';
		}		
	} elseif ( is_single() ) {
		$title = get_the_title() . '｜' . $blogname;
	} 
	

	return $title;
}

/* p,brタグ削除
/*---------------------------------------------------------*/
add_filter( 'wpcf7_autop_or_not', '__return_false' );
add_filter( 'the_content', 'no1_theme1_wpautop', 9 );
add_filter( 'the_excerpt', 'no1_theme1_wpautop', 9 );
function no1_theme1_wpautop( $content ) {
	global $post;

	$remove_filter = false;
	$arr_types     = array( 'page' ); //自動整形を無効にする投稿タイプを記述 ＝固定ページ
	$post_type     = get_post_type( $post->ID );

	if ( in_array( $post_type, $arr_types ) ) {
		$remove_filter = true;
	}

	if ( $remove_filter ) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );
	}

	return $content;
}

/* アイキャッチ画像の機能を有効化します。また、その画像サイズを指定します。
/*---------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/* ウィジェット
/*---------------------------------------------------------*/
register_sidebar();

/* wp_head()実行時にget_current_category()を実行
/*---------------------------------------------------------*/
add_action( 'wp_head', 'get_current_category' );

/*	Add body class support
/*---------------------------------------------------------*/
add_filter( 'body_class', 'no1_theme1_add_body_class' );
function no1_theme1_add_body_class( $classes ) {
	$classes[] = 'animsition';

	return $classes;
}

/*	Registers an editor stylesheet for the theme.
/*---------------------------------------------------------*/
add_action( 'admin_init', 'no1_theme1_add_editor_styles' );
function no1_theme1_add_editor_styles() {
	add_editor_style( 'css/import.css' );
}

/*	サイトのURLを習得するショートコード
/*---------------------------------------------------------*/
add_shortcode( 'url', 'no1_theme1_shortcode_site_url' );
function no1_theme1_shortcode_site_url() {
	return get_bloginfo( 'url' );
}

/*	テーマフォルダのパスを取得するショートコードを作成
/*---------------------------------------------------------*/
add_shortcode( 'template_url', 'no1_theme1_shortcode_template_url' );
function no1_theme1_shortcode_template_url() {
	return get_bloginfo( 'template_url' );
}

/* Add admin CSS
/*---------------------------------------------------------*/
add_action( 'admin_head', 'no1_theme1_admin_css', 11 );
function no1_theme1_admin_css() {
	$adminCssPath = get_template_directory_uri() . '/admin.css';
	wp_enqueue_style( 'theme', $adminCssPath, false, '2020' );
}

/*	ログイン中にwpadminbar　を表示
/*---------------------------------------------------------*/
add_filter( 'show_admin_bar', 'no1_theme1_admin_bar' );
function no1_theme1_admin_bar() {
	return false;
}

/*	その他設定
/*---------------------------------------------------------*/
add_action( 'init', 'no1_theme1_disable_emoji' );
function no1_theme1_disable_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}

/*	管理画面のログインページにロゴを表示
/*---------------------------------------------------------*/
add_action( 'login_head', 'no1_theme1_login_logo' );
function no1_theme1_login_logo() {
	echo '<style type="text/css">
#login h1 a {
pointer-events: none;
background: url(' . get_bloginfo( 'template_directory' ) . '/img/common/logo.png) no-repeat;
background-size:100%;
width: 265px;
height: 45px;
margin:0 auto 20px;
}
</style>';
}

/*	contact form 7 ラジオボタンを必須
/*---------------------------------------------------------*/
add_filter( 'wpcf7_validate_radio*', 'wpcf7_checkbox_validation_filter', 10, 2 );
add_action( 'wpcf7_init', 'wpcf7_add_shortcode_radio_required' );
function wpcf7_add_shortcode_radio_required() {
	if ( function_exists( 'wpcf7_add_shortcode' ) ) {
		wpcf7_add_shortcode( array( 'radio*' ), 'wpcf7_checkbox_form_tag_handler', true );
	}
}

/*	メールアドレスチェック
/*---------------------------------------------------------*/
add_filter( 'wpcf7_validate_email', 'wpcf7_text_validation_filter_extend', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_text_validation_filter_extend', 11, 2 );
function wpcf7_text_validation_filter_extend( $result, $tag ) {
	$type           = $tag['type'];
	$name           = $tag['name'];
	$_POST[ $name ] = trim( strtr( (string) $_POST[ $name ], "\n", " " ) );

	if ( 'email' == $type || 'email*' == $type ) {
		if ( preg_match( '/(.*)_confirm$/', $name, $matches ) ) {
			$target_name = $matches[1];
			if ( $_POST[ $name ] != $_POST[ $target_name ] ) {
				if ( method_exists( $result, 'invalidate' ) ) {
					$result->invalidate( $tag, "確認用のメールアドレスが一致していません" );
				} else {
					$result['valid']           = false;
					$result['reason'][ $name ] = '確認用のメールアドレスが一致していません';
				}
			}
		}
	}

	return $result;
}

/*	低メタボックスを並べ替える[ALL IN ONE SEO]
/*---------------------------------------------------------*/
add_action( 'add_meta_boxes', 'no1_theme1_meta_boxes', 10, 2 );
function no1_theme1_meta_boxes() {
	global $wp_meta_boxes;

	if ( isset( $wp_meta_boxes['post']['normal']['high']['aiosp'] ) ) {
		$aiosp = $wp_meta_boxes['post']['normal']['high']['aiosp'];
		unset( $wp_meta_boxes['post']['normal']['high']['aiosp'] );
		$wp_meta_boxes['post']['normal']['low']['aiosp'] = $aiosp;
	}

	if ( isset( $wp_meta_boxes['page']['normal']['high']['aiosp'] ) ) {
		$aiosp = $wp_meta_boxes['page']['normal']['high']['aiosp'];
		unset( $wp_meta_boxes['page']['normal']['high']['aiosp'] );
		$wp_meta_boxes['page']['normal']['low']['aiosp'] = $aiosp;
	}
}

/* ----- 自動アップデート無効化 ----- */
add_filter( 'automatic_updater_disabled', '__return_true' );

/* ----- アップデート情報非表示 ----- */
add_filter( 'pre_site_transient_update_core', 'no1_theme1_disable_update_notifications' );
add_filter( 'pre_site_transient_update_plugins', 'no1_theme1_disable_update_notifications' );
add_filter( 'pre_site_transient_update_themes', 'no1_theme1_disable_update_notifications' );
function no1_theme1_disable_update_notifications() {
	global $wp_version;

	return (object) array( 'last_checked' => time(), 'version_checked' => $wp_version );
}

add_action( 'add_meta_boxes', 'no1_theme_custom_categories_meta_boxes', 10, 2 );
function no1_theme_custom_categories_meta_boxes( $post_type, $post ) {
	global $wp_meta_boxes;

	foreach ( get_object_taxonomies( $post ) as $tax_name ) {
		if ( ! $tax = get_taxonomy( $tax_name ) ) {
			continue;
		}

		if ( ! $tax->show_ui || false === $tax->meta_box_cb ) {
			continue;
		}

		if ( ! is_taxonomy_hierarchical( $tax_name ) ) {
			continue;
		}

		$tax_meta_box_id = $tax_name . 'div';
		if ( isset( $wp_meta_boxes[ $post_type ]['side']['core'][ $tax_meta_box_id ] ) ) {
			$wp_meta_boxes[ $post_type ]['side']['core'][ $tax_meta_box_id ]['callback'] = 'no1_theme_post_categories_meta_box';
		}
	}
}

/**
 * Display post categories form fields.
 *
 * @param WP_Post $post Post object.
 * @param array $box {
 *     Categories meta box arguments.
 *
 * @type string $id Meta box 'id' attribute.
 * @type string $title Meta box title.
 * @type callable $callback Meta box display callback.
 * @type array $args {
 *         Extra meta box arguments.
 *
 * @type string $taxonomy Taxonomy. Default 'category'.
 *     }
 * }
 * @todo Create taxonomy-agnostic wrapper for this.
 *
 * @since 2.6.0
 * @see post_categories_meta_box()
 *
 */
function no1_theme_post_categories_meta_box( $post, $box ) {
	$defaults = array( 'taxonomy' => 'category' );
	if ( ! isset( $box['args'] ) || ! is_array( $box['args'] ) ) {
		$args = array();
	} else {
		$args = $box['args'];
	}
	$parsed_args = wp_parse_args( $args, $defaults );
	$tax_name    = esc_attr( $parsed_args['taxonomy'] );
	$taxonomy    = get_taxonomy( $parsed_args['taxonomy'] );
	?>
	<div id="taxonomy-<?php echo $tax_name; ?>" class="categorydiv">
		<ul id="<?php echo $tax_name; ?>-tabs" class="category-tabs">
			<li class="tabs"><a href="#<?php echo $tax_name; ?>-all"><?php echo $taxonomy->labels->all_items; ?></a></li>
			<li class="hide-if-no-js">
				<a href="#<?php echo $tax_name; ?>-pop"><?php echo esc_html( $taxonomy->labels->most_used ); ?></a></li>
		</ul>

		<div id="<?php echo $tax_name; ?>-pop" class="tabs-panel" style="display: none;">
			<ul id="<?php echo $tax_name; ?>checklist-pop" class="categorychecklist form-no-clear">
				<?php $popular_ids = wp_popular_terms_checklist( $tax_name ); ?>
			</ul>
		</div>

		<div id="<?php echo $tax_name; ?>-all" class="tabs-panel">
			<?php
			$name = ( 'category' === $tax_name ) ? 'post_category' : 'tax_input[' . $tax_name . ']';
			// Allows for an empty term set to be sent. 0 is an invalid term ID and will be ignored by empty() checks.
			echo "<input type='hidden' name='{$name}[]' value='0' />";
			?>
			<ul id="<?php echo $tax_name; ?>checklist" data-wp-lists="list:<?php echo $tax_name; ?>" class="categorychecklist form-no-clear">
				<?php
				no1_theme_wp_terms_checklist(
					$post->ID,
					array(
						'taxonomy'     => $tax_name,
						'popular_cats' => $popular_ids,
					)
				);
				?>
			</ul>
		</div>
		<?php if ( current_user_can( $taxonomy->cap->edit_terms ) ) : ?>
			<div id="<?php echo $tax_name; ?>-adder" class="wp-hidden-children">
				<a id="<?php echo $tax_name; ?>-add-toggle" href="#<?php echo $tax_name; ?>-add" class="hide-if-no-js taxonomy-add-new">
					<?php
					/* translators: %s: Add New taxonomy label. */
					printf( __( '+ %s' ), $taxonomy->labels->add_new_item );
					?>
				</a>
				<p id="<?php echo $tax_name; ?>-add" class="category-add wp-hidden-child">
					<label class="screen-reader-text" for="new<?php echo $tax_name; ?>"><?php echo $taxonomy->labels->add_new_item; ?></label>
					<input type="text" name="new<?php echo $tax_name; ?>" id="new<?php echo $tax_name; ?>" class="form-required form-input-tip" value="<?php echo esc_attr( $taxonomy->labels->new_item_name ); ?>" aria-required="true"/>
					<label class="screen-reader-text" for="new<?php echo $tax_name; ?>_parent">
						<?php echo $taxonomy->labels->parent_item_colon; ?>
					</label>
					<?php
					$parent_dropdown_args = array(
						'taxonomy'         => $tax_name,
						'hide_empty'       => 0,
						'name'             => 'new' . $tax_name . '_parent',
						'orderby'          => 'name',
						'hierarchical'     => 1,
						'show_option_none' => '&mdash; ' . $taxonomy->labels->parent_item . ' &mdash;',
					);

					/**
					 * Filters the arguments for the taxonomy parent dropdown on the Post Edit page.
					 *
					 * @param array $parent_dropdown_args {
					 *     Optional. Array of arguments to generate parent dropdown.
					 *
					 * @type string $taxonomy Name of the taxonomy to retrieve.
					 * @type bool $hide_if_empty True to skip generating markup if no
					 *                                      categories are found. Default 0.
					 * @type string $name Value for the 'name' attribute
					 *                                      of the select element.
					 *                                      Default "new{$tax_name}_parent".
					 * @type string $orderby Which column to use for ordering
					 *                                      terms. Default 'name'.
					 * @type bool|int $hierarchical Whether to traverse the taxonomy
					 *                                      hierarchy. Default 1.
					 * @type string $show_option_none Text to display for the "none" option.
					 *                                      Default "&mdash; {$parent} &mdash;",
					 *                                      where `$parent` is 'parent_item'
					 *                                      taxonomy label.
					 * }
					 * @since 4.4.0
					 *
					 */
					$parent_dropdown_args = apply_filters( 'post_edit_category_parent_dropdown_args', $parent_dropdown_args );

					wp_dropdown_categories( $parent_dropdown_args );
					?>
					<input type="button" id="<?php echo $tax_name; ?>-add-submit" data-wp-lists="add:<?php echo $tax_name; ?>checklist:<?php echo $tax_name; ?>-add" class="button category-add-submit" value="<?php echo esc_attr( $taxonomy->labels->add_new_item ); ?>"/>
					<?php wp_nonce_field( 'add-' . $tax_name, '_ajax_nonce-add-' . $tax_name, false ); ?>
					<span id="<?php echo $tax_name; ?>-ajax-response"></span>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Output an unordered list of checkbox input elements labelled with term names.
 *
 * Taxonomy-independent version of wp_category_checklist().
 *
 * @param int $post_id Optional. Post ID. Default 0.
 * @param array|string $args {
 *     Optional. Array or string of arguments for generating a terms checklist. Default empty array.
 *
 * @type int $descendants_and_self ID of the category to output along with its descendants.
 *                                        Default 0.
 * @type int[] $selected_cats Array of category IDs to mark as checked. Default false.
 * @type int[] $popular_cats Array of category IDs to receive the "popular-category" class.
 *                                        Default false.
 * @type Walker $walker Walker object to use to build the output.
 *                                        Default is a Walker_Category_Checklist instance.
 * @type string $taxonomy Taxonomy to generate the checklist for. Default 'category'.
 * @type bool $checked_ontop Whether to move checked items out of the hierarchy and to
 *                                        the top of the list. Default true.
 * @type bool $echo Whether to echo the generated markup. False to return the markup instead
 *                                        of echoing it. Default true.
 * }
 * @return string HTML list of input elements.
 * @since 3.0.0
 * @since 4.4.0 Introduced the `$echo` argument.
 * @see wp_terms_checklist()
 *
 */
function no1_theme_wp_terms_checklist( $post_id = 0, $args = array() ) {
	$defaults = array(
		'descendants_and_self' => 0,
		'selected_cats'        => false,
		'popular_cats'         => false,
		'walker'               => null,
		'taxonomy'             => 'category',
		'checked_ontop'        => true,
		'echo'                 => true,
	);

	/**
	 * Filters the taxonomy terms checklist arguments.
	 *
	 * @param array $args An array of arguments.
	 * @param int $post_id The post ID.
	 *
	 * @since 3.4.0
	 *
	 * @see wp_terms_checklist()
	 *
	 */
	$params = apply_filters( 'wp_terms_checklist_args', $args, $post_id );

	$parsed_args = wp_parse_args( $params, $defaults );

	if ( empty( $parsed_args['walker'] ) || ! ( $parsed_args['walker'] instanceof Walker ) ) {
		$walker = new Walker_Category_Checklist;
	} else {
		$walker = $parsed_args['walker'];
	}

	$taxonomy             = $parsed_args['taxonomy'];
	$descendants_and_self = (int) $parsed_args['descendants_and_self'];

	$args = array( 'taxonomy' => $taxonomy );

	$tax              = get_taxonomy( $taxonomy );
	$args['disabled'] = ! current_user_can( $tax->cap->assign_terms );

	$args['list_only'] = ! empty( $parsed_args['list_only'] );

	if ( is_array( $parsed_args['selected_cats'] ) ) {
		$args['selected_cats'] = array_map( 'intval', $parsed_args['selected_cats'] );
	} elseif ( $post_id ) {
		$args['selected_cats'] = wp_get_object_terms( $post_id, $taxonomy, array_merge( $args, array( 'fields' => 'ids' ) ) );
	} else {
		$args['selected_cats'] = array();
	}

	if ( is_array( $parsed_args['popular_cats'] ) ) {
		$args['popular_cats'] = array_map( 'intval', $parsed_args['popular_cats'] );
	} else {
		$args['popular_cats'] = get_terms(
			array(
				'taxonomy'     => $taxonomy,
				'fields'       => 'ids',
				'orderby'      => 'count',
				'order'        => 'DESC',
				'number'       => 10,
				'hierarchical' => false,
			)
		);
	}

	if ( $descendants_and_self ) {
		$categories = (array) get_terms(
			array(
				'taxonomy'     => $taxonomy,
				'child_of'     => $descendants_and_self,
				'hierarchical' => 0,
				'hide_empty'   => 0,
			)
		);
		$self       = get_term( $descendants_and_self, $taxonomy );
		array_unshift( $categories, $self );
	} else {
		$categories = (array) get_terms(
			array(
				'taxonomy' => $taxonomy,
				'get'      => 'all',
			)
		);
	}

	$output = '';

	if ( $parsed_args['checked_ontop'] ) {
		// Post-process $categories rather than adding an exclude to the get_terms() query
		// to keep the query the same across all posts (for any query cache).
		$checked_categories = array();
		$child_top          = array();
		$keys               = array_keys( $categories );

		foreach ( $keys as $k ) {
			if ( in_array( $categories[ $k ]->term_id, $args['selected_cats'], true ) ) {

				if ( $_child = get_term_children( $categories[ $k ]->term_id, $taxonomy ) ) {
					$child_top = array_unique( array_merge( $child_top, $_child ) );
				}

				$checked_categories[] = $categories[ $k ];
				unset( $categories[ $k ] );
			}
		}

		$_keys = array_keys( $categories );
		foreach ( $_keys as $_k ) {
			if ( in_array( $categories[ $_k ]->term_id, $child_top ) ) {
				$checked_categories[] = $categories[ $_k ];
				unset( $categories[ $_k ] );
			}
		}

		// Put checked categories on top.
		$output .= $walker->walk( $checked_categories, 0, $args );
	}
	// Then the rest of them.
	$output .= $walker->walk( $categories, 0, $args );

	if ( $parsed_args['echo'] ) {
		echo $output;
	}

	return $output;
}

/*	並べ替えカテゴリ
/*---------------------------------------------------------*/
if ( function_exists( 'acf_add_local_field_group' ) ):
	acf_add_local_field_group( array(
		'key'                   => 'group_5f582be096e72',
		'title'                 => '並べ替えカテゴリ',
		'fields'                => array(
			array(
				'key'               => 'field_5f582c2177e81',
				'label'             => 'ソート順',
				'name'              => 'sort_order',
				'type'              => 'number',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => 0,
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'min'               => '',
				'max'               => '',
				'step'              => '',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'taxonomy',
					'operator' => '==',
					'value'    => 'category',
				),
			),
		),
		'menu_order'            => 999,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
	) );
endif;
