<?php 
/**
 * The template for displaying all blog posts
 *
 *
 * @package Platformer
 * @since 1.0
 */
get_header(); 
?>

<!--SINGLE.PHP-->
<div class="padding-120">
<div class="w-container">
<div class="mx-640">
<h1 class="df-h1"><?php wp_title(''); ?></h1>
<div class="post-date-div">
  <div class="post-date"><?php the_time('F jS'); ?> </div>
</div>
<div class="post-categories">
    <?php the_category(' ', 'multiple')?>
    <!--<a href="#" class="jer_cat">Software</a>-->
</div>

<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			//
			the_content();
			//
		} // end while
	} // end if
?>
</div>
</div>
</div>

<?php get_footer(); ?>