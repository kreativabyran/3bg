<?php

define( 'TEMAT_CHILD_DIR', get_stylesheet_directory() . '/' );
define( 'TEMAT_CHILD_URI', get_stylesheet_directory_uri() . '/' );

global $temat_child_settings;
$temat_child_settings = array(
	'LOAD_BOOTSTRAP_JS'         => false,
	'LOAD_BOOTSTRAP_JS_SELCT'   => false,
	'LOAD_BOOTSTRAP_CSS'        => false, // SKA GÖRA EN EGEN.
	'LOAD_POPPER_JS'            => false,
	'LOAD_SLICK_JS'             => false,
	'LOAD_VALIDATE_JS'          => false,
	'LOAD_LAZYLOAD_JS'          => false,
	'LOAD_CUSTOM_JS'            => true,
	'LOAD_NAVIGATION'           => true,
	'LOAD_DATE_PICKER'          => false,
	'LOAD_STYLE'                => false,

	'MOBILE_FIXED_MENU'         => false,
	'PRINT_SETTINGS'            => false,
	'BASIC_GUTENBERG_BLOCKS'    => false,
	'SMOOTH_SCROLL'             => false,
	'CUSTOM_REGISTER_AND_LOGIN' => false,
	'WIDGETS'                   => false,
	'CUSTOM_IMAGE_SIZES'        => false,
	'SCROLL_TO_TOP'             => false,
);

if ( file_exists( TEMAT_CHILD_DIR . 'config/-include-config.php' ) ) {
	include_once TEMAT_CHILD_DIR . 'config/-include-config.php';
}

if ( file_exists( TEMAT_CHILD_DIR . 'acf/acf.php' ) ) {
	include_once TEMAT_CHILD_DIR . 'acf/acf.php';
}

add_action(
	'init',
	function() {
		pll_register_string( 'temat-child', 'Läs mer' );
		pll_register_string( 'temat-child', 'SENASTE INLÄGGEN' );
		pll_register_string( 'temat-child', 'Sök' );
		pll_register_string( 'temat-child', 'Inget kunde hittar' );
		pll_register_string( 'temat-child', 'Tyvärr, men ingenting matchade dina söktermer. Försök igen med några olika nyckelord.' );
	}
);
