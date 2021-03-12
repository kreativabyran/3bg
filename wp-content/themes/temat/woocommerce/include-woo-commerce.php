<?php
define( 'WOOCOMMERCE_ENABLED', class_exists( 'WooCommerce' ) );

if ( WOOCOMMERCE_ENABLED ) : // Är WooCommerce aktiverat?

	// Gör WooCommerce theme-compatible.
	add_action(
		'after_setup_theme',
		function() {
			add_theme_support( 'woocommerce' );
		}
	);

	// Tar bort WooCommerce styles.
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	// Lägger till WooCommerce egna features (kräver Woo 3.0)
	// add_theme_support( 'wc-product-gallery-slider' );
	// add_theme_support( 'wc-product-gallery-zoom' );
	// add_theme_support( 'wc-product-gallery-lightbox' );

	// Gör så att WooCommerce inte skriver ut egna titlar på arkivsidor.
	add_filter( 'woocommerce_show_page_title', '__return_false' );

	// Antal produkter som ska visas på Shop-, Product- och Archivesidorna (kategori och tags).
	function temat_woo_posts_per_page( $cols ) {
		return 12;
	}
	add_filter( 'loop_shop_per_page', 'temat_woo_posts_per_page' );

	// Antal kolumner som visas per rad i Shopsidan.
	function temat_woo_shop_columns( $columns ) {
		return 4;
	}
	add_filter( 'loop_shop_columns', 'temat_woo_shop_columns' );

	// Lägg till klass på kolumnen på Shopsidan.
	function temat_woo_shop_columns_body_class( $classes ) {
		if ( is_shop() || is_product_category() || is_product_tag() ) {
			$classes[] = 'columns-4';
		}
		return $classes;
	}
	add_filter( 'body_class', 'temat_woo_shop_columns_body_class' );

	// Modifiera paginationpilarna, om det behövs.
	// function temat_woo_pagination_args( $args ) {
	// $args['prev_text'] = '<i class="fa fa-angle-left"></i>';
	// $args['next_text'] = '<i class="fa fa-angle-right"></i>';
	// return $args;
	// }
	// add_filter( 'woocommerce_pagination_args', 'temat_woo_pagination_args' );

	// Ändra OnSale Badge text.
	function temat_woo_sale_flash() {
		return '<span class="onsale">' . esc_html__( 'Försäljning', 'woocommerce' ) . '</span>';
	}
	add_filter( 'woocommerce_sale_flash', 'temat_woo_sale_flash' );

	// Ändra antalet kolumner för en single product gallery thumbnails.
	function temat_woo_product_thumbnails_columns() {
		return 3;
	}
	add_action( 'woocommerce_product_thumbnails_columns', 'temat_woo_product_thumbnails_columns' );

	// Antalet related products.
	function temat_woo_related_posts_per_page( $args ) {
		$args['posts_per_page'] = 4;
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'temat_woo_related_posts_per_page' );

	// Antal up-sells kolumner.
	function wpex_woo_single_loops_columns( $columns ) {
		return 4;
	}
	add_filter( 'woocommerce_up_sells_columns', 'wpex_woo_single_loops_columns' );

	// Antalet related products.
	function wpex_woo_related_columns( $args ) {
		$args['columns'] = 4;
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'wpex_woo_related_columns', 10 );

	// Lägg till klass på kolumner på up-salls och related products.
	function wpex_woo_single_loops_columns_body_class( $classes ) {
		if ( is_singular( 'product' ) ) {
			$classes[] = 'columns-4';
		}
		return $classes;
	}
	add_filter( 'body_class', 'wpex_woo_single_loops_columns_body_class' );

	// Menyer.
	// if ( file_exists( 'woo-commerce-menu.php' ) ) :
		include_once 'woo-commerce-menu.php';
	// endif;

endif;
