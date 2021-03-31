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
			'label'  => 'Sidor',
			'layout' => 'block',
		)
	)
	->addImage(
		'image',
		array(
			'label'         => 'Tumnagel',
			'return_format' => 'id',
		)
	)
	->addText(
		'title',
		array(
			'label' => 'Titel',
		)
	)
	->addTextarea(
		'excerpt',
		array(
			'label' => 'Utdrag',
		)
	)
	->addUrl(
		'url',
		array(
			'label' => 'URL',
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
