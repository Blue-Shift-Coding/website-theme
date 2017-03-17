<?php

  $emailSent = false;
  $errors = array();

  if($_POST) {


    // Send an email with a link to access the resource
    $email = $_POST['email'];

    // Validate the email address
    if(!$email) {
      $errors['email.required'] = 'Please enter your email address';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email.email'] = 'Please enter a valid email address';
    }

    if(count($errors) == 0) {
      $token = wp_generate_password(64, false);

      $post = wp_insert_post(array('post_type' => 'resource-auth', 'post_status' => 'publish'));
      update_post_meta($post, 'email', $email);
      update_post_meta($post, 'token', $token);

      $url = site_url('/resources') . "?token=$token";

      $message = "You have requested to access the Blueshift resources, please click to the link below to continue\r\n\r\n$url";

      wp_mail($email, "Resources access", $message);

      $emailSent = true;
    }

  }

  if(isset($_GET['token'])) {
    // User has come from the email, lookup the token and set the cookie
    $token = $_GET['token'];

    $posts = get_posts(array(
      'post_type' => 'resource-auth',
      'numberposts' => 1,
      'meta_key' => 'token',
      'meta_value' => $token,
    ));

    if(count($posts) > 0) {
      // Token found, set a cookie and redirect back
      setcookie('resource_cookie', $token, mktime(0, 0, 0, 1, 1, 2020));
      header("Location: " . site_url('/resources'));
      exit();
    }
  }

?>

<?php /*
* Template Name: Resources Page
*/
?>

<?php get_header(); ?>
<div class="row blog-title" style="margin-top:2%;">
  <h1> <?php the_title();?> </h1>

</div>



    <?php

    // Get the cookie and make sure the token is available in the resource auth custom post type
    $cookie = $_COOKIE['resource_cookie'];
    $displaySignup = false;

    if(!$cookie) $displaySignup = true;

    if($cookie) {
      $posts = get_posts(array(
          'post_type' => 'resource-auth',
          'numberposts' => 1,
          'meta_key' => 'token',
          'meta_value' => $token,
      ));

      if(count($posts) == 0) $displaySignup = true;

    }

    ?>

    <?php if($displaySignup): ?>

        <style type="text/css">

          #resources-signup {
            background: white;
          }

          #resources-signup input[type=text] {
            border: 1px solid black;
            color: black;
          }

          #resources-signup button {

          }

        </style>

<div class="row">
  <div class="small-12 columns products">

        <form id="resources-signup" method="post">

          <?php if($emailSent): ?>

              <p style="text-align: center; padding: 20px 0px;">Thank you. You have been sent an email with a link to access the resources.</p>
					<?php else: ?>
							<p style="text-align: center; padding: 20px 0px;">Please enter a valid email address to access the resources.</p>
          <?php endif; ?>

          <p style="text-align: center;"><input type="text" name="email" value="" placeholder="Email Address" style=" width: 50%; display: inline-block;" /></p>

          <?php if(count($errors) > 0): ?>
            <div><?php echo array_values($errors)[0]; ?></div>
          <?php endif; ?>
					<p style="text-align: center;">
          	<button type="submit" style="display: inline-block;">Access Resources</button>
          </p>
        </form>

  </div>
</div>

    <?php else: ?>

<div class="row">
  <div class="small-9 columns products">

      <?php
      $resource_args = array( 'post_type' => 'resource-page', 'posts_per_page' => 10 );
      $resource_loop = new WP_Query( $resource_args );
      $i = 1;
      while ( $resource_loop->have_posts() ) : $resource_loop->the_post();
        ?>
        <div class="small-12 medium-6 large-4 columns">
          <div class="blog-tile-category">
            <div class="small-12 columns text-center">
              <h2 style="font-size: 1.4em;"><?php the_title()?></h2>
            </div>
            <?php if( get_field('resource_image') ): ?>

              <img src="<?php the_field('resource_image'); ?>" />

            <?php endif; ?>

            <p style="padding: 2%; font-size: 0.8em;"><?php the_field('resource_text'); ?></p>

            <a href="#" data-reveal-id="myModal<?php echo $i;?>" class="button large-6 large-offset-3">View</a>

            <div id="myModal<?php echo $i;?>" class="reveal-modal" data-reveal>
              <h2 style="color: #008cba;"><?php echo the_title();?></h2>
              <?php echo the_content();?>
              <a class="close-reveal-modal">&#215;</a>
            </div>
          </div>
        </div>
        <?php $i++; ?>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>

  </div>

</div>


    <?php endif; ?>






<?php get_footer(); ?>

