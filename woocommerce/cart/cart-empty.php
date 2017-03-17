<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

?>
<div class="row blog-tile" style="margin-top: 5%;">
	<h1 class="cart-empty" style="color: #5086ac; padding: 10%; text-align: center;"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></h1>

	<?php do_action( 'woocommerce_cart_is_empty' ); ?>

	<h2 class="return-to-shop" style="text-align: center;"><a class="button wc-backward" href="<?php echo apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php _e( 'Return To Shop', 'woocommerce' ) ?></a></h2>
</div>