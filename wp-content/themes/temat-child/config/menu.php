<?php
add_filter( 'wp_nav_menu_items', 'add_logout_link', 10, 2 );
function add_logout_link( $items, $args ) {
	if ( $args->theme_location == 'logedin-menu' ) {
		$items .= '<li class="menu-item menu-item-has-children">' . esc_html( 'Min sida', 'temat-child' );

		$items .= '<ul class="sub-menu">';
		$items .= '<li><a href="#" target="_self">' . esc_html( 'Prenumeration', 'temat-child' ) . '</a></li>';
		$items .= '<li><a href="' . wp_logout_url() . '" target="_self">' . esc_html( 'Logga ut', 'temat-child' ) . '</a></li>';
		$items .= '</ul>';

		$items .= '</li>';
	}

	if ( $args->theme_location == 'primary-menu' ) {
		$items .= '<li><a href="' . wp_login_url() . '">' . esc_html( 'Logga in', 'temat-child' ) . '</a></li>';
	}

	return $items;
}
