<?php

add_action( 'admin_menu', 'temat_add_admin_menu' );
add_action( 'admin_init', 'temat_settings_init' );

if ( ! function_exists( 'temat_add_admin_menu' ) ) :
	function temat_add_admin_menu() {
		add_menu_page( '404', '404', 'manage_options', '404', 'temat_options_page', 'dashicons-admin-generic' );
	}
endif;

if ( ! function_exists( 'temat_settings_init' ) ) :
	function temat_settings_init() {
		register_setting( '404Page', 'temat_settings_404' );
		add_settings_section(
			'temat_404Page_section',
			'',
			'temat_settings_section_callback',
			'404Page'
		);
		add_settings_field(
			'temat_text_field_404',
			__( 'Page title', 'temat' ),
			'temat_text_field_0_render',
			'404Page',
			'temat_404Page_section'
		);
		add_settings_field(
			'temat_textarea_field_404',
			__( 'Page content', 'temat' ),
			'temat_textarea_field_1_render',
			'404Page',
			'temat_404Page_section'
		);
	}
endif;

if ( ! function_exists( 'temat_text_field_0_render' ) ) :
	function temat_text_field_0_render() {
		$options = get_option( 'temat_settings_404' );
		?><input type='text' class="regular-text" name='temat_settings_404[temat_text_field_404]' value='<?php echo $options['temat_text_field_404']; ?>'>
		<?php
	}
endif;


if ( ! function_exists( 'temat_textarea_field_1_render' ) ) :
	function temat_textarea_field_1_render() {
		$options = get_option( 'temat_settings_404' );
		?>
		<textarea cols='39' rows='5' class="regular-text" name='temat_settings_404[temat_textarea_field_404]'><?php echo $options['temat_textarea_field_404']; ?></textarea>
		<?php
	}
endif;

if ( ! function_exists( 'temat_settings_section_callback' ) ) :
	function temat_settings_section_callback() {
		// echo __( 'This section description', 'temat' );
	}
endif;

if ( ! function_exists( 'temat_options_page' ) ) :
	function temat_options_page() {
		?>
		<div class="wrap">
			<h1>404 page settings</h1>
			<form action='options.php' method='post'>

				<?php
				settings_fields( '404Page' );
				do_settings_sections( '404Page' );
				submit_button();
				?>

			</form>
		</div>
		<?php
	}
endif;
