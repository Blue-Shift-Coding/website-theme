<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;

if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>

<?php if ( $product->is_in_stock() ) : ?>





<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<a href="#" data-reveal-id="myModal" class="button">Book Now</a>

	<div id="myModal" class="reveal-modal buy-modal" data-reveal>
		<form class="cart" method="post" enctype='multipart/form-data'>
		 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		 	<?php
		 		if ( ! $product->is_sold_individually() )
		 			woocommerce_quantity_input( array(
		 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
		 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
		 			) );
		 	?>

		 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

		 	<button type="submit" class="single_add_to_cart_button button alt" style="width: 100%;"><?php echo $product->single_add_to_cart_text(); ?></button>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		</form>


	  <a class="close-reveal-modal">&#215;</a>
	</div>
	<!-- Triggers the modals -->


<!-- Reveal Modals end -->
	<style>

.gform_wrapper textarea.medium {
	 font-size: 1.5em;
	 text-align: left;
	}

.gform_wrapper {
	overflow: inherit;
	margin: 10px 0;
	max-width: 98%
}

.gform_wrapper h1,
.gform_wrapper h2,
.gform_wrapper h3 {
	font-weight: normal;
	border: none;
	outline: none;
	background: none;
}

.gform_wrapper :focus {
	outline: 0;
}

.gform_wrapper form {
	text-align: left;
}

.gform_wrapper input[type=text],
.gform_wrapper input[type=url],
.gform_wrapper input[type=email],
.gform_wrapper input[type=tel],
.gform_wrapper input[type=number],
.gform_wrapper input[type=password] {
	outline-style: none;
	font-size: 1.5em;
	font-family: inherit;
	text-align: left;
	padding: 5px 2px 5px 2px;
	letter-spacing: normal;
}

.gform_wrapper input[type=image] {
	border: none !important;
	padding: 0 !important;
	width: auto !important;
}

.gform_wrapper textarea {
	outline-style: none;
	font-size: 11px;
	font-family: inherit;
	letter-spacing: normal;
	padding: 4px 2px 4px 2px;
	resize: none;
}

.gform_wrapper ul {
	margin: 0 !important;
	list-style-type: none;
}

html>body .entry ul,
.gform_wrapper ul {
	text-indent: 0;
}

.gform_wrapper li,
.gform_wrapper form li {
	margin-left: 0 !important;
	list-style-type: none !important;
	list-style-image: none !important;
	list-style: none !important;
	overflow: visible;
}

.gform_wrapper ul li.gfield {
	float: left;
	clear: none;
}

.gform_wrapper ul li.gfield input[type=text] {
	width: 100%;
}

.gform_wrapper ul.gfield_radio li,
.gform_wrapper ul.gfield_checkbox li {
	overflow: hidden;
}

.gform_wrapper ul.right_label li,
.gform_wrapper form ul.right_label li,
.gform_wrapper ul.left_label li,
.gform_wrapper form ul.left_label li {
	margin-bottom: 14px;
}

.gform_wrapper ul.right_label li ul.gfield_radio li,
.gform_wrapper form ul.right_label li ul.gfield_radio li,
.gform_wrapper ul.left_label li ul.gfield_radio li,
.gform_wrapper form ul.left_label li ul.gfield_radio li,
.gform_wrapper ul.right_label li ul.gfield_checkbox li,
.gform_wrapper form ul.right_label li ul.gfield_checkbox li,
.gform_wrapper ul.left_label li ul.gfield_checkbox li,
.gform_wrapper form ul.left_label li ul.gfield_checkbox li {
	margin-bottom: 10px;
}

.gform_wrapper ul li:before,
.gform_wrapper ul li:after,
.gform_wrapper ul.gform_fields {
	padding: 0;
	margin: 0;
	overflow: visible;
}

.gform_wrapper select {
	font-size: 11px;
	font-family: inherit;
	padding: 5px 0 5px 0;
	letter-spacing: normal;
}

.gform_wrapper select option {
	padding: 2px 2px;
	display: block;
}

.gform_wrapper .inline {
	display: inline !important;
}

.gform_wrapper .gform_heading {
	width: 98%;
	margin-bottom: 18px;
}

.gform_wrapper .gfield_time_hour,
.gform_wrapper .gfield_time_minute,
.gform_wrapper .gfield_date_month,
.gform_wrapper .gfield_date_day,
.gform_wrapper .gfield_date_year {
	width: 70px;
	vertical-align: top;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
}

.gform_wrapper .gfield_date_month,
.gform_wrapper .gfield_date_day,
.gform_wrapper .gfield_date_year {
	margin-right: 12px;
}

.gform_wrapper .gfield_date_dropdown_month,
.gform_wrapper .gfield_date_dropdown_day,
.gform_wrapper .gfield_date_dropdown_year {
	vertical-align: top;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
}

.gform_wrapper .gfield_date_dropdown_month,
.gform_wrapper .gfield_date_dropdown_day,
.gform_wrapper .gfield_date_dropdown_year {
	margin-right: 6px;
}

.gform_wrapper .gfield_time_ampm {
	vertical-align: top;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
}

.gform_wrapper .gfield_time_ampm select {
	width: 60px !important;
}

.gform_wrapper .gfield_time_hour input,
.gform_wrapper .gfield_time_minute input,
.gform_wrapper .gfield_date_month input,
.gform_wrapper .gfield_date_day input,
.gform_wrapper .gfield_date_year input {
	width: 70% !important;
}

.gform_wrapper .gfield_date_month,
.gform_wrapper .gfield_date_day,
.gform_wrapper .gfield_date_year {
	width: 50px;
	float: left;
}

.gform_wrapper .gfield_date_month input,
.gform_wrapper .gfield_date_day input,
.gform_wrapper .gfield_date_year input {
	width: 85% !important;
}

.gform_wrapper .field_hover {
	border: 1px dashed #2175A9;
	cursor: pointer;
}

.gform_wrapper .field_selected {
	background-color: #DFEFFF;
	border: 1px solid #C2D7EF;
}

.gform_wrapper .field_name_first,
.gform_wrapper .field_name_last {
	width: 50%;
	float: left;
}

.gform_wrapper .ginput_complex {
	overflow: hidden;
}

.gform_wrapper .ginput_left input:focus+label,
.gform_wrapper .ginput_right input:focus+label,
.gform_wrapper .ginput_full input:focus+label {
	font-weight: bold;
}

.gform_wrapper .field_name_first input,
.gform_wrapper .ginput_complex .ginput_left input {
	width: 95% !important;
}

.gform_wrapper .field_name_last input {
	width: 93% !important;
}

.gform_wrapper .datepicker {
	width: 100px !important;
}

.gform_wrapper .ginput_complex .ginput_left  {
	width: 50%;
	float: left;
}

.gform_wrapper .ginput_complex .ginput_right {
	width: 49%;
	float: right;
}

