<?php
add_action('acf/init', 'educationhub_acf_init_block_type_content_fold');
function educationhub_acf_init_block_type_content_fold() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        // register a content fold block.
        acf_register_block_type(array(
            'name'              => 'content_fold',
            'title'             => __('Education Hub: Content fold'),
            'description'       => __('A custom content fold block.'),
            'render_template'   => 'blocks/content-fold.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'content-fold', 'content', 'educationhub' ),
	        'styles'            => educationhub_lift_block_styles()
        ));
    }
}
