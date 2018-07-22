<?php
/**
 * ColorMag functions and definitions
 *
 * This file contains all the functions and it's defination that particularly can't be
 * in other files.
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */
/* * ************************************************************************************* */
add_action( 'wp_enqueue_scripts', 'colormag_scripts_styles_method' );

/**
 * Register jquery scripts
 */
function colormag_scripts_styles_method() {

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	/**
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'colormag_style', get_stylesheet_uri() );

	/**
	 * Load the dark color skin via theme options
	 */
	if ( get_theme_mod( 'colormag_color_skin_setting', 'white' ) == 'dark' ) {
		wp_enqueue_style( 'colormag_dark_style', get_template_directory_uri() . '/dark.css' );
	}

	// Google Font Options
	$colormag_googlefonts = array();
	array_push( $colormag_googlefonts, get_theme_mod( 'colormag_site_title_font', 'Open+Sans:400,600' ) );
	array_push( $colormag_googlefonts, get_theme_mod( 'colormag_site_tagline_font', 'Open+Sans:400,600' ) );
	array_push( $colormag_googlefonts, get_theme_mod( 'colormag_primary_menu_font', 'Open+Sans:400,600' ) );
	array_push( $colormag_googlefonts, get_theme_mod( 'colormag_all_titles_font', 'Open+Sans:400,600' ) );
	array_push( $colormag_googlefonts, get_theme_mod( 'colormag_content_font', 'Open+Sans:400,600' ) );

	$colormag_googlefonts = array_unique( $colormag_googlefonts );
	$colormag_googlefonts = implode( "|", $colormag_googlefonts );

	wp_register_style( 'colormag_googlefonts', '//fonts.googleapis.com/css?family=' . $colormag_googlefonts );
	wp_enqueue_style( 'colormag_googlefonts' );

	/**
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// BxSlider JS
	wp_register_script( 'colormag-bxslider', COLORMAG_JS_URL . '/jquery.bxslider' . $suffix . '.js', array( 'jquery' ), '4.2.10', true );

	// Sticky Menu
	if ( get_theme_mod( 'colormag_primary_sticky_menu', 0 ) == 1 ) {
		// Sticky JS enqueue
		if ( get_theme_mod( 'colormag_primary_sticky_menu_type', 'sticky' ) == 'sticky' ) {
			wp_enqueue_script( 'colormag-sticky-menu', COLORMAG_JS_URL . '/sticky/jquery.sticky' . $suffix . '.js', array( 'jquery' ), '20150309', true );
		} elseif ( get_theme_mod( 'colormag_primary_sticky_menu_type', 'sticky' ) == 'reveal_on_scroll' ) {
			// Headroomjs enqueue
			wp_enqueue_script( 'Headroom', COLORMAG_JS_URL . '/headroom/Headroom' . $suffix . '.js', array(), false, true );
			wp_enqueue_script( 'jQuery-headroom', COLORMAG_JS_URL . '/headroom/jQuery.headroom' . $suffix . '.js', array( 'jquery' ), false, true );
		}
	}

	// News Ticker
	wp_register_script( 'colormag-news-ticker', COLORMAG_JS_URL . '/news-ticker/jquery.newsTicker' . $suffix . '.js', array( 'jquery' ), '1.0.0', true );
	if ( get_theme_mod( 'colormag_breaking_news', 0 ) == 1 ) {
		wp_enqueue_script( 'colormag-news-ticker' );
	}

	// MagnificPopup JS
	wp_register_script( 'colormag-featured-image-popup', COLORMAG_JS_URL . '/magnific-popup/jquery.magnific-popup' . $suffix . '.js', array( 'jquery' ), '1.1.0', true );

	// MagnificPopup CSS
	wp_register_style( 'colormag-featured-image-popup-css', COLORMAG_JS_URL . '/magnific-popup/magnific-popup' . $suffix . '.css', array(), '20150310' );

	if ( ( get_theme_mod( 'colormag_featured_image_popup', 0 ) == 1 ) && ( is_single() || is_page() ) ) {
		wp_enqueue_script( 'colormag-featured-image-popup' );
		wp_enqueue_style( 'colormag-featured-image-popup-css' );
	}

	// EasyTabs JS
	wp_register_script( 'colormag-easy-tabs', COLORMAG_JS_URL . '/easytabs/jquery.easytabs' . $suffix . '.js', array( 'jquery' ), '20150409', true );

	// Navigation JS
	wp_enqueue_script( 'colormag-navigation', COLORMAG_JS_URL . '/navigation' . $suffix . '.js', array( 'jquery' ), false, true );

	// FontAwesome CSS
	wp_enqueue_style( 'colormag-fontawesome', get_template_directory_uri() . '/fontawesome/css/font-awesome' . $suffix . '.css', array(), '4.7.0' );

	// Weather Icons
	wp_register_style( 'owfont', get_template_directory_uri() . '/css/owfont-regular' . $suffix . '.css', array(), '1.0.0' );

	// FitVids JS
	wp_enqueue_script( 'colormag-fitvids', COLORMAG_JS_URL . '/fitvids/jquery.fitvids' . $suffix . '.js', array( 'jquery' ), '1.2.0', true );

	// Sharing Buttons JS
	if ( get_theme_mod( 'colormag_social_share', 0 ) == 1 ) {
		wp_enqueue_script( 'colormag-social-share', COLORMAG_JS_URL . '/sharrre/jquery.sharrre' . $suffix . '.js', array( 'jquery' ), '20150304', true );
	}

	wp_register_script( 'jquery-video', COLORMAG_JS_URL . '/jquery.video' . $suffix . '.js', array( 'jquery' ), '20150409' );

	// HTML5Shiv for Lower IE versions
	wp_enqueue_script( 'html5', COLORMAG_JS_URL . '/html5shiv' . $suffix . '.js', true );
	wp_script_add_data( 'html5', 'conditional', 'lte IE 8' );

	// Theia Sticky Sidebar enqueue
	if ( get_theme_mod( 'colormag_sticky_content_sidebar', 0 ) == 1 ) {
		wp_enqueue_script( 'theia-sticky-sidebar', COLORMAG_JS_URL . '/theia-sticky-sidebar/theia-sticky-sidebar' . $suffix . '.js', array( 'jquery' ), '1.7.0', true );
		wp_enqueue_script( 'ResizeSensor', COLORMAG_JS_URL . '/theia-sticky-sidebar/ResizeSensor' . $suffix . '.js', array( 'jquery' ), false, true );
	}

	// prognroll JS enqueue
	if ( ( get_theme_mod( 'colormag_prognroll_indicator', 0 ) == 1 ) && is_single() ) {
		wp_enqueue_script( 'prognroll', COLORMAG_JS_URL . '/prognroll/prognroll' . $suffix . '.js', array( 'jquery' ), false, true );
	}

	// Enqueue the Google Maps API key if it exits
	$google_maps_api_key = get_theme_mod( 'colormag_googlemap_api_key' );
	if ( $google_maps_api_key ) {
		wp_enqueue_script( 'GoogleMaps', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ), array(), false, true );
	}

	// Reading time JS enqueue
	if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
		wp_enqueue_script( 'readingtime', COLORMAG_JS_URL . '/readingtime/readingtime.js', array( 'jquery' ),false,true );
	}

	// Custom JS
	wp_enqueue_script( 'colormag-custom', COLORMAG_JS_URL . '/colormag-custom' . $suffix . '.js', array( 'jquery' ), false, true );

	// Enqueue bxslider if post has gallery post format
	if ( has_post_format( 'gallery' ) || is_home() || is_search() || is_archive() ) {
		wp_enqueue_script( 'colormag-bxslider' );
	}
}

add_action( 'admin_enqueue_scripts', 'colormag_image_uploader' );

function colormag_image_uploader() {
	wp_enqueue_media();
	wp_enqueue_script( 'colormag-widget-image-upload', COLORMAG_JS_URL . '/image-uploader.js', false, '20150309', true );
}

/* * ************************************************************************************* */

add_filter( 'excerpt_length', 'colormag_excerpt_length' );

/**
 * Sets the post excerpt length to 40 words.
 *
 * function tied to the excerpt_length filter hook.
 *
 * @uses filter excerpt_length
 */
function colormag_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_more', 'colormag_continue_reading' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function colormag_continue_reading() {
	return '';
}

/* * ************************************************************************************* */

/**
 * Removing the default style of wordpress gallery
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Filtering the size to be full from thumbnail to be used in WordPress gallery as a default size
 */
function colormag_gallery_atts( $out, $pairs, $atts ) {
	$atts = shortcode_atts( array(
		'size' => 'colormag-featured-image',
	), $atts );

	$out['size'] = $atts['size'];

	return $out;
}

add_filter( 'shortcode_atts_gallery', 'colormag_gallery_atts', 10, 3 );

/* * ************************************************************************************* */

add_filter( 'body_class', 'colormag_body_class' );

/**
 * Filter the body_class
 *
 * Throwing different body class for the different layouts in the body tag
 */
function colormag_body_class( $classes ) {
	global $post;

	if ( $post ) {
		$layout_meta = get_post_meta( $post->ID, 'colormag_page_layout', true );
	}

	if ( is_home() ) {
		$queried_id  = get_option( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, 'colormag_page_layout', true );
	}
	if ( empty( $layout_meta ) || is_archive() || is_search() ) {
		$layout_meta = 'default_layout';
	}
	$colormag_default_layout = get_theme_mod( 'colormag_default_layout', 'right_sidebar' );

	$colormag_default_page_layout = get_theme_mod( 'colormag_default_page_layout', 'right_sidebar' );
	$colormag_default_post_layout = get_theme_mod( 'colormag_default_single_posts_layout', 'right_sidebar' );

	$woocommerce_widgets_enabled = get_theme_mod( 'colormag_woocommerce_sidebar_register_setting', 0 );

	// Proceed only if WooCommerce extra widget option is not enabled as well as
	// Proceed only if WooCommerce is enabled and not in WooCommerce pages.
	if ( ( $woocommerce_widgets_enabled == 0 ) || ( ( $woocommerce_widgets_enabled == 1 ) && ( function_exists( 'is_woocommerce' ) && ( ! is_woocommerce() ) ) ) ) :
		if ( $layout_meta == 'default_layout' ) {
			if ( is_page() ) {
				if ( $colormag_default_page_layout == 'right_sidebar' ) {
					$classes[] = '';
				} elseif ( $colormag_default_page_layout == 'left_sidebar' ) {
					$classes[] = 'left-sidebar';
				} elseif ( $colormag_default_page_layout == 'no_sidebar_full_width' ) {
					$classes[] = 'no-sidebar-full-width';
				} elseif ( $colormag_default_page_layout == 'no_sidebar_content_centered' ) {
					$classes[] = 'no-sidebar';
				}
			} elseif ( is_single() ) {
				if ( $colormag_default_post_layout == 'right_sidebar' ) {
					$classes[] = '';
				} elseif ( $colormag_default_post_layout == 'left_sidebar' ) {
					$classes[] = 'left-sidebar';
				} elseif ( $colormag_default_post_layout == 'no_sidebar_full_width' ) {
					$classes[] = 'no-sidebar-full-width';
				} elseif ( $colormag_default_post_layout == 'no_sidebar_content_centered' ) {
					$classes[] = 'no-sidebar';
				}
			} elseif ( $colormag_default_layout == 'right_sidebar' ) {
				$classes[] = '';
			} elseif ( $colormag_default_layout == 'left_sidebar' ) {
				$classes[] = 'left-sidebar';
			} elseif ( $colormag_default_layout == 'no_sidebar_full_width' ) {
				$classes[] = 'no-sidebar-full-width';
			} elseif ( $colormag_default_layout == 'no_sidebar_content_centered' ) {
				$classes[] = 'no-sidebar';
			}
		} elseif ( $layout_meta == 'right_sidebar' ) {
			$classes[] = '';
		} elseif ( $layout_meta == 'left_sidebar' ) {
			$classes[] = 'left-sidebar';
		} elseif ( $layout_meta == 'no_sidebar_full_width' ) {
			$classes[] = 'no-sidebar-full-width';
		} elseif ( $layout_meta == 'no_sidebar_content_centered' ) {
			$classes[] = 'no-sidebar';
		}
	endif;

	if ( get_theme_mod( 'colormag_site_layout', 'wide_layout' ) == 'wide_layout' ) {
		$classes[] = 'wide';
	} elseif ( get_theme_mod( 'colormag_site_layout', 'wide_layout' ) == 'boxed_layout' ) {
		$classes[] = '';
	}

	// Add body class for header display type
	if ( get_theme_mod( 'colormag_header_display_type', 'type_one' ) == 'type_two' ) {
		$classes[] = 'header_display_type_one';
	}
	if ( get_theme_mod( 'colormag_header_display_type', 'type_one' ) == 'type_three' ) {
		$classes[] = 'header_display_type_two';
	}

	// Add body class for body skin type
	if ( get_theme_mod( 'colormag_color_skin_setting', 'white' ) == 'dark' ) {
		$classes[] = 'dark-skin';
	}

	// For background image clickable.
	$background_image_url_link = get_theme_mod( 'colormag_background_image_link' );
	if ( $background_image_url_link ) {
		$classes[] = 'clickable-background-image';
	}

	return $classes;
}

