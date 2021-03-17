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

			// Front Automation
			->addTab(
				'front_automation',
				array(
					'label' => 'Front Automation',
				)
			)
			->addGroup(
				'header_front',
				array(
					'label' => 'Sidhuvud',
				)
			)
			->addImage(
				'logo',
				array(
					'label' => 'Logga',
				)
			)
			->addSelect(
				'front_topmenu',
				array(
					'label' => 'Toppmeny',
				)
			)
			->addSelect(
				'front_menu',
				array(
					'label' => 'Meny',
				)
			)
			->endGroup()
			->addGroup(
				'footer_front',
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

			// Fröjd Automation
			->addTab(
				'frojd_automation',
				array(
					'label' => 'Fröjd Automation',
				)
			)
			->addGroup(
				'header_frojd',
				array(
					'label' => 'Sidhuvud',
				)
			)
			->addImage(
				'logo',
				array(
					'label' => 'Logga',
				)
			)
			->addSelect(
				'frojd_topmenu',
				array(
					'label' => 'Toppmeny',
				)
			)
			->addSelect(
				'frojd_menu',
				array(
					'label' => 'Meny',
				)
			)
			->endGroup()
			->addGroup(
				'footer_frojd',
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

			// Fröjd Automation
			->addTab(
				'iml_technology ',
				array(
					'label' => 'IML Technology',
				)
			)
			->addGroup(
				'header_iml',
				array(
					'label' => 'Sidhuvud',
				)
			)
			->addImage(
				'logo',
				array(
					'label' => 'Logga',
				)
			)
			->addSelect(
				'iml_topmenu',
				array(
					'label' => 'Toppmeny',
				)
			)
			->addSelect(
				'iml_menu',
				array(
					'label' => 'Meny',
				)
			)
			->endGroup()
			->addGroup(
				'footer_iml',
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
		endif;
	}
);
add_post_type_support( 'page', 'excerpt' );




add_filter( 'acf/load_field/name=front_topmenu', 'populate_select_width_menus' );
add_filter( 'acf/load_field/name=front_menu', 'populate_select_width_menus' );
add_filter( 'acf/load_field/name=frojd_topmenu', 'populate_select_width_menus' );
add_filter( 'acf/load_field/name=frojd_menu', 'populate_select_width_menus' );
add_filter( 'acf/load_field/name=iml_topmenu', 'populate_select_width_menus' );
add_filter( 'acf/load_field/name=iml_menu', 'populate_select_width_menus' );

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
