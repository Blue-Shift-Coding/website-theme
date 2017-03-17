<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="variation">
	<?php
		foreach ( $item_data as $data ) :
			$key = sanitize_text_field( $data['key'] );
	?>
	<div class="small-8 medium-6 columns"><p><?php echo wp_kses_post( $data['key'] ); ?>:</p></div>
	<div class="small-4 medium-6 columns"><?php echo wp_kses_post( wpautop( $data['value'] ) ); ?></p></div>
	<?php endforeach; ?>
</div>
