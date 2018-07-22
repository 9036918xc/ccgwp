<?php
/**
 * Accelerate functions and definitions
 *
 * This file contains all the functions and it's defination that particularly can't be
 * in other files.
 *
 * @package ThemeGrill
 * @subpackage Accelerate Pro
 * @since Accelerate Pro 1.0
 */

/****************************************************************************************/

// Accelerate theme options
function accelerate_options( $id, $default = false ) {
   // getting options value
   $accelerate_options = get_option( 'accelerate' );
   if ( isset( $accelerate_options[ $id ] ) ) {
      return $accelerate_options[ $id ];
   } else {
      return $default;
   }
}

/****************************************************************************************/

add_action( 'wp_enqueue_scripts', 'accelerate_scripts_styles_method' );
/**
 * Register jquery scripts
 */
function accelerate_scripts_styles_method() {
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
   /**
	* Loads our main stylesheet.
	*/
	wp_enqueue_style( 'accelerate_style', get_stylesheet_uri() );

	$accelerate_googlefonts = array();
	array_push( $accelerate_googlefonts, accelerate_options( 'accelerate_site_title_font', 'Roboto+Slab:700,400' ) );
	array_push( $accelerate_googlefonts, accelerate_options( 'accelerate_site_tagline_font', 'Roboto+Slab:700,400' ) );
	array_push( $accelerate_googlefonts, accelerate_options( 'accelerate_primary_menu_font', 'Roboto:400,300,100' ) );
	array_push( $accelerate_googlefonts, accelerate_options( 'accelerate_header_menu_font', 'Roboto:400,300,100' ) );
	array_push( $accelerate_googlefonts, accelerate_options( 'accelerate_titles_font', 'Roboto+Slab:700,400' ) );
	array_push( $accelerate_googlefonts, accelerate_options( 'accelerate_content_font', 'Roboto:400,300,100' ) );

	$accelerate_googlefonts = array_unique( $accelerate_googlefonts );
  	$accelerate_googlefonts = implode("|", $accelerate_googlefonts);

  	wp_register_style( 'accelerate_googlefonts', '//fonts.googleapis.com/css?family='.$accelerate_googlefonts );
  	wp_enqueue_style( 'accelerate_googlefonts' );

	/**
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/**
	 * Register JQuery cycle js file for slider.
	 */
	wp_register_script( 'jquery_cycle', ACCELERATE_JS_URL . '/jquery.cycle2' . $suffix . '.js', array( 'jquery' ), '2.1.6', true );
	wp_register_script( 'jquery-cycle2-swipe', ACCELERATE_JS_URL . '/jquery.cycle2.swipe' . $suffix . '.js', array( 'jquery' ), false, true );

	/**
	 * Enqueue Slider setup js file.
	 */
	if ( accelerate_options( 'accelerate_activate_slider', '0' ) == '1' ) {
		if ( ( accelerate_options( 'accelerate_slider_status', 'front_page' ) == 'all_page' ) || ( is_front_page() && accelerate_options( 'accelerate_slider_status', 'front_page' ) == 'front_page' ) ) {
			wp_enqueue_script( 'jquery_cycle' );
		}
	}

	// Waypoints Script
   wp_enqueue_script( 'waypoints', ACCELERATE_JS_URL . '/waypoints' . $suffix . '.js', array( 'jquery' ), '2.0.3', true );

   // CounterUp Script
   wp_enqueue_script( 'counterup', ACCELERATE_JS_URL . '/jquery.counterup' . $suffix . '.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'accelerate-navigation', ACCELERATE_JS_URL . '/navigation' . $suffix . '.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'accelerate-custom', ACCELERATE_JS_URL. '/accelerate-custom' . $suffix . '.js', array( 'jquery' ), false, true );

	wp_enqueue_style( 'accelerate-fontawesome', get_template_directory_uri().'/fontawesome/css/font-awesome' . $suffix . '.css', array(), '4.7.0' );

	wp_enqueue_script( 'html5shiv', ACCELERATE_JS_URL.'/html5shiv.js', array(), '3.7.3', false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lte IE 8' );

	// Theia Sticky Sidebar enqueue
	if ( accelerate_options( 'accelerate_sticky_content_sidebar', '0' ) == '1' )  {
		wp_enqueue_script( 'theia-sticky-sidebar', ACCELERATE_JS_URL . '/theia-sticky-sidebar/theia-sticky-sidebar' . $suffix . '.js', array( 'jquery' ), '1.7.0', true );
		wp_enqueue_script( 'ResizeSensor', ACCELERATE_JS_URL . '/theia-sticky-sidebar/ResizeSensor' . $suffix . '.js', array( 'jquery' ), false, true );
	}
}

/****************************************************************************************/
/**
 * Add admin scripts and styles.
 */

function accelerate_admin_scripts( $hook ) {
   global $post_type;
   if( $hook == 'widgets.php' || $hook == 'customize.php' ) {
   	wp_enqueue_media();
    //For color
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'accelerate-color-picker', ACCELERATE_JS_URL. '/color-picker.js', array( 'jquery' ), false, true );

    }
}
add_action('admin_enqueue_scripts', 'accelerate_admin_scripts');

/****************************************************************************************/

add_filter( 'excerpt_length', 'accelerate_excerpt_length' );
/**
 * Sets the post excerpt length to 40 words.
 *
 * function tied to the excerpt_length filter hook.
 *
 * @uses filter excerpt_length
 */
function accelerate_excerpt_length( $length ) {
	$excerpt_length = accelerate_options( 'accelerate_excerpt_length', '40' );
	return $excerpt_length;
}

add_filter( 'excerpt_more', 'accelerate_read_more' );
/**
 * Returns a "Read more" link for excerpts
 */
function accelerate_read_more() {
	return '';
}

/****************************************************************************************/

/**
 * Removing the default style of wordpress gallery
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Filtering the size to be medium from thumbnail to be used in WordPress gallery as a default size
 */
function accelerate_gallery_atts( $out, $pairs, $atts ) {
	$atts = shortcode_atts( array(
	'size' => 'medium',
	), $atts );

	$out['size'] = $atts['size'];

	return $out;

}
add_filter( 'shortcode_atts_gallery', 'accelerate_gallery_atts', 10, 3 );

/****************************************************************************************/

add_filter( 'body_class', 'accelerate_body_class' );
/**
 * Filter the body_class
 *
 * Throwing different body class for the different layouts in the body tag
 */
