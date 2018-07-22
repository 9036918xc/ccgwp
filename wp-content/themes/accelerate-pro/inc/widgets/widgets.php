<?php
/**
 * Contains all the functions related to sidebar and widget.
 *
 * @package ThemeGrill
 * @subpackage Accelerate Pro
 * @since Accelerate Pro 1.0
 */

add_action( 'widgets_init', 'accelerate_widgets_init');
/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function accelerate_widgets_init() {

	// Registering main right sidebar
	register_sidebar( array(
		'name' 				=> __( 'Right Sidebar', 'accelerate' ),
		'id' 					=> 'accelerate_right_sidebar',
		'description'   	=> __( 'Shows widgets at Right side.', 'accelerate' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering main left sidebar
	register_sidebar( array(
		'name' 				=> __( 'Left Sidebar', 'accelerate' ),
		'id' 					=> 'accelerate_left_sidebar',
		'description'   	=> __( 'Shows widgets at Left side.', 'accelerate' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering Header sidebar
	register_sidebar( array(
		'name' 				=> __( 'Header Sidebar', 'accelerate' ),
		'id' 					=> 'accelerate_header_sidebar',
		'description'   	=> __( 'Shows widgets in header section just above the main navigation menu.', 'accelerate' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );

	// Registering Business Page template sidebar
	register_sidebar( array(
		'name' 				=> __( 'Business Sidebar', 'accelerate' ),
		'id' 					=> 'accelerate_business_sidebar',
		'description'   	=> __( 'Shows widgets on Business Page Template.', 'accelerate' ),
		'before_widget' 	=> '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );
	register_sidebar( array(
		'name' 				=> __( 'Business Sidebar Two', 'accelerate' ),
		'id' 					=> 'accelerate_business_sidebar_2',
		'description'   	=> __( 'Shows widgets on Business Template Two.', 'accelerate' ),
		'before_widget' 	=> '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );
	register_sidebar( array(
		'name' 				=> __( 'Business Sidebar Three', 'accelerate' ),
		'id' 					=> 'accelerate_business_sidebar_3',
		'description'   	=> __( 'Shows widgets on Business Template Three.', 'accelerate' ),
		'before_widget' 	=> '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );
	register_sidebar( array(
		'name' 				=> __( 'Business Sidebar Four', 'accelerate' ),
		'id' 					=> 'accelerate_business_sidebar_4',
		'description'   	=> __( 'Shows widgets on Business Template Four.', 'accelerate' ),
		'before_widget' 	=> '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );
	register_sidebar( array(
		'name' 				=> __( 'Business Sidebar Five', 'accelerate' ),
		'id' 					=> 'accelerate_business_sidebar_5',
		'description'   	=> __( 'Shows widgets on Business Template Five.', 'accelerate' ),
		'before_widget' 	=> '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  	=> '</section>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>'
	) );

	// Registering contact Page sidebar
	register_sidebar( array(
		'name' 				=> __( 'Contact Page Sidebar', 'accelerate' ),
		'id' 					=> 'accelerate_contact_page_sidebar',
		'description'   	=> __( 'Shows widgets on Contact Page Template.', 'accelerate' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering Error 404 Page sidebar
	register_sidebar( array(
		'name' 				=> __( 'Error 404 Page Sidebar', 'accelerate' ),
		'id' 					=> 'accelerate_error_404_page_sidebar',
		'description'   	=> __( 'Shows widgets on Error 404 page.', 'accelerate' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering footer sidebar one
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar One', 'accelerate' ),
		'id' 					=> 'accelerate_footer_sidebar_one',
		'description'   	=> __( 'Shows widgets at footer sidebar one.', 'accelerate' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering footer sidebar two
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar Two', 'accelerate' ),
		'id' 					=> 'accelerate_footer_sidebar_two',
		'description'   	=> __( 'Shows widgets at footer sidebar two.', 'accelerate' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering footer sidebar three
	register_sidebar( array(
		'name' 				=> __( 'Footer Sidebar Three', 'accelerate' ),
		'id' 					=> 'accelerate_footer_sidebar_three',
		'description'   	=> __( 'Shows widgets at footer sidebar three.', 'accelerate' ),
		'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  	=> '</aside>',
		'before_title'  	=> '<h3 class="widget-title"><span>',
		'after_title'   	=> '</span></h3>'
	) );

	// Registering widgets
	register_widget( "accelerate_featured_single_page_widget" );
	register_widget( "accelerate_call_to_action_widget" );
	register_widget( "accelerate_testimonial_widget" );
	register_widget( "accelerate_recent_work_widget" );
	register_widget( "accelerate_image_service_widget" );
	register_widget( "accelerate_featured_posts_widget" );
	register_widget( "accelerate_our_clients_widget" );
	register_widget( "accelerate_custom_tag_widget" );
	register_widget( "accelerate_fun_facts_widget" );
	register_widget( "accelerate_team_widget" );
	register_widget( "accelerate_pricing_table_widget" );
}


/****************************************************************************************/

/**
 * Featured Single page widget.
 *
 */
 class accelerate_featured_single_page_widget extends WP_Widget {
 	function __construct() {
 		$widget_ops = array( 'classname' => 'widget_featured_single_post clearfix', 'description' => __( 'Display Featured Single Page', 'accelerate' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 );
		parent::__construct( false, $name= __( 'TG: Featured Single Page', 'accelerate' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		$instance = wp_parse_args( (array) $instance, array( 'page_id' => '', 'title' => '', 'disable_feature_image' => 0, 'image_position' => 'above' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$page_id = absint( $instance[ 'page_id' ] );
		$disable_feature_image = $instance['disable_feature_image'] ? 'checked="checked"' : '';
		$image_position = $instance[ 'image_position' ];
		_e( 'Suitable for Business Sidebar and Left/Right Sidebar.', 'accelerate' );
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p><?php _e( 'Displays the title of the Page if title input is empty.', 'accelerate' ); ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Page', 'accelerate' ); ?>:</label>
			<?php wp_dropdown_pages( array( 'name' => $this->get_field_name( 'page_id' ), 'selected' => $instance['page_id'] ) ); ?>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $disable_feature_image; ?> id="<?php echo $this->get_field_id('disable_feature_image'); ?>" name="<?php echo $this->get_field_name('disable_feature_image'); ?>" /> <label for="<?php echo $this->get_field_id('disable_feature_image'); ?>"><?php _e( 'Remove Featured image', 'accelerate' ); ?></label>
		</p>

	    <?php if( $image_position == 'above' ) { ?>
		<p>
		    <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="above" style="" checked /><?php _e( 'Show Image Before Title', 'accelerate' );?><br />
		    <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="below" style="" /><?php _e( 'Show Image After Title', 'accelerate' );?><br />
		</p>
		<?php } else { ?>
		<p>
		    <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="above" style="" /><?php _e( 'Show Image Before Title', 'accelerate' );?><br />
		    <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="below" style="" checked /><?php _e( 'Show Image After Title', 'accelerate' );?><br />
		</p>
		<?php } ?>

	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'page_id' ] = absint( $new_instance[ 'page_id' ] );
		$instance[ 'disable_feature_image' ] = isset( $new_instance[ 'disable_feature_image' ] ) ? 1 : 0;
		$instance[ 'image_position' ] = $new_instance[ 'image_position' ];

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );
 		global $post;
 		$title = apply_filters( 'widget_title' , isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
 		$page_id = isset( $instance[ 'page_id' ] ) ? $instance[ 'page_id' ] : '';
 		$disable_feature_image = !empty( $instance[ 'disable_feature_image' ] ) ? 'true' : 'false';
 		$image_position = isset( $instance[ 'image_position' ] ) ? $instance[ 'image_position' ] : 'above' ;

 		if( $page_id ) {
 			$the_query = new WP_Query( 'page_id='.$page_id );
 			while( $the_query->have_posts() ):$the_query->the_post();
 				$page_name = get_the_title();

	 		$output = $before_widget;
	 		if( $image_position == "below" ) {
	 			if( $title ): $output .= $before_title.'<a href="' . get_permalink() . '" title="'.$title.'">'. $title .'</a>'.$after_title;
	 			else: $output .= $before_title.'<a href="' . get_permalink() . '" title="'.$page_name.'">'. $page_name .'</a>'.$after_title;
	 			endif;
	 		}
	 		if( has_post_thumbnail() && $disable_feature_image != "true" ) {
	 			$output.= '<div class="service-image">'.get_the_post_thumbnail( $post->ID, 'featured', array( 'title' => esc_attr( $page_name ), 'alt' => esc_attr( $page_name ) ) ).'</div>';
	 		}

	 		if( $image_position == "above" ) {
		 		if( $title ): $output .= $before_title.'<a href="' . get_permalink() . '" title="'.$title.'">'. $title .'</a>'.$after_title;
	 			else: $output .= $before_title.'<a href="' . get_permalink() . '" title="'.$page_name.'">'. $page_name .'</a>'.$after_title;
	 			endif;
		 	}
			$output .= '<p>'.get_the_excerpt().'</p>';
			$output .= '<a class="more-link" href="'. get_permalink() .'"><span>'. accelerate_options( 'accelerate_read_more_text', __( 'Read more', 'accelerate' ) ) .'</span></a>';
	 		$output .= $after_widget;
	 		endwhile;
	 		// Reset Post Data
	 		wp_reset_postdata();
	 		echo $output;
 		}

 	}
}

/**************************************************************************************/

/**
 * Featured call to action widget.
 */
class accelerate_call_to_action_widget extends WP_Widget {
 	function __construct() {
 		$widget_ops = array( 'classname' => 'widget_call_to_action', 'description' => esc_html__( 'Use this widget to show the call to action section.', 'accelerate' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 );
		parent::__construct( false, $name = esc_html__( 'TG: Call To Action Widget', 'accelerate' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		$accelerate_defaults[ 'style' ] = 'first';
 		$accelerate_defaults[ 'text_main' ] = '';
 		$accelerate_defaults[ 'text_additional' ] = '';
 		$accelerate_defaults[ 'button_text' ] = '';
 		$accelerate_defaults[ 'button_url' ] = '';
 		$accelerate_defaults[ 'new_tab' ] = '0';
 		$instance = wp_parse_args( (array) $instance, $accelerate_defaults );
 		$style = $instance[ 'style' ];
		$text_main = $instance[ 'text_main' ];
		$text_additional = $instance[ 'text_additional' ];
		$button_text = $instance[ 'button_text' ];
		$button_url = $instance[ 'button_url' ];
		$new_tab = $instance['new_tab'] ? 'checked="checked"' : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php esc_html_e( 'Choose style:', 'accelerate' ); ?></label><br/>
        	<input type="radio" <?php checked( $style, 'first' ) ?> id="<?php echo $this->get_field_id( 'style' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'style' ); ?>" value="first"/><?php esc_html_e( 'Style One', 'accelerate' );?>
        	<input type="radio" <?php checked( $style,'second' ) ?> id="<?php echo $this->get_field_id( 'style' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'style' ); ?>" value="second"/><?php esc_html_e( 'Style Two', 'accelerate' );?>
        </p>

		<?php esc_html_e( 'Call to Action Main Text','accelerate' ); ?>
		<textarea class="widefat" rows="3" cols="20" id="<?php echo $this->get_field_id('text_main'); ?>" name="<?php echo $this->get_field_name('text_main'); ?>"><?php echo esc_textarea( $text_main ); ?></textarea>
		<?php esc_html_e( 'Call to Action Additional Text','accelerate' ); ?>
		<textarea class="widefat" rows="3" cols="20" id="<?php echo $this->get_field_id('text_additional'); ?>" name="<?php echo $this->get_field_name('text_additional'); ?>"><?php echo esc_textarea( $text_additional ); ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php esc_html_e( 'Button Text:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo esc_attr($button_text); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_url'); ?>"><?php esc_html_e( 'Button Redirect Link:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" type="text" value="<?php echo esc_url( $button_url ); ?>" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $new_tab; ?> id="<?php echo $this->get_field_id('new_tab'); ?>" name="<?php echo $this->get_field_name('new_tab'); ?>" /> <label for="<?php echo $this->get_field_id('new_tab'); ?>"><?php esc_html_e( 'Open in new tab', 'accelerate' ); ?></label>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		if ( current_user_can('unfiltered_html') )
			$instance['text_main'] =  $new_instance['text_main'];
		else
			$instance['text_main'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text_main']) ) ); // wp_filter_post_kses() expects slashed

		if ( current_user_can('unfiltered_html') )
			$instance['text_additional'] =  $new_instance['text_additional'];
		else
			$instance['text_additional'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text_additional']) ) ); // wp_filter_post_kses() expects slashed

		$instance[ 'style' ] = sanitize_text_field( $new_instance[ 'style' ] );
		$instance[ 'button_text' ] = sanitize_text_field( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ] = esc_url_raw( $new_instance[ 'button_url' ] );
		$instance[ 'new_tab' ] = isset( $new_instance[ 'new_tab' ] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$new_tab = !empty( $instance[ 'new_tab' ] ) ? 'true' : 'false';
 		$style = empty( $instance['style'] ) ? 'first' : $instance['style'];
 		$text_main = empty( $instance['text_main'] ) ? '' : $instance['text_main'];
 		$text_additional = empty( $instance['text_additional'] ) ? '' : $instance['text_additional'];
 		$button_text = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : '';
 		$button_url = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : '#';

      	// For WPML plugin compatibility
 		if ( function_exists( 'icl_register_string' ) ) {
 			icl_register_string( 'Accelerate Pro', 'TG: Call to Action widget main text' . $this->id, $text_main );
 			icl_register_string( 'Accelerate Pro', 'TG: Call to Action widget additional text' . $this->id, $text_additional );
 			icl_register_string( 'Accelerate Pro', 'TG: Call to Action widget button text'. $this->id, $button_text );
         icl_register_string( 'Accelerate Pro', 'TG: Call to Action widget button redirect link'. $this->id, $button_url );
 		}

 		// style class
 		$style_class = '';
        if ( $style == 'first' ) { $style_class = 'first'; } else { $style_class = 'second'; }

		echo $before_widget;
		?>
			<div class="call-to-action-content-wrapper call-to-action-content-wrapper-<?php echo esc_attr( $style_class ); ?> clearfix">
				<div class="call-to-action-content">
					<?php
					if( !empty( $text_main ) ) {
					?>
					<h3><?php
						// For WPML plugin compatibility
						if ( function_exists( 'icl_t' ) ) {
							$text_main = icl_t( 'Accelerate Pro', 'TG: Call to Action widget main text' . $this->id, $text_main );
						}
						echo esc_html( $text_main ); ?></h3>
					<?php
					}
					if( !empty( $text_additional ) ) {
					?>
					<p><?php
						// For WPML plugin compatibility
						if ( function_exists( 'icl_t' ) ) {
							$text_additional = icl_t( 'Accelerate Pro', 'TG: Call to Action widget additional text' . $this->id, $text_additional );
						}
						echo esc_html( $text_additional ); ?></p>
					<?php
					}
					?>
				</div>
				<?php
				if( !empty( $button_text ) ) {
				?>
					<?php
					// For WPML plugin compatibility
					if ( function_exists( 'icl_t' ) ) {
						$button_text = icl_t( 'Accelerate Pro', 'TG: Call to Action widget button text'. $this->id, $button_text );
					}
               if ( function_exists( 'icl_t' ) ) {
                  $button_url = icl_t( 'Accelerate Pro', 'TG: Call to Action widget button redirect link'. $this->id, $button_url );
               }
					?>
					<a class="read-more" <?php if( $new_tab == 'true' ) { echo 'target="_blank"'; } ?> href="<?php echo esc_url( $button_url ); ?>" title="<?php echo esc_attr( $button_text ); ?>"><?php echo esc_html( $button_text ); ?></a>
				<?php
				}
				?>
			</div>
		<?php
		echo $after_widget;
 	}
 }

/**************************************************************************************/

 /**
 * Testimonial widget
 */
class accelerate_testimonial_widget extends WP_Widget {

	function __construct() {
 		$widget_ops = array( 'classname' => 'widget_testimonial', 'description' => __( 'Display Testimonial', 'accelerate' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 );
		parent::__construct( false, $name = __( 'TG: Testimonial', 'accelerate' ), $widget_ops, $control_ops);
 	}

	function widget( $args, $instance ) {
		extract($args);

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text1 = apply_filters( 'widget_text', empty( $instance['text1'] ) ? '' : $instance['text1'], $instance );
		$name1 = apply_filters( 'widget_name', empty( $instance['name1'] ) ? '' : $instance['name1'], $instance, $this->id_base );
		$byline1 = apply_filters( 'widget_byline', empty( $instance['byline1'] ) ? '' : $instance['byline1'], $instance, $this->id_base );
		$image1 = isset( $instance[ 'image1' ] ) ? $instance[ 'image1' ] : '';

		$text2 = apply_filters( 'widget_text', empty( $instance['text2'] ) ? '' : $instance['text2'], $instance );
		$name2 = apply_filters( 'widget_name', empty( $instance['name2'] ) ? '' : $instance['name2'], $instance, $this->id_base );
		$byline2 = apply_filters( 'widget_byline', empty( $instance['byline2'] ) ? '' : $instance['byline2'], $instance, $this->id_base );
		$image2 = isset( $instance[ 'image2' ] ) ? $instance[ 'image2' ] : '';

            // For WPML plugin compatibility
 		if ( function_exists( 'icl_register_string' ) ) {
 			icl_register_string( 'Accelerate Pro', 'TG: First Testimonial widget text' . $this->id, $text1 );
 			icl_register_string( 'Accelerate Pro', 'TG: First Testimonial widget name' . $this->id, $name1 );
 			icl_register_string( 'Accelerate Pro', 'TG: First Testimonial widget byline' . $this->id, $byline1 );
         icl_register_string( 'Accelerate Pro', 'TG: First Testimonial widget image one' . $this->id, $image1 );

         icl_register_string( 'Accelerate Pro', 'TG: Second Testimonial widget text' . $this->id, $text2 );
 			icl_register_string( 'Accelerate Pro', 'TG: Second Testimonial widget name' . $this->id, $name2 );
 			icl_register_string( 'Accelerate Pro', 'TG: Second Testimonial widget byline' . $this->id, $byline2 );
         icl_register_string( 'Accelerate Pro', 'TG: Second Testimonial widget image two' . $this->id, $image2 );
 		}

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title. esc_html( $title ) . $after_title; } ?>
		<div class="first-testimonial">
			<?php if( !empty( $text1 ) ) { ?>
			<div class="testimonial-post"><i class="fa fa-quote-left"></i>
         <?php
				// For WPML plugin compatibility
				if ( function_exists( 'icl_t' ) ) {
					$text1 = icl_t( 'Accelerate Pro', 'TG: First Testimonial widget text' . $this->id, $text1 );
				}
            echo '<p>'.esc_textarea( $text1 ).'</p>'; ?></div>
			<?php } ?>
			<div class="testimonial-author">
				<div class="testimonial-author-detail">
					<span><?php
						// For WPML plugin compatibility
						if ( function_exists( 'icl_t' ) ) {
							$name1 = icl_t( 'Accelerate Pro', 'TG: First Testimonial widget name' . $this->id, $name1 );
						}
						echo esc_html( $name1 ); ?></span><br/>
					<?php
					// For WPML plugin compatibility
					if ( function_exists( 'icl_t' ) ) {
						$byline1 = icl_t( 'Accelerate Pro', 'TG: First Testimonial widget byline' . $this->id, $byline1 );
					}
					echo esc_html( $byline1 ); ?>
				</div>
				<?php if( !empty( $image1 ) ) {
               // For WPML plugin compatibility
               if ( function_exists( 'icl_t' ) ) {
                  $image1 = icl_t( 'Accelerate Pro', 'TG: First Testimonial widget image one' . $this->id, $image1 );
               }
            ?>
				<div class="testimonial-author-image">
					<img src="<?php echo $image1; ?>" alt="<?php echo $name1; ?>">
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="second-testimonial">
			<?php if( !empty( $text2 ) ) { ?>
			<div class="testimonial-post"><i class="fa fa-quote-left"></i>
				<?php
				// For WPML plugin compatibility
				if ( function_exists( 'icl_t' ) ) {
					$text2 = icl_t( 'Accelerate Pro', 'TG: Second Testimonial widget text' . $this->id, $text2 );
				}
            echo '<p>'.esc_textarea( $text2 ).'</p>'; ?></div>
				<?php } ?>
			<div class="testimonial-author">
				<div class="testimonial-author-detail">
					<span><?php
						// For WPML plugin compatibility
						if ( function_exists( 'icl_t' ) ) {
							$name2 = icl_t( 'Accelerate Pro', 'TG: Second Testimonial widget name' . $this->id, $name2 );
						}
						echo esc_html( $name2 ); ?></span><br/>
					<?php
					// For WPML plugin compatibility
					if ( function_exists( 'icl_t' ) ) {
						$byline2 = icl_t( 'Accelerate Pro', 'TG: Second Testimonial widget byline' . $this->id, $byline2 );
					}
					echo esc_html( $byline2 ); ?>
				</div>
				<?php if( !empty( $image2 ) ) {
               // For WPML plugin compatibility
               if ( function_exists( 'icl_t' ) ) {
                  $image2 = icl_t( 'Accelerate Pro', 'TG: Second Testimonial widget image two' . $this->id, $image2 );
               }
            ?>
				<div class="testimonial-author-image">
					<img src="<?php echo $image2; ?>" alt="<?php echo $name2; ?>">
				</div>
				<?php } ?>
			</div>
		</div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['name1'] = strip_tags($new_instance['name1']);
		$instance['byline1'] = strip_tags($new_instance['byline1']);
		if ( current_user_can('unfiltered_html') )
			$instance['text1'] =  $new_instance['text1'];
		else
			$instance['text1'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text1']) ) ); // wp_filter_post_kses() expects slashed
		$instance[ 'image1' ] = esc_url_raw( $new_instance[ 'image1' ] );

		$instance['name2'] = strip_tags($new_instance['name2']);
		$instance['byline2'] = strip_tags($new_instance['byline2']);
		if ( current_user_can('unfiltered_html') )
			$instance['text2'] =  $new_instance['text2'];
		else
			$instance['text2'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text2']) ) ); // wp_filter_post_kses() expects slashed
		$instance[ 'image2' ] = esc_url_raw( $new_instance[ 'image2' ] );

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text1' => '', 'name1' =>'', 'byline1'=>'', 'image1' => '', 'text2' => '', 'name2' =>'', 'byline2'=>'', 'image2' => '' ) );
		$title = strip_tags($instance['title']);
		$name1 = strip_tags($instance['name1']);
		$byline1 = strip_tags($instance['byline1']);
		$text1 = esc_textarea($instance['text1']);
		$image1 = esc_url($instance['image1']);
		$name2 = strip_tags($instance['name2']);
		$byline2 = strip_tags($instance['byline2']);
		$text2 = esc_textarea($instance['text2']);
		$image2 = esc_url($instance['image2']);
?>
		<p><?php _e( 'Note: To add the image. Go to Media->Add New. Upload an image. Copy the image path link and paste in image input field. Recommended size for the image is 72 x 72 pixels.', 'accelerate' ); ?></p>
		<p>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'accelerate' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<strong><?php _e( 'First Testimonial','accelerate'); ?></strong><br/>
		<?php _e( 'Testimonial Description','accelerate'); ?>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>"><?php echo $text1; ?></textarea>

		<p><label for="<?php echo $this->get_field_id('name1'); ?>"><?php _e( 'Name:', 'accelerate' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('name1'); ?>" name="<?php echo $this->get_field_name('name1'); ?>" type="text" value="<?php echo esc_attr($name1); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('byline1'); ?>"><?php _e( 'Byline:', 'accelerate' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('byline1'); ?>" name="<?php echo $this->get_field_name('byline1'); ?>" type="text" value="<?php echo esc_attr($byline1); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image1' ); ?>"><?php _e( 'Image:', 'accelerate' ); ?></label>
			<input style="width:100%;" id="<?php echo $this->get_field_id( 'image1' ); ?>" name="<?php echo $this->get_field_name( 'image1' ); ?>" type="text" value="<?php echo $image1; ?>" />
		</p>

		<strong><?php _e( 'Second Testimonial','accelerate'); ?></strong><br/>
		<?php _e( 'Testimonial Description','accelerate'); ?>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>"><?php echo $text2; ?></textarea>

		<p><label for="<?php echo $this->get_field_id('name2'); ?>"><?php _e( 'Name:', 'accelerate' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('name2'); ?>" name="<?php echo $this->get_field_name('name2'); ?>" type="text" value="<?php echo esc_attr($name2); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('byline2'); ?>"><?php _e( 'Byline:', 'accelerate' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('byline2'); ?>" name="<?php echo $this->get_field_name('byline2'); ?>" type="text" value="<?php echo esc_attr($byline2); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e( 'Image:', 'accelerate' ); ?></label>
			<input style="width:100%;" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" type="text" value="<?php echo $image2; ?>" />
		</p>

<?php
	}
}

/**************************************************************************************/

/**
 * Featured recent work widget to show pages.
 */
 class accelerate_recent_work_widget extends WP_Widget {
 	function __construct() {
 		$widget_ops = array( 'classname' => 'widget_recent_work', 'description' => __( 'Show your some pages as recent work. Best for Business Top or Bottom sidebar.', 'accelerate' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 );
		parent::__construct( false, $name = __( 'TG: Featured Widget', 'accelerate' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		$defaults = array();
 		$defaults[ 'title' ] = '';
 		$defaults[ 'text' ] = '';
 		for ( $i=0; $i<4; $i++ ) {
 			$var = 'page_id'.$i;
 			$defaults[$var] = '';
 		}
 		$instance = wp_parse_args( (array) $instance, $defaults );
 		$title = esc_attr( $instance[ 'title' ] );
		$text = esc_textarea($instance['text']);
 		for ( $i=0; $i<4; $i++ ) {
 			$var = 'page_id'.$i;
 			$var = absint( $instance[ $var ] );
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description','accelerate' ); ?>
		<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<?php for( $i=0; $i<4; $i++) { ?>
			<p>
				<label for="<?php echo $this->get_field_id( 'page_id'.$i ); ?>"><?php _e( 'Page', 'accelerate' ); ?>:</label>
				<?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'page_id'.$i ), 'selected' => $instance[ 'page_id'.$i ] ) ); ?>
			</p>
		<?php
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );

		for( $i=0; $i<4; $i++ ) {
			$var = 'page_id'.$i;
			$instance[ $var] = absint( $new_instance[ $var ] );
		}

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$title = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
 		$text = isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';

 		// For WPML plugin compatibility
 		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'Accelerate Pro', 'TG: Featured Widget text' . $this->id, $text );
		}

 		$page_array = array();
 		for( $i=0; $i<4; $i++ ) {
 			$var = 'page_id'.$i;
 			$page_id = isset( $instance[ $var ] ) ? $instance[ $var ] : '';

 			if( !empty( $page_id ) )
 				array_push( $page_array, $page_id );// Push the page id in the array
 		}
		$get_featured_pages = new WP_Query( array(
			'posts_per_page' 			=> -1,
			'post_type'					=>  array( 'page' ),
			'post__in'		 			=> $page_array,
			'orderby' 		 			=> 'post__in'
		) );
		echo $before_widget;
			if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; }
			if ( !empty( $text ) ) { ?>
				<p><?php
					// For WPML plugin compatibility
					if ( function_exists( 'icl_t' ) ) {
						$text = icl_t( 'Accelerate Pro', 'TG: Featured Widget text' . $this->id, $text );
					}
					echo esc_textarea( $text ); ?></p>
				<?php }
			$i = 1;
 			while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
				$page_title = get_the_title();
				if ( $i % 4 == 0 ) { $class = 'tg-one-fourth tg-one-fourth-last'.' tg-column-'.$i; }
 				elseif( $i % 3 == 0 ) { $class= 'tg-one-fourth tg-after-two-blocks-clearfix'.' tg-column-'.$i; }
 				else { $class = 'tg-one-fourth'.' tg-column-'.$i; }
				?>
				<div class="<?php echo $class; ?>">
					<?php
					if ( has_post_thumbnail() ) {
						$title_attribute = get_the_title( $post->ID );
						echo'<div class="service-image"><a title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_post_thumbnail( $post->ID, 'featured-recent-work', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a></div>';
					}
					?>
					<a class="recent_work_title" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
						<div class="title_box">
							<?php echo '<h5>'.$page_title.'</h5>'; ?>
						</div>
					</a>
				</div>
				<?php $i++; ?>
			<?php endwhile;
	 		// Reset Post Data
 			wp_reset_query();
 			?>
		<?php
		echo $after_widget;
 	}
	}

/**************************************************************************************/

/**
 * Featured Posts widget
 */
class accelerate_featured_posts_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget_featured_posts', 'description' => __( 'Display latest posts or posts of specific category', 'accelerate') );
		$control_ops = array( 'width' => 200, 'height' =>250 );
		parent::__construct( false,$name= __( 'TG: Featured Posts', 'accelerate' ),$widget_ops);
	}

	function form( $instance ) {
 		$tg_defaults['title'] = '';
 		$tg_defaults['text'] = '';
 		$tg_defaults['number'] = 4;
 		$tg_defaults['image_size'] = 'featured-blog-small';
 		$tg_defaults['type'] = 'latest';
 		$tg_defaults['category'] = '';
 		$tg_defaults['button_text'] = '';
 		$tg_defaults[ 'button_url' ] = '';
 		$instance = wp_parse_args( (array) $instance, $tg_defaults );
		$title = esc_attr( $instance[ 'title' ] );
		$text = esc_textarea($instance['text']);
		$number = $instance['number'];
		$type = $instance['type'];
		$category = $instance['category'];
		$image_size = $instance[ 'image_size' ];
		$button_text = esc_attr( $instance[ 'button_text' ] );
		$button_url = esc_url( $instance[ 'button_url' ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description','accelerate' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to display:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p><input type="radio" <?php checked($image_size, 'featured') ?> id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>" value="featured"/><?php _e( 'Large Featured Image', 'accelerate' );?><br />
		 <input type="radio" <?php checked($image_size,'featured-blog-small') ?> id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>" value="featured-blog-small"/><?php _e( 'Small Featured Image', 'accelerate' );?><br /></p>

		<p><input type="radio" <?php checked($type, 'latest') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php _e( 'Show latest Posts', 'accelerate' );?><br />
		 <input type="radio" <?php checked($type,'category') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'accelerate' );?><br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'accelerate' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e( 'Button Text:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_url'); ?>"><?php _e( 'Button Redirect Link:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" type="text" value="<?php echo $button_url; ?>" />
		</p>
		<p><?php _e( 'Note: Use this button to redirect to specific category or any link as you like.', 'accelerate' ); ?></p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
		$instance[ 'number' ] = absint( $new_instance[ 'number' ] );
		$instance[ 'image_size' ] = $new_instance[ 'image_size' ];
		$instance[ 'type' ] = $new_instance[ 'type' ];
		$instance[ 'category' ] = $new_instance[ 'category' ];
		$instance[ 'button_text' ] = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ] = esc_url_raw( $new_instance[ 'button_url' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$title = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
 		$text = isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
 		$number = empty( $instance[ 'number' ] ) ? 4 : $instance[ 'number' ];
 		$image_size = isset( $instance[ 'image_size' ] ) ? $instance[ 'image_size' ] : 'featured-blog-small' ;
 		$type = isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : 'latest' ;
 		$category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
 		$button_text = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : '';
 		$button_url = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : '#';

 		// For WPML plugin compatibility
 		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'Accelerate Pro', 'TG: Featured posts widget description text' . $this->id, $text );
			icl_register_string( 'Accelerate Pro', 'TG: Featured posts widget Button text' . $this->id, $button_text );
         icl_register_string( 'Accelerate Pro', 'TG: Featured posts widget Button redirect link' . $this->id, $button_url );
		}

 		if( $type == 'latest' ) {
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' 			=> $number,
				'post_type'					=> 'post',
				'ignore_sticky_posts' 	=> true
			) );
		}
		else {
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' 			=> $number,
				'post_type'					=> 'post',
				'category__in'				=> $category
			) );
		}
		echo $before_widget;
		?>
		<?php
			if( $image_size == 'featured-blog-small' ) { $featured = 'featured-blog-small'; $image_class = 'post-featured-image'; }
			else { $featured = 'featured-blog-large'; $image_class = 'post-featured-image-large'; }

			if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
			<p><?php
				// For WPML plugin compatibility
				if ( function_exists( 'icl_t' ) ) {
					$text = icl_t( 'Accelerate Pro', 'TG: Featured posts widget description text' . $this->id, $text );
				}
				echo esc_textarea( $text ); ?></p>
			<?php
 			$i=1;
 			while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
 				if ( $i % 2 == 0 ) { $class = 'tg-one-half tg-one-half-last'; }
 				else { $class = 'tg-one-half'; }
 				if( $i % 2 ==  1 && $i > 1) { $class .= ' tg-featured-posts-clearfix'; }
				?>
				<div class="<?php echo $class; ?>">
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
						</h2><!-- .entry-title -->
					</header>

					<?php accelerate_entry_meta(); ?>

					<?php
					if( has_post_thumbnail() ) {
						$image = '';
			     		$title_attribute = get_the_title( $post->ID );
			     		$image .= '<figure class="'.$image_class.'">';
			  			$image .= '<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">';
			  			$image .= get_the_post_thumbnail( $post->ID, $featured, array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
			  			$image .= '</figure>';

			  			echo $image;
			  		}
						?>

					<div class="entry-content clearfix">
						<?php
							global $more;
							$more = 0;
							if( accelerate_options( 'accelerate_toggle_excerpt_full_post', 'full_post' ) == 'excerpt' ) {
							   the_excerpt();
							   echo '<a class="more-link" href="'.get_permalink().'"><span>'.accelerate_options( 'accelerate_read_more_text', __( 'Read more', 'accelerate' ) ).'</span></a>';
							}
							else {
								the_content( '<span>'.accelerate_options( 'accelerate_read_more_text', __( 'Read more', 'accelerate' ) ).'</span>' );
							}
						?>
					</div>
				</div>
			<?php
				$i++;
			endwhile;
			if( !empty( $button_text ) ) {
				?>
				<?php
				// For WPML plugin compatibility
				if ( function_exists( 'icl_t' ) ) {
					$button_text = icl_t( 'Accelerate Pro', 'TG: Featured posts widget Button text' . $this->id, $button_text );
				}
            if ( function_exists( 'icl_t' ) ) {
               $button_url = icl_t( 'Accelerate Pro', 'TG: Featured posts widget Button redirect link' . $this->id, $button_url );
            }
				?>
				<div class="featured-posts-show-more">
					<a class="read-more" href="<?php echo $button_url; ?>" title="<?php echo esc_attr( $button_text ); ?>"><?php echo esc_html( $button_text ); ?></a>
				</div>
			<?php
			}
	 		// Reset Post Data
 			wp_reset_query();
 			?>
		<?php echo $after_widget;
		}

}


/**
 * Clients images widget
 */
class accelerate_our_clients_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget_our_clients', 'description' => __( 'Widget to show clients/partners images', 'accelerate') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name= __( 'TG: Our Clients', 'accelerate' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'image-1' => '', 'image-2' => '', 'image-3' => '', 'image-4' => '', 'image-5' => '', 'image-6' => '', 'image-7' => '', 'image-8' => '', 'image-9' => '', 'image-10' => '', 'link-1' => '', 'link-2' => '', 'link-3' => '', 'link-4' => '', 'link-5' => '', 'link-6' => '', 'link-7' => '', 'link-8' => '', 'link-9' => '', 'link-10' => '', 'hover-text1' => '', 'hover-text2' => '', 'hover-text3' => '', 'hover-text4' => '', 'hover-text5' => '', 'hover-text6' => '', 'hover-text7' => '', 'hover-text8' => '', 'hover-text9' => '', 'hover-text10' => '', 'carousel_enable' => 0 ) );
		$title = esc_attr($instance['title']);
		$text = esc_textarea( $instance[ 'text' ] );
		$carousel_enable = $instance['carousel_enable'] ? 'checked="checked"' : '';
		for ( $i=1; $i<11; $i++ ) {
 			$image = 'image-'.$i;
 			$link = 'link-'.$i;
 			$hover_text = 'hover-text'.$i;
 			$instance[ $image ] = esc_url( $instance[ $image ] );
 			$instance[ $link ] = esc_url( $instance[ $link ] );
 			$instance[ $hover_text ] = strip_tags( $instance[ $hover_text ] );
		}
	?>
		<p><?php _e( 'Note: To add the image. Go to Media->Add New. Upload an image. Copy the image path link and paste in image input field. Recommended size for the image is 150px * 80x.', 'accelerate' ); ?></p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description','accelerate' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

		<?php for ( $i=1; $i<11; $i++ ) {
			$image = 'image-'.$i;
 			$link = 'link-'.$i;
 			$hover_text = 'hover-text'.$i;
		?>
		<p>
			<label for="<?php echo $this->get_field_id($image); ?>"><?php _e( 'Image Path Link ', 'accelerate' ); echo $i; ?></label>
			<input style="width:100%;" id="<?php echo $this->get_field_id($image); ?>" name="<?php echo $this->get_field_name($image); ?>" type="text" value="<?php echo $instance[$image]; ?>" />
		</p>
		<p><?php _e('Redirect Link ', 'accelerate'); echo $i;?>
		<input style="width:100%;" name="<?php echo $this->get_field_name($link); ?>" type="text" value="<?php if(isset ( $instance[$link] ) ) echo esc_url( $instance[$link] ); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id($hover_text); ?>"><?php _e( 'Hover Title Text ', 'accelerate' ); echo $i; ?></label>
			<input style="width:100%;" id="<?php echo $this->get_field_id($hover_text); ?>" name="<?php echo $this->get_field_name($hover_text); ?>" type="text" value="<?php echo $instance[$hover_text]; ?>" />
		</p>
		<hr/>

		<?php } ?>

		<p>
			<input class="checkbox" type="checkbox" <?php echo $carousel_enable; ?> id="<?php echo $this->get_field_id('carousel_enable'); ?>" name="<?php echo $this->get_field_name('carousel_enable'); ?>" /> <label for="<?php echo $this->get_field_id('carousel_enable'); ?>"><?php esc_html_e( 'Enable carousel', 'accelerate' ); ?></label>
		</p>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );

		$instance[ 'carousel_enable' ] = isset( $new_instance[ 'carousel_enable' ] ) ? 1 : 0;

		for( $i=1; $i<11; $i++ ) {
			$image = 'image-'.$i;
			$link = 'link-'.$i;
			$hover_text = 'hover-text'.$i;
			$instance[ $image ] = esc_url_raw( $new_instance[ $image ] );
			$instance[ $link ] = esc_url_raw( $new_instance[ $link ] );
			$instance[ $hover_text ] = strip_tags( $new_instance[ $hover_text ] );
		}
		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$carousel_enable = !empty( $instance[ 'carousel_enable' ] ) ? 'true' : 'false';
		if ( ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) && ( $carousel_enable == 'true' ) ) {
			wp_enqueue_script('jquery_cycle');
			wp_enqueue_script('jquery-cycle2-swipe');
		}

		$title = apply_filters( 'widget_title' , isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
		$text = isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'Accelerate Pro', 'TG: Our Clients text' . $this->id, $text );
		}

		$image_array = array();
		$link_array = array();
		$hover_text_array = array();

		$j = 0;
		for( $i=1; $i<11; $i++ ) {
			$image = 'image-'.$i;
			$link = 'link-'.$i;
			$hover_text = 'hover-text'.$i;
			$image = isset( $instance[ $image ] ) ? $instance[ $image ] : '';
			$link = isset( $instance[ $link ] ) ? $instance[ $link ] : '';
			$hover_text = isset( $instance[ $hover_text ] ) ? $instance[ $hover_text ] : '';

			array_push( $image_array, $image );
			array_push( $link_array, $link );
			array_push( $hover_text_array, $hover_text );
			// For WPML plugin compatibility
			if ( function_exists( 'icl_register_string' ) ) {
				icl_register_string( 'Accelerate Pro', 'TG: Our Clients Image Path' . $this->id . $j, $image_array[$j] );
			}
			if ( function_exists( 'icl_register_string' ) ) {
				icl_register_string( 'Accelerate Pro', 'TG: Our Clients Image Redirect Link' . $this->id . $j, $link_array[$j] );
			}
			if ( function_exists( 'icl_register_string' ) ) {
				icl_register_string( 'Accelerate Pro', 'TG: Our Clients Image Hover text' . $this->id . $j, $hover_text_array[$j] );
			}
			$j++;
 		}

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; }
		if ( !empty( $text ) ) { ?>
		<p><?php
			// For WPML plugin compatibility
			if ( function_exists( 'icl_t' ) ) {
				$text = icl_t( 'Accelerate Pro', 'TG: Our Clients text' . $this->id, $text );
			}
			echo esc_textarea( $text ); ?></p>
			<?php }
		if ( !empty( $image_array ) ) {
			$output = '';
			if ($carousel_enable == 'true') {
				$output .= '<div id="' . esc_attr($this->id) . '_clients-cycle-prev" class="clients-cycle-prev"></div>';
				$output .= '<div id="' . esc_attr($this->id) . '_clients-cycle-next" class="clients-cycle-next"></div>';
			} ?>

			<div class="our-clients-wrapper">

				<?php
				if ($carousel_enable == 'false') {
					$output .= '<div class="accelerate_clients_wrap">';
				} else {
					$output .= '<div class="accelerate_clients_wrap slide" data-cycle-fx="carousel" data-cycle-timeout="2000" data-cycle-slides="> div" data-cycle-prev="#' . $this->id . '_clients-cycle-prev" data-cycle-next="#' . $this->id . '_clients-cycle-next">';
				} ?>

				<?php
				for( $i=1; $i<11; $i++ ) {
					$j = $i - 1;
					if( !empty( $image_array[$j] ) ) {
						// For WPML plugin compatibility
						if ( function_exists( 'icl_t' ) ) {
							$hover_text_array[$j] = icl_t( 'Accelerate Pro', 'TG: Our Clients Image Hover text' . $this->id . $j, $hover_text_array[$j] );
						}

						if ( function_exists( 'icl_t' ) ) {
							$image_array[$j] = icl_t( 'Accelerate Pro', 'TG: Our Clients Image Path' . $this->id . $j, $image_array[$j] );
						}

						if ( function_exists( 'icl_t' ) ) {
							$link_array[$j] = icl_t( 'Accelerate Pro', 'TG: Our Clients Image Redirect Link' . $this->id . $j, $link_array[$j] );
						}

						$output .= '<div class="accelerate_single_client">';
						if( !empty( $link_array[$j] ) ) {
							$output .= '<a href="'.$link_array[$j].'" title="'.$hover_text_array[$j].'" target="_blank">
											<img src="'.$image_array[$j].'" alt="'.$hover_text_array[$j].'">
										</a>';
						} else {
							$output .= '<img src="'.$image_array[$j].'" alt="'.$hover_text_array[$j].'">';
						}
						$output .=	'</div>';
					}
				}
				$output .= '</div>';
				echo $output;
				?>

			</div>

		<?php }

		echo $after_widget;
	}

}


/****************************************************************************************/

/**
 * Featured service widget to show pages.
 */
class accelerate_image_service_widget extends WP_Widget {
    function __construct() {
        $widget_ops = array( 'classname' => 'widget_image_service_block', 'description' => esc_html__( 'Display some pages as services. Best for Business Top or Bottom sidebar.', 'accelerate' ) );
        $control_ops = array( 'width' => 200, 'height' =>250 );
        parent::__construct( false, $name = esc_html__( 'TG: Image Services', 'accelerate' ), $widget_ops, $control_ops);
    }

    function form( $instance ) {
    	$defaults = array();
        for ( $i=0; $i<8; $i++ ) {
            $defaults['page_id'.$i] = '';
        }
        $defaults['image_link'] = '0';
        $defaults['display_read_more'] = '0';
        $defaults['open_in_new_tab'] = '0';
        $defaults['select_column'] = 'services-column-layout-3';
        $instance = wp_parse_args( (array) $instance, $defaults );

        $image_link = $instance['image_link'] ? 'checked="checked"' : '';
        $display_read_more = $instance['display_read_more'] ? 'checked="checked"' : '';
        $open_in_new_tab = $instance['open_in_new_tab'] ? 'checked="checked"' : '';
        $select_column = $instance['select_column'];

        for( $i=0; $i<8; $i++) : ?>
        	<p>
               <label for="<?php echo $this->get_field_id( 'page_'.$i ); ?>"><?php esc_html_e( 'Page:', 'accelerate' ); ?></label>
               <?php
               $arg = array(
                    'class'       		=> 'widefat',
                    'show_option_none'  =>' ',
                    'name'        		=> $this->get_field_name( 'page_id'.$i ),
                    'id'          		=> $this->get_field_id( 'page_id'.$i ),
                    'selected'      	=> absint( $instance[ 'page_id'.$i ] )
                );
               wp_dropdown_pages( $arg ); ?>
            </p>
        <?php endfor; ?>
        <p>
            <input class="checkbox" type="checkbox" <?php echo $image_link; ?> id="<?php echo $this->get_field_id('image_link'); ?>" name="<?php echo $this->get_field_name('image_link'); ?>" /> <label for="<?php echo $this->get_field_id('image_link'); ?>"><?php esc_html_e( 'Link featured image to their respective page', 'accelerate' ); ?></label>
        </p>
        <p>
         <input class="checkbox" type="checkbox" <?php echo $display_read_more; ?> id="<?php echo $this->get_field_id( 'display_read_more' ); ?>" name="<?php echo $this->get_field_name( 'display_read_more' ); ?>" /> <label for="<?php echo $this->get_field_id( 'display_read_more' ); ?>"><?php esc_html_e( 'Display Read more', 'accelerate' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php echo $open_in_new_tab; ?> id="<?php echo $this->get_field_id('open_in_new_tab'); ?>" name="<?php echo $this->get_field_name('open_in_new_tab'); ?>" />
            <label for="<?php echo $this->get_field_id('open_in_new_tab'); ?>"><?php esc_html_e( 'Check to open in new tab.', 'accelerate' ); ?></label>
        </p>
        <?php esc_html_e('Select the image service column', 'accelerate'); ?>
        <p>
            <select id="<?php echo $this->get_field_id('select_column'); ?>" name="<?php echo $this->get_field_name('select_column'); ?>">
                <option value="services-column-layout-2" <?php if ( $select_column == 'services-column-layout-2' ) echo 'selected="selected"';?> ><?php esc_html_e( 'Two Column', 'accelerate' );?></option>
                <option value="services-column-layout-3" <?php if ( $select_column == 'services-column-layout-3' ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Three Column', 'accelerate' );?></option>
                <option value="services-column-layout-4" <?php if ( $select_column == 'services-column-layout-4' ) echo 'selected="selected"';?> ><?php esc_html_e( 'Four Column', 'accelerate' );?></option>
            </select>
        </p>
    <?php }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        for( $i=0; $i<8; $i++ ) {
            $instance[ 'page_id'.$i] 		= absint( $new_instance[ 'page_id'.$i ] );
        }
        $instance[ 'image_link' ] 			= isset( $new_instance[ 'image_link' ] ) ? 1 : 0;
        $instance[ 'display_read_more' ] 	= isset( $new_instance[ 'display_read_more' ] ) ? 1 : 0;
        $instance[ 'open_in_new_tab' ] 		= isset( $new_instance[ 'open_in_new_tab' ] ) ? 1 : 0;
        $instance[ 'select_column' ] 		= sanitize_key( $new_instance[ 'select_column' ] );
        return $instance;
    }

    function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        global $post;
        $pages = array();
        for( $i=0; $i<8; $i++ ) {
            $pages[] = isset( $instance[ 'page_id'.$i ] ) ? $instance[ 'page_id'.$i ] : '';
        }
        $image_link 			= !empty( $instance[ 'image_link' ] ) ? 'true' : 'false';
        $display_read_more 		= !empty( $instance[ 'display_read_more' ] ) ? 1 : 0;
        $open_in_new_tab 		= !empty( $instance[ 'open_in_new_tab' ] ) ? 'true' : 'false';
        $select_column 			= isset( $instance[ 'select_column' ] ) ? $instance[ 'select_column' ] : 'services-column-layout-3';
        $get_featured_pages = new WP_Query( array(
            'posts_per_page'     => count( $pages ),
            'post_type'          => array( 'page' ),
            'post__in'           => $pages,
            'orderby'            => 'post__in'
        ) );
        echo $before_widget; ?>
            <?php
            if ( ! empty( $pages ) ) :
	            $post_count = 1;
	            while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
	                $page_title = get_the_title();
	                $service_class = '';
	                $selected_col = '';
	                if ( $select_column == 'services-column-layout-2' ) :
	                    if ( $post_count % 2 == 0 ) {
	                        $service_class = 'tg-one-half tg-one-half-last';
	                    } else {
	                        $service_class = 'tg-one-half';
	                    }
	                    $selected_col = '2';
	                elseif ( $select_column == 'services-column-layout-3' ) :
	                	if ( $post_count % 3 == 0 ) {
	                        $service_class = 'tg-one-third tg-one-third-last';
	                    } else {
	                        $service_class = 'tg-one-third';
	                    }
	                    $selected_col = '3';
	                elseif ( $select_column == 'services-column-layout-4' ) :
	                	if ( $post_count % 4 == 0 ) {
	                        $service_class = 'tg-one-fourth tg-one-fourth-last';
	                    } else {
	                        $service_class = 'tg-one-fourth';
	                    }
	                    $selected_col = '4';
	                endif;
	                ?>
	                <div class="<?php echo esc_attr( $service_class ); ?>">
	                	<?php
		                $new_tab = '';
		                if ( $open_in_new_tab == "true" ) {
		                    $new_tab = 'target="_blank"';
		                } ?>

	                    <?php
	                    if ( has_post_thumbnail() ) {
	                    	if( $image_link == 'true' ) {
	                            echo'<a title="'.esc_attr( get_the_title() ).'" href="'. esc_url( get_permalink() ).'"'.esc_attr( $new_tab ).'><div class="service-image">'.get_the_post_thumbnail( $post->ID, 'featured-service' ).'</div></a>';
	                        }
	                        else {
	                            echo'<div class="service-image">'.get_the_post_thumbnail( $post->ID, 'featured-service' ).'</div>';
	                        }

	                    } ?>

	                    <h2 class="entry-title"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" <?php echo esc_attr( $new_tab ); ?>><?php echo esc_html( $page_title ); ?></a></h2>
	                    <?php the_excerpt(); ?>

	                    <?php if( $display_read_more ) {
	                        echo '<a class="more-link" href="'.esc_url( get_permalink() ).'" '.esc_attr( $new_tab ).'><span>'.accelerate_options( 'accelerate_read_more_text', esc_html__( 'Read more', 'accelerate' ) ).'</span></a>';
	                    } ?>
	                </div>
	                <?php
	                if ( $post_count % $selected_col == 0 ) {
	                        echo '<div class="clearfix"></div>';
	                    }
	                $post_count++; ?>
	            <?php endwhile;
	            // Reset Post Data
	            wp_reset_postdata();
            endif;
            ?>
        <?php
        echo $after_widget;
    }
 }
/**************************************************************************************/

/**
 * ThemeGrill Custom Tag Widget
 */
class accelerate_custom_tag_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'classname' => 'accelerate_tagcloud_widget', 'description' => __( 'Custom Tag Cloud', 'accelerate' ) );
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'TG: Custom Tag Cloud', 'accelerate' ) , $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = apply_filters( 'widget_title', empty( $instance[ 'title' ] ) ? 'Tags' : $instance[ 'title' ] );

		echo $before_widget;

		if ( $title ):
			echo $before_title . $title . $after_title;
		endif;

		wp_tag_cloud( 'smallest=13&largest=13px&unit=px' );

		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( ( array ) $instance, array( 'title'=>'Tags' ) );
		$title = esc_attr( $instance[ 'title' ] );
		?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'accelerate' ); ?></label>
		<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
	<?php
	}
}

/**************************************************************************************/
/**
 * Fun Facts widget
 */
class accelerate_fun_facts_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget_fun_facts', 'description' => esc_html__( 'Widget to show Fun Facts', 'accelerate') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name= esc_html__( 'TG: Fun Facts', 'accelerate' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$defaults = array();
		$defaults[ 'facts_title' ] 	= '';
		$defaults[ 'facts_desc' ] 	= '';
		for ($i=0; $i<4 ; $i++) {
			$defaults[ 'fact_num_'. $i ] 	= '';
			$defaults[ 'fact_detail_'. $i ] = '';
			$defaults[ 'fact_icon_'. $i ] 	= '';
		}
		$instance = wp_parse_args( (array) $instance, $defaults );

		$facts_title 	= $instance[ 'facts_title' ];
        $facts_desc 	= $instance[ 'facts_desc' ];
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'facts_title' ); ?>"><?php esc_html_e( 'Title:', 'accelerate' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'facts_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'facts_title' ); ?>" type="text" value="<?php echo esc_attr( $facts_title  ); ?>" />
		</p>

		<?php esc_html_e( 'Description:','accelerate' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'facts_desc' ); ?>" name="<?php echo $this->get_field_name( 'facts_desc' ); ?>"><?php echo esc_textarea( $facts_desc ); ?></textarea>

		<?php for ( $i=0; $i<4; $i++ ) : ?>

			<p>
				<label for="<?php echo $this->get_field_id( 'fact_num_'. $i ); ?>"><?php esc_html_e( 'Fact number: ', 'accelerate' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'fact_num_'. $i ); ?>" name="<?php echo $this->get_field_name( 'fact_num_'. $i ); ?>" type="text" min="1" step="1" value="<?php echo absint( $instance[ 'fact_num_'. $i ] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'fact_detail_'. $i ); ?>"><?php esc_html_e( 'Fact Detail:', 'accelerate' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'fact_detail_'. $i ); ?>" name="<?php echo $this->get_field_name( 'fact_detail_'. $i ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'fact_detail_'. $i ] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'fact_icon_'. $i ); ?>"><?php esc_html_e( 'Icon Class:', 'accelerate' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'fact_icon_'. $i ); ?>" name="<?php echo $this->get_field_name( 'fact_icon_'. $i ); ?>" placeholder="fa-trophy" type="text" value="<?php echo esc_attr( $instance[ 'fact_icon_'. $i ] ); ?>" />
			</p>
			<hr/>
		<?php endfor; ?>

		<p>
			<?php
			$url = 'http://fontawesome.io/icons/';
			$link = sprintf( __( '<a href="%s" target="_blank">Refer here</a> For Icon Class', 'accelerate' ), esc_url( $url ) );
			echo $link;
			?>
		</p>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance[ 'facts_title' ] = sanitize_text_field( $new_instance[ 'facts_title' ] );

		if ( current_user_can('unfiltered_html') ) {
			$instance[ 'facts_desc' ] =  $new_instance[ 'facts_desc' ];
		}
		else {
			$instance[ 'facts_desc' ] = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'facts_desc' ] ) ) ); // wp_filter_post_kses() expects slashed
		}

		for( $i=0; $i<4; $i++ ) {
			$instance[ 'fact_num_'. $i ] 	= absint( $new_instance[ 'fact_num_'. $i ] );
			$instance[ 'fact_detail_'. $i ] = sanitize_text_field( $new_instance[ 'fact_detail_'. $i ] );
			$instance[ 'fact_icon_'. $i ] 	= sanitize_text_field( $new_instance[ 'fact_icon_'. $i ] );
		}
		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$facts_title = apply_filters( 'widget_title', isset( $instance[ 'facts_title' ] ) ? $instance[ 'facts_title' ] : '');
		$facts_desc = isset( $instance[ 'facts_desc' ] ) ? $instance[ 'facts_desc' ] : '';
		// For WPML plugin compatibility
	    if ( function_exists( 'icl_register_string' ) && !empty( $facts_desc ) ) {
	    	icl_register_string( 'Accelerate Pro', 'TG: Fun Facts' . $this->id . $i, $packages[ $i ] );
	    }
	    $fact_nums = array();
	    $fact_deatils = array();
	    $fact_icons =array();
	    for( $i=0; $i<4; $i++ ) {
	    	$fact_nums[] 	= isset( $instance[ 'fact_num_'. $i ] ) ? $instance[ 'fact_num_'. $i ] : '';
	    	$fact_deatils[] = isset( $instance[ 'fact_detail_'. $i ] ) ? $instance[ 'fact_detail_'. $i ] : '';
	    	$fact_icons[] 	= isset( $instance[ 'fact_icon_'. $i ] ) ? $instance[ 'fact_icon_'. $i ] : '';
	    	// For WPML plugin compatibility
          	if ( function_exists( 'icl_register_string' ) && !empty( $packages ) ) {
            	icl_register_string( 'Accelerate Pro', 'TG: Fun Facts' . $this->id . $i, $fact_deatils[ $i ] );
            }
	    }

		echo $before_widget; ?>

		<div class="section-wrapper">
			<div class="tg-container fact clearfix">
					<?php if( !empty( $facts_title ) ) echo $before_title . esc_html( $facts_title ) . $after_title;
					if( !empty( $facts_desc ) ) { ?>
						<p><?php
                    	// For WPML plugin compatibility
                		if ( function_exists( 'icl_t' ) ) {
                    		$facts_desc = icl_t( 'Accelerate Pro', 'TG: Fun Facts' . $this->id, $facts_desc );
                		}
                		echo esc_textarea( $facts_desc ); ?></p>
					<?php } ?>

				<div class="counter-wrapper">
					<?php
					for( $i=0; $i<4; $i++ ) :
						if( isset( $fact_nums ) || isset( $fact_deatils ) || isset( $fact_icons ) ) : ?>
							<div class="counter-block-wrapper clearfix">
								<?php
								// For WPML plugin compatibility
                                if ( function_exists( 'icl_t' ) ) {
                                    $fact_deatils[ $i ] = icl_t( 'Accelerate Pro', 'TG: Fun Facts' . $this->id . $i, $fact_deatils[ $i ] );
                                }
								echo '<span class="counter-icon"> <i class="fa ' . esc_attr( $fact_icons[ $i ] ) . '"></i> </span>';
								echo '<div class="counter-content">';
								echo '<span class="counter">' . esc_html( $fact_nums[ $i ] ) . '</span>';
								echo '<span class="counter-text">' . esc_html( $fact_deatils[ $i ] ) . '</span>';
								echo '</div>';
							  ?>
							</div>
						<?php endif;
					endfor;
					?>
				</div>
			</div>
		</div>
		<?php
		echo $after_widget;
	}
}
/**************************************************************************************/
/*
 * Featured team widget to show pages.
 */
class accelerate_team_widget extends WP_Widget {
    function __construct() {
    $widget_ops = array( 'classname' => 'widget_team_block', 'description' => esc_html__( 'Display some pages as team. Best for Business sidebar.', 'accelerate' ) );
    $control_ops = array( 'width' => 200, 'height' =>250 );
    parent::__construct( false, $name = esc_html__( 'TG: Team', 'accelerate' ), $widget_ops, $control_ops);
    }

    function form( $instance ) {
        $defaults 							= array();
        $defaults['title']					= '';
        $defaults['text']					= '';
        $defaults['image_link']				= '';
        $defaults['title_link']				= '';
        $defaults['read_more_button_enable']= '';
        $defaults['select_column']       	= 'teams-column-layout-3';
        $defaults['open_in_new_tab']       	= '';

        for ( $i=0; $i<8; $i++ ) {
            $defaults['page_'.$i]         = '';
            $defaults['designation_'.$i]  = '';
            $defaults['fbook_'.$i]        = '';
            $defaults['twitter_'.$i]      = '';
            $defaults['gplus_'.$i]        = '';
         }

         $instance = wp_parse_args( (array) $instance, $defaults );

         $title                      = $instance[ 'title' ];
         $text                       = $instance[ 'text' ];
         $image_link                 = $instance[ 'image_link' ] ? 'checked="checked"' : '';
         $title_link                 = $instance[ 'title_link' ] ? 'checked="checked"' : '';
         $read_more_button_enable    = $instance[ 'read_more_button_enable' ] ? 'checked="checked"' : '';
         $open_in_new_tab            = $instance[ 'open_in_new_tab' ] ? 'checked="checked"' : '';
         $select_column              = $instance[ 'select_column' ];
         ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'accelerate' ); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <?php esc_html_e( 'Description','accelerate' ); ?>
        <textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $text ); ?></textarea>

         <?php
         for ( $i=0; $i<8; $i++ ) : ?>
            <p>
               <label for="<?php echo $this->get_field_id( 'page_'.$i ); ?>"><?php esc_html_e( 'Page:', 'accelerate' ); ?></label>
               <?php
               $arg = array(
                    'class'       		=> 'widefat',
                    'show_option_none'  =>' ',
                    'name'        		=> $this->get_field_name( 'page_'.$i ),
                    'id'          		=> $this->get_field_id( 'page_'.$i ),
                    'selected'      	=> absint( $instance[ 'page_'.$i ] )
                );
               wp_dropdown_pages( $arg ); ?>
            </p>

            <p>
               <label for="<?php echo $this->get_field_id( 'designation_'.$i ); ?>"><?php esc_html_e( 'Designation:', 'accelerate'); ?></label>
               <input id="<?php echo $this->get_field_id( 'designation_'.$i ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'designation_'.$i ); ?>" type="text" value="<?php if( isset ( $instance[ 'designation_'.$i ] ) ) echo esc_attr( $instance[ 'designation_'.$i ] ); ?>" />
            </p>

            <p>
               <label for="<?php echo $this->get_field_id( 'fbook_'.$i ); ?>"><?php esc_html_e( 'Facebook:', 'accelerate'); ?></label>
               <input id="<?php echo $this->get_field_id( 'fbook_'.$i ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'fbook_'.$i ); ?>" type="text" value="<?php if( isset ( $instance[ 'fbook_'.$i ] ) ) echo esc_url( $instance[ 'fbook_'.$i ] ); ?>" />
            </p>

            <p>
               <label for="<?php echo $this->get_field_id( 'twitter_'.$i  ); ?>"><?php esc_html_e( 'Twitter:', 'accelerate'); ?></label>
               <input id="<?php echo $this->get_field_id( 'twitter_'.$i ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'twitter_'.$i ); ?>" type="text" value="<?php if( isset ( $instance[ 'twitter_'.$i ] ) ) echo esc_url( $instance[ 'twitter_'.$i ] ); ?>" />
            </p>

            <p>
               <label for="<?php echo $this->get_field_id( 'gplus_'.$i ); ?>"><?php esc_html_e( 'Google Plus:', 'accelerate'); ?></label>
               <input id="<?php echo $this->get_field_id( 'gplus_'.$i ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'gplus_'.$i ); ?>" type="text" value="<?php if( isset ( $instance[ 'gplus_'.$i ] ) ) echo esc_url( $instance[ 'gplus_'.$i ] ); ?>" />
            </p>

            <hr/>

         <?php endfor; ?>

         <p>
          <input class="checkbox" type="checkbox" <?php echo $image_link; ?> id="<?php echo $this->get_field_id('image_link'); ?>" name="<?php echo $this->get_field_name('image_link'); ?>" />
          <label for="<?php echo $this->get_field_id('image_link'); ?>"><?php esc_html_e( 'Link featured image to their respective page', 'accelerate' ); ?></label>
         </p>

         <p>
          <input class="checkbox" type="checkbox" <?php echo $title_link; ?> id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" />
          <label for="<?php echo $this->get_field_id('title_link'); ?>"><?php esc_html_e( 'Link title to their respective page', 'accelerate' ); ?></label>
         </p>

         <p>
          <input class="checkbox" type="checkbox" <?php echo $read_more_button_enable; ?> id="<?php echo $this->get_field_id('read_more_button_enable'); ?>" name="<?php echo $this->get_field_name('read_more_button_enable'); ?>" />
          <label for="<?php echo $this->get_field_id('read_more_button_enable'); ?>"><?php esc_html_e( 'Enable the read more button.', 'accelerate' ); ?></label>
         </p>

         <p>
          <input class="checkbox" type="checkbox" <?php echo $open_in_new_tab; ?> id="<?php echo $this->get_field_id('open_in_new_tab'); ?>" name="<?php echo $this->get_field_name('open_in_new_tab'); ?>" />
          <label for="<?php echo $this->get_field_id('open_in_new_tab'); ?>"><?php esc_html_e( 'Check to open in new tab.', 'accelerate' ); ?></label>
         </p>

         <?php esc_html_e('Select the teams column', 'accelerate'); ?>

         <p>
          <select id="<?php echo $this->get_field_id('select_column'); ?>" name="<?php echo $this->get_field_name('select_column'); ?>">
              <option value="teams-column-layout-2" <?php if ( $select_column == 'teams-column-layout-2' ) echo 'selected="selected"';?> ><?php esc_html_e( 'Two Column', 'accelerate' );?></option>
              <option value="teams-column-layout-3" <?php if ( $select_column == 'teams-column-layout-3' ) echo 'selected="selected"'; ?> ><?php esc_html_e( 'Three Column', 'accelerate' );?></option>
              <option value="teams-column-layout-4" <?php if ( $select_column == 'teams-column-layout-4' ) echo 'selected="selected"';?> ><?php esc_html_e( 'Four Column', 'accelerate' );?></option>
          </select>
         </p>
        <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ]  = strip_tags( $new_instance[ 'title' ] );
        if ( current_user_can('unfiltered_html') )
            $instance[ 'text' ] =  $new_instance[ 'text' ];
        else
            $instance[ 'text' ] = stripslashes( wp_filter_post_kses( addslashes($new_instance[ 'text' ]) ) );

        for( $i=0; $i<8; $i++ ) {
            $instance[ 'page_'.$i ]          = absint( $new_instance[ 'page_'.$i ] );
            $instance[ 'designation_'.$i ]   = sanitize_text_field( $new_instance[ 'designation_'.$i ] );
            $instance[ 'fbook_'.$i ]         = esc_url_raw( $new_instance[ 'fbook_'.$i ] );
            $instance[ 'twitter_'.$i ]       = esc_url_raw( $new_instance[ 'twitter_'.$i ] );
            $instance[ 'gplus_'.$i ]         = esc_url_raw( $new_instance[ 'gplus_'.$i ] );
        }
        $instance[ 'image_link' ]         = isset( $new_instance[ 'image_link' ] ) ? 1 : 0;
        $instance[ 'title_link' ]         = isset( $new_instance[ 'title_link' ] ) ? 1 : 0;
        $instance[ 'read_more_button_enable' ]  = isset( $new_instance[ 'read_more_button_enable' ] ) ? 1 : 0;
        $instance[ 'select_column' ]      = sanitize_key( $new_instance[ 'select_column' ] );
        $instance[ 'open_in_new_tab' ]    = isset( $new_instance[ 'open_in_new_tab' ] ) ? 1 : 0;

        return $instance;
    }

    function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        global $post;
        $title = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
        $text = isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
        $image_link = !empty( $instance[ 'image_link' ] ) ? 'true' : 'false';
        $title_link = !empty( $instance[ 'title_link' ] ) ? 'true' : 'false';
        $read_more_button_enable  = !empty( $instance[ 'read_more_button_enable' ] ) ? 'true' : 'false';
        $open_in_new_tab      = !empty( $instance[ 'open_in_new_tab' ] ) ? 'true' : 'false';
        $select_column      = isset( $instance[ 'select_column' ] ) ? $instance[ 'select_column' ] : 'teams-column-layout-3';
        // For WPML plugin compatibility
      if ( function_exists( 'icl_register_string' ) && !empty( $text ) ) {
        icl_register_string( 'Accelerate Pro', 'TG: Team widget description text' . $this->id, $text );
      }

        $page           = array();
        $designation    = array();
        $fbook          = array();
        $twitter        = array();
        $gplus          = array();
        for( $i=0; $i<8; $i++ ) {
            $page[]        = isset( $instance[ 'page_'.$i ] ) ? $instance[ 'page_'.$i ] : '';
            $designation[] = isset( $instance[ 'designation_'.$i ] ) ? $instance[ 'designation_'.$i ] : '';
            $fbook[]       = isset( $instance[ 'fbook_'.$i ] ) ? $instance[ 'fbook_'.$i ] : '';
            $twitter[]     = isset( $instance[ 'twitter_'.$i ] ) ? $instance[ 'twitter_'.$i ] : '';
            $gplus[]       = isset( $instance[ 'gplus_'.$i ] ) ? $instance[ 'gplus_'.$i ] : '';

            // For WPML plugin compatibility
          if ( function_exists( 'icl_register_string' ) ) {
              if ( !empty ( $designation ) ) {
                icl_register_string( 'Accelerate Pro', 'TG: Team widget team member designation' . $this->id . $i, $designation[$i]);
              }
          }
        }

        if( !empty( $page ) ) {
        $get_featured_pages   = new WP_Query( array(
            'posts_per_page'  => count( $page ),
            'post_type'       =>  array( 'page' ),
            'post__in'        => $page,
            'orderby'         => 'post__in'
        ) );

        echo $before_widget; ?>

        <div class="all-teams">

        <?php if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
            <p><?php
                // For WPML plugin compatibility
                if ( function_exists( 'icl_t' ) ) {
                    $text = icl_t( 'Accelerate Pro', 'TG: Team widget description text' . $this->id, $text );
                }
                echo esc_textarea( $text );
            ?></p>
            <div class="team-member-wrapper clearfix <?php echo esc_attr( $select_column ) ?>">
                <?php
                $key = 0;
                while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
                	$post_count = $key + 1;
                  	$team_class = '';
                  	$col_num = '';
                    if ( $select_column == 'teams-column-layout-2' ) :
                        if ( $post_count % 2 == 0 ) {
                            $team_class = 'tg-one-half tg-one-half-last';
                        } else {
                            $team_class = 'tg-one-half';
                        }
                        $col_num = 2;
                    elseif ( $select_column == 'teams-column-layout-3' ) :
                        if ( $post_count % 3 == 0 ) {
                           $team_class = "tg-one-third tg-one-third-last";
                        }
                        else {
                           $team_class = "tg-one-third";
                        }
                        $col_num = 3;
                    elseif ( $select_column == 'teams-column-layout-4' ) :
                        if ( $post_count % 4 == 0 ) {
                           $team_class = 'tg-one-fourth tg-one-fourth-last';
                        } else {
                           $team_class = 'tg-one-fourth';
                        }
                        $col_num = 4;
                    endif;
                    ?>
                    <div class="<?php echo $team_class; ?>">
                        <?php
                        $new_tab = '';
                        if ( $open_in_new_tab == "true" ) {
                            $new_tab = 'target="_blank"';
                        }
                        ?>
                        <?php
                        if ( has_post_thumbnail() ) {
                            if( $image_link == 'true' ) {
                                echo'<div class="team-image"><a title="'.esc_attr( get_the_title() ).'" href="'. esc_url( get_permalink() ).'"'.esc_attr( $new_tab ).'>'.get_the_post_thumbnail( $post->ID, 'featured-recent-work' ).'</a></div>';
                            }
                            else {
                                echo'<div class="team-image">'.get_the_post_thumbnail( $post->ID, 'featured-recent-work' ).'</div>';
                            }
                        }
                        ?>
                        <h3 class="team-title">
                        <?php if( $title_link == 'true' ) : ?>
                            <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" <?php echo esc_attr( $new_tab ); ?>><?php the_title(); ?></a>
                        <?php else : ?>
                            <?php the_title(); ?>
                        <?php endif; ?>

                        </h3><!-- .team-title -->
                        <?php if ( !empty( $designation[ $key ] ) ) :
                        // For WPML plugin compatibility
                        if ( function_exists( 'icl_t' ) ) {
                            $designation[$key] = icl_t( 'Accelerate Pro', 'TG: Team widget team member designation' . $this->id . $key, $designation[ $key ] );
                        } ?>
                          <span class="team-designation"><?php echo esc_html( $designation[ $key ] ); ?></span>
                        <?php endif; ?>

            			<?php if ( !empty( $fbook ) || !empty( $twitter ) || !empty( $gplus ) ) : ?>
                          <div class="team-social-icon">
                            <ul>
                              <?php if ( $fbook[ $key ] !='' ) : ?>
                                <li><a href="<?php echo esc_url( $fbook[ $key ] ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <?php endif; ?>

                              <?php if ( $twitter[ $key ] !='' ) : ?>
                                <li><a href="<?php echo esc_url( $twitter[ $key ] ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <?php endif; ?>
                              <?php if ( $gplus[ $key ] !='' ) : ?>
                                <li><a href="<?php echo esc_url( $gplus[ $key ] ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                              <?php endif; ?>
                            </ul>
                          </div><!-- .team-social-icon -->
                        <?php endif; ?>

                        <div class="team-description">
                            <?php the_excerpt(); ?>
                        </div><!-- .team-description -->

                        <?php if ( $read_more_button_enable == "true" ) { ?>
                            <div class="more-link-wrap">
                                <a class="more-link" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" <?php echo esc_attr( $new_tab ); ?>><?php echo accelerate_options( 'accelerate_read_more_text', esc_html__( 'Read more', 'accelerate' ) ); ?></a>
                            </div><!-- .more-link-wrap -->
                        <?php } ?>
                    </div>
                    <?php if ( $post_count % $col_num == 0 ) { echo '<div class="clearfix"></div>'; } ?>
                    <?php $key++; ?>
                <?php endwhile;
                // Reset Post Data
                wp_reset_postdata();
                ?>
            </div>
        </div><!-- .all-team end -->
        <?php
        echo $after_widget;
        }
    }
}

/**************************************************************************************/
/**
 * Pricing Table widget
 */
class accelerate_pricing_table_widget extends WP_Widget {

    function __construct() {
        $widget_ops         = array( 'classname' => 'widget_table_pricing', 'description' => esc_html__( 'Use this widdget to show the Pricing Table plan. Best for Business Top or Bottom sidebar.', 'accelerate' ) );
        $control_ops        = array( 'width' => 200, 'height' =>250 );
        parent::__construct( false, $name = esc_html__( 'TG: Pricing Table', 'accelerate' ), $widget_ops, $control_ops);
    }

    function form( $instance ) {
      $defaults               = array();
      $defaults[ 'title' ]    = '';
      $defaults[ 'text' ]     = '';
      $defaults[ 'col_num' ]  = 3;
      for ( $col_count=0; $col_count<$defaults[ 'col_num' ]; $col_count++ ) {
            $defaults['package_badge_'.$col_count]         = '';
            $defaults['package_badge_bg_'.$col_count]      = '#b50101';
            $defaults['package_name_'.$col_count]          = '';
            $defaults['package_price_'.$col_count]         = '';
            $defaults['package_desc_'.$col_count]          = '';
            $defaults['package_subtitle_'.$col_count]      = '';
            $defaults['package_feature_num_'.$col_count]   = '4';
            $defaults['package_features_'.$col_count]      = '';
            $defaults['package_btn_txt_'.$col_count]       = '';
            $defaults['package_btn_url_'.$col_count]       = '';
            $defaults['package_color_'.$col_count]         = '#79cc8c';
         }

        $instance       = wp_parse_args( (array) $instance, $defaults );
        $title          = $instance['title'];
        $text           = $instance['text'];
        $col_num        = $instance['col_num'];
        ?>
        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'accelerate' ); ?></label>
          <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <?php esc_html_e( 'Description:','accelerate'); ?>
        <textarea id="<?php echo $this->get_field_id( 'text' ); ?>" class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $text ); ?></textarea>
        <p>
          <?php esc_html_e( 'Note: Enter number of columns for Pricing Table (default 3 columns) and save it then enter the data in respective field.', 'accelerate' ); ?>
        </p>

        <p>
          <label for="<?php echo $this->get_field_id( 'col_num' ); ?>" class="widefat"><?php esc_html_e( 'Display no of Columns:', 'accelerate' ); ?></label>
            <select id="<?php echo $this->get_field_id( 'col_num' ); ?>" name="<?php echo $this->get_field_name( 'col_num' ); ?>">
              <option value="2" <?php echo esc_attr( '2' == $col_num ? 'selected="selected"' : '' ); ?> ><?php esc_html_e('Two','accelerate'); ?></option>
              <option value="3" <?php echo esc_attr( '3' == $col_num ? 'selected="selected"' : '' ); ?>><?php esc_html_e('Three','accelerate'); ?></option>
              <option value="4" <?php echo esc_attr( '4' == $col_num ? 'selected="selected"' : '' ); ?>><?php esc_html_e('Four','accelerate'); ?></option>
            </select>
        </p>
    <hr/>
        <?php for ( $col_count=0; $col_count<$instance['col_num']; $col_count++ ) : ?>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_name_'.$col_count ); ?>"><?php esc_html_e( 'Title :', 'accelerate' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'package_name_'.$col_count ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'package_name_'.$col_count ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'package_name_'.$col_count ] ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_price_'.$col_count ); ?>"><?php esc_html_e( 'Price :', 'accelerate' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'package_price_'.$col_count ); ?>" class="widefat"  name="<?php echo $this->get_field_name( 'package_price_'.$col_count ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'package_price_'.$col_count ] ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_desc_'.$col_count ); ?>"><?php esc_html_e( 'Description :', 'accelerate' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'package_desc_'.$col_count ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'package_desc_'.$col_count ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'package_desc_'.$col_count ] ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_subtitle_'.$col_count ); ?>"><?php esc_html_e( 'Sub Title :', 'accelerate' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'package_subtitle_'.$col_count ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'package_subtitle_'.$col_count ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'package_subtitle_'.$col_count ] ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_badge_'.$col_count ); ?>"><?php esc_html_e( 'Badge :', 'accelerate' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'package_badge_'.$col_count ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'package_badge_'.$col_count ); ?>" type="text" maxlength="9" value="<?php echo esc_attr( $instance[ 'package_badge_'.$col_count ] ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_badge_bg_'.$col_count ); ?>"><?php esc_html_e( 'Badge background :', 'accelerate' ); ?></label><br/>
                <input id="<?php echo $this->get_field_id( 'package_badge_bg_'.$col_count ); ?>" class="widefat tg-color-picker" name="<?php echo $this->get_field_name( 'package_badge_bg_'.$col_count ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'package_badge_bg_'.$col_count ] ); ?>" />
            </p>

            <p>
              <?php esc_html_e( 'Note: Enter the number of features to display in column (default 4 features) and save it then enter the data in respective field.', 'accelerate' ); ?>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_feature_num_'.$col_count ); ?>"><?php esc_html_e( 'Number of features to display :', 'accelerate' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'package_feature_num_'.$col_count ); ?>" class="tiny-text" step="1" min="1" name="<?php echo $this->get_field_name( 'package_feature_num_'.$col_count ); ?>" type="number" value="<?php echo absint( $instance[ 'package_feature_num_'.$col_count ] ); ?>" />
            </p>

            <p><?php esc_html_e( 'Features :', 'accelerate' ); ?></p>

            <?php for ( $feature_count=0; $feature_count<$instance[ 'package_feature_num_'.$col_count ]; $feature_count++ ) : ?>
              <p>
                  <label for="<?php echo $this->get_field_id( 'package_features_'.$col_count ); ?>[<?php echo absint( $feature_count ); ?>]"></label>
                  <input id="<?php echo $this->get_field_id( 'package_features_'.$col_count ); ?>[<?php echo absint( $feature_count ); ?>]" class="widefat" name="<?php echo $this->get_field_name( 'package_features_'.$col_count ); ?>[]" type="text" value="<?php if ( isset( $instance[ 'package_features_'.$col_count ][ $feature_count ] ) ) echo esc_attr( $instance[ 'package_features_'.$col_count ][ $feature_count ] ); ?>" />
              </p>
            <?php endfor; ?>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_btn_txt_'.$col_count ); ?>"><?php esc_html_e( 'Button Text :', 'accelerate' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'package_btn_txt_'.$col_count ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'package_btn_txt_'.$col_count ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'package_btn_txt_'.$col_count ] ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_btn_url_'.$col_count ); ?>"><?php esc_html_e( 'Button URL :', 'accelerate' ); ?></label>
                <input id="<?php echo $this->get_field_id( 'package_btn_url_'.$col_count ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'package_btn_url_'.$col_count ); ?>" type="text" value="<?php echo esc_url( $instance[ 'package_btn_url_'.$col_count ] ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'package_color_'.$col_count ); ?>"><?php esc_html_e( 'Color :', 'accelerate' ); ?></label><br/>
                <input id="<?php echo $this->get_field_id( 'package_color_'.$col_count ); ?>" class="widefat tg-color-picker" name="<?php echo $this->get_field_name( 'package_color_'.$col_count ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'package_color_'.$col_count ] ); ?>" />
            </p>

            <hr>
        <?php endfor; ?>

    <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance               = $old_instance;
        $instance[ 'title' ]    = sanitize_text_field( $new_instance[ 'title' ] );
        $instance[ 'col_num' ]  = absint( $new_instance[ 'col_num' ] );

        for( $col_count=0; $col_count<$instance['col_num']; $col_count++ ) {
            $instance[ 'package_badge_'.$col_count ]        = sanitize_text_field( $new_instance[ 'package_badge_'.$col_count ] );
            $instance[ 'package_badge_bg_'.$col_count ]        = isset( $new_instance[ 'package_badge_bg_'.$col_count ] ) ? esc_attr( $new_instance[ 'package_badge_bg_'.$col_count ] ) : '#b50101';
            $instance[ 'package_name_'.$col_count ]         = sanitize_text_field( $new_instance[ 'package_name_'.$col_count ] );
            $instance[ 'package_price_'.$col_count ]        = sanitize_text_field( $new_instance[ 'package_price_'.$col_count ] );
            $instance[ 'package_desc_'.$col_count ]         = sanitize_text_field( $new_instance[ 'package_desc_'.$col_count ] );
            $instance[ 'package_subtitle_'.$col_count ]     = sanitize_text_field( $new_instance[ 'package_subtitle_'.$col_count ] );
            $instance[ 'package_feature_num_'.$col_count ]  = isset( $new_instance[ 'package_feature_num_'.$col_count ] ) ? absint( $new_instance[ 'package_feature_num_'.$col_count ] ) : 4;
            $instance[ 'package_btn_txt_'.$col_count ]      = sanitize_text_field( $new_instance[ 'package_btn_txt_'.$col_count ] );
            $instance[ 'package_btn_url_'.$col_count ]      = esc_url_raw( $new_instance[ 'package_btn_url_'.$col_count ] );
            $instance[ 'package_color_'.$col_count ]        = isset( $new_instance[ 'package_color_'.$col_count ] ) ? esc_attr( $new_instance[ 'package_color_'.$col_count ] ) : '#79cc8c';
            $col_features                                   = 'package_features_'.$col_count;
            $instance[ $col_features ]                      = array();
            if ( isset( $new_instance[ $col_features ] ) ) {
              foreach ( $new_instance[ $col_features ] as $feature ){
                $instance[ $col_features ][] = sanitize_text_field( $feature );
              }
            }
        }
        if ( current_user_can('unfiltered_html') )
            $instance['text']       =  $new_instance['text'];
        else
            $instance['text']       = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
        return $instance;
    }

    function widget( $args, $instance ) {
        extract($args);
        extract($instance);
        $title = apply_filters( 'widget_title', empty( $instance[ 'title' ] ) ? '' : $instance[ 'title' ], $instance );
        $text               = isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
        // For WPML plugin compatibility
      if ( function_exists( 'icl_register_string' ) && !empty( $text ) ) {
        icl_register_string( 'Accelerate Pro', 'TG: Pricing Table widget description text' . $this->id, $text );
      }
        $col_num            = empty( $instance[ 'col_num' ] ) ? '3' : $instance[ 'col_num' ];
        $badge          = array();
        $badge_bg       = array();
        $packages           = array();
        $prices             = array();
        $package_descs      = array();
        $subtitles          = array();
        $feature_num        = array();
        $features           = array();
        $btn_text           = array();
        $btn_URL            = array();
        $colors             = array();
        for( $col_count=0; $col_count<$col_num; $col_count++ ) {
            $badge[]        = isset( $instance[ 'package_badge_'.$col_count ] ) ? $instance[ 'package_badge_'.$col_count ] : '';
            $badge_bg[]     = isset( $instance[ 'package_badge_bg_'.$col_count ] ) ? $instance[ 'package_badge_bg_'.$col_count ] : '';
            $packages[]         = isset( $instance[ 'package_name_'.$col_count ] ) ? $instance[ 'package_name_'.$col_count ] : '';
            $prices[]           = isset( $instance[ 'package_price_'.$col_count ] ) ? $instance[ 'package_price_'.$col_count ] : '';
            $package_descs[]    = isset( $instance[ 'package_desc_'.$col_count ] ) ? $instance[ 'package_desc_'.$col_count ] : '';
            $subtitles[]        = isset( $instance[ 'package_subtitle_'.$col_count ] ) ? $instance[ 'package_subtitle_'.$col_count ] : '';
            $feature_num[]      = isset( $instance[ 'package_feature_num_'.$col_count ] ) ? $instance[ 'package_feature_num_'.$col_count ] : '';
            $btn_text[]         = isset( $instance[ 'package_btn_txt_'.$col_count ] ) ? $instance[ 'package_btn_txt_'.$col_count ] : '';
            $btn_URL[]          = isset( $instance[ 'package_btn_url_'.$col_count ] ) ? $instance[ 'package_btn_url_'.$col_count ] : '';
            $colors[]           = isset( $instance[ 'package_color_'.$col_count ] ) ? $instance[ 'package_color_'.$col_count ] : '';
            $features[]         = isset( $instance[ 'package_features_'.$col_count ] ) ? $instance[ 'package_features_'.$col_count ] : '';

            // For WPML plugin compatibility
          if ( function_exists( 'icl_register_string' ) && !empty( $packages ) ) {
            icl_register_string( 'Accelerate Pro', 'TG: Pricing Table Package Title' . $this->id . $col_count, $packages[ $col_count ] );
              if( !empty( $prices ) ) {
                icl_register_string( 'Accelerate Pro', 'TG: Pricing Table Package Price' . $this->id . $col_count, $prices[ $col_count ] );
              }
              if( !empty( $package_descs ) ) {
                icl_register_string( 'Accelerate Pro', 'TG: Pricing Table Package Description' . $this->id . $col_count, $package_descs[ $col_count ] );
              }
              if( !empty( $subtitles ) ) {
                icl_register_string( 'Accelerate Pro', 'TG: Pricing Table Package Sub Title' . $this->id . $col_count, $subtitles[ $col_count ] );
              }
              if( !empty( $badge ) ) {
                icl_register_string( 'Accelerate Pro', 'TG: Pricing Table Package Badge' . $this->id . $col_count, $badge[ $col_count ] );
              }
              if( !empty( $btn_text ) ) {
                icl_register_string( 'Accelerate Pro', 'TG: Pricing Table Package Button Text' . $this->id . $col_count, $btn_text[ $col_count ] );
              }
              if( !empty( $features ) ) {
                foreach ($features[ $col_count ] as $key => $value) {
                  icl_register_string( 'Accelerate Pro', 'TG: Pricing Table Table Features' . $this->id . $col_count . $key, $value );
                }
              }
          }
        }
        echo $before_widget; ?>

        <div class="section-wrapper">

            <div class="tg-container pricing-table pricing-column-<?php echo esc_attr( $col_num ); ?> clearfix">
                <?php if( !empty( $title ) ) : ?>
                    <h3 class="widget-title"><?php echo esc_html( $title ); ?></h3>
                <?php endif;?>

                <?php if( !empty( $text ) ) : ?>
                    <p><?php
                    // For WPML plugin compatibility
                if ( function_exists( 'icl_t' ) ) {
                    $text = icl_t( 'Accelerate Pro', 'TG: Pricing Table widget description text' . $this->id, $text );
                }
                echo esc_textarea( $text ); ?></p>
                <?php endif;?>

                <?php if( !empty( $packages ) ) : ?>

                    <?php for ( $col_count=0; $col_count<$col_num; $col_count++ ) :
                      $item = $col_count + 1;
                        $column_class = '';
                      if ( $col_num == 2 ) :
                          if ( $item % 2 == 0 ) {
                              $column_class = 'tg-one-half tg-one-half-last';
                          } else {
                              $column_class = 'tg-one-half';
                          }
                      elseif ( $col_num == 3 ) :
                          if ( $item % 3 == 0 ) {
                             $column_class = "tg-one-third tg-one-third-last";
                          }
                          else {
                             $column_class = "tg-one-third";
                          }
                      elseif ( $col_num == 4 ) :
                          if ( $item % 4 == 0 ) {
                             $column_class = 'tg-one-fourth tg-one-fourth-last';
                          } else {
                             $column_class = 'tg-one-fourth';
                          }
                      endif;
                        ?>
                        <div class="<?php echo esc_attr( $column_class ) ?>">

                            <?php if ( $packages[$col_count] !='' ) : ?>
                                <div class="pricing-table-wrapper-<?php echo absint( $col_count ); ?> pricing-table-wrapper">
                                    <?php if ( $badge[ $col_count ] ) :
                                    // For WPML plugin compatibility
                                    if ( function_exists( 'icl_t' ) ) {
                                      $badge[ $col_count ] = icl_t( 'Accelerate Pro', 'TG: Pricing Table Package Badge' . $this->id . $col_count, $badge[ $col_count ] );
                                    } ?>
                                        <span class="pricing-as-popular" style="background: <?php echo esc_attr( $badge_bg[ $col_count ] );?>"><?php echo esc_html( $badge[ $col_count ] ) ;?></span>
                                    <?php endif;?>

                                    <?php // For WPML plugin compatibility
                                    if ( function_exists( 'icl_t' ) ) {
                                      $packages[ $col_count ] = icl_t( 'Accelerate Pro', 'TG: Pricing Table Package Name' . $this->id . $col_count, $packages[ $col_count ] );
                                    } ?>
                                    <?php if ( !empty( $packages[ $col_count ] ) ) : ?>
                                        <h4 class="pricing-title" style="background: <?php echo esc_attr( $colors[ $col_count ] );?>"><?php echo esc_html( $packages[ $col_count ] ); ?></h4>
                                    <?php endif;?>

                                    <?php // For WPML plugin compatibility
                                    if ( function_exists( 'icl_t' ) ) {
                                      $prices[ $col_count ] = icl_t( 'Accelerate Pro', 'TG: Pricing Table Package Price' . $this->id . $col_count, $prices[ $col_count ] );
                                      $package_descs[ $col_count ] = icl_t( 'Accelerate Pro', 'TG: Pricing Table Package Description' . $this->id . $col_count, $package_descs[ $col_count ] );

                                    } ?>

                                    <?php if ( !empty( $subtitles[ $col_count ] ) || !empty( $prices[ $col_count ] ) || !empty( $package_descs[ $col_count ] ) ) : ?>
                                      <?php // For WPML plugin compatibility
                                      if ( function_exists( 'icl_t' ) ) {
                                        $subtitles[ $col_count ] = icl_t( 'Accelerate Pro', 'TG: Pricing Table Package Sub Title' . $this->id . $col_count, $subtitles[ $col_count ] );
                                      }
                                      ?>
                                        <div class="pricing-price">
                                          <?php if ( $prices[ $col_count ] != '' ) : ?>
                                            <span class="pricing-currnecy"><?php echo esc_html( $prices[ $col_count ] ); ?></span>
                                          <?php endif; ?>
                                          <?php if ( $package_descs[ $col_count ] != '' ) : ?>
                                            <span class="pricing-date"><?php echo esc_html( $package_descs[ $col_count ] ); ?></span>
                                          <?php endif; ?>
                                          <?php if ( $subtitles[ $col_count ] != '' ) : ?>
                                            <span class="pricing-subtitle" style="color: <?php echo esc_attr( $colors[ $col_count ] );?>" ><?php echo esc_html( $subtitles[ $col_count ] ); ?></span>
                                          <?php endif; ?>
                                        </div>
                                    <?php endif;?>
                                    <?php if ( !empty( $feature_num ) ) : ?>
                                        <ul class="pricing-list-wrapper">

                                        <?php if ( !empty( $features[ $col_count ] ) ) :
                                          foreach ($features[ $col_count ] as $key => $value ) {
                                              if ( $value != '' ) {
                                                // For WPML plugin compatibility
                                                if ( function_exists( 'icl_t' ) ) {
                                                    $value = icl_t( 'Accelerate Pro', 'TG: Pricing Table Table Features' . $this->id . $col_count . $key, $value );
                                                }
                                              echo '<li class="pricing-list">'.esc_html( $value ).'</li>';
                                              }
                                          }
                                        endif; ?>
                                        </ul>
                                    <?php endif;?>

                                    <?php // For WPML plugin compatibility
                                    if ( function_exists( 'icl_t' ) ) {
                                      $btn_text[ $col_count ] = icl_t( 'Accelerate Pro', 'TG: Pricing Table Package Button Text' . $this->id . $col_count, $btn_text[ $col_count ] );
                                    } ?>

                                    <?php if ( !empty( $btn_text[ $col_count ] ) ) : ?>
                                        <div class="pricing-btn">
                                            <a href="<?php echo esc_url( $btn_URL[ $col_count ] ); ?>" style="background: <?php echo esc_attr( $colors[ $col_count ] );?>"><?php echo esc_html( $btn_text[ $col_count ] ); ?></a>
                                        </div>
                                    <?php endif;?>
                                </div><!-- pricing-table-wrapper -->
                            <?php $item++; endif; ?>
                        </div> <!-- end of column -->
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>

        <?php echo $after_widget;
    }
}
?>
