<?php
/**
 * Setup custom widgets
 */

add_action('widgets_init', 'educationhub_setup_widgets', 10);

function educationhub_setup_widgets(){
    register_widget('educationhub_cf7_footer_widget');
}

/**
 * Adds hds input error style class to element
 *
 * @todo Check element type
 */
function cf7_add_custom_class($error, $name, $instance ) {
    $error=str_replace("class=\"","class=\"hds-text-input__error-text ", $error);
    return $error;
}
add_filter('wpcf7_validation_error', 'cf7_add_custom_class', 10, 3);