function accelerate_body_class( $classes ) {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, 'accelerate_page_layout', true ); }

	if( is_home() ) {
		$queried_id = get_option( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, 'accelerate_page_layout', true );
	}
	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$accelerate_default_layout = accelerate_options( 'accelerate_default_layout', 'right_sidebar' );

	$accelerate_default_page_layout = accelerate_options( 'accelerate_pages_default_layout', 'right_sidebar' );
	$accelerate_default_post_layout = accelerate_options( 'accelerate_single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() ) {
			if( $accelerate_default_page_layout == 'right_sidebar' ) { $classes[] = ''; }
			elseif( $accelerate_default_page_layout == 'left_sidebar' ) { $classes[] = 'left-sidebar'; }
			elseif( $accelerate_default_page_layout == 'no_sidebar_full_width' ) { $classes[] = 'no-sidebar-full-width'; }
			elseif( $accelerate_default_page_layout == 'no_sidebar_content_centered' ) { $classes[] = 'no-sidebar'; }
		}
		elseif( is_single() ) {
			if( $accelerate_default_post_layout == 'right_sidebar' ) { $classes[] = ''; }
			elseif( $accelerate_default_post_layout == 'left_sidebar' ) { $classes[] = 'left-sidebar'; }
			elseif( $accelerate_default_post_layout == 'no_sidebar_full_width' ) { $classes[] = 'no-sidebar-full-width'; }
			elseif( $accelerate_default_post_layout == 'no_sidebar_content_centered' ) { $classes[] = 'no-sidebar'; }
		}
		elseif( $accelerate_default_layout == 'right_sidebar' ) { $classes[] = ''; }
		elseif( $accelerate_default_layout == 'left_sidebar' ) { $classes[] = 'left-sidebar'; }
		elseif( $accelerate_default_layout == 'no_sidebar_full_width' ) { $classes[] = 'no-sidebar-full-width'; }
		elseif( $accelerate_default_layout == 'no_sidebar_content_centered' ) { $classes[] = 'no-sidebar'; }
	}
	elseif( $layout_meta == 'right_sidebar' ) { $classes[] = ''; }
	elseif( $layout_meta == 'left_sidebar' ) { $classes[] = 'left-sidebar'; }
	elseif( $layout_meta == 'no_sidebar_full_width' ) { $classes[] = 'no-sidebar-full-width'; }
	elseif( $layout_meta == 'no_sidebar_content_centered' ) { $classes[] = 'no-sidebar'; }

	if( accelerate_options( 'accelerate_new_menu', '1' ) == '1' ){
		$classes[] = 'better-responsive-menu';
	}
	if ( ( accelerate_options( 'accelerate_posts_page_display_type', 'large_image' ) == 'small_image' && is_home() ) || ( accelerate_options( 'accelerate_archive_display_type', 'large_image' ) == 'small_image' && !is_home() ) ) {
		$classes[] = 'blog-small';
	}
	if ( ( accelerate_options( 'accelerate_posts_page_display_type', 'large_image' ) == 'small_image_alternate' && is_home() ) || ( accelerate_options( 'accelerate_archive_display_type', 'large_image' ) == 'small_image_alternate' && !is_home() ) ) {
		$classes[] = 'blog-alternate-small';
	}

	if( accelerate_options( 'accelerate_site_layout', 'wide' ) == 'wide' ) {
		$classes[] = 'wide';
	}
	elseif( accelerate_options( 'accelerate_site_layout', 'wide' ) == 'box' ) {
		$classes[] = '';
	}

	return $classes;
}

/****************************************************************************************/

if ( ! function_exists( 'accelerate_sidebar_select' ) ) :
/**
 * Fucntion to select the sidebar
 */
function accelerate_sidebar_select() {
	global $post;

	if( $post ) { $layout_meta = get_post_meta( $post->ID, 'accelerate_page_layout', true ); }

	if( is_home() ) {
		$queried_id = get_option( 'page_for_posts' );
		$layout_meta = get_post_meta( $queried_id, 'accelerate_page_layout', true );
	}

	if( empty( $layout_meta ) || is_archive() || is_search() ) { $layout_meta = 'default_layout'; }
	$accelerate_default_layout = accelerate_options( 'accelerate_default_layout', 'right_sidebar' );

	$accelerate_default_page_layout = accelerate_options( 'accelerate_pages_default_layout', 'right_sidebar' );
	$accelerate_default_post_layout = accelerate_options( 'accelerate_single_posts_default_layout', 'right_sidebar' );

	if( $layout_meta == 'default_layout' ) {
		if( is_page() ) {
			if( $accelerate_default_page_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $accelerate_default_page_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		if( is_single() ) {
			if( $accelerate_default_post_layout == 'right_sidebar' ) { get_sidebar(); }
			elseif ( $accelerate_default_post_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
		}
		elseif( $accelerate_default_layout == 'right_sidebar' ) { get_sidebar(); }
		elseif ( $accelerate_default_layout == 'left_sidebar' ) { get_sidebar( 'left' ); }
	}
	elseif( $layout_meta == 'right_sidebar' ) { get_sidebar(); }
	elseif( $layout_meta == 'left_sidebar' ) { get_sidebar( 'left' ); }
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'accelerate_posts_listing_display_type_select' ) ) :
/**
 * Function to select the posts listing display type
 */
function accelerate_posts_listing_display_type_select() {
	if ( accelerate_options( 'accelerate_posts_page_display_type', 'large_image' ) == 'large_image' ) {
		$format = 'blog-large-image';
	}
	elseif ( accelerate_options( 'accelerate_posts_page_display_type', 'large_image' ) == 'small_image' ) {
		$format = 'blog-small-image';
	}
	elseif ( accelerate_options( 'accelerate_posts_page_display_type', 'large_image' ) == 'small_image_alternate' ) {
		$format = 'blog-small-image';
	}
	else {
		$format = get_post_format();
	}

	return $format;
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'accelerate_archive_display_type_select' ) ) :
/**
 * Function to select the archive page posts listing display type
 */
function accelerate_archive_display_type_select() {
	if ( accelerate_options( 'accelerate_archive_display_type', 'large_image' ) == 'large_image' ) {
		$format = 'blog-large-image';
	}
	elseif ( accelerate_options( 'accelerate_archive_display_type', 'large_image' ) == 'small_image' ) {
		$format = 'blog-small-image';
	}
	elseif ( accelerate_options( 'accelerate_archive_display_type', 'large_image' ) == 'small_image_alternate' ) {
		$format = 'blog-small-image';
	}
	else {
		$format = get_post_format();
	}

	return $format;
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'accelerate_entry_meta' ) ) :
function accelerate_entry_meta() {
	echo '<div class="entry-meta">';
	?>
	<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span>
	<?php

		$categories_list = get_the_category_list( __( ', ', 'accelerate' ) );
		if ( $categories_list )	printf( __( '<span class="cat-links"><i class="fa fa-folder-open"></i>%1$s</span>', 'accelerate' ), $categories_list );

		$post_format_icon = '';
		if( 'gallery' == get_post_format() ) {
			$post_format_icon = 'fa-picture-o';
		} else if ( 'video' == get_post_format() ) {
			$post_format_icon = 'fa-youtube-play';
		} else if ( 'quote' == get_post_format() ) {
			$post_format_icon = 'fa-quote-left';
		} else if ( 'link' == get_post_format() ) {
			$post_format_icon = 'fa-link';
		} else if ( 'image' == get_post_format() ) {
			$post_format_icon = 'fa-picture-o';
		} else if ( 'audio' == get_post_format() ) {
			$post_format_icon = 'fa-volume-up';
		} else if ( 'aside' == get_post_format() ) {
			$post_format_icon = 'fa-dot-circle-o';
		} else if ( 'chat' == get_post_format() ) {
			$post_format_icon = 'fa-comments-o';
		} else if ( 'status' == get_post_format() ) {
			$post_format_icon = 'fa-pencil';
		}

		if( is_sticky() ) { $post_format_icon = 'fa-paperclip'; }
		?>

		<span class="sep"><span class="post-format"><i class="fa <?php echo $post_format_icon; ?>"></i></span></span>

		<?php
   	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
      if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
         $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
      }
      $time_string = sprintf( $time_string,
         esc_attr( get_the_date( 'c' ) ),
         esc_html( get_the_date() ),
         esc_attr( get_the_modified_date( 'c' ) ),
         esc_html( get_the_modified_date() )
      );
   	printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'accelerate' ),
   		esc_url( get_permalink() ),
   		esc_attr( get_the_time() ),
   		$time_string
   	);

   	$tags_list = get_the_tag_list( '<span class="tag-links"><i class="fa fa-tags"></i>', __( ', ', 'accelerate' ), '</span>' );
   	if ( $tags_list ) echo $tags_list;

   	if ( ! post_password_required() && comments_open() ) { ?>
   		<span class="comments-link"><?php comments_popup_link( __( '<i class="fa fa-comment"></i> 0 Comment', 'accelerate' ), __( '<i class="fa fa-comment"></i> 1 Comment', 'accelerate' ), __( '<i class="fa fa-comments"></i> % Comments', 'accelerate' ) ); ?></span>
   	<?php }

   	edit_post_link( __( 'Edit', 'accelerate' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' );

   	echo '</div>';
}
endif;

/****************************************************************************************/

add_action( 'admin_head', 'accelerate_favicon' );
add_action( 'wp_head', 'accelerate_favicon' );
/**
 * Fav icon for the site
 */
function accelerate_favicon() {
	if ( accelerate_options( 'accelerate_activate_favicon', '0' ) == '1' ) {
		$accelerate_favicon = accelerate_options( 'accelerate_favicon', '' );
		$accelerate_favicon_output = '';
		if ( ! function_exists( 'has_site_icon' ) || ( ! empty( $accelerate_favicon ) && ! has_site_icon() ) ) {
			$accelerate_favicon_output .= '<link rel="shortcut icon" href="'.esc_url( $accelerate_favicon ).'" type="image/x-icon" />';
		}
		echo $accelerate_favicon_output;
	}
}


/****************************************************************************************/
if ( ! function_exists( 'accelerate_darkcolor' ) ) :
/**
 * Generate darker color
 * Source: http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 */
function accelerate_darkcolor($hex, $steps) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter
	$steps = max(-255, min(255, $steps));

	// Normalize into a six character long hex string
	$hex = str_replace('#', '', $hex);
	if (strlen($hex) == 3) {
		$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
	}

	// Split into three parts: R, G and B
	$color_parts = str_split($hex, 2);
	$return = '#';

	foreach ($color_parts as $color) {
		$color   = hexdec($color); // Convert to decimal
		$color   = max(0,min(255,$color + $steps)); // Adjust color
		$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
	}

	return $return;
}
endif;

