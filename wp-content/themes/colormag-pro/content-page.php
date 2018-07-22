<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php echo colormag_schema_markup( 'entry' ); ?>>
	<?php do_action( 'colormag_before_post_content' ); ?>

	<?php if ( ( get_theme_mod( 'colormag_featured_image_single_page_show', 1 ) == 1 ) && ( has_post_thumbnail() ) ) { ?>
		<div class="featured-image"<?php echo colormag_schema_markup( 'image' ); ?>>
			<?php the_post_thumbnail( 'colormag-featured-image' ); ?>
			<?php
			if ( get_theme_mod( 'colormag_schema_markup', '' ) == 1 ) : ?>
				<meta itemprop="url" content="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>">
			<?php endif; ?>
		</div>
	<?php } ?>

	<header class="entry-header">
		<?php if ( is_front_page() ) : ?>
			<h2 class="entry-title"<?php echo colormag_schema_markup( 'entry_title' ); ?>>
				<?php the_title(); ?>
			</h2>
		<?php else : ?>
			<h1 class="entry-title"<?php echo colormag_schema_markup( 'entry_title' ); ?>>
				<?php the_title(); ?>
			</h1>
		<?php endif; ?>
	</header>

	<div class="entry-content clearfix"<?php echo colormag_schema_markup( 'entry_content' ); ?>>
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div style="clear: both;"></div><div class="pagination clearfix">' . __( 'Pages:', 'colormag' ),
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
		?>
	</div>

	<div class="entry-footer">
		<?php
		// Edit button remove option add
		if ( get_theme_mod( 'colormag_edit_button_entry_meta_remove', 0 ) == 0 ) {
			edit_post_link( __( 'Edit', 'colormag' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' );
		}
		?>
	</div>

	<?php do_action( 'colormag_after_post_content' ); ?>
</article>
