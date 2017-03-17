<?php get_header(); ?>



<div class="row blog-title" style="margin-top:2%;">
  <h1> Student Work</h1>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/processing.min.js"></script>



<div class="row">
 	<div class="large-8 medium-12 columns">
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		    <div class="small-12 columns blog-tile">
		        <h2>  <?php the_title();?> - <?php the_time('d / m / Y'); ?></h1>
		        	<p> <?php the_field('age_group'); ?></p>

		        <div class="blog-text">
		          <p><?php the_content();?></p>
		          <!-- <p><?php the_category();?></p> -->
		          <!-- <a href="<?php the_permalink(); ?>"><p class="blog-accent-text">Continue Reading..</p></a> -->
		         
		          <?php the_tags('<p class="blog-accent-text">Filed Under: ',', ','</p>');?> 
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