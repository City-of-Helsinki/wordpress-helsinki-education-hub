<?php
add_action('acf/init', 'educationhub_acf_init_block_type_news_list');
function educationhub_acf_init_block_type_news_list() {
    if( function_exists('acf_register_block_type') ) {
        // register a sponsors list block.
        acf_register_block_type(array(
            'name'              => 'news-list',
            'title'             => __('Education Hub: News list'),
            'description'       => __('A custom news listing block.'),
            'render_template'   => 'blocks/news-list.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'news', 'uutiset', 'educationhub' ),
	        'styles'            => educationhub_lift_block_styles()
        ));
    }
}

function educationhub_news_get_latest(){
    $args = array(  
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => '6' 
    );
    $post_query = new WP_Query($args);
    return $post_query;
}