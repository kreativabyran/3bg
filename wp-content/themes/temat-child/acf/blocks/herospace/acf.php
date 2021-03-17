<?php
$block
	->addTab(
		'contents',
		array(
			'label' => 'Innehåll',
		)
	)
	->addWysiwyg(
		'text',
		array(
			'label' => 'Innehåll',
		)
	)
	->addLink(
		'button',
		array(
			'label' => 'Länk',
		)
	)
	->addImage(
		'background',
		array(
			'label'         => 'Bakgrund',
			'return_format' => 'id',
		)
	)
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
	->addRadio(
		'background_type',
		array(
			'label'         => 'Bakgrundstyp',
			'choices'       => array(
				'short',
				'tall',
			),
			'default_value' => array(
				'tall',
			),
		)
	)
	->setLocation( 'block', '==', 'acf/' . $name );
