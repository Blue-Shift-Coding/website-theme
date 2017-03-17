<?php /*
* Template Name: Front Page
*/
?>

<?php get_header(); ?>


<?php
  $home_args = array( 'post_type' => 'home-page', 'posts_per_page' => 1 );
  $home_loop = new WP_Query( $home_args );
  while ( $home_loop->have_posts() ) : $home_loop->the_post();
?>

  <div class="stuck-social-nav menu show-for-medium-up">
      <li> <a href="" data-reveal-id="contactModal"><img src="<?php print IMAGES; ?>/mail-icon.png"></a> </li>
      <li> <a href="https://twitter.com/blueSHIFTcoding" target="_blank"><img src="<?php print IMAGES; ?>/twitter-icon.png"></a> </li>
      <li> <a href="https://www.facebook.com/blueshiftcoding" target="_blank"><img src="<?php print IMAGES; ?>/facebook-icon.png"></a> </li>
  </div>

  <div class="row ">
    <div class="small-12 columns">
      <div class="border landing">
        <h1> blue{shift} believe in a <span style="font-weight: bold;">creative</span> coding education; one that will equip children with a critical approach to problem solving and teach them the technical skills they need to excel in the future.</h1>
        <div class="row padded-mail">
        <!-- Begin MailChimp Signup Form -->
          <div id="mc_embed_signup">
            <form action="//blueshiftcoding.us7.list-manage.com/subscribe/post?u=e6b6b8918e95a5173590ef583&amp;id=c567b7a12a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
              <!-- <h2>Subscribe to our mailing list</h2> -->
              <div class="mc-field-group">
                <!-- <label for="mce-EMAIL">Email Address </label> -->
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Sign Up to Our Mailing List" style="float: left;">
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="display:none;">
              </div>
              <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
              </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;"><input id="input" type="text" name="b_e6b6b8918e95a5173590ef583_c567b7a12a" tabindex="-1" value=""></div>
                <div class="clear"></div>
              </div>
            </form>
          </div>
              <!--End mc_embed_signup-->
        </div>
        <div class="row" style="margin: 5% auto 0; width: 5%;"><a id="button" href="#about"><img src="<?php print IMAGES; ?>/arrow-down.png" class="downarrow"></a></div>
      </div>
    </div>
  </div>

  <!-- ROW START -->

  <div id="about" class="row grid" data-equalizer><!-- ROW START -->

    <!-- ABOUT WIDGET START -->
    <!-- ABOUT MOBILE START -->
    <div class="small-12 medium-12 columns show-for-small-up hide-for-large-up">
      <div class="border widget">
        <div class="post-title-widget">
          <h2>About Us</h2>
        </div>
        <div class="short-description story">
          <h2><?php the_field('about_text'); ?></h2>

          <h2 class="read-more"><a href="http://blueshiftcoding.com/about/">Read more...</a></h2>
        </div>
      </div>
    </div>
    <!-- ABOUT MOBILE END -->
    <!-- ABOUT DESKTOP-->



    <div class="large-3 medium-6 small-12 columns show-for-large-up">
      <div class="border widget" data-equalizer-watch>
        <div class="post-title-widget">
          <h2>About Us</h2>
        </div>
        <div class="short-description story">

          <h2><?php the_field('about_text'); ?></h2>

          <h2 class="read-more"><a href="http://blueshiftcoding.com/about/">Read more...</a></h2>
        </div>
      </div>
    </div>

    <!-- ABOUT MOBILE-->

     <!-- ABOUT WIDGET FINISH -->

     <!-- CODE WIDGET START -->
     <!-- CODE WIDGET DESKTOP -->

    <div class="large-3 medium-6 small-12 columns show-for-large-up" data-equalizer-watch>
      <a href="<?php the_field('student_link'); ?>" class="fade-container small-tile-widget">
        <div class="border fade-2">
           <div class="header row" style="text-align: center;" data-equalizer>
            <div class="small-6 columns header" data-equalizer-watch>
              <h5><?php the_field('title_of_student_work'); ?></h5>
            </div>
            <div class="small-6 columns type" data-equalizer-watch>
              <span></span><h5>Student Work</h5>
            </div>
          </div>
          <div class="image" style="clear: both; text-align: center;">
            <?php if( get_field('student_work_image') ): ?>

              <img src="<?php the_field('student_work_image'); ?>" />

            <?php endif; ?>


          </div>
        </div>
        <div class="caption-overlay caption-2">

          <div class="header-fade row" style data-equalizer>
            <div class="small-6 columns header-title" data-equalizer-watch>
              <h5><?php the_field('title_of_student_work'); ?></h5>
            </div>
            <div class="small-6 columns type" data-equalizer-watch>
              <span></span><h5>Student Work</h5>
            </div>
          </div>
          <div class="short-description">
            <p><?php the_field('title'); ?></p>
            <p>by <?php the_field('student_name'); ?>, aged <?php the_field('student_age'); ?></p>
            <p><?php the_field('student_short_description'); ?></p>
            <br>
            <p class="read-more">See more student work...</p>
          </div>
        </div>
      </a>
      <!-- CODE WIDGET DESKTOP FINISH -->
      <!-- CODE WIDGET FINISH -->

      <!-- QUOTE WIDGET FINISH -->

      <div class="border widget quote-widget">
        <div class="short-description">
          <h2 class="quote"><?php the_field('quote_text'); ?></h2>
       <!--    <br> -->
          <h2 class="quote read-more"><?php the_field('quote_author'); ?></h2>
        </div>
      </div>
      <!-- QUOTE WIDGET FINISH -->
  </div><!-- ROW FINISH -->

  <!-- 6 GRID HOVER OVER START -->


  <div class="large-6 medium-12 columns push-top" data-equalizer-watch>
    <a href="<?php the_field('featured_story_link'); ?>" class="fade-container large-tile-widget">
      <div class="border fade-2">
         <div class="header row" style="text-align: center;" data-equalizer>
          <div class="small-8 columns header-title" data-equalizer-watch>
            <h2><?php the_field('featured_story_title'); ?></h2>
          </div>
          <div class="small-4 columns type" data-equalizer-watch>
            <span></span><h2><?php the_field('featured_story_category'); ?></h2>
          </div>
        </div>
        <div class="image" style="clear: both; text-align: center;">
          <?php if( get_field('featured_story_image') ): ?>

              <img src="<?php the_field('featured_story_image'); ?>" />

            <?php endif; ?>
        </div>
      </div>
      <div class="caption-overlay caption-2 show-for-large-up">

        <div class="header-fade row" style data-equalizer>
          <div class="small-8 columns header-title" data-equalizer-watch>
            <h2><?php the_field('featured_story_title'); ?></h2>
          </div>
          <div class="small-4 columns type" data-equalizer-watch>
            <span></span><h2><?php the_field('featured_story_category'); ?></h2>
          </div>
        </div>
        <div class="short-description">
          <span></span><p><?php the_field('featured_story_description'); ?></p>

          <br>
          <p class="read-more">Read More</p>
        </div>
      </div>

      <div class="caption-overlay-2 show-for-small-up hide-for-large-up">

        <div class="short-description">
          <span></span><p><?php the_field('featured_story_description'); ?></p>

          <br>
          <p class="read-more">Read More</p>
        </div>
      </div>
    </a>
    <?php if( get_field('corner_tag') ): ?>
    <div class="corner-tag">
      <img src="<?php print IMAGES; ?>/character-animation-small.gif">
      <div class="text-tag"><?php the_field('corner_tag'); ?></div>
    </div>
    <?php endif; ?>
  </div>

