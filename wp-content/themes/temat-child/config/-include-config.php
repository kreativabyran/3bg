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

if ( file_exists( TEMAT_CHILD_DIR . 'config/menu.php' ) ) :
	include_once TEMAT_CHILD_DIR . 'config/menu.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/login.php' ) ) :
	include_once TEMAT_CHILD_DIR . 'config/login.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/post-meta-box.php' ) ) :
	include_once TEMAT_CHILD_DIR . 'config/post-meta-box.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/blog.php' ) ) :
	include_once TEMAT_CHILD_DIR . 'config/blog.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/editors.php' ) ) :
	include_once TEMAT_CHILD_DIR . 'config/editors.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/theme-settings.php' ) ) :
	include TEMAT_CHILD_DIR . 'config/theme-settings.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/cpt-covers.php' ) ) :
	include TEMAT_CHILD_DIR . 'config/cpt-covers.php';
endif;

if ( file_exists( TEMAT_CHILD_DIR . 'config/cover-meta-box.php' ) ) :
	include TEMAT_CHILD_DIR . 'config/cover-meta-box.php';
endif;
