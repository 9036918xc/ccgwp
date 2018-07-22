<?php
/**
 * Theme Header Section for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main" class="clearfix"> <div class="inner-wrap">
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php
	/**
	 * This hook is important for wordpress plugins and other many things
	 */
	wp_head();
	?>
</head>

<body <?php body_class(); ?><?php echo colormag_schema_markup( 'body' ); ?>>

<?php
$background_image_url_link = get_theme_mod( 'colormag_background_image_link' );
if ( $background_image_url_link ) {
	echo '<a href="' . esc_url( $background_image_url_link ) . '" class="background-image-clickable" target="_blank"></a>';
}
?>

<?php
global $colormag_duplicate_posts;
$colormag_duplicate_posts = array();
?>

<?php do_action( 'colormag_before' ); ?>

<div id="page" class="hfeed site">

	<?php do_action( 'colormag_before_header' ); ?>

	<?php
	// Add the main total header area display type dynamic class
	$main_total_header_option_layout_class = get_theme_mod( 'colormag_main_total_header_area_display_type', 'type_one' );

	$class_name = '';
	if ( $main_total_header_option_layout_class == 'type_two' ) {
		$class_name = 'colormag-header-clean';
	} else if ( $main_total_header_option_layout_class == 'type_three' ) {
		$class_name = 'colormag-header-classic';
	} else if ( $main_total_header_option_layout_class == 'type_four' ) {
		$class_name = 'colormag-header-clean colormag-header-clean--top';
	} else if ( $main_total_header_option_layout_class == 'type_five' ) {
		$class_name = 'colormag-header-clean colormag-header-clean--full-width';
	} else if ( $main_total_header_option_layout_class == 'type_six' ) {
		$class_name = 'colormag-header-classic colormag-header-classic--top';
	}
	?>

	<header id="masthead" class="site-header clearfix <?php echo esc_attr( $class_name ); ?>"<?php echo colormag_schema_markup( 'header' ); ?>>
		<div id="header-text-nav-container" class="clearfix">

			<?php if ( $main_total_header_option_layout_class == 'type_one' || $main_total_header_option_layout_class == 'type_two' || $main_total_header_option_layout_class == 'type_three' ) : ?>

				<?php colormag_top_header_bar_display(); // Display the top header bar ?>

				<?php
				if ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_one' ) {
					colormag_render_header_image();
				}
				?>

				<?php colormag_middle_header_bar_display(); // Display the middle header bar ?>

				<?php
				if ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_two' ) {
					colormag_render_header_image();
				}
				?>

				<?php colormag_below_header_bar_display(); // Display the below header bar  ?>

			<?php elseif ( ( $main_total_header_option_layout_class == 'type_four' ) || ( $main_total_header_option_layout_class == 'type_six' ) ) : ?>

				<?php colormag_top_header_bar_display(); // Display the top header bar ?>

				<?php colormag_below_header_bar_display(); // Display the below header bar  ?>

				<?php
				if ( ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_one' ) || ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_two' ) || ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_three' ) ) {
					colormag_render_header_image();
				}
				?>

				<?php colormag_middle_header_bar_display(); // Display the middle header bar ?>

			<?php elseif ( $main_total_header_option_layout_class == 'type_five' ) : ?>

				<?php colormag_below_header_bar_display(); // Display the below header bar  ?>

				<?php
				if ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_three' ) {
					colormag_render_header_image();
				}
				?>

				<?php colormag_top_header_bar_display(); // Display the top header bar ?>

				<?php
				if ( ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_one' ) || ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_two' ) ) {
					colormag_render_header_image();
				}
				?>

				<?php colormag_middle_header_bar_display(); // Display the middle header bar ?>

			<?php endif; ?>

		</div><!-- #header-text-nav-container -->

		<?php
		if ( ( get_theme_mod( 'colormag_header_image_position', 'position_two' ) == 'position_three' ) && ( ( $main_total_header_option_layout_class == 'type_one' ) || ( $main_total_header_option_layout_class == 'type_two' ) || ( $main_total_header_option_layout_class == 'type_three' ) ) ) {
			colormag_render_header_image();
		}
		?>

	</header>

	<?php do_action( 'colormag_after_header' ); ?>
	<?php do_action( 'colormag_before_main' ); ?>

	<div id="main" class="clearfix"<?php echo colormag_schema_markup( 'content' ); ?>>
		<?php if ( ( get_theme_mod( 'colormag_breaking_news', 0 ) == 1 ) && get_theme_mod( 'colormag_breaking_news_position_options', 'header' ) == 'main' ) : ?>
			<div class="breaking-news-main inner-wrap clearfix">
				<?php colormag_breaking_news(); ?>
			</div>
		<?php endif; ?>

		<?php if ( ( is_front_page() || is_page_template( 'page-templates/magazine.php' ) ) && ( ! is_page_template( 'page-templates/page-builder.php' ) ) ) { ?>
			<div class="top-full-width-sidebar inner-wrap clearfix">
				<?php
				if ( is_active_sidebar( 'colormag_front_page_top_full_width_area' ) ) {
					if ( ! dynamic_sidebar( 'colormag_front_page_top_full_width_area' ) ):
					endif;
				}
				?>
			</div>
		<?php } ?>

		<div class="inner-wrap clearfix">
			<?php colormag_breadcrumb(); // Display the breadcrumb ?>
