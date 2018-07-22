<?php

/*

This is the Child functions.php file created by me, MC, on 9-3-16
as instructed via the WP website.


*/


function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'colormag-pro-style' for the ColorMag-Pro theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>