<?php
/**
 * Contains all the fucntions and components related to header part.
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */
/* * ************************************************************************************* */

if ( ! function_exists( 'colormag_social_links' ) ) :

	/**
	 * This function is for social links display on header
	 *
	 * Get links through Theme Options
	 */
	function colormag_social_links() {
		// Bail out if social links is not activated
		if ( get_theme_mod( 'colormag_social_link_activate', 0 ) == 0 ) {
			return;
		}

		$colormag_social_links = array(
			'colormag_social_facebook'    => 'Facebook',
			'colormag_social_twitter'     => 'Twitter',
			'colormag_social_googleplus'  => 'Google-Plus',
			'colormag_social_instagram'   => 'Instagram',
			'colormag_social_pinterest'   => 'Pinterest',
			'colormag_social_youtube'     => 'YouTube',
			'colormag_social_vimeo'       => 'Vimeo-Square',
			'colormag_social_linkedin'    => 'LinkedIn',
			'colormag_social_delicious'   => 'Delicious',
			'colormag_social_flickr'      => 'Flickr',
			'colormag_social_skype'       => 'Skype',
			'colormag_social_soundcloud'  => 'SoundCloud',
			'colormag_social_vine'        => 'Vine',
			'colormag_social_stumbleupon' => 'StumbleUpon',
			'colormag_social_tumblr'      => 'Tumblr',
			'colormag_social_reddit'      => 'Reddit',
			'colormag_social_xing'        => 'Xing',
			'colormag_social_vk'          => 'VK',
		);
		?>

		<?php
		$colormag_additional_social_link = array(
			'user_custom_social_links_one'   => __( 'Additional Social Link One', 'colormag' ),
			'user_custom_social_links_two'   => __( 'Additional Social Link Two', 'colormag' ),
			'user_custom_social_links_three' => __( 'Additional Social Link Three', 'colormag' ),
			'user_custom_social_links_four'  => __( 'Additional Social Link Four', 'colormag' ),
			'user_custom_social_links_five'  => __( 'Additional Social Link Five', 'colormag' ),
			'user_custom_social_links_six'   => __( 'Additional Social Link Six', 'colormag' ),
		);
		?>

		<div class="social-links clearfix">
			<ul>
				<?php
				$i                     = 0;
				$colormag_links_output = '';
				foreach ( $colormag_social_links as $key => $value ) {
					$link = get_theme_mod( $key, '' );
					if ( ! empty( $link ) ) {
						if ( get_theme_mod( $key . '_checkbox', 0 ) == 1 ) {
							$new_tab = 'target="_blank"';
						} else {
							$new_tab = '';
						}
						$colormag_links_output .= '<li><a href="' . esc_url( $link ) . '" ' . $new_tab . '><i class="fa fa-' . strtolower( $value ) . '"></i></a></li>';
					}
					$i ++;
				}
				echo $colormag_links_output;
				?>

				<?php
				$i                                = 0;
				$colormag_additional_links_output = '';
				foreach ( $colormag_additional_social_link as $key => $value ) {
					$link  = get_theme_mod( $key, '' );
					$color = get_theme_mod( $key . '_color' );
					if ( ! empty( $link ) ) {
						if ( get_theme_mod( $key . '_checkbox', 0 ) == 1 ) {
							$new_tab = 'target="_blank"';
						} else {
							$new_tab = '';
						}
						if ( ! empty( $color ) ) {
							$color_code = ' style="color:' . $color . '"';
						} else {
							$color_code = '';
						}
						$colormag_additional_links_output .= '<li><a href="' . esc_url( $link ) . '" ' . $new_tab . '><i class="fa fa-' . strtolower( get_theme_mod( $key . '_fontawesome' ) ) . '"' . $color_code . '></i></a></li>';
					}
					$i ++;
				}
				echo $colormag_additional_links_output;
				?>
			</ul>
		</div><!-- .social-links -->
		<?php
	}

endif;

/* * ************************************************************************************* */

