<?php
/**
 * Handles theme scripts
 *
 * @package Temat Child
 * @since  3
 */

/**
 * Enques theme scripts and styles
 */
function t_scripts_child() {
	global $temat_child_settings;

	wp_enqueue_style( 'temat-style-child', TEMAT_CHILD_URI . 'style.css', ( $temat_child_settings['LOAD_STYLE'] ) ? array( 'temat-style' ) : array(), filemtime( TEMAT_CHILD_DIR . 'style.css' ), false );

	wp_enqueue_script( 'temat-script-child', TEMAT_CHILD_URI . 'js/script.js', array( 'jquery' ), filemtime( TEMAT_CHILD_DIR . 'js/script.js' ), false );
	/*
	wp_enqueue_script( 'ajax-loading-content', TEMAT_CHILD_URI . 'js/ajax-loading-content.js', array( 'jquery' ), filemtime( TEMAT_CHILD_DIR . 'js/ajax-loading-content.js' ), true );
	wp_localize_script(
		'ajax-loading-content',
		'ajax_obj',
		array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
	); */

}
add_action( 'wp_enqueue_scripts', 't_scripts_child' );

function t_block_assets() {
	wp_enqueue_script( 'block-styles', TEMAT_CHILD_URI . 'acf/block-styles.js', array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), filemtime( TEMAT_CHILD_DIR . 'acf/block-styles.js' ) );
}
add_action( 'enqueue_block_editor_assets', 't_block_assets' );