</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
<!--  END Custom POST-->

<!-- 6 GRID  HOVER OVER FINISH -->
<div class="row grid" style=" margin-top: 1.5%;" data-equalizer>
<!-- 4 GRID HOVER OVER START -->

  <?php
    $small_args = array(
      'post_type' => array( 'post' ),
      'posts_per_page' => 4,
      'orderby' => 'post_date',
      // 'cat'      => 40,
      );
    $loop2 = new WP_Query( $small_args );
    if ( $loop2->have_posts() ) {
      while ( $loop2->have_posts() ) : $loop2->the_post() ;?>

      <?php if( get_field('add_to_homepage') )
{ ?>
      <div class="large-3 medium-6 columns show-for-large-up" data-equalizer-watch>
        <a href="<?php the_permalink(); ?>" class="fade-container small-tile-widget">
          <div class="border fade-2">
             <div class="header row" style="text-align: center;" data-equalizer>
              <div class="small-8 columns header" data-equalizer-watch>
                <h5><?php the_field('title_small'); ?><br><?php the_field('small_title_line_2'); ?></h5>
              </div>
              <div class="small-4 columns type" data-equalizer-watch>
                <span></span><h5><?php the_field('small_page_tile_category'); ?></h5>
              </div>
            </div>
            <div class="image" style="clear: both; text-align: center;">
                  <img src="<?php the_field('small_home_page_tile_image'); ?>" />
            </div>
          </div>
          <div class="caption-overlay caption-2">
            <div class="header-fade row" style data-equalizer>
              <div class="small-8 columns header-title" data-equalizer-watch>
                <h5><?php the_field('title_small'); ?><br><?php the_field('small_title_line_2'); ?></h5>
              </div>
              <div class="small-4 columns type" data-equalizer-watch>
                <span></span><h5><?php the_field('small_page_tile_category'); ?></h5>
              </div>
            </div>
            <div class="short-description">
              <p><?php the_field('small_page_tile_description'); ?></p>
              <br>
              <p class="read-more">Join Us</p>
            </div>
          </div>
        </a>
      </div>
   <?php } ?>
  <?php
      endwhile;
    } else {
      echo __( '' );
    }
    wp_reset_postdata();
  ?>