.gform_wrapper .gfield_error .ginput_complex .ginput_left,
.gform_wrapper .gfield_error .ginput_complex .ginput_right {
	width: 50%;
}

.gform_wrapper .gfield_error .ginput_complex .ginput_left input[type=text],
.gform_wrapper .gfield_error .ginput_complex .ginput_left input[type=url],
.gform_wrapper .gfield_error .ginput_complex .ginput_left input[type=email],
.gform_wrapper .gfield_error .ginput_complex .ginput_left input[type=tel],
.gform_wrapper .gfield_error .ginput_complex .ginput_left input[type=number],
.gform_wrapper .gfield_error .ginput_complex .ginput_left input[type=password] {
	width: 90% !important;
}

.gform_wrapper .gfield_error .ginput_complex .ginput_right input[type=text],
.gform_wrapper .gfield_error .ginput_complex .ginput_right input[type=url],
.gform_wrapper .gfield_error .ginput_complex .ginput_right input[type=email],
.gform_wrapper .gfield_error .ginput_complex .ginput_right input[type=tel],
.gform_wrapper .gfield_error .ginput_complex .ginput_right input[type=number],
.gform_wrapper .gfield_error .ginput_complex .ginput_right input[type=password] {
	width: 95% !important;
}

.gform_wrapper .ginput_complex input[type=text],
.gform_wrapper .ginput_complex input[type=url],
.gform_wrapper .ginput_complex input[type=email],
.gform_wrapper .ginput_complex input[type=tel],
.gform_wrapper .ginput_complex input[type=number],
.gform_wrapper .ginput_complex input[type=password],
.gform_wrapper .ginput_complex select {
	width: 95% !important;
}

.gform_wrapper .ginput_complex .ginput_right input[type=text],
.gform_wrapper .ginput_complex .ginput_right input[type=url],
.gform_wrapper .ginput_complex .ginput_right input[type=email],
.gform_wrapper .ginput_complex .ginput_right input[type=tel],
.gform_wrapper .ginput_complex .ginput_right input[type=number],
.gform_wrapper .ginput_complex .ginput_right input[type=password],
.gform_wrapper .ginput_complex .ginput_right select {
	width: 95% !important;
}

.gform_wrapper .ginput_complex label,
.gform_wrapper .gfield_time_hour label,
.gform_wrapper .gfield_time_minute label,
.gform_wrapper .gfield_date_month label,
.gform_wrapper .gfield_date_day label,
.gform_wrapper .gfield_date_year label,
.gform_wrapper .instruction {
	display: block;
	margin: 3px 0;
	font-size: 11px;
	letter-spacing: 0.5pt;
}

.gform_wrapper .ginput_complex .name_prefix {
	float: left;
	width: 30px !important;
	margin-right: 14px;
}

.gform_wrapper .ginput_complex .name_suffix {
	float: left;
	width: 30px !important;
}

.gform_wrapper .ginput_complex .name_first,
.gform_wrapper .ginput_complex .name_last {
	float: left;
	/*width: 100px;*/
	width: 50%;
	float: left;
	/*margin-right: 8px;*/
}
input[placeholder],
    [placeholder],
    *[placeholder] {
      color: #5086ac;
    }

.gform_wrapper .top_label .gfield_label {
	margin: 10px 0 4px 0;
	font-weight: bold;
	display: -moz-inline-stack;
	display: inline-block;
	line-height: 1.3em;
	clear: both;
}

.gform_wrapper .left_label .gfield_label {
	float: left;
	margin: 0 15px 0 0;
	width: 29%;
	font-weight: bold;
}

.gform_wrapper .right_label .gfield_label {
	float: left;
	margin: 0 15px 0 0;
	width: 29%;
	font-weight: bold;
	text-align: right;
}

.gform_wrapper .left_label ul.gfield_checkbox,
.gform_wrapper .right_label ul.gfield_checkbox,
.gform_wrapper .left_label ul.gfield_radio,
.gform_wrapper .right_label ul.gfield_radio {
	margin-left: 32%;
	overflow: hidden;
}

.gform_wrapper .top_label input.small,
.gform_wrapper .top_label select.small {
	width: 25%;
}

.gform_wrapper .top_label input.medium,
.gform_wrapper .top_label select.medium {
	width: 47%;
}

.gform_wrapper .top_label input.medium {
	padding-right: 2px;
}

.gform_wrapper .top_label input.large,
.gform_wrapper .top_label select.large,
.gform_wrapper .top_label textarea.textarea {
	width: 99.2%;
}

.gform_wrapper .right_label input.small,
.gform_wrapper .right_label select.small,
.gform_wrapper .left_label input.small,
.gform_wrapper .left_label select.small {
	width: 15%;
}

.gform_wrapper .right_label input.medium,
.gform_wrapper .right_label select.medium,
.gform_wrapper .left_label input.medium,
.gform_wrapper .left_label select.medium {
	width: 35%;
}

.gform_wrapper .right_label input.large,
.gform_wrapper .right_label select.large,
.gform_wrapper .left_label input.large,
.gform_wrapper .left_label select.large,
.gform_wrapper textarea.textarea {
	width: 63%;
}

.gform_wrapper .right_label div.ginput_complex,
.gform_wrapper .left_label div.ginput_complex {
	width: 64%;
}

.gform_wrapper h2.gsection_title {
	margin: 0 !important;
	padding: 0 !important;
	letter-spacing: normal !important;
}

.gform_wrapper .gsection .gfield_label,
.gform_wrapper h2.gsection_title,
.gform_wrapper h3.gform_title {
	font-weight: bold;
	font-size: 1.3em;
}

.gform_wrapper h3.gform_title {
	letter-spacing: normal !important;
	margin: 10px 0 6px 0;
}

.gform_wrapper span.gform_description {
	font-weight: normal;
}

.gform_wrapper h2.gsection_title,
.gform_wrapper .gsection_description,
.gform_wrapper h3.gform_title {
	width: 98%;
}

.gform_wrapper .gsection {
	border-bottom: 1px dotted #CCC;
	padding: 0 0 8px 0;
	margin: 16px 0;
	clear: both;
}

.gform_wrapper ul.gfield_checkbox li input[type=checkbox],
.gform_wrapper ul.gfield_radio li input[type=radio] {
	width: auto !important;
}

/* radio and checkbox styling - justifies lenghty labels ------------------------------------------------------*/


.gform_wrapper .gfield_checkbox li,
.gform_wrapper .gfield_radio li {
	position: relative;
}

.gform_wrapper ul.gfield_checkbox,
.gform_wrapper ul.gfield_radio {
	margin: 6px 0;
	padding: 0;
}

.gform_wrapper .gfield_checkbox li label,
.gform_wrapper .gfield_radio li label {
	display: block;
	margin: 0 0 0 24px;
	padding: 0;
	width: auto;
	line-height: 1.5;
	vertical-align: top;
}

