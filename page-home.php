<?php 
/**
 * The template for displaying all pages
 * Template Name: Page Home
 *
 * @since 1.0
 */
get_header(); 
?>
<!-- Page.php -->
  <div class="padding-120">
    <div class="w-container">
      <div class="mx-640-centered">
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