/* * ************************************************************************************* */

if ( ! function_exists( 'colormag_sidebar_select' ) ) :

	/**
	 * Function to select the sidebar
	 */
	function colormag_sidebar_select() {
		global $post;

		if ( $post ) {
			$layout_meta = get_post_meta( $post->ID, 'colormag_page_layout', true );
		}

		if ( is_home() ) {
			$queried_id  = get_option( 'page_for_posts' );
			$layout_meta = get_post_meta( $queried_id, 'colormag_page_layout', true );
		}

		if ( empty( $layout_meta ) || is_archive() || is_search() ) {
			$layout_meta = 'default_layout';
		}
		$colormag_default_layout = get_theme_mod( 'colormag_default_layout', 'right_sidebar' );

		$colormag_default_page_layout = get_theme_mod( 'colormag_default_page_layout', 'right_sidebar' );
		$colormag_default_post_layout = get_theme_mod( 'colormag_default_single_posts_layout', 'right_sidebar' );

		if ( $layout_meta == 'default_layout' ) {
			if ( is_page() ) {
				if ( $colormag_default_page_layout == 'right_sidebar' ) {
					get_sidebar();
				} elseif ( $colormag_default_page_layout == 'left_sidebar' ) {
					get_sidebar( 'left' );
				}
			}
			if ( is_single() ) {
				if ( $colormag_default_post_layout == 'right_sidebar' ) {
					get_sidebar();
				} elseif ( $colormag_default_post_layout == 'left_sidebar' ) {
					get_sidebar( 'left' );
				}
			} elseif ( $colormag_default_layout == 'right_sidebar' ) {
				get_sidebar();
			} elseif ( $colormag_default_layout == 'left_sidebar' ) {
				get_sidebar( 'left' );
			}
		} elseif ( $layout_meta == 'right_sidebar' ) {
			get_sidebar();
		} elseif ( $layout_meta == 'left_sidebar' ) {
			get_sidebar( 'left' );
		}
	}

endif;

/* * ************************************************************************************* */

