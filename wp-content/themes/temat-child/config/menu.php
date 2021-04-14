<?php
add_filter(
	'wp_nav_menu_items',
	function( $items, $args ) {
		if ( $args->theme_location == 'top-menu' ) {
			$items .= pll_the_languages(
				array(
					'show_flags'   => 1,
					'show_names'   => 1,
					'dropdown'     => 0,
					'echo'         => 0,
					'hide_current' => 1,
				)
			);
			$items .= '<li class="search">' . get_search_form( array( 'echo' => false ) ) . '<button class="search-toggle">' . pll__( 'Sök' ) . '</button></li>';
		}
		return $items;
	},
	10,
	2
);

add_action(
	'wp_footer',
	function() {
		pll_the_languages(
			array(
				'show_flags' => 1,
				'show_names' => 1,
				'dropdown'   => 0,
				'echo'       => 0,
			)
		);
	}
);
