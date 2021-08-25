<?php
add_filter('helsinki_customizer_config', 'educationhub_customizer_config');

function educationhub_customizer_config($config){
    // Footer
    $config['helsinki_footer'] = array(

        'config' => array(
          'title'          => esc_html_x( 'Footer', 'Customizer panel title', 'helsinki-universal' ),
          'priority'       => 35,
          'capability'     => 'edit_theme_options',
        ),
  
        'panel_sections' => educationhub_customizer_footer_sections()
    );
    return $config;
}