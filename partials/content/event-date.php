<?php
$icon_class=false;
if (is_singular('event')){
    $icon_class= 'has-icon has-icon--before';
}
?>

<div class="content__date date">
    <span class="screen-reader-text"><?php esc_html_e('Event starts', 'educationhub'); ?>:</span>
    <time class="<?php echo $icon_class ?>" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
        <?php if (!empty($icon_class)) :
            helsinki_svg_icon('calendar-clock'); 
        endif; 
        echo educationhub_get_event_date();
        ?>
    </time>
</div>