</div>
  <!-- 4 GRID  HOVER OVER FINISH -->
<!-- 6 GRID  HOVER OVER FINISH -->
<div class="row grid" style=" margin-top: 1.5%;" data-equalizer>
<!-- 4 GRID HOVER OVER START -->

  <?php
    $taxonomy = 'product_cat';
    $small_args = array(
      'post_type' => array( 'product',  ),
      'posts_per_page' => 4,
      'taxonomy' => $taxonomy,
      'orderby' => 'post_date',
      );
    $loop = new WP_Query( $small_args );
    if ( $loop->have_posts() ) {
      while ( $loop->have_posts() ) : $loop->the_post() ;?>
      <div class="large-3 medium-6 columns show-for-large-up" data-equalizer-watch>
        <a href="<?php the_permalink(); ?>" class="fade-container small-tile-widget">
          <div class="border fade-2">
             <div class="header row" style="text-align: center;" data-equalizer>
              <div class="small-8 columns header" data-equalizer-watch>
                <h5><?php the_field('title_small'); ?><br><?php the_field('small_title_line_2'); ?></h5>
              </div>
              <div class="small-4 columns type" data-equalizer-watch>
                <span></span><h5><?php the_field('small_page_tile_category'); ?></h5>
              </div>
            </div>
            <div class="image" style="clear: both; text-align: center;">
                  <img src="<?php the_field('small_home_page_tile_image'); ?>" />
            </div>
          </div>
          <div class="caption-overlay caption-2">
            <div class="header-fade row" style data-equalizer>
              <div class="small-8 columns header-title" data-equalizer-watch>
                <h5><?php the_field('title_small'); ?><br><?php the_field('small_title_line_2'); ?></h5>
              </div>
              <div class="small-4 columns type" data-equalizer-watch>
                <span></span><h5><?php the_field('small_page_tile_category'); ?></h5>
              </div>
            </div>
            <div class="short-description">
              <p><?php the_field('small_page_tile_description'); ?></p>
              <br>
              <p class="read-more">Join Us</p>
            </div>
          </div>
        </a>
      </div>
  <?php
      endwhile;
    } else {
      echo __( '' );
    }
    wp_reset_postdata();
  ?>

</div>
  </div><!-- ROW FINISH -->

</div> <!-- row eq -->

<?php get_footer(); ?>