<?php /* 
* Template Name: Woocommerce

*/ 
?> 

<?php get_header(); ?>

<div class="row">
  <div class="large-12 medium-12 columns">
    <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
     <?php the_content(); ?>

    <?php endwhile; else: ?>
      <p><?php _e('No posts were found. Sorry!'); ?></p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>