// Filter the get_header_image_tag() for option of adding the link back to home page option
function colormag_header_image_markup( $html, $header, $attr ) {
	$output       = '';
	$header_image = get_header_image();

	if ( ! empty( $header_image ) ) {
		$output .= '<div class="header-image-wrap">';

		if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 1 ) {
			$output .= '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">';
		}

		if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 0 && get_theme_mod( 'colormag_header_image_custom_link', '' ) != '' ) {
			$output .= '<a href="' . esc_url( get_theme_mod( 'colormag_header_image_custom_link', '' ) ) . '">';
		}

		$output .= '<img src="' . esc_url( $header_image ) . '" class="header-image" width="' . get_custom_header()->width . '" height="' . get_custom_header()->height . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">';

		if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 1 || get_theme_mod( 'colormag_header_image_custom_link', '' ) != '' ) {
			$output .= '</a>';
		}

		$output .= '</div>';
	}

	return $output;
}

function colormag_header_image_markup_filter() {
	add_filter( 'get_header_image_tag', 'colormag_header_image_markup', 10, 3 );
}

add_action( 'colormag_header_image_markup_render', 'colormag_header_image_markup_filter' );

/* * ************************************************************************************* */

if ( ! function_exists( 'colormag_render_header_image' ) ) :

	/**
	 * Shows the small info text on top header part
	 */
	function colormag_render_header_image() {
		if ( function_exists( 'the_custom_header_markup' ) ) {
			do_action( 'colormag_header_image_markup_render' );
			the_custom_header_markup();
		} else {
			$header_image = get_header_image();
			if ( ! empty( $header_image ) ) {
				if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 1 ) {
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php } ?>
				<div class="header-image-wrap">
					<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</div>
				<?php if ( get_theme_mod( 'colormag_header_image_link', 0 ) == 1 ) { ?>
					</a>
					<?php
				}
			}
		}
	}

endif;

if ( ! function_exists( 'colormag_top_header_bar_display' ) ) :

	/**
	 * Function to display the top header bar
	 *
	 * @since ColorMag 2.2.1
	 */
	function colormag_top_header_bar_display() {
		if ( ( ( get_theme_mod( 'colormag_breaking_news', 0 ) == 1 ) && ( get_theme_mod( 'colormag_breaking_news_position_options', 'header' ) == 'header' ) || ( get_theme_mod( 'colormag_date_display', 0 ) == 1 ) || get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) ) :
			?>
			<div class="news-bar">
				<div class="inner-wrap clearfix">
					<?php
					if ( get_theme_mod( 'colormag_date_display', 0 ) == 1 ) {
						colormag_date_display();
					}
					?>

					<?php
					if ( ( get_theme_mod( 'colormag_breaking_news', 0 ) == 1 ) && ( get_theme_mod( 'colormag_breaking_news_position_options', 'header' ) == 'header' ) ) {
						colormag_breaking_news();
					}
					?>

					<?php
					if ( ( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) && ( ( get_theme_mod( 'colormag_social_link_location_option', 'both' ) == 'both' ) || ( get_theme_mod( 'colormag_social_link_location_option', 'both' ) == 'header' ) ) ) {
						colormag_social_links();
					}
					?>
				</div>
			</div>
		<?php
		endif;
	}

endif;

