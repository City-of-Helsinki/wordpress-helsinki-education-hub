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


add_action('wp_head', 'educationhub_init_header_scripts');
add_action('wp_footer', 'educationhub_init_footer_scripts');

function educationhub_init_header_scripts(){
    $scripts = helsinki_theme_mod( 'header_footer_scripts_header', 'header_script_textarea' );
    educationhub_init_output_scripts($scripts);
}

function educationhub_init_footer_scripts(){

    $scripts = helsinki_theme_mod( 'header_footer_scripts_header', 'footer_script_textarea' );
    educationhub_init_output_scripts($scripts);
}

function educationhub_init_output_scripts($scripts){
		if ( is_admin() || is_feed() || is_robots() || is_trackback() ) {
			return;
		}
		if ( empty( $scripts ) ) {
			return;
		}
		if ( trim( $scripts ) === '' ) {
			return;
		}
        echo $scripts;
}
