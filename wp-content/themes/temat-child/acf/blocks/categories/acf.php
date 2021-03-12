<?php
$block
	->addTab(
		'content',
		array(
			'label' => 'Innehåll',
		)
	)
	->addImage(
		'image',
		array(
			'label'         => 'Bakgrundsbild',
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
