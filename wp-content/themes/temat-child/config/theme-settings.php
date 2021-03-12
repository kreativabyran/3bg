<?php
/**
 * Adds ACF fields for Temat options page
 *
 * @package Temat Child
 * @since 3
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

add_action(
	'acf/init',
	function() {
		if ( current_user_can( 'administrator' ) ) :
			acf_add_options_page(
				array(
					'page_title' => get_bloginfo( 'name' ) . ' temainställningar',
					'menu_title' => 'Temainställningar',
					'menu_slug'  => 'theme-options',
				)
			);
			$options = new FieldsBuilder( 'anpassningar' );
			$options
			->addTab(
				'forms',
				array(
					'label' => 'Formulär',
				)
			)
			->addWysiwyg(
				'thanks_message',
				array(
					'label' => 'Tackmeddelande',
				)
			)
			->addTextarea(
				'help_message',
				array(
					'label' => ' Hjälpmeddelande',
				)
			)
			->addTab(
				'order',
				array(
					'label' => 'Beställningar',
				)
			)
			->addWysiwyg(
				'order_text',
				array(
					'label' => 'Beställningstext',
				)
			)
			->addText(
				'order_price',
				array(
					'label' => 'Beställningspris',
				)
			)
			->addText(
				'order_button',
				array(
					'label' => 'Knapptext',
				)
			)
			->addWysiwyg(
				'free_article_text',
				array(
					'label' => 'Text på gratisartikel',
				)
			)
			->addTab(
				'article',
				array(
					'label' => 'Artiklar',
				)
			)
			->addWysiwyg(
				'free_article',
				array(
					'label' => 'Banner gratisartiklar',
				)
			)
			->setLocation( 'options_page', '==', 'theme-options' );
			acf_add_local_field_group( $options->build() );
		endif;
	}
);
