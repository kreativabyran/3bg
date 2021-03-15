<?php
/**
 * Registers custom Gutenberg blocks
 *
 * @package Temat Child
 * @since 3
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Registers all custom blocks
 */
function my_acf_init_block_types() {
	t_create_block(
		'herospace',
		__( 'Herospace', 'temat-child' )
	);
}
add_action( 'acf/init', 'my_acf_init_block_types' );


/**
 * Function to register custom block
 *
 * @param   string $name   Name of block. Lowercase, words separated by hyphens. The folder in the blocks subdirectory has to have this name.
 * @param   string $title  Title of block, displayed in wp-admin.
 *
 * @return  (array) The validated and registered block settings.
 */
function t_create_block( $name, $title ) {

	$block_folder = 'acf/blocks/';

	if ( file_exists( TEMAT_CHILD_DIR . $block_folder . $name . '/acf.php' ) ) {
		$block = new FieldsBuilder( $name );

		include_once TEMAT_CHILD_DIR . $block_folder . $name . '/acf.php';
		acf_add_local_field_group( $block->build() );

		$icon = '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z" /><path fill="#a7a4e0" d="M18.374 9.254 15.446 12.449 15.446 15.288 19.35 19.636 22.81 19.636 17.664 13.868 21.834 9.254ZM12.872 4.551 15.446 4.551 15.446 19.636 12.872 19.636ZM.627 4.551 10.21 4.551 10.21 19.636.627 19.636Z" /></svg>';

		$template = '/' . $block_folder . $name . '/view.php';

		return ( acf_register_block_type(
			array(
				'name'            => $name,
				'title'           => $title,
				'render_template' => $template,
				'icon'            => $icon,
			)
		) );
	}
}
