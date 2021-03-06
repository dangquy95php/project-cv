<?php
/* ===============================================================================
  カスタム投稿設定ファイル
=============================================================================== */

function my_custompost()
{

	//////////////////////////////////////////////////////////////////////////////////
	// ダウンロード資料 download
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "ダウンロードコンテンツ";
	$cp["post_type"] = "download";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'taxonomies' => array('post_tag'),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));



	//////////////////////////////////////////////////////////////////////////////////
	// 製品管理 product_list
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "製品管理";
	$cp["post_type"] = "product_list";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('product_tag', 'product_list', array(
		'label'        => 'ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));

	//////////////////////////////////////////////////////////////////////////////////
	// 導入事例 product_case
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "導入事例";
	$cp["post_type"] = "product_case";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'taxonomies' => array('post_tag'),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('product_case_cat1', 'product_case', array(
		'label'        => 'カテゴリ 従業員数',
		'public'       => true,
		'hierarchical' => true,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));

	register_taxonomy('product_case_cat2', 'product_case', array(
		'label'        => 'カテゴリ 業種',
		'public'       => true,
		'hierarchical' => true,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));

	register_taxonomy('product_case_cat3', 'product_case', array(
		'label'        => 'カテゴリ 導入製品',
		'public'       => true,
		'hierarchical' => true,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));

	//////////////////////////////////////////////////////////////////////////////////
	// HR News
	// hr_news
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "HR News";
	$cp["post_type"] = "hr_news";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'taxonomies' => array('post_tag'),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', /*'editor',*/ 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('hr_news_tag', 'hr_news', array(
		'label'        => 'HR News ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));


	//////////////////////////////////////////////////////////////////////////////////
	// faq_column
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "なんでもQ&A";
	$cp["post_type"] = "faq_column";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'taxonomies' => array('post_tag'),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('faq_column_tag', 'faq_column', array(
		'label'        => '人事労務の何でもQ&A ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));


	//////////////////////////////////////////////////////////////////////////////////
	// glossary
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "用語集";
	$cp["post_type"] = "glossary";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'taxonomies' => array('post_tag'),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('glossary_tag', 'glossary', array(
		'label'        => '用語集 ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));

	//////////////////////////////////////////////////////////////////////////////////
	// seminar
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "セミナー";
	$cp["post_type"] = "seminar";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'taxonomies' => array('post_tag'),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('seminar_tag', 'seminar', array(
		'label'        => 'セミナー ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));


	//////////////////////////////////////////////////////////////////////////////////
	// tool_guide
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "人事労務のツールガイド";
	$cp["post_type"] = "tool_guide";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'taxonomies' => array('post_tag'),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('tool_guide_tag', 'tool_guide', array(
		'label'        => '人事労務のツールガイド ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));

	//////////////////////////////////////////////////////////////////////////////////
	// 人事労務の業務改善ガイド
	// gyomu_kaizen
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "業務改善ガイド";
	$cp["post_type"] = "gyomu_kaizen";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'taxonomies' => array('post_tag'),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('gyomu_kaizen_tag', 'gyomu_kaizen', array(
		'label'        => 'ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));

	//////////////////////////////////////////////////////////////////////////////////
	// news-topics
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "お知らせ";
	$cp["post_type"] = "news-topics";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('news-topics_cat', 'news-topics', array(
		'label'        => 'カテゴリ',
		'public'       => true,
		'hierarchical' => true,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));



	//////////////////////////////////////////////////////////////////////////////////
	// news-topics
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "執筆者";
	$cp["post_type"] = "writer";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 10,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));


	//////////////////////////////////////////////////////////////////////////////////
	// product_solutions
	//////////////////////////////////////////////////////////////////////////////////
	$cp["label"]   = "ソリューション";
	$cp["post_type"] = "product_solutions";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('product_solutions_cat', 'product_solutions', array(
		'label'        => 'カテゴリ',
		'public'       => true,
		'hierarchical' => true,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));


	register_taxonomy('product_solutions_tag', 'product_solutions', array(
		'label'        => 'ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));



	//////////////////////////////////////////////////////////////////////////////////
	// product_feature
	//////////////////////////////////////////////////////////////////////////////////
	$cp["label"]   = "課題別ソリューション";
	$cp["post_type"] = "product_feature";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'thumbnail'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('product_feature_cat', 'product_feature', array(
		'label'        => 'カテゴリ',
		'public'       => true,
		'hierarchical' => true,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));


	register_taxonomy('product_feature_tag', 'product_feature', array(
		'label'        => 'ローカルタグ',
		'public'       => true,
		'hierarchical' => false,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));


	//////////////////////////////////////////////////////////////////////////////////
	// product_faq
	//////////////////////////////////////////////////////////////////////////////////

	$cp["label"]   = "よくあるご質問";
	$cp["post_type"] = "product_faq";

	register_post_type($cp["post_type"], array(
		'label' => $cp["label"],
		'menu_icon'   => 'dashicons-welcome-write-blog',
		'menu_position' => 5,
		'has_archive' => true,
		'description' => $cp["label"],
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => $cp["post_type"],
		'capabilities' => array(
			'edit_posts' => 'edit_' . $cp["post_type"],
			'publish_posts' => 'publish_' . $cp["post_type"],
			'edit_published_posts' => 'edit_published_' . $cp["post_type"],
			'edit_others_posts' => 'edit_others_' . $cp["post_type"],
			'read_private_posts' => 'read_private_' . $cp["post_type"],
			'edit_private_posts' => 'edit_private_' . $cp["post_type"],
			'delete_posts' => 'delete_' . $cp["post_type"],
			'delete_published_posts' => 'delete_published_' . $cp["post_type"],
			'delete_others_posts' => 'delete_others_' . $cp["post_type"],
			'delete_private_posts' => 'delete_private_' . $cp["post_type"],
		),
		'hierarchical' => true,
		'rewrite' => array('slug' => $cp["post_type"], 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor'),
		'labels' => array(
			'name' => $cp["label"],
			'singular_name' => $cp["label"],
			'menu_name' => $cp["label"],
			'add_new' => '新規追加',
			'add_new_item' => $cp["label"] . 'を新規追加',
			'edit' => 'Edit',
			'edit_item' => $cp["label"] . 'を編集',
			'new_item' => 'New ' . $cp["label"],
			'view' => $cp["label"] . 'を表示',
			'view_item' => $cp["label"] . 'を表示',
			'search_items' => $cp["label"] . 'を検索',
			'not_found' => $cp["label"] . 'はありません',
			'not_found_in_trash' => 'ゴミ箱は空です',
			'parent' => 'Parent ' . $cp["label"],
		),
	));

	register_taxonomy('product_faq_cat', 'product_faq', array(
		'label'        => 'カテゴリ',
		'public'       => true,
		'hierarchical' => true,
		'capabilities' => array(
			'manage_terms' => 'edit_' . $cp["post_type"],
			'edit_terms' => 'edit_' . $cp["post_type"],
			'delete_terms' => 'edit_' . $cp["post_type"],
			'assign_terms' => 'edit_' . $cp["post_type"],
		)
	));
}


add_action('init', 'my_custompost', 0);


//////////////////////////////////////////////////////////////////
// More Post
//////////////////////////////////////////////////////////////////
function more_post_ajax()
{
	$offset   = $_POST["offset"];
	$posttype = $_POST["post_type"];
	$tag      = $_POST["tag"];

	$func = isset($_POST["component_loop"]) ? $_POST["component_loop"] : 'component_loop_1';
	$args = [];
	if (isset($posttype))
		$args['post_type'] = $posttype;
	if (isset($offset))
		$args['offset'] = $offset;
	if (isset($tag))
		$args['tag'] = $tag;

	$args['posts_per_page'] = isset($_POST['limit']) ? $_POST['limit'] : 6;
	$args['order'] = 'DESC';
	$query = new WP_Query($args);

	$html  = '';
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			ob_start();
			call_user_func($func);
			$html .= ob_get_contents();
			ob_end_clean();
		}
		wp_send_json_success(['html' => $html, 'count' => $query->post_count], 200);
	} else {
		wp_send_json_error(['html' => '', 'count' => 0], 500);
	}
}
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');