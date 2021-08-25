<?php

/**
 * Testimonial Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'news-list-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lift-block news-list';
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
            <div class="grid__column l-4 grid_margin">
                <h2><?php echo __("News", "educationhub") ?></h2>
            </div>
            <div class="grid__column l-8 grid_margin">
                <div class="grid s-up-2 l-up-3">
                <?php
                    $event_query = educationhub_news_get_latest();
                    while ( $event_query->have_posts() ) {
                        $event_query->the_post(); 
        
                        ?>
                            <article class="grid__column">
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                   <strong><?php echo esc_html( get_the_title() ); ?> </strong> 
                                </a>
                                <?php echo esc_html( the_excerpt() ); ?>
                                <div>
                            </article>
                    <?php 
                    }
                ?>

                </div>

                <a href="<?php echo get_post_type_archive_link('post') ?>" class="button hds-button"><?php echo __('All news', 'educationhub') ?></a>
            </div>
        </div>
    </div>
</section>