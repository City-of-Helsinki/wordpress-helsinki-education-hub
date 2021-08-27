<?php

/**
 * Content fold Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'content-fold-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'lift-block content-fold';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$content_fold_link = get_field('content_fold_link');
?>

<section  id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hds-container">
        <div class="grid">
            <div class="grid__column l-4 s-6 xs-12 grid_margin">
                <h2 class="grid_margin__header"><?php echo get_field('content_fold_title'); ?></h2>
            </div>
            <div class="grid__column l-8 s-6 xs-12 grid_margin">
                <p><?php echo get_field('content_fold_body'); ?></p>
                <?php if (!empty($content_fold_link)): ?>
                <button class="hds-button button " href="<?php echo $content_fold_link ?>">
                    <?php echo get_field('content_fold_button'); ?>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>