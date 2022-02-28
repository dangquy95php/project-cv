<?php

if ( ! function_exists( 'no1_theme1_get_default_options' ) ):
	function no1_theme1_get_default_options() {
		return array(
			'logo' => 'logo.png',
		);
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'no1_theme1_get_options' ) ):
	function no1_theme1_get_options( $default = true ) {
		return get_option(
			'no1_theme1_options',
			$default ? no1_theme1_get_default_options() : false
		);
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'no1_theme1_options_validate' ) ) :
	function no1_theme1_options_validate( $input ) {
		$output = $defaults = no1_theme1_get_default_options();

		$output['logo'] = $input['logo'];

		return apply_filters( 'no1_theme1_options_validate', $output, $input, $defaults );
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'no1_theme1_options_render_page' ) ) :
	function no1_theme1_options_render_page() {
		include __DIR__ . '/theme-options-render.php';
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'no1_theme1_options_init' ) ):
	add_action( 'admin_init', 'no1_theme1_options_init' );
	function no1_theme1_options_init() {
		if ( false == no1_theme1_get_options( false ) ) {
			add_option( 'no1_theme1_options', no1_theme1_get_default_options() );
		}

		register_setting(
			'no1_theme1',
			'no1_theme1_options',
			'no1_theme1_options_validate'
		);
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'no1_theme1_options_add_page' ) ):
	add_action( 'admin_menu', 'no1_theme1_options_add_page' );
	function no1_theme1_options_add_page() {
		add_theme_page(
			'テーマ設定',
			'テーマ設定',
			'edit_theme_options',
			'theme-options',
			'no1_theme1_options_render_page'
		);
	}
endif;

/*---------------------------------------------------------*/

if ( ! function_exists( 'no1_theme1_option_page_capability' ) ):
	add_filter( 'option_page_capability_no1_theme1', 'no1_theme1_option_page_capability' );
	function no1_theme1_option_page_capability() {
		return 'edit_theme_options';
	}
endif;
