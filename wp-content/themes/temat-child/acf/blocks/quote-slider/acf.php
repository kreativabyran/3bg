<?php
$block
	->addTab(
		'contents',
		array(
			'label' => 'Innehåll',
		)
	)
	->addRepeater(
		'repeater',
		array(
			'label'        => 'Slide',
			'layout'       => 'block',
			'button_label' => 'Lägg till en slide',
		)
	)
	->addWysiwyg(
		'text_contents',
		array(
			'label' => 'Innehåll',
		)
	)
	->addText(
		'quote_name',
		array(
			'label' => 'Namn',
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
