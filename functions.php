<?php
define( 'TEMPPATH', get_bloginfo('stylesheet_directory'));
define( 'IMAGES', TEMPPATH. "/images"); 

add_theme_support( 'nav-menus' );
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'woocommerce' );
remove_action( 'woocommerce_product_tabs', 'woocommerce_product_reviews_tab', 30);
remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_reviews_panel', 30);

remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main' => 'Main Nav'
		)
	);
}


if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'before_widget' => '<li id="%1$s" class="widget %2$s">',
'after_widget' => '</li>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
));
}


if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Homepage Sidebar',
'id' => 'homepage-sidebar',
'description' => 'Appears as the sidebar on the custom homepage',
'before_widget' => '<li id="%1$s" class="widget %2$s">',
'after_widget' => '</li>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
)); 
} 

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);

 return $tabs;
}

/*---Move Product Title*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5 );

add_action( 'wp_head', 'mp6_override_toolbar_margin', 11 );
function mp6_override_toolbar_margin() {
	if ( is_admin_bar_showing() ) { ?>
		<style type="text/css" media="screen">
			html { margin-top: 0px !important; }
			* html body { margin-top: 0px !important; }
		</style>
	<?php }
}



/**
 * @desc Remove in all product type
 */
// function wc_remove_all_quantity_fields( $return, $product ) {
//     return true;
// }
// add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );



//* Remove Categories from WooCommerce Product Category Widget
add_filter( 'woocommerce_product_categories_widget_args', 'rv_exclude_wc_widget_categories' );
function rv_exclude_wc_widget_categories( $cat_args ) {
	$cat_args['exclude'] = array('22'); // Insert the product category IDs you wish to exclude
	return $cat_args;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// make number on checkout not required

add_filter( 'woocommerce_billing_fields', 'wc_npr_filter_phone', 10, 1 );

function wc_npr_filter_phone( $address_fields ) {
    $address_fields['billing_phone']['required'] = false;
    return $address_fields;
}





// add_action( 'wp_enqueue_scripts', 'myajax_load_jquery_form' );
 
// function myajax_load_jquery_form() {
//     wp_enqueue_script( 'jquery-form' );
// }

/*****Sidebars!******/

if ( function_exists( 'register_sidebar' ) ) {

	register_sidebar( array (
		'name' => __( 'Primary Sidebar', 'primary-sidebar' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'dir' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

if ( function_exists( 'register_sidebar_2' ) ) {

	register_sidebar_2( array (
		'name' => __( 'Product Sidebar', 'product-sidebar' ),
		'id' => 'product-widget-area',
		'description' => __( 'The product widget area', 'dir' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );

function load_jquery() {

    // only use this method is we're not in wp-admin
    if (!is_admin()) {

        // deregister the original version of jQuery
        wp_deregister_script('jquery');

        // discover the correct protocol to use
        $protocol='http:';
        if($_SERVER['HTTPS']=='on') {
            $protocol='https:';
        }

        // register the Google CDN version
        // wp_register_script('jquery', $protocol.'/bower_components/jquery/dist/jquery.min.js', false, '1.5.2');
        wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/bower_components/jquery/dist/jquery.min.js');
        // add it back into the queue
        wp_enqueue_script('jquery');

    }

}

add_action('template_redirect', 'load_jquery');

function enqueue_style_after_wc(){
    $deps = class_exists( 'WooCommerce' ) ? array( 'woocommerce-layout', 'woocommerce-smallscreen', 'woocommerce-general' ) : array();
    wp_enqueue_style( 'my-style', 'http://blueshiftcoding.com/wp-content/themes/blueshift/stylesheets/my-style.css', $deps, '1.0' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_style_after_wc' );

function improved_trim_excerpt($text) { // Fakes an excerpt if needed
  global $post;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace('\]\]\>', ']]&gt;', $text);
   $text = strip_tags($text, '<a>');
    $excerpt_length = 55;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words)> $excerpt_length) {
      array_pop($words);
      array_push($words, '...');
      $text = implode(' ', $words);
    }
  }
return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

add_action('init', 'director_rewrite');
function director_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->add_permastruct('typename', 'typename/%year%/%postname%/', true, 1);
    add_rewrite_rule('typename/([0-9]{4})/(.+)/?$', 'index.php?typename=$matches[2]', 'top');
    $wp_rewrite->flush_rules(); // !!!
}

function director_excerpt_more($more) {
		return ' <a href="'. get_permalink() .'">Continue...</a>';
}

add_filter('excerpt_more', 'director_excerpt_more', 999);

// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

// Mailchimp submit
add_action("wp_ajax_mailchimp", "mailchimp_submit");
add_action("wp_ajax_nopriv_mailchimp", "mailchimp_submit");

function mailchimp_submit(){
    echo 'OK';
    die();
}


add_action('init', 'mailchimp_init');

function mailchimp_init() {
    wp_register_script('mailchimp-form', get_template_directory_uri() . '/js/mailchimp-form.js', array('jquery'));
    wp_enqueue_script('mailchimp-form');
}

add_action( 'init', 'resource_cpt' );

function resource_cpt() {

    register_post_type( 'resource-auth', array(
        'labels' => array(
            'name' => 'Resource Auth',
            'singular_name' => 'Resource Auth',
        ),
        'description' => 'resource-auth',
        'public' => false,
        'menu_position' => 20
    ));
}

?>