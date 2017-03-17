<?php /*
* Template Name: Education Page
*/
?>

<?php get_header(); ?>

<?php
$about_args = array( 'post_type' => 'education-page', 'posts_per_page' => 1 );

$about_loop = new WP_Query( $about_args );
while ( $about_loop->have_posts() ) : $about_loop->the_post();
    ?>

    <div class="show-for-large-up" style="margin-top: 2%">
        <div data-magellan-expedition="fixed">
            <dl class="sub-nav" class="about-fixed">
<?php
						$i = 1;
						while($i <= 3)//4)
						{
?>
                <dd data-magellan-arrival="title_<?php echo $i;?>" class="small-4 columns"><a href="#title_<?php echo $i;?>"><span><?php the_field('title_'.$i); ?></span></a></dd>
<?php
								$i++;
						}
?>
            </dl>
        </div>
    </div>

		<h3 data-magellan-destination="title_1"></h3>
    <div class="row pattern-about">
        <div class="small-12 columns about-row-1">
            <h2><?php the_field('title_1'); ?></h2>
            <?php the_field('content_1'); ?>
        </div>
    </div>




    <div class="row grid about-grid-margin">
        <h3 data-magellan-destination="title_2"></h3>
        <a name="title_2"></a>

        <h2 class="team"><?php the_field('title_2'); ?></h2>
        <div class="row" data-equalizer>
<?php
					$i = 1;
					while($i <= 3)
					{
?>
                <div class="large-4 small-12 columns push-top">
                    <div class="about-large-tile-widget border" data-equalizer-watch>
                        <div class="fade-2">
                            <div class="header row about-header" style="text-align: center;" data-equalizer>
                                <div class="small-8 columns header-title" data-equalizer-watch>
                                    <h2 class="about-title"><?php the_field('title_box_'.$i);?></h2>
                                </div>
                            </div>
                            <div class="image" style="clear: both; text-align: center;">
                                <img src="<?php the_field('image_box_'.$i);?>">
                            </div>
                            <div class="team-description">
                                <?php the_field('content_box_'.$i);?>
                                <a href="<?php the_field('link_box_'.$i);?>"><?php the_field('link_text_box_'.$i);?></a>
                            </div>
                        </div>
                    </div>
                </div>
<?php
						$i++;
					}
?>
        </div>
    </div>


    <h3 data-magellan-destination="title_3"></h3>
    <div class="row pattern-about">
        <div class="small-12 columns about-row-1">
            <h2><?php the_field('title_3'); ?></h2>
            <img src="<?php the_field('image');?>">
        </div>
    </div>


		<div class="row grid about-grid-margin" style="display: none;">
        <h3 data-magellan-destination="title_4"></h3>
        <a name="title_4"></a>

        <h2 class="team">
        	<?php the_field('title_4'); ?>
        	<?php the_field('content_4'); ?>
        </h2>

        <div class="row" data-equalizer>
					<?php if( have_rows('boxes') ): while ( have_rows('boxes') ) : the_row();?>
                <div class="large-3 small-12 columns push-top" style="margin-bottom: 20px;">
                    <div class="about-large-tile-widget border" data-equalizer-watch>
                        <div class="fade-2">
                            <div class="header row about-header" style="text-align: center;" data-equalizer>
                                <div class="small-8 columns header-title" data-equalizer-watch>
                                    <h2 class="about-title"><?php the_sub_field('title');?></h2>
                                </div>
                            </div>
                            <div class="image" style="clear: both; text-align: center;">
                                <img src="<?php the_sub_field('image');?>">
                            </div>
                            <div class="team-description">
                                <?php the_sub_field('content');?>
                            </div>
                        </div>
                    </div>
                </div>
					<?php endwhile; else : endif; ?>
        </div>
    </div>

<?php endwhile; ?>
<?php wp_reset_query(); ?>





<?php get_footer(); ?>