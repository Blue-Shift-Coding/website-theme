<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

  <?php
    /**
     * woocommerce_before_main_content hook
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     */
    do_action( 'woocommerce_before_main_content' );
  ?>
  

<!--    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    <div class="row blog-title">
      <h1 class="text-center" style="border: 2px #fff solid;"><?php woocommerce_page_title(); ?></h1>
    </div>
    <?php endif; ?>
 -->
    <div id="content-shop" class="row">


      <div class="large-3 medium-12 small-12 columns">
        <div id="sticky-anchor"></div>
        <div class="small-12 columns community-widget-1 blog-stuck">
          <?php get_sidebar('homepage'); ?>
        </div>
      </div>

      <div class="small-12 medium-9 columns products">
        <!-- <?php do_action( 'woocommerce_archive_description' ); ?> -->
        <?php if ( have_posts() ) : ?>
          <?php woocommerce_product_loop_start(); ?>
            <?php woocommerce_product_subcategories(); ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <?php wc_get_template_part( 'content', 'product' ); ?>
            <?php endwhile; // end of the loop. ?>
          <?php woocommerce_product_loop_end(); ?>
          <?php
            /**
             * woocommerce_after_shop_loop hook
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action( 'woocommerce_after_shop_loop' );
          ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

          <?php wc_get_template( 'loop/no-products-found.php' ); ?>

        <?php endif; ?>
      </div>

      

    </div>

  <?php
    /**
     * woocommerce_after_main_content hook
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );
  ?>

  <?php
    /**
     * woocommerce_sidebar hook
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    do_action( 'woocommerce_sidebar' );


  ?>

  
<?php get_footer( 'shop' ); ?>