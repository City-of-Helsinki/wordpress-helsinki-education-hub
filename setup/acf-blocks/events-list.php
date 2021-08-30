<?php
add_action('acf/init', 'educationhub_acf_init_block_type_events_list');
function educationhub_acf_init_block_type_events_list() {
    if( function_exists('acf_register_block_type') ) {
        // register a sponsors list block.
        acf_register_block_type(array(
            'name'              => 'event_list',
            'title'             => __('Education Hub: Event list'),
            'description'       => __('A custom events listing block.'),
            'render_template'   => 'blocks/events-list.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'event', 'tapahtuma', 'educationhub' ),
	        'styles'            => educationhub_lift_block_styles()
        ));
    }
}

function educationhub_events_get_latest_meta_query_params(){
    $date_start = date('Ymd');
    $meta = array(
        'relation' => 'OR',
        array(
            'relation' => 'AND',
            array(
                'key'       => 'event_starts_date',
                'compare'   => '>=',
                'value'     => $date_start,
                'type'      => 'DATE'
            ),
            array(
                'key'       => 'event_ends_date',
                'compare'   => '=',
                'value'     => ''
            ),
        ),
        array(
            array(
                'key'       => 'event_ends_date',
                'compare'   => '>=',
                'value'     => $date_start,
                'type'      => 'DATE'
            ),
        )
    );
    return $meta;
}
function educationhub_events_get_latest(){
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 6,
        'orderby'  => 'meta_value_num',
        'meta_key' => 'event_starts_date',
        'meta_type' => 'NUMERIC',
        'order' => 'ASC',
        'meta_query' => educationhub_events_get_latest_meta_query_params()

    );
    
    $post_query = new WP_Query($args);
    return $post_query;
}

function educationhub_combine_date_time($date, $time){


    $dt_date = new DateTime($date);
    $dt_time = new DateTime($time);

    $dt_date->setTime($dt_time->format('H'), $dt_time->format('i'));

    return $dt_date;
}
/**
 * Return formatted event date
 */
function educationhub_get_event_date() {

    global $post;

    $post_id = $post->ID;
    $event_start_date = get_post_meta($post_id, 'event_starts_date', true);
    $event_start_time = get_post_meta($post_id, 'event_starts_time', true);

    $event_dt_start = educationhub_combine_date_time($event_start_date, $event_start_time);

    
    $event_end_date = get_post_meta($post_id, 'event_ends_date', true);
    $event_end_time = get_post_meta($post_id, 'event_ends_time', true);
    $event_dt_end = educationhub_combine_date_time($event_end_date, $event_end_time);
    
    $ret = '';

    //multi-day event
    if( $event_start_date && $event_end_date && $event_dt_end > $event_dt_start ) {
        $format = 'd.m.';

        if ($event_dt_start->format("Y") < $event_dt_end->format("Y") ){
            $format = 'd.m.Y';
        }

        if(!empty($event_start_time)){
            $format = $format . ' H:i';
        }

        $ret .= $event_dt_start->format($format);

        $ret .= ' - ';

        $format = 'd.m.Y';
        if($event_end_time){
            $format = 'd.m.Y H:i';
        }

        $ret .= $event_dt_end->format($format);

    
    //Single day event
    } elseif ($event_start_date) {

        if (!empty($event_start_time)){
            $format = "d.m.Y H:i";
        } else{
            $format = 'd.m.Y';
        }
        $ret .= $event_dt_start->format($format);

        if (!empty($event_end_time)){
            $ret .= sprintf(" - %s", $event_dt_end->format('H:i'));
        }

    }

    return $ret;
}