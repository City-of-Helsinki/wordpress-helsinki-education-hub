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
// Load values and assign defaults.
$heading = get_field('sponsors_title');
$args = array(  
    'post_type' => 'sponsor',
    'post_status' => 'publish',
    'posts_per_page' => '20', 
  );
$post_query = new WP_Query($args);

?>


<section  id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hds-container">
      <div class="grid">
          <div class="grid__column l-4 s-6 xs-12 grid_margin">
              <h2><?php echo $heading; ?></h2>
          </div>
      </div>
      

        <div class="grid">
          <?php
            if($post_query->have_posts() ) {
                while($post_query->have_posts() ) {
                    $post_query->the_post();?>
                    <div class = "grid__column l-3 m-6 s-6 xs-12">
                    <?php if(get_field('link',get_the_ID()) != null): ?>
                      <a style="display: block;" href=<?php echo get_field('link',get_the_ID());?>> <?php echo wp_get_attachment_image(get_field('logo',get_the_ID()),'full')?></a>
                    <?php else: ?>
                       <?php echo wp_get_attachment_image(get_field('logo',get_the_ID()),'full')?>
                    <?php endif; ?>
                    </div>
                <?php
                }
            };
          ?>
  </div>
</section>
<?php
wp_reset_postdata();