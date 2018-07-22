<?php

/**
 * ColorMag Theme Customizer
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */
function colormag_customize_register( $wp_customize ) {

	// Transport postMessage variable set
	$customizer_selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '#site-title a',
			'render_callback' => 'colormag_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '#site-description',
			'render_callback' => 'colormag_customize_partial_blogdescription',
		) );
	}

	// Theme important links started
	class COLORMAG_Important_Links extends WP_Customize_Control {

		public $type = "colormag-important-links";

		public function render_content() {
			//Add Theme instruction, Support Forum, Demo Link, Rating Link
			$important_links = array(
				'documentation' => array(
					'link' => esc_url( 'https://docs.themegrill.com/colormag/' ),
					'text' => __( 'Documentation', 'colormag' ),
				),
				'support'       => array(
					'link' => esc_url( 'https://themegrill.com/support-forum/' ),
					'text' => __( 'Support', 'colormag' ),
				),
				'demo'          => array(
					'link' => esc_url( 'https://demo.themegrill.com/colormag-pro/' ),
					'text' => __( 'View Demo', 'colormag' ),
				),
				'rating'        => array(
					'link' => esc_url( 'https://wordpress.org/support/view/theme-reviews/colormag' ),
					'text' => __( 'Rate This Theme', 'colormag' ),
				),
			);
			foreach ( $important_links as $important_link ) {
				echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr( $important_link['text'] ) . ' </a></p>';
			}
		}

	}

	$wp_customize->add_section( 'colormag_important_links', array(
		'priority' => 700,
		'title'    => __( 'ColorMag Theme Important Links', 'colormag' ),
	) );

	/**
	 * This setting has the dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'colormag_important_links', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_links_sanitize',
	) );

	$wp_customize->add_control( new COLORMAG_Important_Links( $wp_customize, 'important_links', array(
		'label'    => __( 'Important Links', 'colormag' ),
		'section'  => 'colormag_important_links',
		'settings' => 'colormag_important_links',
	) ) );

	// Theme Important Links Ended
	// Extend Customizer Options to add the small information text
	class COLORMAG_Custom_Information extends WP_Customize_Control {

		public $type = 'colormag-custom-information';

		public function render_content() {
			?>

			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<p><?php echo wp_kses_post( $this->description ); ?></p>

			<?php
		}

	}

	// Start of the Header Options
	$wp_customize->add_panel( 'colormag_header_options', array(
		'capabitity'  => 'edit_theme_options',
		'description' => __( 'Change the Header Settings from here as you want', 'colormag' ),
		'priority'    => 500,
		'title'       => __( 'Header Options', 'colormag' ),
	) );

	// breaking news enable/disable
	$wp_customize->add_section( 'colormag_breaking_news_section', array(
		'title' => __( 'Breaking News', 'colormag' ),
		'panel' => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_breaking_news', array(
		'priority'          => 1,
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_breaking_news', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to enable the breaking news section', 'colormag' ),
		'section'  => 'colormag_breaking_news_section',
		'settings' => 'colormag_breaking_news',
	) );

	$wp_customize->add_setting( 'colormag_breaking_news_category_option', array(
		'priority'          => 2,
		'default'           => 'latest',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_breaking_news_category_option', array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Choose the required option to display the latest posts from:', 'colormag' ),
		'section'  => 'colormag_breaking_news_section',
		'settings' => 'colormag_breaking_news_category_option',
		'choices'  => array(
			'latest'   => esc_html__( 'Latest Posts', 'colormag' ),
			'category' => esc_html__( 'Category', 'colormag' ),
		),
	) );

	// Category select option for the breaking news
	$cats             = array();
	$categories_lists = get_categories();
	foreach ( $categories_lists as $categories => $category ) {
		$cats[ $category->term_id ] = $category->name;
	}

	$wp_customize->add_setting( 'colormag_breaking_news_category', array(
		'priority'          => 3,
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_breaking_news_category', array(
		'type'     => 'select',
		'choices'  => $cats,
		'label'    => esc_html__( 'Choose the required category to display as the latest posts:', 'colormag' ),
		'section'  => 'colormag_breaking_news_section',
		'settings' => 'colormag_breaking_news_category',
	) );

	$wp_customize->add_setting( 'colormag_breaking_news_content_option', array(
		'priority'          => 3,
		'default'           => __( 'Latest:', 'colormag' ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_breaking_news_content_option', array(
		'label'    => __( 'Enter the text to display for the ticker news', 'colormag' ),
		'section'  => 'colormag_breaking_news_section',
		'settings' => 'colormag_breaking_news_content_option',
	) );

	// Selective refresh for breaking news text
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_breaking_news_content_option', array(
			'selector'        => '.breaking-news-latest',
			'render_callback' => 'colormag_breaking_news_content',
		) );
	}

	$wp_customize->add_setting( 'colormag_breaking_news_setting_animation_options', array(
		'priority'          => 2,
		'default'           => 'down',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_breaking_news_setting_animation_options', array(
		'type'     => 'select',
		'label'    => __( 'Choose the animation style for the Breaking News in the Header', 'colormag' ),
		'section'  => 'colormag_breaking_news_section',
		'settings' => 'colormag_breaking_news_setting_animation_options',
		'choices'  => array(
			'up'   => __( 'Up', 'colormag' ),
			'down' => __( 'Down', 'colormag' ),
		),
	) );

	$wp_customize->add_setting( 'colormag_breaking_news_duration_setting_options', array(
		'priority'          => 3,
		'default'           => 4,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_breaking_news_duration_setting_options_sanitize',
	) );

	$wp_customize->add_control( 'colormag_breaking_news_duration_setting_options', array(
		'label'    => __( 'Enter the duration time for the Breaking News in the Header', 'colormag' ),
		'section'  => 'colormag_breaking_news_section',
		'settings' => 'colormag_breaking_news_duration_setting_options',
	) );

	$wp_customize->add_setting( 'colormag_breaking_news_speed_setting_options', array(
		'priority'          => 4,
		'default'           => 1,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_breaking_news_speed_setting_options_sanitize',
	) );

	$wp_customize->add_control( 'colormag_breaking_news_speed_setting_options', array(
		'label'    => __( 'Enter the speed time for the Breaking News in the Header', 'colormag' ),
		'section'  => 'colormag_breaking_news_section',
		'settings' => 'colormag_breaking_news_speed_setting_options',
	) );

	$wp_customize->add_setting( 'colormag_breaking_news_position_options', array(
		'priority'          => 5,
		'default'           => 'header',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_breaking_news_position_options', array(
		'type'     => 'radio',
		'label'    => __( 'Choose the location/area to place the Breaking News', 'colormag' ),
		'section'  => 'colormag_breaking_news_section',
		'settings' => 'colormag_breaking_news_position_options',
		'choices'  => array(
			'header' => __( 'Header', 'colormag' ),
			'main'   => __( 'Below Navigation', 'colormag' ),
		),
	) );

	// date display enable/disable
	$wp_customize->add_section( 'colormag_date_display_section', array(
		'title' => __( 'Show Date', 'colormag' ),
		'panel' => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_date_display', array(
		'priority'          => 2,
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_date_display', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to show the date in header', 'colormag' ),
		'section'  => 'colormag_date_display_section',
		'settings' => 'colormag_date_display',
	) );

	// Selective refresh for date display
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_date_display', array(
			'selector'        => '.date-in-header',
			'render_callback' => 'colormag_date_display',
		) );
	}

	// date in header display type
	$wp_customize->add_setting( 'colormag_date_display_type', array(
		'default'           => 'theme_default',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_date_display_type', array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Date in header display type:', 'colormag' ),
		'choices'  => array(
			'theme_default'          => esc_html__( 'Theme Default Setting', 'colormag' ),
			'wordpress_date_setting' => esc_html__( 'From WordPress Date Setting', 'colormag' ),
		),
		'section'  => 'colormag_date_display_section',
		'settings' => 'colormag_date_display_type',
	) );

	// Selective refresh for date display type
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_date_display_type', array(
			'selector'        => '.date-in-header',
			'render_callback' => 'colormag_date_display_type',
		) );
	}

	// home icon enable/disable in primary menu
	$wp_customize->add_section( 'colormag_home_icon_display_section', array(
		'title' => __( 'Show Home Icon', 'colormag' ),
		'panel' => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_home_icon_display', array(
		'priority'          => 3,
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_home_icon_display', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to show the home icon in the primary menu', 'colormag' ),
		'section'  => 'colormag_home_icon_display_section',
		'settings' => 'colormag_home_icon_display',
	) );

	// Selective refresh for displaying home icon
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_home_icon_display', array(
			'selector'        => '.home-icon',
			'render_callback' => '',
		) );
	}

	// primary sticky menu enable/disable
	$wp_customize->add_section( 'colormag_primary_sticky_menu_section', array(
		'title' => __( 'Sticky Menu', 'colormag' ),
		'panel' => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_primary_sticky_menu', array(
		'priority'          => 4,
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_primary_sticky_menu', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to enable the sticky behavior of the primary menu', 'colormag' ),
		'section'  => 'colormag_primary_sticky_menu_section',
		'settings' => 'colormag_primary_sticky_menu',
	) );

	$wp_customize->add_setting( 'colormag_primary_sticky_menu_type', array(
		'default'           => 'sticky',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_primary_sticky_menu_type', array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Select the option you want:', 'colormag' ),
		'choices' => array(
			'sticky'           => esc_html__( 'Make the menu sticky', 'colormag' ),
			'reveal_on_scroll' => esc_html__( 'Reveal the menu on scroll up', 'colormag' ),
		),
		'section' => 'colormag_primary_sticky_menu_section',
	) );

	// search icon in menu enable/disable
	$wp_customize->add_section( 'colormag_search_icon_in_menu_section', array(
		'title' => __( 'Search Icon', 'colormag' ),
		'panel' => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_search_icon_in_menu', array(
		'priority'          => 5,
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_search_icon_in_menu', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to display the Search Icon in the primary menu', 'colormag' ),
		'section'  => 'colormag_search_icon_in_menu_section',
		'settings' => 'colormag_search_icon_in_menu',
	) );

	// random posts in menu enable/disable
	$wp_customize->add_section( 'colormag_random_post_in_menu_section', array(
		'title' => __( 'Random Post', 'colormag' ),
		'panel' => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_random_post_in_menu', array(
		'priority'          => 6,
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_random_post_in_menu', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to display the Random Post Icon in the primary menu', 'colormag' ),
		'section'  => 'colormag_random_post_in_menu_section',
		'settings' => 'colormag_random_post_in_menu',
	) );

	// Selective refresh for displaying random post icon
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_random_post_in_menu', array(
			'selector'        => '.random-post',
			'render_callback' => 'colormag_random_post',
		) );
	}

	// logo upload options
	$wp_customize->add_section( 'colormag_header_logo', array(
		'priority' => 1,
		'title'    => __( 'Header Logo', 'colormag' ),
		'panel'    => 'colormag_header_options',
	) );

	if ( ! function_exists( 'the_custom_logo' ) ) {
		$wp_customize->add_setting( 'colormag_logo', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'colormag_logo', array(
			'label'   => __( 'Upload logo for your header', 'colormag' ),
			'section' => 'colormag_header_logo',
			'setting' => 'colormag_logo',
		) ) );
	}

	$wp_customize->add_setting( 'colormag_header_logo_placement', array(
		'default'           => 'header_text_only',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_header_logo_placement', array(
		'type'    => 'radio',
		'label'   => __( 'Choose the option that you want', 'colormag' ),
		'section' => 'colormag_header_logo',
		'choices' => array(
			'header_logo_only' => __( 'Header Logo Only', 'colormag' ),
			'header_text_only' => __( 'Header Text Only', 'colormag' ),
			'show_both'        => __( 'Show Both', 'colormag' ),
			'disable'          => __( 'Disable', 'colormag' ),
		),
	) );

	// header image position setting
	$wp_customize->add_section( 'colormag_header_image_position_setting', array(
		'priority' => 6,
		'title'    => __( 'Header Image Position', 'colormag' ),
		'panel'    => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_header_image_position', array(
		'default'           => 'position_two',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_header_image_position', array(
		'type'    => 'radio',
		'label'   => __( 'Header image display position', 'colormag' ),
		'section' => 'colormag_header_image_position_setting',
		'choices' => array(
			'position_one'   => __( 'Display the Header image just above the site title/text.', 'colormag' ),
			'position_two'   => __( 'Default: Display the Header image between site title/text and the main/primary menu.', 'colormag' ),
			'position_three' => __( 'Display the Header image below main/primary menu.', 'colormag' ),
		),
	) );

	$wp_customize->add_setting( 'colormag_header_image_link', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_header_image_link', array(
		'type'    => 'checkbox',
		'label'   => __( 'Check to make header image link back to home page', 'colormag' ),
		'section' => 'colormag_header_image_position_setting',
	) );

	// Link header image to custom location
	$wp_customize->add_setting( 'colormag_header_image_custom_link', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'colormag_header_image_custom_link', array(
		'label'           => __( 'Custom link to header image ', 'colormag' ),
		'section'         => 'colormag_header_image_position_setting',
		'settings'        => 'colormag_header_image_custom_link',
		'active_callback' => 'is_header_linked_home',
	) );

	// header display type
	$wp_customize->add_section( 'colormag_header_display_type_setting', array(
		'priority' => 3,
		'title'    => __( 'Header Display Type', 'colormag' ),
		'panel'    => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_header_display_type', array(
		'default'           => 'type_one',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_header_display_type', array(
		'type'    => 'radio',
		'label'   => __( 'Choose the header display type that you want', 'colormag' ),
		'section' => 'colormag_header_display_type_setting',
		'choices' => array(
			'type_one'   => __( 'Type 1 (Default): Header text & logo on left, header sidebar on right', 'colormag' ),
			'type_two'   => __( 'Type 2: Header sidebar on left, header text & logo on right', 'colormag' ),
			'type_three' => __( 'Type 3: Header text, header sidebar both aligned center', 'colormag' ),
		),
	) );

	class COLORMAG_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;
			?>
			<style>
				#colormag-img-container .colormag-radio-img-img {
					border: 3px solid #DEDEDE;
					margin: 0 5px 5px 0;
					cursor: pointer;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}

				#colormag-img-container .colormag-radio-img-selected {
					border: 3px solid #AAA;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}

				input[type=checkbox]:before {
					content: '';
					margin: -3px 0 0 -4px;
				}
			</style>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<ul class="controls" id='colormag-img-container'>
				<?php
				foreach ( $this->choices as $value => $label ) :
					$class = ( $this->value() == $value ) ? 'colormag-radio-img-selected colormag-radio-img-img' : 'colormag-radio-img-img';
					?>
					<li style="display: inline;">
						<label style="margin-left: 0">
							<input <?php $this->link(); ?>style='display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php
							$this->link();
							checked( $this->value(), $value );
							?> />
							<img src='<?php echo esc_html( $label ); ?>' class='<?php echo $class; ?>' />
						</label>
					</li>
				<?php
				endforeach;
				?>
			</ul>
			<script type="text/javascript">

				jQuery( document ).ready( function ( $ ) {
					$( '.controls#colormag-img-container li img' ).click( function () {
						$( '.controls#colormag-img-container li' ).each( function () {
							$( this ).find( 'img' ).removeClass( 'colormag-radio-img-selected' );
						} );
						$( this ).addClass( 'colormag-radio-img-selected' );
					} );
				} );

			</script>
			<?php
		}

	}

	// Main total Header area display type
	$wp_customize->add_section( 'colormag_main_total_header_area_display_type_option', array(
		'priority' => 4,
		'title'    => esc_html__( 'Main Header Area Display Type', 'colormag' ),
		'panel'    => 'colormag_header_options',
	) );

	$wp_customize->add_setting( 'colormag_main_total_header_area_display_type', array(
		'default'           => 'type_one',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( new COLORMAG_Image_Radio_Control( $wp_customize, 'colormag_main_total_header_area_display_type', array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Choose the main total header area display type that you want', 'colormag' ),
		'section' => 'colormag_main_total_header_area_display_type_option',
		'choices' => array(
			'type_one'   => COLORMAG_ADMIN_IMAGES_URL . '/header-variation-1.png',
			'type_two'   => COLORMAG_ADMIN_IMAGES_URL . '/header-variation-2.png',
			'type_three' => COLORMAG_ADMIN_IMAGES_URL . '/header-variation-3.png',
			'type_four'  => COLORMAG_ADMIN_IMAGES_URL . '/header-variation-4.png',
			'type_five'  => COLORMAG_ADMIN_IMAGES_URL . '/header-variation-5.png',
			'type_six'   => COLORMAG_ADMIN_IMAGES_URL . '/header-variation-6.png',
		),
	) ) );
	// end of header options
	// Start of the Design Options
	$wp_customize->add_panel( 'colormag_design_options', array(
		'capabitity'  => 'edit_theme_options',
		'description' => __( 'Change the Design Settings from here as you want', 'colormag' ),
		'priority'    => 505,
		'title'       => __( 'Design Options', 'colormag' ),
	) );

	// FrontPage setting
	$wp_customize->add_section( 'colormag_front_page_setting', array(
		'priority' => 1,
		'title'    => __( 'Front Page Settings', 'colormag' ),
		'panel'    => 'colormag_design_options',
	) );
	$wp_customize->add_setting( 'colormag_hide_blog_front', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_hide_blog_front', array(
		'type'    => 'checkbox',
		'label'   => __( 'Check to hide blog posts/static page on front page', 'colormag' ),
		'section' => 'colormag_front_page_setting',
	) );

	// site layout setting
	$wp_customize->add_section( 'colormag_site_layout_setting', array(
		'priority' => 2,
		'title'    => __( 'Site Layout', 'colormag' ),
		'panel'    => 'colormag_design_options',
	) );

	$wp_customize->add_setting( 'colormag_site_layout', array(
		'default'           => 'wide_layout',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_site_layout', array(
		'type'    => 'radio',
		'label'   => __( 'Choose your site layout. The change is reflected in whole site', 'colormag' ),
		'choices' => array(
			'boxed_layout' => __( 'Boxed Layout', 'colormag' ),
			'wide_layout'  => __( 'Wide Layout', 'colormag' ),
		),
		'section' => 'colormag_site_layout_setting',
	) );

	// default layout setting
	$wp_customize->add_section( 'colormag_default_layout_setting', array(
		'priority' => 3,
		'title'    => __( 'Default layout', 'colormag' ),
		'panel'    => 'colormag_design_options',
	) );

	$wp_customize->add_setting( 'colormag_default_layout', array(
		'default'           => 'right_sidebar',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( new COLORMAG_Image_Radio_Control( $wp_customize, 'colormag_default_layout', array(
		'type'     => 'radio',
		'label'    => __( 'Select default layout. This layout will be reflected in whole site archives, categories, search page etc. The layout for a single post and page can be controlled from below options', 'colormag' ),
		'section'  => 'colormag_default_layout_setting',
		'settings' => 'colormag_default_layout',
		'choices'  => array(
			'right_sidebar'               => COLORMAG_ADMIN_IMAGES_URL . '/right-sidebar.png',
			'left_sidebar'                => COLORMAG_ADMIN_IMAGES_URL . '/left-sidebar.png',
			'no_sidebar_full_width'       => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
			'no_sidebar_content_centered' => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
		),
	) ) );

	// default layout for pages
	$wp_customize->add_section( 'colormag_default_page_layout_setting', array(
		'priority' => 4,
		'title'    => __( 'Default layout for pages only', 'colormag' ),
		'panel'    => 'colormag_design_options',
	) );

	$wp_customize->add_setting( 'colormag_default_page_layout', array(
		'default'           => 'right_sidebar',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( new COLORMAG_Image_Radio_Control( $wp_customize, 'colormag_default_page_layout', array(
		'type'     => 'radio',
		'label'    => __( 'Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page', 'colormag' ),
		'section'  => 'colormag_default_page_layout_setting',
		'settings' => 'colormag_default_page_layout',
		'choices'  => array(
			'right_sidebar'               => COLORMAG_ADMIN_IMAGES_URL . '/right-sidebar.png',
			'left_sidebar'                => COLORMAG_ADMIN_IMAGES_URL . '/left-sidebar.png',
			'no_sidebar_full_width'       => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
			'no_sidebar_content_centered' => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
		),
	) ) );

	// default layout for single posts
	$wp_customize->add_section( 'colormag_default_single_posts_layout_setting', array(
		'priority' => 5,
		'title'    => __( 'Default layout for single posts only', 'colormag' ),
		'panel'    => 'colormag_design_options',
	) );

	$wp_customize->add_setting( 'colormag_default_single_posts_layout', array(
		'default'           => 'right_sidebar',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( new COLORMAG_Image_Radio_Control( $wp_customize, 'colormag_default_single_posts_layout', array(
		'type'     => 'radio',
		'label'    => __( 'Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post', 'colormag' ),
		'section'  => 'colormag_default_single_posts_layout_setting',
		'settings' => 'colormag_default_single_posts_layout',
		'choices'  => array(
			'right_sidebar'               => COLORMAG_ADMIN_IMAGES_URL . '/right-sidebar.png',
			'left_sidebar'                => COLORMAG_ADMIN_IMAGES_URL . '/left-sidebar.png',
			'no_sidebar_full_width'       => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
			'no_sidebar_content_centered' => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
		),
	) ) );

	// category/archive pages layout setting
	$wp_customize->add_section( 'colormag_archive_search_layout_setting', array(
		'priority' => 6,
		'title'    => __( 'Blog/Archive and Search Pages Layout', 'colormag' ),
		'panel'    => 'colormag_design_options',
	) );

	$wp_customize->add_setting( 'colormag_archive_search_layout', array(
		'default'           => 'double_column_layout',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_archive_search_layout', array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Choose the layout option for the blog, archive and search results pages.', 'colormag' ),
		'choices' => array(
			'double_column_layout' => esc_html__( 'Default (First image large and other two side by side)', 'colormag' ),
			'single_column_layout' => esc_html__( 'One Column (Featured image on left and post excerpt on right)', 'colormag' ),
			'full_width_layout'    => esc_html__( 'Full Width (Featured image on top and post excerpt below)', 'colormag' ),
			'grid_layout'          => esc_html__( 'Grid Layout (Featured image on top and post excerpt below in two column grid)', 'colormag' ),
		),
		'section' => 'colormag_archive_search_layout_setting',
	) );

	// primary color options
	$wp_customize->add_section( 'colormag_primary_color_setting', array(
		'panel'    => 'colormag_design_options',
		'priority' => 7,
		'title'    => __( 'Primary color option', 'colormag' ),
	) );

	$wp_customize->add_setting( 'colormag_primary_color', array(
		'default'              => '#289dcc',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'colormag_color_option_hex_sanitize',
		'sanitize_js_callback' => 'colormag_color_escaping_option_sanitize',
		'transport'            => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'colormag_primary_color', array(
		'label'    => __( 'This will reflect in links, buttons and many others. Choose a color to match your site', 'colormag' ),
		'section'  => 'colormag_primary_color_setting',
		'settings' => 'colormag_primary_color',
	) ) );

	// Color Skin
	$wp_customize->add_section( 'colormag_color_skin_setting_section', array(
		'priority' => 6,
		'title'    => esc_html__( 'Skin Color', 'colormag' ),
		'panel'    => 'colormag_design_options',
	) );

	$wp_customize->add_setting( 'colormag_color_skin_setting', array(
		'default'           => 'white',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_color_skin_setting', array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Choose the color skin for your site.', 'colormag' ),
		'choices' => array(
			'white' => esc_html__( 'White Skin', 'colormag' ),
			'dark'  => esc_html__( 'Dark Skin', 'colormag' ),
		),
		'section' => 'colormag_color_skin_setting_section',
	) );

	if ( ! function_exists( 'wp_update_custom_css_post' ) ) {

		// Custom CSS setting
		class COLORMAG_Custom_CSS_Control extends WP_Customize_Control {

			public $type = 'custom_css';

			public function render_content() {
				?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				</label>
				<?php
			}

		}

		$wp_customize->add_section( 'colormag_custom_css_setting', array(
			'priority' => 9,
			'title'    => __( 'Custom CSS', 'colormag' ),
			'panel'    => 'colormag_design_options',
		) );

		$wp_customize->add_setting( 'colormag_custom_css', array(
			'default'              => '',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses',
		) );

		$wp_customize->add_control( new COLORMAG_Custom_CSS_Control( $wp_customize, 'colormag_custom_css', array(
			'label'    => __( 'Write your custom css', 'colormag' ),
			'section'  => 'colormag_custom_css_setting',
			'settings' => 'colormag_custom_css',
		) ) );
	}
	// End of the Design Options
	// Start of the Social Link Options
	$wp_customize->add_panel( 'colormag_social_links_options', array(
		'priority'    => 510,
		'title'       => __( 'Social Options', 'colormag' ),
		'description' => __( 'Change the Social Links Settings from here as you want', 'colormag' ),
		'capability'  => 'edit_theme_options',
	) );

	$wp_customize->add_section( 'colormag_social_link_activate_settings', array(
		'priority' => 1,
		'title'    => __( 'Activate social links area', 'colormag' ),
		'panel'    => 'colormag_social_links_options',
	) );

	$wp_customize->add_setting( 'colormag_social_link_activate', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_social_link_activate', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to activate social links area', 'colormag' ),
		'section'  => 'colormag_social_link_activate_settings',
		'settings' => 'colormag_social_link_activate',
	) );

	// Social link location option.
	$wp_customize->add_setting( 'colormag_social_link_location_option', array(
		'default'           => 'both',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_social_link_location_option', array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Social links to display on:', 'colormag' ),
		'section'  => 'colormag_social_link_activate_settings',
		'settings' => 'colormag_social_link_location_option',
		'choices'  => array(
			'header' => esc_html__( 'Header only', 'colormag' ),
			'footer' => esc_html__( 'Footer only', 'colormag' ),
			'both'   => esc_html__( 'Both header and footer', 'colormag' ),
		),
	) );

	// Selective refresh for displaying social icons/links
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_social_link_activate', array(
			'selector'        => '.social-links',
			'render_callback' => '',
		) );
	}

	$colormag_social_links = array(
		'colormag_social_facebook'    => array(
			'id'      => 'colormag_social_facebook',
			'title'   => __( 'Facebook', 'colormag' ),
			'default' => '',
		),
		'colormag_social_twitter'     => array(
			'id'      => 'colormag_social_twitter',
			'title'   => __( 'Twitter', 'colormag' ),
			'default' => '',
		),
		'colormag_social_googleplus'  => array(
			'id'      => 'colormag_social_googleplus',
			'title'   => __( 'Google-Plus', 'colormag' ),
			'default' => '',
		),
		'colormag_social_instagram'   => array(
			'id'      => 'colormag_social_instagram',
			'title'   => __( 'Instagram', 'colormag' ),
			'default' => '',
		),
		'colormag_social_pinterest'   => array(
			'id'      => 'colormag_social_pinterest',
			'title'   => __( 'Pinterest', 'colormag' ),
			'default' => '',
		),
		'colormag_social_youtube'     => array(
			'id'      => 'colormag_social_youtube',
			'title'   => __( 'YouTube', 'colormag' ),
			'default' => '',
		),
		'colormag_social_vimeo'       => array(
			'id'      => 'colormag_social_vimeo',
			'title'   => __( 'Vimeo-Square', 'colormag' ),
			'default' => '',
		),
		'colormag_social_linkedin'    => array(
			'id'      => 'colormag_social_linkedin',
			'title'   => __( 'LinkedIn', 'colormag' ),
			'default' => '',
		),
		'colormag_social_delicious'   => array(
			'id'      => 'colormag_social_delicious',
			'title'   => __( 'Delicious', 'colormag' ),
			'default' => '',
		),
		'colormag_social_flickr'      => array(
			'id'      => 'colormag_social_flickr',
			'title'   => __( 'Flickr', 'colormag' ),
			'default' => '',
		),
		'colormag_social_skype'       => array(
			'id'      => 'colormag_social_skype',
			'title'   => __( 'Skype', 'colormag' ),
			'default' => '',
		),
		'colormag_social_soundcloud'  => array(
			'id'      => 'colormag_social_soundcloud',
			'title'   => __( 'SoundCloud', 'colormag' ),
			'default' => '',
		),
		'colormag_social_vine'        => array(
			'id'      => 'colormag_social_vine',
			'title'   => __( 'Vine', 'colormag' ),
			'default' => '',
		),
		'colormag_social_stumbleupon' => array(
			'id'      => 'colormag_social_stumbleupon',
			'title'   => __( 'StumbleUpon', 'colormag' ),
			'default' => '',
		),
		'colormag_social_tumblr'      => array(
			'id'      => 'colormag_social_tumblr',
			'title'   => __( 'Tumblr', 'colormag' ),
			'default' => '',
		),
		'colormag_social_reddit'      => array(
			'id'      => 'colormag_social_reddit',
			'title'   => __( 'Reddit', 'colormag' ),
			'default' => '',
		),
		'colormag_social_xing'        => array(
			'id'      => 'colormag_social_xing',
			'title'   => __( 'Xing', 'colormag' ),
			'default' => '',
		),
		'colormag_social_vk'          => array(
			'id'      => 'colormag_social_vk',
			'title'   => __( 'VK', 'colormag' ),
			'default' => '',
		),
	);

	$i = 20;

	foreach ( $colormag_social_links as $colormag_social_link ) {

		$wp_customize->add_setting( $colormag_social_link['id'], array(
			'default'           => $colormag_social_link['default'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( $colormag_social_link['id'], array(
			'label'    => $colormag_social_link['title'],
			'section'  => 'colormag_social_link_activate_settings',
			'settings' => $colormag_social_link['id'],
			'priority' => $i,
		) );

		$wp_customize->add_setting( $colormag_social_link['id'] . '_checkbox', array(
			'default'           => 0,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'colormag_checkbox_sanitize',
		) );

		$wp_customize->add_control( $colormag_social_link['id'] . '_checkbox', array(
			'type'     => 'checkbox',
			'label'    => __( 'Check to show in new tab', 'colormag' ),
			'section'  => 'colormag_social_link_activate_settings',
			'settings' => $colormag_social_link['id'] . '_checkbox',
			'priority' => $i,
		) );

		$i ++;
	}

	$user_custom_social_links = array(
		'user_custom_social_links_one'   => array(
			'id'      => 'user_custom_social_links_one',
			'title'   => __( 'Additional Social Link One', 'colormag' ),
			'default' => '',
		),
		'user_custom_social_links_two'   => array(
			'id'      => 'user_custom_social_links_two',
			'title'   => __( 'Additional Social Link Two', 'colormag' ),
			'default' => '',
		),
		'user_custom_social_links_three' => array(
			'id'      => 'user_custom_social_links_three',
			'title'   => __( 'Additional Social Link Three', 'colormag' ),
			'default' => '',
		),
		'user_custom_social_links_four'  => array(
			'id'      => 'user_custom_social_links_four',
			'title'   => __( 'Additional Social Link Four', 'colormag' ),
			'default' => '',
		),
		'user_custom_social_links_five'  => array(
			'id'      => 'user_custom_social_links_five',
			'title'   => __( 'Additional Social Link Five', 'colormag' ),
			'default' => '',
		),
		'user_custom_social_links_six'   => array(
			'id'      => 'user_custom_social_links_six',
			'title'   => __( 'Additional Social Link Six', 'colormag' ),
			'default' => '',
		),
	);

	$wp_customize->add_section( 'colormag_additional_social_icons', array(
		'priority' => 2,
		'title'    => __( 'Additional Social Icons', 'colormag' ),
		'panel'    => 'colormag_social_links_options',
	) );

	$i = 20;

	foreach ( $user_custom_social_links as $user_custom_social_link ) {
		$wp_customize->add_setting( $user_custom_social_link['id'], array(
			'default'           => $user_custom_social_link['default'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( $user_custom_social_link['id'], array(
			'label'    => $user_custom_social_link['title'],
			'section'  => 'colormag_additional_social_icons',
			'settings' => $user_custom_social_link['id'],
			'priority' => $i,
		) );

		$wp_customize->add_setting( $user_custom_social_link['id'] . '_fontawesome', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		) );

		$wp_customize->add_control( $user_custom_social_link['id'] . '_fontawesome', array(
			'label'    => __( 'Preferred Social Link FontAwesome Icon', 'colormag' ),
			'section'  => 'colormag_additional_social_icons',
			'settings' => $user_custom_social_link['id'] . '_fontawesome',
			'priority' => $i,
		) );

		$wp_customize->add_setting( $user_custom_social_link['id'] . '_color', array(
			'default'              => '',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'colormag_color_option_hex_sanitize',
			'sanitize_js_callback' => 'colormag_color_escaping_option_sanitize',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $user_custom_social_link['id'] . '_color', array(
			'label'    => __( 'Preferred Social Link Color Option', 'colormag' ),
			'section'  => 'colormag_additional_social_icons',
			'settings' => $user_custom_social_link['id'] . '_color',
			'priority' => $i,
		) ) );

		$wp_customize->add_setting( $user_custom_social_link['id'] . '_checkbox', array(
			'default'           => 0,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'colormag_checkbox_sanitize',
		) );

		$wp_customize->add_control( $user_custom_social_link['id'] . '_checkbox', array(
			'type'     => 'checkbox',
			'label'    => __( 'Check to show in new tab', 'colormag' ),
			'section'  => 'colormag_additional_social_icons',
			'settings' => $user_custom_social_link['id'] . '_checkbox',
			'priority' => $i,
		) );

		$i ++;
	}
	// End of the Social Link Options

	// Start of the Author Bio Options
	$wp_customize->add_panel( 'colormag_author_bio_options', array(
		'capability'  => 'edit_theme_options',
		'description' => esc_html__( 'Change the Author Bio Settings from here as you want', 'colormag' ),
		'priority'    => 512,
		'title'       => esc_html__( 'Author Bio Options', 'colormag' ),
	) );

	// Author bio enable/disable option.
	$wp_customize->add_section( 'colormag_author_bio_disable_section', array(
		'priority' => 5,
		'title'    => esc_html__( 'Author Bio', 'colormag' ),
		'panel'    => 'colormag_author_bio_options',
	) );

	$wp_customize->add_setting( 'colormag_author_bio_disable_setting', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_author_bio_disable_setting', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to disable the Author Bio', 'colormag' ),
		'section'  => 'colormag_author_bio_disable_section',
		'settings' => 'colormag_author_bio_disable_setting',
	) );

	$wp_customize->add_section( 'colormag_author_bio_social_sites_show_setting', array(
		'priority' => 6,
		'title'    => esc_html__( 'Social Profiles in Author Bio', 'colormag' ),
		'panel'    => 'colormag_author_bio_options',
	) );

	$wp_customize->add_setting( 'colormag_author_bio_social_sites_show', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_author_bio_social_sites_show', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to show the Social Profiles in the Author Bio', 'colormag' ),
		'section'  => 'colormag_author_bio_social_sites_show_setting',
		'settings' => 'colormag_author_bio_social_sites_show',
	) );

	// Selective refresh for social profiles in author bio display
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_author_bio_social_sites_show', array(
			'selector'        => '.author-social-sites',
			'render_callback' => '',
		) );
	}

	// Author Bio url for pages in author bio section
	$wp_customize->add_section( 'colormag_author_bio_links_setting', array(
		'priority' => 6,
		'title'    => esc_html__( 'Author URL In Author Bio', 'colormag' ),
		'panel'    => 'colormag_author_bio_options',
	) );

	$wp_customize->add_setting( 'colormag_author_bio_links', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_author_bio_links', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to display the link to the author page in the Author Bio section', 'colormag' ),
		'section'  => 'colormag_author_bio_links_setting',
		'settings' => 'colormag_author_bio_links',
	) );

	// Selective refresh for author bio links display
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_author_bio_links', array(
			'selector'        => '.author-url',
			'render_callback' => '',
		) );
	}
	// End of the Author Bio Options

	// Start of the Footer Options
	$wp_customize->add_panel( 'colormag_footer_options', array(
		'capability'  => 'edit_theme_options',
		'description' => esc_html__( 'Change the Footer Settings from here as you want', 'colormag' ),
		'priority'    => 515,
		'title'       => esc_html__( 'Footer Options', 'colormag' ),
	) );

	// Footer display type option
	$wp_customize->add_section( 'colormag_main_footer_layout_display_type_section', array(
		'priority' => 1,
		'title'    => esc_html__( 'Footer Main Area Display Type', 'colormag' ),
		'panel'    => 'colormag_footer_options',
	) );

	$wp_customize->add_setting( 'colormag_main_footer_layout_display_type', array(
		'default'           => 'type_one',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_main_footer_layout_display_type', array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Choose the main total footer area display type that you want', 'colormag' ),
		'section' => 'colormag_main_footer_layout_display_type_section',
		'choices' => array(
			'type_one'   => esc_html__( 'Type 1 (Default)', 'colormag' ),
			'type_two'   => esc_html__( 'Type 2', 'colormag' ),
			'type_three' => esc_html__( 'Type 3', 'colormag' ),
		),
	) );

	// Scroll to top button enable/disable option
	$wp_customize->add_section( 'colormag_scroll_to_top_setting', array(
		'priority' => 6,
		'title'    => esc_html__( 'Scroll To Top Button', 'colormag' ),
		'panel'    => 'colormag_footer_options',
	) );

	$wp_customize->add_setting( 'colormag_scroll_to_top', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_scroll_to_top', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to disable the scroll to top button.', 'colormag' ),
		'section'  => 'colormag_scroll_to_top_setting',
		'settings' => 'colormag_scroll_to_top',
	) );

	// footer editor section
	class COLORMAG_Footer_Control extends WP_Customize_Control {

		public $type = 'footer_control';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}

	}

	$wp_customize->add_section( 'colormag_footer_editor_setting', array(
		'priority' => 7,
		'title'    => esc_html__( 'Footer Copyright Editor', 'colormag' ),
		'panel'    => 'colormag_footer_options',
	) );

	$default_footer_value = esc_html__( 'Copyright &copy; ', 'colormag' ) . ' ' . '[the-year] [site-link]. All rights reserved. ' . '<br>' . esc_html__( 'Theme: ColorMag Pro by ', 'colormag' ) . ' ' . '[tg-link]. ' . __( 'Powered by ', 'colormag' ) . ' ' . '[wp-link].';

	$wp_customize->add_setting( 'colormag_footer_editor', array(
		'default'           => $default_footer_value,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_footer_editor_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	if ( function_exists( 'wp_enqueue_code_editor' ) ) :

		$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'colormag_footer_editor', array(
			'label'     => esc_html__( 'Edit the Copyright information in your footer. You can also use shortcodes [the-year], [site-link], [wp-link], [tg-link] for current year, your site link, WordPress site link and ThemeGrill site link respectively.', 'colormag' ),
			'code_type' => 'text/html',
			'section'   => 'colormag_footer_editor_setting',
			'settings'  => 'colormag_footer_editor',
		) ) );

	else :

		$wp_customize->add_control( new COLORMAG_Footer_Control( $wp_customize, 'colormag_footer_editor', array(
			'label'    => esc_html__( 'Edit the Copyright information in your footer. You can also use shortcodes [the-year], [site-link], [wp-link], [tg-link] for current year, your site link, WordPress site link and ThemeGrill site link respectively.', 'colormag' ),
			'section'  => 'colormag_footer_editor_setting',
			'settings' => 'colormag_footer_editor',
		) ) );

	endif;

	// Selective refresh for footer copyright text
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_footer_editor', array(
			'selector'        => '.copyright',
			'render_callback' => 'colormag_footer_copyright',
		) );
	}

	// Footer background section
	$wp_customize->add_section( 'colormag_footer_background_section', array(
		'priority' => 10,
		'title'    => esc_html__( 'Footer Background', 'colormag' ),
		'panel'    => 'colormag_footer_options',
	) );

	// Footer background image upload setting
	$wp_customize->add_setting( 'colormag_footer_background_image', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'colormag_footer_background_image', array(
		'label'   => esc_html__( 'Background Image', 'colormag' ),
		'setting' => 'colormag_footer_background_image',
		'section' => 'colormag_footer_background_section',
	) ) );

	// Footer background image position setting
	$wp_customize->add_setting( 'colormag_footer_background_image_position', array(
		'default'           => 'center-center',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_footer_background_image_position', array(
		'type'    => 'select',
		'label'   => esc_html__( 'Background Image Position', 'colormag' ),
		'setting' => 'colormag_footer_background_image_position',
		'section' => 'colormag_footer_background_section',
		'choices' => array(
			'left-top'      => esc_html__( 'Top Left', 'colormag' ),
			'center-top'    => esc_html__( 'Top Center', 'colormag' ),
			'right-top'     => esc_html__( 'Top Right', 'colormag' ),
			'left-center'   => esc_html__( 'Center Left', 'colormag' ),
			'center-center' => esc_html__( 'Center Center', 'colormag' ),
			'right-center'  => esc_html__( 'Center Right', 'colormag' ),
			'left-bottom'   => esc_html__( 'Bottom Left', 'colormag' ),
			'center-bottom' => esc_html__( 'Bottom Center', 'colormag' ),
			'right-bottom'  => esc_html__( 'Bottom Right', 'colormag' ),
		),
	) );

	// Footer background size setting
	$wp_customize->add_setting( 'colormag_footer_background_image_size', array(
		'default'           => 'auto',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_footer_background_image_size', array(
		'type'    => 'select',
		'label'   => esc_html__( 'Background Image Size', 'colormag' ),
		'setting' => 'colormag_footer_background_image_size',
		'section' => 'colormag_footer_background_section',
		'choices' => array(
			'cover'   => esc_html__( 'Cover', 'colormag' ),
			'contain' => esc_html__( 'Contain', 'colormag' ),
			'auto'    => esc_html__( 'Auto', 'colormag' ),
		),
	) );

	// Footer background attachment setting
	$wp_customize->add_setting( 'colormag_footer_background_image_attachment', array(
		'default'           => 'scroll',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_footer_background_image_attachment', array(
		'type'    => 'select',
		'label'   => esc_html__( 'Background Image Attachment', 'colormag' ),
		'setting' => 'colormag_footer_background_image_attachment',
		'section' => 'colormag_footer_background_section',
		'choices' => array(
			'scroll' => esc_html__( 'Scroll', 'colormag' ),
			'fixed'  => esc_html__( 'Fixed', 'colormag' ),
		),
	) );

	// Footer background repeat setting
	$wp_customize->add_setting( 'colormag_footer_background_image_repeat', array(
		'default'           => 'repeat',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_footer_background_image_repeat', array(
		'type'    => 'select',
		'label'   => esc_html__( 'Background Image Repeat', 'colormag' ),
		'setting' => 'colormag_footer_background_image_repeat',
		'section' => 'colormag_footer_background_section',
		'choices' => array(
			'no-repeat' => esc_html__( 'No Repeat', 'colormag' ),
			'repeat'    => esc_html__( 'Repeat', 'colormag' ),
			'repeat-x'  => esc_html__( 'Repeat Horizontally', 'colormag' ),
			'repeat-y'  => esc_html__( 'Repeat Vertically', 'colormag' ),
		),
	) );
	// End of Footer Options

	// Start of the Additional Options
	$wp_customize->add_panel( 'colormag_additional_options', array(
		'capability'  => 'edit_theme_options',
		'description' => __( 'Change the Additional Settings from here as you want', 'colormag' ),
		'priority'    => 515,
		'title'       => __( 'Additional Options', 'colormag' ),
	) );

	// unique post system options
	$wp_customize->add_section( 'colormag_unique_post_system_setting', array(
		'priority' => 1,
		'title'    => __( 'Unique Post System', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_unique_post_system', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_unique_post_system', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to activate the unique post system for the bundled widgets', 'colormag' ),
		'section'  => 'colormag_unique_post_system_setting',
		'settings' => 'colormag_unique_post_system',
	) );

	// Sticky post and sidebar section
	$wp_customize->add_section( 'colormag_sticky_content_sidebar_setting', array(
		'priority' => 2,
		'title'    => esc_html__( 'Sticky Content And Sidebar', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_sticky_content_sidebar', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_sticky_content_sidebar', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to activate the sticky options for content and sidebar areas.', 'colormag' ),
		'section'  => 'colormag_sticky_content_sidebar_setting',
		'settings' => 'colormag_sticky_content_sidebar',
	) );

	// BreadCrumb plugin compatible section
	$wp_customize->add_section( 'colormag_breadcrumb_display_setting', array(
		'priority' => 2,
		'title'    => esc_html__( 'BreadCrumb Setting', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_breadcrumb_display', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_breadcrumb_display', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to display the breadcrumb. Note: Supports BreadCrumb NavXT plugin and Yoast SEO BreadCrumb settings.', 'colormag' ),
		'section'  => 'colormag_breadcrumb_display_setting',
		'settings' => 'colormag_breadcrumb_display',
	) );

	if ( ! function_exists( 'has_site_icon' ) || ( ! has_site_icon() && ( get_theme_mod( 'colormag_favicon_upload', '' ) != '' ) ) ) {
		// favicon options
		$wp_customize->add_section( 'colormag_favicon_show_setting', array(
			'priority' => 1,
			'title'    => __( 'Activate favicon', 'colormag' ),
			'panel'    => 'colormag_additional_options',
		) );

		$wp_customize->add_setting( 'colormag_favicon_show', array(
			'default'           => 0,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'colormag_checkbox_sanitize',
		) );

		$wp_customize->add_control( 'colormag_favicon_show', array(
			'type'     => 'checkbox',
			'label'    => __( 'Check to activate favicon. Upload favicon from below option', 'colormag' ),
			'section'  => 'colormag_favicon_show_setting',
			'settings' => 'colormag_favicon_show',
		) );

		$wp_customize->add_setting( 'colormag_favicon_upload', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'colormag_favicon_upload', array(
			'label'    => __( 'Upload favicon for your site', 'colormag' ),
			'section'  => 'colormag_favicon_show_setting',
			'settings' => 'colormag_favicon_upload',
		) ) );
	}

	// related posts
	$wp_customize->add_section( 'colormag_related_posts_section', array(
		'priority' => 4,
		'title'    => __( 'Related Posts', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_related_posts_activate', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_related_posts_activate', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to activate the related posts', 'colormag' ),
		'section'  => 'colormag_related_posts_section',
		'settings' => 'colormag_related_posts_activate',
	) );

	// Selective refresh for related posts feature
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_related_posts_activate', array(
			'selector'        => '.related-posts',
			'render_callback' => '',
		) );
	}

	$wp_customize->add_setting( 'colormag_related_posts', array(
		'default'           => 'categories',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_related_posts', array(
		'type'     => 'radio',
		'label'    => __( 'Related Posts Must Be Shown As:', 'colormag' ),
		'section'  => 'colormag_related_posts_section',
		'settings' => 'colormag_related_posts',
		'choices'  => array(
			'categories' => __( 'Related Posts By Categories', 'colormag' ),
			'tags'       => __( 'Related Posts By Tags', 'colormag' ),
		),
	) );

	// Related post flyout option.
	$wp_customize->add_section( 'colormag_related_post_flyout_section', array(
		'priority' => 4,
		'title'    => esc_html__( 'Flyout Related Post', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_related_post_flyout_setting', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_related_post_flyout_setting', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to display the related post when browser scrolls at end.', 'colormag' ),
		'section'  => 'colormag_related_post_flyout_section',
		'settings' => 'colormag_related_post_flyout_setting',
	) );

	$wp_customize->add_setting( 'colormag_related_posts_flyout_type', array(
		'default'           => 'categories',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_related_posts_flyout_type', array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Related Posts Must Be Shown As:', 'colormag' ),
		'section'  => 'colormag_related_post_flyout_section',
		'settings' => 'colormag_related_posts_flyout_type',
		'choices'  => array(
			'categories' => esc_html__( 'Related Posts By Categories', 'colormag' ),
			'tags'       => esc_html__( 'Related Posts By Tags', 'colormag' ),
		),
	) );

	// Select option to display number of posts
	$wp_customize->add_setting( 'colormag_related_post_number_display', array(
		'default'           => '3',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_related_post_number_display', array(
		'type'     => 'select',
		'section'  => 'colormag_related_posts_section',
		'settings' => 'colormag_related_post_number_display',
		'label'    => esc_html__( 'Number of post to display', 'colormag' ),
		'choices'  => array(
			'3' => esc_html__( '3', 'colormag' ),
			'6' => esc_html__( '6', 'colormag' ),
		),
	) );

	// Option to display reading time
	$wp_customize->add_section( 'colormag_reading_time_section', array(
		'priority' => 4,
		'title'    => esc_html__( 'Reading Time Display', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_reading_time_setting', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_reading_time_setting', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to display the reading time.', 'colormag' ),
		'section'  => 'colormag_reading_time_section',
		'settings' => 'colormag_reading_time_setting',
	) );

	// prognroll bar indicator option
	$wp_customize->add_section( 'colormag_prognroll_indicator_section', array(
		'priority' => 4,
		'title'    => esc_html__( 'Reading Progress Indicator', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_prognroll_indicator', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_prognroll_indicator', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to activate the reading progress indicator in single post page.', 'colormag' ),
		'section'  => 'colormag_prognroll_indicator_section',
		'settings' => 'colormag_prognroll_indicator',
	) );

	// Archive pages display content/category option addition
	$wp_customize->add_section( 'colormag_archive_content_excerpt_display_section', array(
		'priority' => 5,
		'title'    => esc_html__( 'Blog/Archive and Search Pages Display Type', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_archive_content_excerpt_display', array(
		'default'           => 'excerpt',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_archive_content_excerpt_display', array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Choose to display the post content or excerpt:', 'colormag' ),
		'section'  => 'colormag_archive_content_excerpt_display_section',
		'settings' => 'colormag_archive_content_excerpt_display',
		'choices'  => array(
			'excerpt' => esc_html__( '(Default) Display Excerpt', 'colormag' ),
			'content' => esc_html__( 'Display Content', 'colormag' ),
		),
	) );

	$wp_customize->add_setting( 'colormag_custom_information_for_content_display_type', array(
		'default'           => '',
		'sanitize_callback' => 'colormag_false_sanitize',
	) );
	$wp_customize->add_control( new COLORMAG_Custom_Information( $wp_customize, 'colormag_custom_information_for_content_display_type', array(
		'label'       => esc_html__( 'Important Notice:', 'colormag' ),
		'description' => sprintf( __( 'The content will only be displayed if you have chosen %1$sOne Column (Featured image on left and post excerpt on right)%2$s or %1$sFull Width (Featured image on top and post excerpt below)%2$s option in %1$sBlog/Archive and Search Pages Layout%2$s under the %1$sDesign Settings%2$s.', 'colormag' ), '<strong>', '</strong>' ),
		'settings'    => 'colormag_custom_information_for_content_display_type',
		'section'     => 'colormag_archive_content_excerpt_display_section',
	) ) );

	// Post Navigation layout
	$wp_customize->add_section( 'colormag_post_navigation_section', array(
		'priority' => 5,
		'title'    => esc_html__( 'Post Navigation', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_post_navigation', array(
		'default'           => 'default',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_post_navigation', array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Post navigation to be shown as:', 'colormag' ),
		'section'  => 'colormag_post_navigation_section',
		'settings' => 'colormag_post_navigation',
		'choices'  => array(
			'default'              => esc_html__( 'Default Layout', 'colormag' ),
			'small_featured_image' => esc_html__( 'Featured image with post title', 'colormag' ),
		),
	) );

	// entry meta remove
	$wp_customize->add_section( 'colormag_entry_meta_section', array(
		'priority' => 4,
		'title'    => esc_html__( 'Post Meta Display', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	// total entry meta remove
	$wp_customize->add_setting( 'colormag_all_entry_meta_remove', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_all_entry_meta_remove', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable the post meta for the post totally, ie, remove all of the meta data.', 'colormag' ),
		'section'  => 'colormag_entry_meta_section',
		'settings' => 'colormag_all_entry_meta_remove',
	) );

	// author entry meta remove
	$wp_customize->add_setting( 'colormag_author_entry_meta_remove', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_author_entry_meta_remove', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable the author only in post meta section.', 'colormag' ),
		'section'  => 'colormag_entry_meta_section',
		'settings' => 'colormag_author_entry_meta_remove',
	) );

	// date entry meta remove
	$wp_customize->add_setting( 'colormag_date_entry_meta_remove', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_date_entry_meta_remove', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable the date only in post meta section.', 'colormag' ),
		'section'  => 'colormag_entry_meta_section',
		'settings' => 'colormag_date_entry_meta_remove',
	) );

	// category entry meta remove
	$wp_customize->add_setting( 'colormag_category_entry_meta_remove', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_category_entry_meta_remove', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable the category only in post meta section.', 'colormag' ),
		'section'  => 'colormag_entry_meta_section',
		'settings' => 'colormag_category_entry_meta_remove',
	) );

	// comments entry meta remove
	$wp_customize->add_setting( 'colormag_comments_entry_meta_remove', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_comments_entry_meta_remove', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable the comments only in post meta section.', 'colormag' ),
		'section'  => 'colormag_entry_meta_section',
		'settings' => 'colormag_comments_entry_meta_remove',
	) );

	// tags entry meta remove
	$wp_customize->add_setting( 'colormag_tags_entry_meta_remove', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_tags_entry_meta_remove', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable the tags only in post meta section.', 'colormag' ),
		'section'  => 'colormag_entry_meta_section',
		'settings' => 'colormag_tags_entry_meta_remove',
	) );

	// post view entry meta remove
	$wp_customize->add_setting( 'colormag_post_view_entry_meta_remove', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_post_view_entry_meta_remove', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable the post view only in post meta section.', 'colormag' ),
		'section'  => 'colormag_entry_meta_section',
		'settings' => 'colormag_post_view_entry_meta_remove',
	) );

	// edit button entry meta remove
	$wp_customize->add_setting( 'colormag_edit_button_entry_meta_remove', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_edit_button_entry_meta_remove', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Disable the edit button only in post meta section.', 'colormag' ),
		'section'  => 'colormag_entry_meta_section',
		'settings' => 'colormag_edit_button_entry_meta_remove',
	) );

	// read more button text
	$wp_customize->add_section( 'colormag_read_more_text_section', array(
		'priority' => 5,
		'title'    => __( 'Change Read More Text', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_read_more_text', array(
		'default'           => __( 'Read more', 'colormag' ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_control( 'colormag_read_more_text', array(
		'label'    => __( 'Change the Read more text as required for your site.', 'colormag' ),
		'section'  => 'colormag_read_more_text_section',
		'settings' => 'colormag_read_more_text',
	) );

	// View All button text
	$wp_customize->add_section( 'colormag_view_all_text_section', array(
		'priority' => 5,
		'title'    => esc_html__( 'Change View All Text', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_view_all_text', array(
		'default'           => esc_html__( 'View All', 'colormag' ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_view_all_text', array(
		'label'    => esc_html__( 'Change the View All text as required for your site.', 'colormag' ),
		'section'  => 'colormag_view_all_text_section',
		'settings' => 'colormag_view_all_text',
	) );

	// Selective refresh for view all button text
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_view_all_text', array(
			'selector'        => '.view-all-link',
			'render_callback' => 'colormag_view_all_button_text',
		) );
	}

	// You May Also Like button text
	$wp_customize->add_section( 'colormag_you_may_also_like_text_section', array(
		'priority' => 5,
		'title'    => esc_html__( 'Change You May Also Like Text', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_you_may_also_like_text', array(
		'default'           => esc_html__( 'You May Also Like', 'colormag' ),
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_you_may_also_like_text', array(
		'label'    => esc_html__( 'Change the You May Also Like text as required for your site.', 'colormag' ),
		'section'  => 'colormag_you_may_also_like_text_section',
		'settings' => 'colormag_you_may_also_like_text',
	) );

	// Selective refresh for you may also like text
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_you_may_also_like_text', array(
			'selector'        => '.related-posts-main-title',
			'render_callback' => 'colormag_you_may_also_like_text',
		) );
	}

	// social share buttons
	$wp_customize->add_section( 'colormag_social_share_section', array(
		'priority' => 5,
		'title'    => __( 'Social Share Button', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_social_share', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_social_share', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to activate social share buttons in single post', 'colormag' ),
		'section'  => 'colormag_social_share_section',
		'settings' => 'colormag_social_share',
	) );

	// Selective refresh for social share buttons
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_social_share', array(
			'selector'        => '.share-buttons',
			'render_callback' => '',
		) );
	}

	// featured image popup check
	$wp_customize->add_section( 'colormag_featured_image_popup_setting', array(
		'priority' => 6,
		'title'    => __( 'Image Lightbox', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_featured_image_popup', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_featured_image_popup', array(
		'type'     => 'checkbox',
		'label'    => __( 'Check to enable the lightbox for the featured images in single post', 'colormag' ),
		'section'  => 'colormag_featured_image_popup_setting',
		'settings' => 'colormag_featured_image_popup',
	) );

	// Featured Image Caption Display Setting
	$wp_customize->add_section( 'colormag_featured_image_caption_show_setting', array(
		'priority' => 6,
		'title'    => esc_html__( 'Featured Image Caption', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_featured_image_caption_show', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
		'transport'         => $customizer_selective_refresh,
	) );

	$wp_customize->add_control( 'colormag_featured_image_caption_show', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to show the image caption under the featured image in archive, search as well as the single post page.', 'colormag' ),
		'section'  => 'colormag_featured_image_caption_show_setting',
		'settings' => 'colormag_featured_image_caption_show',
	) );

	// Selective refresh for featured image caption display
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'colormag_featured_image_caption_show', array(
			'selector'        => '.featured-image-caption',
			'render_callback' => 'colormag_featured_image_caption_display',
		) );
	}

	// Feature Image dispaly/hide option
	$wp_customize->add_section( 'colormag_featured_image_show_setting', array(
		'priority' => 6,
		'title'    => esc_html__( 'Featured Image', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_featured_image_show', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_featured_image_show', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to hide the featured image in single post page.', 'colormag' ),
		'section'  => 'colormag_featured_image_show_setting',
		'settings' => 'colormag_featured_image_show',
	) );

	// Title above/ below the feature image.
	$wp_customize->add_section( 'colormag_single_post_title_position_setting', array(
		'priority' => 6,
		'title'    => esc_html__( 'Post Title Position', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_single_post_title_position', array(
		'default'           => 'below',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
	) );

	$wp_customize->add_control( 'colormag_single_post_title_position', array(
		'type'     => 'select',
		'label'    => esc_html__( 'Select the post title position in single post page.', 'colormag' ),
		'section'  => 'colormag_single_post_title_position_setting',
		'settings' => 'colormag_single_post_title_position',
		'choices'  => array(
			'above' => esc_html__( 'Above featured image', 'colormag' ),
			'below' => esc_html__( 'Below featured image', 'colormag' ),
		),
	) );

	// Feature Image dispaly option in single page
	$wp_customize->add_section( 'colormag_featured_image_show_setting_single_page', array(
		'priority' => 6,
		'title'    => esc_html__( 'Featured Image In Single Page', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_featured_image_single_page_show', array(
		'default'           => 0,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_featured_image_single_page_show', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to display the featured image in single page.', 'colormag' ),
		'section'  => 'colormag_featured_image_show_setting_single_page',
		'settings' => 'colormag_featured_image_single_page_show',
	) );

	$wp_customize->add_section( 'colormag_schema_markup_section', array(
		'priority' => 8,
		'title'    => esc_html__( 'Schema Markup', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_schema_markup', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_schema_markup', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to enable schema markup.', 'colormag' ),
		'section'  => 'colormag_schema_markup_section',
		'settings' => 'colormag_schema_markup',
	) );

	$wp_customize->add_section( 'colormag_openweathermap_section', array(
		'priority' => 9,
		'title'    => esc_html__( 'OpenWeatherMap API Key', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_openweathermap_api_key', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_control( 'colormag_openweathermap_api_key', array(
		'type'     => 'text',
		'label'    => esc_html__( 'API Key', 'colormag' ),
		'section'  => 'colormag_openweathermap_section',
		'settings' => 'colormag_openweathermap_api_key',
	) );

	// GoogleMaps API key
	$wp_customize->add_section( 'colormag_googlemap_section', array(
		'priority' => 9,
		'title'    => esc_html__( 'GoogleMaps API Key', 'colormag' ),
		'panel'    => 'colormag_additional_options',
	) );

	$wp_customize->add_setting( 'colormag_googlemap_api_key', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_control( 'colormag_googlemap_api_key', array(
		'label'    => esc_html__( 'API Key', 'colormag' ),
		'section'  => 'colormag_googlemap_section',
		'settings' => 'colormag_googlemap_api_key',
	) );
	// End of the Additional Options

	// Start of Woocommerce options.
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_panel( 'colormag_woocommerce_options', array(
			'priority'    => 535,
			'title'       => esc_html__( 'WooCommerce Options', 'colormag' ),
			'capability'  => 'edit_theme_options',
			'description' => esc_html__( 'Change the WooCommerce Settings from here as you want', 'colormag' ),
		) );

		$wp_customize->add_section( 'colormag_woocommerce_setting', array(
			'priority' => 1,
			'title'    => esc_html__( 'Woocommerce Settings', 'colormag' ),
			'panel'    => 'colormag_woocommerce_options',
		) );

		// Add additional sidebar area for WooCommerce pages.
		$wp_customize->add_setting( 'colormag_woocommerce_sidebar_register_setting', array(
			'default'           => 0,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'colormag_checkbox_sanitize',
		) );

		$wp_customize->add_control( 'colormag_woocommerce_sidebar_register_setting', array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Check to register different sidebar areas to be used for WooCommerce pages.', 'colormag' ),
			'section'  => 'colormag_woocommerce_setting',
			'settings' => 'colormag_woocommerce_sidebar_register_setting',
		) );

		// WooCommerce Shop Page Layout.
		$wp_customize->add_setting( 'colormag_woocmmerce_shop_page_layout', array(
			'default'           => 'right_sidebar',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'colormag_radio_select_sanitize',
		) );

		$wp_customize->add_control( new COLORMAG_Image_Radio_Control( $wp_customize, 'colormag_woocmmerce_shop_page_layout', array(
			'type'     => 'radio',
			'label'    => esc_html__( 'WooCommerce Shop Page Layout', 'colormag' ),
			'section'  => 'colormag_woocommerce_setting',
			'settings' => 'colormag_woocmmerce_shop_page_layout',
			'choices'  => array(
				'right_sidebar'               => COLORMAG_ADMIN_IMAGES_URL . '/right-sidebar.png',
				'left_sidebar'                => COLORMAG_ADMIN_IMAGES_URL . '/left-sidebar.png',
				'no_sidebar_full_width'       => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered' => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
			),
		) ) );

		// WooCommerce Archive Page Layout.
		$wp_customize->add_setting( 'colormag_woocmmerce_archive_page_layout', array(
			'default'           => 'right_sidebar',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'colormag_radio_select_sanitize',
		) );

		$wp_customize->add_control( new COLORMAG_Image_Radio_Control( $wp_customize, 'colormag_woocmmerce_archive_page_layout', array(
			'type'     => 'radio',
			'label'    => esc_html__( 'WooCommerce Archive Page Layout', 'colormag' ),
			'section'  => 'colormag_woocommerce_setting',
			'settings' => 'colormag_woocmmerce_archive_page_layout',
			'choices'  => array(
				'right_sidebar'               => COLORMAG_ADMIN_IMAGES_URL . '/right-sidebar.png',
				'left_sidebar'                => COLORMAG_ADMIN_IMAGES_URL . '/left-sidebar.png',
				'no_sidebar_full_width'       => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered' => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
			),
		) ) );

		// WooCommerce Single Product Page Layout.
		$wp_customize->add_setting( 'colormag_woocmmerce_single_product_page_layout', array(
			'default'           => 'right_sidebar',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'colormag_radio_select_sanitize',
		) );

		$wp_customize->add_control( new COLORMAG_Image_Radio_Control( $wp_customize, 'colormag_woocmmerce_single_product_page_layout', array(
			'type'     => 'radio',
			'label'    => esc_html__( 'WooCommerce Single Product Page Layout', 'colormag' ),
			'section'  => 'colormag_woocommerce_setting',
			'settings' => 'colormag_woocmmerce_single_product_page_layout',
			'choices'  => array(
				'right_sidebar'               => COLORMAG_ADMIN_IMAGES_URL . '/right-sidebar.png',
				'left_sidebar'                => COLORMAG_ADMIN_IMAGES_URL . '/left-sidebar.png',
				'no_sidebar_full_width'       => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered' => COLORMAG_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png',
			),
		) ) );
	}
	// End of WooCommerce options.

	// Category Color Options
	$wp_customize->add_panel( 'colormag_category_color_panel', array(
		'priority'    => 535,
		'title'       => __( 'Category Color Options', 'colormag' ),
		'capability'  => 'edit_theme_options',
		'description' => __( 'Change the color of each category items as you want.', 'colormag' ),
	) );

	$wp_customize->add_section( 'colormag_category_color_setting', array(
		'priority' => 1,
		'title'    => __( 'Category Color Settings', 'colormag' ),
		'panel'    => 'colormag_category_color_panel',
	) );

	$i                = 1;
	$args             = array(
		'orderby'    => 'id',
		'hide_empty' => 0,
	);
	$categories       = get_categories( $args );
	$wp_category_list = array();
	foreach ( $categories as $category_list ) {
		$wp_category_list[ $category_list->cat_ID ] = $category_list->cat_name;

		$wp_customize->add_setting( 'colormag_category_color_' . get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), array(
			'default'              => '',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'colormag_color_option_hex_sanitize',
			'sanitize_js_callback' => 'colormag_color_escaping_option_sanitize',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'colormag_category_color_' . get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), array(
			'label'    => sprintf( __( '%s', 'colormag' ), $wp_category_list[ $category_list->cat_ID ] ),
			'section'  => 'colormag_category_color_setting',
			'settings' => 'colormag_category_color_' . get_cat_id( $wp_category_list[ $category_list->cat_ID ] ),
			'priority' => $i,
		) ) );
		$i ++;
	}

	$wp_customize->add_section( 'colormag_category_menu_color_section', array(
		'priority' => 2,
		'title'    => esc_html__( 'Category Color in Menu', 'colormag' ),
		'panel'    => 'colormag_category_color_panel',
	) );

	$wp_customize->add_setting( 'colormag_category_menu_color', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_checkbox_sanitize',
	) );

	$wp_customize->add_control( 'colormag_category_menu_color', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Check to show category color in menu.', 'colormag' ),
		'section'  => 'colormag_category_menu_color_section',
		'settings' => 'colormag_category_menu_color',
	) );

	// Start of the Typography Option
	$wp_customize->add_panel( 'colormag_typography_options', array(
		'priority'    => 525,
		'title'       => __( 'Typography Options', 'colormag' ),
		'description' => __( 'Change the Typography Settings from here as you want', 'colormag' ),
		'capability'  => 'edit_theme_options',
	) );

	// google font options
	$wp_customize->add_section( 'colormag_google_fonts_settings', array(
		'priority' => 1,
		'title'    => __( 'Google Font Options', 'colormag' ),
		'panel'    => 'colormag_typography_options',
	) );

	$colormag_fonts = array(
		'colormag_site_title_font'   => array(
			'id'      => 'colormag_site_title_font',
			'default' => 'Open Sans',
			'title'   => __( 'Site title font. Default is "Open Sans"', 'colormag' ),
		),
		'colormag_site_tagline_font' => array(
			'id'      => 'colormag_site_tagline_font',
			'default' => 'Open Sans',
			'title'   => __( 'Site tagline font. Default is "Open Sans"', 'colormag' ),
		),
		'colormag_primary_menu_font' => array(
			'id'      => 'colormag_primary_menu_font',
			'default' => 'Open Sans',
			'title'   => __( 'Primary menu font. Default is "Open Sans"', 'colormag' ),
		),
		'colormag_all_titles_font'   => array(
			'id'      => 'colormag_all_titles_font',
			'default' => 'Open Sans',
			'title'   => __( 'All Titles font. Default is "Open Sans"', 'colormag' ),
		),
		'colormag_content_font'      => array(
			'id'      => 'colormag_content_font',
			'default' => 'Open Sans',
			'title'   => __( 'Content font and for others. Default is "Open Sans"', 'colormag' ),
		),
	);

	foreach ( $colormag_fonts as $colormag_font ) {

		$wp_customize->add_setting(
			$colormag_font['id'], array(
				'default'           => $colormag_font['default'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'colormag_fonts_sanitization',
			)
		);

		global $colormag_google_font;

		$wp_customize->add_control(
			$colormag_font['id'], array(
				'label'    => $colormag_font['title'],
				'type'     => 'select',
				'settings' => $colormag_font['id'],
				'section'  => 'colormag_google_fonts_settings',
				'choices'  => $colormag_google_font,
			)
		);
	}

	// header font size option
	$wp_customize->add_section( 'colormag_header_font_size_setting', array(
		'priority' => 2,
		'title'    => __( 'Header font size Options', 'colormag' ),
		'panel'    => 'colormag_typography_options',
	) );

	$wp_customize->add_setting( 'colormag_title_font_size', array(
		'priority'          => 1,
		'default'           => '46',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_title_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Site title font size. Default is 46px', 'colormag' ),
		'section'  => 'colormag_header_font_size_setting',
		'settings' => 'colormag_title_font_size',
		'choices'  => colormag_font_size_range_generator( 30, 90 ),
	) );

	$wp_customize->add_setting( 'colormag_tagline_font_size', array(
		'priority'          => 2,
		'default'           => '16',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_tagline_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Site tagline font size. Default is 16px', 'colormag' ),
		'section'  => 'colormag_header_font_size_setting',
		'settings' => 'colormag_tagline_font_size',
		'choices'  => colormag_font_size_range_generator( 10, 40 ),
	) );

	$wp_customize->add_setting( 'colormag_primary_menu_font_size', array(
		'priority'          => 3,
		'default'           => '14',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_primary_menu_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Primary menu. Default is 14px', 'colormag' ),
		'section'  => 'colormag_header_font_size_setting',
		'settings' => 'colormag_primary_menu_font_size',
		'choices'  => colormag_font_size_range_generator( 12, 30 ),
	) );

	$wp_customize->add_setting( 'colormag_primary_sub_menu_font_size', array(
		'priority'          => 4,
		'default'           => '14',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_primary_sub_menu_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Primary sub menu. Default is 14px', 'colormag' ),
		'section'  => 'colormag_header_font_size_setting',
		'settings' => 'colormag_primary_sub_menu_font_size',
		'choices'  => colormag_font_size_range_generator( 12, 30 ),
	) );

	// titles related font size option
	$wp_customize->add_section( 'colormag_titles_related_font_size_setting', array(
		'priority' => 5,
		'title'    => __( 'Titles related font size options', 'colormag' ),
		'panel'    => 'colormag_typography_options',
	) );

	$wp_customize->add_setting( 'colormag_heading_h1_font_size', array(
		'priority'          => 1,
		'capability'        => 'edit_theme_options',
		'default'           => '42',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_heading_h1_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Heading h1 tag. Default is 42px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_heading_h1_font_size',
		'choices'  => colormag_font_size_range_generator( 34, 60 ),
	) );

	$wp_customize->add_setting( 'colormag_heading_h2_font_size', array(
		'priority'          => 2,
		'capability'        => 'edit_theme_options',
		'default'           => '38',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_heading_h2_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Heading h2 tag. Default is 38px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_heading_h2_font_size',
		'choices'  => colormag_font_size_range_generator( 30, 56 ),
	) );

	$wp_customize->add_setting( 'colormag_heading_h3_font_size', array(
		'priority'          => 3,
		'capability'        => 'edit_theme_options',
		'default'           => '34',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_heading_h3_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Heading h3 tag. Default is 34px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_heading_h3_font_size',
		'choices'  => colormag_font_size_range_generator( 26, 52 ),
	) );

	$wp_customize->add_setting( 'colormag_heading_h4_font_size', array(
		'priority'          => 4,
		'capability'        => 'edit_theme_options',
		'default'           => '30',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_heading_h4_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Heading h4 tag. Default is 30px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_heading_h4_font_size',
		'choices'  => colormag_font_size_range_generator( 22, 48 ),
	) );

	$wp_customize->add_setting( 'colormag_heading_h5_font_size', array(
		'priority'          => 5,
		'capability'        => 'edit_theme_options',
		'default'           => '26',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_heading_h5_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Heading h5 tag. Default is 26px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_heading_h5_font_size',
		'choices'  => colormag_font_size_range_generator( 18, 44 ),
	) );

	$wp_customize->add_setting( 'colormag_heading_h6_font_size', array(
		'priority'          => 6,
		'capability'        => 'edit_theme_options',
		'default'           => '22',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_heading_h6_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Heading h6 tag. Default is 22px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_heading_h6_font_size',
		'choices'  => colormag_font_size_range_generator( 14, 40 ),
	) );

	$wp_customize->add_setting( 'colormag_post_title_font_size', array(
		'priority'          => 8,
		'capability'        => 'edit_theme_options',
		'default'           => '32',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_post_title_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Post Title. Default is 32px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_post_title_font_size',
		'choices'  => colormag_font_size_range_generator( 22, 52 ),
	) );

	$wp_customize->add_setting( 'colormag_page_title_font_size', array(
		'priority'          => 9,
		'capability'        => 'edit_theme_options',
		'default'           => '34',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_page_title_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Page Title. Default is 34px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_page_title_font_size',
		'choices'  => colormag_font_size_range_generator( 22, 52 ),
	) );

	$wp_customize->add_setting( 'colormag_widget_title_font_size', array(
		'priority'          => 10,
		'capability'        => 'edit_theme_options',
		'default'           => '18',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_widget_title_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Widget Title. Default is 18px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_widget_title_font_size',
		'choices'  => colormag_font_size_range_generator( 18, 44 ),
	) );

	$wp_customize->add_setting( 'colormag_comment_title_font_size', array(
		'priority'          => 11,
		'capability'        => 'edit_theme_options',
		'default'           => '22',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_comment_title_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Comment Title. Default is 22px', 'colormag' ),
		'section'  => 'colormag_titles_related_font_size_setting',
		'settings' => 'colormag_comment_title_font_size',
		'choices'  => colormag_font_size_range_generator( 12, 42 ),
	) );

	// content font size options
	$wp_customize->add_section( 'colormag_content_font_size_setting', array(
		'priority' => 6,
		'title'    => __( 'Content font size options', 'colormag' ),
		'panel'    => 'colormag_typography_options',
	) );

	$wp_customize->add_setting( 'colormag_content_font_size', array(
		'priority'          => 1,
		'capability'        => 'edit_theme_options',
		'default'           => '18',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_content_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Content font size, also applies to other text like in search fields, post comment button etc. Default is 18px', 'colormag' ),
		'section'  => 'colormag_content_font_size_setting',
		'settings' => 'colormag_content_font_size',
		'choices'  => colormag_font_size_range_generator( 10, 36 ),
	) );

	$wp_customize->add_setting( 'colormag_post_meta_font_size', array(
		'priority'          => 2,
		'capability'        => 'edit_theme_options',
		'default'           => '12',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_post_meta_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Post meta font size. Default is 12px', 'colormag' ),
		'section'  => 'colormag_content_font_size_setting',
		'settings' => 'colormag_post_meta_font_size',
		'choices'  => colormag_font_size_range_generator( 10, 36 ),
	) );

	$wp_customize->add_setting( 'colormag_button_text_font_size', array(
		'priority'          => 5,
		'capability'        => 'edit_theme_options',
		'default'           => '12',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_button_text_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Button text font size (Buttons like Read more, submit, post comment etc). Default is 12px', 'colormag' ),
		'section'  => 'colormag_content_font_size_setting',
		'settings' => 'colormag_button_text_font_size',
		'choices'  => colormag_font_size_range_generator( 10, 28 ),
	) );

	// footer font size option
	$wp_customize->add_section( 'colormag_footer_font_size_setting', array(
		'priority' => 7,
		'title'    => __( 'Footer font size options', 'colormag' ),
		'panel'    => 'colormag_typography_options',
	) );

	$wp_customize->add_setting( 'colormag_footer_widget_title_font_size', array(
		'priority'          => 1,
		'capability'        => 'edit_theme_options',
		'default'           => '15',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_footer_widget_title_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Footer widget Titles. Default is 15px', 'colormag' ),
		'section'  => 'colormag_footer_font_size_setting',
		'settings' => 'colormag_footer_widget_title_font_size',
		'choices'  => colormag_font_size_range_generator( 12, 46 ),
	) );

	$wp_customize->add_setting( 'colormag_footer_widget_content_font_size', array(
		'priority'          => 2,
		'capability'        => 'edit_theme_options',
		'default'           => '14',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_footer_widget_content_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Footer widget content font size. Default is 14px', 'colormag' ),
		'section'  => 'colormag_footer_font_size_setting',
		'settings' => 'colormag_footer_widget_content_font_size',
		'choices'  => colormag_font_size_range_generator( 10, 30 ),
	) );

	$wp_customize->add_setting( 'colormag_footer_copyright_text_font_size', array(
		'priority'          => 3,
		'capability'        => 'edit_theme_options',
		'default'           => '14',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_footer_copyright_text_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Footer copyright text font size. Default is 14px', 'colormag' ),
		'section'  => 'colormag_footer_font_size_setting',
		'settings' => 'colormag_footer_copyright_text_font_size',
		'choices'  => colormag_font_size_range_generator( 10, 24 ),
	) );

	$wp_customize->add_setting( 'colormag_footer_small_menu_font_size', array(
		'priority'          => 4,
		'capability'        => 'edit_theme_options',
		'default'           => '14',
		'sanitize_callback' => 'colormag_radio_select_sanitize',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'colormag_footer_small_menu_font_size', array(
		'type'     => 'select',
		'label'    => __( 'Footer small menu. Default is 14px', 'colormag' ),
		'section'  => 'colormag_footer_font_size_setting',
		'settings' => 'colormag_footer_small_menu_font_size',
		'choices'  => colormag_font_size_range_generator( 10, 24 ),
	) );
	// End of the Typography Option
	// Start of the Color Options
	$wp_customize->add_panel( 'colormag_color_options', array(
		'priority'    => 530,
		'title'       => __( 'Color Options', 'colormag' ),
		'capabitity'  => 'edit_theme_options',
		'description' => __( 'Change the Color Settings from here as you want', 'colormag' ),
	) );

	// header color options
	$wp_customize->add_section( 'colormag_header_color_settings', array(
		'priority' => 1,
		'title'    => __( 'Header Color Options', 'colormag' ),
		'panel'    => 'colormag_color_options',
	) );

	$colormag_header_color_options = array(
		'colormag_site_title_color'                         => array(
			'id'      => 'colormag_site_title_color',
			'title'   => __( 'Site Title.', 'colormag' ),
			'default' => '#289dcc',
		),
		'colormag_site_tagline_color'                       => array(
			'id'      => 'colormag_site_tagline_color',
			'title'   => __( 'Site Tagline.', 'colormag' ),
			'default' => '#666666',
		),
		'colormag_primary_menu_text_color'                  => array(
			'id'      => 'colormag_primary_menu_text_color',
			'title'   => __( 'Primary menu text color.', 'colormag' ),
			'default' => '#ffffff',
		),
		'colormag_primary_menu_background_color'            => array(
			'id'      => 'colormag_primary_menu_background_color',
			'title'   => __( 'Primary menu background color.', 'colormag' ),
			'default' => '#232323',
		),
		'colormag_primary_sub_menu_background_color'        => array(
			'id'      => 'colormag_primary_sub_menu_background_color',
			'title'   => __( 'Primary sub menu background color.', 'colormag' ),
			'default' => '#232323',
		),
		'colormag_primary_menu_top_border_color'            => array(
			'id'      => 'colormag_primary_menu_top_border_color',
			'title'   => __( 'Primary menu top border color.', 'colormag' ),
			'default' => '#289dcc',
		),
		'colormag_primary_menu_selected_hovered_text_color' => array(
			'id'      => 'colormag_primary_menu_selected_hovered_text_color',
			'title'   => __( 'Primary menu selected/hovered item color.', 'colormag' ),
			'default' => '#ffffff',
		),
		'colormag_header_background_color'                  => array(
			'id'      => 'colormag_header_background_color',
			'title'   => __( 'Header background color.', 'colormag' ),
			'default' => '#ffffff',
		),
	);

	$i = 1;

	foreach ( $colormag_header_color_options as $colormag_header_color_option ) {
		$wp_customize->add_setting( $colormag_header_color_option['id'], array(
			'default'              => $colormag_header_color_option['default'],
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'colormag_color_option_hex_sanitize',
			'sanitize_js_callback' => 'colormag_color_escaping_option_sanitize',
			'transport'            => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $colormag_header_color_option['id'], array(
			'label'    => $colormag_header_color_option['title'],
			'section'  => 'colormag_header_color_settings',
			'settings' => $colormag_header_color_option['id'],
			'priority' => $i,
		) ) );

		$i ++;
	}

	// content part color option
	$wp_customize->add_section( 'colormag_content_part_color_setting', array(
		'priority' => 2,
		'title'    => __( 'Content part color options', 'colormag' ),
		'panel'    => 'colormag_color_options',
	) );

	$colormag_content_part_color_options = array(
		'colormag_content_part_title_color'         => array(
			'id'      => 'colormag_content_part_title_color',
			'title'   => __( 'Content Part titles color (like h1, h2 in content section).', 'colormag' ),
			'default' => '#333333',
		),
		'colormag_post_title_color'                 => array(
			'id'      => 'colormag_post_title_color',
			'title'   => __( 'Posts title color.', 'colormag' ),
			'default' => '#333333',
		),
		'colormag_page_title_color'                 => array(
			'id'      => 'colormag_page_title_color',
			'title'   => __( 'Page title color.', 'colormag' ),
			'default' => '#333333',
		),
		'colormag_content_text_color'               => array(
			'id'      => 'colormag_content_text_color',
			'title'   => __( 'Content text color.', 'colormag' ),
			'default' => '#444444',
		),
		'colormag_post_meta_color'                  => array(
			'id'      => 'colormag_post_meta_color',
			'title'   => __( 'Post meta color.', 'colormag' ),
			'default' => '#888888',
		),
		'colormag_button_text_color'                => array(
			'id'      => 'colormag_button_text_color',
			'title'   => __( 'Button text color.', 'colormag' ),
			'default' => '#ffffff',
		),
		'colormag_button_background_color'          => array(
			'id'      => 'colormag_button_background_color',
			'title'   => __( 'Button background color.', 'colormag' ),
			'default' => '#d40234',
		),
		'colormag_sidebar_widget_title_color'       => array(
			'id'      => 'colormag_sidebar_widget_title_color',
			'title'   => __( 'Sidebar widget title color.', 'colormag' ),
			'default' => '#ffffff',
		),
		'colormag_content_section_background_color' => array(
			'id'      => 'colormag_content_section_background_color',
			'title'   => __( 'Content section background color.', 'colormag' ),
			'default' => '#ffffff',
		),
	);

	$i = 1;

	foreach ( $colormag_content_part_color_options as $colormag_content_part_color_option ) {
		$wp_customize->add_setting( $colormag_content_part_color_option['id'], array(
			'default'              => $colormag_content_part_color_option['default'],
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'colormag_color_option_hex_sanitize',
			'sanitize_js_callback' => 'colormag_color_escaping_option_sanitize',
			'transport'            => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $colormag_content_part_color_option['id'], array(
			'label'    => $colormag_content_part_color_option['title'],
			'section'  => 'colormag_content_part_color_setting',
			'settings' => $colormag_content_part_color_option['id'],
			'priority' => $i,
		) ) );

		$i ++;
	}

	// footer part color options
	$wp_customize->add_section( 'colormag_footer_part_color_setting', array(
		'priority' => 4,
		'title'    => __( 'Footer part color options', 'colormag' ),
		'panel'    => 'colormag_color_options',
	) );

	$colormag_footer_part_color_options = array(
		'colormag_footer_widget_title_color'              => array(
			'id'      => 'colormag_footer_widget_title_color',
			'title'   => __( 'Widget title color.', 'colormag' ),
			'default' => '#ffffff',
		),
		'colormag_footer_widget_content_color'            => array(
			'id'      => 'colormag_footer_widget_content_color',
			'title'   => __( 'Footer widget content color.', 'colormag' ),
			'default' => '#ffffff',
		),
		'colormag_footer_widget_content_link_text_color'  => array(
			'id'      => 'colormag_footer_widget_content_link_text_color',
			'title'   => __( 'Footer widget content link text color.', 'colormag' ),
			'default' => '#ffffff',
		),
		'colormag_footer_widget_background_color'         => array(
			'id'      => 'colormag_footer_widget_background_color',
			'title'   => __( 'Footer widget background color.', 'colormag' ),
			'default' => '',
		),
		'colormag_upper_footer_widget_background_color'   => array(
			'id'      => 'colormag_upper_footer_widget_background_color',
			'title'   => __( 'Upper footer widget background color.', 'colormag' ),
			'default' => '#2c2e34',
		),
		'colormag_footer_copyright_text_color'            => array(
			'id'      => 'colormag_footer_copyright_text_color',
			'title'   => __( 'Footer copyright text color.', 'colormag' ),
			'default' => '#b1b6b6',
		),
		'colormag_footer_copyright_link_text_color'       => array(
			'id'      => 'colormag_footer_copyright_link_text_color',
			'title'   => __( 'Footer copyright link text color.', 'colormag' ),
			'default' => '#b1b6b6',
		),
		'colormag_footer_small_menu_text_color'           => array(
			'id'      => 'colormag_footer_small_menu_text_color',
			'title'   => __( 'Footer small menu text color.', 'colormag' ),
			'default' => '#b1b6b6',
		),
		'colormag_footer_copyright_part_background_color' => array(
			'id'      => 'colormag_footer_copyright_part_background_color',
			'title'   => __( 'Footer copyright part background color.', 'colormag' ),
			'default' => '',
		),
	);

	$i = 1;

	foreach ( $colormag_footer_part_color_options as $colormag_footer_part_color_option ) {
		$wp_customize->add_setting( $colormag_footer_part_color_option['id'], array(
			'default'              => $colormag_footer_part_color_option['default'],
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'colormag_color_option_hex_sanitize',
			'sanitize_js_callback' => 'colormag_color_escaping_option_sanitize',
			'transport'            => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $colormag_footer_part_color_option['id'], array(
			'label'    => $colormag_footer_part_color_option['title'],
			'section'  => 'colormag_footer_part_color_setting',
			'settings' => $colormag_footer_part_color_option['id'],
			'priority' => $i,
		) ) );

		$i ++;
	}

	// End of the Color Options

	// Start of the WordPress default options.
	// Background image clickable
	$wp_customize->add_setting( 'colormag_background_image_link', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'colormag_background_image_link', array(
		'label'           => esc_html__( 'Add the background link url.', 'colormag' ),
		'section'         => 'background_image',
		'setting'         => 'colormag_background_image_link',
		'active_callback' => 'colormag_background_image',
	) );
	// End of the WordPress default options.

	// sanitization works
	// radio/select buttons sanitization
	function colormag_radio_select_sanitize( $input, $setting ) {
		// Ensuring that the input is a slug.
		$input = sanitize_key( $input );
		// Get the list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it, else, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	// color sanitization
	function colormag_color_option_hex_sanitize( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ) ) {
			return '#' . $unhashed;
		}

		return $color;
	}

	function colormag_color_escaping_option_sanitize( $input ) {
		$input = esc_attr( $input );

		return $input;
	}

	// checkbox sanitization
	function colormag_checkbox_sanitize( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	// sanitization of links
	function colormag_links_sanitize() {
		return false;
	}

	// footer section sanitization
	function colormag_footer_editor_sanitize( $input ) {
		if ( isset( $input ) ) {
			$input = stripslashes( wp_filter_post_kses( addslashes( $input ) ) );
		}

		return $input;
	}

	// google fonts sanitization
	function colormag_fonts_sanitization( $input ) {
		global $colormag_google_font;
		$valid_keys = $colormag_google_font;

		if ( array_key_exists( $input, $valid_keys ) ) {
			return $input;
		} else {
			return '';
		}
	}

	function colormag_breaking_news_duration_setting_options_sanitize( $input ) {
		if ( is_numeric( $input ) ) {
			return intval( $input );
		} else {
			return 4;
		}
	}

	function colormag_breaking_news_speed_setting_options_sanitize( $input ) {
		if ( is_numeric( $input ) ) {
			return intval( $input );
		} else {
			return 1;
		}
	}

	function colormag_false_sanitize() {
		return false;
	}


	function is_header_linked_home() {
		return ! get_theme_mod( 'colormag_header_image_link', 0 );
	}

}

add_action( 'customize_register', 'colormag_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since ColorMag 2.2.4
 */
