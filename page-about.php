<?php /*
* Template Name: About Page
*/
?>

<?php get_header(); ?>

<?php
  $about_args = array( 'post_type' => 'about-page', 'posts_per_page' => 1 );
  $about_loop = new WP_Query( $about_args );
  while ( $about_loop->have_posts() ) : $about_loop->the_post();
?>

  <div class="show-for-large-up" style="margin-top: 2%">
    <div data-magellan-expedition="fixed">
      <dl class="sub-nav" class="about-fixed">
        <dd data-magellan-arrival="mission" class="small-4 columns"><a href="#mission"><span>Services</span></a></dd>
        <dd data-magellan-arrival="team" class="small-4 columns"><a href="#team"><span>Our Team</span></a></dd>
        <dd data-magellan-arrival="testamonials" class="small-4 columns"><a href="#testamonials"><span>What People are Saying</span></a></dd>
      </dl>
    </div>
  </div>

  <div class="row" style="padding-top: 0%;">

    <div class="small-12 columns ">
      <div class="border landing landing-about">
        <h1 class="about"><?php the_field('introductory_text'); ?></h1>
      </div>
    </div>
  </div>

  <h3 data-magellan-destination="mission"></h3>
  <a name="mission"></a>

  <div class="row pattern-about">
    <div class="small-12 columns about-row-1">
        <h2>Services</h2>
        <?php the_field('our_partners'); ?>
        <p>As Featured in:</p>
        <?php the_field('our_partners_featured'); ?>

    </div>
  </div>


  <!-- HOVER OVER START -->
  <div class="row grid about-grid-margin">
    <h3 data-magellan-destination="team"></h3>
    <a name="team"></a>

    <h2 class="team">Our Team</h2>
    <div class="row" data-equalizer>
    <?php if( have_rows('team_main') ): while ( have_rows('team_main') ) : the_row();?>

      <div class="large-3 small-12 columns push-top">
        <div class="about-large-tile-widget border" data-equalizer-watch>
          <div class="fade-2">
             <div class="header row about-header" style="text-align: center;" data-equalizer>
              <div class="small-8 columns header-title" data-equalizer-watch>
                <h2 class="about-title"><?php the_sub_field('name');?></h2>
              </div>
              <div class="small-4 columns type" data-equalizer-watch>
                <span></span><h2 class="about-role"><?php the_sub_field('role');?></h2>
              </div>
            </div>
            <div class="image" style="clear: both; text-align: center;">
              <img src="<?php the_sub_field('image');?>">
            </div>
            <div class="team-description">
              <p><?php the_sub_field('description');?></p>
              <a href="mailto:<?php the_sub_field('email_address');?>"><img src="<?php print IMAGES; ?>/mail-icon-white.png"></a>
            </div>
          </div>
        </div>
      </div>

    <?php endwhile; else : endif; ?>
    </div>
    <?php if( have_rows('teachers') ): while ( have_rows('teachers') ) : the_row();?>
    <div class="large-2 medium-4 small-6 columns five-per-top-margin" data-equalizer-watch>
        <div class="border">
          <div class="post-title">
            <h3><?php the_sub_field('name');?></h2>
          </div>
          <div class="post-type">
            <h3><?php the_sub_field('role');?></h3>
          </div>
          <div class="image" style="clear: both; text-align: center;">
            <img src="<?php the_sub_field('image');?>">
          </div>
        </div>
    </div>
    <?php endwhile; else : endif; ?>
  </div>
<!-- HOVER OVER FINISH -->

  <h3 data-magellan-destination="testamonials"></h3>
  <a name="testamonials"></a>
  <div class="row pattern-about">
    <div class="small-12 columns about-row-1">
        <h2>What People are Saying</h2>
        <?php if( have_rows('testamonial') ):
              while ( have_rows('testamonial') ) : the_row();?>
                <p class="quote"><?php the_sub_field('testamonial_text');?></p>
          <?php endwhile;
          else :
              // no rows found
          endif;
        ?>
    </div>
  </div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>





<?php get_footer(); ?>