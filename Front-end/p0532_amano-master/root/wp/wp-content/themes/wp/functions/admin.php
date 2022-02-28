<?php

//////////////////////////////////////////
// 管理画面 投稿メニューを非表示
//////////////////////////////////////////
add_action( 'admin_menu', 'remove_menu' );
function remove_menu() {
	remove_menu_page( 'edit.php' );
}

/*===================================
マイナーバージョンアップを自動化
===================================*/
// add_filter('allow_major_auto_core_updates', '__return_true', 99);
add_filter( 'allow_minor_auto_core_updates', '__return_true', 99 );

/*===================================
ACF Revisions: Save fields
=====================================*/
add_action( '_wp_put_post_revision', 'my_theme_put_post_revision' );
function my_theme_put_post_revision( $revision_id ) {
	global $restore_revision_id;
	$restore_revision_id = $revision_id;

	$revision   = get_post( $revision_id );
	$acf_fields = array();

	if ( isset( $_POST['acf'] ) ) {
		$acf_fields = $_POST['acf'];
	}

	$revision_ID = 'revision_' . $revision->ID;

	foreach ( $acf_fields as $field => $value ) {
		if ( $field_obj = acf_get_field( $field ) ) {
			acf_update_value( $value, $revision_ID, $field_obj );
		}
	}
}

/*===================================
ACF Revisions: Update Revisions Restore
=====================================*/
add_action( 'wp_restore_post_revision', 'my_theme_restore_post_revision', 10, 2 );
function my_theme_restore_post_revision( $post_id, $revision_id ) {
	global $restore_revision_id;
	if ( $restore_revision_id ) {
		$metas = get_metadata_raw( 'post', $revision_id );

		if ( is_array( $metas ) ) {
			foreach ( $metas as $m_key => $m_value ) {
				update_revision_meta( $restore_revision_id, $m_key, maybe_unserialize( $m_value[0] ) );
			}
		}
	}
}

/*===================================
ACF Revisions: Decode ACF Type
=====================================*/
add_filter( 'acf/decode_post_id', 'my_theme_acf_decode_post_id' );
function my_theme_acf_decode_post_id( $props ) {
	if ( is_string( $props['id'] ) && 0 === strpos( $props['id'], 'revision_' ) ) {
		$i    = strrpos( $props['id'], '_' );
		$type = substr( $props['id'], 0, $i );
		$id   = substr( $props['id'], $i + 1 );

		$props['type'] = $type;
		$props['id']   = $id;
	}

	return $props;
}

if ( ! function_exists( 'update_revision_meta' ) ):
	function update_revision_meta( $post_id, $meta_key, $meta_value, $prev_value = '' ) {
		return update_metadata( 'post', $post_id, $meta_key, $meta_value, $prev_value );
	}
endif;