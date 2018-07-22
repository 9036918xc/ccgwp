<?php
/**
 * Theme Footer Section for our theme.
 *
 * Displays all of the footer section and closing of the #main div.
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */
?>

</div><!-- .inner-wrap -->
</div><!-- #main -->

<?php if ( is_active_sidebar( 'colormag_advertisement_above_the_footer_sidebar' ) ) { ?>
	<div class="advertisement_above_footer">
		<div class="inner-wrap">
			<?php dynamic_sidebar( 'colormag_advertisement_above_the_footer_sidebar' ); ?>
		</div>
	</div>
<?php } ?>

<?php do_action( 'colormag_before_footer' ); ?>

<?php
// Add the main total header area display type dynamic class
$main_total_footer_option_layout_class = get_theme_mod( 'colormag_main_footer_layout_display_type', 'type_one' );

$class_name = '';
if ( $main_total_footer_option_layout_class == 'type_two' ) {
	$class_name = 'colormag-footer--classic';
} else if ( $main_total_footer_option_layout_class == 'type_three' ) {
	$class_name = 'colormag-footer--classic-bordered';
}
?>

<footer id="colophon" class="clearfix <?php echo esc_attr( $class_name ); ?>"<?php echo colormag_schema_markup( 'footer' ); ?>>
	<?php get_sidebar( 'footer' ); ?>
	<div class="footer-socket-wrapper clearfix">
		<div class="inner-wrap">
			<div class="footer-socket-area">
				<div class="footer-socket-right-section">
					<?php
					if ( ( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) && ( ( get_theme_mod( 'colormag_social_link_location_option', 'both' ) == 'both' ) || ( get_theme_mod( 'colormag_social_link_location_option', 'both' ) == 'footer' ) ) ) {
						colormag_social_links();
					}
					?>

					<nav class="footer-menu clearfix">
						<?php
						if ( has_nav_menu( 'footer' ) ) {
							wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => - 1 ) );
						}
						?>
					</nav>
				</div>

				<div class="footer-socket-left-section">
					<?php do_action( 'colormag_footer_copyright' ); ?>
				</div>
			</div>

		</div>
	</div>
</footer>

<?php if ( get_theme_mod( 'colormag_scroll_to_top', 0 ) == 0 ) { ?>
	<a href="#masthead" id="scroll-up"><i class="fa fa-chevron-up"></i></a>
<?php } ?>

<?php if ( ( get_theme_mod( 'colormag_prognroll_indicator', 0 ) == 1 ) && is_single() ) { ?>
	<div class="reading-progress-bar"></div>
<?php } ?>

<?php if ( get_theme_mod( 'colormag_related_post_flyout_setting', 0 ) == 1 && is_single() ) {
	get_template_part( 'inc/flyout-related-posts' );
}
?>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