/****************************************************************************************/

add_action('wp_head', 'accelerate_custom_css', 100);
/**
 * Hooks the Custom Internal CSS to head section
 */
function accelerate_custom_css() {
	$accelerate_internal_css = '';

	if( accelerate_options( 'accelerate_header_display_type', 'one' ) == 'two' ) {
		$accelerate_internal_css .=  ' #header-left-section{float:right;margin-right:0}#header-logo-image{padding-left:20px}#header-text{padding-right:0}#header-right-section{float:left}#header-right-section .widget{text-align:left}@media screen and (max-width:768px){#header-left-section,#header-right-section{float:none}#header-right-section .widget{text-align:center}}' . "\n";
	}
	elseif( accelerate_options( 'accelerate_header_display_type', 'one' ) == 'three' ) {
		$accelerate_internal_css .=  ' #header-text-nav-wrap{padding:15px 0}#header-left-section{float:none;max-width:100%;margin-right:0}#header-logo-image{float:none;text-align:center;margin-bottom:10px}#header-text{float:none;text-align:center;padding:0;margin-bottom:10px}#site-description{padding-bottom:5px}#header-right-section{float:none;max-width:100%}#header-right-section .widget{padding:0 0 10px;float:none;text-align:center}' . "\n";
	}
	else {
		$accelerate_internal_css .= '';
	}

	if( accelerate_options( 'accelerate_menu_display_type', 'one' ) == 'two' ) {
		$accelerate_internal_css .=  ' .main-navigation{text-align:center}.main-navigation a,.main-navigation li{display:inline-block;float:none}.main-navigation ul li ul li:last-child{float:left}.main-navigation ul li ul li{float:left;text-align:left}.main-navigation ul li ul li a,.main-navigation ul li ul li.current-menu-item a,.main-navigation ul li.current-menu-ancestor ul li a,.main-navigation ul li.current-menu-item ul li a,.main-navigation ul li.current_page_ancestor ul li a,.main-navigation ul li.current_page_item ul li a{width:172px}' . "\n";
	}
	elseif( accelerate_options( 'accelerate_menu_display_type', 'one' ) == 'three' ) {
		$accelerate_internal_css .=  ' .menu-primary-container{float:right}.main-navigation ul li ul li ul{right:200px;left:auto}' . "\n";
	}
	else {
		$accelerate_internal_css .= '';
	}

	if( accelerate_options( 'accelerate_top_bar_display_type', 'one' ) == 'two' ) {
		$accelerate_internal_css .=  ' .social-links{float:right;padding-left:15px;padding-right:0}.small-menu{float:left}.small-menu li:last-child a{padding-right:12px}.small-menu ul li ul li ul{left:150px;right:auto}@media screen and (max-width:768px){.top-menu-toggle{left:12px;position:absolute;right:auto}}' . "\n";
	}
	else {
		$accelerate_internal_css .= '';
	}

	$primary_color = accelerate_options( 'accelerate_primary_color', '#77cc6d' );
	$primary_dark    = accelerate_darkcolor($primary_color, -50);
	if( $primary_color != '#77cc6d' ) {
		$accelerate_internal_css .= ' .accelerate-button,blockquote,button,input[type=button],input[type=reset],input[type=submit]{background-color:'.$primary_color.'}#site-title a:hover,.next a:hover,.previous a:hover,a{color:'.$primary_color.'}#search-form span,.main-navigation a:hover,.main-navigation ul li ul li a:hover,.main-navigation ul li ul li:hover>a,.main-navigation ul li.current-menu-ancestor a,.main-navigation ul li.current-menu-item a,.main-navigation ul li.current-menu-item ul li a:hover,.main-navigation ul li.current_page_ancestor a,.main-navigation ul li.current_page_item a,.main-navigation ul li:hover>a,.main-small-navigation li:hover > a,.main-navigation ul ul.sub-menu li.current-menu-ancestor> a,.main-navigation ul li.current-menu-ancestor li.current_page_item> a{background-color:'.$primary_color.'}.site-header .menu-toggle:before{color:'.$primary_color.'}.main-small-navigation li a:hover,.widget_team_block .more-link{background-color:'.$primary_color.'}.main-small-navigation .current-menu-item a,.main-small-navigation .current_page_item a,.team-title::b {background:'.$primary_color.'}.footer-menu a:hover,.footer-menu ul li.current-menu-ancestor a,.footer-menu ul li.current-menu-item a,.footer-menu ul li.current_page_ancestor a,.footer-menu ul li.current_page_item a,.footer-menu ul li:hover>a,.widget_team_block .team-title:hover>a{color:'.$primary_color.'}a.slide-prev,a.slide-next,.slider-title-head .entry-title a{background-color:'.$primary_color.'}#controllers a.active,#controllers a:hover,.widget_team_block .team-social-icon a:hover{background-color:'.$primary_color.';color:'.$primary_color.'}.format-link .entry-content a{background-color:'.$primary_color.'}.tg-one-fourth .widget-title a:hover,.tg-one-half .widget-title a:hover,.tg-one-third .widget-title a:hover,.widget_featured_posts .tg-one-half .entry-title a:hover,.widget_image_service_block .entry-title a:hover,.widget_service_block i.fa,.widget_fun_facts .counter-icon i{color:'.$primary_color.'}#content .wp-pagenavi .current,#content .wp-pagenavi a:hover,.pagination span{background-color:'.$primary_color.'}.pagination a span:hover{color:'.$primary_color.';border-color:'.$primary_color.'}#content .comments-area a.comment-edit-link:hover,#content .comments-area a.comment-permalink:hover,#content .comments-area article header cite a:hover,.comments-area .comment-author-link a:hover,.widget_testimonial .testimonial-icon:before,.widget_testimonial i.fa-quote-left{color:'.$primary_color.'}#wp-calendar #today,.comment .comment-reply-link:hover,.nav-next a:hover,.nav-previous a:hover{color:'.$primary_color.'}.widget-title span{border-bottom:2px solid '.$primary_color.'}#secondary h3 span:before,.footer-widgets-area h3 span:before{color:'.$primary_color.'}#secondary .accelerate_tagcloud_widget a:hover,.footer-widgets-area .accelerate_tagcloud_widget a:hover{background-color:'.$primary_color.'}.footer-socket-wrapper .copyright a:hover,.footer-widgets-area a:hover{color:'.$primary_color.'}a#scroll-up{background-color:'.$primary_color.'}.entry-meta .byline i,.entry-meta .cat-links i,.entry-meta a,.post .entry-title a:hover{color:'.$primary_color.'}.entry-meta .post-format i{background-color:'.$primary_color.'}.entry-meta .comments-link a:hover,.entry-meta .edit-link a:hover,.entry-meta .posted-on a:hover,.entry-meta .tag-links a:hover{color:'.$primary_color.'}.more-link span,.read-more{background-color:'.$primary_color.'}.single #content .tags a:hover{color:'.$primary_color.'}#page{border-top:3px solid '.$primary_color.'}.nav-menu li a:hover,.top-menu-toggle:before{color:'.$primary_color.'}.footer-socket-wrapper{border-top: 3px solid '.$primary_color.';}.comments-area .comment-author-link span,{background-color:'.$primary_color.'}@media screen and (max-width: 767px){.better-responsive-menu .sub-toggle{background-color:'.$primary_dark.'}}.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button,main-navigation li.menu-item-has-children:hover, .main-small-navigation .current_page_item > a, .main-small-navigation .current-menu-item > a { background-color: '.$primary_color.'; } @media(max-width: 1024px) and (min-width: 768px){
			.main-navigation li.menu-item-has-children:hover,.main-navigation li.current_page_item{background:'.$primary_color.';}}.widget_our_clients .clients-cycle-prev, .widget_our_clients .clients-cycle-next{background-color:'.$primary_color.'}';
	}

	if( accelerate_options( 'accelerate_site_title_font', 'Roboto+Slab:700,400' ) != 'Roboto+Slab:700,400' ) {
		$accelerate_internal_css .= ' #site-title a { font-family: "'.accelerate_options( 'accelerate_site_title_font', 'Roboto+Slab:700,400' ).'"; }';
	}
	if( accelerate_options( 'accelerate_site_tagline_font', 'Roboto+Slab:700,400' ) != 'Roboto+Slab:700,400' ) {
		$accelerate_internal_css .= ' #site-description { font-family: "'.accelerate_options( 'accelerate_site_tagline_font', 'Roboto+Slab:700,400' ).'"; }';
	}
	if( accelerate_options( 'accelerate_primary_menu_font', 'Roboto:400,300,100' ) != 'Roboto:400,300,100' ) {
		$accelerate_internal_css .= ' .main-navigation li { font-family: "'.accelerate_options( 'accelerate_primary_menu_font', 'Roboto:400,300,100' ).'"; }';
	}
	if( accelerate_options( 'accelerate_header_menu_font', 'Roboto:400,300,100' ) != 'Roboto:400,300,100' ) {
		$accelerate_internal_css .= ' .small-menu li { font-family: "'.accelerate_options( 'accelerate_header_menu_font', 'Roboto:400,300,100' ).'"; }';
	}
	if( accelerate_options( 'accelerate_titles_font', 'Roboto+Slab:700,400' ) != 'Roboto+Slab:700,400' ) {
		$accelerate_internal_css .= ' h1, h2, h3, h4, h5, h6, .widget_recent_work .recent_work_title .title_box h5 { font-family: "'.accelerate_options( 'accelerate_titles_font', 'Roboto+Slab:700,400' ).'"; }';
	}
	if( accelerate_options( 'accelerate_content_font', 'Roboto:400,300,100' ) != 'Roboto:400,300,100' ) {
		$accelerate_internal_css .= ' body, button, input, select, textarea, p, .entry-meta, .read-more, .more-link, .widget_testimonial .testimonial-author, .widget_testimonial .testimonial-author span { font-family: "'.accelerate_options( 'accelerate_content_font', 'Roboto:400,300,100' ).'"; }';
	}

	if( accelerate_options( 'accelerate_site_title_font_size', '36' ) != '36' ) {
		$accelerate_internal_css .= ' #site-title a { font-size: '.accelerate_options( 'accelerate_site_title_font_size', '36' ).'px; }';
	}
	if( accelerate_options( 'accelerate_tagline_font_size', '16' ) != '16' ) {
		$accelerate_internal_css .= ' #site-description { font-size: '.accelerate_options( 'accelerate_tagline_font_size', '16' ).'px; }';
	}
	if( accelerate_options( 'accelerate_primary_menu_font_size', '16' ) != '16' ) {
		$accelerate_internal_css .= ' .main-navigation ul li a { font-size: '.accelerate_options( 'accelerate_primary_menu_font_size', '16' ).'px; }';
	}
	if( accelerate_options( 'accelerate_primary_sub_menu_font_size', '14' ) != '14' ) {
		$accelerate_internal_css .= ' .main-navigation ul li ul li a { font-size: '.accelerate_options( 'accelerate_primary_sub_menu_font_size', '14' ).'px; }';
	}
	if( accelerate_options( 'accelerate_header_menu_font_size', '14' ) != '14' ) {
		$accelerate_internal_css .= ' .small-menu ul li a { font-size: '.accelerate_options( 'accelerate_header_menu_font_size', '14' ).'px; }';
	}
	if( accelerate_options( 'accelerate_header_sub_menu_font_size', '12' ) != '12' ) {
		$accelerate_internal_css .= ' .small-menu ul li ul li a { font-size: '.accelerate_options( 'accelerate_header_sub_menu_font_size', '12' ).'px; }';
	}
	if( accelerate_options( 'accelerate_slider_title_font_size', '22' ) != '22' ) {
		$accelerate_internal_css .= ' .slider-title-head .entry-title a  { font-size: '.accelerate_options( 'accelerate_slider_title_font_size', '22' ).'px; }';
	}
	if( accelerate_options( 'accelerate_slider_content_font_size', '15' ) != '15' ) {
		$accelerate_internal_css .= ' #featured-slider .entry-content p { font-size: '.accelerate_options( 'accelerate_slider_content_font_size', '15' ).'px; }';
	}
	if( accelerate_options( 'accelerate_h1_title_font_size', '30' ) != '30' ) {
		$accelerate_internal_css .= ' h1 { font-size: '.accelerate_options( 'accelerate_h1_title_font_size', '30' ).'px; }';
	}
	if( accelerate_options( 'accelerate_h2_title_font_size', '28' ) != '28' ) {
		$accelerate_internal_css .= ' h2 { font-size: '.accelerate_options( 'accelerate_h2_title_font_size', '28' ).'px; }';
	}
	if( accelerate_options( 'accelerate_h3_title_font_size', '26' ) != '26' ) {
		$accelerate_internal_css .= ' h3 { font-size: '.accelerate_options( 'accelerate_h3_title_font_size', '26' ).'px; }';
	}
	if( accelerate_options( 'accelerate_h4_title_font_size', '24' ) != '24' ) {
		$accelerate_internal_css .= ' h4 { font-size: '.accelerate_options( 'accelerate_h4_title_font_size', '24' ).'px; }';
	}
	if( accelerate_options( 'accelerate_h5_title_font_size', '22' ) != '22' ) {
		$accelerate_internal_css .= ' h5 { font-size: '.accelerate_options( 'accelerate_h5_title_font_size', '22' ).'px; }';
	}
	if( accelerate_options( 'accelerate_h6_title_font_size', '19' ) != '19' ) {
		$accelerate_internal_css .= ' h6 { font-size: '.accelerate_options( 'accelerate_h6_title_font_size', '19' ).'px; }';
	}
	if( accelerate_options( 'accelerate_image_service_widget_title_font_size', '22' ) != '22' ) {
		$accelerate_internal_css .= ' .widget_image_service_block .entry-title { font-size: '.accelerate_options( 'accelerate_image_service_widget_title_font_size', '22' ).'px; }';
	}
	if( accelerate_options( 'accelerate_call_to_action_widget_title_font_size', '28' ) != '28' ) {
		$accelerate_internal_css .= ' .call-to-action-content h3 { font-size: '.accelerate_options( 'accelerate_call_to_action_widget_title_font_size', '28' ).'px; }';
	}
	if( accelerate_options( 'accelerate_featured_widget_titles_font_size', '16' ) != '16' ) {
		$accelerate_internal_css .= ' .widget_recent_work .recent_work_title .title_box h5 { font-size: '.accelerate_options( 'accelerate_featured_widget_titles_font_size', '16' ).'px; }';
	}
	if( accelerate_options( 'accelerate_widget_titles_font_size', '22' ) != '22' ) {
		$accelerate_internal_css .= ' #secondary h3.widget-title { font-size: '.accelerate_options( 'accelerate_widget_titles_font_size', '22' ).'px; }';
	}
	if( accelerate_options( 'accelerate_footer_widget_titles_font_size', '22' ) != '22' ) {
		$accelerate_internal_css .= ' #colophon .widget-title { font-size: '.accelerate_options( 'accelerate_footer_widget_titles_font_size', '22' ).'px; }';
	}
	if( accelerate_options( 'accelerate_post_title_font_size', '26' ) != '26' ) {
		$accelerate_internal_css .= ' .post .entry-title { font-size: '.accelerate_options( 'accelerate_post_title_font_size', '26' ).'px; }';
	}
	if( accelerate_options( 'accelerate_page_title_font_size', '30' ) != '30' ) {
		$accelerate_internal_css .= ' .type-page .entry-title { font-size: '.accelerate_options( 'accelerate_page_title_font_size', '30' ).'px; }';
	}
	if( accelerate_options( 'accelerate_comment_title_font_size', '26' ) != '26' ) {
		$accelerate_internal_css .= ' .comments-title, .comment-reply-title { font-size: '.accelerate_options( 'accelerate_comment_title_font_size', '26' ).'px; }';
	}
	if( accelerate_options( 'accelerate_content_font_size', '16' ) != '16' ) {
		$accelerate_internal_css .= ' body, button, input, select, textarea, p, dl, .accelerate-button, input[type="reset"], input[type="button"], input[type="submit"], button, .previous a, .next a, .widget_testimonial .testimonial-author span, .nav-previous a, .nav-next a, #respond h3#reply-title #cancel-comment-reply-link, #respond form input[type="text"],
#respond form textarea, #secondary .widget, .error-404 .widget { font-size: '.accelerate_options( 'accelerate_content_font_size', '16' ).'px; }';
	}
	if( accelerate_options( 'accelerate_post_meta_font_size', '16' ) != '16' ) {
		$accelerate_internal_css .= ' .entry-meta { font-size: '.accelerate_options( 'accelerate_post_meta_font_size', '16' ).'px; }';
	}
	if( accelerate_options( 'accelerate_other_post_meta_font_size', '12' ) != '12' ) {
		$accelerate_internal_css .= ' .entry-meta .posted-on, .entry-meta .comments-link, .entry-meta .edit-link, .entry-meta .tag-links { font-size: '.accelerate_options( 'accelerate_other_post_meta_font_size', '12' ).'px; }';
	}
	if( accelerate_options( 'accelerate_footer_widget_content_font_size', '14' ) != '14' ) {
		$accelerate_internal_css .= ' #colophon, #colophon p { font-size: '.accelerate_options( 'accelerate_footer_widget_content_font_size', '14' ).'px; }';
	}
	if( accelerate_options( 'accelerate_footer_copyright_text_font_size', '12' ) != '12' ) {
		$accelerate_internal_css .= ' .footer-socket-wrapper .copyright { font-size: '.accelerate_options( 'accelerate_footer_copyright_text_font_size', '12' ).'px; }';
	}
	if( accelerate_options( 'accelerate_small_footer_menu_font_size', '12' ) != '12' ) {
		$accelerate_internal_css .= ' #colophon .footer-menu a { font-size: '.accelerate_options( 'accelerate_small_footer_menu_font_size', '12' ).'px; }';
	}


	if( accelerate_options( 'accelerate_site_title_text_color', '#555555' ) != '#555555' ) {
		$accelerate_internal_css .= ' #site-title a { color: '.accelerate_options( 'accelerate_site_title_text_color', '#555555' ).'; }';
	}
	if( accelerate_options( 'accelerate_site_tagline_text_color', '#999999' ) != '#999999' ) {
		$accelerate_internal_css .= ' #site-description { color: '.accelerate_options( 'accelerate_site_tagline_text_color', '#999999' ).'; }';
	}
	if( accelerate_options( 'accelerate_primary_menu_text_color', '#444444' ) != '#444444' ) {
		$accelerate_internal_css .= ' .main-navigation a, .main-navigation ul li ul li a, .main-navigation ul li.current-menu-item ul li a, .main-navigation ul li ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor ul li a, .main-navigation ul li.current-menu-ancestor ul li a, .main-navigation ul li.current_page_item ul li a { color: '.accelerate_options( 'accelerate_primary_menu_text_color', '#444444' ).'; }';
	}
	if( accelerate_options( 'accelerate_primary_menu_background_color', '#77cc6d' ) != '#77cc6d' ) {
		$accelerate_internal_css .= ' .main-navigation a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor a, .main-navigation ul li.current-menu-ancestor a, .main-navigation ul li.current_page_item a, .main-navigation ul li:hover > a, .main-navigation ul li ul li a:hover, .main-navigation ul li ul li:hover > a, .main-navigation ul li.current-menu-item ul li a:hover { background-color: '.accelerate_options( 'accelerate_primary_menu_background_color', '#77cc6d' ).'; }';
	}
	if( accelerate_options( 'accelerate_primary_menu_bar_background_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' .main-navigation, .main-navigation ul li ul li a, .main-navigation ul li.current-menu-item ul li a, .main-navigation ul li ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor ul li a,
.main-navigation ul li.current-menu-ancestor ul li a, .main-navigation ul li.current_page_item ul li a,
.main-navigation .menu-toggle, .main-small-navigation .menu-toggle, .main-small-navigation ul li ul li a, .main-small-navigation ul li.current-menu-item ul li a, .main-small-navigation ul li ul li.current-menu-item a, .main-small-navigation ul li.current_page_ancestor ul li a, .main-small-navigation li { background-color: '.accelerate_options( 'accelerate_primary_menu_bar_background_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_header_background_color', '#f8f8f8' ) != '#f8f8f8' ) {
		$accelerate_internal_css .= ' #header-text-nav-container { background-color: '.accelerate_options( 'accelerate_header_background_color', '#f8f8f8' ).'; }';
	}
	if( accelerate_options( 'accelerate_header_top_bar_background_color', '#262626' ) != '#262626' ) {
		$accelerate_internal_css .= ' #header-meta { background-color: '.accelerate_options( 'accelerate_header_top_bar_background_color', '#262626' ).'; }';
	}
	if( accelerate_options( 'accelerate_top_menu_item_color', '#cccccc' ) != '#cccccc' ) {
		$accelerate_internal_css .= ' .small-menu a, .small-menu ul li ul li a, .small-menu ul li.current-menu-item ul li a, .small-menu ul li ul li.current-menu-item a, .small-menu ul li.current_page_ancestor ul li a, .small-menu ul li.current-menu-ancestor ul li a, .small-menu ul li.current_page_item ul li a { color: '.accelerate_options( 'accelerate_top_menu_item_color', '#cccccc' ).'; }';
	}
	if( accelerate_options( 'accelerate_top_menu_selected_item_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' .small-menu a:hover, .small-menu ul li.current-menu-item a, .small-menu ul li.current_page_ancestor a,
.small-menu ul li.current-menu-ancestor a, .small-menu ul li.current_page_item a, .small-menu ul li:hover > a, .small-menu ul li ul li a:hover, .small-menu ul li ul li:hover > a, .small-menu ul li.current-menu-item ul li a:hover { color: '.accelerate_options( 'accelerate_top_menu_selected_item_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_top_menu_dropdown_background_color', '#262626' ) != '#262626' ) {
		$accelerate_internal_css .= ' .small-menu ul li ul li a, .small-menu ul li.current-menu-item ul li a, .small-menu ul li ul li.current-menu-item a, .small-menu ul li.current_page_ancestor ul li a, .small-menu ul li.current-menu-ancestor ul li a, .small-menu ul li.current_page_item ul li a { background-color: '.accelerate_options( 'accelerate_top_menu_dropdown_background_color', '#262626' ).'; }';
	}
	if( accelerate_options( 'accelerate_header_top_line_color', '#77cc6d' ) != '#77cc6d' ) {
		$accelerate_internal_css .= ' #page { border-top-color: '.accelerate_options( 'accelerate_header_top_line_color', '#77cc6d' ).'; }';
	}
	if( accelerate_options( 'accelerate_slider_title_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' .slider-title-head .entry-title a { color: '.accelerate_options( 'accelerate_slider_title_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_slider_title_background_color', '#77cc6d' ) != '#77cc6d' ) {
		$accelerate_internal_css .= ' .slider-title-head .entry-title a { background-color: '.accelerate_options( 'accelerate_slider_title_background_color', '#77cc6d' ).'; }';
	}
	if( accelerate_options( 'accelerate_slider_content_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' #featured-slider .entry-content { color: '.accelerate_options( 'accelerate_slider_content_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_slider_background_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' #featured-slider, #featured-slider .slider-cycle { background-color: '.accelerate_options( 'accelerate_slider_background_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_content_part_titles_color', '#444444' ) != '#444444' ) {
		$accelerate_internal_css .= ' h1, h2, h3, h4, h5, h6, .widget_our_clients .widget-title, .widget_recent_work .widget-title,
.widget_image_service_block .entry-title a, .widget_featured_posts .widget-title { color: '.accelerate_options( 'accelerate_content_part_titles_color', '#444444' ).'; }';
	}
	if( accelerate_options( 'accelerate_posts_title_color', '#444444' ) != '#444444' ) {
		$accelerate_internal_css .= ' .post .entry-title, .post .entry-title a, .widget_featured_posts .tg-one-half .entry-title a { color: '.accelerate_options( 'accelerate_posts_title_color', '#444444' ).'; }';
	}
	if( accelerate_options( 'accelerate_page_title_color', '#444444' ) != '#444444' ) {
		$accelerate_internal_css .= ' .type-page .entry-title { color: '.accelerate_options( 'accelerate_page_title_color', '#444444' ).'; }';
	}
	if( accelerate_options( 'accelerate_content_text_color', '#666666' ) != '#666666' ) {
		$accelerate_internal_css .= ' body, button, input, select, textarea { color: '.accelerate_options( 'accelerate_content_text_color', '#666666' ).'; }';
	}
	if( accelerate_options( 'accelerate_post_meta_color', '#77cc6d' ) != '#77cc6d' ) {
		$accelerate_internal_css .= ' .entry-meta .byline i, .entry-meta .cat-links i, .entry-meta a { color: '.accelerate_options( 'accelerate_post_meta_color', '#77cc6d' ).'; }';
	}
	if( accelerate_options( 'accelerate_post_other_meta_color', '#aaaaaa' ) != '#aaaaaa' ) {
		$accelerate_internal_css .= ' .entry-meta .posted-on a, .entry-meta .comments-link a, .entry-meta .edit-link a, .entry-meta .tag-links a { color: '.accelerate_options( 'accelerate_post_other_meta_color', '#aaaaaa' ).'; }';
	}
	if( accelerate_options( 'accelerate_button_text_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' .accelerate-button, input[type="reset"], input[type="button"], input[type="submit"], button, .read-more, .more-link span { color: '.accelerate_options( 'accelerate_button_text_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_button_background_color', '#77cc6d' ) != '#77cc6d' ) {
		$accelerate_internal_css .= ' .accelerate-button, input[type="reset"], input[type="button"], input[type="submit"], button, .read-more, .more-link span { background-color: '.accelerate_options( 'accelerate_button_background_color', '#77cc6d' ).'; }';
	}
	if( accelerate_options( 'accelerate_widget_title_color', '#444444' ) != '#444444' ) {
		$accelerate_internal_css .= ' #secondary h3.widget-title { color: '.accelerate_options( 'accelerate_widget_title_color', '#444444' ).'; }';
	}
	if( accelerate_options( 'accelerate_content_background_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' #main { background-color: '.accelerate_options( 'accelerate_content_background_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_call_to_action_background_color', '#f8f8f8' ) != '#f8f8f8' ) {
		$accelerate_internal_css .= ' .call-to-action-content-wrapper { background-color: '.accelerate_options( 'accelerate_call_to_action_background_color', '#f8f8f8' ).'; }';
	}
	if( accelerate_options( 'accelerate_testimonial_background_color', '#fcfcfc' ) != '#fcfcfc' ) {
		$accelerate_internal_css .= ' .widget_testimonial .testimonial-post { background-color: '.accelerate_options( 'accelerate_testimonial_background_color', '#fcfcfc' ).'; }';
	}
	if( accelerate_options( 'accelerate_footer_widget_title_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' .footer-widgets-area h3.widget-title { color: '.accelerate_options( 'accelerate_footer_widget_title_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_footer_widget_content_color', '#aaaaaa' ) != '#aaaaaa' ) {
		$accelerate_internal_css .= ' .footer-widgets-area, .footer-widgets-area p { color: '.accelerate_options( 'accelerate_footer_widget_content_color', '#aaaaaa' ).'; }';
	}
	if( accelerate_options( 'accelerate_footer_widget_link_color', '#ffffff' ) != '#ffffff' ) {
		$accelerate_internal_css .= ' .footer-widgets-area a { color: '.accelerate_options( 'accelerate_footer_widget_link_color', '#ffffff' ).'; }';
	}
	if( accelerate_options( 'accelerate_footer_widget_background_color', '#27313d' ) != '#27313d' ) {
		$accelerate_internal_css .= ' .footer-widgets-wrapper { background-color: '.accelerate_options( 'accelerate_footer_widget_background_color', '#27313d' ).'; }';
	}
	if( accelerate_options( 'accelerate_footer_copyright_text_color', '#666666' ) != '#666666' ) {
		$accelerate_internal_css .= ' .footer-socket-wrapper .copyright { color: '.accelerate_options( 'accelerate_footer_copyright_text_color', '#666666' ).'; }';
	}
	if( accelerate_options( 'accelerate_footer_small_menu_color', '#666666' ) != '#666666' ) {
		$accelerate_internal_css .= ' .footer-menu a { color: '.accelerate_options( 'accelerate_footer_small_menu_color', '#666666' ).'; }';
	}
	if( accelerate_options( 'accelerate_footer_copyright_part_background_color', '#f8f8f8' ) != '#f8f8f8' ) {
		$accelerate_internal_css .= ' .footer-socket-wrapper { background-color: '.accelerate_options( 'accelerate_footer_copyright_part_background_color', '#f8f8f8' ).'; }';
	}

	if( !empty( $accelerate_internal_css ) ) {
		?>
		<style type="text/css"><?php echo $accelerate_internal_css; ?></style>
		<?php
	}

	$accelerate_custom_css = accelerate_options( 'accelerate_custom_css' );
	if( $accelerate_custom_css && ! function_exists( 'wp_update_custom_css_post' ) ) {
		?>
		<style type="text/css"><?php echo $accelerate_custom_css; ?></style>
		<?php
	}
}

/**************************************************************************************/

/**
 * Removing the more link jumping to middle of content
 */
function accelerate_remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'accelerate_remove_more_jump_link');

/**************************************************************************************/

if ( ! function_exists( 'accelerate_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function accelerate_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'accelerate' ); ?></h3>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'accelerate' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'accelerate' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'accelerate' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'accelerate' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // accelerate_content_nav

/**************************************************************************************/

if ( ! function_exists( 'accelerate_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function accelerate_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'accelerate' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'accelerate' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 74 );
					printf( '<div class="comment-author-link"><i class="fa fa-user"></i>%1$s%2$s</div>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'accelerate' ) . '</span>' : ''
					);
					printf( '<div class="comment-date-time"><i class="fa fa-calendar-o"></i>%1$s</div>',
						sprintf( __( '%1$s at %2$s', 'accelerate' ), get_comment_date(), get_comment_time() )
					);
					printf( '<a class="comment-permalink" href="%1$s"><i class="fa fa-link"></i>Permalink</a>', esc_url( get_comment_link( $comment->comment_ID ) ) );
					edit_comment_link();
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'accelerate' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'accelerate' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</section><!-- .comment-content -->

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/**************************************************************************************/

/* Register shortcodes. */
add_action( 'init', 'accelerate_add_shortcodes' );
/**
 * Creates new shortcodes for use in any shortcode-ready area.  This function uses the add_shortcode()
 * function to register new shortcodes with WordPress.
 *
 * @uses add_shortcode() to create new shortcodes.
 */
function accelerate_add_shortcodes() {
	/* Add theme-specific shortcodes. */
	add_shortcode( 'the-year', 'accelerate_the_year_shortcode' );
	add_shortcode( 'site-link', 'accelerate_site_link_shortcode' );
	add_shortcode( 'wp-link', 'accelerate_wp_link_shortcode' );
	add_shortcode( 'tg-link', 'accelerate_themegrill_link_shortcode' );
}

/**
 * Shortcode to display the current year.
 *
 * @uses date() Gets the current year.
 * @return string
 */
function accelerate_the_year_shortcode() {
   return date( 'Y' );
}

/**
 * Shortcode to display a link back to the site.
 *
 * @uses get_bloginfo() Gets the site link
 * @return string
 */
function accelerate_site_link_shortcode() {
   return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
}

/**
 * Shortcode to display a link to WordPress.org.
 *
 * @return string
 */
function accelerate_wp_link_shortcode() {
   return '<a href="'.esc_url( 'http://wordpress.org' ).'" target="_blank" title="' . esc_attr__( 'WordPress', 'accelerate' ) . '"><span>' . __( 'WordPress', 'accelerate' ) . '</span></a>';
}

/**
 * Shortcode to display a link to accelerate.com.
 *
 * @return string
 */
function accelerate_themegrill_link_shortcode() {
   return '<a href="'.esc_url( 'https://themegrill.com' ).'" target="_blank" title="'.esc_attr__( 'ThemeGrill', 'accelerate' ).'" ><span>'.__( 'ThemeGrill', 'accelerate') .'</span></a>';
}

add_action( 'accelerate_footer_copyright', 'accelerate_footer_copyright', 10 );
/**
 * function to show the footer info, copyright information
 */
if ( ! function_exists( 'accelerate_footer_copyright' ) ) :
function accelerate_footer_copyright() {
	$default_footer_value = accelerate_options( 'accelerate_footer_editor', __( 'Copyright &copy; ', 'accelerate' ).'[the-year] [site-link] '.__( 'Theme by: ', 'accelerate' ).'[tg-link] '.__( 'Powered by: ', 'accelerate' ).'[wp-link]' );
	$accelerate_footer_copyright = '<div class="copyright">'.$default_footer_value.'</div>';
	echo do_shortcode( $accelerate_footer_copyright );
}
endif;

/**************************************************************************************/

/**
 * Making the theme Woocommrece compatible
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'accelerate_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'accelerate_wrapper_end', 10);

function accelerate_wrapper_start() {
  echo '<div id="primary">';
}

function accelerate_wrapper_end() {
  echo '</div>';
}

if ( ! function_exists( 'accelerate_woo_related_products_limit' ) ) {

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */
function accelerate_woo_related_products_limit() {
	global $product;
	$args = array(
		'posts_per_page' => 4,
		'columns' => 4,
		'orderby' => 'rand'
	);
	return $args;
}
}
add_filter( 'woocommerce_output_related_products_args', 'accelerate_woo_related_products_limit' );

/**
 * Migrate any existing theme CSS codes added in Customize Options to the core option added in WordPress 4.7
 */
function accelerate_custom_css_migrate() {
	if ( function_exists( 'wp_update_custom_css_post' ) ) {
		$custom_css = accelerate_options( 'accelerate_custom_css' );
		if ( $custom_css ) {
			$core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
			$return = wp_update_custom_css_post( $core_css . $custom_css );

			if ( ! is_wp_error( $return ) ) {

				$theme_options = get_option( 'accelerate' );

				// Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
				foreach ( $theme_options as $option_key => $option_value ) {
					if ( in_array( $option_key, array( 'accelerate_custom_css' ) ) ) {
						unset( $theme_options[ $option_key ] );
					}
				}
				// Finally, update accelerate theme options.
				update_option( 'accelerate', $theme_options );
			}
		}
	}
}

add_action( 'after_setup_theme', 'accelerate_custom_css_migrate' );

/**************************************************************************************/

if ( ! function_exists( 'accelerate_the_custom_logo' ) ) {
   /**
    * Displays the optional custom logo.
    */
   function accelerate_the_custom_logo() {
      if ( function_exists( 'the_custom_logo' )  && ( accelerate_options( 'accelerate_header_logo_image', '' ) == '') ) {
         the_custom_logo();
      }
   }
}

/**************************************************************************************/

/**
 * Function to transfer the Header Logo added in Customizer Options of theme to Site Logo in Site Identity section
 */
function accelerate_site_logo_migrate() {
	if ( function_exists( 'the_custom_logo' ) && ! has_custom_logo( $blog_id = 0 ) ) {
		$logo_url = accelerate_options( 'accelerate_header_logo_image' );

		if ( $logo_url ) {
			$customizer_site_logo_id = attachment_url_to_postid( $logo_url );
			set_theme_mod( 'custom_logo', $customizer_site_logo_id );

			// Delete the old Site Logo theme_mod option.
			$theme_options = get_option( 'accelerate' );

			if ( isset( $theme_options[ 'accelerate_header_logo_image' ] ) ) {
				unset( $theme_options[ 'accelerate_header_logo_image' ] );
			}

			// Finally, update accelerate theme options.
			update_option( 'accelerate', $theme_options );
		}
	}
}

add_action( 'after_setup_theme', 'accelerate_site_logo_migrate' );

/**************************************************************************************/

/**
 * Function to transfer the favicon added in Customizer Options of theme to Site Icon in Site Identity section
 */
function accelerate_site_icon_migrate() {
    if ( get_option( 'accelerate_site_icon_transfer' ) ) {
        return;
    }

    $accelerate_favicon = accelerate_options( 'accelerate_favicon', 0 );

    // Migrate accelerate site icon.
    if ( function_exists( 'has_site_icon' ) && ( ! empty( $accelerate_favicon ) && ! has_site_icon() ) ) {
        $theme_options = get_option( 'accelerate' );
        $attachment_id = attachment_url_to_postid( $accelerate_favicon );

        // Update site icon transfer options.
        if ( $theme_options && $attachment_id ) {
            update_option( 'site_icon', $attachment_id );
            update_option( 'accelerate_site_icon_transfer', 1 );

            // Remove old favicon options.
            foreach ( $theme_options as $option_key => $option_value ) {
                if ( in_array( $option_key, array( 'accelerate_favicon', 'accelerate_activate_favicon' ) ) ) {
                    unset( $theme_options[ $option_key ] );
                }
            }
        }

        // Finally, update accelerate theme options.
        update_option( 'accelerate', $theme_options );
    }
}

add_action( 'after_setup_theme', 'accelerate_site_icon_migrate' );

/**
* List of allowed social protocols in HTML attributes.
* @ param  array $protocols Array of allowed protocols.
* @ return array
*/
function accelerate_allowed_social_protocols( $protocols ) {
	$social_protocols = array(
		'skype'
	);

	return array_merge( $protocols, $social_protocols );
}
add_filter( 'kses_allowed_protocols' , 'accelerate_allowed_social_protocols' );
