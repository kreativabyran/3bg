<?php
$block
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
