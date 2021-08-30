<?php

add_action('after_setup_theme', 'educationhub_register_polylang_strings', 10);

function educationhub_register_polylang_strings() {
	if ( ! apply_filters('helsinki_polylang_active', false) ) {
		return;
	}
    $group = 'educationhub';
    // Events
    pll_register_string('Events', 'Events', $group);
    pll_register_string('Event', 'Event', $group);
    pll_register_string('All Events', 'All Events', $group);
    pll_register_string('Upcoming events', 'Upcoming events', $group);
    pll_register_string('Contact', 'Contact', $group);
    pll_register_string('Event starts', 'Event starts', $group);
    pll_register_string('No upcoming events.', 'No upcoming events.', $group);
    
    // pll_register_string('', '', $group);

}