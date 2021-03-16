<?php
/**
 *  Includes various theme config files
 *
 * @package Temat Child
 * @since 3
 */

if ( file_exists( TEMAT_CHILD_DIR . 'config/images.php' ) ) :
	include_once TEMAT_CHILD_DIR . 'config/images.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/scripts.php' ) ) :
	include_once TEMAT_CHILD_DIR . 'config/scripts.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/theme-settings.php' ) ) :
	include TEMAT_CHILD_DIR . 'config/theme-settings.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/blog.php' ) ) :
	include TEMAT_CHILD_DIR . 'config/blog.php';
endif;