.gform_wrapper .gfield_checkbox li input[type=checkbox],
.gform_wrapper .gfield_radio li input[type=radio],
.gform_wrapper .gfield_checkbox li input {
	float: left;
	margin-top: 2px;
}

.gform_wrapper .description,
.gform_wrapper .gfield_description,
.gform_wrapper .gsection_description,
.gform_wrapper .instruction {
	font-size: 0.85em;
	line-height: 1.5em;
	clear: both;
	font-family: sans-serif;
	letter-spacing: normal;
}

.gform_wrapper .description,
.gform_wrapper .gfield_description,
.gform_wrapper .gsection_description {
	padding: 4px 0 8px 0;
}

.gform_wrapper .gfield_description {
	padding: 10px 0 0 0;
	width: 99.8%;
}

.gform_wrapper .left_label .gfield_description,
.gform_wrapper .right_label .gfield_description {
	width: 63%;
}

.gform_wrapper .description_above .gfield_description {
	padding: 0 0 10px 0;
}

.gfield_date_year+.gfield_description {
	padding: 0;
}

.gform_wrapper .right_label .gfield_description,
.gform_wrapper .left_label .gfield_description,
.gform_wrapper .left_label .instruction,
.gform_wrapper .right_label .instruction {
	margin-left: 31%;
}

.gform_wrapper .left_label .gsection .gsection_description,
.gform_wrapper .right_label .gsection .gsection_description {
	margin-left: 0;
	padding-top: 4px;
	padding-left: 0;
	line-height: 1.5em;
}

.gform_wrapper .gfield_required {
	color: #790000;
	margin-left: 4px;
}

.gform_wrapper textarea.small {
	height: 80px;
}

.gform_wrapper textarea.medium {
	height: 150px;
}

.gform_wrapper textarea.large {
	height: 250px;
}

.gform_wrapper li.gfield.gfield_error,
.gform_wrapper li.gfield.gfield_error.gfield_contains_required.gfield_creditcard_warning {
	background-color: #FFDFE0;
	margin-bottom: 6px !important;
	padding: 6px 6px 4px 6px !important;
	border-top: 1px solid #C89797;
	border-bottom: 1px solid #C89797;
}

.gform_wrapper li.gfield.gfield_creditcard_warning {
	margin-bottom: 6px !important;
	padding: 6px 6px 4px 6px !important;
	border: 1px dashed #C89797;
}

.gform_wrapper li.gfield.gfield_creditcard_warning div.gfield_creditcard_warning_message {
	font-size:1em;
	font-family: "Lucida Grande", "Lucida Sans", "Lucida Sans Unicode", "DejaVu Sans", "Bitstream Vera Sans", "Liberation Sans", Verdana, "Verdana Ref", sans-serif;
	padding: 10px 20px 10px 45px;
	min-height: 25px;
	background-image: url(../images/stopbanner.png);
	background-repeat: no-repeat;
	background-position: 0 0;
	background-color: #790000;
	border-bottom: 1px solid #620101;
	color: #FFF;
	text-shadow: 0 1px 1px rgba(0,0,0,0.50);
	line-height: 1.3em;
	letter-spacing: 0.2pt;
}

li.gfield + li.gfield.gfield_creditcard_warning {
	margin-top: 14px !important;
}

.gform_wrapper .top_label .gfield_error .ginput_container {
	max-width: 99%;
}

.gform_wrapper .top_label .gfield_error {
	width: 97%;
}

.gform_wrapper .top_label .gfield_error input.large,
.gform_wrapper .top_label .gfield_error select.large,
.gform_wrapper .top_label .gfield_error textarea.textarea {
	width: 100%;
}

.gform_wrapper .right_label .gfield_error input.large,
.gform_wrapper .right_label .gfield_error select.large,
.gform_wrapper .right_label .gfield_error textarea.textarea,
.gform_wrapper .left_label .gfield_error input.large,
.gform_wrapper .left_label .gfield_error select.large,
.gform_wrapper .left_label .gfield_error textarea.textarea {
	width: 66%;
}

.gform_wrapper .gfield_error .gfield_label {
	color: #790000;
}

.gform_wrapper li.gfield.gfield_error.gfield_contains_required {
	margin-top: 12px;
	margin-bottom: 12px !important;
	padding-left: 10px !important;
}

.gform_wrapper li.gfield.gfield_error.gfield_contains_required label.gfield_label,
.gform_wrapper li.gfield.gfield_error.gfield_contains_required div.ginput_container  {
	margin-top: 12px;
}

.gform_wrapper div.validation_error {
	color: #790000;
	font-size: 1.2em;
	font-weight: bold;
	margin-bottom: 1.6em;
}

.gform_wrapper div.validation_error {
	color: #790000;
	font-size: 1.2em;
	font-weight: bold;
}

div.gf_page_steps+div.validation_error {
	margin-top: 16px;
}

.gform_wrapper div.gfield_description.validation_error {
	color: #790000;
	font-weight: bold;
	font-size: 14px;
	line-height: 1.2em;
	margin-bottom: 16px;
}

.gform_wrapper .validation_message {
	color: #790000;
	font-weight: bold;
	letter-spacing: normal;
}

.gform_wrapper li.gfield_error input[type=text],
.gform_wrapper li.gfield_error input[type=url],
.gform_wrapper li.gfield_error input[type=email],
.gform_wrapper li.gfield_error input[type=tel],
.gform_wrapper li.gfield_error input[type=number],
.gform_wrapper li.gfield_error input[type=password],
.gform_wrapper li.gfield_error textarea {
	border: 1px solid #790000;
}

.gform_wrapper li.gfield_error div.ginput_complex.ginput_container label,
.gform_wrapper li.gfield_error ul.gfield_checkbox,
.gform_wrapper li.gfield_error ul.gfield_radio {
	color: #790000;
}

.gform_wrapper .gform_footer {
	padding: 16px 0 10px 0;
	margin: 16px 0 0 0;
	clear: both;
}

.gform_wrapper .gform_footer.right_label,
.gform_wrapper .gform_footer.left_label {
	padding: 16px 0 10px 31%;
}

.gform_wrapper .gform_footer input.button,
.gform_wrapper .gform_footer input[type=submit] {
	font-size: 1em;
}

.gform_wrapper .gform_footer input[type=image] {
	padding: 0;
	width: auto !important;
	background: none !important;
	border: none !important;
}

.gform_wrapper .ginput_complex .ginput_left,
.gform_wrapper .ginput_complex .ginput_right,
.gform_wrapper .ginput_complex .ginput_full {
	min-height: 43px;
	display: block;
	overflow: hidden;
}

.gform_wrapper .ginput_complex .ginput_full input[type=text],
.gform_wrapper .ginput_complex .ginput_full input[type=url],
.gform_wrapper .ginput_complex .ginput_full input[type=email],
.gform_wrapper .ginput_complex .ginput_full input[type=tel],
.gform_wrapper .ginput_complex .ginput_full input[type=number],
.gform_wrapper .ginput_complex .ginput_full input[type=password] {
	width: 97% !important;
}

