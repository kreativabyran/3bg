<?php
$block
	->addTab(
		'contents',
		array(
			'label' => 'Innehåll',
		)
	)
	->addImage(
		'image',
		array(
			'label'         => 'Bild',
			'return_format' => 'id',
		)
	)
	->addText(
		'title',
		array(
			'label' => 'Titel',
		)
	)
	->addRepeater(
		'lists',
		array(
			'label'        => 'Lista',
			'button_label' => 'Lägg till lista',
		)
	)
	->addText(
		'list',
		array(
			'label' => 'Lista',
		)
	)
	->endRepeater()
	->addText(
		'price',
		array(
			'label' => 'Pris',
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
