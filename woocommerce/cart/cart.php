<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>
<div class="row blog-title" style="margin-top: 2%;">
	<h1 class="text-center" style="border: 2px #fff solid;">Cart</h1>
</div>

<div class="row blog-tile" style="padding: 2%; margin-top: 2%;">


<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="shop_table cart" cellspacing="0" style=" border-radius: 0px;">
	<?php the_field('difficulty'); ?> 
	<div class="small-12 columns" style="padding: 1% 2% 1% 2%;">
			<div class="small-1 columns product-remove">&nbsp;</div>
			<div class="small-9 columns" style="font-size: 1.5em; text-decoration: underline; color: #5086ac"><?php _e( 'Product', 'woocommerce' ); ?></div>
			<div class="small-2 columns" style="font-size: 1.5em; text-decoration: underline; color: #5086ac"><?php _e( 'Price', 'woocommerce' ); ?></div>
			<!-- <div class="small-2 columns" style="font-size: 1.5em; text-decoration: underline; color: #5086ac"><?php _e( 'Quantity', 'woocommerce' ); ?></div> -->
			<!-- <div class="small-2 columns" style="font-size: 1.5em; text-decoration: underline; color: #5086ac"><?php _e( 'Total', 'woocommerce' ); ?></div> -->
	</div>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="row product-row">
					<div class="small-1 columns product-remove">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
						?>
					</div>


					<div class="small-9 medium-9 columns product-name">
						<?php
							if ( ! $_product->is_visible() )
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							else
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );

               				// Backorder notification
               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
						?>
					</div>

					<div class="small-2 medium-2 columns product-price">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</div>

<!-- 					<div class="small-2 columns product-quantity">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0'
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
						?>
					</div> -->

<!-- 					<div class="small-2 columns product-subtotal">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</div> -->

					
					</div>
				</div>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		
			<div class="row paypal">

				<?php if ( WC()->cart->coupons_enabled() ) { ?>

									<div class="small-12 medium-6 columns">

										<label style="float: left; font-size: 1em; margin-right: 2%;" for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input style="" type="text" name="coupon_code" class="coupon-input" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" /> <input style="float: left; margin-right: 2%; margin-bottom: 2%;"  type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />

										<?php do_action('woocommerce_cart_coupon'); ?>

									</div>
				<?php } ?>

 				<div class="small-12 medium-6 columns">
 					<div class="check-right">
					<input type="submit" class="button cart-update" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" /> 
				<!-- 	<input type="submit" class="button" name="proceed" value="<?php _e( 'Proceed to Checkout', 'woocommerce' ); ?>" /> -->

					<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
					</div>
					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</div>
			</div>
		

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="cart-collaterals">

	<?php do_action( 'woocommerce_cart_collaterals' ); ?>

	<?php woocommerce_cart_totals(); ?>

<!-- 	<?php woocommerce_shipping_calculator(); ?> -->

</div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
