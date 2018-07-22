<?php
/**
 * Contains all the fucntions and components related to header part.
 *
 * @package ThemeGrill
 * @subpackage Accelerate Pro
 * @since Accelerate Pro 1.0
 */

/****************************************************************************************/

if ( ! function_exists( 'accelerate_social_links' ) ) :
/**
 * This function is for social links display on header
 *
 * Get links through Theme Options
 */
function accelerate_social_links() {

	$accelerate_social_links = array(
		'accelerate_social_facebook'		=> __( 'Facebook', 'accelerate' ),
		'accelerate_social_twitter'			=> __( 'Twitter', 'accelerate' ),
		'accelerate_social_googleplus'		=> __( 'Google-Plus' , 'accelerate' ),
		'accelerate_social_instagram'		=> __( 'Instagram', 'accelerate' ),
		'accelerate_social_codepen'			=> __( 'CodePen', 'accelerate' ),
		'accelerate_social_digg'			=> __( 'Digg', 'accelerate' ),
		'accelerate_social_dribbble'		=> __( 'Dribbble', 'accelerate' ),
		'accelerate_social_flickr'			=> __( 'Flickr', 'accelerate' ),
		'accelerate_social_github'			=> __( 'GitHub', 'accelerate' ),
		'accelerate_social_linkedin'		=> __( 'LinkedIn', 'accelerate' ),
		'accelerate_social_pinterest'		=> __( 'Pinterest', 'accelerate' ),
		'accelerate_social_reddit'			=> __( 'Reddit', 'accelerate' ),
		'accelerate_social_skype'			=> __( 'Skype', 'accelerate' ),
		'accelerate_social_stumbleupon'		=> __( 'StumbleUpon', 'accelerate' ),
		'accelerate_social_tumblr'			=> __( 'Tumblr', 'accelerate' ),
		'accelerate_social_vimeo'			=> __( 'Vimeo-square', 'accelerate' ),
		'accelerate_social_wordpress'		=> __( 'WordPress', 'accelerate' ),
		'accelerate_social_youtube'			=> __( 'YouTube', 'accelerate' ),
		'accelerate_social_xing'			=> __( 'Xing', 'accelerate' ),
		'accelerate_social_weibo'			=> __( 'Weibo', 'accelerate' )
	);

    // Array for Additional Icons
	$accelerate_additional_icons = array(
		'accelerate_additional_icon_one' => esc_html__( 'First Additional Social Icon', 'accelerate' ),
		'accelerate_additional_icon_two' => esc_html__( 'Second Additional Social Icon', 'accelerate' ),
		'accelerate_additional_icon_three' => esc_html__( 'Third Additional Social Icon', 'accelerate' ),
		'accelerate_additional_icon_four' => esc_html__( 'Fourth Additional Social Icon', 'accelerate' ),
		'accelerate_additional_icon_five' => esc_html__( 'Fifth Additional Social Icon', 'accelerate' )
	);
	?>

	<div class="social-links clearfix">
		<ul>
		<?php
			$accelerate_links_output = '';
			foreach( $accelerate_social_links as $key => $value ) {
				$link = accelerate_options( $key , '' );
				if ( !empty( $link ) ) {
					if ( accelerate_options( $key.'new_tab', '0' ) == '1' ) { $new_tab = 'target="_blank"'; } else { $new_tab = ''; }
					$accelerate_links_output .=
						'<li><a href="'.esc_url( $link ).'"'.$new_tab.'><i class="fa fa-'.strtolower($value).'"></i></a></li>';
				}
			}
			echo $accelerate_links_output;
			//Additional Social Icons
			$accelerate_additional_icons_output = '';
			foreach ($accelerate_additional_icons as $key => $value) {
				$link = accelerate_options( $key.'_link', '' );
				$color = accelerate_options( $key.'_color', '');
				if( $color == '' ) {
					$color = accelerate_options( 'accelerate_primary_color', '');
				}

				if( !empty( $link ) ) {
					accelerate_options( $key.'_new_tab', '0' ) == '1' ? $new_tab = 'target="_blank"' : $new_tab = '';
					$accelerate_additional_icons_output .= '<li class="'.$key.'"><a href="'.esc_url( $link ).'"'.$new_tab.'><i class="fa fa-'.strtolower( accelerate_options( $key.'_icon', '' ) ).'"></i></a></li>';?>

					<style type="text/css">
						<?php echo '.'.$key; ?> i.fa {
							color: <?php echo $color; ?>;
						}

						<?php echo '.'.$key; ?> i.fa:hover {
							color:#ffffff;
							background-color: <?php echo $color; ?>;
						}
					</style>
				<?php
				}
			}
			echo $accelerate_additional_icons_output;
		?>
		</ul>
	</div><!-- .social-links -->
	<?php
}
endif;

