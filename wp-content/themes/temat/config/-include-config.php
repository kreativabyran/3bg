<?php
/**
 *  Includes various theme config files
 *
 * @package Temat
 * @since 3
 */

if ( file_exists( TEMAT_DIR . 'config/acf-value-formatting.php' ) ) :
	include_once TEMAT_DIR . 'config/acf-value-formatting.php';
endif;

if ( file_exists( TEMAT_DIR . 'config/custom-header.php' ) ) :
	include_once TEMAT_DIR . 'config/custom-header.php';
endif;

if ( file_exists( TEMAT_DIR . 'config/customizer.php' ) ) :
	include_once TEMAT_DIR . 'config/customizer.php';
endif;

if ( temat_is_enabled( 'CUSTOM_IMAGE_SIZES' ) ) :
	include_once TEMAT_DIR . 'config/images.php';
endif;

if ( defined( 'JETPACK__VERSION' ) ) {
	require 'jetpack.php';
}

if ( file_exists( TEMAT_DIR . 'config/scripts.php' ) ) :
	include TEMAT_DIR . 'config/scripts.php';
endif;

if ( file_exists( TEMAT_DIR . 'config/social-media.php' ) ) :
	include TEMAT_DIR . 'config/social-media.php';
endif;

if ( file_exists( TEMAT_DIR . 'config/template-functions.php' ) ) :
	include_once TEMAT_DIR . 'config/template-functions.php';
endif;

if ( file_exists( TEMAT_DIR . 'config/template-tags.php' ) ) :
	include_once TEMAT_DIR . 'config/template-tags.php';
endif;

if ( file_exists( TEMAT_DIR . 'config/widgets.php' ) ) :
	require_once TEMAT_DIR . 'config/widgets.php';
endif;