function colormag_customize_preview_js() {
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'colormag-customizer', get_template_directory_uri() . '/js/customizer' . $suffix . '.js', array( 'customize-preview' ), false, true );
}

add_action( 'customize_preview_init', 'colormag_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function colormag_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function colormag_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Render the breaking news title display for selective refresh partial
 *
 * @return void
 */
function colormag_breaking_news_content() {
	echo get_theme_mod( 'colormag_breaking_news_content_option', __( 'Latest:', 'colormag' ) );
}

/**
 * Render the breaking news display type for selective refresh partial
 *
 * @return void
 */
function colormag_date_display_type() {
	// Return if date display option is not enabled
	if ( get_theme_mod( 'colormag_date_display', 0 ) == 0 ) {
		return;
	}

	if ( get_theme_mod( 'colormag_date_display_type', 'theme_default' ) == 'theme_default' ) {
		echo date_i18n( 'l, F j, Y' );
	} else if ( get_theme_mod( 'colormag_date_display_type', 'theme_default' ) == 'wordpress_date_setting' ) {
		echo date_i18n( get_option( 'date_format' ) );
	}
}

/**
 * Render the view all button text for selective refresh partial
 *
 * @return void
 */
function colormag_view_all_button_text() {
	echo get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) );
}

/**
 * Render the you may also like text for selective refresh partial
 *
 * @return void
 */
