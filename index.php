<?php 
/**
 * The template for the index page
 *
 * 
 * @since 1.0
 */
get_header(); 
?>

<!-- Index.php -->
<div class="section-minvh">
<div class="padding-120">
<div class="w-container">
<h1 class="heading-4"><?php wp_title(''); ?></h1>
<?php $i = 0; ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>  
<?php
if($i == 0) {
	echo '<div class="w-row">';
}
?>

<div class="w-col w-col-6">

    <div class="blog-card">
    <?php the_title( '<h1 class="blog-card-header">', '</h1>'); ?>
    <div class="post-date-div">
    <div class="post-date"><?php the_time('F jS'); ?></div>
    </div>
    <div class="blog-card-desc">
        <?php the_excerpt(); ?>
    </div>
    <div class="read-more-button"><a href="<?php the_permalink(); ?>" class="read-button w-button">Read Article</a></div>
      </div>

</div>

<?php
$i++;
if($i == 2) {
	$i = 0;
	echo '</div>';
}
?>

<?php endwhile; ?>

<?php
if($i > 0) {
	echo '</div>';
}
?>

<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

<?php else : ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>	    
</div>    
  	     


    

    
</div>
<!--end row-->
</div>
</div>
</div>


<?php get_footer(); ?>


