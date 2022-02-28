<?php

/**
 * Class MyCategoryClass
 */
class MyCategoryClass {
	/**
	 * get_category_cncestors
	 * 指定カテゴリの属する最上位のカテゴリを返却する。
	 *
	 * @param $cat_id
	 * @param array $ancestors
	 *
	 * @return array
	 */
	public static function get_category_ancestors( $cat_id, $ancestors = array() ) {
		$cat         = get_category( $cat_id );
		$ancestors[] = $cat;

		if ( $cat->parent != 0 ) {
			$ancestors = MyCategoryClass::get_category_ancestors( $cat->parent, $ancestors );
		}

		return $ancestors;
	}

	/**
	 * get_the_category_call
	 * 現在のカテゴリ情報に加え、最上位カテゴリの内容(id,名称,スラッグ)を返却する。
	 *
	 * @param string $cat_now
	 *
	 * @return array|object|string|WP_Error|WP_Term|WP_Term[]|null
	 */
	public static function get_the_category_all( $cat_now = "" ) {
		if ( empty( $cat_now ) ) {
			$cat_now = get_the_category();
			$cat_now = $cat_now[0];
			if ( empty( $cat_now->cat_ID ) ) {
				$cat_now = get_category( 1 );
			}
		}
		if ( $cat_now->category_parent == 0 ) {
			// TOP レベルカテゴリ
			$cat_now->cat_top_id   = $cat_now->cat_ID;
			$cat_now->cat_top_name = $cat_now->cat_name;
			$cat_now->cat_top_slug = $cat_now->category_nicename;
		} else {
			// サブカテゴリ
			$now_id                = $cat_now->cat_ID;
			$ret                   = MyCategoryClass::get_category_ancestors( $now_id );
			$cat_top               = array_pop( $ret );
			$cat_now->cat_top_id   = $cat_top->cat_ID;
			$cat_now->cat_top_name = $cat_top->cat_name;
			$cat_now->cat_top_slug = $cat_top->category_nicename;
		}

		return $cat_now;
	}

	/**
	 * @param int $parent_id ID of Term to get children.
	 * @param string $taxonomy Taxonomy Name.
	 *
	 * @return array
	 */
	public static function get_child_categories( $parent_id, $taxonomy ) {
		$str_child = get_term_children( $parent_id, $taxonomy );
		$catIDs    = explode( '/', $str_child );
		array_shift( $catIDs );
		sort( $catIDs );

		$ret_ids = array();
		foreach ( $catIDs as $cat_id ) {
			$cats = get_category( $cat_id );
			if ( $cats->category_parent != $parent_id ) {
				continue;
			}

			$ret_ids[] = $cats->cat_ID;
		}

		return $ret_ids;
	}

	/**
	 * @param int $parent_id ID of Term to get children.
	 * @param string $taxonomy Taxonomy Name.
	 *
	 * @return array
	 */
	public static function get_child_category_by_order( $parent_id, $taxonomy ) {
		$child_ids = get_term_children( $parent_id, $taxonomy );
		$catIDs    = explode( '/', $child_ids );
		array_shift( $catIDs );

		$child_array = array();

		foreach ( $catIDs as $child_id ) {
			$ch_cat = get_category( $child_id );
			// 孫カテゴリは除外
			if ( $ch_cat->category_parent != $parent_id ) {
				continue;
			}

			if ( isset( $ch_cat->term_order ) ) {
				$child_array[ $ch_cat->cat_ID ] = $ch_cat->term_order;
			} else {
				$child_array[ $ch_cat->cat_ID ] = $ch_cat->cat_ID;
			}
		}
		asort( $child_array );

		return $child_array;
	}
}
