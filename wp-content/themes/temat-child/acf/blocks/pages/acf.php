<?php
$block
	->addTab(
		'contents',
		array(
			'label' => 'Innehåll',
		)
	)
	->addRepeater(
		'repeater_field',
		array(
			'label' => 'Sidor',
		)
	)
	->addPostObject(
		'page',
		array(
			'label'     => 'Sida',
			'post_type' => array( 'page' ),
		)
	)
	->endRepeater()
	->addTab(
		'settings',
		array(
			'label' => 'Inställningar',
		)
	)
	->addText(
		'block_id',
		array(
			'label' => 'ID',
		)
	)
	->setLocation( 'block', '==', 'acf/' . $name );