/****************************************************************************************/
// Filter the get_header_image_tag() for option of displaying the header image in old way
function accelerate_header_image_markup( $html, $header, $attr ) {
	$output = '';
	$header_image = get_header_image();

	if( ! empty( $header_image ) ) {
		if ( accelerate_options( 'accelerate_header_image_link', 0 ) == 1 ) {
			$output .= '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">';
		}

		$output .= '<div class="header-image-wrap"><div class="inner-wrap"><img src="' . esc_url( $header_image ) . '" class="header-image" width="' . get_custom_header()->width . '" height="' . get_custom_header()->height . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '"></div></div>';

		if ( accelerate_options( 'accelerate_header_image_link', 0 ) == 1 ) {
			$output .= '</a>';
		}
	}

	return $output;
}

function accelerate_header_image_markup_filter() {
	add_filter( 'get_header_image_tag', 'accelerate_header_image_markup', 10, 3 );
}

add_action( 'accelerate_header_image_markup_render','accelerate_header_image_markup_filter' );

/****************************************************************************************/

if ( ! function_exists( 'accelerate_render_header_image' ) ) :
/**
 * Shows the small info text on top header part
 */
function accelerate_render_header_image() {
	if ( function_exists( 'the_custom_header_markup' ) ) {
		do_action( 'accelerate_header_image_markup_render' );
		the_custom_header_markup();
	} else {
		$header_image = get_header_image();
		if ( ! empty( $header_image ) ) {
			if ( accelerate_options( 'accelerate_header_image_link', 0 ) == 1 ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<?php }	?>
			<div class="header-image-wrap"><div class="inner-wrap"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></div></div>
			<?php
			if ( accelerate_options( 'accelerate_header_image_link', 0 ) == 1 ) { ?>
				</a>
				<?php
			}
		}
	}
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'accelerate_pass_slider_parameters' ) ) :
/**
 * Function to pass the slider effectr parameters from php file to js file.
 */
function accelerate_pass_slider_parameters() {
	$transition_effect = accelerate_options( 'accelerate_slider_transition_effect', 'fade' );

	$transition_delay = accelerate_options( 'accelerate_slider_transition_delay', 4 );
	$transition_duration = accelerate_options( 'accelerate_slider_transition_length', 1 );
	$transition_delay = intval($transition_delay);
	$transition_duration = intval($transition_duration);

	if ( $transition_delay != 0 ) { $transition_delay = $transition_delay * 1000; }
	else { $transition_delay = 4000; }
	if ( $transition_duration != 0 ) { $transition_duration = $transition_duration * 1000; }
	else { $transition_duration = 1000; }

	wp_localize_script(
		'jquery_cycle',
		'accelerate_slider_value',
		array(
			'transition_effect' 		=> $transition_effect,
			'transition_delay' 		=> $transition_delay,
			'transition_duration' 	=> $transition_duration
		)
	);
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'accelerate_featured_image_slider' ) ) :
/**
 * display featured post slider
 */
