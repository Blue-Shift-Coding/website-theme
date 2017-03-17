<?php get_header(); ?>



<div class="row blog-title" style="margin-top:2%;">
  <h1> Resources</h1>
</div>

<div class="row">
 	<div class="large-8 medium-12 small-12 columns">
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		    <div class="small-12 medium-6 large-4 columns">
		      <div class="blog-tile-category">
<!-- 		          <div class="small-6 columns text-center">
		            <a href="<?php the_permalink()?>"><h2 style="font-size: 0.8em;"><?php the_title()?></h2></a>
		          </div>
		          <div class="small-6 columns text-center" style="border-left: 2px solid #5086ac;">
		            <a href="<?php the_permalink()?>"><span style=" height: 100%;
  vertical-align: middle;
  display: inline-block;"></span><h2 style="font-size: 0.8em; vertical-align: middle; display: inline-block;"><?php the_title()?></h2></a>
		          </div> -->
		          <div class="small-8 columns text-center" style="border-bottom: 2px solid #5086ac;">
					<h3><?php the_field('resource_right_corner'); ?></h3>
				</div>
				<div class="small-4 columns text-center" style="border-left: 2px solid #5086ac; border-bottom: 2px solid #5086ac;" >
					<h3><?php the_field('resource_left_corner'); ?></h3>
				</div>
				<div class="small-12 columns text-center">
					<h2 style="font-size: 1em;"><?php the_title(); ?></h2>
				</div>
		            <?php
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail();
						}
					?>

		          <p style="padding: 2%; font-size: 0.8em;"><?php the_field('resource_text'); ?></p>
		  		<div class="text-center" style="margin-top: 10%;">
		  			 <a href="<?php the_permalink()?>" class="button"> Read more </a>
		  		</div>
		      </div>
		    </div>
		<?php endwhile; else: ?>
			<p><?php _e('No posts were found. Sorry!'); ?></p>
		<?php endif; ?>
	</div>

	<div class="large-4 medium-12 columns">
	    <div id="sticky-anchor"></div>
	    <div class="small-12 columns community-widget-1 blog-stuck">
	      <?php get_sidebar(); ?>
	    </div>
	</div>

</div>
<div class="row">
	<div class="text-center next-previous" style="margin-top: 5%;">
		<?php previous_posts_link('Previous'); ?> / <?php next_posts_link('Next'); ?>
	</div>
</div>
<!--
<script>
	$(document).ready(function(){$('#resourceModal').foundation('reveal', 'open')});
</script>
 -->

<?php get_footer(); ?>