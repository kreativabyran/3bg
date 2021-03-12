<?php
if ( ! function_exists( 'temat_register_widgets' ) ) :
	function temat_register_widgets() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 1', 'temat' ),
				'id'            => 'footer_column_1',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 2', 'temat' ),
				'id'            => 'footer_column_2',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 3', 'temat' ),
				'id'            => 'footer_column_3',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer bottom', 'temat' ),
				'id'            => 'footer_column_bottom',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Copyright', 'temat' ),
				'id'            => 'copyright',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<span>',
				'after_title'   => '</span>',
			)
		);
	}
endif;
add_action( 'widgets_init', 'temat_register_widgets' );
