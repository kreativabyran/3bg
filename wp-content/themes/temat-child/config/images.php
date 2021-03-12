<?php
function temat_custom_image_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'articleThumbnail'   => __( 'Artikeltumnagel', 'temat-child' ),
			'authorProfile'      => __( 'Profilbild', 'temat-child' ),
			'package'            => __( 'Paket', 'temat-child' ),
			'headerImage'        => __( 'Headerbild', 'temat-child' ),
			'cover'              => __( 'Omslag', 'temat-child' ),
			'categoryBackground' => __( 'Kategoribakgrund', 'temat-child' ),
		)
	);
}
add_action(
	'after_setup_theme',
	function () {
		add_image_size( 'articleThumbnail', 867, 573, false );
		add_image_size( 'authorProfile', 250, 250, true );
		add_image_size( 'package', 612, 315, true );
		add_image_size( 'headerImage', 99999, 275, true );
		add_image_size( 'cover', 291, 387, false );
		add_image_size( 'categoryBackground', 99999, 460, true );
	}
);
add_filter( 'image_size_names_choose', 'temat_custom_image_sizes' );

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
