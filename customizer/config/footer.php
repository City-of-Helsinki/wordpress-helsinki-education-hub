<?php
function educationhub_customizer_footer_sections(){
	return array(
		'helsinki_address' => array(

			'config' => array(
				'title'          => esc_html_x( 'Osoitetiedot', 'Customizer section title', 'helsinki-universal' ),
				'capability'     => 'edit_theme_options',
			),

			'section_settings' => array(

				'helsinki_address_textarea' => helsinki_setting_textarea(
					__('Osoitekenttä', 'educationhub'),
					'',
					''
				),

			), // section_settings

		), // entry
	);
}
