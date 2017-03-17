<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
<!-- 	<div class="small-12 columns text-center price">
		<span class="price"><?php echo $price_html; ?></span>
	</div> -->
<?php endif; ?>