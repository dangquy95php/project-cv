<?php

if ( ! function_exists( 'echo_title' ) ):
	function echo_title( $slug, $post ) {
		// -------------------------------------------------
		// title 設定 : カスタムフィールドから設定。
		// カスタムフィールドが空の場合、スラッグ別に設定。
		// -------------------------------------------------
		if ( get_post_meta( $post->ID, "textfield_title", true ) ) {
			// カスタムフィールドに入っている値を取得して表示
			wp_title( '|', true, 'right' );
			echo post_custom( 'textfield_title' );
		} else {
			// カスタムフィールドに値が入っていない場合の処理
			if ( $wk_title = get_current_title( $slug ) ) {
				if ( $slug == "index" ) {
					echo $wk_title;
				} else {
					wp_title( '|', true, 'right' );
					echo $wk_title;
				}
			} else {
				wp_title( '|', true, 'right' );
				bloginfo( 'name' );
			}
		}
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'echo_keyword' ) ):
	function echo_keyword( $slug, $post ) {
		// -------------------------------------------------
		// Keyword 設定 : カスタムフィールドから設定。
		// カスタムフィールドが空の場合、スラッグ別に設定。
		// -------------------------------------------------
		if ( get_post_meta( $post->ID, "textfield_keyword", true ) ) {
			// カスタムフィールドに入っている値を取得して表示
			echo post_custom( 'textfield_keyword' );
		} else {
			// カスタムフィールドに値が入っていない場合の処理
			if ( $wk_keyword = get_current_keyword( $slug ) ) {
				echo $wk_keyword;
			} else {
				bloginfo( 'name' );
			}
		}
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'echo_description' ) ):
	function echo_description( $slug, $post ) {
		// -------------------------------------------------
		// Description 設定 : カスタムフィールドから設定。
		// カスタムフィールドが空の場合、スラッグ別に設定。
		// -------------------------------------------------
		if ( get_post_meta( $post->ID, "textfield_description", true ) ) {
			// カスタムフィールドに入っている値を取得して表示
			echo post_custom( 'textfield_description' );
		} else {
			// カスタムフィールドに値が入っていない場合の処理
			if ( is_single() ) {
				$desc_add = '| ' . get_the_title();
			} else {
				$desc_add = '';
			}

			if ( $wk_description = get_current_description( $slug ) ) {
				echo $wk_description . $desc_add;
			} else {
				bloginfo( 'name' );
				echo $desc_add;
			}
		}
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'echo_h1' ) ):
	function echo_h1( $slug, $post, $default_h1 = "" ) {
		// -------------------------------------------------
		// h1 設定 : カスタムフィールドから設定。
		// カスタムフィールドが空の場合、スラッグ別に設定。
		// -------------------------------------------------
		if ( get_post_meta( $post->ID, "textfield_h1", true ) ) {
			// カスタムフィールドに入っている値を取得して表示
			$wk_h1 = post_custom( 'textfield_h1' );
		} else {
			// カスタムフィールドに値が入っていない場合の処理
			$wk_h1 = get_current_h1( $slug );
			if ( $wk_h1 == "" ) {
				$wk_h1 = $default_h1;
			}
		}

		echo $wk_h1;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'basic_auth' ) ):
	/*	べシック認証
	/*---------------------------------------------------------*/
	function basic_auth( $auth_list, $realm = "Restricted Area", $failed_text = "認証に失敗しました" ) {
		if ( isset( $_SERVER['PHP_AUTH_USER'] ) and isset( $auth_list[ $_SERVER['PHP_AUTH_USER'] ] ) ) {
			if ( $auth_list[ $_SERVER['PHP_AUTH_USER'] ] == $_SERVER['PHP_AUTH_PW'] ) {
				return $_SERVER['PHP_AUTH_USER'];
			}
		}
		header( 'WWW-Authenticate: Basic realm="' . $realm . '"' );
		header( 'HTTP/1.0 401 Unauthorized' );
		header( 'Content-type: text/html; charset=' . mb_internal_encoding() );
		die( $failed_text );
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'get_current_slug' ) ):
	function get_current_slug() {
		global $_current_slug;

		if ( $_current_slug ) {
			return $_current_slug;
		}

		if ( is_home() || is_front_page() ) {
			return "index";
		}

		if ( is_404() ) {
			return "404";
		}

		if ( ! is_page() ) {
			get_current_category();
			global $_current_category;

			$cat_now = MyCategoryClass::get_the_category_all( $_current_category );
			$slug    = $cat_now->cat_top_slug;
		} else {
			global $post;

			$page = get_post( get_the_ID() );
			$slug = $page->post_name;

			if ( $page->post_parent != 0 ) {
				// -----------------------------------------------
				// 子ページの場合 slug は親ページのものにリセット
				// -----------------------------------------------
				$top_page_id = array_pop( get_post_ancestors( $post->ID ) );
				$parent_page = get_post( $top_page_id );
				$slug        = $parent_page->post_name;
			}
		}

		$_current_slug = $slug;

		return $slug;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'get_current_slug_child' ) ):
	function get_current_slug_child() {
		global $_current_slug_child;

		if ( $_current_slug_child ) {
			return $_current_slug_child;
		}

		if ( is_home() || is_front_page() ) {
			return "index";
		}

		if ( is_404() ) {
			return "404";
		}

		if ( ! is_page() ) {
			get_current_category();
			global $_current_category;

			$cat_now = MyCategoryClass::get_the_category_all( $_current_category );
			$slug    = $cat_now->slug;
		} else {
			global $post;

			$page = get_post( get_the_ID() );
			$slug = $page->post_name;

			if ( $page->post_parent != 0 ) {
				// -----------------------------------------------
				// 子ページの場合 slug は親ページのものにリセット
				// -----------------------------------------------
				$top_page_id = array_pop( get_post_ancestors( $post->ID ) );
				$parent_page = get_post( $top_page_id );
				$slug        = $parent_page->post_name;
			}
		}

		$_current_slug_child = $slug;

		return $slug;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'get_current_category' ) ):
	function get_current_category() {
		global $_current_category;

		if ( $_current_category ) {
			return $_current_category;
		}

		$cate = null;
		if ( is_category() ) {
			//カテゴリー表示だったら
			$now_cate = get_query_var( 'cat' );
			$cate     = get_category( $now_cate );
		} else if ( is_single() ) {
			//シングルページ表示だったら
			$cates        = get_the_category();
			$use_category = 0;
			$i            = 0;

			foreach ( $cates as $cate ) {
				//未分類を除外した配列の一番初めのカテゴリを選択
				if ( $cate->category_parent > 0 && $use_category == 0 ) {
					$use_category = $i;
				}
				$i ++;
			}

			$cate = $cates[ $use_category ];
		}

		if ( $cate ) {
			//カテゴリーのオブジェクトごと保持
			$_current_category = $cate;
		}

		return $cate;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'get_parent_id_of_current_slug' ) ):
	function get_parent_id_of_current_slug() {
		get_current_category();
		global $_current_category;

		$cat_now = MyCategoryClass::get_the_category_all( $_current_category );

		return $cat_now->parent;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'get_cat_slug' ) ):
	function get_cat_slug( $cat_id ) {
		$cat_id   = (int) $cat_id;
		$category = &get_category( $cat_id );

		return $category->slug;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'mark_new_post' ) ):
	// mark new post
	function mark_new_post( $days, $echo = '' ) {
		$today     = date_i18n( 'U' );
		$entry_day = get_the_time( 'U' );
		$post_day  = date( 'U', ( $today - $entry_day ) ) / 86400;

		if ( $days > $post_day ) {
			echo empty( $echo ) ? '<span class="lable-new">NEW</span>' : $echo;
		}
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'get_template_url' ) ):
	function get_template_url( $path = '' ) {
		global $__template_url;

		if ( ! $__template_url ) {
			$__template_url = get_bloginfo( 'template_directory', 'display' );
		}

		return $__template_url . (string) $path;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'template_url' ) ):
	function template_url( $path = '' ) {
		echo get_template_url( $path );
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'get_blog_url' ) ):
	function get_blog_url( $path = '' ) {
		global $__blog_url;

		if ( ! $__blog_url ) {
			$__blog_url = get_bloginfo( 'url', 'display' );
		}

		return $__blog_url . (string) $path;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'blog_url' ) ):
	function blog_url( $path = '' ) {
		if ( ! empty( $path ) ) {
			$path = '/' . trim( $path, '/\\' ) . '/';
		}

		echo get_blog_url( $path );
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'is_page_parent' ) ):
	function is_page_parent( $slug, $parent ) {
		return $slug !== $parent && is_page( $slug ) && get_current_slug() === $parent;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'is_menu_active' ) ):
	function is_menu_active( $class = 'active', ...$slugs ) {
		$slug = get_current_slug();

		if ( in_array( $slug, $slugs ) ) {
			echo $class;
		}
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'is_submenu_active' ) ):
	function is_submenu_active( $class = 'active', $parent = null, ...$slugs ) {
		$slug = get_current_slug();

		if ( $slug !== $parent ) {
			echo '';
		} elseif ( $parent && is_page( $parent ) ) {
			echo $class;
		} else {
			foreach ( $slugs as $_slug ) {
				if ( is_page( $_slug ) ) {
					echo $class;
					break;
				}
			}
		}
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'is_current_slug' ) ):
	function is_current_slug( ...$slugs ) {
		$slug = get_current_slug();

		if ( in_array( $slug, $slugs ) ) {
			return true;
		}

		return false;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'the_title_substr' ) ):
	function the_title_substr( $len = 40, $echo = true ) {
		$title  = get_the_title();
		$strlen = strlen( $title );

		if ( $strlen == 0 ) {
			return $title;
		}

		if ( $len < $strlen ) {
			$title = substr( $title, 0, $len ) . '...';
		}

		if ( $echo ) {
			echo $title;
		}

		return $title;
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( '_bcn_display' ) ):
	function _bcn_display() {
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		} else {
			echo '<li class="breadcrumb_item"><span>プラグインブレッドクラムNavXTが見つかりません</span></li>';
		}
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( '_wp_pagenavi' ) ):
	function _wp_pagenavi( $args = array() ) {
		if ( function_exists( 'wp_pagenavi' ) ) {
			wp_pagenavi( $args );
		} else {
			echo '<div>プラグインWP-PageNaviが見つかりません</div>';
		}
	}
