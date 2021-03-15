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
	->setLocation( 'block', '==', 'acf/' . $name );