.gform_wrapper .gfield_checkbox li,
.gform_wrapper .gfield_radio li {
	margin: 0 0 8px 0;
	line-height: 1.3em;
}

.gform_wrapper ul.gfield_radio li input[type="radio"]:checked+label,
.gform_wrapper ul.gfield_checkbox li input[type="checkbox"]:checked+label {
    font-weight: bold;
}

.gform_wrapper input.datepicker.datepicker_with_icon {
	margin-right: 4px !important;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
}

/* tame those pesky hidden fields ------------------------------------------------------*/


.gform_wrapper input[type=hidden],
.gform_wrapper input.gform_hidden,
.gform_wrapper .gform_hidden,
.gform_wrapper .gf_hidden {
	display: none !important;
	max-height: 1px !important;
	overflow: hidden;
}

.gform_wrapper .ginput_full br,
.gform_wrapper .ginput_left br,
.gform_wrapper .ginput_right br {
	display: none !important;
}

/* additional spacing and padding tweaks ------------------------------------------------------*/


.gform_wrapper ul.gfield_checkbox li,
.gform_wrapper ul.gfield_radio li {
	padding: 0 !important;
}

.gform_wrapper ul.gfield_radio li input+input {
	margin-left: 4px;
}

.gform_wrapper ul.gfield_radio li input[value=gf_other_choice] {
	margin-right: 6px;
	margin-top: 4px;
}

.gform_wrapper .top_label .gfield_description, {
	padding: 10px 0 0 0;
}

.gform_wrapper .top_label .gfield_description.validation_message,
.gform_wrapper .gfield_description.validation_message {
	padding: 10px 0 !important;
}

.gform_wrapper .ginput_container + .gfield_description.validation_message {
	margin-top: 6px;
}

.gform_wrapper .gfield_description + .gform_wrapper .gfield_description.validation_message {
	margin-top: 6px;
}

.gform_wrapper .ginput_container.ginput_list + .gfield_description.validation_message {
	margin-top: 0;
}

/* HTML field default margins -----------------------------------------------------*/


.gform_wrapper .left_label li.gfield_html_formatted,
.gform_wrapper .right_label li.gfield_html_formatted {
	margin-left: 32%;
}

.gform_wrapper .gfield_html.gfield_no_follows_desc {
	margin-top: 10px;
}

/* ajax forms ------------------------------------------------------*/


.gform_wrapper .gform_ajax_spinner {
	padding-left: 10px;
}

/* hide the honeypot field  ------------------------------------------------------*/


.gform_validation_container,
.gform_wrapper .gform_validation_container,
body .gform_wrapper li.gform_validation_container,
body .gform_wrapper .gform_body ul.gform_fields li.gfield.gform_validation_container,
body .gform_wrapper ul.gform_fields li.gfield.gform_validation_container {
	display: none !important;
	position: absolute !important;
	left: -9000px;
}

/* Really Simple Captcha ------------------------------------------------------*/


.gform_wrapper .gfield_captcha_input_container {
	padding-top: 3px;
}

.gform_wrapper .simple_captcha_small input {
	width: 100px;
}

.gform_wrapper .simple_captcha_medium input {
	width: 150px;
}

.gform_wrapper .simple_captcha_large input {
	width: 200px;
}

.gform_wrapper .gform_wrapper .left_label .simple_captcha_small,
.gform_wrapper .right_label .simple_captcha_small,
.gform_wrapper .left_label .simple_captcha_medium,
.gform_wrapper .right_label .simple_captcha_medium,
.gform_wrapper .left_label .simple_captcha_large,
.gform_wrapper .right_label .simple_captcha_large {
	margin-left: 32%;
}

.gform_wrapper .gfield_captcha_container img.gfield_captcha {
	border: none !important;
	background: none !important;
	float: none !important;
	margin: 0 !important;
	padding: 0 !important;
}

/* math challenge ------------------------------------------------------*/


.gform_wrapper .math_small input {
	width: 69px;
}

.gform_wrapper .math_medium input {
	width: 90px;
}

.gform_wrapper .math_large input {
	width: 108px;
}

.gform_wrapper .left_label .math_small,
.gform_wrapper .right_label .math_small,
.gform_wrapper .left_label .math_medium,
.gform_wrapper .right_label .math_medium,
.gform_wrapper .left_label .math_large,
.gform_wrapper .right_label .math_large {
	margin-left: 32%;
}

/* textarea character counter ------------------------------------------------------*/


.gform_wrapper div.charleft {
	font-size: 11px;
	margin-top: 4px;
	color: #B7B7B7;
	width: 92% !important;
	white-space: nowrap !important;
}

.gform_wrapper div.charleft[style] {
	width: 92% !important;
}

.gform_wrapper .left_label div.charleft,
.gform_wrapper .right_label div.charleft {
	margin-left: 32%;
}

.gform_wrapper div.charleft.warningTextareaInfo {
	color: #A1A1A1;
}

.gform_wrapper li.gf_hide_charleft div.charleft  {
	display: none !important;
}

/* submission limit message ------------------------------------------------------*/

.gf_submission_limit_message {
	color: #790000;
	font-size: 1.4em;
}

/* pricing fields ------------------------------------------------------*/


.gform_wrapper .ginput_price {
	filter: alpha(opacity=70);
	-moz-opacity: 0.7;
	-khtml-opacity: 0.7;
	opacity: 0.7;
}

.gform_wrapper span.ginput_total {
	color: #060;
	font-size: 1.2em;
}

.gform_wrapper .top_label span.ginput_total {
	margin: 8px 0;
}

.gform_wrapper span.ginput_product_price_label {
	margin-right: 2px;
}

.gform_wrapper span.ginput_product_price {
	color: #900
}

.gform_wrapper span.ginput_quantity_label {
	margin-left: 10px;
	margin-right: 2px;
}

.gform_wrapper input.ginput_quantity {
	width: 40px;
}

/* multi-page form paging ------------------------------------------------------*/

.gform_wrapper .gform_page_footer {
	margin: 20px 0;
	width: 99%;
	border-top: 1px dotted #CCC;
	padding: 16px 0 0 0;
}

.gform_wrapper .gform_page_footer .button.gform_button  {
	margin-right: 10px;
}

/* multi-page progress bar  ------------------------------------------------------*/


.gform_wrapper .gf_progressbar_wrapper {
	clear: both;
	width: 99%;
	margin: 0 0 8px 0;
	padding: 0 0 16px 0;
	border-bottom: 1px dotted #CCC;
}

.gform_wrapper .gf_progressbar_wrapper h3.gf_progressbar_title {
	font-size: 13px;
	line-height: 1em !important;
	margin: 0 0 6px 0 !important;
	padding: 0 !important;
	clear: both;
	filter: alpha(opacity=60);
	-moz-opacity: 0.6;
	-khtml-opacity: 0.6;
	opacity: 0.6;
}