if ( ! function_exists( 'colormag_middle_header_bar_display' ) ) :

	/**
	 * Function to display the middle header bar
	 *
	 * @since ColorMag 2.2.1
	 */
	function colormag_middle_header_bar_display() {
		?>

		<div class="inner-wrap">

			<div id="header-text-nav-wrap" class="clearfix">
				<div id="header-left-section">
					<?php
					if ( ( get_theme_mod( 'colormag_header_logo_placement', 'header_text_only' ) == 'show_both' || get_theme_mod( 'colormag_header_logo_placement', 'header_text_only' ) == 'header_logo_only' ) ) {
						?>
						<div id="header-logo-image">
							<?php if ( get_theme_mod( 'colormag_logo', '' ) != '' ) { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'colormag_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
							<?php } ?>

							<?php
							if ( function_exists( 'the_custom_logo' ) && has_custom_logo( $blog_id = 0 ) ) {
								colormag_the_custom_logo();
							}
							?>
						</div><!-- #header-logo-image -->
						<?php
					}
					// seo better handling
					$screen_reader = '';
					if ( get_theme_mod( 'colormag_header_logo_placement', 'header_text_only' ) == 'header_logo_only' || ( get_theme_mod( 'colormag_header_logo_placement', 'header_text_only' ) == 'disable' ) ) {
						$screen_reader = 'screen-reader-text';
					}
					?>
					<div id="header-text" class="<?php echo $screen_reader; ?>">
						<?php if ( is_front_page() || is_home() ) : ?>
							<h1 id="site-title"<?php echo colormag_schema_markup( 'site-title' ); ?>>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h1>
						<?php else : ?>
							<h3 id="site-title"<?php echo colormag_schema_markup( 'site-title' ); ?>>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h3>
						<?php endif; ?>

						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
						?>
						<p id="site-description"<?php echo colormag_schema_markup( 'site-description' ); ?>><?php echo $description; ?></p>
						<?php endif; ?><!-- #site-description -->
					</div><!-- #header-text -->
				</div><!-- #header-left-section -->
				<div id="header-right-section">
					<?php
					if ( is_active_sidebar( 'colormag_header_sidebar' ) ) {
						?>
						<div id="header-right-sidebar" class="clearfix">
							<?php
							// Calling the header sidebar if it exists.
							if ( ! dynamic_sidebar( 'colormag_header_sidebar' ) ):
							endif;
							?>
						</div>
						<?php
					}
					?>
				</div><!-- #header-right-section -->

			</div><!-- #header-text-nav-wrap -->

		</div><!-- .inner-wrap -->

		<?php
	}

endif;

if ( ! function_exists( 'colormag_below_header_bar_display' ) ) :

	/**
	 * Function to display the middle header bar
	 *
	 * @since ColorMag 2.2.1
	 */
	function colormag_below_header_bar_display() {
		?>

		<?php if ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'primary' ) ) : ?>
			<div class="mega-menu-integrate">
				<div class="inner-wrap clearfix">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			</div>
		<?php else: ?>
			<nav id="site-navigation" class="main-navigation clearfix"<?php echo colormag_schema_markup( 'nav' ); ?>>
				<div class="inner-wrap clearfix">
					<?php
					if ( get_theme_mod( 'colormag_home_icon_display', 0 ) == 1 ) {
						if ( is_front_page() ) {
							$home_icon_class = 'home-icon front_page_on';
						} else {
							$home_icon_class = 'home-icon';
						}
						?>
						<div class="<?php echo $home_icon_class; ?>">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><i class="fa fa-home"></i></a>
						</div>
						<?php
					}
					?>
					<h4 class="menu-toggle"></h4>
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array(
							'theme_location'  => 'primary',
							'container_class' => 'menu-primary-container',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						) );
					} else {
						wp_page_menu();
					}
					?>
					<?php if ( get_theme_mod( 'colormag_random_post_in_menu', 0 ) == 1 ) { ?>
						<?php colormag_random_post(); ?>
					<?php } ?>
					<?php if ( get_theme_mod( 'colormag_search_icon_in_menu', 0 ) == 1 ) { ?>
						<i class="fa fa-search search-top"></i>
						<div class="search-form-top">
							<?php get_search_form(); ?>
						</div>
					<?php } ?>
				</div>
			</nav>
		<?php endif; ?>

		<?php
	}

endif;

if ( ! function_exists( 'colormag_breadcrumb' ) ) :

	/**
	 * Display the breadcrumbs provided via Yoast or BreadCrumb NavXT plugin
	 */
	function colormag_breadcrumb() {

		// Bail out if breadcrumb is not enabled
		if ( get_theme_mod( 'colormag_breadcrumb_display', 0 ) == 0 ) {
			return;
		}
		?>

		<?php
		if ( function_exists( 'bcn_display' ) ) {
			?>

			<div id="breadcrumbs" class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php
				esc_html_e( 'You are here:', 'colormag' );

				bcn_display();
				?>
			</div>

			<?php
		} else if ( function_exists( 'yoast_breadcrumb' ) ) {
			$yoast_breadcrumb_option = get_option( 'wpseo_internallinks' );

			// check if yoast breadcrumb is enabled
			if ( $yoast_breadcrumb_option['breadcrumbs-enable'] === true ) {
				?>
				<div id="breadcrumbs" class="breadcrumbs">
					<?php
					esc_html_e( 'You are here:', 'colormag' );

					yoast_breadcrumb();
					?>
				</div>

				<?php
			}
		}

	}

endif;
