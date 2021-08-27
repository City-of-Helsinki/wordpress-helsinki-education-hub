<?php
get_header();

/**
  * Hook: helsinki_content_before
  *
  */

while ( have_posts() ) {

	the_post();?>

<?php if(get_the_post_thumbnail_url(get_the_ID(),'full') != null): ?>
  <div class="single__img" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full');?>)" ></div> 
<?php endif; ?>

 <div class="hds-container lift-block">
    <div class="grid">
      <div class="grid__column l-4 grid_margin">
        <div class="article_title">
          <h1 class="grid_margin__header"><?php the_title(); ?></h1>
        </div>
        <div class="content__meta meta">
	    <?php
    		do_action('helsinki_content_article_meta');
	    ?>
        </div>

      </div>
      <div class="grid__column l-8 grid_margin no-mt">
        <span class="content-top"></span>
        <?php the_content(); ?>
      </div>
    </div>
 </div>
<?php
  

}

/**
  * Hook: helsinki_content_after
  *
  */
do_action("helsinki_content_after");

get_footer();