endif;

/*---------------------------------------------------------*/

add_filter( "manage_edit-category_columns", 'no1_theme_add_category_columns', 10 );
function no1_theme_add_category_columns( $columns ) {
	if ( isset( $columns['posts'] ) ) {
		$col_post = $columns['posts'];
		unset( $columns['posts'] );
	}

	if ( function_exists( 'get_field' ) ) {
		$columns['sort_order'] = 'ソート順';
	}

	if ( isset( $col_post ) ) {
		$columns['posts'] = $col_post;
	}

	return $columns;
}

/*---------------------------------------------------------*/

add_action( "manage_category_custom_column", 'no1_theme_manage_category_custom_column', 10, 3 );
function no1_theme_manage_category_custom_column( $value, $column_name, $term_id ) {
	if ( $column_name == 'sort_order' && function_exists( 'get_field' ) ) {
		$term = get_term( $term_id );
		if ( isset( $term->term_id ) ) {
			$value = get_field( 'sort_order', $term );
			if ( empty( $value ) || ! is_numeric( $value ) ) {
				$value = 0;
			}
		}
	}

	return $value;
}

/*	並べ替えカテゴリ
/*---------------------------------------------------------*/
if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key' => 'group_5f582be096e72',
		'title' => '並べ替えカテゴリ',
		'fields' => array(
			array(
				'key' => 'field_5f582c2177e81',
				'label' => 'ソート順',
				'name' => 'sort_order',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'category',
				),
			),
		),
		'menu_order' => 999,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
endif;

/*---------------------------------------------------------*/

function the_category_list( $category = null ) {
	$list = array();

	if ( null !== $category ) {
		if ( $base_cat = get_term_by( is_numeric( $category ) ? 'id' : 'slug', $category, 'category' ) ) {
			$base_cat = get_category( $base_cat );
		}
	} else {
		$base_cat = get_base_category();
	}

	if ( ! $base_cat || empty( $base_cat->term_id ) ) {
		return $list;
	}

	$args = array(
		'type'       => 'post',
		'parent'     => $base_cat->term_id,
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => false,
		'taxonomy'   => 'category',
	);

	if ( function_exists( 'get_field' ) ) {
		$args['orderby']  = 'sort_order';
		$args['meta_key'] = 'sort_order';
	}

	$child = get_categories( $args );

	if ( is_array( $child ) ) {
		$list = array_merge( array( $base_cat ), $child );
	}

	return $list;
}
