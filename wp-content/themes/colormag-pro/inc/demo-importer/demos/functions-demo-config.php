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
 *
 * @return array
 */
function tg_demo_importer_config( $demo_config ) {
	$new_demo_config = array(
		'colormag-pro'               => array(
			'name'                   => __( 'ColorMag Pro', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-pro/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname' => 'ColorMag Pro',
			),
			'widgets_data_update'    => array(

				/**
				 * Dropdown Categories - Handles widgets Category ID.
				 *
				 * A. Core Post Category:
				 *   1. colormag_featured_posts_slider_widget
				 *   2. colormag_highlighted_posts_widget
				 *   3. colormag_featured_posts_widget
				 *   4. colormag_featured_posts_vertical_widget
				 *   5. colormag_default_news_widget
				 *   6. colormag_ticker_news_widget
				 *   7. colormag_slider_news_widget
				 *   8. colormag_featured_posts_small_thumbnails
				 *   9. colormag_news_in_picture_widget
				 *
				 */
				'dropdown_categories' => array(
					'category' => array(
						'colormag_featured_posts_slider_widget'    => array(
							2 => array(
								'category' => 'Research',
							),
						),
						'colormag_highlighted_posts_widget'        => array(
							2 => array(
								'category' => 'Technology',
							),
						),
						'colormag_featured_posts_widget'           => array(
							2 => array(
								'category' => 'Business',
							),
						),
						'colormag_featured_posts_vertical_widget'  => array(
							2  => array(
								'category' => 'Health',
							),
							3  => array(
								'category' => 'Fashion',
							),
							4  => array(
								'category' => 'Politics',
							),
							9  => array(
								'category' => 'Technology',
							),
							10 => array(
								'category' => 'Travel',
							),
						),
						'colormag_default_news_widget'             => array(
							2 => array(
								'category' => 'Adventure',
							),
						),
						'colormag_ticker_news_widget'              => array(
							2 => array(
								'category' => 'Travel',
							),
						),
						'colormag_slider_news_widget'              => array(
							7 => array(
								'category' => 'Sports',
							),
						),
						'colormag_featured_posts_small_thumbnails' => array(
							2 => array(
								'category' => 'Technology',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
					'footer'  => 'Footer',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
		'colormag-pro-fashion'       => array(
			'name'                   => __( 'ColorMag Pro Fashion', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-pro-fashion/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname' => 'ColorMag Pro Fashion',
			),
			'widgets_data_update'    => array(

				/**
				 * Dropdown Categories - Handles widgets Category ID.
				 *
				 * A. Core Post Category:
				 *   1. colormag_featured_posts_slider_widget
				 *   2. colormag_highlighted_posts_widget
				 *   3. colormag_featured_posts_widget
				 *   4. colormag_featured_posts_vertical_widget
				 *   5. colormag_default_news_widget
				 *   6. colormag_ticker_news_widget
				 *   7. colormag_slider_news_widget
				 *   8. colormag_featured_posts_small_thumbnails
				 *   9. colormag_news_in_picture_widget
				 *
				 */
				'dropdown_categories' => array(
					'category' => array(
						'colormag_featured_posts_slider_widget'    => array(
							2 => array(
								'category' => 'Trends',
							),
						),
						'colormag_highlighted_posts_widget'        => array(
							3 => array(
								'category' => 'Mens Fashion',
							),
						),
						'colormag_featured_posts_widget'           => array(
							2 => array(
								'category' => 'Accessories',
							),
						),
						'colormag_featured_posts_vertical_widget'  => array(
							2 => array(
								'category' => 'Makeup',
							),
							3 => array(
								'category' => 'Mens Fashion',
							),
							4 => array(
								'category' => 'Womans Fashion',
							),
							9 => array(
								'category' => 'Wedding',
							),
						),
						'colormag_default_news_widget'             => array(
							2 => array(
								'category' => 'Outfit',
							),
						),
						'colormag_ticker_news_widget'              => array(
							3 => array(
								'category' => 'Makeup',
							),
							4 => array(
								'category' => 'Mens Fashion',
							),
						),
						'colormag_slider_news_widget'              => array(
							7 => array(
								'category' => 'Glamorous',
							),
						),
						'colormag_featured_posts_small_thumbnails' => array(
							2 => array(
								'category' => 'Outfit',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
					'footer'  => 'Footer',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
		'colormag-pro-technology'    => array(
			'name'                   => __( 'ColorMag Pro Technology', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-pro-technology/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname' => 'ColorMag Pro Technology',
			),
			'widgets_data_update'    => array(

				/**
				 * Dropdown Categories - Handles widgets Category ID.
				 *
				 * A. Core Post Category:
				 *   1. colormag_featured_posts_slider_widget
				 *   2. colormag_highlighted_posts_widget
				 *   3. colormag_featured_posts_widget
				 *   4. colormag_featured_posts_vertical_widget
				 *   5. colormag_default_news_widget
				 *   6. colormag_ticker_news_widget
				 *   7. colormag_slider_news_widget
				 *   8. colormag_featured_posts_small_thumbnails
				 *   9. colormag_news_in_picture_widget
				 *
				 */
				'dropdown_categories' => array(
					'category' => array(
						'colormag_featured_posts_slider_widget'    => array(
							2 => array(
								'category' => 'Featured',
							),
						),
						'colormag_highlighted_posts_widget'        => array(
							2 => array(
								'category' => 'Highlighted',
							),
						),
						'colormag_featured_posts_widget'           => array(
							2 => array(
								'category' => 'Accessories',
							),
							4 => array(
								'category' => 'Camera',
							),
						),
						'colormag_featured_posts_vertical_widget'  => array(
							2 => array(
								'category' => 'Android',
							),
							3 => array(
								'category' => 'Apple',
							),
							4 => array(
								'category' => 'Tablet',
							),
							5 => array(
								'category' => 'Mobile',
							),
							8 => array(
								'category' => 'Game',
							),
						),
						'colormag_default_news_widget'             => array(
							2 => array(
								'category' => 'Laptop',
							),
						),
						'colormag_ticker_news_widget'              => array(
							2 => array(
								'category' => 'Television',
							),
						),
						'colormag_slider_news_widget'              => array(
							7 => array(
								'category' => 'Glamorous',
							),
						),
						'colormag_featured_posts_small_thumbnails' => array(
							2 => array(
								'category' => 'Accessories',
							),
							3 => array(
								'category' => 'Tablet',
							),
						),
						'colormag_news_in_picture_widget'          => array(
							2 => array(
								'category' => 'Top Product',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary Menu',
					'footer'  => 'Footer Menu',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
		'colormag-pro-sports'        => array(
			'name'                   => __( 'ColorMag Pro Sports', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-pro-sports/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname' => 'ColorMag Pro Sports',
			),
			'widgets_data_update'    => array(

				/**
				 * Dropdown Categories - Handles widgets Category ID.
				 *
				 * A. Core Post Category:
				 *   1. colormag_featured_posts_slider_widget
				 *   2. colormag_highlighted_posts_widget
				 *   3. colormag_featured_posts_widget
				 *   4. colormag_featured_posts_vertical_widget
				 *   5. colormag_default_news_widget
				 *   6. colormag_ticker_news_widget
				 *   7. colormag_slider_news_widget
				 *   8. colormag_featured_posts_small_thumbnails
				 *   9. colormag_news_in_picture_widget
				 *
				 */
				'dropdown_categories' => array(
					'category' => array(
						'colormag_featured_posts_slider_widget'    => array(
							2 => array(
								'category' => 'Featured',
							),
						),
						'colormag_highlighted_posts_widget'        => array(
							2 => array(
								'category' => 'Highlighted',
							),
						),
						'colormag_featured_posts_widget'           => array(
							2 => array(
								'category' => 'Athlete',
							),
						),
						'colormag_featured_posts_vertical_widget'  => array(
							2 => array(
								'category' => 'Women',
							),
							5 => array(
								'category' => 'Snow Olympics',
							),
							6 => array(
								'category' => 'Race',
							),
							7 => array(
								'category' => 'Figure Skating',
							),
						),
						'colormag_default_news_widget'             => array(
							2 => array(
								'category' => 'Football',
							),
						),
						'colormag_slider_news_widget'              => array(
							7 => array(
								'category' => 'Athlete',
							),
						),
						'colormag_featured_posts_small_thumbnails' => array(
							2 => array(
								'category' => 'Featured',
							),
						),
						'colormag_news_in_picture_widget'          => array(
							2 => array(
								'category' => 'Top Product',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary Menu',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
		'colormag-pro-recipes'       => array(
			'name'                   => __( 'ColorMag Pro Food Recipe', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-pro-recipes/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname'      => 'ColorMag Food Recipe',
				'page_on_front' => 'Homepage',
			),
			'elementor_data_update'  => array(
				'homepage'      => array(
					'post_title'  => 'Homepage',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-6' => array(
								10 => 'Popular',
								14 => 'News',
							),
							'ColorMag-Posts-Block-7' => array(
								9 => 'Risotto',
							),
							'ColorMag-Posts-Block-8' => array(
								4 => 'Cake',
							),
							'ColorMag-Posts-Block-9' => array(
								6 => 'Quick recipes',
								8 => 'Pizzas',
							),
							'ColorMag-Posts-Grid-3'  => array(
								5 => 'Desert',
							),
							'ColorMag-Posts-Grid-4'  => array(
								6 => 'Quick recipes',
							),
						),
					),
				),
				'baking'        => array(
					'post_title'  => 'Baking',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								3 => 'Baking',
							),
							'ColorMag-Posts-Block-9' => array(
								14 => 'News',
							),
						),
					),
				),
				'breakfast'     => array(
					'post_title'  => 'Breakfast',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								13 => 'Breakfast',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'desert'        => array(
					'post_title'  => 'Desert',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								5 => 'Desert',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'news'          => array(
					'post_title'  => 'News',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								14 => 'News',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'noodels'       => array(
					'post_title'  => 'Noodels',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								7 => 'Noddles',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'pasta'         => array(
					'post_title'  => 'Pasta',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								12 => 'Pasta',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'pizzas'        => array(
					'post_title'  => 'Pizzas',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								8 => 'Pizzas',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'popular'       => array(
					'post_title'  => 'Popular',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								10 => 'Popular',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'quick-recipes' => array(
					'post_title'  => 'Quick Recipes',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								6 => 'Quick recipes',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'risotto'       => array(
					'post_title'  => 'Risotto',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								9 => 'Risotto',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
				'smoothie'      => array(
					'post_title'  => 'Smoothie',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								11 => 'Smoothie',
							),
							'ColorMag-Posts-Block-6' => array(
								14 => 'News',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'primary',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'elementor'     => array(
						'name' => __( 'Elementor', 'colormag' ),
						'slug' => 'elementor/elementor.php',
					),
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				)
			),
		),
		'colormag-pro-health-blog'   => array(
			'name'                   => __( 'ColorMag Pro Health Blog', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-pro-health-blog/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname'      => 'ColorMag Health Blog',
				'page_on_front' => 'Home',
			),
			'widgets_data_update'    => array(
				'dropdown_categories' => array(
					'category' => array(
						'colormag_featured_posts_small_thumbnails' => array(
							2 => array(
								'category' => 'Tips &amp; Guides',
							),
						),
					),
				),
			),
			'elementor_data_update'  => array(
				'home'           => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-1' => array(
								13 => 'Food &amp; Nutrition',
							),
							'ColorMag-Posts-Block-4' => array(
								9 => 'Tips &amp; Guides',
							),
							'ColorMag-Posts-Block-6' => array(
								17 => 'Disease',
							),
							'ColorMag-Posts-Block-7' => array(
								15 => 'Drugs',
								14 => 'Tech',
							),
							'ColorMag-Posts-Block-8' => array(
								3 => 'General',
							),
							'ColorMag-Posts-Block-9' => array(
								6 => 'Quick recipes',
								8 => 'Pizzas',
							),
							'ColorMag-Posts-Grid-4'  => array(
								7 => 'Fitness',
							),
							'ColorMag-Posts-Grid-6'  => array(
								6 => 'Quick recipes',
							),
						),
					),
				),
				'disease'        => array(
					'post_title'  => 'Disease',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								13 => 'Food &amp; Nutrition',
								17 => 'Disease',
							),
							'ColorMag-Posts-Block-7' => array(
								3 => 'General',
							),
						),
					),
				),
				'drugs'          => array(
					'post_title'  => 'Drugs',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								15 => 'Drugs',
							),
							'ColorMag-Posts-Block-7' => array(
								3 => 'General',
							),
						),
					),
				),
				'fitness'        => array(
					'post_title'  => 'Fitness',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								7 => 'Fitness',
							),
							'ColorMag-Posts-Block-7' => array(
								3 => 'General',
							),
						),
					),
				),
				'food-nutrition' => array(
					'post_title'  => 'Food & Nutrition',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								13 => 'Food &amp; Nutrition',
							),
							'ColorMag-Posts-Block-7' => array(
								3 => 'General',
							),
						),
					),
				),
				'general'        => array(
					'post_title'  => 'General',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								3 => 'General',
							),
							'ColorMag-Posts-Block-7' => array(
								3 => 'General',
							),
						),
					),
				),
				'tech'           => array(
					'post_title'  => 'Tech',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								14 => 'Tech',
							),
							'ColorMag-Posts-Block-7' => array(
								3 => 'General',
							),
						),
					),
				),
				'tips-guides'    => array(
					'post_title'  => 'Tips & Guides',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								13 => 'Food &amp; Nutrition',
							),
							'ColorMag-Posts-Block-7' => array(
								3 => 'General',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'elementor'     => array(
						'name' => __( 'Elementor', 'colormag' ),
						'slug' => 'elementor/elementor.php',
					),
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
		'colormag-pro-music'         => array(
			'name'                   => __( 'ColorMag Pro Music', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-pro-music/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname'      => 'ColorMag Pro Music',
				'page_on_front' => 'Home',
			),
			'elementor_data_update'  => array(
				'home'   => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-3' => array(
								7 => 'Video',
							),
							'ColorMag-Posts-Block-4' => array(
								6 => 'Event',
							),
							'ColorMag-Posts-Block-6' => array(
								6  => 'Event',
								10 => 'News',
							),
							'ColorMag-Posts-Block-7' => array(
								3  => 'Music',
								11 => 'Rock',
								12 => 'Jazz',
								13 => 'Pop',
							),
							'ColorMag-Posts-Grid-3'  => array(
								6 => 'Event',
							),
						),
					),
				),
				'events' => array(
					'post_title'  => 'Events',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-4' => array(
								4 => 'High light',
								6 => 'Event',
							),
							'ColorMag-Posts-Block-9' => array(
								10 => 'News',
							),
						),
					),
				),
				'jazz'   => array(
					'post_title'  => 'Jazz',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								12 => 'Jazz',
							),
							'ColorMag-Posts-Block-7' => array(
								4 => 'High light',
								6 => 'Event',
							),
						),
					),
				),
				'news'   => array(
					'post_title'  => 'News',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								4 => 'High light',
							),
							'ColorMag-Posts-Block-7' => array(
								4 => 'High light',
								6 => 'Event',
							),
							'ColorMag-Posts-Block-9' => array(
								6 => 'Event',
							),
						),
					),
				),
				'pop'    => array(
					'post_title'  => 'Pop',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								13 => 'Pop',
							),
							'ColorMag-Posts-Block-7' => array(
								10 => 'News',
							),
						),
					),
				),
				'rock'   => array(
					'post_title'  => 'Rock',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-5' => array(
								11 => 'Rock',
							),
							'ColorMag-Posts-Block-7' => array(
								10 => 'News',
							),
						),
					),
				),
				'videos' => array(
					'post_title'  => 'Videos',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-3' => array(
								7 => 'Video',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'elementor'     => array(
						'name' => __( 'Elementor', 'colormag' ),
						'slug' => 'elementor/elementor.php',
					),
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),

		// For free demos
		'colormag-free'              => array(
			'name'                   => __( 'ColorMag', 'colormag' ),
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'demo_url'               => 'http://demo.themegrill.com/colormag/',
			'demo_pack'              => false,
			'core_options'           => array(
				'blogname' => 'ColorMag',
			),
			'widgets_data_update'    => array(

				/**
				 * Dropdown Categories - Handles widgets Category ID.
				 *
				 * A. Core Post Category:
				 *   1. colormag_featured_posts_slider_widget
				 *   2. colormag_highlighted_posts_widget
				 *   3. colormag_featured_posts_widget
				 *   4. colormag_featured_posts_vertical_widget
				 *
				 */
				'dropdown_categories' => array(
					'category' => array(
						'colormag_featured_posts_slider_widget'   => array(
							4 => array(
								'category' => 'Latest',
							),
						),
						'colormag_highlighted_posts_widget'       => array(
							3 => array(
								'category' => 'FEATURED',
							),
						),
						'colormag_featured_posts_widget'          => array(
							3 => array(
								'category' => 'Health',
							),
							4 => array(
								'category' => 'Technology',
							),
						),
						'colormag_featured_posts_vertical_widget' => array(
							3 => array(
								'category' => 'Fashion',
							),
							4 => array(
								'category' => 'Sports',
							),
							5 => array(
								'category' => 'General',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
		'colormag-business-magazine' => array(
			'name'                   => __( 'ColorMag Business Magazine', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-business-magazine/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname'      => 'ColorMag Business Magazine',
				'page_on_front' => 'Home',
			),
			'elementor_data_update'  => array(
				'home'             => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Grid-5'  => array(
								6 => 'Employment',
							),
							'ColorMag-Posts-Block-1' => array(
								5 => 'Corporate',
							),
							'ColorMag-Posts-Block-4' => array(
								8 => 'Money',
							),
							'ColorMag-Posts-Block-6' => array(
								4 => 'Investments',
							),
							'ColorMag-Posts-Block-9' => array(
								9 => 'Market',
							),
						),
					),
				),
				'corporate'        => array(
					'post_title'  => 'Corporate',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								5 => 'Corporate',
							),
						),
					),
				),
				'global-trade'     => array(
					'post_title'  => 'Global Trade',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								14 => 'Global Trade',
							),
						),
					),
				),
				'companies'        => array(
					'post_title'  => 'Companies',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								15 => 'Companies',
							),
						),
					),
				),
				'entrepreneurship' => array(
					'post_title'  => 'Entrepreneurship',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								16 => 'Entrepreneurship',
							),
						),
					),
				),
				'employment'       => array(
					'post_title'  => 'Employment',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								6 => 'Employment',
							),
						),
					),
				),
				'investment'       => array(
					'post_title'  => 'Investment',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								4 => 'Investments',
							),
						),
					),
				),
				'market'           => array(
					'post_title'  => 'Market',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								9 => 'Market',
							),
						),
					),
				),
				'money'            => array(
					'post_title'  => 'Money',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								8 => 'Money',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'elementor'     => array(
						'name' => __( 'Elementor', 'colormag' ),
						'slug' => 'elementor/elementor.php',
					),
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
		'colormag-beauty-blog'       => array(
			'name'                   => __( 'ColorMag Beauty Blog', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-beauty-blog/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname'      => 'ColorMag Beauty Blog',
				'page_on_front' => 'Home',
			),
			'elementor_data_update'  => array(
				'home'      => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Grid-3'  => array(
								10 => 'News',
							),
							'ColorMag-Posts-Block-2' => array(
								5 => 'Hair',
								6 => 'Fashion',
								8 => 'Health',
								9 => 'Eye Make up',
							),
							'ColorMag-Posts-Block-6' => array(
								10 => 'News',
							),
						),
					),
				),
				'make-up'   => array(
					'post_title'  => 'Make Up',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								9 => 'Eye Make up',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'hair'      => array(
					'post_title'  => 'Hair',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								5 => 'Hair',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'products'  => array(
					'post_title'  => 'Products',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								4 => 'Product',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'lifestyle' => array(
					'post_title'  => 'Lifestyle',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-6' => array(
								4 => 'Product',
								2 => 'Food &amp; Drinks',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'food'      => array(
					'post_title'  => 'Food',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								2 => 'Food &amp; Drinks',
							),
							'ColorMag-Posts-Block-6' => array(
								4 => 'Product',
								2 => 'Food &amp; Drinks',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'health'    => array(
					'post_title'  => 'Health',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								8 => 'Health',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'fashion'   => array(
					'post_title'  => 'Fashion',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								6 => 'Fashion',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								4 => 'Product',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'tips'      => array(
					'post_title'  => 'Tips',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								7 => 'Beauty Tips',
							),
							'ColorMag-Posts-Block-6' => array(
								4 => 'Product',
								2 => 'Food &amp; Drinks',
								7 => 'Beauty Tips',
							),
						),
					),
				),
				'news'      => array(
					'post_title'  => 'News',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								10 => 'News',
							),
							'ColorMag-Posts-Block-6' => array(
								2 => 'Food &amp; Drinks',
								7 => 'Beauty Tips',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'elementor'     => array(
						'name' => __( 'Elementor', 'colormag' ),
						'slug' => 'elementor/elementor.php',
					),
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
		'colormag-dark'              => array(
			'name'                   => __( 'ColorMag Dark', 'colormag' ),
			'demo_url'               => 'https://demo.themegrill.com/colormag-dark/',
			'demo_pack'              => false,
			'theme'                  => 'ColorMag Pro',
			'template'               => 'colormag-pro',
			'core_options'           => array(
				'blogname'      => 'ColorMag Dark',
				'page_on_front' => 'Home',
			),
			'elementor_data_update'  => array(
				'home'          => array(
					'post_title'  => 'Home',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-1' => array(
								9  => 'Fashion',
								11 => 'News',
							),
							'ColorMag-Posts-Block-4' => array(
								10 => 'Food &amp; Health',
							),
							'ColorMag-Posts-Block-6' => array(
								4 => 'Travel',
								6 => 'World',
								7 => 'Technology',
							),
							'ColorMag-Posts-Grid-5'  => array(
								8 => 'Entertainment',
							),
						),
					),
				),
				'entertainment' => array(
					'post_title'  => 'Entertainment',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								8 => 'Entertainment',
							),
							'ColorMag-Posts-Block-4' => array(
								8 => 'Entertainment',
							),
						),
					),
				),
				'fashion'       => array(
					'post_title'  => 'Fashion',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								9 => 'Fashion',
							),
							'ColorMag-Posts-Block-4' => array(
								9 => 'Fashion',
							),
						),
					),
				),
				'food-health'   => array(
					'post_title'  => 'Food & Health',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								10 => 'Food &amp; Health',
							),
							'ColorMag-Posts-Block-4' => array(
								10 => 'Food &amp; Health',
							),
						),
					),
				),
				'news'          => array(
					'post_title'  => 'News',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								2 => 'Politics',
								3 => 'Sports',
								6 => 'World',
							),
						),
					),
				),
				'politics'      => array(
					'post_title'  => 'Politics',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								2 => 'Politics',
							),
							'ColorMag-Posts-Block-4' => array(
								2 => 'Politics',
							),
						),
					),
				),
				'sports'        => array(
					'post_title'  => 'Sports',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								3 => 'Sports',
							),
							'ColorMag-Posts-Block-4' => array(
								3 => 'Sports',
							),
						),
					),
				),
				'technology'    => array(
					'post_title'  => 'Technology',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								7 => 'Technology',
							),
							'ColorMag-Posts-Block-4' => array(
								7 => 'Technology',
							),
						),
					),
				),
				'travel'        => array(
					'post_title'  => 'Travel',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								4 => 'Travel',
							),
							'ColorMag-Posts-Block-4' => array(
								4 => 'Travel',
							),
						),
					),
				),
				'world'         => array(
					'post_title'  => 'World',
					'data_update' => array(
						'category' => array(
							'ColorMag-Posts-Block-2' => array(
								6 => 'World',
							),
							'ColorMag-Posts-Block-4' => array(
								6 => 'World',
							),
						),
					),
				),
			),
			'customizer_data_update' => array(
				'nav_menu_locations' => array(
					'primary' => 'Primary',
				),
			),
			'plugins_list'           => array(
				'required' => array(
					'elementor'     => array(
						'name' => __( 'Elementor', 'colormag' ),
						'slug' => 'elementor/elementor.php',
					),
					'everest-forms' => array(
						'name' => __( 'Everest Forms – Easy Contact Form and Form Builder', 'colormag' ),
						'slug' => 'everest-forms/everest-forms.php',
					),
				),
			),
		),
	);

	return array_merge( $new_demo_config, $demo_config );
}
