<?php
add_filter(
	'wp_nav_menu_items',
	function( $items, $args ) {
		if ( $args->theme_location == 'top-menu' ) {
			$items .= '<li class="search">' . get_search_form( array( 'echo' => false ) ) . '<button class="search-toggle">' . __( 'Sök', 'temat-child' ) . '</button></li>';
		}
		return $items;
	},
	10,
	2
);
