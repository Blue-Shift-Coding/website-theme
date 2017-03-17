<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>

<div class="small-12 medium-6 large-4 columns">
	<div class="blog-tile-category">
		<div <?php post_class( $classes ); ?>>

			<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

			<!-- <a href="<?php the_permalink(); ?>"> -->
				
				<div class="small-6 columns text-center" style="border-bottom: 2px solid #5086ac;">
					<h3><?php the_field('top_left_box'); ?></h3>
				</div>
				<div class="small-6 columns text-center" style="border-left: 2px solid #5086ac; border-bottom: 2px solid #5086ac;" >
					<h3><?php the_field('age_group'); ?></h3>
				</div>
				<div class="small-12 columns text-center">
					<h2 style="font-size: 1.4em;"><?php the_title(); ?></h2>
				</div>
				
				<?php
					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
										
					
				?>
				<p style="padding: 2% 2% 0%; font-size: 0.7em; "><strong style="color: #000;">Dates:</strong> <br><?php the_field('class_date'); ?></p>
				<p style="padding: 2% 2% 0%; font-size: 0.7em; "><strong style="color: #000;">Location: </strong><br><?php the_field('class_location'); ?></p>
				<p style="padding: 2% 2% 0%; font-size: 0.7em; "><strong style="color: #000;">Times: </strong><br><?php the_field('class_times'); ?></p>
				<p style="padding: 2% 2% 0%; font-size: 0.7em; "><strong style="color: #000;">Information: </strong><br><?php the_field('description'); ?></p>

	 </li>

				<?php
					/**
					 * woocommerce_after_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
					
				

					
				?>

		<!-- 	</a> -->
			
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

		</div>
	</div>
</div>