if ( ! function_exists( 'colormag_entry_meta' ) ) :

	/**
	 * Shows meta information of post.
	 */
	function colormag_entry_meta() {
		if ( 'post' == get_post_type() ) :
			echo '<div class="below-entry-meta">';
			?>

			<?php
			$time_string = '<time class="entry-date published" datetime="%1$s"' . colormag_schema_markup( 'entry_time' ) . '>%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string .= '<time class="updated" datetime="%3$s"' . colormag_schema_markup( 'entry_time_modified' ) . '>%4$s</time>';
			}
			$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() )
			);
			printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
			);
			?>

			<span class="byline"<?php echo colormag_schema_markup( 'author' ); ?>><span class="author vcard" itemprop="name"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span>

			<?php
			if ( get_theme_mod( 'colormag_post_view_entry_meta_remove', 0 ) == 0 ) {
				echo colormag_post_view_display( get_the_ID() );
			}
			?>

			<?php if ( ! post_password_required() && comments_open() ) { ?>
			<span class="comments"><?php comments_popup_link( __( '<i class="fa fa-comment"></i> 0 Comments', 'colormag' ), __( '<i class="fa fa-comment"></i> 1 Comment', 'colormag' ), __( '<i class="fa fa-comments"></i> % Comments', 'colormag' ) ); ?></span>
			<?php
		}
			$tags_list = get_the_tag_list( '<span class="tag-links"' . colormag_schema_markup( 'tag' ) . '><i class="fa fa-tags"></i>', __( ', ', 'colormag' ), '</span>' );
			if ( $tags_list ) {
				echo $tags_list;
			}

			// Display the post reading time.
			if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
				<span class="reading-time">
					<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
				</span>
			<?php }

			// edit button remove option add
			if ( get_theme_mod( 'colormag_edit_button_entry_meta_remove', 0 ) == 0 ) {
				edit_post_link( __( 'Edit', 'colormag' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' );
			}

			echo '</div>';
		endif;
	}

endif;

/* * ********************************	************************************************** */

add_action( 'admin_head', 'colormag_favicon' );
add_action( 'wp_head', 'colormag_favicon' );

/**
 * Favicon for the site
 */
function colormag_favicon() {
	if ( get_theme_mod( 'colormag_favicon_show', '0' ) == '1' ) {
		$colormag_favicon        = get_theme_mod( 'colormag_favicon_upload', '' );
		$colormag_favicon_output = '';
		if ( ! function_exists( 'has_site_icon' ) || ( ! empty( $colormag_favicon ) && ! has_site_icon() ) ) {
			$colormag_favicon_output .= '<link rel="shortcut icon" href="' . esc_url( $colormag_favicon ) . '" type="image/x-icon" />';
		}
		echo $colormag_favicon_output;
	}
}

/* * ************************************************************************************* */

add_action( 'wp_head', 'colormag_custom_css', 100 );

/**
 * Hooks the Custom Internal CSS to head section
 */
function colormag_custom_css() {
	$colormag_internal_css = '';
	$primary_color         = get_theme_mod( 'colormag_primary_color', '#289dcc' );
	if ( $primary_color != '#289dcc' ) {
		$colormag_internal_css .= ' .colormag-button,blockquote,button,input[type=reset],input[type=button],
		input[type=submit]{background-color:' . $primary_color . '}
		a,#masthead .main-small-navigation li:hover > .sub-toggle i,
		#masthead .main-small-navigation li.current-page-ancestor > .sub-toggle i,
		#masthead .main-small-navigation li.current-menu-ancestor > .sub-toggle i,
		#masthead .main-small-navigation li.current-page-item > .sub-toggle i,
		#masthead .main-small-navigation li.current-menu-item > .sub-toggle i,
		#masthead.colormag-header-classic #site-navigation .fa.search-top:hover,
		#masthead.colormag-header-classic #site-navigation.main-small-navigation .random-post a:hover .fa-random,
		#masthead.colormag-header-classic #site-navigation.main-navigation .random-post a:hover .fa-random,
		#masthead.colormag-header-classic .breaking-news .newsticker a:hover{color:' . $primary_color . '}
		#site-navigation{border-top:4px solid ' . $primary_color . '}
		.home-icon.front_page_on,.main-navigation a:hover,.main-navigation ul li ul li a:hover,
		.main-navigation ul li ul li:hover>a,
		.main-navigation ul li.current-menu-ancestor>a,
		.main-navigation ul li.current-menu-item ul li a:hover,
		.main-navigation ul li.current-menu-item>a,
		.main-navigation ul li.current_page_ancestor>a,.main-navigation ul li.current_page_item>a,
		.main-navigation ul li:hover>a,.main-small-navigation li a:hover,.site-header .menu-toggle:hover,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li:hover > a,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.current-menu-ancestor > a,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.current-menu-item > a,
		#masthead.colormag-header-clean #site-navigation .menu-toggle:hover,
		#masthead.colormag-header-clean #site-navigation.main-small-navigation .menu-toggle,
		#masthead.colormag-header-classic #site-navigation.main-small-navigation .menu-toggle,
		#masthead .main-small-navigation li:hover > a, #masthead .main-small-navigation li.current-page-ancestor > a,
		#masthead .main-small-navigation li.current-menu-ancestor > a, #masthead .main-small-navigation li.current-page-item > a,
		#masthead .main-small-navigation li.current-menu-item > a,
		#masthead.colormag-header-classic #site-navigation .menu-toggle:hover,
		.main-navigation ul li.focus > a,
        #masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.focus > a { background-color:' . $primary_color . '}
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li:hover,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.current-menu-ancestor,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.current-menu-item,
		#masthead.colormag-header-classic #site-navigation .menu-toggle:hover,
		#masthead.colormag-header-classic #site-navigation.main-small-navigation .menu-toggle,

		#masthead.colormag-header-classic .main-navigation ul > li:hover > a,
        #masthead.colormag-header-classic .main-navigation ul > li.current-menu-item > a,
        #masthead.colormag-header-classic .main-navigation ul > li.current-menu-ancestor > a,
        #masthead.colormag-header-classic .main-navigation ul li.focus > a { border-color:' . $primary_color . '}
		.main-small-navigation .current-menu-item>a,.main-small-navigation .current_page_item>a,
		#masthead.colormag-header-clean .main-small-navigation li:hover > a,
		#masthead.colormag-header-clean .main-small-navigation li.current-page-ancestor > a,
		#masthead.colormag-header-clean .main-small-navigation li.current-menu-ancestor > a,
		#masthead.colormag-header-clean .main-small-navigation li.current-page-item > a,
		#masthead.colormag-header-clean .main-small-navigation li.current-menu-item > a { background:' . $primary_color . '}
		#main .breaking-news-latest,.fa.search-top:hover{background-color:' . $primary_color . '}
		.byline a:hover,.comments a:hover,.edit-link a:hover,.posted-on a:hover,
		.social-links i.fa:hover,.tag-links a:hover,
		#masthead.colormag-header-clean .social-links li:hover i.fa,
		#masthead.colormag-header-classic .social-links li:hover i.fa,
		#masthead.colormag-header-clean .breaking-news .newsticker a:hover{color:' . $primary_color . '}
		.widget_featured_posts .article-content .above-entry-meta .cat-links a,
		.widget_call_to_action .btn--primary,.colormag-footer--classic .footer-widgets-area .widget-title span::before,
		.colormag-footer--classic-bordered .footer-widgets-area .widget-title span::before{background-color:' . $primary_color . '}
		.widget_featured_posts .article-content .entry-title a:hover{color:' . $primary_color . '}
		.widget_featured_posts .widget-title{border-bottom:2px solid ' . $primary_color . '}
		.widget_featured_posts .widget-title span,
		.widget_featured_slider .slide-content .above-entry-meta .cat-links a{background-color:' . $primary_color . '}
		.widget_featured_slider .slide-content .below-entry-meta .byline a:hover,
		.widget_featured_slider .slide-content .below-entry-meta .comments a:hover,
		.widget_featured_slider .slide-content .below-entry-meta .posted-on a:hover,
		.widget_featured_slider .slide-content .entry-title a:hover{color:' . $primary_color . '}
		.widget_highlighted_posts .article-content .above-entry-meta .cat-links a{background-color:' . $primary_color . '}
		.widget_block_picture_news.widget_featured_posts .article-content .entry-title a:hover,
		.widget_highlighted_posts .article-content .below-entry-meta .byline a:hover,
		.widget_highlighted_posts .article-content .below-entry-meta .comments a:hover,
		.widget_highlighted_posts .article-content .below-entry-meta .posted-on a:hover,
		.widget_highlighted_posts .article-content .entry-title a:hover{color:' . $primary_color . '}
		.category-slide-next,.category-slide-prev,.slide-next,
		.slide-prev,.tabbed-widget ul li{background-color:' . $primary_color . '}
		i.fa-arrow-up, i.fa-arrow-down{color:' . $primary_color . '}
		#secondary .widget-title{border-bottom:2px solid ' . $primary_color . '}
		#content .wp-pagenavi .current,#content .wp-pagenavi a:hover,
		#secondary .widget-title span{background-color:' . $primary_color . '}
		#site-title a{color:' . $primary_color . '}
		.page-header .page-title{border-bottom:2px solid ' . $primary_color . '}
		#content .post .article-content .above-entry-meta .cat-links a,
		.page-header .page-title span{background-color:' . $primary_color . '}
		#content .post .article-content .entry-title a:hover,.entry-meta .byline i,
		.entry-meta .cat-links i,.entry-meta a,.post .entry-title a:hover,.search .entry-title a:hover{color:' . $primary_color . '}
		.entry-meta .post-format i{background-color:' . $primary_color . '}
		.entry-meta .comments-link a:hover,.entry-meta .edit-link a:hover,.entry-meta .posted-on a:hover,
		.entry-meta .tag-links a:hover,.single #content .tags a:hover{color:' . $primary_color . '}
		.format-link .entry-content a,.more-link{background-color:' . $primary_color . '}
		.count,.next a:hover,.previous a:hover,.related-posts-main-title .fa,
		.single-related-posts .article-content .entry-title a:hover{color:' . $primary_color . '}
		.pagination a span:hover{color:' . $primary_color . ';border-color:' . $primary_color . '}
		.pagination span{background-color:' . $primary_color . '}
		#content .comments-area a.comment-edit-link:hover,#content .comments-area a.comment-permalink:hover,
		#content .comments-area article header cite a:hover,.comments-area .comment-author-link a:hover{color:' . $primary_color . '}
		.comments-area .comment-author-link span{background-color:' . $primary_color . '}
		.comment .comment-reply-link:hover,.nav-next a,.nav-previous a{color:' . $primary_color . '}
		.footer-widgets-area .widget-title{border-bottom:2px solid ' . $primary_color . '}
		.footer-widgets-area .widget-title span{background-color:' . $primary_color . '}
		#colophon .footer-menu ul li a:hover,.footer-widgets-area a:hover,a#scroll-up i{color:' . $primary_color . '}
		.advertisement_above_footer .widget-title{border-bottom:2px solid ' . $primary_color . '}
		.advertisement_above_footer .widget-title span{background-color:' . $primary_color . '}
		.sub-toggle{background:' . $primary_color . '}
		.main-small-navigation li.current-menu-item > .sub-toggle i {color:' . $primary_color . '}
		.error{background:' . $primary_color . '}
		.num-404{color:' . $primary_color . '}
		#primary .widget-title{border-bottom: 2px solid ' . $primary_color . '}
		#primary .widget-title span{background-color:' . $primary_color . '}
		.related-posts-wrapper-flyout .entry-title a:hover{color:' . $primary_color . '}';
	}

	// google fonts custom css
	if ( get_theme_mod( 'colormag_site_title_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' #site-title a { font-family: "' . get_theme_mod( 'colormag_site_title_font', 'Open Sans' ) . '"; }';
	}
	if ( get_theme_mod( 'colormag_site_tagline_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' #site-description { font-family: "' . get_theme_mod( 'colormag_site_tagline_font', 'Open Sans' ) . '"; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' .main-navigation li, .site-header .menu-toggle { font-family: "' . get_theme_mod( 'colormag_primary_menu_font', 'Open Sans' ) . '"; }';
	}
	if ( get_theme_mod( 'colormag_all_titles_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' h1, h2, h3, h4, h5, h6 { font-family: "' . get_theme_mod( 'colormag_all_titles_font', 'Open Sans' ) . '"; }';
	}
	if ( get_theme_mod( 'colormag_content_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' body, button, input, select, textarea, p, blockquote p, .entry-meta, .more-link { font-family: "' . get_theme_mod( 'colormag_content_font', 'Open Sans' ) . '"; }';
	}

	// header area font size custom css
	if ( get_theme_mod( 'colormag_title_font_size', '46' ) != '46' ) {
		$colormag_internal_css .= ' #site-title a { font-size: ' . get_theme_mod( 'colormag_title_font_size', '46' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_tagline_font_size', '16' ) != '16' ) {
		$colormag_internal_css .= ' #site-description { font-size: ' . get_theme_mod( 'colormag_tagline_font_size', '16' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' .main-navigation ul li a { font-size: ' . get_theme_mod( 'colormag_primary_menu_font_size', '14' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_primary_sub_menu_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' .main-navigation ul li ul li a { font-size: ' . get_theme_mod( 'colormag_primary_sub_menu_font_size', '14' ) . 'px; }';
	}

	// title related font sizes css
	if ( get_theme_mod( 'colormag_heading_h1_font_size', '42' ) != '42' ) {
		$colormag_internal_css .= ' h1 { font-size: ' . get_theme_mod( 'colormag_heading_h1_font_size', '42' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h2_font_size', '38' ) != '38' ) {
		$colormag_internal_css .= ' h2 { font-size: ' . get_theme_mod( 'colormag_heading_h2_font_size', '38' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h3_font_size', '34' ) != '34' ) {
		$colormag_internal_css .= ' h3 { font-size: ' . get_theme_mod( 'colormag_heading_h3_font_size', '34' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h4_font_size', '30' ) != '30' ) {
		$colormag_internal_css .= ' h4 { font-size: ' . get_theme_mod( 'colormag_heading_h4_font_size', '30' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h5_font_size', '26' ) != '26' ) {
		$colormag_internal_css .= ' h5 { font-size: ' . get_theme_mod( 'colormag_heading_h5_font_size', '26' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h6_font_size', '22' ) != '22' ) {
		$colormag_internal_css .= ' h6 { font-size: ' . get_theme_mod( 'colormag_heading_h6_font_size', '22' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_post_title_font_size', '32' ) != '32' ) {
		$colormag_internal_css .= ' #content .post .article-content .entry-title { font-size: ' . get_theme_mod( 'colormag_post_title_font_size', '32' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_page_title_font_size', '34' ) != '34' ) {
		$colormag_internal_css .= ' .type-page .entry-title { font-size: ' . get_theme_mod( 'colormag_page_title_font_size', '34' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_widget_title_font_size', '18' ) != '18' ) {
		$colormag_internal_css .= ' #secondary .widget-title { font-size: ' . get_theme_mod( 'colormag_widget_title_font_size', '18' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_comment_title_font_size', '22' ) != '22' ) {
		$colormag_internal_css .= ' .comments-title, .comment-reply-title, #respond h3#reply-title { font-size: ' . get_theme_mod( 'colormag_comment_title_font_size', '22' ) . 'px; }';
	}

	// content font size custom css
	if ( get_theme_mod( 'colormag_content_font_size', '18' ) != '18' ) {
		$colormag_internal_css .= ' body, button, input, select, textarea, p, blockquote p, dl, .previous a, .next a, .nav-previous a, .nav-next a, #respond h3#reply-title #cancel-comment-reply-link, #respond form input[type="text"], #respond form textarea, #secondary .widget, .error-404 .widget { font-size: ' . get_theme_mod( 'colormag_content_font_size', '18' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_post_meta_font_size', '12' ) != '12' ) {
		$colormag_internal_css .= ' #content .post .article-content .below-entry-meta .posted-on a, #content .post .article-content .below-entry-meta .byline a, #content .post .article-content .below-entry-meta .comments a, #content .post .article-content .below-entry-meta .tag-links a, #content .post .article-content .below-entry-meta .edit-link a, #content .post .article-content .below-entry-meta .total-views { font-size: ' . get_theme_mod( 'colormag_post_meta_font_size', '12' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_button_text_font_size', '12' ) != '12' ) {
		$colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { font-size: ' . get_theme_mod( 'colormag_button_text_font_size', '12' ) . 'px; }';
	}

	// footer area font size custom css
	if ( get_theme_mod( 'colormag_footer_widget_title_font_size', '15' ) != '15' ) {
		$colormag_internal_css .= ' .footer-widgets-area .widget-title { font-size: ' . get_theme_mod( 'colormag_footer_widget_title_font_size', '15' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_footer_widget_content_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' #colophon, #colophon p { font-size: ' . get_theme_mod( 'colormag_footer_widget_content_font_size', '14' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_footer_copyright_text_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' .footer-socket-wrapper .copyright { font-size: ' . get_theme_mod( 'colormag_footer_copyright_text_font_size', '14' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_footer_small_menu_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' .footer-menu a { font-size: ' . get_theme_mod( 'colormag_footer_small_menu_font_size', '14' ) . 'px; }';
	}

	// header area custom css
	if ( get_theme_mod( 'colormag_site_title_color', '#289dcc' ) != '#289dcc' ) {
		$colormag_internal_css .= ' #site-title a { color: ' . get_theme_mod( 'colormag_site_title_color', '#289dcc' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_site_tagline_color', '#666666' ) != '#666666' ) {
		$colormag_internal_css .= ' #site-description { color: ' . get_theme_mod( 'colormag_site_tagline_color', '#666666' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_text_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .main-navigation a, .main-navigation ul li ul li a, .main-navigation ul li.current-menu-item ul li a, .main-navigation ul li ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor ul li a, .main-navigation ul li.current-menu-ancestor ul li a, .main-navigation ul li.current_page_item ul li a { color: ' . get_theme_mod( 'colormag_primary_menu_text_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_selected_hovered_text_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .main-navigation a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor a, .main-navigation ul li.current-menu-ancestor a, .main-navigation ul li.current_page_item a, .main-navigation ul li:hover > a, .main-navigation ul li ul li a:hover, .main-navigation ul li ul li:hover > a, .main-navigation ul li.current-menu-item ul li a:hover { color: ' . get_theme_mod( 'colormag_primary_menu_selected_hovered_text_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_header_background_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' #header-text-nav-container { background-color: ' . get_theme_mod( 'colormag_header_background_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_background_color', '#232323' ) != '#232323' ) {
		$colormag_internal_css .= ' #site-navigation { background-color: ' . get_theme_mod( 'colormag_primary_menu_background_color', '#232323' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_sub_menu_background_color', '#232323' ) != '#232323' ) {
		$colormag_internal_css .= ' .main-navigation .sub-menu, .main-navigation .children { background-color: ' . get_theme_mod( 'colormag_primary_sub_menu_background_color', '#232323' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_top_border_color', '#289dcc' ) != '#289dcc' ) {
		$colormag_internal_css .= ' #site-navigation { border-top-color: ' . get_theme_mod( 'colormag_primary_menu_top_border_color', '#289dcc' ) . '; }';
	}

	// content part color options custom css
	if ( get_theme_mod( 'colormag_content_part_title_color', '#333333' ) != '#333333' ) {
		$colormag_internal_css .= ' h1, h2, h3, h4, h5, h6 { color: ' . get_theme_mod( 'colormag_content_part_title_color', '#333333' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_post_title_color', '#333333' ) != '#333333' ) {
		$colormag_internal_css .= ' .post .entry-title, .post .entry-title a { color: ' . get_theme_mod( 'colormag_post_title_color', '#333333' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_page_title_color', '#333333' ) != '#333333' ) {
		$colormag_internal_css .= ' .type-page .entry-title { color: ' . get_theme_mod( 'colormag_page_title_color', '#333333' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_content_text_color', '#444444' ) != '#444444' ) {
		$colormag_internal_css .= ' body, button, input, select, textarea { color: ' . get_theme_mod( 'colormag_content_text_color', '#444444' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_post_meta_color', '#888888' ) != '#888888' ) {
		$colormag_internal_css .= ' .posted-on a, .byline a, .comments a, .tag-links a, .edit-link a { color: ' . get_theme_mod( 'colormag_post_meta_color', '#888888' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_button_text_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { color: ' . get_theme_mod( 'colormag_button_text_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_button_background_color', '#d40234' ) != '#d40234' ) {
		$colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { background-color: ' . get_theme_mod( 'colormag_button_background_color', '#d40234' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_sidebar_widget_title_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' #secondary .widget-title span { color: ' . get_theme_mod( 'colormag_sidebar_widget_title_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_content_section_background_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' #main { background-color: ' . get_theme_mod( 'colormag_content_section_background_color', '#ffffff' ) . '; }';
	}

	// footer part color options
	if ( get_theme_mod( 'colormag_footer_widget_title_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .footer-widgets-area .widget-title span { color: ' . get_theme_mod( 'colormag_footer_widget_title_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_widget_content_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .footer-widgets-area, .footer-widgets-area p { color: ' . get_theme_mod( 'colormag_footer_widget_content_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_widget_content_link_text_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .footer-widgets-area a { color: ' . get_theme_mod( 'colormag_footer_widget_content_link_text_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_widget_background_color', '' ) != '' ) {
		$colormag_internal_css .= ' .footer-widgets-wrapper { background-color: ' . get_theme_mod( 'colormag_footer_widget_background_color', '' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_upper_footer_widget_background_color', '' ) != '#2c2e34' ) {
		$colormag_internal_css .= ' #colophon .tg-upper-footer-widgets .widget { background-color: ' . get_theme_mod( 'colormag_upper_footer_widget_background_color', '#2c2e34' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_copyright_text_color', '#b1b6b6' ) != '#b1b6b6' ) {
		$colormag_internal_css .= ' .footer-socket-wrapper .copyright { color: ' . get_theme_mod( 'colormag_footer_copyright_text_color', '#b1b6b6' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_copyright_link_text_color', '#b1b6b6' ) != '#b1b6b6' ) {
		$colormag_internal_css .= ' .footer-socket-wrapper .copyright a { color: ' . get_theme_mod( 'colormag_footer_copyright_link_text_color', '#b1b6b6' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_small_menu_text_color', '#b1b6b6' ) != '#b1b6b6' ) {
		$colormag_internal_css .= ' #colophon .footer-menu ul li a { color: ' . get_theme_mod( 'colormag_footer_small_menu_text_color', '#b1b6b6' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_copyright_part_background_color', '' ) != '' ) {
		$colormag_internal_css .= ' .footer-socket-wrapper { background-color: ' . get_theme_mod( 'colormag_footer_copyright_part_background_color', '' ) . '; }';
	}
	// post meta data settings
	// total post meta remove
	if ( get_theme_mod( 'colormag_all_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .above-entry-meta,.below-entry-meta,.tg-module-meta,.tg-post-categories{display:none;}';
	}
	// author post meta remove
	if ( get_theme_mod( 'colormag_author_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .below-entry-meta .byline,.tg-module-meta .tg-post-auther-name{display:none;}';
	}
	// date post meta remove
	if ( get_theme_mod( 'colormag_date_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .below-entry-meta .posted-on,.tg-module-meta .tg-post-date{display:none;}';
	}
	// category post meta remove
	if ( get_theme_mod( 'colormag_category_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .above-entry-meta,.tg-post-categories{display:none;}';
	}
	// comments post meta remove
	if ( get_theme_mod( 'colormag_comments_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .below-entry-meta .comments,.tg-module-meta .tg-module-comments{display:none;}';
	}
	// tags post meta remove
	if ( get_theme_mod( 'colormag_tags_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .below-entry-meta .tag-links{display:none;}';
	}

	if ( get_theme_mod( 'colormag_category_menu_color', '' ) == 1 ) {

		$categories = get_terms( 'category', array( 'hide_empty' => false ) );
		$colormag_internal_css
		            .= '
		.menunav-menu >li.menu-item-object-category > a {
			position: relative;
		}

		.menunav-menu >li.menu-item-object-category > a::before {
			content: "";
			position: absolute;
			top: -4px;
			left: 0;
			right: 0;
			height: 4px;
			z-index: 10;
			transition: width 0.35s;
		}';

		foreach ( $categories as $category ) {
			$cat_color = get_theme_mod( 'colormag_category_color_' . absint( $category->term_id ) );
			$cat_id    = $category->term_id;
			if ( ! empty( $cat_color ) ) {
				$colormag_internal_css
					.= '
				.menu-item-object-category.menu-item-category-' . $cat_id . ' > a::before {
					background: ' . $cat_color . ';
				}

				.menu-item-object-category.menu-item-category-' . $cat_id . ':hover > a {
					background: ' . $cat_color . ';
				}
				';
			}
		}
	}

	// Footer background option
	// Footer background image option
	if ( get_theme_mod( 'colormag_footer_background_image' ) ) {
		$colormag_internal_css .= ' #colophon { background-image: url(' . get_theme_mod( 'colormag_footer_background_image' ) . ') } .footer-widgets-wrapper, .footer-socket-wrapper, .colormag-footer--classic .footer-socket-wrapper { background-color: transparent; }';
	}
	// Footer background image position setting
	$footer_background_image_position_setting = get_theme_mod( 'colormag_footer_background_image_position', 'center-center' );
	if ( $footer_background_image_position_setting == 'left-top' ) { // For `left-top`
		$colormag_internal_css .= '#colophon { background-position: left top; }';
	} elseif ( $footer_background_image_position_setting == 'center-top' ) { // For `center-top`
		$colormag_internal_css .= '#colophon { background-position: center top; }';
	} elseif ( $footer_background_image_position_setting == 'right-top' ) { // For `right-top`
		$colormag_internal_css .= '#colophon { background-position: right top; }';
	} elseif ( $footer_background_image_position_setting == 'left-center' ) { // For `left-center`
		$colormag_internal_css .= '#colophon { background-position: left center; }';
	} elseif ( $footer_background_image_position_setting == 'right-center' ) { // For `right-center`
		$colormag_internal_css .= '#colophon { background-position: right center; }';
	} elseif ( $footer_background_image_position_setting == 'left-bottom' ) { // For `left-bottom`
		$colormag_internal_css .= '#colophon { background-position: left bottom; }';
	} elseif ( $footer_background_image_position_setting == 'center-bottom' ) { // For `center-bottom`
		$colormag_internal_css .= '#colophon { background-position: center bottom; }';
	} elseif ( $footer_background_image_position_setting == 'right-bottom' ) { // For `right-bottom`
		$colormag_internal_css .= '#colophon { background-position: right bottom; }';
	} else { // For `center-center`
		$colormag_internal_css .= '#colophon { background-position: center center; }';
	}
	// Footer background size setting
	$footer_background_size_setting = get_theme_mod( 'colormag_footer_background_image_size', 'auto' );
	if ( $footer_background_size_setting == 'cover' ) { // For `cover`
		$colormag_internal_css .= '#colophon { background-size: cover; }';
	} elseif ( $footer_background_size_setting == 'contain' ) { // For `contain`
		$colormag_internal_css .= '#colophon { background-size: contain; }';
	} else { // for `auto`
		$colormag_internal_css .= '#colophon { background-size: auto; }';
	}
	// Footer background attachment setting
	$footer_background_attachment_setting = get_theme_mod( 'colormag_footer_background_image_attachment', 'scroll' );
	if ( $footer_background_attachment_setting == 'fixed' ) { // For `fixed`
		$colormag_internal_css .= '#colophon { background-attachment: fixed; }';
	} else { // for `scroll`
		$colormag_internal_css .= '#colophon { background-attachment: scroll; }';
	}
	// Footer background repeat setting
	$footer_background_repeat_setting = get_theme_mod( 'colormag_footer_background_image_repeat', 'scroll' );
	if ( $footer_background_repeat_setting == 'no-repeat' ) { // For `no-repeat`
		$colormag_internal_css .= '#colophon { background-repeat: no-repeat; }';
	} elseif ( $footer_background_repeat_setting == 'repeat-x' ) { // for `repeat-x`
		$colormag_internal_css .= '#colophon { background-repeat: repeat-x; }';
	} elseif ( $footer_background_repeat_setting == 'repeat-y' ) { // for `repeat-y`
		$colormag_internal_css .= '#colophon { background-repeat: repeat-y; }';
	} else { // for `repeat`
		$colormag_internal_css .= '#colophon { background-repeat: repeat; }';
	}

	if ( ! empty( $colormag_internal_css ) ) {
		echo '<!-- ' . get_bloginfo( 'name' ) . ' Internal Styles -->';
		?>
		<style type="text/css"><?php echo $colormag_internal_css; ?></style>
		<?php
	}

	$colormag_custom_css = get_theme_mod( 'colormag_custom_css' );
	if ( $colormag_custom_css && ! function_exists( 'wp_update_custom_css_post' ) ) {
		echo '<!-- ' . get_bloginfo( 'name' ) . ' Custom Styles -->';
		?>
		<style type="text/css"><?php echo $colormag_custom_css; ?></style><?php
	}
}

/* * *********************************************************************************** */

/**
 * Category ID on Menu
 *
 * @param array  $classes
 * @param object $item
 *
 * @return array $classes
 */
function colormag_category_id_on_menu( $classes, $item ) {
	if ( $item->object !== 'category' ) {
		return $classes;
	}

	$classes[] = 'menu-item-category-' . $item->object_id;

	return $classes;
}

add_filter( 'nav_menu_css_class', 'colormag_category_id_on_menu', 10, 2 );

add_filter( 'the_content_more_link', 'colormag_remove_more_jump_link' );

/**
 * Removing the more link jumping to middle of content
 */
function colormag_remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end - $offset );
	}

	return $link;
}

/* * *********************************************************************************** */

if ( ! function_exists( 'colormag_content_nav' ) ) :

	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function colormag_content_nav( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';
		?>
		<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'colormag' ); ?></h1>

			<?php if ( is_single() ) : // navigation links for single posts ?>

				<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'colormag' ) . '</span> %title' ); ?>
				<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'colormag' ) . '</span>' ); ?>

			<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages  ?>

				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'colormag' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'colormag' ) ); ?></div>
				<?php endif; ?>

			<?php endif; ?>

		</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
		<?php
	}

endif; // colormag_content_nav

/*	 * *********************************************************************************** */

/*
 * Category Color Options
 */
if ( ! function_exists( 'colormag_category_color' ) ) :

	function colormag_category_color( $wp_category_id ) {
		$args     = array(
			'orderby'    => 'id',
			'hide_empty' => 0,
		);
		$category = get_categories( $args );
		foreach ( $category as $category_list ) {
			$color = get_theme_mod( 'colormag_category_color_' . $wp_category_id );

			return $color;
		}
	}

endif;

/*	 * *********************************************************************************** */

/*
 * Breaking News/Latest Posts ticker section in the header
 */
if ( ! function_exists( 'colormag_breaking_news' ) ) :

	function colormag_breaking_news() {
		if ( get_theme_mod( 'colormag_breaking_news_category_option', 'latest' ) == 'latest' ) {
			$get_featured_posts = new WP_Query( array(
				'posts_per_page'         => 5,
				'post_type'              => 'post',
				'ignore_sticky_posts'    => true,
				'no_found_rows'          => true,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => false,
			) );
		} else {
			$get_featured_posts = new WP_Query( array(
				'posts_per_page'         => 5,
				'post_type'              => 'post',
				'ignore_sticky_posts'    => true,
				'no_found_rows'          => true,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => false,
				'category__in'           => get_theme_mod( 'colormag_breaking_news_category' ),
			) );
		}
		?>
		<div class="breaking-news">
			<strong class="breaking-news-latest">
				<?php echo get_theme_mod( 'colormag_breaking_news_content_option', __( 'Latest:', 'colormag' ) ); ?>
			</strong>
			<ul class="newsticker">
				<?php while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<?php
		// Reset Post Data
		wp_reset_query();
	}

endif;

/**
 * Purge the transient
 */
add_action( 'save_post', 'colormag_purge_transient' );

function colormag_purge_transient( $post ) {
	delete_transient( 'colormag_cached_breaking_news' );
}

// Breaking News Javascript Alter
if ( ! function_exists( 'colormag_breaking_news_option' ) ) :

	function colormag_breaking_news_option() {
		$breaking_news_slide_effect = get_theme_mod( 'colormag_breaking_news_setting_animation_options', 'down' );
		$breaking_news_duration     = get_theme_mod( 'colormag_breaking_news_duration_setting_options', 4 );
		$breaking_news_speed        = get_theme_mod( 'colormag_breaking_news_speed_setting_options', 1 );

		$breaking_news_duration = intval( $breaking_news_duration );
		$breaking_news_speed    = intval( $breaking_news_speed );

		if ( $breaking_news_duration != 0 ) {
			$breaking_news_duration = $breaking_news_duration * 1000;
		} else {
			$breaking_news_duration = 4000;
		}
		if ( $breaking_news_speed != 0 ) {
			$breaking_news_speed = $breaking_news_speed * 1000;
		} else {
			$breaking_news_speed = 1000;
		}

		wp_localize_script(
			'colormag-news-ticker', 'colormag_ticker_settings', array(
				'breaking_news_slide_effect' => $breaking_news_slide_effect,
				'breaking_news_duration'     => $breaking_news_duration,
				'breaking_news_speed'        => $breaking_news_speed,
			)
		);
	}

endif;

add_action( 'wp_enqueue_scripts', 'colormag_breaking_news_option', 100 );

/*	 * *********************************************************************************** */

/*
 * Display the date in the header
 */
if ( ! function_exists( 'colormag_date_display' ) ) :

	function colormag_date_display() {
		if ( get_theme_mod( 'colormag_date_display', 0 ) == 0 ) {
			return;
		}
		?>

		<div class="date-in-header">
			<?php
			if ( get_theme_mod( 'colormag_date_display_type', 'theme_default' ) == 'theme_default' ) {
				echo date_i18n( 'l, F j, Y' );
			} elseif ( get_theme_mod( 'colormag_date_display_type', 'theme_default' ) == 'wordpress_date_setting' ) {
				echo date_i18n( get_option( 'date_format' ) );
			}
			?>
		</div>

		<?php
	}

endif;

/*	 * *********************************************************************************** */

/*
 * Random Post in header
 */
if ( ! function_exists( 'colormag_random_post' ) ) :

	function colormag_random_post() {
		// Bail out if random post in menu is not activated
		if ( get_theme_mod( 'colormag_random_post_in_menu', 0 ) == 0 ) {
			return;
		}

		$get_random_post = new WP_Query( array(
			'posts_per_page'         => 1,
			'post_type'              => 'post',
			'ignore_sticky_posts'    => true,
			'orderby'                => 'rand',
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		) );
		?>

		<div class="random-post">
			<?php while ( $get_random_post->have_posts() ):$get_random_post->the_post(); ?>
				<a href="<?php the_permalink(); ?>" title="<?php esc_html_e( 'View a random post', 'colormag' ); ?>"><i class="fa fa-random"></i></a>
			<?php endwhile; ?>
		</div>

		<?php
		// Reset Post Data
		wp_reset_query();
	}

endif;

/*	 * *********************************************************************************** */

/*
 * Display the related posts
 */
if ( ! function_exists( 'colormag_related_posts_function' ) ) {

	function colormag_related_posts_function() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => get_theme_mod( 'colormag_related_post_number_display', '3' ),
		);
		// Related by categories
		if ( get_theme_mod( 'colormag_related_posts', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod( 'colormag_related_posts', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}

		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();

		return $query;
	}

}

if ( ! function_exists( 'colormag_flyout_related_post_query' ) ) {

	/**
	 * Flyout related posts query.
	 */
	function colormag_flyout_related_post_query() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments.
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => 2,
		);

		// Related by categories.
		if ( get_theme_mod( 'colormag_related_posts_flyout_type', 'categories' ) == 'categories' ) {
			$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
			$args['category__in'] = $cats;
		}

		// Related by tags.
		if ( get_theme_mod( 'colormag_related_posts_flyout_type', 'categories' ) == 'tags' ) {
			$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
			$args['tag__in'] = $tags;

			// If no tags added, return.
			if ( ! $tags ) {
				$break = true;
			}
		}

		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query;

		return $query;

	}

}

/*	 * *********************************************************************************** */

/*
 * Category Color for widgets and other
 */
if ( ! function_exists( 'colormag_colored_category' ) ) :

	function colormag_colored_category() {
		global $post;
		$categories = get_the_category();
		$separator  = '&nbsp;';
		$output     = '';
		if ( $categories ) {
			$output .= '<div class="above-entry-meta"><span class="cat-links">';
			foreach ( $categories as $category ) {
				$color_code = colormag_category_color( get_cat_id( $category->cat_name ) );
				if ( ! empty( $color_code ) ) {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '" style="background:' . colormag_category_color( get_cat_id( $category->cat_name ) ) . '" rel="category tag">' . $category->cat_name . '</a>' . $separator;
				} else {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '"  rel="category tag">' . $category->cat_name . '</a>' . $separator;
				}
			}

			$output .= '</span></div>';
			echo trim( $output, $separator );
		}
	}

endif;

/*
 * Just returning the value
 */
if ( ! function_exists( 'colormag_colored_category_return' ) ) :

	function colormag_colored_category_return() {
		global $post;
		$categories = get_the_category();
		$separator  = '&nbsp;';
		$output     = '';
		if ( $categories ) {
			$output .= '<div class="above-entry-meta"><span class="cat-links">';
			foreach ( $categories as $category ) {
				$color_code = colormag_category_color( get_cat_id( $category->cat_name ) );
				if ( ! empty( $color_code ) ) {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '" style="background:' . colormag_category_color( get_cat_id( $category->cat_name ) ) . '" rel="category tag">' . $category->cat_name . '</a>' . $separator;
				} else {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '"  rel="category tag">' . $category->cat_name . '</a>' . $separator;
				}
			}

			$output .= '</span></div>';
			$output = trim( $output, $separator );
		}

		return $output;
	}

endif;

/*	 * *********************************************************************************** */

/*
 * Creating responsive video for posts/pages
 */
if ( ! function_exists( 'colormag_responsive_video' ) ) :

	function colormag_responsive_video( $html, $url, $attr, $post_ID ) {
		return '<div class="fitvids-video">' . $html . '</div>';
	}

	add_filter( 'embed_oembed_html', 'colormag_responsive_video', 10, 4 );
endif;

/*	 * *********************************************************************************** */

/**
 * Use of the hooks for Category Color in the archive titles
 */
function colormag_colored_category_title( $title ) {
	$color_value        = colormag_category_color( get_cat_id( $title ) );
	$color_border_value = colormag_category_color( get_cat_id( $title ) );
	if ( ! empty( $color_value ) ) {
		return '<h3 class="page-title" style="border-bottom-color: ' . $color_border_value . '">' . '<span style="background-color: ' . $color_value . '">' . $title . '</span></h3>';
	} else {
		return '<h1 class="page-title"><span>' . $title . '</span></h1>';
	}
}

function colormag_category_title_function( $category_title ) {
	add_filter( 'single_cat_title', 'colormag_colored_category_title' );
}

add_action( 'colormag_category_title', 'colormag_category_title_function' );

/*	 * *********************************************************************************** */

/*
 * Adding the custom meta box for supporting the post formats
 */

function colormag_post_format_meta_box() {
	add_meta_box( 'post-video-url', __( 'Video URL', 'colormag' ), 'colormag_post_format_video_url', 'post', 'side', 'high' );
}

add_action( 'add_meta_boxes', 'colormag_post_format_meta_box' );

function colormag_post_format_video_url( $post ) {
	$video_post_id  = get_post_custom( $post->ID );
	$video_post_url = isset( $video_post_id['video_url'] ) ? esc_attr( $video_post_id['video_url'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<p>
		<input type="text" class="widefat" name="video_url" id="video_url" value="<?php echo $video_post_url; ?>" />
	</p>
	<?php
}

function colormag_post_meta_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// checking if the nonce isn't there, or we can't verify it, then we should return
	if ( ! isset( $_POST['meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) {
		return;
	}

	// checking if the current user can't edit this post, then we should return
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	// saving the data in meta box
	// saving the video url in the meta box
	if ( isset( $_POST['video_url'] ) ) {
		update_post_meta( $post_id, 'video_url', esc_url_raw( $_POST['video_url'] ) );
	}
}

add_action( 'save_post', 'colormag_post_meta_save' );

function colormag_meta_box_display_toggle() {
	$custom_script
		= '
<script type="text/javascript">
jQuery(document).ready(function() {
// hide the div by default
jQuery( "#post-video-url" ).hide();

// if post format is selected, then, display the respective div
if(jQuery( "#post-format-video" ).is( ":checked" ))
jQuery( "#post-video-url" ).show();

// hiding the default post format type input box by default
jQuery( "input[name=\"post_format\"]" ).change(function() {
	jQuery( "#post-video-url" ).hide();
});

// if post format is selected, then, display the respective input div
jQuery( "input#post-format-video" ).change( function() {
	jQuery( "#post-video-url" ).show();
});
});
</script>
';

	return print $custom_script;
}

add_action( 'admin_footer', 'colormag_meta_box_display_toggle' );

/*	 * *********************************************************************************** */

/*
 * Post view counter function
 */

// function to display the total number of posts view
function colormag_post_view_display( $postID ) {
	$count_key = 'total_number_of_views';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );

		return '<span class="post-views"><i class="fa fa-eye"></i>' . '<span class="total-views">' . __( '0 View', 'colormag' ) . '</span></span>';
	} else {
		return '<span class="post-views"><i class="fa fa-eye"></i>' . '<span class="total-views">' . sprintf( __( '%s Views', 'colormag' ), $count ) . '</span></span>';
	}
}

// function to count views for the posts
function colormag_post_view_setup( $postID ) {
	$count_key = 'total_number_of_views';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
	} else {
		$count ++;
		update_post_meta( $postID, $count_key, $count );
	}
}

// Adding the number of views count in the WordPress Posts Dashboard
add_filter( 'manage_posts_columns', 'colormag_posts_column_views' );
add_action( 'manage_posts_custom_column', 'colormag_posts_custom_column_views', 5, 2 );

function colormag_posts_column_views( $defaults ) {
	$defaults['post_views'] = __( 'Total Views', 'colormag' );

	return $defaults;
}

function colormag_posts_custom_column_views( $column_name, $id ) {
	if ( $column_name === 'post_views' ) {
		echo colormag_post_view_display( get_the_ID() );
	}
}

/*	 * *********************************************************************************** */

/*
 * Adding the Custom Generated User Field
 */
add_action( 'show_user_profile', 'colormag_extra_user_field' );
add_action( 'edit_user_profile', 'colormag_extra_user_field' );

function colormag_extra_user_field( $user ) {
	?>
	<h3><?php _e( 'User Social Links', 'colormag' ); ?></h3>
	<table class="form-table">
		<tr>
			<th><label for="colormag_twitter"><?php _e( 'Twitter', 'colormag' ); ?></label></th>
			<td>
				<input type="text" name="colormag_twitter" id="colormag_twitter" value="<?php echo esc_attr( get_the_author_meta( 'colormag_twitter', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="colormag_facebook"><?php _e( 'Facebook', 'colormag' ); ?></label></th>
			<td>
				<input type="text" name="colormag_facebook" id="colormag_facebook" value="<?php echo esc_attr( get_the_author_meta( 'colormag_facebook', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="colormag_google_plus"><?php _e( 'Google Plus', 'colormag' ); ?></label></th>
			<td>
				<input type="text" name="colormag_google_plus" id="colormag_google_plus" value="<?php echo esc_attr( get_the_author_meta( 'colormag_google_plus', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="colormag_flickr"><?php _e( 'Flickr', 'colormag' ); ?></label></th>
			<td>
				<input type="text" name="colormag_flickr" id="colormag_flickr" value="<?php echo esc_attr( get_the_author_meta( 'colormag_flickr', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="colormag_linkedin"><?php _e( 'LinkedIn', 'colormag' ); ?></label></th>
			<td>
				<input type="text" name="colormag_linkedin" id="colormag_linkedin" value="<?php echo esc_attr( get_the_author_meta( 'colormag_linkedin', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="colormag_instagram"><?php _e( 'Instagram', 'colormag' ); ?></label></th>
			<td>
				<input type="text" name="colormag_instagram" id="colormag_instagram" value="<?php echo esc_attr( get_the_author_meta( 'colormag_instagram', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="colormag_tumblr"><?php _e( 'Tumblr', 'colormag' ); ?></label></th>
			<td>
				<input type="text" name="colormag_tumblr" id="colormag_tumblr" value="<?php echo esc_attr( get_the_author_meta( 'colormag_tumblr', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="colormag_youtube"><?php _e( 'Youtube', 'colormag' ); ?></label></th>
			<td>
				<input type="text" name="colormag_youtube" id="colormag_youtube" value="<?php echo esc_attr( get_the_author_meta( 'colormag_youtube', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
	</table>
	<?php
}

// Saving the user field used above
add_action( 'personal_options_update', 'colormag_extra_user_field_save_option' );
add_action( 'edit_user_profile_update', 'colormag_extra_user_field_save_option' );

function colormag_extra_user_field_save_option( $user_id ) {

	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	update_user_meta( $user_id, 'colormag_twitter', wp_filter_nohtml_kses( $_POST['colormag_twitter'] ) );
	update_user_meta( $user_id, 'colormag_facebook', wp_filter_nohtml_kses( $_POST['colormag_facebook'] ) );
	update_user_meta( $user_id, 'colormag_google_plus', wp_filter_nohtml_kses( $_POST['colormag_google_plus'] ) );
	update_user_meta( $user_id, 'colormag_flickr', wp_filter_nohtml_kses( $_POST['colormag_flickr'] ) );
	update_user_meta( $user_id, 'colormag_linkedin', wp_filter_nohtml_kses( $_POST['colormag_linkedin'] ) );
	update_user_meta( $user_id, 'colormag_instagram', wp_filter_nohtml_kses( $_POST['colormag_instagram'] ) );
	update_user_meta( $user_id, 'colormag_tumblr', wp_filter_nohtml_kses( $_POST['colormag_tumblr'] ) );
	update_user_meta( $user_id, 'colormag_youtube', wp_filter_nohtml_kses( $_POST['colormag_youtube'] ) );
}

// fucntion to show the profile field data
function colormag_author_social_link() {
	?>
	<ul class="author-social-sites">
	<?php if ( get_the_author_meta( 'colormag_twitter' ) ) { ?>
		<li class="twitter-link">
			<a href="https://twitter.com/<?php the_author_meta( 'colormag_twitter' ); ?>"><i class="fa fa-twitter"></i></a>
		</li>
	<?php } // End check for twitter ?>
	<?php if ( get_the_author_meta( 'colormag_facebook' ) ) { ?>
		<li class="facebook-link">
			<a href="https://facebook.com/<?php the_author_meta( 'colormag_facebook' ); ?>"><i class="fa fa-facebook"></i></a>
		</li>
	<?php } // End check for facebook ?>
	<?php if ( get_the_author_meta( 'colormag_google_plus' ) ) { ?>
		<li class="google_plus-link">
			<a href="https://plus.google.com/<?php the_author_meta( 'colormag_google_plus' ); ?>"><i class="fa fa-google-plus"></i></a>
		</li>
	<?php } // End check for google_plus ?>
	<?php if ( get_the_author_meta( 'colormag_flickr' ) ) { ?>
		<li class="flickr-link">
			<a href="https://flickr.com/<?php the_author_meta( 'colormag_flickr' ); ?>"><i class="fa fa-flickr"></i></a>
		</li>
	<?php } // End check for flickr ?>
	<?php if ( get_the_author_meta( 'colormag_linkedin' ) ) { ?>
		<li class="linkedin-link">
			<a href="https://linkedin.com/<?php the_author_meta( 'colormag_linkedin' ); ?>"><i class="fa fa-linkedin"></i></a>
		</li>
	<?php } // End check for linkedin ?>
	<?php if ( get_the_author_meta( 'colormag_instagram' ) ) { ?>
		<li class="instagram-link">
			<a href="https://instagram.com/<?php the_author_meta( 'colormag_instagram' ); ?>"><i class="fa fa-instagram"></i></a>
		</li>
	<?php } // End check for instagram ?>
	<?php if ( get_the_author_meta( 'colormag_tumblr' ) ) { ?>
		<li class="tumblr-link">
			<a href="https://tumblr.com/<?php the_author_meta( 'colormag_tumblr' ); ?>"><i class="fa fa-tumblr"></i></a>
		</li>
	<?php } // End check for tumblr ?>
	<?php if ( get_the_author_meta( 'colormag_youtube' ) ) { ?>
		<li class="youtube-link">
			<a href="https://youtube.com/<?php the_author_meta( 'colormag_youtube' ); ?>"><i class="fa fa-youtube"></i></a>
		</li>
	<?php } // End check for youtube ?>
	</ul><?php
}

/*	 * *********************************************************************************** */

/* Register shortcodes. */
add_action( 'init', 'colormag_add_shortcodes' );

/**
 * Creates new shortcodes for use in any shortcode-ready area.  This function uses the add_shortcode()
 * function to register new shortcodes with WordPress.
 *
 * @uses add_shortcode() to create new shortcodes.
 */
function colormag_add_shortcodes() {
	/* Add theme-specific shortcodes. */
	add_shortcode( 'the-year', 'colormag_the_year_shortcode' );
	add_shortcode( 'site-link', 'colormag_site_link_shortcode' );
	add_shortcode( 'wp-link', 'colormag_wp_link_shortcode' );
	add_shortcode( 'tg-link', 'colormag_themegrill_link_shortcode' );
}

/**
 * Shortcode to display the current year.
 *
 * @uses date() Gets the current year.
 * @return string
 */
function colormag_the_year_shortcode() {
	return date( 'Y' );
}

/**
 * Shortcode to display a link back to the site.
 *
 * @uses get_bloginfo() Gets the site link
 * @return string
 */
function colormag_site_link_shortcode() {
	return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
}

/**
 * Shortcode to display a link to WordPress.org.
 *
 * @return string
 */
function colormag_wp_link_shortcode() {
	return '<a href="' . esc_url( 'http://wordpress.org' ) . '" target="_blank" title="' . esc_attr__( 'WordPress', 'colormag' ) . '"><span>' . __( 'WordPress', 'colormag' ) . '</span></a>';
}

/**
 * Shortcode to display a link to colormag.com.
 *
 * @return string
 */
function colormag_themegrill_link_shortcode() {
	return '<a href="' . esc_url( 'https://themegrill.com/wordpress-themes/' ) . '" target="_blank" title="' . esc_attr__( 'ThemeGrill', 'colormag' ) . '" rel="author"><span>' . __( 'ThemeGrill', 'colormag' ) . '</span></a>';
}

add_action( 'colormag_footer_copyright', 'colormag_footer_copyright', 10 );
/**
 * function to show the footer info, copyright information
 */
if ( ! function_exists( 'colormag_footer_copyright' ) ) :

	function colormag_footer_copyright() {
		$default_footer_value      = get_theme_mod( 'colormag_footer_editor', __( 'Copyright &copy; ', 'colormag' ) . '[the-year] [site-link]. All rights reserved. ' . '<br>' . __( 'Theme: ColorMag Pro by ', 'colormag' ) . '[tg-link]. ' . __( 'Powered by ', 'colormag' ) . '[wp-link].' );
		$colormag_footer_copyright = '<div class="copyright">' . $default_footer_value . '</div>';

		echo do_shortcode( $colormag_footer_copyright );
	}

endif;

/*	 * ************************************************************************************* */

if ( ! function_exists( 'colormag_font_size_range_generator' ) ) :

	/**
	 * Function to generate font size range for font size options.
	 */
	function colormag_font_size_range_generator( $start_range, $end_range ) {
		$range_string = array();
		for ( $i = $start_range; $i <= $end_range; $i ++ ) {
			$range_string[ $i ] = $i;
		}

		return $range_string;
	}

endif;

/*
 * Unique Post Display function
 *
 * The following sets of fucntions help in removing the duplicate posts from being shown
 * in a page.
 *
 * colormag_exclude_duplicate_posts() - Excluding the Duplicate posts in featured posts widget
 * colormag_append_excluded_duplicate_posts() - Appending the duplicate posts
 */

function colormag_exclude_duplicate_posts() {
	global $colormag_duplicate_posts;

	if ( get_theme_mod( 'colormag_unique_post_system', 0 ) == 1 ) {
		$post__not_in = $colormag_duplicate_posts;
	} else {
		$post__not_in = array();
	}

	return $post__not_in;
}

function colormag_append_excluded_duplicate_posts( $featured_posts ) {
	global $colormag_duplicate_posts;

	if ( get_theme_mod( 'colormag_unique_post_system', 0 ) == 1 ) {
		$post_ids                 = wp_list_pluck( $featured_posts->posts, 'ID' );
		$colormag_duplicate_posts = array_unique( array_merge( $colormag_duplicate_posts, $post_ids ) );
	} else {
		return;
	}
}

/*	 * *********************************************************************************** */

if ( ! function_exists( 'colormag_woocommerce_body_class' ) ) {

	/**
	 * Filter body class for WooCommerce pages.
	 *
	 * @return array classes for WooCommerce pages.
	 *
	 * @since 2.2.8
	 */
	function colormag_woocommerce_body_class( $classes ) {
		$classes[] = '';

		// Filter body class if WooCommerce plugin is activated.
		if ( class_exists( 'WooCommerce' ) ) {
			$classes[] = 'woocommerce-active';

			$woocommerce_shop_page_layout           = get_theme_mod( 'colormag_woocmmerce_shop_page_layout', 'right_sidebar' );
			$woocommerce_archive_page_layout        = get_theme_mod( 'colormag_woocmmerce_archive_page_layout', 'right_sidebar' );
			$woocommerce_single_product_page_layout = get_theme_mod( 'colormag_woocmmerce_single_product_page_layout', 'right_sidebar' );

			$woocommerce_widgets_enabled = get_theme_mod( 'colormag_woocommerce_sidebar_register_setting', 0 );

			if ( ( $woocommerce_widgets_enabled == 1 ) ) :
				if ( is_shop() ) {
					if ( $woocommerce_shop_page_layout == 'right_sidebar' ) {
						$classes[] = '';
					} elseif ( $woocommerce_shop_page_layout == 'left_sidebar' ) {
						$classes[] = 'left-sidebar';
					} elseif ( $woocommerce_shop_page_layout == 'no_sidebar_full_width' ) {
						$classes[] = 'no-sidebar-full-width';
					} elseif ( $woocommerce_shop_page_layout == 'no_sidebar_content_centered' ) {
						$classes[] = 'no-sidebar';
					}
				} elseif ( is_product_category() || is_product_tag() ) {
					if ( $woocommerce_archive_page_layout == 'right_sidebar' ) {
						$classes[] = '';
					} elseif ( $woocommerce_archive_page_layout == 'left_sidebar' ) {
						$classes[] = 'left-sidebar';
					} elseif ( $woocommerce_archive_page_layout == 'no_sidebar_full_width' ) {
						$classes[] = 'no-sidebar-full-width';
					} elseif ( $woocommerce_archive_page_layout == 'no_sidebar_content_centered' ) {
						$classes[] = 'no-sidebar';
					}
				} elseif ( is_product() ) {
					if ( $woocommerce_single_product_page_layout == 'right_sidebar' ) {
						$classes[] = '';
					} elseif ( $woocommerce_single_product_page_layout == 'left_sidebar' ) {
						$classes[] = 'left-sidebar';
					} elseif ( $woocommerce_single_product_page_layout == 'no_sidebar_full_width' ) {
						$classes[] = 'no-sidebar-full-width';
					} elseif ( $woocommerce_single_product_page_layout == 'no_sidebar_content_centered' ) {
						$classes[] = 'no-sidebar';
					}
				}
			endif;
		}

		return $classes;
	}
}

add_filter( 'body_class', 'colormag_woocommerce_body_class' );

if ( ! function_exists( 'colormag_woocommerce_sidebar_select' ) ) {

	/**
	 * Select different sidebars for WooCommerce pages as set by the user
	 * when extra WooCommerce widgets is enabled.
	 *
	 * @since 2.2.8
	 */
	function colormag_woocommerce_sidebar_select() {
		// Bail out if extra sidebar area for WooCommerce page is not activated.
		if ( get_theme_mod( 'colormag_woocommerce_sidebar_register_setting', 0 ) == 0 ) {
			return;
		}

		// Proceed only if WooCommerce plugin is activated.
		if ( class_exists( 'WooCommerce' ) ) {
			$woocommerce_shop_page_layout           = get_theme_mod( 'colormag_woocmmerce_shop_page_layout', 'right_sidebar' );
			$woocommerce_archive_page_layout        = get_theme_mod( 'colormag_woocmmerce_archive_page_layout', 'right_sidebar' );
			$woocommerce_single_product_page_layout = get_theme_mod( 'colormag_woocmmerce_single_product_page_layout', 'right_sidebar' );

			if ( is_shop() ) { // For Shop page.
				if ( $woocommerce_shop_page_layout == 'right_sidebar' ) {
					get_sidebar( 'woocommerce-right' );
				} elseif ( $woocommerce_shop_page_layout == 'left_sidebar' ) {
					get_sidebar( 'woocommerce-left' );
				}
			} elseif ( is_product_category() || is_product_tag() ) { // For Archive page
				if ( $woocommerce_archive_page_layout == 'right_sidebar' ) {
					get_sidebar( 'woocommerce-right' );
				} elseif ( $woocommerce_archive_page_layout == 'left_sidebar' ) {
					get_sidebar( 'woocommerce-left' );
				}
			} elseif ( is_product() ) { // For Single product page
				if ( $woocommerce_single_product_page_layout == 'right_sidebar' ) {
					get_sidebar( 'woocommerce-right' );
				} elseif ( $woocommerce_single_product_page_layout == 'left_sidebar' ) {
					get_sidebar( 'woocommerce-left' );
				}
			}
		}
	}
}

/**
 * Making the theme Woocommrece compatible
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
// Remove WooCommerce default sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_filter( 'woocommerce_show_page_title', '__return_false' );

add_action( 'woocommerce_before_main_content', 'colormag_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'colormag_wrapper_end', 10 );

function colormag_wrapper_start() {
	echo '<div id="primary">';
}

function colormag_wrapper_end() {
	echo '</div>';

	if ( get_theme_mod( 'colormag_woocommerce_sidebar_register_setting', 0 ) == 1 ) {
		colormag_woocommerce_sidebar_select();
	} else {
		colormag_sidebar_select();
	}
}

/**
 * After demo imported AJAX action.
 *
 * @see colormag_set_cat_colors()
 */
add_filter( 'themegrill_customizer_demo_import_settings', 'colormag_set_cat_colors', 20, 3 );

/**
 * Set categories color settings in theme customizer.
 *
 * Note: Used rarely, if theme_mod keys are based on term ID.
 *
 * @param  array  $data
 * @param  array  $demo_data
 * @param  string $demo_id
 *
 * @return array
 */
function colormag_set_cat_colors( $data, $demo_data, $demo_id ) {
	$cat_colors    = array();
	$cat_prevent   = array();
	$wp_categories = array();

	// Format the data based on demo ID.
	switch ( $demo_id ) {
		case 'colormag-pro':
			$wp_categories = array(
				2  => 'Cars',
				5  => 'Sports',
				6  => 'Technology',
				7  => 'Computer',
				8  => 'Adventure',
				9  => 'Football',
				10 => 'Cycling',
				11 => 'Business',
				15 => 'Internet',
				25 => 'Health',
				27 => 'Food',
				28 => 'Research',
				33 => 'Post Format',
				38 => 'Nutrition',
				42 => 'Travel',
				47 => 'Laptop',
				48 => 'Fashion',
				49 => 'Outfit',
				52 => 'Politics',
				54 => 'Government',
				56 => 'Meeting',
				57 => 'World',
				58 => 'National',
				59 => 'Tourism',
				60 => 'Weather',
			);
			break;
		case 'colormag-pro-fashion':
			$wp_categories = array(
				7  => 'Fashion',
				17 => 'Outfit',
				25 => 'Weather',
				60 => 'Accessories',
				61 => 'Makeup',
				62 => 'Mens Fashion',
				63 => 'Glamorous',
				64 => 'Wedding',
				65 => 'Trends',
				66 => 'Store',
				67 => 'Dress',
				68 => 'Womans Fashion',
				70 => 'Punk',
			);
			break;
		case 'colormag-pro-technology':
			$wp_categories = array(
				2  => 'Android',
				3  => 'Mobile',
				5  => 'Accessories',
				6  => 'Apple',
				7  => 'Laptop',
				8  => 'Camera',
				10 => 'Mouse',
				14 => 'Tablet',
				15 => 'Television',
				18 => 'Featured',
				19 => 'Highlighted',
				20 => 'Top Product',
				24 => 'Game',
			);
			break;
		case 'colormag-pro-sports':
			$wp_categories = array(
				2  => 'Women',
				4  => 'Cricket',
				5  => 'Basketball',
				7  => 'Football',
				8  => 'Tennis',
				9  => 'Swimming',
				11 => 'Golf',
				12 => 'Marathon',
				13 => 'Athlete',
				14 => 'Boxing',
				15 => 'Race',
				16 => 'Baseball',
				17 => 'Cycling',
				18 => 'Ice Hockey',
				19 => 'Snow Olympics',
				20 => 'Figure Skating',
				21 => 'Pole Vault',
				22 => 'Relay',
			);
			break;

		// For Elementor
		case 'colormag-pro-recipes':
			$wp_categories = array(
				3  => 'Baking',
				4  => 'Cake',
				5  => 'Desert',
				6  => 'Quick recipes',
				7  => 'Noddles',
				8  => 'Pizzas',
				9  => 'Risotto',
				10 => 'Popular',
				11 => 'Smoothie',
				12 => 'Pasta',
				13 => 'Breakfast',
				14 => 'News',
			);
			break;
		case 'colormag-pro-health-blog':
			$wp_categories = array(
				3  => 'General',
				7  => 'Fitness',
				9  => 'Tips &amp; Guides',
				13 => 'Food &amp; Nutrition',
				14 => 'Tech',
				15 => 'Drugs',
				17 => 'Disease',
			);
			break;
		case 'colormag-pro-music':
			$wp_categories = array(
				3  => 'Music',
				4  => 'High light',
				6  => 'Event',
				7  => 'Video',
				10 => 'News',
				11 => 'Rock',
				12 => 'Jazz',
				13 => 'Pop',
			);
			break;

		// For free demos
		case 'colormag-free':
			$wp_categories = array(
				1  => 'Sports',
				2  => 'Politics',
				3  => 'Business',
				4  => 'Technology',
				5  => 'WordPress',
				8  => 'General',
				9  => 'Fashion',
				10 => 'Food',
				11 => 'Entertainment',
				13 => 'FEATURED',
				14 => 'TOP STORIES',
				15 => 'TOP VIDEOS',
				16 => 'Health',
				18 => 'Latest',
				19 => 'Drinks',
				20 => 'Gadgets',
				21 => 'Female',
				22 => 'Style',
				23 => 'News',
			);
			break;
		case 'colormag-business-magazine':
			$wp_categories = array(
				4  => 'Investments',
				5  => 'Corporate',
				6  => 'Employment',
				8  => 'Money',
				9  => 'Market',
				14 => 'Global Trade',
				15 => 'Companies',
				16 => 'Entrepreneurship',
			);
			break;
		case 'colormag-beauty-blog':
			$wp_categories = array(
				2  => 'Food & Drinks',
				4  => 'Product',
				5  => 'Hair',
				6  => 'Fashion',
				7  => 'Beauty Tips',
				8  => 'Health',
				9  => 'Eye Make up',
				10 => 'News',
			);
			break;
		case 'colormag-dark':
			$wp_categories = array(
				2  => 'Politics',
				3  => 'Sports',
				4  => 'Travel',
				6  => 'World',
				7  => 'Technology',
				8  => 'Entertainment',
				9  => 'Fashion',
				10 => 'Food &amp; Health',
				11 => 'News',
			);
			break;
	}

	// Fetch categories color settings.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['mods'][ 'colormag_category_color_' . $term_id ] ) ) {
			$cat_colors[ 'colormag_category_color_' . $term_id ] = $data['mods'][ 'colormag_category_color_' . $term_id ];
		}
	}

	// Set categories color settings properly.
	foreach ( $wp_categories as $term_id => $term_name ) {
		if ( ! empty( $data['mods'][ 'colormag_category_color_' . $term_id ] ) ) {
			$term  = get_term_by( 'name', $term_name, 'category' );
			$color = $cat_colors[ 'colormag_category_color_' . $term_id ];

			if ( is_object( $term ) && $term->term_id ) {
				$cat_prevent[]                                               = $term->term_id;
				$data['mods'][ 'colormag_category_color_' . $term->term_id ] = $color;

				// Prevent deleting stored color settings.
				if ( ! in_array( $term_id, $cat_prevent ) ) {
					unset( $data['mods'][ 'colormag_category_color_' . $term_id ] );
				}
			}
		}
	}

	return $data;
}

/**
 * Delete the `Hello world!` post after successful demo import
 */
function colormag_delete_post_import() {
	$page = get_page_by_title( 'Hello world!', OBJECT, 'post' );

	if ( is_object( $page ) && $page->ID ) {
		wp_delete_post( $page->ID, true );
	}
}

add_filter( 'themegrill_ajax_demo_imported', 'colormag_delete_post_import' );

// Displays the site logo
if ( ! function_exists( 'colormag_the_custom_logo' ) ) {

	/**
	 * Displays the optional custom logo.
	 */
	function colormag_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) && ( get_theme_mod( 'colormag_logo', '' ) == '' ) ) {
			the_custom_logo();
		}
	}

}

/**
 * Function to transfer the favicon added in Customizer Options of theme to Site Icon in Site Identity section
 */
function colormag_site_icon_migrate() {
	if ( get_option( 'colormag_site_icon_transfer' ) ) {
		return;
	}

	global $wp_version;
	$image_url = get_theme_mod( 'colormag_favicon_upload', '' );

	if ( ( $wp_version >= 4.3 ) && ( ! has_site_icon() && ! empty( $image_url ) ) ) {
		$customizer_site_icon_id = attachment_url_to_postid( $image_url );
		update_option( 'site_icon', $customizer_site_icon_id );
		// Set the transfer as complete.
		update_option( 'colormag_site_icon_transfer', 1 );
		// Delete the old favicon theme_mod option.
		remove_theme_mod( 'colormag_favicon_upload' );
		remove_theme_mod( 'colormag_favicon_show' );
	}
}

add_action( 'after_setup_theme', 'colormag_site_icon_migrate' );

/**
 * Migrate any existing theme CSS codes added in Customize Options to the core option added in WordPress 4.7
 */
function colormag_custom_css_migrate() {
	if ( function_exists( 'wp_update_custom_css_post' ) ) {
		$custom_css = get_theme_mod( 'colormag_custom_css' );
		if ( $custom_css ) {
			$core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
			$return   = wp_update_custom_css_post( $core_css . $custom_css );
			if ( ! is_wp_error( $return ) ) {
				// Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
				remove_theme_mod( 'colormag_custom_css' );
			}
		}
	}
}

add_action( 'after_setup_theme', 'colormag_custom_css_migrate' );

/**
 * Function to transfer the Header Logo added in Customizer Options of theme to Site Logo in Site Identity section
 */
function colormag_site_logo_migrate() {
	if ( function_exists( 'the_custom_logo' ) && ! has_custom_logo( $blog_id = 0 ) ) {
		$logo_url = get_theme_mod( 'colormag_logo' );

		if ( $logo_url ) {
			$customizer_site_logo_id = attachment_url_to_postid( $logo_url );
			set_theme_mod( 'custom_logo', $customizer_site_logo_id );

			// Delete the old Site Logo theme_mod option.
			remove_theme_mod( 'colormag_logo' );
		}
	}
}

add_action( 'after_setup_theme', 'colormag_site_logo_migrate' );

/**
 * List of allowed social protocols in HTML attributes.
 *
 * @param  array $protocols Array of allowed protocols.
 *
 * @return array
 */
function colormag_allowed_social_protocols( $protocols ) {
	$social_protocols = array(
		'skype',
	);

	return array_merge( $protocols, $social_protocols );
}

add_filter( 'kses_allowed_protocols', 'colormag_allowed_social_protocols' );

/**
 * Get Weather Icon
 *
 * @param  $code weather code
 *
 * @return string weather icon class
 */
function colormag_get_weather_icon( $weather_code ) {
	if ( $weather_code <= 210 || ( $weather_code >= 230 && $weather_code <= 232 ) ) {
		return "wi-storm-showers";
	}
}

/**
 * Get Weather Color
 *
 * @param  $code weather code
 *
 * @return string HEX Color Code
 */
function colormag_get_weather_color( $weather_code ) {
	if ( substr( $weather_code, 0, 1 ) == "2" || substr( $weather_code, 0, 1 ) == "2" ) {
		return "#1B364F";
	} elseif ( substr( $weather_code, 0, 1 ) == "5" ) {
		return "#7F89A2";
	} elseif ( substr( $weather_code, 0, 1 ) == "6" OR $weather_code == 903 ) {
		return "#7E9EF3";
	} elseif ( $weather_code == 781 || $weather_code == 900 ) {
		return "#666C7A";
	} elseif ( $weather_code == 800 || $weather_code == 904 ) {
		return "#628EFB";
	} elseif ( substr( $weather_code, 0, 1 ) == "7" ) {
		return "#628EFB";
	} elseif ( substr( $weather_code, 0, 1 ) == "8" ) {
		return "#AAB4CD";
	} elseif ( $weather_code == 901 || $weather_code == 902 OR $weather_code == 962 ) {
		return "#666C7A";
	} elseif ( $weather_code == 905 ) {
		return "#81A4FE";
	} elseif ( $weather_code == 906 ) {
		return "#81A4FE";
	} elseif ( $weather_code == 951 ) {
		return "#628EFB";
	} elseif ( $weather_code > 951 AND $weather_code < 962 ) {
		return "##628EFB";
	}
}

/**
 * Get Thumbnails and Embed URL from Youtube and Vimeo Link
 *
 * @param string $video_url video link
 *
 * @return array $embed_data
 */
function colormag_get_embed_data( $video_url ) {
	$embed_data = array();

	$youtube_thumbnail_base = 'https://i.ytimg.com/vi/';
	$youtube_player_base    = 'https://www.youtube.com/embed/';
	$vimeo_thumbnail_base   = 'https://i.vimeocdn.com/video/';
	$vimeo_player_base      = 'https://player.vimeo.com/video/';

	if ( preg_match( "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $video_url, $matches ) ) {
		$embed_data['id']    = $matches[0];
		$embed_data['thumb'] = $youtube_thumbnail_base . $embed_data['id'] . '/default.jpg';
		$embed_data['url']   = $youtube_player_base . $embed_data['id'] . '?enablejsapi=1&amp;rel=0&amp;showinfo=0';
	} elseif ( preg_match( "/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $video_url, $matches ) ) {
		$embed_data['id']    = $matches[5];
		$embed_data['thumb'] = $vimeo_thumbnail_base . $video_data['thumb'];
		$embed_data['url']   = $vimeo_player_base . $$embed_data['id'] . '?api=1&amp;title=0&amp;byline=0';
	}

	return $embed_data;
}

/**
 * Get available currencies for fixer.io api
 *
 * @return array
 */
function colormag_get_available_currencies() {
	return
		array(
			'eur' => 'Euro Member Countries',
			'aud' => 'Australian Dollar',
			'bgn' => 'Bulgarian Lev',
			'brl' => 'Brazilian Real',
			'cad' => 'Canadian Dollar',
			'chf' => 'Swiss Franc',
			'cny' => 'Chinese Yuan Renminbi',
			'czk' => 'Czech Republic Koruna',
			'dkk' => 'Danish Krone',
			'gbp' => 'British Pound',
			'hkd' => 'Hong Kong Dollar',
			'hrk' => 'Croatian Kuna',
			'huf' => 'Hungarian Forint',
			'idr' => 'Indonesian Rupiah',
			'ils' => 'Israeli Shekel',
			'inr' => 'Indian Rupee',
			'jpy' => 'Japanese Yen',
			'krw' => 'Korean (South) Won',
			'mxn' => 'Mexican Peso',
			'myr' => 'Malaysian Ringgit',
			'nok' => 'Norwegian Krone',
			'nzd' => 'New Zealand Dollar',
			'php' => 'Philippine Peso',
			'pln' => 'Polish Zloty',
			'ron' => 'Romanian (New) Leu',
			'rub' => 'Russian Ruble',
			'sek' => 'Swedish Krona',
			'sgd' => 'Singapore Dollar',
			'thb' => 'Thai Baht',
			'try' => 'Turkish Lira',
			'usd' => 'United States Dollar',
			'zar' => 'South African Rand',
		);
}

/* * *********************************************************************************** */

if ( ! function_exists( 'colormag_comment' ) ) :

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function colormag_comment( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment;
switch ( $comment->comment_type ) :
case 'pingback' :
case 'trackback' :
// Display trackbacks differently than normal comments.
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
	<p><?php _e( 'Pingback:', 'colormag' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'colormag' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
	break;
	default :
	// Proceed with normal comments.
	global $post;
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"<?php echo colormag_schema_markup( 'comment' ); ?>>
	<article id="comment-<?php comment_ID(); ?>" class="comment">
		<header class="comment-meta comment-author vcard">
			<?php
			echo get_avatar( $comment, 74 );
			printf( '<div class="comment-author-link"' . colormag_schema_markup( 'comment_author' ) . '><i class="fa fa-user"></i>%1$s%2$s</div>', get_comment_author_link(),
				// If current post author is also comment author, make it known visually.
				( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'colormag' ) . '</span>' : ''
			);
			printf( '<div class="comment-date-time"' . colormag_schema_markup( 'comment_time' ) . '><i class="fa fa-calendar-o"></i>%1$s</div>', sprintf( __( '%1$s at %2$s', 'colormag' ), get_comment_date(), get_comment_time() )
			);
			printf( '<a class="comment-permalink" href="%1$s"' . colormag_schema_markup( 'comment_link' ) . '><i class="fa fa-link"></i>Permalink</a>', esc_url( get_comment_link( $comment->comment_ID ) ) );
			edit_comment_link();
			?>
		</header><!-- .comment-meta -->

		<?php if ( '0' == $comment->comment_approved ) : ?>
			<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'colormag' ); ?></p>
		<?php endif; ?>

		<section class="comment-content comment"<?php echo colormag_schema_markup( 'comment_content' ); ?>>
			<?php comment_text(); ?>
			<?php comment_reply_link( array_merge( $args, array(
				'reply_text' => __( 'Reply', 'colormag' ),
				'after'      => '',
				'depth'      => $depth,
				'max_depth'  => $args['max_depth'],
			) ) ); ?>
		</section><!-- .comment-content -->

	</article><!-- #comment-## -->
	<?php
	break;
	endswitch; // end comment_type check
	}

	endif;

	?>
