<?php
get_header();

/**
  * Hook: helsinki_content_before
  *
  */
do_action("helsinki_content_before");

while ( have_posts() ) {

	the_post();?>

<?php if(get_the_post_thumbnail_url(get_the_ID(),'full') != null): ?>
  <div class="single__img" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full');?>)" ></div> 
<?php endif; ?>


 <div class="hds-container lift-block article_title">
    <div class="grid">
      <div class="grid__column l-4">
        <h1><?php the_title(); ?></h1>
        <div class="content__meta meta">
	    <?php
    		do_action('helsinki_content_article_meta');
	    ?>
        </div>

      </div>
      <div class="grid__column l-8 article_margin">
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
