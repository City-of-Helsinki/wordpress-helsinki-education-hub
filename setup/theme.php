<?php

function educationhub_setup_theme(){
  /**
   * Menu locations
   */
  register_nav_menus(
        [
            'some_menu'      => esc_html_x('Social Media Link', 'Registered menu name', 'helsinki-universal')
        ]
    );
    add_theme_support( 'align-wide' );
}


function educationhub_lift_block_styles(){
    $styles = [];
    foreach (helsinki_customizer_choices_style_schemes() as $key => $scheme){
        if (empty($key))
            continue;


        $styles[] = ['name' => $key, 'label' => $scheme ];
    }

    return $styles;
}


function educationhub_generate_child_setup() {
    add_theme_support('editor-styles');
    add_editor_style('assets/editor.css');
}
add_action('after_setup_theme', 'educationhub_generate_child_setup');

function educationhub_editor_scripts() {

    wp_enqueue_script(
            'educationhub-editor', 
            get_stylesheet_directory_uri() . '/assets/editor.js', 
            array( 'wp-blocks', 'wp-dom' ), 
            filemtime( get_stylesheet_directory() . '/assets/editor.js' ),
            true
    );
}
add_action( 'enqueue_block_editor_assets', 'educationhub_editor_scripts' );