.gform_wrapper .gf_progressbar {
	width: 99%;
	height: 20px;
	overflow: hidden;
	line-height: 20px !important;
	border: 1px solid #EEE;
	background-image: url(../images/gf-percentbar-bg.png);
	background-repeat: repeat-x;
	background-position: bottom;
	background-color: #FFF;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-moz-box-shadow: 0 0 4px 0 rgba(0,0,0,0.2);
	-webkit-box-shadow: 0 0 4px 0 rgba(0,0,0,0.2);
	box-shadow: 0 0 4px 0 rgba(0,0,0,0.2);
}

.gform_wrapper .gf_progressbar_percentage {
	height: 20px;
	text-align: right;
	font-family: helvetica,arial,sans-serif;
	font-size: 13px !important;
	text-shadow: 0 1px 1px rgba(0,0,0,0.50);
}

.gform_wrapper .gf_progressbar_percentage span {
	display: block;
	width: auto;
	float: right;
	margin-right: 5px;
	margin-left: 5px;
}

.gform_wrapper .gf_progressbar_percentage.percentbar_0 span {
	color: #959595;
	text-shadow: none;
}

.gform_wrapper .percentbar_blue {
	background-image: url(../images/gf-percentbar-blue.png);
	background-repeat: repeat-x;
	background-color: #0072BC;
	color: #FFF;
}

.gform_wrapper .percentbar_gray {
	background-image: url(../images/gf-percentbar-gray.png);
	background-repeat: repeat-x;
	background-color: #666;
	color: #FFF;
}

.gform_wrapper .percentbar_green {
	background-image: url(../images/gf-percentbar-green.png);
	background-repeat: repeat-x;
	background-color: #94DC21;
	color: #FFF;
}

.gform_wrapper .percentbar_orange {
	background-image: url(../images/gf-percentbar-orange.png);
	background-repeat: repeat-x;
	background-color: #DC7021;
	color: #FFF;
}

.gform_wrapper .percentbar_red {
	background-image: url(../images/gf-percentbar-red.png);
	background-repeat: repeat-x;
	background-color: #DC2521;
	color: #FFF;
}

.gform_wrapper .percentbar_custom {
	background-image: url(../images/gf-percentbar-custom.png);
	background-repeat: repeat-x;
}

/* multi-page steps ------------------------------------------------------*/


.gform_wrapper .gf_page_steps {
	width: 99%;
	margin: 0 0 8px 0;
	padding: 0 0 4px 0;
	border-bottom: 1px dotted #CCC;
}

.gform_wrapper .gf_step {
	width: auto !important;
	margin: 0 10px 10px 0;
	font-size: 14px;
	height: 20px;
	line-height: 20px !important;
	filter: alpha(opacity=20);
	-moz-opacity: 0.2;
	-khtml-opacity: 0.2;
	opacity: 0.2;
	font-family: arial,sans-serif;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
}

.gform_wrapper .gf_step span.gf_step_number {
	font-size: 20px;
	float: left;
	font-family: arial,sans-serif;
}

.gform_wrapper .gf_step.gf_step_active {
	filter: alpha(opacity=100);
	-moz-opacity: 1.0;
	-khtml-opacity: 1.0;
	opacity: 1.0;
}

.gform_wrapper .gf_step_clear {
	display: block;
	clear: both;
	height: 1px;
	overflow: hidden;
}

/* password strength indicator -----------------------------------------------------------------*/


.gform_wrapper .gfield_password_strength {
	border: 1px solid #DDD;
	margin: 0;
	padding: 3px 5px;
	text-align: center;
	width: 200px;
	background-color: #EEE;
}

.gform_wrapper .gfield_password_strength.bad {
	background-color: #FFB78C;
	border-color: #FF853C;
}

.gform_wrapper .gfield_password_strength.good {
	background-color: #FFEC8b;
	border-color: #FC0;
}

.gform_wrapper .gfield_password_strength.short,
.gform_wrapper .gfield_password_strength.mismatch {
	background-color: #FFA0A0;
	border-color: #f04040;
}

.gform_wrapper .gfield_password_strength.strong {
	background-color: #C3FF88;
	border-color: #8DFF1C;
}

/* reset the default list styles for the HTML blocks -----------------------------------------------------------------*/


body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html ul li,
body .gform_wrapper form div.gform_body ul.gform_fields li.gfield.gfield_html ul li {
	list-style-type: disc !important;
	margin: 0 0 0.5em;
	overflow: visible;
	padding-left: 0;
}

body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html ul,
body .gform_wrapper form div.gform_body ul.gform_fields li.gfield.gfield_html ul {
	list-style-type: disc !important;
	margin: 1em 0 1em 1.5em;
	padding-left: 0;
}

body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html ol li,
body .gform_wrapper form div.gform_body ul.gform_fields li.gfield.gfield_html ol li {
	list-style-type: decimal!important;
	overflow:visible;
	margin: 0 0 0.5em;
	padding-left: 0;
}

body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html ol,
body .gform_wrapper form div.gform_body ul.gform_fields li.gfield.gfield_html ol {
	list-style-type: decimal!important;
	margin: 1em 0 1.5em 2.0em;
	padding-left: 0;
}

body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html ol li ul,
body .gform_wrapper form div.gform_body ul.gform_fields li.gfield.gfield_html ol li ul li {
    list-style-type: disc !important;
    padding-left: 0;
}

body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html ol li ul {
	margin: 1em 0 1em 1.5em;
}

body .gform_wrapper form div.gform_body ul.gform_fields li.gfield.gfield_html ol li ul li {
	margin: 0 0 0.5em;
}

body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html dl {
	margin: 0 0 1.5em 0;
	padding-left: 0;
}

body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html dl dt {
	font-weight: bold;
}

body .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_html dl dd {
	margin: 0 0 1em 1.5em;
}

/* list fields added in v.1.6 -----------------------------------------------------------------*/


.gform_wrapper table.gfield_list,
.gform_wrapper table.gfield_list caption,
.gform_wrapper table.gfield_list tbody,
.gform_wrapper table.gfield_list tfoot,
.gform_wrapper table.gfield_list thead,
.gform_wrapper table.gfield_list tr,
.gform_wrapper table.gfield_list th,
.gform_wrapper table.gfield_list td {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}

.gform_wrapper table.gfield_list {
	border-spacing: 0;
	border-collapse:collapse;
}

.gform_wrapper table.gfield_list thead th {
	font-weight: bold;
	text-align: left;
}

.gform_wrapper li.gfield.gfield_error table.gfield_list thead th {
	color: #790000;
}

.gform_wrapper table.gfield_list thead,
.gform_wrapper table.gfield_list tr {
	padding: 0;
	margin: 0;
}

.gform_wrapper table.gfield_list th,
.gform_wrapper table.gfield_list td {
	padding:0 0 0.5em 0;
}

