<!DOCTYPE html>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>
    <meta name="description" content="">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/app.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/effect1.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/bower_components/modernizr/modernizr.js"></script>
    <link rel="icon" type="image/png" href="http://blueshiftcoding.com/tomblueshift/wp-content/themes/blueshift/images/logo-animation175p.png">

    <!--[if IE]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
      <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie.css" />
    <![endif]-->
    <style type="text/css">
/*      .wpmenucart-display-standard {
        position: fixed;
        bottom: 0px;
        left: 0px;
        border: 2px solid #5086ac;
        background-color: #5086ac;
        color: #fff;
      }

      i {
        color: #fff;
        background-color: #5086ac;
      }
     #wpmenucartli span.cartcontents {
        color: #fff;
        background-color: #5086ac;
      }
      #wpmenucartli span.amount {
        color: #fff;
        background-color: #5086ac;
      }
      #wpmenucartli {
        background-color: #5086ac !important;
      }
      .top-bar-section li:not(.has-form) a.wpmenucart-contents:not(.button) {
        background-color: #5086ac !important;
      }*/
    </style>

</head>


 <?php if ( is_front_page() ||  is_page ('about') || is_page('education') ) { ?>
  <!-- <body class="blog"> -->
  <body>
  <div id="gradient" style="position: fixed; opacity:1; z-index: -100;"> </div>
<?php } else { ?>
  <!-- <body>
  <div id="gradient" style="position: fixed; opacity:1; z-index: -100;"> </div> -->
  <body class="blog<?php if ( is_page ('kidsgetcoding') ) { echo ' kidsgetcoding'; }?>">
<?php } ?>



<?php if ( is_front_page() ) { ?>
  <div class="sticky">
<?php } elseif ( is_page( 'about-page' ) ) { ?>
  <div>
<?php } else { ?>

<?php } ?>



      <div class="sticky" >
      <nav class="top-bar row" data-topbar role="navigation" data-options="">
        <ul class="title-area">
          <li class="name show-for-small-only">
            <a href="http://blueshiftcoding.com" class="logo-text"> <span style="font-style:italic;">blue</span>{shift}</a>
          </li>

          <li class="toggle-topbar menu-icon"><a id="basic-height-btn" href="#"><span style="color: #5086ac;">Menu</span></a></li>
        </ul>
        <section class="top-bar-section">

          <ul id="basic-height-content" class="right">
            <?php wp_nav_menu() ?>
   <!--          <?php if ( is_user_logged_in() ) { ?>
            <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a></li>
           <?php }
           else { ?>
            <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a></li>
           <?php } ?> -->

          </ul>

          <ul class="left logo show-for-medium-up">
              <!-- <a href=""><img src="images/logo-small.png"></a> -->
              <div class="row logo-style">
                <div class="logo-image">
                  <img src="<?php print IMAGES; ?>/logo-animation175p.gif">
                </div>
                <a href="http://blueshiftcoding.com" class="logo-text">
                  <span style="font-style:italic; padding-right: 4px;">blue</span>{shift}
                </a>
              </div>
            </ul>

        </section>
      </nav>
    </div>
  </div>

  <div id="ip-container" class="ip-container">

<?php if ( is_front_page() ) { ?>
<!--   <div class="stuck-social-nav menu show-for-medium-up">
    <li> <a href=""><img src="<?php print IMAGES; ?>/mail-icon.png"> </li>
    <li> <a href=""><img src="<?php print IMAGES; ?>/twitter-icon.png"></a> </li>
    <li> <a href=""><img src="<?php print IMAGES; ?>/facebook-icon.png"></a> </li>
  </div> -->
<?php } ?>

  <!--[if !IE]><!-->


  <header class="ip-header">
    <h1 class="ip-logo">



    </h1>
    <div class="ip-loader">
      <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
        <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
        <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
      </svg>
    </div>
  </header>

  <!--<![endif]-->
      <!-- top bar -->

<?php wp_head(); ?>