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
			->addTab(
				'header',
				array(
					'label' => 'Header',
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

			// Front Automation
			->addTab(
				'front_automation',
				array(
					'label' => 'Front Automation',
				)
			)
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
					'label' => 'Sidfotbild vänster',
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
					'label' => 'Sidfotbild höger',
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
					'label' => 'Sidfotbild vänster',
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
					'label' => 'Sidfotbild höger',
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
					'label' => 'Sidfotbild vänster',
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
					'label' => 'Sidfotbild höger',
				)
			)
			->endGroup()
			->setLocation( 'options_page', '==', 'theme-options' );
			acf_add_local_field_group( $options->build() );
		endif;
	}
);
add_post_type_support( 'page', 'excerpt' );
