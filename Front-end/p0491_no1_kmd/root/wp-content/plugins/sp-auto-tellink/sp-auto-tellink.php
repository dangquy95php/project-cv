<?php
/*
Plugin Name: SP Auto TEL LINK
Plugin URI: https://www.no1web.jp/
Description: スマホのみTELリンクを有効化するためのWordPressプラグイン
Author: No.1 Eiji Yamaguchi
Version: 1.1
Author URI: https://www.no1web.jp/
*/

function add_spautotellink_head(){
	echo '<meta name="format-detection" content="telephone=no" />'.PHP_EOL;
	wp_register_script('spautotellink_js', plugin_dir_url( __FILE__ ).'sp-auto-tellink.js', array('jquery'));
	wp_enqueue_script('spautotellink_js');
	wp_register_style('spautotellink', plugin_dir_url( __FILE__ ).'sp-auto-tellink.css');
	wp_enqueue_style('spautotellink');
}
add_action('wp_enqueue_scripts', 'add_spautotellink_head');

?>
