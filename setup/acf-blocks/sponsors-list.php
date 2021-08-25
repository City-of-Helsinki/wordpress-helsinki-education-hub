<?php
add_action('acf/init', 'educationhub_acf_init_block_type_sponsors_list');
function educationhub_acf_init_block_type_sponsors_list() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        // register a sponsors list block.
        acf_register_block_type(array(
            'name'              => 'sponsor_list',
            'title'             => __('Education Hub: Sponsor list'),
            'description'       => __('A custom sponsor listing block.'),
            'render_template'   => 'blocks/sponsors-list.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'sponsors-list', 'sponsor-list', 'educationhub' ),
            'styles'            => educationhub_lift_block_styles()
        ));
    }
}
