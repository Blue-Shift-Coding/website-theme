    <footer>
      <div class="row footer-container">
        <div>
          <section class="social">
            <strong>Follow us:</strong>
            <a href="https://www.facebook.com/blueshiftcoding" target="_blank"><img width="20" src="/wp-content/themes/blueshift/images/facebook-icon.png"> Facebook</a>
            <a href="https://twitter.com/blueSHIFTcoding" target="_blank"><img width="20" src="/wp-content/themes/blueshift/images/twitter-icon.png"> Twitter</a>
          </section>
          <section class="contact-us">
            <strong>Contact us:</strong>
            <a href="mailto:hello@blueshiftcoding.com"><img width="20" src="/wp-content/themes/blueshift/images/mail-icon.png"> hello@blueshiftcoding.com</a>
            <a><img src="/wp-content/themes/blueshift/images/phone.png" width="20"> 0203 176 4660</a>
          </section>
        </div>
        <div>
          <nav>
            <a href="/news">News</a>
            <a href="/jobs">Jobs</a>
            <a href="/faqs">FAQs</a>
            <a href="/terms-conditions">Ts and Cs</a>
          </nav>
        </div>
        <div>
          <a>Kids Get Coding:</a><br/>
          <a>Companion site to books</a>

          <div class="book-covers">
            <div class="book"><a href="/kidsgetcoding/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/book-1.jpg" /></a></div>
            <div class="book"><a href="/kidsgetcoding/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/book-2.jpg" /></a></div>
            <div class="book"><a href="/kidsgetcoding/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/book-3.jpg" /></a></div>
          </div>
        </div>
        <div class="signup-form">
          <form id="mailchimp-form" type="post" action="<?php echo admin_url('admin-ajax.php'); ?>?action=mailchimp">
            <strong>Join our mailing list:</strong>
            <input type="text" placeholder="enter email" name="email"/>
            <button type="submit">Sign me up!</button>
          </form>
        </div>
      </div>
    </footer>

    <div class="footer-blue">
      <p>blue{shift}: Studio 36, Great Western Studios, Alfred Road, London, W2 5EU</p>
    </div>

  <div> <!-- container -->

  <div id="contactModal" class="reveal-modal email-modal" data-reveal>
    <h2>Email:</h2>
    <h2><a href="mailto:hello@blueshiftcoding.com" style="text-decoration: underline;">hello@blueshiftcoding.com</a></h2>
    <br>
    <h2>Address:</h2>
		<h2>Studio 36</h2>
		<h2>Great Western Studios</h2>
		<h2>Alfred Road</h2>
		<h2>London</h2>
		<h2>W2 5EU</h2>
    <h2>Telephone:</h2>
    <h2>02031764660</h2>
    <a class="close-reveal-modal">&#215;</a>
  </div>

  <script src="<?php echo get_template_directory_uri(); ?>/bower_components/foundation/js/foundation.min.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/js/carhartl-jquery-cookie-92b7715/jquery.cookie.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/rem.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cssAnimateAuto.min.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/pathLoader.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/ie10.js"></script>

  <style type="text/css">
      /*PROCESSING*/

      p.bw{
      cursor: pointer;
      display:inline-block;
      position: relative;
      text-align: center;
      padding:2%;

      width: 100%;
      border:2px solid #5086ac;
      /*font-size: 11px;*/
      border-radius: 3px;
      font-family: "LLBrownWeb-Regular";
      color:#999;
    }

    .bw [class*="genericon"] {
      display: inline-block;
      width: auto;
      height: 16px;
      font-size: 1.5em;
      -webkit-font-smoothing: antialiased;
      font-family: "LLBrownWeb-Regular";
      text-decoration: inherit;
      font-weight: normal;
      font-style: normal;
      vertical-align: top;
    }

    .bw .show:before{
      cursor: pointer;
      /*font-family: 'Genericons';*/
       content: none;
      display: inline-block;
      margin-right:5px;
      position: relative;
      top:2px;

    }

    :not(pre) > code[class*="language-"],
      pre[class*="language-"] {
         background: #ffffff;  /* the refresh color */
         border:2px solid #5086ac;
      }

  .bw .hide:before{
    cursor: pointer;
    /*font-family: 'Genericons'; */
    content: none;
    display: inline-block;
    margin-right:5px;
    position: relative;
    top:2px;
  }

  .clear {
    clear: both;
  }

  canvas.p5js {
    width: 80%;
    margin: 0 auto;
  }
  :focus {
  outline: 0!important;
  }

  .hide-class {
    display:none;
  }

  html[data-useragent*='MSIE 10.0'] body {
  background: url(http://blueshiftcoding.com/wp-content/themes/blueshift/stylesheets/images/ie8-background-01.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

html[data-useragent*='Trident/7.0'] body {
  background: url(http://blueshiftcoding.com/wp-content/themes/blueshift/stylesheets/images/ie8-background-01.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
 }


  </style>



 <!--  FOUNDATION INITIALISE -->

    <script type="text/javascript">
      $(document).foundation({
        equalizer : {
          // Specify if Equalizer should make elements equal height once they become stacked.
          equalize_on_stack: true
        },


        magellan : {
           active_class: 'active',
           threshold:0
        }


      });
    </script>



  <style type="text/css">

    .signup-form {
      padding-right: 3em;
    }

    .custom-modal-dialog {
      width: 100%;
      height: 100%;
      position: fixed;
      background: rgba(0, 0, 0, 0.7);
      top: 0;
      left: 0;
      z-index: 1000;
      justify-content: center;
      align-items: center;
      display: flex;
      opacity: 1;
    }

    .custom-modal-dialog.hide {
      display: none;
      opacity: 0;
    }

    .custom-modal-dialog_content {
      width: 400px;
      height: auto;
      padding: 20px;
      text-align: none;
      background: white;
    }

  </style>

  <div class="custom-modal-dialog hide">
    <div class="custom-modal-dialog_container">
      <div class="custom-modal-dialog_content">
        Thank you for signing up
      </div>
    </div>
  </div>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-47446175-2', 'auto');
      ga('send', 'pageview');

    </script>
  </body>
</html>