function accelerate_featured_image_slider() {
	global $post;
	?>
		<?php
		if( accelerate_options( 'accelerate_slider_image_cover_full_width_option', 0 ) == 1 ) {
			$slider_cycle_classes = 'slider-cycle';
		}
		else {
			$slider_cycle_classes = 'slider-cycle inner-wrap';
		}
		?>
		<section id="featured-slider">
			<div class="<?php echo $slider_cycle_classes; ?>">
				<div class="slider-rotate">
				<?php
				$num_of_slides = accelerate_options( 'accelerate_slider_number', '4' );
				for( $i = 1; $i <= $num_of_slides; $i++ ) {
					$accelerate_slider_title = accelerate_options( 'accelerate_slider_title'.$i , '' );
					$accelerate_slider_text = accelerate_options( 'accelerate_slider_text'.$i , '' );
					$accelerate_slider_image = accelerate_options( 'accelerate_slider_image'.$i , '' );
					$accelerate_slide_text_position = accelerate_options( 'accelerate_slide_text_position'.$i , 'right' );
					$accelerate_slider_link = accelerate_options( 'accelerate_slider_link'.$i , '#' );

					// For WPML plugin compatibility
			 		if ( function_exists( 'icl_register_string' ) ) {
						icl_register_string( 'Accelerate Pro', 'Slider Title '.$i , $accelerate_slider_title );
						icl_register_string( 'Accelerate Pro', 'Slider Description '.$i , $accelerate_slider_text );
                  icl_register_string( 'Accelerate Pro', 'Slider Button Link '.$i , $accelerate_slider_link );
                  icl_register_string( 'Accelerate Pro', 'Slider Image Link '.$i , $accelerate_slider_image );
					}

					if( !empty( $accelerate_header_title ) || !empty( $accelerate_slider_text ) || !empty( $accelerate_slider_image ) ) {
						if ( $i == 1 ) { $classes = "slides displayblock"; } else { $classes = "slides displaynone"; }

						if ( $accelerate_slide_text_position == 'left' ) { $classes2 = "entry-container entry-container-left"; }
						else { $classes2 = "entry-container"; }
						?>
						<div class="<?php echo $classes; ?>">
						<?php
						// For WPML plugin compatibility
				 		if ( function_exists( 'icl_t' ) ) {
							$accelerate_slider_title = icl_t( 'Accelerate Pro', 'Slider Title '.$i , $accelerate_slider_title );
							$accelerate_slider_text = icl_t( 'Accelerate Pro', 'Slider Description '.$i , $accelerate_slider_text );
                     $accelerate_slider_link = icl_t( 'Accelerate Pro', 'Slider Button Link '.$i , $accelerate_slider_link );
                     $accelerate_slider_image = icl_t( 'Accelerate Pro', 'Slider Image Link '.$i , $accelerate_slider_image );
						}
						?>
							<figure>
								<?php if( accelerate_options( 'accelerate_slider_image_link_option', 0 ) == 1 ) { ?>
								<a href="<?php echo esc_url( $accelerate_slider_link ); ?>" title="<?php echo esc_attr( $accelerate_slider_title ); ?>">
								<?php } ?>
								<img alt="<?php echo esc_attr( $accelerate_slider_title ); ?>" src="<?php echo esc_url( $accelerate_slider_image ); ?>">
								<?php if( accelerate_options( 'accelerate_slider_image_link_option', 0 ) == 1 ) { ?>
								</a>
								<?php } ?>
							</figure>
							<div class="<?php echo $classes2; ?>">
								<?php if( !empty( $accelerate_slider_title ) ) { ?>
									<div class="slider-title-head"><h3 class="entry-title"><a href="<?php echo esc_url( $accelerate_slider_link ); ?>" title="<?php echo esc_attr( $accelerate_slider_title ); ?>"><?php echo $accelerate_slider_title; ?></a></h3></div>
								<?php } ?>
								<?php if( !empty( $accelerate_slider_text ) ) { ?>
									<div class="entry-content"><p><?php echo $accelerate_slider_text; ?></p></div>
								<?php } ?>
							</div>
						</div>
						<?php
					}
				}
				?>
				<nav id="controllers" class="clearfix"></nav>
				</div>

				<a class="slide-next" href="#"><i class="fa fa-angle-right"></i></a>
				<a class="slide-prev" href="#"><i class="fa fa-angle-left"></i></a>
			</div>

		</section>

		<?php
}
endif;



if ( ! function_exists( 'accelerate_header_title' ) ) :
/**
 * Show the title in header
 */
function accelerate_header_title() {
	if( is_archive() ) {
		if ( is_category() ) :
			$accelerate_header_title = single_cat_title( '', FALSE );

		elseif ( is_tag() ) :
			$accelerate_header_title = single_tag_title( '', FALSE );

		elseif ( is_author() ) :
			/* Queue the first post, that way we know
			 * what author we're dealing with (if that is the case).
			*/
			the_post();
			$accelerate_header_title =  sprintf( __( 'Author: %s', 'accelerate' ), '<span class="vcard">' . get_the_author() . '</span>' );
			/* Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();

		elseif ( is_day() ) :
			$accelerate_header_title = sprintf( __( 'Day: %s', 'accelerate' ), '<span>' . get_the_date() . '</span>' );

		elseif ( is_month() ) :
			$accelerate_header_title = sprintf( __( 'Month: %s', 'accelerate' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

		elseif ( is_year() ) :
			$accelerate_header_title = sprintf( __( 'Year: %s', 'accelerate' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			$accelerate_header_title = __( 'Asides', 'accelerate' );

		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			$accelerate_header_title = __( 'Images', 'accelerate');

		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			$accelerate_header_title = __( 'Videos', 'accelerate' );

		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			$accelerate_header_title = __( 'Quotes', 'accelerate' );

		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			$accelerate_header_title = __( 'Links', 'accelerate' );

		else :
			$accelerate_header_title = __( 'Archives', 'accelerate' );

		endif;
	}
	elseif( is_404() ) {
		$accelerate_header_title = __( 'Page NOT Found', 'accelerate' );
	}
	elseif( is_search() ) {
		$accelerate_header_title = __( 'Search Results', 'accelerate' );
	}
	elseif( is_page()  ) {
		$accelerate_header_title = get_the_title();
	}
	elseif( is_single()  ) {
		$accelerate_header_title = get_the_title();
	}
	else {
		$accelerate_header_title = '';
	}

	return $accelerate_header_title;

}
endif;

?>
