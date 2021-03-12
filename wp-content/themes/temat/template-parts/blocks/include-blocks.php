<?php

if ( temat_is_enabled( 'BASIC_GUTENBERG_BLOCKS' ) ) :
	if ( ! function_exists( 'get_render_template' ) ) :
		function get_render_template( $name ) {
			return 'template-parts/blocks/' . $name . '/view.php';
		}
	endif;

	if ( ! function_exists( 'get_kb_icon' ) ) :
		function get_kb_icon() {
			return '<svg width="24" height="24" role="img" aria-hidden="true" focusable="false"><path d="M18.374 9.254 15.446 12.449 15.446 15.288 19.35 19.636 22.81 19.636 17.664 13.868 21.834 9.254ZM12.872 4.551 15.446 4.551 15.446 19.636 12.872 19.636ZM.627 4.551 10.21 4.551 10.21 19.636.627 19.636Z"></path></svg>';

			// M0 0V12.339 22.778H6.093V12.339 0ZM9.184 6.258 6.586 12.339 10.634 22.778H16.727L12.678 12.339 15.277 6.258Z
		}
	endif;

	if ( ! function_exists( 'temat_acf_init' ) ) :
		function temat_acf_init() {

			acf_register_block_type(
				array(
					'name'            => 'contact-form',
					'title'           => __( 'Contact Form' ),
					'description'     => __( 'Ett custom block för ett kontaktformulär.' ),
					'render_template' => get_render_template( 'contact-form' ),
					'icon'            => get_kb_icon(),
					'category'        => 'kreativabyran-blocks',
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'hero-space',
					'title'           => __( 'Hero Space' ),
					'description'     => __( 'Ett custom block för Hero space, alltså en header.' ),
					'render_template' => get_render_template( 'hero-space' ),
					'icon'            => get_kb_icon(),
					'category'        => 'kreativabyran-blocks',
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'three-cards',
					'title'           => __( 'Three cards' ),
					'description'     => __( 'Ett custom block för att visa tre kort.' ),
					'render_template' => get_render_template( 'three-cards' ),
					'icon'            => get_kb_icon(),
					'category'        => 'kreativabyran-blocks',
				)
			);
		}
	endif;

	if ( function_exists( 'acf_register_block_type' ) ) {
		add_action( 'acf/init', 'temat_acf_init' );
	}
endif;

if ( ! function_exists( 'temat_block_category' ) ) :
	function temat_block_category( $categories, $post ) {
		return array_merge(
			array(
				array(
					'slug'  => 'kreativabyran-blocks',
					'title' => __( 'Kreativa Byrån', 'temat' ),
				),
			),
			$categories
		);
	}
endif;
add_filter( 'block_categories', 'temat_block_category', 1, 2 );
