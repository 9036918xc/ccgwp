<?php
/**
 * Functions for configuring demo importer.
 *
 * @author   ThemeGrill
 * @category Admin
 * @package  Importer/Functions
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'themegrill_demo_importer_config', 'tg_demo_importer_config' );

/**
 * Setup demo importer config.
 *
 * @param  array $demo_config
 * @return array
 */
function tg_demo_importer_config( $demo_config ) {
	$new_demo_config = array(
		'accelerate-pro' => array(
			'name'         => __( 'Accelerate Pro', 'accelerate' ),
			'demo_url'     => 'http://demo.themegrill.com/accelerate-pro/',
			'demo_pack'    => false,
			'theme'        => 'Accelerate Pro',
			'template'     => 'accelerate-pro',
			'core_options' => array(
				'blogname'       => 'Accelerate Pro',
				'page_on_front'  => 'Home',
				'page_for_posts' => 'Blog'
			),
			'widgets_data_update' => array(

				/**
				 * Dropdown Pages - Handles widgets Page ID.
				 *
				 * 1. accelerate_image_service_widget
				 * 2. accelerate_team_widget
				 * 3. accelerate_recent_work_widget
				 */
				'dropdown_pages' => array(
					'accelerate_image_service_widget' => array(
						2 => array(
							'page_id0' => 'Nice Support',
							'page_id1' => 'Cool Design',
							'page_id2' => 'Clean Code'
						)
					),
					'accelerate_team_widget' => array(
						3 => array(
							'page_0' => 'Amanda Hayes',
							'page_1' => 'Brandon Reed',
							'page_2' => 'Shirley King'
						)
					),
					'accelerate_recent_work_widget' => array(
						2 => array(
							'page_id0' => 'Skating',
							'page_id1' => 'Reading Books',
							'page_id2' => 'Photography',
							'page_id3' => 'Spectacle'
						)
					)
				),

				/**
				 * Dropdown Categories - Handles widgets Category ID.
				 *
				 * A. Core Post Category:
				 *    1. accelerate_featured_posts_widget
				 *
				 * Note: Supported Taxonomy:
				 *    A. Core Post Category - category
				 */
				'dropdown_categories' => array(
					'category' => array(
						'accelerate_featured_posts_widget' => array(
							2 => array(
								'category' => 'Featured'
							)
						)
					)
				)
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary'	=> 'Primary',
					'header'	=> 'Header',
					'footer'	=> 'Footer'
				)
			),
			'plugins_list' => array(
				'recommended' => array(
					'contact-form-7' => array(
						'name' => __( 'Contact Form', 'accelerate' ),
						'slug' => 'contact-form-7/wp-contact-form-7.php',
					),
					'breadcrumb-navxt' => array(
						'name' => __( 'Breadcrumb NavXT', 'accelerate' ),
						'slug' => 'breadcrumb-navxt/breadcrumb-navxt.php',
					),
					'woocommerce' => array(
						'name' => __( 'WooCommerce', 'accelerate' ),
						'slug' => 'woocommerce/woocommerce.php',
					),
					'google-maps-widget' => array(
						'name' => __( 'Google Maps Widget', 'accelerate' ),
						'slug' => 'google-maps-widget/google-maps-widget.php',
					)
				)
			)
		)
	);

	return array_merge( $new_demo_config, $demo_config );
}
