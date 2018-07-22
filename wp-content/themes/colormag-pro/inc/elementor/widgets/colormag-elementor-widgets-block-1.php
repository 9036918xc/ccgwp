<?php
/**
 * ColorMag Elementor Widget Block 1.
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 2.2.3
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class ColorMag_Elementor_Widgets_Block_1 extends Widget_Base {

	/**
	 * Retrieve ColorMag_Elementor_Widgets_Block_1 widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ColorMag-Posts-Block-1';
	}

	/**
	 * Retrieve ColorMag_Elementor_Widgets_Block_1 widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Block Style 1', 'colormag' );
	}

	/**
	 * Retrieve ColorMag_Elementor_Widgets_Block_1 widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'colormag-econs-block-1';
	}

	/**
	 * Retrieve the list of categories the ColorMag_Elementor_Widgets_Block_1 widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'colormag-widget-blocks' );
	}

	/**
	 * Register ColorMag_Elementor_Widgets_Block_1 widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_colormag_featured_posts_block_1_title_manage',
			array(
				'label' => esc_html__( 'Block Title', 'colormag' ),
			)
		);

		$this->add_control(
			'widget_title',
			array(
				'label'       => esc_html__( 'Title:', 'colormag' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your custom block title', 'colormag' ),
				'label_block' => true,
			)
		);

		// Widget title link.
		$this->add_control(
			'widget_title_link',
			array(
				'label'         => esc_html__( 'Title URL', 'colormag' ),
				'type'          => Controls_Manager::URL,
				'default'       => array(
					'url'         => '',
					'is_external' => '',
				),
				'show_external' => true,
			)
		);

		$this->end_controls_section();

		// Widget design section
		$this->start_controls_section(
			'section_colormag_featured_posts_block_1_design_manage',
			array(
				'label' => esc_html__( 'Widget Title', 'colormag' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'widget_title_color',
			array(
				'label'     => esc_html__( 'Color:', 'colormag' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#289dcc',
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .tg-module-wrapper .module-title span' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .tg-module-wrapper .module-title'      => 'border-bottom-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'widget_title_text_color',
			array(
				'label'     => esc_html__( 'Text Color:', 'colormag' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .tg-module-wrapper .module-title span'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .tg-module-wrapper .module-title span a' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Widget posts section
		$this->start_controls_section(
			'section_colormag_featured_posts_block_1_posts_manage',
			array(
				'label' => esc_html__( 'Posts', 'colormag' ),
			)
		);

		$this->add_control(
			'posts_number',
			array(
				'label'   => esc_html__( 'Number of posts to display:', 'colormag' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 5,
			)
		);

		$this->add_control(
			'offset_posts_number',
			array(
				'label' => esc_html__( 'Offset Posts:', 'colormag' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->end_controls_section();

		// Widget filter section
		$this->start_controls_section(
			'section_colormag_featured_posts_block_1_filter_manage',
			array(
				'label' => esc_html__( 'Filter', 'colormag' ),
			)
		);

		$this->add_control(
			'display_type',
			array(
				'label'   => esc_html__( 'Display the posts from:', 'colormag' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'latest',
				'options' => array(
					'latest'     => esc_html__( 'Latest Posts', 'colormag' ),
					'categories' => esc_html__( 'Categories', 'colormag' ),
					'tags'       => esc_html__( 'Tags', 'colormag' ),
					'authors'    => esc_html__( 'Authors', 'colormag' ),
				),
			)
		);

		$this->add_control(
			'categories_selected',
			array(
				'label'     => esc_html__( 'Select categories:', 'colormag' ),
				'type'      => Controls_Manager::SELECT2,
				'options'   => colormag_elementor_categories(),
				'multiple'  => true,
				'condition' => array(
					'display_type' => 'categories',
				),
			)
		);

		$this->add_control(
			'tags_selected',
			array(
				'label'     => esc_html__( 'Select tags:', 'colormag' ),
				'type'      => Controls_Manager::SELECT2,
				'options'   => colormag_elementor_tags(),
				'multiple'  => true,
				'condition' => array(
					'display_type' => 'tags',
				),
			)
		);

		$this->add_control(
			'authors_selected',
			array(
				'label'     => esc_html__( 'Select authors:', 'colormag' ),
				'type'      => Controls_Manager::SELECT2,
				'options'   => colormag_elementor_authors(),
				'multiple'  => true,
				'condition' => array(
					'display_type' => 'authors',
				),
			)
		);

		$this->add_control(
			'posts_sort_orderby',
			array(
				'label'   => esc_html__( 'Orderby:', 'colormag' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => array(
					'none'          => esc_html__( 'None', 'colormag' ),
					'ID'            => esc_html__( 'Post ID', 'colormag' ),
					'author'        => esc_html__( 'Post Author', 'colormag' ),
					'title'         => esc_html__( 'Post Title', 'colormag' ),
					'name'          => esc_html__( 'Post Name(Slug)', 'colormag' ),
					'date'          => esc_html__( 'Post Date', 'colormag' ),
					'modified'      => esc_html__( 'Post Modified Date', 'colormag' ),
					'rand'          => esc_html__( 'Random Post', 'colormag' ),
					'comment_count' => esc_html__( 'Comment Count', 'colormag' ),
				),
			)
		);

		$this->add_control(
			'posts_sort_order',
			array(
				'label'   => esc_html__( 'Sort Order:', 'colormag' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'ASC'  => esc_html__( 'Ascending', 'colormag' ),
					'DESC' => esc_html__( 'Descending', 'colormag' ),
				),
			)
		);

		$this->end_controls_section();

		// Pagination section
		$this->start_controls_section(
			'section_colormag_featured_posts_block_1_pagination_manage',
			array(
				'label' => esc_html__( 'Pagination', 'colormag' ),
			)
		);

		$this->add_control(
			'show_pagination',
			array(
				'label'        => esc_html__( 'Show Pagination', 'colormag' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => esc_html__( 'Show', 'colormag' ),
				'label_off'    => esc_html__( 'Hide', 'colormag' ),
				'return_value' => 'yes',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render ColorMag_Elementor_Widgets_Block_1 widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {

		global $post;

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		$posts_number             = $this->get_settings( 'posts_number' );
		$display_type             = $this->get_settings( 'display_type' );
		$offset_posts_number      = $this->get_settings( 'offset_posts_number' );
		$posts_sort_orderby       = $this->get_settings( 'posts_sort_orderby' );
		$posts_sort_order         = $this->get_settings( 'posts_sort_order' );
		$categories_selected      = $this->get_settings( 'categories_selected' );
		$tags_selected            = $this->get_settings( 'tags_selected' );
		$authors_selected         = $this->get_settings( 'authors_selected' );
		$show_pagination          = $this->get_settings( 'show_pagination' );
		$widget_title_link        = $this->get_settings( 'widget_title_link' );
		$widget_title_link_url    = $widget_title_link['url'];
		$widget_title_link_target = $widget_title_link['is_external'] ? 'target="_blank"' : '';

		$args = array(
			'posts_per_page'      => $posts_number,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
			'oderby'              => $posts_sort_orderby,
			'order'               => $posts_sort_order,
			'paged'               => $paged,
			'post_status'         => 'publish',
		);

		// Display from the category selected
		if ( 'categories' == $display_type ) {
			$args['category__in'] = $categories_selected;
		}

		// Display from the tags selected.
		if ( 'tags' == $display_type ) {
			$args['tag__in'] = $tags_selected;
		}

		// Display from the authors selected.
		if ( 'authors' == $display_type ) {
			$args['author__in'] = $authors_selected;
		}

		// Offset the posts
		if ( ! empty( $offset_posts_number ) ) {
			$args['offset'] = $offset_posts_number;
		} else {
			// adding the excluding post function
			$post__not_in         = colormag_exclude_duplicate_posts();
			$args['post__not_in'] = $post__not_in;
		}

		// If no pagination enabled, set no_found_rows to true for better query handling
		// and faster query execution.
		if ( $show_pagination == 'no' ) {
			$args['no_found_rows'] = true;
		}

		// Start the WP_Query Object/Class
		$get_featured_posts = new \WP_Query( $args );

		if ( empty( $offset_posts_number ) ) {
			colormag_append_excluded_duplicate_posts( $get_featured_posts );
		}
		?>

		<div class="tg-module-block tg-module-block--style-1 tg-module-wrapper tg-fade-in">
			<?php
			$widget_title = $this->get_settings( 'widget_title' );
			if ( ! empty( $widget_title ) ) : ?>
				<div class="tg-module-title-wrap">
					<h4 class="module-title">
						<span>
							<?php if ( $widget_title_link_url ) {
								echo '<a href="' . esc_url( $widget_title_link_url ) . '" ' . esc_attr( $widget_title_link_target ) . '>';
							} ?>

							<?php echo $this->get_settings( 'widget_title' ); ?>

							<?php if ( $widget_title_link_url ) {
								echo '</a>';
							} ?>
						</span>
					</h4>
				</div><!-- tg-module-title-wrap -->
			<?php endif;
			?>

			<div class="tg-row">
				<?php
				$count = 1;
				while ( $get_featured_posts->have_posts() ) :
				$get_featured_posts->the_post();

				// Display the reading time dynamically.
				$reading_time       = '';
				$reading_time_class = '';
				if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
					$reading_time       = 'data-file="' . get_the_permalink(). '" data-target="article"';
					$reading_time_class = 'readingtime';
				}

				$featured_image_size = ( $count == 1 ) ? 'colormag-featured-image' : 'colormag-featured-post-small';

				if ( $count == 1 ) : // on first post.
					?>
					<div class="tg-col-control"">
						<div class="tg_module_block <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<figure class="tg-module-thumb">
									<a href="<?php the_permalink(); ?>" class="tg-thumb-link">
										<?php the_post_thumbnail( $featured_image_size ); ?>
									</a>
									<?php colormag_elementor_colored_category(); ?>
								</figure>
							<?php
							else :
								if ( $count == 1 ) :
									colormag_elementor_colored_category();
								endif;
							endif;
							?>

							<h3 class="tg-module-title entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>

							<?php colormag_elementor_widgets_meta(); // Displays the entry meta
							?>
							<div class="tg-expert entry-content">
								<?php the_excerpt(); // Displays the post excerpts
								?>
							</div>
						</div> <!-- /.tg_module_block -->
					</div> <!-- /.tg-col-control -->
				<?php endif;

				if ( $count == 2 ) : ?>
				<div class="tg-col-control"">
					<?php endif; ?>

					<?php if ( $count >= 2 ) : // add grid style after first post. ?>
						<div class="tg_module_block tg_module_block--list-small <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<figure class="tg-module-thumb">
									<a href="<?php the_permalink(); ?>" class="tg-thumb-link">
										<?php the_post_thumbnail( $featured_image_size ); ?>
									</a>
								</figure>
							<?php endif; ?>

							<div class="tg-module-info">
								<h3 class="tg-module-title entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>

								<?php colormag_elementor_widgets_meta(); // Displays the entry meta ?>
							</div>
						</div>
					<?php endif;

					$count ++;
					endwhile;
					?>
					<?php if ( $count > 2 ) : ?>
				</div>
			<?php endif;

			// If pagination enabled, display the pagination links.
			if ( $show_pagination == 'yes' ) { ?>

				<div class="widget-pagination default-wp-page clearfix">
					<?php
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'    => '?paged=%#%',
						'current'   => max( 1, $paged ),
						'total'     => $get_featured_posts->max_num_pages,
						'prev_text' => esc_html__( '&larr; Previous' ),
						'next_text' => esc_html__( 'Next &rarr;' ),
						'mid_size'  => 1,
					) );
					?>
				</div>

				<?php
			}
			// Reset the postdata
			wp_reset_postdata();
			?>
			</div> <!-- /.tg-row -->
		</div>
		<?php
	}
}
