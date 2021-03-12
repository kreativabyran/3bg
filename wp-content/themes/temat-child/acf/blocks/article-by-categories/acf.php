<?php
$block
	->addTab(
		'settings',
		array(
			'label' => 'Inställningar',
		)
	)
	->addSelect(
		'cat_select',
		array(
			'label'         => 'Välj kategori',
			'choices'       => t_get_cats(),
			'return_format' => 'value',
		)
	)
	->addText(
		'block_id',
		array(
			'label' => 'ID',
		)
	)
	->setLocation( 'block', '==', 'acf/' . $name );

function t_get_cats() {
	$terms = get_terms(
		array(
			'taxonomy'   => 'category',
			'hide_empty' => true,
		)
	);
	$cats  = array();
	if ( $terms ) :
		foreach ( $terms as $term ) :
			$cats[ $term->slug ] = $term->name;
		endforeach;
	endif;
	return $cats;
}

add_action( 'wp_footer', 't_get_cats' );