function colormag_you_may_also_like_text() {
	?>
	<i class="fa fa-thumbs-up"></i>
	<span><?php echo get_theme_mod( 'colormag_you_may_also_like_text', esc_html__( 'You May Also Like', 'colormag' ) ); ?></span>
	<?php
}

/**
 * Render the featured image caption for selective refresh partial
 *
 * @return void
 */
function colormag_featured_image_caption_display() {
	// Bail out if featured image caption display is not enabled
	if ( get_theme_mod( 'colormag_featured_image_caption_show', 0 ) == 0 ) {
		return;
	}

	// Display the featured image caption
	if ( get_post( get_post_thumbnail_id() )->post_excerpt ) {
		echo wp_kses_post( get_post( get_post_thumbnail_id() )->post_excerpt );
	}
}

/**
 * Check if the background image is set or not.
 *
 * @return bool
 */
function colormag_background_image() {
	$background_image = get_background_image();
	if ( $background_image ) {
		return true;
	}

	return false;
}

// google font addition
$colormag_google_font = array(
	'ABeeZee'                   => 'ABeeZee',
	'Abel'                      => 'Abel',
	'Abhaya Libre'              => 'Abhaya Libre',
	'Abril Fatface'             => 'Abril Fatface',
	'Aclonica'                  => 'Aclonica',
	'Acme'                      => 'Acme',
	'Actor'                     => 'Actor',
	'Adamina'                   => 'Adamina',
	'Advent Pro'                => 'Advent Pro',
	'Aguafina Script'           => 'Aguafina Script',
	'Akronim'                   => 'Akronim',
	'Aladin'                    => 'Aladin',
	'Aldrich'                   => 'Aldrich',
	'Alef'                      => 'Alef',
	'Alegreya'                  => 'Alegreya',
	'Alegreya SC'               => 'Alegreya SC',
	'Alegreya Sans'             => 'Alegreya Sans',
	'Alegreya Sans SC'          => 'Alegreya Sans SC',
	'Alex Brush'                => 'Alex Brush',
	'Alfa Slab One'             => 'Alfa Slab One',
	'Alice'                     => 'Alice',
	'Alike'                     => 'Alike',
	'Alike Angular'             => 'Alike Angular',
	'Allan'                     => 'Allan',
	'Allerta'                   => 'Allerta',
	'Allerta Stencil'           => 'Allerta Stencil',
	'Allura'                    => 'Allura',
	'Almendra'                  => 'Almendra',
	'Almendra Display'          => 'Almendra Display',
	'Almendra SC'               => 'Almendra SC',
	'Amarante'                  => 'Amarante',
	'Amaranth'                  => 'Amaranth',
	'Amatic SC'                 => 'Amatic SC',
	'Amatica SC'                => 'Amatica SC',
	'Amethysta'                 => 'Amethysta',
	'Amiko'                     => 'Amiko',
	'Amiri'                     => 'Amiri',
	'Amita'                     => 'Amita',
	'Anaheim'                   => 'Anaheim',
	'Andada'                    => 'Andada',
	'Andika'                    => 'Andika',
	'Angkor'                    => 'Angkor',
	'Annie Use Your Telescope'  => 'Annie Use Your Telescope',
	'Anonymous Pro'             => 'Anonymous Pro',
	'Antic'                     => 'Antic',
	'Antic Didone'              => 'Antic Didone',
	'Antic Slab'                => 'Antic Slab',
	'Anton'                     => 'Anton',
	'Arapey'                    => 'Arapey',
	'Arbutus'                   => 'Arbutus',
	'Arbutus Slab'              => 'Arbutus Slab',
	'Architects Daughter'       => 'Architects Daughter',
	'Archivo Black'             => 'Archivo Black',
	'Archivo Narrow'            => 'Archivo Narrow',
	'Aref Ruqaa'                => 'Aref Ruqaa',
	'Arima Madurai'             => 'Arima Madurai',
	'Arimo'                     => 'Arimo',
	'Arizonia'                  => 'Arizonia',
	'Armata'                    => 'Armata',
	'Arsenal'                   => 'Arsenal',
	'Artifika'                  => 'Artifika',
	'Arvo'                      => 'Arvo',
	'Arya'                      => 'Arya',
	'Asap'                      => 'Asap',
	'Asar'                      => 'Asar',
	'Asset'                     => 'Asset',
	'Assistant'                 => 'Assistant',
	'Astloch'                   => 'Astloch',
	'Asul'                      => 'Asul',
	'Athiti'                    => 'Athiti',
	'Atma'                      => 'Atma',
	'Atomic Age'                => 'Atomic Age',
	'Aubrey'                    => 'Aubrey',
	'Audiowide'                 => 'Audiowide',
	'Autour One'                => 'Autour One',
	'Average'                   => 'Average',
	'Average Sans'              => 'Average Sans',
	'Averia Gruesa Libre'       => 'Averia Gruesa Libre',
	'Averia Libre'              => 'Averia Libre',
	'Averia Sans Libre'         => 'Averia Sans Libre',
	'Averia Serif Libre'        => 'Averia Serif Libre',
	'Bad Script'                => 'Bad Script',
	'Bahiana'                   => 'Bahiana',
	'Baloo'                     => 'Baloo',
	'Baloo Bhai'                => 'Baloo Bhai',
	'Baloo Bhaina'              => 'Baloo Bhaina',
	'Baloo Chettan'             => 'Baloo Chettan',
	'Baloo Da'                  => 'Baloo Da',
	'Baloo Paaji'               => 'Baloo Paaji',
	'Baloo Tamma'               => 'Baloo Tamma',
	'Baloo Thambi'              => 'Baloo Thambi',
	'Balthazar'                 => 'Balthazar',
	'Bangers'                   => 'Bangers',
	'Barrio'                    => 'Barrio',
	'Basic'                     => 'Basic',
	'Battambang'                => 'Battambang',
	'Baumans'                   => 'Baumans',
	'Bayon'                     => 'Bayon',
	'Belgrano'                  => 'Belgrano',
	'Belleza'                   => 'Belleza',
	'BenchNine'                 => 'BenchNine',
	'Bentham'                   => 'Bentham',
	'Berkshire Swash'           => 'Berkshire Swash',
	'Bevan'                     => 'Bevan',
	'Bigelow Rules'             => 'Bigelow Rules',
	'Bigshot One'               => 'Bigshot One',
	'Bilbo'                     => 'Bilbo',
	'Bilbo Swash Caps'          => 'Bilbo Swash Caps',
	'BioRhyme'                  => 'BioRhyme',
	'BioRhyme Expanded'         => 'BioRhyme Expanded',
	'Biryani'                   => 'Biryani',
	'Bitter'                    => 'Bitter',
	'Black Ops One'             => 'Black Ops One',
	'Bokor'                     => 'Bokor',
	'Bonbon'                    => 'Bonbon',
	'Boogaloo'                  => 'Boogaloo',
	'Bowlby One'                => 'Bowlby One',
	'Bowlby One SC'             => 'Bowlby One SC',
	'Brawler'                   => 'Brawler',
	'Bree Serif'                => 'Bree Serif',
	'Bubblegum Sans'            => 'Bubblegum Sans',
	'Bubbler One'               => 'Bubbler One',
	'Buda'                      => 'Buda',
	'Buenard'                   => 'Buenard',
	'Bungee'                    => 'Bungee',
	'Bungee Hairline'           => 'Bungee Hairline',
	'Bungee Inline'             => 'Bungee Inline',
	'Bungee Outline'            => 'Bungee Outline',
	'Bungee Shade'              => 'Bungee Shade',
	'Butcherman'                => 'Butcherman',
	'Butterfly Kids'            => 'Butterfly Kids',
	'Cabin'                     => 'Cabin',
	'Cabin Condensed'           => 'Cabin Condensed',
	'Cabin Sketch'              => 'Cabin Sketch',
	'Caesar Dressing'           => 'Caesar Dressing',
	'Cagliostro'                => 'Cagliostro',
	'Cairo'                     => 'Cairo',
	'Calligraffitti'            => 'Calligraffitti',
	'Cambay'                    => 'Cambay',
	'Cambo'                     => 'Cambo',
	'Candal'                    => 'Candal',
	'Cantarell'                 => 'Cantarell',
	'Cantata One'               => 'Cantata One',
	'Cantora One'               => 'Cantora One',
	'Capriola'                  => 'Capriola',
	'Cardo'                     => 'Cardo',
	'Carme'                     => 'Carme',
	'Carrois Gothic'            => 'Carrois Gothic',
	'Carrois Gothic SC'         => 'Carrois Gothic SC',
	'Carter One'                => 'Carter One',
	'Catamaran'                 => 'Catamaran',
	'Caudex'                    => 'Caudex',
	'Caveat'                    => 'Caveat',
	'Caveat Brush'              => 'Caveat Brush',
	'Cedarville Cursive'        => 'Cedarville Cursive',
	'Ceviche One'               => 'Ceviche One',
	'Changa'                    => 'Changa',
	'Changa One'                => 'Changa One',
	'Chango'                    => 'Chango',
	'Chathura'                  => 'Chathura',
	'Chau Philomene One'        => 'Chau Philomene One',
	'Chela One'                 => 'Chela One',
	'Chelsea Market'            => 'Chelsea Market',
	'Chenla'                    => 'Chenla',
	'Cherry Cream Soda'         => 'Cherry Cream Soda',
	'Cherry Swash'              => 'Cherry Swash',
	'Chewy'                     => 'Chewy',
	'Chicle'                    => 'Chicle',
	'Chivo'                     => 'Chivo',
	'Chonburi'                  => 'Chonburi',
	'Cinzel'                    => 'Cinzel',
	'Cinzel Decorative'         => 'Cinzel Decorative',
	'Clicker Script'            => 'Clicker Script',
	'Coda'                      => 'Coda',
	'Coda Caption'              => 'Coda Caption',
	'Codystar'                  => 'Codystar',
	'Coiny'                     => 'Coiny',
	'Combo'                     => 'Combo',
	'Comfortaa'                 => 'Comfortaa',
	'Coming Soon'               => 'Coming Soon',
	'Concert One'               => 'Concert One',
	'Condiment'                 => 'Condiment',
	'Content'                   => 'Content',
	'Contrail One'              => 'Contrail One',
	'Convergence'               => 'Convergence',
	'Cookie'                    => 'Cookie',
	'Copse'                     => 'Copse',
	'Corben'                    => 'Corben',
	'Cormorant'                 => 'Cormorant',
	'Cormorant Garamond'        => 'Cormorant Garamond',
	'Cormorant Infant'          => 'Cormorant Infant',
	'Cormorant SC'              => 'Cormorant SC',
	'Cormorant Unicase'         => 'Cormorant Unicase',
	'Cormorant Upright'         => 'Cormorant Upright',
	'Courgette'                 => 'Courgette',
	'Cousine'                   => 'Cousine',
	'Coustard'                  => 'Coustard',
	'Covered By Your Grace'     => 'Covered By Your Grace',
	'Crafty Girls'              => 'Crafty Girls',
	'Creepster'                 => 'Creepster',
	'Crete Round'               => 'Crete Round',
	'Crimson Text'              => 'Crimson Text',
	'Croissant One'             => 'Croissant One',
	'Crushed'                   => 'Crushed',
	'Cuprum'                    => 'Cuprum',
	'Cutive'                    => 'Cutive',
	'Cutive Mono'               => 'Cutive Mono',
	'Damion'                    => 'Damion',
	'Dancing Script'            => 'Dancing Script',
	'Dangrek'                   => 'Dangrek',
	'David Libre'               => 'David Libre',
	'Dawning of a New Day'      => 'Dawning of a New Day',
	'Days One'                  => 'Days One',
	'Dekko'                     => 'Dekko',
	'Delius'                    => 'Delius',
	'Delius Swash Caps'         => 'Delius Swash Caps',
	'Delius Unicase'            => 'Delius Unicase',
	'Della Respira'             => 'Della Respira',
	'Denk One'                  => 'Denk One',
	'Devonshire'                => 'Devonshire',
	'Dhurjati'                  => 'Dhurjati',
	'Didact Gothic'             => 'Didact Gothic',
	'Diplomata'                 => 'Diplomata',
	'Diplomata SC'              => 'Diplomata SC',
	'Domine'                    => 'Domine',
	'Donegal One'               => 'Donegal One',
	'Doppio One'                => 'Doppio One',
	'Dorsa'                     => 'Dorsa',
	'Dosis'                     => 'Dosis',
	'Dr Sugiyama'               => 'Dr Sugiyama',
	'Droid Sans'                => 'Droid Sans',
	'Droid Sans Mono'           => 'Droid Sans Mono',
	'Droid Serif'               => 'Droid Serif',
	'Duru Sans'                 => 'Duru Sans',
	'Dynalight'                 => 'Dynalight',
	'EB Garamond'               => 'EB Garamond',
	'Eagle Lake'                => 'Eagle Lake',
	'Eater'                     => 'Eater',
	'Economica'                 => 'Economica',
	'Eczar'                     => 'Eczar',
	'Ek Mukta'                  => 'Ek Mukta',
	'El Messiri'                => 'El Messiri',
	'Electrolize'               => 'Electrolize',
	'Elsie'                     => 'Elsie',
	'Elsie Swash Caps'          => 'Elsie Swash Caps',
	'Emblema One'               => 'Emblema One',
	'Emilys Candy'              => 'Emilys Candy',
	'Engagement'                => 'Engagement',
	'Englebert'                 => 'Englebert',
	'Enriqueta'                 => 'Enriqueta',
	'Erica One'                 => 'Erica One',
	'Esteban'                   => 'Esteban',
	'Euphoria Script'           => 'Euphoria Script',
	'Ewert'                     => 'Ewert',
	'Exo'                       => 'Exo',
	'Exo 2'                     => 'Exo 2',
	'Expletus Sans'             => 'Expletus Sans',
	'Fanwood Text'              => 'Fanwood Text',
	'Farsan'                    => 'Farsan',
	'Fascinate'                 => 'Fascinate',
	'Fascinate Inline'          => 'Fascinate Inline',
	'Faster One'                => 'Faster One',
	'Fasthand'                  => 'Fasthand',
	'Fauna One'                 => 'Fauna One',
	'Federant'                  => 'Federant',
	'Federo'                    => 'Federo',
	'Felipa'                    => 'Felipa',
	'Fenix'                     => 'Fenix',
	'Finger Paint'              => 'Finger Paint',
	'Fira Mono'                 => 'Fira Mono',
	'Fira Sans'                 => 'Fira Sans',
	'Fira Sans Condensed'       => 'Fira Sans Condensed',
	'Fira Sans Extra Condensed' => 'Fira Sans Extra Condensed',
	'Fjalla One'                => 'Fjalla One',
	'Fjord One'                 => 'Fjord One',
	'Flamenco'                  => 'Flamenco',
	'Flavors'                   => 'Flavors',
	'Fondamento'                => 'Fondamento',
	'Fontdiner Swanky'          => 'Fontdiner Swanky',
	'Forum'                     => 'Forum',
	'Francois One'              => 'Francois One',
	'Frank Ruhl Libre'          => 'Frank Ruhl Libre',
	'Freckle Face'              => 'Freckle Face',
	'Fredericka the Great'      => 'Fredericka the Great',
	'Fredoka One'               => 'Fredoka One',
	'Freehand'                  => 'Freehand',
	'Fresca'                    => 'Fresca',
	'Frijole'                   => 'Frijole',
	'Fruktur'                   => 'Fruktur',
	'Fugaz One'                 => 'Fugaz One',
	'GFS Didot'                 => 'GFS Didot',
	'GFS Neohellenic'           => 'GFS Neohellenic',
	'Gabriela'                  => 'Gabriela',
	'Gafata'                    => 'Gafata',
	'Galada'                    => 'Galada',
	'Galdeano'                  => 'Galdeano',
	'Galindo'                   => 'Galindo',
	'Gentium Basic'             => 'Gentium Basic',
	'Gentium Book Basic'        => 'Gentium Book Basic',
	'Geo'                       => 'Geo',
	'Geostar'                   => 'Geostar',
	'Geostar Fill'              => 'Geostar Fill',
	'Germania One'              => 'Germania One',
	'Gidugu'                    => 'Gidugu',
	'Gilda Display'             => 'Gilda Display',
	'Give You Glory'            => 'Give You Glory',
	'Glass Antiqua'             => 'Glass Antiqua',
	'Glegoo'                    => 'Glegoo',
	'Gloria Hallelujah'         => 'Gloria Hallelujah',
	'Goblin One'                => 'Goblin One',
	'Gochi Hand'                => 'Gochi Hand',
	'Gorditas'                  => 'Gorditas',
	'Goudy Bookletter 1911'     => 'Goudy Bookletter 1911',
	'Graduate'                  => 'Graduate',
	'Grand Hotel'               => 'Grand Hotel',
	'Gravitas One'              => 'Gravitas One',
	'Great Vibes'               => 'Great Vibes',
	'Griffy'                    => 'Griffy',
	'Gruppo'                    => 'Gruppo',
	'Gudea'                     => 'Gudea',
	'Gurajada'                  => 'Gurajada',
	'Habibi'                    => 'Habibi',
	'Halant'                    => 'Halant',
	'Hammersmith One'           => 'Hammersmith One',
	'Hanalei'                   => 'Hanalei',
	'Hanalei Fill'              => 'Hanalei Fill',
	'Handlee'                   => 'Handlee',
	'Hanuman'                   => 'Hanuman',
	'Happy Monkey'              => 'Happy Monkey',
	'Harmattan'                 => 'Harmattan',
	'Headland One'              => 'Headland One',
	'Heebo'                     => 'Heebo',
	'Henny Penny'               => 'Henny Penny',
	'Herr Von Muellerhoff'      => 'Herr Von Muellerhoff',
	'Hind'                      => 'Hind',
	'Hind Guntur'               => 'Hind Guntur',
	'Hind Madurai'              => 'Hind Madurai',
	'Hind Siliguri'             => 'Hind Siliguri',
	'Hind Vadodara'             => 'Hind Vadodara',
	'Holtwood One SC'           => 'Holtwood One SC',
	'Homemade Apple'            => 'Homemade Apple',
	'Homenaje'                  => 'Homenaje',
	'IM Fell DW Pica'           => 'IM Fell DW Pica',
	'IM Fell DW Pica SC'        => 'IM Fell DW Pica SC',
	'IM Fell Double Pica'       => 'IM Fell Double Pica',
	'IM Fell Double Pica SC'    => 'IM Fell Double Pica SC',
	'IM Fell English'           => 'IM Fell English',
	'IM Fell English SC'        => 'IM Fell English SC',
	'IM Fell French Canon'      => 'IM Fell French Canon',
	'IM Fell French Canon SC'   => 'IM Fell French Canon SC',
	'IM Fell Great Primer'      => 'IM Fell Great Primer',
	'IM Fell Great Primer SC'   => 'IM Fell Great Primer SC',
	'Iceberg'                   => 'Iceberg',
	'Iceland'                   => 'Iceland',
	'Imprima'                   => 'Imprima',
	'Inconsolata'               => 'Inconsolata',
	'Inder'                     => 'Inder',
	'Indie Flower'              => 'Indie Flower',
	'Inika'                     => 'Inika',
	'Inknut Antiqua'            => 'Inknut Antiqua',
	'Irish Grover'              => 'Irish Grover',
	'Istok Web'                 => 'Istok Web',
	'Italiana'                  => 'Italiana',
	'Italianno'                 => 'Italianno',
	'Itim'                      => 'Itim',
	'Jacques Francois'          => 'Jacques Francois',
	'Jacques Francois Shadow'   => 'Jacques Francois Shadow',
	'Jaldi'                     => 'Jaldi',
	'Jim Nightshade'            => 'Jim Nightshade',
	'Jockey One'                => 'Jockey One',
	'Jolly Lodger'              => 'Jolly Lodger',
	'Jomhuria'                  => 'Jomhuria',
	'Josefin Sans'              => 'Josefin Sans',
	'Josefin Slab'              => 'Josefin Slab',
	'Joti One'                  => 'Joti One',
	'Judson'                    => 'Judson',
	'Julee'                     => 'Julee',
	'Julius Sans One'           => 'Julius Sans One',
	'Junge'                     => 'Junge',
	'Jura'                      => 'Jura',
	'Just Another Hand'         => 'Just Another Hand',
	'Just Me Again Down Here'   => 'Just Me Again Down Here',
	'Kadwa'                     => 'Kadwa',
	'Kalam'                     => 'Kalam',
	'Kameron'                   => 'Kameron',
	'Kanit'                     => 'Kanit',
	'Kantumruy'                 => 'Kantumruy',
	'Karla'                     => 'Karla',
	'Karma'                     => 'Karma',
	'Katibeh'                   => 'Katibeh',
	'Kaushan Script'            => 'Kaushan Script',
	'Kavivanar'                 => 'Kavivanar',
	'Kavoon'                    => 'Kavoon',
	'Kdam Thmor'                => 'Kdam Thmor',
	'Keania One'                => 'Keania One',
	'Kelly Slab'                => 'Kelly Slab',
	'Kenia'                     => 'Kenia',
	'Khand'                     => 'Khand',
	'Khmer'                     => 'Khmer',
	'Khula'                     => 'Khula',
	'Kite One'                  => 'Kite One',
	'Knewave'                   => 'Knewave',
	'Kotta One'                 => 'Kotta One',
	'Koulen'                    => 'Koulen',
	'Kranky'                    => 'Kranky',
	'Kreon'                     => 'Kreon',
	'Kristi'                    => 'Kristi',
	'Krona One'                 => 'Krona One',
	'Kumar One'                 => 'Kumar One',
	'Kumar One Outline'         => 'Kumar One Outline',
	'Kurale'                    => 'Kurale',
	'La Belle Aurore'           => 'La Belle Aurore',
	'Laila'                     => 'Laila',
	'Lakki Reddy'               => 'Lakki Reddy',
	'Lalezar'                   => 'Lalezar',
	'Lancelot'                  => 'Lancelot',
	'Lateef'                    => 'Lateef',
	'Lato'                      => 'Lato',
	'League Script'             => 'League Script',
	'Leckerli One'              => 'Leckerli One',
	'Ledger'                    => 'Ledger',
	'Lekton'                    => 'Lekton',
	'Lemon'                     => 'Lemon',
	'Lemonada'                  => 'Lemonada',
	'Libre Baskerville'         => 'Libre Baskerville',
	'Libre Franklin'            => 'Libre Franklin',
	'Life Savers'               => 'Life Savers',
	'Lilita One'                => 'Lilita One',
	'Lily Script One'           => 'Lily Script One',
	'Limelight'                 => 'Limelight',
	'Linden Hill'               => 'Linden Hill',
	'Lobster'                   => 'Lobster',
	'Lobster Two'               => 'Lobster Two',
	'Londrina Outline'          => 'Londrina Outline',
	'Londrina Shadow'           => 'Londrina Shadow',
	'Londrina Sketch'           => 'Londrina Sketch',
	'Londrina Solid'            => 'Londrina Solid',
	'Lora'                      => 'Lora',
	'Love Ya Like A Sister'     => 'Love Ya Like A Sister',
	'Loved by the King'         => 'Loved by the King',
	'Lovers Quarrel'            => 'Lovers Quarrel',
	'Luckiest Guy'              => 'Luckiest Guy',
	'Lusitana'                  => 'Lusitana',
	'Lustria'                   => 'Lustria',
	'Macondo'                   => 'Macondo',
	'Macondo Swash Caps'        => 'Macondo Swash Caps',
	'Mada'                      => 'Mada',
	'Magra'                     => 'Magra',
	'Maiden Orange'             => 'Maiden Orange',
	'Maitree'                   => 'Maitree',
	'Mako'                      => 'Mako',
	'Mallanna'                  => 'Mallanna',
	'Mandali'                   => 'Mandali',
	'Marcellus'                 => 'Marcellus',
	'Marcellus SC'              => 'Marcellus SC',
	'Marck Script'              => 'Marck Script',
	'Margarine'                 => 'Margarine',
	'Marko One'                 => 'Marko One',
	'Marmelad'                  => 'Marmelad',
	'Martel'                    => 'Martel',
	'Martel Sans'               => 'Martel Sans',
	'Marvel'                    => 'Marvel',
	'Mate'                      => 'Mate',
	'Mate SC'                   => 'Mate SC',
	'Maven Pro'                 => 'Maven Pro',
	'McLaren'                   => 'McLaren',
	'Meddon'                    => 'Meddon',
	'MedievalSharp'             => 'MedievalSharp',
	'Medula One'                => 'Medula One',
	'Meera Inimai'              => 'Meera Inimai',
	'Megrim'                    => 'Megrim',
	'Meie Script'               => 'Meie Script',
	'Merienda'                  => 'Merienda',
	'Merienda One'              => 'Merienda One',
	'Merriweather'              => 'Merriweather',
	'Merriweather Sans'         => 'Merriweather Sans',
	'Metal'                     => 'Metal',
	'Metal Mania'               => 'Metal Mania',
	'Metamorphous'              => 'Metamorphous',
	'Metrophobic'               => 'Metrophobic',
	'Michroma'                  => 'Michroma',
	'Milonga'                   => 'Milonga',
	'Miltonian'                 => 'Miltonian',
	'Miltonian Tattoo'          => 'Miltonian Tattoo',
	'Miniver'                   => 'Miniver',
	'Miriam Libre'              => 'Miriam Libre',
	'Mirza'                     => 'Mirza',
	'Miss Fajardose'            => 'Miss Fajardose',
	'Mitr'                      => 'Mitr',
	'Modak'                     => 'Modak',
	'Modern Antiqua'            => 'Modern Antiqua',
	'Mogra'                     => 'Mogra',
	'Molengo'                   => 'Molengo',
	'Molle'                     => 'Molle',
	'Monda'                     => 'Monda',
	'Monofett'                  => 'Monofett',
	'Monoton'                   => 'Monoton',
	'Monsieur La Doulaise'      => 'Monsieur La Doulaise',
	'Montaga'                   => 'Montaga',
	'Montez'                    => 'Montez',
	'Montserrat'                => 'Montserrat',
	'Montserrat Alternates'     => 'Montserrat Alternates',
	'Montserrat Subrayada'      => 'Montserrat Subrayada',
	'Moul'                      => 'Moul',
	'Moulpali'                  => 'Moulpali',
	'Mountains of Christmas'    => 'Mountains of Christmas',
	'Mouse Memoirs'             => 'Mouse Memoirs',
	'Mr Bedfort'                => 'Mr Bedfort',
	'Mr Dafoe'                  => 'Mr Dafoe',
	'Mr De Haviland'            => 'Mr De Haviland',
	'Mrs Saint Delafield'       => 'Mrs Saint Delafield',
	'Mrs Sheppards'             => 'Mrs Sheppards',
	'Mukta Vaani'               => 'Mukta Vaani',
	'Muli'                      => 'Muli',
	'Mystery Quest'             => 'Mystery Quest',
	'NTR'                       => 'NTR',
	'Neucha'                    => 'Neucha',
	'Neuton'                    => 'Neuton',
	'New Rocker'                => 'New Rocker',
	'News Cycle'                => 'News Cycle',
	'Niconne'                   => 'Niconne',
	'Nixie One'                 => 'Nixie One',
	'Nobile'                    => 'Nobile',
	'Nokora'                    => 'Nokora',
	'Norican'                   => 'Norican',
	'Nosifer'                   => 'Nosifer',
	'Nothing You Could Do'      => 'Nothing You Could Do',
	'Noticia Text'              => 'Noticia Text',
	'Noto Sans'                 => 'Noto Sans',
	'Noto Serif'                => 'Noto Serif',
	'Nova Cut'                  => 'Nova Cut',
	'Nova Flat'                 => 'Nova Flat',
	'Nova Mono'                 => 'Nova Mono',
	'Nova Oval'                 => 'Nova Oval',
	'Nova Round'                => 'Nova Round',
	'Nova Script'               => 'Nova Script',
	'Nova Slim'                 => 'Nova Slim',
	'Nova Square'               => 'Nova Square',
	'Numans'                    => 'Numans',
	'Nunito'                    => 'Nunito',
	'Nunito Sans'               => 'Nunito Sans',
	'Odor Mean Chey'            => 'Odor Mean Chey',
	'Offside'                   => 'Offside',
	'Old Standard TT'           => 'Old Standard TT',
	'Oldenburg'                 => 'Oldenburg',
	'Oleo Script'               => 'Oleo Script',
	'Oleo Script Swash Caps'    => 'Oleo Script Swash Caps',
	'Open Sans'                 => 'Open Sans',
	'Open Sans Condensed'       => 'Open Sans Condensed',
	'Oranienbaum'               => 'Oranienbaum',
	'Orbitron'                  => 'Orbitron',
	'Oregano'                   => 'Oregano',
	'Orienta'                   => 'Orienta',
	'Original Surfer'           => 'Original Surfer',
	'Oswald'                    => 'Oswald',
	'Over the Rainbow'          => 'Over the Rainbow',
	'Overlock'                  => 'Overlock',
	'Overlock SC'               => 'Overlock SC',
	'Overpass'                  => 'Overpass',
	'Overpass Mono'             => 'Overpass Mono',
	'Ovo'                       => 'Ovo',
	'Oxygen'                    => 'Oxygen',
	'Oxygen Mono'               => 'Oxygen Mono',
	'PT Mono'                   => 'PT Mono',
	'PT Sans'                   => 'PT Sans',
	'PT Sans Caption'           => 'PT Sans Caption',
	'PT Sans Narrow'            => 'PT Sans Narrow',
	'PT Serif'                  => 'PT Serif',
	'PT Serif Caption'          => 'PT Serif Caption',
	'Pacifico'                  => 'Pacifico',
	'Padauk'                    => 'Padauk',
	'Palanquin'                 => 'Palanquin',
	'Palanquin Dark'            => 'Palanquin Dark',
	'Pangolin'                  => 'Pangolin',
	'Paprika'                   => 'Paprika',
	'Parisienne'                => 'Parisienne',
	'Passero One'               => 'Passero One',
	'Passion One'               => 'Passion One',
	'Pathway Gothic One'        => 'Pathway Gothic One',
	'Patrick Hand'              => 'Patrick Hand',
	'Patrick Hand SC'           => 'Patrick Hand SC',
	'Pattaya'                   => 'Pattaya',
	'Patua One'                 => 'Patua One',
	'Pavanam'                   => 'Pavanam',
	'Paytone One'               => 'Paytone One',
	'Peddana'                   => 'Peddana',
	'Peralta'                   => 'Peralta',
	'Permanent Marker'          => 'Permanent Marker',
	'Petit Formal Script'       => 'Petit Formal Script',
	'Petrona'                   => 'Petrona',
	'Philosopher'               => 'Philosopher',
	'Piedra'                    => 'Piedra',
	'Pinyon Script'             => 'Pinyon Script',
	'Pirata One'                => 'Pirata One',
	'Plaster'                   => 'Plaster',
	'Play'                      => 'Play',
	'Playball'                  => 'Playball',
	'Playfair Display'          => 'Playfair Display',
	'Playfair Display SC'       => 'Playfair Display SC',
	'Podkova'                   => 'Podkova',
	'Poiret One'                => 'Poiret One',
	'Poller One'                => 'Poller One',
	'Poly'                      => 'Poly',
	'Pompiere'                  => 'Pompiere',
	'Pontano Sans'              => 'Pontano Sans',
	'Poppins'                   => 'Poppins',
	'Port Lligat Sans'          => 'Port Lligat Sans',
	'Port Lligat Slab'          => 'Port Lligat Slab',
	'Pragati Narrow'            => 'Pragati Narrow',
	'Prata'                     => 'Prata',
	'Preahvihear'               => 'Preahvihear',
	'Press Start 2P'            => 'Press Start 2P',
	'Pridi'                     => 'Pridi',
	'Princess Sofia'            => 'Princess Sofia',
	'Prociono'                  => 'Prociono',
	'Prompt'                    => 'Prompt',
	'Prosto One'                => 'Prosto One',
	'Proza Libre'               => 'Proza Libre',
	'Puritan'                   => 'Puritan',
	'Purple Purse'              => 'Purple Purse',
	'Quando'                    => 'Quando',
	'Quantico'                  => 'Quantico',
	'Quattrocento'              => 'Quattrocento',
	'Quattrocento Sans'         => 'Quattrocento Sans',
	'Questrial'                 => 'Questrial',
	'Quicksand'                 => 'Quicksand',
	'Quintessential'            => 'Quintessential',
	'Qwigley'                   => 'Qwigley',
	'Racing Sans One'           => 'Racing Sans One',
	'Radley'                    => 'Radley',
	'Rajdhani'                  => 'Rajdhani',
	'Rakkas'                    => 'Rakkas',
	'Raleway'                   => 'Raleway',
	'Raleway Dots'              => 'Raleway Dots',
	'Ramabhadra'                => 'Ramabhadra',
	'Ramaraja'                  => 'Ramaraja',
	'Rambla'                    => 'Rambla',
	'Rammetto One'              => 'Rammetto One',
	'Ranchers'                  => 'Ranchers',
	'Rancho'                    => 'Rancho',
	'Ranga'                     => 'Ranga',
	'Rasa'                      => 'Rasa',
	'Rationale'                 => 'Rationale',
	'Ravi Prakash'              => 'Ravi Prakash',
	'Redressed'                 => 'Redressed',
	'Reem Kufi'                 => 'Reem Kufi',
	'Reenie Beanie'             => 'Reenie Beanie',
	'Revalia'                   => 'Revalia',
	'Rhodium Libre'             => 'Rhodium Libre',
	'Ribeye'                    => 'Ribeye',
	'Ribeye Marrow'             => 'Ribeye Marrow',
	'Righteous'                 => 'Righteous',
	'Risque'                    => 'Risque',
	'Roboto'                    => 'Roboto',
	'Roboto Condensed'          => 'Roboto Condensed',
	'Roboto Mono'               => 'Roboto Mono',
	'Roboto Slab'               => 'Roboto Slab',
	'Rochester'                 => 'Rochester',
	'Rock Salt'                 => 'Rock Salt',
	'Rokkitt'                   => 'Rokkitt',
	'Romanesco'                 => 'Romanesco',
	'Ropa Sans'                 => 'Ropa Sans',
	'Rosario'                   => 'Rosario',
	'Rosarivo'                  => 'Rosarivo',
	'Rouge Script'              => 'Rouge Script',
	'Rozha One'                 => 'Rozha One',
	'Rubik'                     => 'Rubik',
	'Rubik Mono One'            => 'Rubik Mono One',
	'Ruda'                      => 'Ruda',
	'Rufina'                    => 'Rufina',
	'Ruge Boogie'               => 'Ruge Boogie',
	'Ruluko'                    => 'Ruluko',
	'Rum Raisin'                => 'Rum Raisin',
	'Ruslan Display'            => 'Ruslan Display',
	'Russo One'                 => 'Russo One',
	'Ruthie'                    => 'Ruthie',
	'Rye'                       => 'Rye',
	'Sacramento'                => 'Sacramento',
	'Sahitya'                   => 'Sahitya',
	'Sail'                      => 'Sail',
	'Salsa'                     => 'Salsa',
	'Sanchez'                   => 'Sanchez',
	'Sancreek'                  => 'Sancreek',
	'Sansita'                   => 'Sansita',
	'Sarala'                    => 'Sarala',
	'Sarina'                    => 'Sarina',
	'Sarpanch'                  => 'Sarpanch',
	'Satisfy'                   => 'Satisfy',
	'Scada'                     => 'Scada',
	'Scheherazade'              => 'Scheherazade',
	'Schoolbell'                => 'Schoolbell',
	'Scope One'                 => 'Scope One',
	'Seaweed Script'            => 'Seaweed Script',
	'Secular One'               => 'Secular One',
	'Sevillana'                 => 'Sevillana',
	'Seymour One'               => 'Seymour One',
	'Shadows Into Light'        => 'Shadows Into Light',
	'Shadows Into Light Two'    => 'Shadows Into Light Two',
	'Shanti'                    => 'Shanti',
	'Share'                     => 'Share',
	'Share Tech'                => 'Share Tech',
	'Share Tech Mono'           => 'Share Tech Mono',
	'Shojumaru'                 => 'Shojumaru',
	'Short Stack'               => 'Short Stack',
	'Shrikhand'                 => 'Shrikhand',
	'Siemreap'                  => 'Siemreap',
	'Sigmar One'                => 'Sigmar One',
	'Signika'                   => 'Signika',
	'Signika Negative'          => 'Signika Negative',
	'Simonetta'                 => 'Simonetta',
	'Sintony'                   => 'Sintony',
	'Sirin Stencil'             => 'Sirin Stencil',
	'Six Caps'                  => 'Six Caps',
	'Skranji'                   => 'Skranji',
	'Slabo 13px'                => 'Slabo 13px',
	'Slabo 27px'                => 'Slabo 27px',
	'Slackey'                   => 'Slackey',
	'Smokum'                    => 'Smokum',
	'Smythe'                    => 'Smythe',
	'Sniglet'                   => 'Sniglet',
	'Snippet'                   => 'Snippet',
	'Snowburst One'             => 'Snowburst One',
	'Sofadi One'                => 'Sofadi One',
	'Sofia'                     => 'Sofia',
	'Sonsie One'                => 'Sonsie One',
	'Sorts Mill Goudy'          => 'Sorts Mill Goudy',
	'Source Code Pro'           => 'Source Code Pro',
	'Source Sans Pro'           => 'Source Sans Pro',
	'Source Serif Pro'          => 'Source Serif Pro',
	'Space Mono'                => 'Space Mono',
	'Special Elite'             => 'Special Elite',
	'Spicy Rice'                => 'Spicy Rice',
	'Spinnaker'                 => 'Spinnaker',
	'Spirax'                    => 'Spirax',
	'Squada One'                => 'Squada One',
	'Sree Krushnadevaraya'      => 'Sree Krushnadevaraya',
	'Sriracha'                  => 'Sriracha',
	'Stalemate'                 => 'Stalemate',
	'Stalinist One'             => 'Stalinist One',
	'Stardos Stencil'           => 'Stardos Stencil',
	'Stint Ultra Condensed'     => 'Stint Ultra Condensed',
	'Stint Ultra Expanded'      => 'Stint Ultra Expanded',
	'Stoke'                     => 'Stoke',
	'Strait'                    => 'Strait',
	'Sue Ellen Francisco'       => 'Sue Ellen Francisco',
	'Suez One'                  => 'Suez One',
	'Sumana'                    => 'Sumana',
	'Sunshiney'                 => 'Sunshiney',
	'Supermercado One'          => 'Supermercado One',
	'Sura'                      => 'Sura',
	'Suranna'                   => 'Suranna',
	'Suravaram'                 => 'Suravaram',
	'Suwannaphum'               => 'Suwannaphum',
	'Swanky and Moo Moo'        => 'Swanky and Moo Moo',
	'Syncopate'                 => 'Syncopate',
	'Tangerine'                 => 'Tangerine',
	'Taprom'                    => 'Taprom',
	'Tauri'                     => 'Tauri',
	'Taviraj'                   => 'Taviraj',
	'Teko'                      => 'Teko',
	'Telex'                     => 'Telex',
	'Tenali Ramakrishna'        => 'Tenali Ramakrishna',
	'Tenor Sans'                => 'Tenor Sans',
	'Text Me One'               => 'Text Me One',
	'The Girl Next Door'        => 'The Girl Next Door',
	'Tienne'                    => 'Tienne',
	'Tillana'                   => 'Tillana',
	'Timmana'                   => 'Timmana',
	'Tinos'                     => 'Tinos',
	'Titan One'                 => 'Titan One',
	'Titillium Web'             => 'Titillium Web',
	'Trade Winds'               => 'Trade Winds',
	'Trirong'                   => 'Trirong',
	'Trocchi'                   => 'Trocchi',
	'Trochut'                   => 'Trochut',
	'Trykker'                   => 'Trykker',
	'Tulpen One'                => 'Tulpen One',
	'Ubuntu'                    => 'Ubuntu',
	'Ubuntu Condensed'          => 'Ubuntu Condensed',
	'Ubuntu Mono'               => 'Ubuntu Mono',
	'Ultra'                     => 'Ultra',
	'Uncial Antiqua'            => 'Uncial Antiqua',
	'Underdog'                  => 'Underdog',
	'Unica One'                 => 'Unica One',
	'UnifrakturCook'            => 'UnifrakturCook',
	'UnifrakturMaguntia'        => 'UnifrakturMaguntia',
	'Unkempt'                   => 'Unkempt',
	'Unlock'                    => 'Unlock',
	'Unna'                      => 'Unna',
	'VT323'                     => 'VT323',
	'Vampiro One'               => 'Vampiro One',
	'Varela'                    => 'Varela',
	'Varela Round'              => 'Varela Round',
	'Vast Shadow'               => 'Vast Shadow',
	'Vesper Libre'              => 'Vesper Libre',
	'Vibur'                     => 'Vibur',
	'Vidaloka'                  => 'Vidaloka',
	'Viga'                      => 'Viga',
	'Voces'                     => 'Voces',
	'Volkhov'                   => 'Volkhov',
	'Vollkorn'                  => 'Vollkorn',
	'Voltaire'                  => 'Voltaire',
	'Waiting for the Sunrise'   => 'Waiting for the Sunrise',
	'Wallpoet'                  => 'Wallpoet',
	'Walter Turncoat'           => 'Walter Turncoat',
	'Warnes'                    => 'Warnes',
	'Wellfleet'                 => 'Wellfleet',
	'Wendy One'                 => 'Wendy One',
	'Wire One'                  => 'Wire One',
	'Work Sans'                 => 'Work Sans',
	'Yanone Kaffeesatz'         => 'Yanone Kaffeesatz',
	'Yantramanav'               => 'Yantramanav',
	'Yatra One'                 => 'Yatra One',
	'Yellowtail'                => 'Yellowtail',
	'Yeseva One'                => 'Yeseva One',
	'Yesteryear'                => 'Yesteryear',
	'Yrsa'                      => 'Yrsa',
	'Zeyada'                    => 'Zeyada',
);
