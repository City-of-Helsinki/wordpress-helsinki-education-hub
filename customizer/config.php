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
    $config['header_footer_scripts'] =  array(
      'config' => array(
        'title'          => esc_html_x( 'Seurantakoodit', 'Customizer panel title', 'helsinki-universal' ),
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
      ),
      'panel_sections' => educationhub_customizer_header_footer_scripts_sections(),
    );

    return $config;
}

function educationhub_customizer_header_footer_scripts_sections(){
	return array(
		'header' => array(

			'config' => array(
				'title'          => esc_html_x( 'Lisää seurantakoodit', 'Customizer section title', 'helsinki-universal' ),
				'capability'     => 'edit_theme_options',
			),

			'section_settings' => array(

				'header_script_textarea' => array(
          'config' => array(
            'default'           => '',
            'type'              => 'theme_mod',
            'capability'        => 'manage_options',
          ),
          'setting_control' => array(
            'label'       => esc_html(__('Head-osaan sijoitettava javascript', 'educationhub')),
            'type'        => 'textarea',
          ),
        ),
				'footer_script_textarea' => array(
          'config' => array(
            'default'           => '',
            'type'              => 'theme_mod',
            'capability'        => 'manage_options',
          ),
          'setting_control' => array(
            'label'       => esc_html(__('Body osion loppuun sijoitettava javascript', 'educationhub')),
            'type'        => 'textarea',
          ),
        )

			), // section_settings

		), // entry
	);
}