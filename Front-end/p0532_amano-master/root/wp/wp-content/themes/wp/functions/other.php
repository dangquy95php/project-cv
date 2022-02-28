<?php
/* ===============================================================================
  その他
=============================================================================== */

////////////////////////////////////////////////
// 改行変換
////////////////////////////////////////////////
function ConvertText($data)
{

	$data = rtrim($data);
	$data = nl2br($data);
	echo $data;
}

////////////////////////////////////////////////
// NEWマーク表示
////////////////////////////////////////////////
function mark_new_post($days, $echo = '')
{
	$today     = date_i18n('U');
	$entry_day = get_the_time('U');
	$post_day  = date('U', ($today - $entry_day)) / 86400;

	if ($days > $post_day) {
		echo empty($echo) ? 'NEW' : $echo;
	}
}

////////////////////////////////////////////////
// WordPress Popular Postsの返り値を変更
////////////////////////////////////////////////
function custom_single_popular_post($content, $p, $instance)
{
	component_loop_10();
}
add_filter('wpp_post', 'custom_single_popular_post', 10, 3);

////////////////////////////////////////////////
// 表示文字数制限
////////////////////////////////////////////////
function characters_limit($text, $limit)
{
	if (mb_strlen($text) > $limit) {
		$text = mb_substr($text, 0, $limit);
		$text .= '･･･';
	}
	echo $text;
}

////////////////////////////////////////////////
//  Aioseoでdescriptionの設定がない場合は
// 柔軟コンテンツの最初の本文を表示する
////////////////////////////////////////////////
add_filter('aioseop_description', 'custom_aioseop_description');
function custom_aioseop_description($description)
{

	if (empty($description)) {

		$description = '';
		if (get_the_content()) {
			$description .= wp_strip_all_tags(get_the_content());
		}

		if (get_field('single_lead')) {
			$description .= wp_strip_all_tags(get_field('single_lead'));
		}

		if (have_rows('single_flexible_content')) {
			while (have_rows('single_flexible_content')) : the_row();
				if (get_row_layout() == 'single_contents') :
					$description .= wp_strip_all_tags(get_sub_field('single_contents_text'));
				endif;
			endwhile;
		}
	}

	$limit = 120;
	if (mb_strlen($description) > $limit) {
		$description = mb_substr($description, 0, $limit) . '･･･';
	}

	return $description;
}

////////////////////////////////////////////////
//  Aioseo カスタム投稿アーカイブのmeta制御
////////////////////////////////////////////////

function my_title($title){
  if(is_post_type_archive('download')){
    $title = 'お役立ちコンテンツダウンロード｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」';
	return $title;
  } elseif(is_post_type_archive('gyomu_kaizen')) {
    $title = '業務改善ガイド｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」';
    return $title;
  } elseif(is_post_type_archive('hr_news')) {
    $title = 'HR News｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」';
    return $title;
  } elseif(is_post_type_archive('faq_column')) {
    $title = 'なんでもQ＆A｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」';
    return $title;
  } elseif(is_post_type_archive('seminar')) {
    $title = 'セミナー・イベント情報｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」';
    return $title;
  } elseif(is_post_type_archive('tool_guide')) {
    $title = 'ツールガイド｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」';
    return $title;
  } elseif(is_post_type_archive('glossary')) {
    $title = '用語集｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」';
    return $title;
  } elseif(is_post_type_archive('product_case')) {
    $title = '勤怠管理システムの導入事例｜アマノ';
    return $title;
  }
  //  elseif(is_tag()) {
  //   $title = get_the_tags().'｜タヨロウ｜バックオフィスを支援する「頼れる労務ONLINE」';
  //   return $title;
  // }
	return $title;
}
add_filter('aioseop_title', 'my_title');

function my_description($description){
  if(is_post_type_archive('download')){
    $description = 'お役立ちコンテンツダウンロードの一覧ページです。';
    return $description;
  } elseif(is_post_type_archive('gyomu_kaizen')) {
    $description = '業務改善ガイドの一覧ページです。';
    return $description;
  } elseif(is_post_type_archive('hr_news')) {
    $description = 'HR Newsの一覧ページです。';
    return $description;
  } elseif(is_post_type_archive('faq_column')) {
    $description = 'なんでもQ＆Aの一覧ページです。';
    return $description;
  } elseif(is_post_type_archive('seminar')) {
    $description = 'セミナー・イベント情報の一覧ページです。';
    return $description;
  } elseif(is_post_type_archive('tool_guide')) {
    $description = 'ツールガイドの一覧ページです。';
    return $description;
  } elseif(is_post_type_archive('glossary')) {
    $description = '用語集の一覧ページです。';
    return $description;
  } elseif(is_post_type_archive('product_case')) {
    $description = '勤怠管理システム「TimePro(タイムプロ)シリーズ」の導入事例をご紹介。TimeProシリーズは出荷本数5万本以上、累計2万社以上に導入された勤怠管理のノウハウが凝縮させたシステムです。';
    return $description;
  }
  return $description;
}
add_filter('aioseop_description', 'my_description');

////////////////////////////////////////////////
//  ACF option
////////////////////////////////////////////////
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> '導入企業一覧',
		'menu_title'	=> '導入企業一覧',
		'menu_slug' => 'case_list',
  ));
  acf_add_options_page(array(
	'page_title' 	=> 'ピックアップ記事',
	'menu_title'	=> 'ピックアップ記事',
	'menu_slug' => 'pick_up_option',
));
}