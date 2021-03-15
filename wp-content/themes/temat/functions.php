<?php
/**
 * Temat 3.0 functions and definitions
 */

define( 'TEMAT_DIR', get_template_directory() . '/' );
define( 'TEMAT_URI', get_template_directory_uri() . '/' );

class Temat {

	private $settings = array(
		'LOAD_BOOTSTRAP_JS'         => false,
		'LOAD_BOOTSTRAP_JS_SELECT'  => false,
		'LOAD_BOOTSTRAP_CSS'        => false, // SKA GÖRA EN EGEN.
		'LOAD_POPPER_JS'            => false,
		'LOAD_SLICK_JS'             => false,
		'LOAD_PICTUREFILL_JS'       => true,
		'LOAD_VALIDATE_JS'          => false,
		'LOAD_AJAX_JS'              => false,
		'LOAD_LAZYLOAD_JS'          => true,
		'LOAD_CUSTOM_JS'            => true,
		'LOAD_NAVIGATION'           => true,
		'LOAD_DATE_PICKER'          => false,
		'LOAD_STYLE'                => true,

		'MOBILE_FIXED_MENU'         => false,
		'PRINT_SETTINGS'            => false,
		'BASIC_GUTENBERG_BLOCKS'    => false,
		'SMOOTH_SCROLL'             => true,
		'CUSTOM_REGISTER_AND_LOGIN' => false,
		'WIDGETS'                   => true,
		'CUSTOM_IMAGE_SIZES'        => true,
		'SCROLL_TO_TOP'             => false,
	);

	public function __construct( array $settings = null ) {
		if ( null !== $settings ) :
			$this->settings = array_merge( $this->settings, $settings );
		endif;
		if ( $this->settings['PRINT_SETTINGS'] ) :
			$this->print_settings();
		endif;
	}

	public function get_setting( $value ) {
		return $this->settings[ $value ];
	}

	private function print_settings() {
		add_action(
			'wp_footer',
			function() {
				echo '<pre>';
				print_r( $this->settings );
				echo '</pre>';
			}
		);
	}

}
global $temat_child_settings, $temat_parent_settings;
$temat_parent_settings = new Temat( $temat_child_settings );

if ( file_exists( TEMAT_DIR . 'vendor/autoload.php' ) ) :
	include_once TEMAT_DIR . 'vendor/autoload.php';
endif;



// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', TEMAT_DIR . 'includes/acf/' );
define( 'MY_ACF_URL', TEMAT_URI . 'includes/acf/' );

// Include the ACF plugin.
if ( file_exists( MY_ACF_PATH . 'acf.php' ) ) :
	require_once MY_ACF_PATH . 'acf.php';
endif;

/**
 * Customize the url setting to fix incorrect asset URLs.
 */
function my_acf_settings_url() {
	return MY_ACF_URL;
}
add_filter( 'acf/settings/url', 'my_acf_settings_url' );


/**
 * Hide the ACF admin menu item.
 */
function my_acf_settings_show_admin() {
	return true;
}
add_filter( 'acf/settings/show_admin', 'my_acf_settings_show_admin' );



if ( ! function_exists( 'temat_is_enabled' ) ) :
	function temat_is_enabled( $value ) {
		global $temat_parent_settings;
		return $temat_parent_settings->get_setting( $value );
	}
endif;

if ( file_exists( TEMAT_DIR . 'config/-include-config.php' ) ) :
	include_once TEMAT_DIR . 'config/-include-config.php';
endif;

/*
 if ( file_exists( TEMAT_DIR . 'template-parts/settings-pages/include-settings.php' ) ) :
	include_once TEMAT_DIR . 'template-parts/settings-pages/include-settings.php';
endif; */

if ( temat_is_enabled( 'BASIC_GUTENBERG_BLOCKS' ) ) :
	if ( file_exists( TEMAT_DIR . 'template-parts/blocks/include-blocks.php' ) ) :
		include_once TEMAT_DIR . 'template-parts/blocks/include-blocks.php';
	endif;
endif;

if ( file_exists( TEMAT_DIR . 'woocommerce/include-woo-commerce.php' ) ) :
	include_once TEMAT_DIR . 'woocommerce/include-woo-commerce.php';
endif;

if ( ! function_exists( 'temat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function temat_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Temat 2.0, use a find and replace
		 * to change 'temat' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'temat', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'temat' ),
			)
		);

		register_nav_menus(
			array(
				'top-menu' => esc_html__( 'Topmeny', 'temat' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'temat_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'temat_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'temat_content_width' ) ) :
	function temat_content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'temat_content_width', 640 );
	}
endif;
add_action( 'after_setup_theme', 'temat_content_width', 0 );


if ( ! function_exists( 'temat_remove_website_field' ) ) :
	function temat_remove_website_field( $fields ) {
		if ( isset( $fields['url'] ) ) {
			unset( $fields['url'] );
		}
		return $fields;
	}
endif;
add_filter( 'comment_form_default_fields', 'temat_remove_website_field' );
