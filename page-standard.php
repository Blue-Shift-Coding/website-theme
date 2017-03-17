<?php /* 
* Template Name: Standard Page
*/ 
?> 

<?php get_header(); ?>
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
<div class="row blog-title" style="margin-top:2%;">
  <h1> <?php the_title();?> </h1>

</div>

<div class="row">
 	<div class="large-12 medium-12 columns blog-tile standard">
		
		    
		 <?php the_content();?> 
		
	</div>
	
</div>
<?php endwhile; else: ?>
	<p><?php _e('No posts were found. Sorry!'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>