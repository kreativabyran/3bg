<?php
function temat_custom_image_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'articleThumbnail' => __( 'Artikeltumnagel', 'temat-child' ),
		)
	);
}
add_action(
	'after_setup_theme',
	function () {
		add_image_size( 'articleThumbnail', 740, 562, true );
	}
);
add_filter( 'image_size_names_choose', 'temat_custom_image_sizes' );

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
