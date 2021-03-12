<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

add_action(
	'init',
	function() {
		global $wp_rewrite;
		$wp_rewrite->author_base = 'redaktion';
	}
);

add_filter( 'get_avatar', 'acf_profile_avatar', 10, 5 );
function acf_profile_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
	$user = '';
	if ( is_numeric( $id_or_email ) ) {
		$id   = (int) $id_or_email;
		$user = get_user_by( 'id', $id );
	} elseif ( is_object( $id_or_email ) ) {
		if ( ! empty( $id_or_email->user_id ) ) {
			$id   = (int) $id_or_email->user_id;
			$user = get_user_by( 'id', $id );
		}
	} else {
		$user = get_user_by( 'email', $id_or_email );
	}
	if ( ! $user ) {
		return $avatar;
	}
	$user_id  = $user->ID;
	$image_id = get_user_meta( $user_id, 'acf_avatar', true );
	if ( ! $image_id ) {
		return $avatar;
	}
	$image_url  = wp_get_attachment_image_src( $image_id, 'thumbnail' );
	$avatar_url = $image_url[0];
	$avatar     = '<img alt="' . $alt . '" src="' . $avatar_url . '" class="avatar avatar-' . $size . '" height="' . $size . '" width="' . $size . '"/>';
	return $avatar;
}


add_action(
	'acf/init',
	function() {
		$user_options = new FieldsBuilder( 'Anpassningar' );
		$user_options
		->addImage(
			'acf_avatar',
			array(
				'label'         => 'Profilbild',
				'preview_size'  => 'thumbnail',
				'return_format' => 'id',
			)
		)
		->addImage(
			'header_image',
			array(
				'label'         => 'Headerbild',
				'preview_size'  => 'thumbnail',
				'return_format' => 'id',
			)
		)
		->addWysiwyg(
			'editor_description',
			array(
				'label' => 'Beskrivning',
			)
		)
		->addText(
			'phone',
			array(
				'label' => 'Telefonnummer',
			)
		)
		->addText(
			'address',
			array(
				'label' => 'Adress',
			)
		)
		->addText(
			'postal_address',
			array(
				'label' => 'Postadress',
			)
		)
		->addText(
			'city',
			array(
				'label' => 'Ort',
			)
		)
		->addUrl(
			'instagram',
			array(
				'label' => 'Instagram',
			)
		)
		->addUrl(
			'facebook',
			array(
				'label' => 'Facebook',
			)
		)
		->setLocation( 'user_form', '==', 'edit' );
		acf_add_local_field_group( $user_options->build() );
	}
);


add_action(
	'init',
	function() {
		$post_type_object           = get_post_type_object( 'post' );
		$post_type_object->template = array(
			array( 'core/audio' ),
			array( 'core/heading' ),
			array( 'core/paragraph' ),
		);
	}
);



add_filter(
	'allowed_block_types',
	function( $allowed_blocks, $post ) {

		if ( $post->post_type === 'post' && ! current_user_can( 'administrator' ) ) {
			return array(
				'core/image',
				'core/paragraph',
				'core/heading',
				'core/quote',
			);
		}

		return $allowed_blocks;
	},
	10,
	2
);
