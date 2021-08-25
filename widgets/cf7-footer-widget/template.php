<?php

echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
echo do_shortcode(sprintf('[contact-form-7 id="%s"]', $instance['cf-form']));
echo $args['after_widget'];