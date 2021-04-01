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
				'404',
				array(
					'label' => '404',
				)
			)
			->addWysiwyg(
				'404_text',
				array(
					'label' => 'Text',
				)
			)
			->addTab(
				'blog',
				array(
					'label' => 'Blogg',
				)
			)
			->addWysiwyg(
				'blog_text',
				array(
					'label' => 'Bloggtext',
				)
			)
			->addImage(
				'blog_bg',
				array(
					'label'         => 'Bloggbakgrund',
					'return_format' => 'id',
				)
			)

			// Header
			->addTab(
				'header',
				array(
					'label' => 'Sidhuvud',
				)
			)
			->addImage(
				'automation_image',
				array(
					'label'         => 'Automationbild',
					'return_format' => 'id',
				)
			)
			->addLink(
				'automation_link',
				array(
					'label' => 'Automationlänk',
				)
			)

			// Footer
			->addTab(
				'footer',
				array(
					'label' => 'Sidfot',
				)
			)
			->addGroup(
				'footer',
				array(
					'label' => 'Sidfot',
				)
			)
			->addWysiwyg(
				'footer_text_left',
				array(
					'label' => 'Sidfottext vänster',
				)
			)
			->addImage(
				'footer_icon_left',
				array(
					'label'         => 'Sidfotbild vänster',
					'return_format' => 'id',
				)
			)
			->addWysiwyg(
				'footer_text_right',
				array(
					'label' => 'Sidfottext höger',
				)
			)
			->addImage(
				'footer_icon_right',
				array(
					'label'         => 'Sidfotbild höger',
					'return_format' => 'id',
				)
			)
			->endGroup()
			->setLocation( 'options_page', '==', 'theme-options' );
			acf_add_local_field_group( $options->build() );
	}
);

add_action(
	'acf/init',
	function() {
			acf_add_options_page(
				array(
					'page_title' => get_bloginfo( 'name' ) . ' temainställningar EN',
					'menu_title' => 'Temainställningar EN',
					'menu_slug'  => 'theme-options-en',
				)
			);
			$optionsen = new FieldsBuilder( 'anpassningaren' );
			$optionsen
			->addTab(
				'404_en',
				array(
					'label' => '404',
				)
			)
			->addWysiwyg(
				'404_text_en',
				array(
					'label' => 'Text',
				)
			)
			->addTab(
				'blog_en',
				array(
					'label' => 'Blogg',
				)
			)
			->addWysiwyg(
				'blog_text_en',
				array(
					'label' => 'Bloggtext',
				)
			)
			->addImage(
				'blog_bg_en',
				array(
					'label'         => 'Bloggbakgrund',
					'return_format' => 'id',
				)
			)

			// Header
			->addTab(
				'header_en',
				array(
					'label' => 'Sidhuvud',
				)
			)
			->addImage(
				'automation_image_en',
				array(
					'label'         => 'Automationbild',
					'return_format' => 'id',
				)
			)
			->addLink(
				'automation_link_en',
				array(
					'label' => 'Automationlänk',
				)
			)

			// Footer
			->addTab(
				'footer_en',
				array(
					'label' => 'Sidfot',
				)
			)
			->addGroup(
				'footer_en',
				array(
					'label' => 'Sidfot',
				)
			)
			->addWysiwyg(
				'footer_text_left',
				array(
					'label' => 'Sidfottext vänster',
				)
			)
			->addImage(
				'footer_icon_left',
				array(
					'label'         => 'Sidfotbild vänster',
					'return_format' => 'id',
				)
			)
			->addWysiwyg(
				'footer_text_right',
				array(
					'label' => 'Sidfottext höger',
				)
			)
			->addImage(
				'footer_icon_right',
				array(
					'label'         => 'Sidfotbild höger',
					'return_format' => 'id',
				)
			)
			->endGroup()
			->setLocation( 'options_page', '==', 'theme-options-en' );
			acf_add_local_field_group( $optionsen->build() );
	}
);


add_post_type_support( 'page', 'excerpt' );

add_filter( 'acf/load_field/name=topmenu', 'populate_select_width_menus' );
add_filter( 'acf/load_field/name=menu', 'populate_select_width_menus' );

function populate_select_width_menus( $field ) {
	$field['choices'] = array();
	$menus            = get_terms( 'nav_menu' );
	if ( is_array( $menus ) ) {
		foreach ( $menus as $menu ) {
			$field['choices'][ $menu->term_id ] = $menu->name;
		}
	}
	return $field;
}
