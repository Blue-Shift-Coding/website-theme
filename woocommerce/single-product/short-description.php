<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

if ( ! $post->post_excerpt ) return;
?>

<p><strong style="color: #000;">Difficulty: </strong> <?php the_field('difficulty'); ?></p>
<p><strong style="color: #000;">Age Group: </strong><?php the_field('age_group'); ?></p>
<p><strong style="color: #000;">Date: </strong><?php the_field('class_date'); ?></p>
<p><strong style="color: #000;">Location: </strong><?php the_field('class_location'); ?></p>
<p><strong style="color: #000;">Times: </strong><?php the_field('class_times'); ?></p>
<p><strong style="color: #000;">Price: </strong><?php the_field('price_for_display'); ?></p>
<br>




<div itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>