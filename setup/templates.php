<?php

function educationhub_setup_templates(){
    // Remove footer element top ornament
    remove_action('helsinki_footer', 'helsinki_footer_koros');
    add_action('helsinki_footer_widgets_before', 'educationhub_widget_before');

    // Remove title from hero
    remove_action('helsinki_front_page_hero_content', 'helsinki_front_page_hero_title', 10);

    remove_action('helsinki_header_bottom', 'helsinki_header_main_menu', 20);
    add_action('helsinki_header', 'helsinki_header_main_menu', 15);

    if (is_singular('event')){
        add_action('helsinki_content_article_meta', 'educationhub_content_event_date', 20);
        remove_action('helsinki_content_article_meta', 'helsinki_content_article_categories', 10);
        remove_action('helsinki_content_article_meta', 'helsinki_content_article_author', 20);
        remove_action('helsinki_content_article_meta', 'helsinki_content_article_date', 30);
        remove_action('helsinki_content_article_meta', 'helsinki_content_article_updated', 40);

    }
    // Remove categories and tags from archive page's sidebar
    if (is_post_type_archive('event')){
        remove_action('helsinki_loop_sidebar', 'helsinki_loop_sidebar_categories', 10);
        remove_action('helsinki_loop_sidebar', 'helsinki_loop_sidebar_tags', 20);
    }
}

function educationhub_widget_before(){
    get_template_part('partials/footer/widget-before');
}

function educationhub_footer_address(){
    $address = helsinki_theme_mod( 'helsinki_footer_helsinki_address', 'helsinki_address_textarea' );
    echo wpautop($address);
}

function educationhub_content_event_date(){
    get_template_part('partials/content/event-date');
}