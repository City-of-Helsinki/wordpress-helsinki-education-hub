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
$event_query = educationhub_events_get_latest();
if (!$event_query->have_posts())
    return false;
?>

<section  id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hds-container">
        <div class="grid">
            <div class="grid__column l-4 m-12 grid_margin no-mb-up-l">
                <h2 class="grid_margin__header"><?php pll_e("Events", "educationhub") ?></h2>
            </div>
            <div class="grid__column l-8 m-12 grid_margin">
                <h3 class="grid_margin__header"><?php pll_e("Upcoming events", "educationhub") ?></h3>
                <div class="grid s-up-2 l-up-3">
                <?php
                    
                    while ( $event_query->have_posts() ) {
                        $event_query->the_post(); 
        
                        ?>
                            <article class="grid__column entry entry--grid event" aria-labelledby="entry-event-<?php get_the_ID() ?>">
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                    <div id="entry-event-<?php get_the_ID() ?>" class="entry__title entry__title--grid"><?php echo esc_html( get_the_title() ); ?></div>
                                    <span class="entry__excerpt--grid excerpt size-m">
                                    <?php get_template_part("partials/content/event-date") ?>
                                    </span>
                                </a>
                            </article>
                    <?php 
                    }
                ?>

                </div>

                <a class="button hds-button transparent" href="<?php echo get_post_type_archive_link('event') ?>"><?php pll_e('All Events', 'educationhub') ?></a>
            </div>
        </div>
    </div>
</section>