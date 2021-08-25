<?php 

class educationhub_cf7_footer_widget extends WP_Widget{

    function __construct() {
        parent::__construct(
            'educationhub_cf7_footer_widget', 
            __('CF7 Newsletter Widget', 'educationhub'), 
            array( 
                'description' => __( 'Lisää uutiskirjeen tilauslomake footeriin', 'educationhub' ),
                'classname' => 'cf7-footer'
            ) 
        );
    }
  
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $file = join(DIRECTORY_SEPARATOR, [__DIR__,'cf7-footer-widget', 'template.php']);
        include($file);
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'New title', 'wpb_widget_domain' );
        }
        $selected_form = esc_attr($instance['cf-form']);

        $args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
        $forms = array();
        if( $data = get_posts($args)){
            foreach($data as $key){
                $forms[] = ['id' => $key->ID, 'title' => $key->post_title, 'selected' => ($key->ID == $selected_form) ? 'selected' : '' ];
            }
        }

        $args = array(
            'forms' => $forms,
            'form' => array(
                'id' => $this->get_field_id( 'cf-form' ),
                'name' => $this->get_field_name( 'cf-form' ),
                'value' => $selected_form

            ),
            'title' => array(
                'id' => $this->get_field_id( 'title' ),
                'name' => $this->get_field_name( 'title' ),
                'value' => esc_attr($title)
            )
        );

        $file = join(DIRECTORY_SEPARATOR, [__DIR__,'cf7-footer-widget', 'form.php']);
        include($file);
    }
      
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['cf-form'] = ( ! empty( $new_instance['cf-form'] ) ) ? esc_attr( $new_instance['cf-form'] ) : 0;
        return $instance;
    }

} 