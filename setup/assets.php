<?php

add_action( 'wp_enqueue_scripts', 'educationhub_enqueue_styles' );
function educationhub_enqueue_styles()
{
    wp_enqueue_style( 'wordpress-helfi-helsinkiteema-child', get_stylesheet_directory_uri() . '/assets/style.min.css',
        array( 'theme' )
    );
}


function educationhub_custom_palette() 
{
	// Disable Custom Colors
	add_theme_support( 'disable-custom-colors' );
  
	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'	=> __( 'Copper', 'ea-starter' ),
			'slug'	=> 'copper',
			'color'	=> '#00d7a7',
		),
        array(
            'name' => esc_attr_x( 'Primary', 'Editor palette','helsinki-universal' ),
            'slug' => 'primary',
            'color' => '#0072c6',
        ),
        array(
            'name' => esc_attr_x( 'Black', 'Editor palette','helsinki-universal' ),
            'slug' => 'black',
            'color' => '#000000',
        ),
        array(
            'name' => esc_attr_x( 'White', 'Editor palette','helsinki-universal' ),
            'slug' => 'white',
            'color' => '#ffffff',
        ),
        array(
            'name' => esc_attr_x( 'Light Gray', 'Editor palette','helsinki-universal' ),
            'slug' => 'light-gray',
            'color' => '#f7f7f8',
        ),
        array(
            'name' => esc_attr_x( 'Light', 'Editor palette','helsinki-universal' ),
            'slug' => 'light',
            'color' => '#b5daf7',
        ),
	) );
}
add_action( 'after_setup_theme', 'educationhub_custom_palette' );

/**
 * Allow svg uploads
 *
 */
function educationhub_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'educationhub_mime_types');