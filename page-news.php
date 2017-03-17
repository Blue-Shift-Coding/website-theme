<?php 
/* 
* Template Name: News Page
*/ 
?> 
<?php get_header(); ?> 



<div class="row blog-title" style="margin-top:2%;">
  <h1> Blueshift News</h1>
</div>

<div class="row">
  <div class="large-8 medium-12 columns">
    <div class="small-12 columns blog-tile">
      <h2> <a href="<?php the_permalink(); ?>"> <?php the_title();?> - 26/09/2014</a></h1>

      <img src="images/1.png">
      <div class="blog-text">
        <p>We have been teaching girlss and boys for a period of time now and have noticed some fundamental differences in learning style</p>
        <p class="blog-accent-text">Continue Reading..</p>
        <p class="blog-accent-text">Filed under Social</p>
      </div>
    </div>
    <a href="" class="older"> Older Posts</a>
  </div>

  <div class="large-4 medium-12 columns">
    <div id="sticky-anchor"></div>
    <div class="small-12 columns community-widget-1 blog-stuck">
      <li><a href="">Latest News</a></li>
      <li><a href="">Events</a></li>
      <li><a href="">New Classes</a></li>
      <li><a href="">Social Media</a></li>
      <li><a href="">Resources</a></li>
    </div>
  </div>
</div>



<?php get_footer(); ?> 