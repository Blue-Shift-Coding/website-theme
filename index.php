<?php get_header(); ?>

<div class="row blog-title" style="margin-top:2%;">
  <h1> Blueshift News</h1>

</div>

<div class="row">
 	<div class="large-8 medium-12 columns">

		<?php 
		query_posts( 'cat=-25,-19' );
		if (have_posts()) :  while (have_posts()) : the_post();  ?>


		    <div class="small-12 columns blog-tile">
		        <h2> <a href="<?php the_permalink(); ?>"> <?php the_title();?> - <?php the_time('d / m / Y'); ?></a></h1>
		        <?php if (in_category(array('student-work'))) { ?>
		        <script src="<?php echo get_template_directory_uri(); ?>/js/processing.min.js"></script>

		          <script type="application/processing">
		          	<?php the_field('code'); ?>

		          </script>

				<?php } else { ?>

		        <div class="text-center">
			        <?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail();
						} 
					?>
				</div>

				<?php } ?>
		        <div class="blog-text">
		          <p><?php the_excerpt();?></p>
		          <a href="<?php the_permalink(); ?>"><p class="blog-accent-text">Continue Reading..</p></a>
		         
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

<div class="row">
	<div class="text-center next-previous">
		<?php previous_posts_link('Previous'); ?> / <?php next_posts_link('Next'); ?>
	</div>
</div>


<?php get_footer(); ?>