.gform_wrapper table.gfield_list th + th,
.gform_wrapper table.gfield_list td + td {
	padding:0 0 0.5em 0.7em;
}

.gform_wrapper .left_label .gfield_list, .gform_wrapper .right_label .gfield_list {
	width: 64%;
}

.gform_wrapper .top_label .gfield_list {
	width: 99%;
}

.gform_wrapper .left_label .gf_list_one_column, .gform_wrapper .right_label .gf_list_one_column {
	width: 45%;
}

.gform_wrapper .top_label .gf_list_one_column {
	width: 46%;
}

.gform_wrapper .gfield_list input{
	width: 98%;
}

.gfield_icon_disabled {
	cursor: default !important;
	filter: alpha(opacity=60);
	-moz-opacity: 0.6;
	-khtml-opacity: 0.6;
	opacity: 0.6;
}

.gform_wrapper table.gfield_list td.gfield_list_icons {
	min-width: 45px !important;
}

/* enhanced UI/select styles updated in v.1.8.12 -----------------------------------------------------------------*/


.gform_wrapper .chosen-container {
    position: relative;
    display: inline-block;
    vertical-align: middle;
    font-size: 13px;
    zoom: 1;
    *display: inline;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}
.gform_wrapper .chosen-container .chosen-drop {
    position: absolute;
    top: 100%;
    left: -9999px;
    z-index: 1010;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%;
    border: 1px solid #aaa;
    border-top: 0;
    background: #fff;
    box-shadow: 0 4px 5px rgba(0, 0, 0, .15);
}
.gform_wrapper .chosen-container.chosen-with-drop .chosen-drop {
    left: 0;
}
.gform_wrapper .chosen-container a {
    cursor: pointer;
}
.gform_wrapper .chosen-container-single .chosen-single {
    position: relative;
    display: block;
    overflow: hidden;
    padding: 0 0 0 8px;
    height: 23px;
    border: 1px solid #aaa;
    border-radius: 5px;
    background-color: #fff;
    background: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(20%, #fff), color-stop(50%, #f6f6f6), color-stop(52%, #eee), color-stop(100%, #f4f4f4));
    background: -webkit-linear-gradient(top, #fff 20%, #f6f6f6 50%, #eee 52%, #f4f4f4 100%);
    background: -moz-linear-gradient(top, #fff 20%, #f6f6f6 50%, #eee 52%, #f4f4f4 100%);
    background: -o-linear-gradient(top, #fff 20%, #f6f6f6 50%, #eee 52%, #f4f4f4 100%);
    background: linear-gradient(top, #fff 20%, #f6f6f6 50%, #eee 52%, #f4f4f4 100%);
    background-clip: padding-box;
    box-shadow: 0 0 3px #fff inset, 0 1px 1px rgba(0, 0, 0, .1);
    color: #444;
    text-decoration: none;
    white-space: nowrap;
    line-height: 24px;
}
.gform_wrapper .chosen-container-single .chosen-default {
    color: #999;
}
.gform_wrapper .chosen-container-single .chosen-single span {
    display: block;
    overflow: hidden;
    margin-right: 26px;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.gform_wrapper .chosen-container-single .chosen-single-with-deselect span {
    margin-right: 38px;
}
.gform_wrapper .chosen-container-single .chosen-single abbr {
    position: absolute;
    top: 6px;
    right: 26px;
    display: block;
    width: 12px;
    height: 12px;
    background: url(../images/chosen-sprite.png) -42px 1px no-repeat;
    font-size: 1px;
}
.gform_wrapper .chosen-container-single .chosen-single abbr:hover {
    background-position: -42px -10px;
}
.gform_wrapper .chosen-container-single.chosen-disabled .chosen-single abbr:hover {
    background-position: -42px -10px;
}
.gform_wrapper .chosen-container-single .chosen-single div {
    position: absolute;
    top: 0;
    right: 0;
    display: block;
    width: 18px;
    height: 100%}
.gform_wrapper .chosen-container-single .chosen-single div b {
    display: block;
    width: 100%;
    height: 100%;
    background: url(../images/chosen-sprite.png) no-repeat 0 2px;
}
.gform_wrapper .chosen-container-single .chosen-search {
    position: relative;
    z-index: 1010;
    margin: 0;
    padding: 3px 4px;
    white-space: nowrap;
}
.gform_wrapper .chosen-container-single .chosen-search input[type=text] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin: 1px 0;
    padding: 4px 20px 4px 5px;
    width: 100%;
    height: auto;
    outline: 0;
    border: 1px solid #aaa;
    background: #fff url(../images/chosen-sprite.png) no-repeat 100% -20px;
    background: url(../images/chosen-sprite.png) no-repeat 100% -20px;
    font-size: 1em;
    font-family: sans-serif;
    line-height: normal;
    border-radius: 0;
}
.gform_wrapper .chosen-container-single .chosen-drop {
    margin-top: -1px;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
}
.gform_wrapper .chosen-container-single.chosen-container-single-nosearch .chosen-search {
    position: absolute;
    left: -9999px;
}
.gform_wrapper .chosen-container .chosen-results {
    position: relative;
    overflow-x: hidden;
    overflow-y: auto;
    margin: 0 4px 4px 0;
    padding: 0 0 0 4px;
    max-height: 240px;
    -webkit-overflow-scrolling: touch;
}
.gform_wrapper .chosen-container .chosen-results li {
    display: none;
    margin: 0;
    padding: 5px 6px;
    list-style: none;
    line-height: 15px;
    -webkit-touch-callout: none;
}
.gform_wrapper .chosen-container .chosen-results li.active-result {
    display: list-item;
    cursor: pointer;
}
.gform_wrapper .chosen-container .chosen-results li.disabled-result {
    display: list-item;
    color: #ccc;
    cursor: default;
}
.gform_wrapper .chosen-container .chosen-results li.highlighted {
    background-color: #3875d7;
    background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(20%, #3875d7), color-stop(90%, #2a62bc));
    background-image: -webkit-linear-gradient(#3875d7 20%, #2a62bc 90%);
    background-image: -moz-linear-gradient(#3875d7 20%, #2a62bc 90%);
    background-image: -o-linear-gradient(#3875d7 20%, #2a62bc 90%);
    background-image: linear-gradient(#3875d7 20%, #2a62bc 90%);
    color: #fff;
}
.gform_wrapper .chosen-container .chosen-results li.no-results {
    display: list-item;
    background: #f4f4f4;
}
.gform_wrapper .chosen-container .chosen-results li.group-result {
    display: list-item;
    font-weight: 700;
    cursor: default;
}
.gform_wrapper .chosen-container .chosen-results li.group-option {
    padding-left: 15px;
}
.gform_wrapper .chosen-container .chosen-results li em {
    font-style: normal;
    text-decoration: underline;
}
.gform_wrapper .chosen-container-multi .chosen-choices {
    position: relative;
    overflow: hidden;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    width: 100%;
    height: auto!important;
    height: 1%;
    border: 1px solid #aaa;
    background-color: #fff;
    background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(1%, #eee), color-stop(15%, #fff));
    background-image: -webkit-linear-gradient(#eee 1%, #fff 15%);
    background-image: -moz-linear-gradient(#eee 1%, #fff 15%);
    background-image: -o-linear-gradient(#eee 1%, #fff 15%);
    background-image: linear-gradient(#eee 1%, #fff 15%);
    cursor: text;
}
.gform_wrapper .chosen-container-multi .chosen-choices li {
    float: left;
    list-style: none;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-field {
    margin: 0;
    padding: 0;
    white-space: nowrap;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-field input[type=text] {
    margin: 1px 0;
    padding: 5px;
    height: 15px;
    outline: 0;
    border: 0!important;
    background: transparent!important;
    box-shadow: none;
    color: #666;
    font-size: 100%;
    font-family: sans-serif;
    line-height: normal;
    border-radius: 0;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-field .default {
    color: #999;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-choice {
    position: relative;
    margin: 3px 0 3px 5px !important;
    padding: 3px 20px 3px 5px;
    border: 1px solid #aaa;
    border-radius: 3px;
    background-color: #e4e4e4;
    background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eee));
    background-image: -webkit-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    background-image: -moz-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    background-image: -o-linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    background-image: linear-gradient(#f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    background-clip: padding-box;
    box-shadow: 0 0 2px #fff inset, 0 1px 0 rgba(0, 0, 0, .05);
    color: #333;
    line-height: 13px;
    cursor: default;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
    position: absolute;
    top: 4px;
    right: 3px;
    display: block;
    width: 12px;
    height: 12px;
    background: url(../images/chosen-sprite.png) -42px 1px no-repeat;
    font-size: 1px;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-choice .search-choice-close:hover {
    background-position: -42px -10px;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-choice-disabled {
    padding-right: 5px;
    border: 1px solid #ccc;
    background-color: #e4e4e4;
    background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eee));
    background-image: -webkit-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    background-image: -moz-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    background-image: -o-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    background-image: linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eee 100%);
    color: #666;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-choice-focus {
    background: #d4d4d4;
}
.gform_wrapper .chosen-container-multi .chosen-choices li.search-choice-focus .search-choice-close {
    background-position: -42px -10px;
}
.gform_wrapper .chosen-container-multi .chosen-results {
    margin: 0;
    padding: 0;
}
.gform_wrapper .chosen-container-multi .chosen-drop .result-selected {
    display: list-item;
    color: #ccc;
    cursor: default;
}
.gform_wrapper .chosen-container-active .chosen-single {
    border: 1px solid #5897fb;
    box-shadow: 0 0 5px rgba(0, 0, 0, .3);
}
.gform_wrapper .chosen-container-active.chosen-with-drop .chosen-single {
    border: 1px solid #aaa;
    -moz-border-radius-bottomright: 0;
    border-bottom-right-radius: 0;
    -moz-border-radius-bottomleft: 0;
    border-bottom-left-radius: 0;
    background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(20%, #eee), color-stop(80%, #fff));
    background-image: -webkit-linear-gradient(#eee 20%, #fff 80%);
    background-image: -moz-linear-gradient(#eee 20%, #fff 80%);
    background-image: -o-linear-gradient(#eee 20%, #fff 80%);
    background-image: linear-gradient(#eee 20%, #fff 80%);
    box-shadow: 0 1px 0 #fff inset;
}
.gform_wrapper .chosen-container-active.chosen-with-drop .chosen-single div {
    border-left: 0;
    background: transparent;
}
.gform_wrapper .chosen-container-active.chosen-with-drop .chosen-single div b {
    background-position: -18px 2px;
}
.gform_wrapper .chosen-container-active .chosen-choices {
    border: 1px solid #5897fb;
    box-shadow: 0 0 5px rgba(0, 0, 0, .3);
}
.gform_wrapper .chosen-container-active .chosen-choices li.search-field input[type=text] {
    color: #111!important;
}
.gform_wrapper .chosen-disabled {
    opacity: .5!important;
    cursor: default;
}
.gform_wrapper .chosen-disabled .chosen-single {
    cursor: default;
}
.gform_wrapper .chosen-disabled .chosen-choices .search-choice .search-choice-close {
    cursor: default;
}
.gform_wrapper .chosen-rtl {
    text-align: right;
}
.gform_wrapper .chosen-rtl .chosen-single {
    overflow: visible;
    padding: 0 8px 0 0;
}
.gform_wrapper .chosen-rtl .chosen-single span {
    margin-right: 0;
    margin-left: 26px;
    direction: rtl;
}
.gform_wrapper .chosen-rtl .chosen-single-with-deselect span {
    margin-left: 38px;
}
.gform_wrapper .chosen-rtl .chosen-single div {
    right: auto;
    left: 3px;
}
.gform_wrapper .chosen-rtl .chosen-single abbr {
    right: auto;
    left: 26px;
}
.gform_wrapper .chosen-rtl .chosen-choices li {
    float: right;
}
.gform_wrapper .chosen-rtl .chosen-choices li.search-field input[type=text] {
    direction: rtl;
}
.gform_wrapper .chosen-rtl .chosen-choices li.search-choice {
    margin: 3px 5px 3px 0;
    padding: 3px 5px 3px 19px;
}
.gform_wrapper .chosen-rtl .chosen-choices li.search-choice .search-choice-close {
    right: auto;
    left: 4px;
}
.gform_wrapper .chosen-rtl.chosen-container-single-nosearch .chosen-search.gform_wrapper .chosen-rtl .chosen-drop {
    left: 9999px;
}
.gform_wrapper .chosen-rtl.chosen-container-single .chosen-results {
    margin: 0 0 4px 4px;
    padding: 0 4px 0 0;
}
.gform_wrapper .chosen-rtl .chosen-results li.group-option {
    padding-right: 15px;
    padding-left: 0;
}
.gform_wrapper .chosen-rtl.chosen-container-active.chosen-with-drop .chosen-single div {
    border-right: 0;
}
.gform_wrapper .chosen-rtl .chosen-search input[type=text] {
    padding: 4px 5px 4px 20px;
    background: #fff url(../images/chosen-sprite.png) no-repeat -30px -20px;
    background: url(../images/chosen-sprite.png) no-repeat -30px -20px;
    direction: rtl;
}
.gform_wrapper .chosen-rtl.chosen-container-single .chosen-single div b {
    background-position: 6px 2px;
}
.gform_wrapper .chosen-rtl.chosen-container-single.chosen-with-drop .chosen-single div b {
    background-position: -12px 2px;
}
@media only screen and (-webkit-min-device-pixel-ratio:2), only screen and (min-resolution:144dpi) {
    .gform_wrapper .chosen-rtl .chosen-search input[type=text].gform_wrapper .chosen-container-single .chosen-single abbr.gform_wrapper .chosen-container-single .chosen-single div b.gform_wrapper .chosen-container-single .chosen-search input[type=text].gform_wrapper .chosen-container-multi .chosen-choices .search-choice .search-choice-close.gform_wrapper .chosen-container .chosen-results-scroll-down span.gform_wrapper .chosen-container .chosen-results-scroll-up span {
        background-image: url(../images/chosen-sprite@2x.png)!important;
        background-size: 52px 37px!important;
        background-repeat: no-repeat!important;
    }
}

/* credit card icons ------------------------------------------------------*/


.gform_wrapper .gform_card_icon_container {
	margin: 8px 0 6px 0;
	height: 32px;
}

.gform_wrapper div.gform_card_icon {
	margin-right: 4px;
	text-indent: -9000px;
	background-image: url(../images/gf-creditcard-icons.png);
	background-repeat: no-repeat;
	width: 36px;
	height: 32px;
	float: left;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_visa {
	background-position: 0 0;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_visa {
	background-position: 0 -32px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_visa {
	background-position: 0 -64px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_mastercard {
	background-position: -36px 0;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_mastercard {
	background-position: -36px -32px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_mastercard {
	background-position: -36px -64px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_amex {
	background-position: -72px 0;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_amex {
	background-position: -72px -32px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_amex {
	background-position: -72px -64px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_discover {
	background-position: -108px 0;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_discover {
	background-position: -108px -32px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_discover {
	background-position: -108px -64px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_maestro {
	background-position: -144px 0;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_maestro {
	background-position: -144px -32px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_maestro {
	background-position: -144px -64px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_jcb {
	background-position: -180px 0;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_jcb {
	background-position: -180px -32px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style1 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_jcb {
	background-position: -180px -64px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_visa {
	background-position: 0 -192px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_visa {
	background-position: 0 -224px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_visa {
	background-position: 0 -256px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_mastercard {
	background-position: -36px -192px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_mastercard {
	background-position: -36px -224px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_mastercard {
	background-position: -36px -256px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_amex {
	background-position: -72px -192px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_amex {
	background-position: -72px -224px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_amex {
	background-position: -72px -256px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_discover {
	background-position: -108px -192px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_discover {
	background-position: -108px -224px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_discover {
	background-position: -108px -256px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_maestro {
	background-position: -144px -192px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_maestro {
	background-position: -144px -224px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_maestro {
	background-position: -144px -256px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_jcb {
	background-position: -180px -192px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_selected.gform_card_icon_jcb {
	background-position: -180px -224px;
}

.gform_wrapper .gform_card_icon_container.gform_card_icon_style2 div.gform_card_icon.gform_card_icon_inactive.gform_card_icon_jcb {
	background-position: -180px -256px;
}

/* credit card fields ------------------------------------------------------*/


.gform_card_icon_container input[type=radio]#gform_payment_method_creditcard {
	float: left;
	position: relative;
	top: 4px!important
}

.gform_wrapper .ginput_complex .ginput_cardinfo_left,
.gform_wrapper .ginput_complex .ginput_cardinfo_right {
	min-height: 43px;
	position: relative;
	float: left;
}

.gform_wrapper .ginput_complex .ginput_cardinfo_left {
	width: 50%;
	margin-right: 1%;
}

.gform_wrapper .ginput_complex .ginput_cardinfo_right {
	min-width: 85px !important;
}

.gform_wrapper .ginput_complex .ginput_cardinfo_left label,
.gform_wrapper .ginput_complex .ginput_cardinfo_right label {
	white-space: nowrap !important;
}

.gform_wrapper .ginput_complex span.ginput_cardextras {
	display: block;
	overflow: hidden;
}

.gform_wrapper .ginput_complex .ginput_cardinfo_left span.ginput_card_expiration_container {
	position: relative;
	display: block;
	min-width: 160px !important;
}

.gform_wrapper .ginput_complex select.ginput_card_expiration.ginput_card_expiration_month,
.gform_wrapper .ginput_complex select.ginput_card_expiration.ginput_card_expiration_year {
	width: 48% !important;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
}

.gform_wrapper .ginput_complex .ginput_cardinfo_left select.ginput_card_expiration.ginput_card_expiration_month {
	margin-right: 4px;
}

.gform_wrapper .ginput_complex .ginput_cardinfo_right input.ginput_card_security_code {
	max-width: 50% !important;
}

.gform_wrapper .ginput_complex .ginput_cardinfo_right span.ginput_card_security_code_icon {
	width: 32px;
	height: 23px;
	background-image: url(../images/gf-creditcard-icons.png);
	background-repeat: no-repeat;
	background-position: 0 -128px;
	position: relative;
	top: -1px;
	left: 6px;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
}

.gform_wrapper .gform_fileupload_multifile .gform_drop_area {
	padding: 25px;
	border: 2px dashed #ddd;
	text-align: center;
	color: #aaa;
	margin-bottom: 10px;
}

.right_label .gform_fileupload_multifile,
.left_label .gform_fileupload_multifile{
    margin-left: 31%;
}

.gform_delete{
    vertical-align:middle;
    cursor:pointer;
}

/* fix recaptcha line height issue ------------------------------------------------------*/

body #content .entry-content .gform_wrapper form .gform_body .gform_fields .gfield .ginput_container #recaptcha_widget_div #recaptcha_area .recaptchatable tbody tr td .recaptcha_input_area,
body .gform_wrapper form .gform_body .gform_fields .gfield .ginput_container #recaptcha_widget_div #recaptcha_area .recaptchatable tbody tr td .recaptcha_input_area {
	line-height: 1em !important;
}
				.buy-modal label {
			color: #5086ac;
			font-size: 1em;
		}

		.buy-modal input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="month"], input[type="week"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], input[type="color"], textarea {
			color: #5086ac;
			border: 2px solid #5086ac;
			height: 2.9375rem;
			margin: 0 0 0 0;

		}
		.buy-modal select {
			height: 2.962rem;
		}

		.gform_wrapper ul li.gfield {
			/*float: left;*/
		}

		.gform_wrapper textarea.medium {
			height: 1.9375rem;
		}

		.gform_wrapper .top_label input.medium, .gform_wrapper .top_label select.medium {
			width: 100%;
		}

		.buy-modal select {
			border: 2px solid #5086ac;
			background-color: #fff;
			color: #5086ac;
			text-align: center;
			/*margin: 0 0 0.375rem 0;*/
		}

		.product_totals {
			display: none;
		}


		.buy-modal .gform_wrapper select {
			color: #5086ac;
			text-align: center;
			font-size: 1.3em;
			padding: 0% 5%;
		}

		.buy-modal .gform_wrapper{
			max-width: 100%;
		}

		.reveal-modal  {
			margin-top: -60px;
		}
	</style>
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
