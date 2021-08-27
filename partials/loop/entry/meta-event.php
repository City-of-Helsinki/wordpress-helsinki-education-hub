<div class="entry__meta meta">
        <time class="has-icon has-icon--before" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
        <?php
        helsinki_svg_icon('calendar-clock'); 
        echo educationhub_get_event_date();
        ?>
    </time>
</div>