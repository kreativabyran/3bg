<?php

function t_cpt_covers() {

	$labels = array(
		'name'                  => _x( 'Omslag', '', 'temat-child' ),
		'singular_name'         => _x( 'Omslag', '', 'temat-child' ),
		'menu_name'             => __( 'Omslag', 'temat-child' ),
		'name_admin_bar'        => __( 'Omslag', 'temat-child' ),
		'archives'              => __( 'Item Archives', 'temat-child' ),
		'attributes'            => __( 'Item Attributes', 'temat-child' ),
		'parent_item_colon'     => __( 'Parent Item:', 'temat-child' ),
		'all_items'             => __( 'All Items', 'temat-child' ),
		'add_new_item'          => __( 'Add New Item', 'temat-child' ),
		'add_new'               => __( 'Add New', 'temat-child' ),
		'new_item'              => __( 'New Item', 'temat-child' ),
		'edit_item'             => __( 'Edit Item', 'temat-child' ),
		'update_item'           => __( 'Update Item', 'temat-child' ),
		'view_item'             => __( 'View Item', 'temat-child' ),
		'view_items'            => __( 'View Items', 'temat-child' ),
		'search_items'          => __( 'Search Item', 'temat-child' ),
		'not_found'             => __( 'Not found', 'temat-child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'temat-child' ),
		'featured_image'        => __( 'Featured Image', 'temat-child' ),
		'set_featured_image'    => __( 'Set featured image', 'temat-child' ),
		'remove_featured_image' => __( 'Remove featured image', 'temat-child' ),
		'use_featured_image'    => __( 'Use as featured image', 'temat-child' ),
		'insert_into_item'      => __( 'Insert into item', 'temat-child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'temat-child' ),
		'items_list'            => __( 'Items list', 'temat-child' ),
		'items_list_navigation' => __( 'Items list navigation', 'temat-child' ),
		'filter_items_list'     => __( 'Filter items list', 'temat-child' ),
	);
	$args   = array(
		'label'               => __( 'Omslag', 'temat-child' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-book-alt',
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'covers', $args );

}
add_action( 'init', 't_cpt_covers', 0 );

function t_tax_covers() {

	$labels = array(
		'name'                       => _x( 'Omslagtaggar', '', 'temat-child' ),
		'singular_name'              => _x( 'Omslagtag', '', 'temat-child' ),
		'menu_name'                  => __( 'Omslagtag', 'temat-child' ),
		'all_items'                  => __( 'All Items', 'temat-child' ),
		'parent_item'                => __( 'Parent Item', 'temat-child' ),
		'parent_item_colon'          => __( 'Parent Item:', 'temat-child' ),
		'new_item_name'              => __( 'New Item Name', 'temat-child' ),
		'add_new_item'               => __( 'Add New Item', 'temat-child' ),
		'edit_item'                  => __( 'Edit Item', 'temat-child' ),
		'update_item'                => __( 'Update Item', 'temat-child' ),
		'view_item'                  => __( 'View Item', 'temat-child' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'temat-child' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'temat-child' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'temat-child' ),
		'popular_items'              => __( 'Popular Items', 'temat-child' ),
		'search_items'               => __( 'Search Items', 'temat-child' ),
		'not_found'                  => __( 'Not Found', 'temat-child' ),
		'no_terms'                   => __( 'No items', 'temat-child' ),
		'items_list'                 => __( 'Items list', 'temat-child' ),
		'items_list_navigation'      => __( 'Items list navigation', 'temat-child' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite'           => false,
	);
	register_taxonomy( 'cover-tax', array( 'covers' ), $args );

}
add_action( 'init', 't_tax_covers', 0 );
