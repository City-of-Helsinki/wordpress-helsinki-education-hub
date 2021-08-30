<?php

/**
 * News List Block Template.
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

$newsTitle = esc_html( get_field("news_title") );
if (empty($newsTitle)){
    $newsTitle = __('Recent Posts', 'helsinki-universal');
}
?>

<section  id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hds-container">
        <div class="grid">
            <div class="grid__column l-4 m-12 grid_margin no-mb-up-l">
                <h2 class="grid_margin__header"><?php echo $newsTitle ?></h2>
            </div>
            <div class="grid__column l-8 m-12 grid_margin">
                <div class="grid s-up-2 l-up-3">
                <?php
                    $event_query = helsinki_front_page_recent_posts_query(array(
                        'cat' => helsinki_theme_mod('helsinki_front_page_recent-posts', 'category', 0),
                        'posts_per_page' => helsinki_theme_mod('helsinki_front_page_recent-posts', 'posts_per_page', 3),
                    ));

                    while ( $event_query->have_posts() ) {
                        $event_query->the_post(); 
        
                        ?>
                            <article class="grid__column entry entry--grid">
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                   <h3 class="entry__title entry__title--grid"><?php echo esc_html( get_the_title() ); ?> </h3> 
                                    <p class="entry__date entry--grid"><?php echo esc_html( get_the_date(get_option('date_format')) ); ?></p>
                                    <p class="entry__excerpt--grid excerpt size-m">
                                        <?php helsinki_content_excerpt(); ?>
                                    </p>
                                </a>
                                <div>
                            </article>
                    <?php 
                    }
                ?>

                </div>
                <a class="button hds-button transparent" href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
                    <?php
                        esc_html_e('All posts', 'helsinki-universal');
                    ?>
                </a>
            </div>
        </div>
    </div>
</section>