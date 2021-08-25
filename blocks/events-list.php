<?php

/**
 * Testimonial Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'events-list-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lift-block events-list';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>

<section  id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hds-container">
        <div class="grid">
            <div class="grid__column l-4 s-6 xs-12">
                <h2><?php echo __("Events", "educationhub") ?></h2>
            </div>
            <div class="grid__column l-8 s-6 xs-12">
            <h3><?php echo __("Upcoming events", "educationhub") ?></h3>
                <div class="grid s-up-2 l-up-3">
                <?php
                    $event_query = educationhub_events_get_latest();
                    while ( $event_query->have_posts() ) {
                        $event_query->the_post(); 
        
                        ?>
                            <article class="grid__column ">
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                    <?php echo esc_html( get_the_title() ); ?>
                                </a>
                                <?php get_template_part("partials/content/event-date") ?>

                            </article>
                    <?php 
                    }
                ?>

                </div>

                <a class="button hds-button" href="<?php echo get_post_type_archive_link('event') ?>"><?php echo __('All Events', 'educationhub') ?></a>
            </div>
        </div>
    </div>
</section>