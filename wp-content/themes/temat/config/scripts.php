<?php
/**
 * Enqueue scripts and styles.
 */

if ( ! function_exists( 'temat_external_libraries' ) ) :
	function temat_external_libraries() {

		if ( temat_is_enabled( 'LOAD_POPPER_JS' ) ) :
			wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array( 'jquery' ), '1.0', true );
		endif;

		if ( temat_is_enabled( 'LOAD_BOOTSTRAP_JS' ) ) :
			wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery', 'popper' ), '4.1.3', true );
		endif;

		if ( temat_is_enabled( 'LOAD_BOOTSTRAP_JS_SELECT' ) ) :
			wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.min.js', array( 'jquery', 'popper', 'bootstrap-js' ), '1.0', true );
		endif;

		if ( temat_is_enabled( 'LOAD_SLICK_JS' ) ) :
			wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.0', true );
		endif;

		if ( temat_is_enabled( 'LOAD_VALIDATE_JS' ) ) :
			wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '1.19.1', false );
		endif;

		if ( temat_is_enabled( 'LOAD_PICTUREFILL_JS' ) ) :
			wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/js/picturefill.min.js', array( 'jquery' ), '3.0.2', true );
		endif;

	}
endif;

if ( ! function_exists( 'temat_scripts' ) ) :
	function temat_scripts() {

		if ( temat_is_enabled( 'LOAD_STYLE' ) ) :
			wp_enqueue_style( 'temat-style', get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory() . '/style.css' ), false );
		endif;

		if ( temat_is_enabled( 'LOAD_NAVIGATION' ) ) :
			wp_enqueue_script( 'temat-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
		endif;

		if ( temat_is_enabled( 'LOAD_CUSTOM_JS' ) ) :
			wp_enqueue_script( 'temat-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/script.js' ), true );
		endif;

		wp_enqueue_script( 'comment-reply' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

endif;

if ( ! function_exists( 'admin_temat_scripts' ) ) :
	function admin_temat_scripts() {

		if ( temat_is_enabled( 'LOAD_LAZYLOAD_JS' ) ) :
			wp_enqueue_script( 'temat-lazyload-admin', get_template_directory_uri() . '/js/jquery.lazy.min.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/jquery.lazy.min.js' ), true );
			wp_enqueue_script( 'temat-admin-script', get_template_directory_uri() . '/js/admin-script.js', array( 'temat-lazyload-admin' ), filemtime( get_template_directory() . '/js/admin-script.js' ), true );
		endif;

		if ( temat_is_enabled( 'LOAD_DATE_PICKER' ) ) :
			wp_enqueue_script( 'jquery-ui-datepicker' );
			wp_enqueue_style( 'e2b-admin-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css', false, '1.9.0', false );
		endif;

		wp_enqueue_media();

	}

endif;
add_action( 'wp_enqueue_scripts', 'temat_external_libraries' );
add_action( 'wp_enqueue_scripts', 'temat_scripts' );
add_action( 'admin_enqueue_scripts', 'admin_temat_scripts' );
