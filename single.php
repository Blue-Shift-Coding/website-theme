<?php get_header(); ?>


<div class="row blog-title" style="margin-top:2%;">
  <h1> <?php echo get_the_title(); ?></h1>
</div>

<div class="row">
 	<div class="large-8 medium-12 columns">
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

		<?php if (in_category(array('resources'))) { ?>
		    <div class="small-12 columns blog-tile">
		      

		        <div class="blog-text" style="padding: 0% 2%;">
		          
		        <?php if(get_field('code')) { ?> 
				
		          <script src="<?php echo get_template_directory_uri(); ?>/js/processing.min.js"></script>

		          <script type="application/processing">
		          	<?php the_field('code'); ?>

		          </script>

		          <canvas width="<?php the_field('dimension_1'); ?>" height="<?php the_field('dimension_2'); ?>"></canvas>

		         
 					
		          
		         
		          <?php } ?>
		          <p><?php the_content();?></p>
		          <?php the_tags('<p class="blog-accent-text">Filed Under: ',', ','</p>');?> 
		        </div>
		    </div> 
		
	</div>

	<div class="large-4 medium-12 columns">
	    <div id="sticky-anchor"></div>
	    <div class="small-12 columns community-widget-1 blog-stuck">
	      <?php get_sidebar(); ?>
	    </div>
	</div>
	
</div>


		<?php } else { ?>
		    <div class="small-12 columns blog-tile">
		        <h2> <a href="<?php the_permalink(); ?>"> <?php the_title();?> - <?php the_time('d / m / Y'); ?></a></h1>
		        <div class="text-center">
			        <?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail();
						} 
					?>
				</div>
		        <div class="blog-text">
		          
		        <?php if(get_field('code')) { ?> 
				
		          <script src="<?php echo get_template_directory_uri(); ?>/js/processing.min.js"></script>

		          <script type="application/processing">
		          	<?php the_field('code'); ?>

		          </script>

		          <canvas width="<?php the_field('dimension_1'); ?>" height="<?php the_field('dimension_2'); ?>"></canvas>

		          <?php } ?>

		          <p><?php the_content();?></p>
		         
		         
		          <?php the_tags('<p class="blog-accent-text">Filed Under: ',', ','</p>');?> 
		        </div>
		    </div>
		
	</div>

	<div class="large-4 medium-12 columns">
	    <div id="sticky-anchor"></div>
	    <div class="small-12 columns community-widget-1 blog-stuck">
	      <?php get_sidebar(); ?>
	    </div>
	</div>
	
</div>



		<?php } ?>
		   
<?php endwhile; else: ?>
			<p><?php _e('No posts were found. Sorry!'); ?></p>
		<?php endif; ?>
<?php get_footer(); ?>