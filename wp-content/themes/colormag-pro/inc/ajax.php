<?php
/**
 * Localize load more scripts
 */
function colormag_register_load_more_scripts() {
	wp_localize_script( 'colormag-custom', 'colormag_load_more', array(
		'tg_nonce' => wp_create_nonce( 'tg_nonce' ),
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
}

add_action( 'wp_enqueue_scripts', 'colormag_register_load_more_scripts' );

/**
 * Ajax load more posts
 */
function colormag_get_ajax_results() {
	if ( ! isset( $_POST['tg_nonce'] ) || ! wp_verify_nonce( $_POST['tg_nonce'], 'tg_nonce' ) ) {
		die( esc_html__( 'Permissions check failed.', 'colormag' ) );
	}

	$tg_pagenumber     = absint( ( isset( $_POST['tg_pagenumber'] ) ) ? $_POST['tg_pagenumber'] : 0 );
	$tg_category       = isset( $_POST['tg_category'] ) ? $_POST['tg_category'] : 0;
	$tg_number         = absint( ( isset( $_POST['tg_number'] ) ) ? $_POST['tg_number'] : 0 );
	$tg_random         = isset( $_POST['tg_random'] ) ? $_POST['tg_random'] : '';
	$tg_child_category = isset( $_POST['tg_child_category'] ) ? $_POST['tg_child_category'] : '';

	global $post;
	if ( $tg_random == "false" ) {
		if ( $tg_category == '-1' ) {
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => $tg_number,
				'paged'          => $tg_pagenumber,
				'post_status'    => 'publish',
			);
		} else {
			if ( $tg_child_category == 1 ) {
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => $tg_number,
					'paged'          => $tg_pagenumber,
					'cat'            => $tg_category,
					'post_status'    => 'publish',
				);
			} else {
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => $tg_number,
					'paged'          => $tg_pagenumber,
					'category__in'   => $tg_category,
					'post_status'    => 'publish',
				);
			}
		}
	} else {
		if ( $tg_category == '-1' ) {
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => $tg_number,
				'paged'          => $tg_pagenumber,
				'orderby'        => 'rand',
				'post_status'    => 'publish',
			);
		} else {
			if ( $tg_child_category == 1 ) {
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => $tg_number,
					'paged'          => $tg_pagenumber,
					'cat'            => $tg_category,
					'orderby'        => 'rand',
					'post_status'    => 'publish',
				);
			} else {
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => $tg_number,
					'paged'          => $tg_pagenumber,
					'category__in'   => $tg_category,
					'orderby'        => 'rand',
					'post_status'    => 'publish',
				);
			}
		}
	}

	$featured_ajax_posts = new WP_Query( $args );
	if ( $featured_ajax_posts->have_posts() ) : ?>
		<div class="following-post">
			<?php while ( $featured_ajax_posts->have_posts() ) : $featured_ajax_posts->the_post(); ?>
				<div class="single-article clearfix">
					<?php
					if ( has_post_thumbnail() ) {
						$image           = '';
						$title_attribute = get_the_title( $post->ID );

						$image .= '<figure>';
						$image .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
						$image .= get_the_post_thumbnail( $post->ID, 'colormag-featured-post-small', array(
								'title' => esc_attr( $title_attribute ),
								'alt'   => esc_attr( $title_attribute ),
							) ) . '</a>';
						$image .= '</figure>';

						echo $image;
					}
					?>
					<div class="article-content">
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="below-entry-meta">
							<?php
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
							$time_string = sprintf( $time_string,
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() )
							);
							printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ),
								esc_url( get_permalink() ),
								esc_attr( get_the_time() ),
								$time_string
							);
							?>
							<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span>
							<span class="comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' ); ?></span>
						</div>
					</div>
				</div>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</div>
	<?php endif;
}

add_action( 'wp_ajax_get_ajax_results', 'colormag_get_ajax_results' ); // for logged in users
add_action( 'wp_ajax_nopriv_get_ajax_results', 'colormag_get_ajax_results' ); // for logged out users

/**
 * Localize script
 */
function colormag_load_scripts() {
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'colormag-loadmore', get_template_directory_uri() . '/js/loadmore' . $suffix . '.js' );
	wp_localize_script( 'colormag-loadmore', 'colormag_script_vars', array(
		'no_more_posts' => esc_html__( 'No more post', 'colormag' ),
	) );
}

add_action( 'wp_enqueue_scripts', 'colormag_load_scripts' );
