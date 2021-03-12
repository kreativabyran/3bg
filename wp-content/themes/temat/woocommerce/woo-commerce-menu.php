<?php

// Menyer i WooCommerce
add_action(
	'after_setup_theme',
	function() {
		register_nav_menus(
			array(
				'temat-woo-menu' => esc_html__( 'WooCommerce-meny', 'temat' ),
			)
		);
	}
);

function temat_add_menu_cart_item_to_menus( $items, $args ) {
	if ( $args->theme_location === 'temat-woo-menu' ) {
		$css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';
		if ( is_cart() ) {
			$css_class .= ' current-menu-item';
		}
		$items     .= '<li class="' . esc_attr( $css_class ) . '">';
			$items .= temat_menu_cart_item();
		$items     .= '</li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'temat_add_menu_cart_item_to_menus', 10, 2 );

if ( ! function_exists( 'temat_menu_cart_item' ) ) :
	function temat_menu_cart_item() {
		$output = '';

		$cart_count = WC()->cart->cart_contents_count;

		if ( $cart_count ) {
			$url = WC()->cart->get_cart_url();
		} else {
			$url = wc_get_page_permalink( 'shop' );
		}

		$output .= '<a href="' . esc_url( $url ) . '" class="cart-count cart-count-' . $cart_count . '">';
		$output .= '<span>' . __( 'Varukorg', 'temat' ) . '</span>';
		if ( $cart_count !== 0 ) {
			$output .= '<span class="count">' . $cart_count . '</span>';
		}
		$output .= '</a>';
		return $output;
	}
endif;

if ( ! function_exists( 'temat_main_menu_cart_link_fragments' ) ) :
	function temat_main_menu_cart_link_fragments( $fragments ) {
		$fragments['.wpex-menu-cart-total'] = temat_menu_cart_item();
		return $fragments;
	}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'temat_main_menu_cart_link_fragments' );
