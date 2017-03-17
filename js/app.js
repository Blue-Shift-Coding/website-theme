// CREATED BY LOGO
$(document).foundation();

$('#basic-height-btn').click(function() {
  $('#basic-height-content').cssAnimateAuto();
});

$(function() {

  var colors = new Array(
    [47,75,158],
    [79,238,199],
    [103,175,176],
    [90,151,172],
    [75,125,167],
    [60,99,163],
    [47,75,158]
    );
   
  var step = 0;
  //color table indices for: 
  // current color left
  // next color left
  // current color right
  // next color right
  var colorIndices = [0,1,2,3];

  //transition speed
  var gradientSpeed = 0.005;

  function updateGradient()
  {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "#"+((r1 << 16) | (g1 << 8) | b1).toString(16);

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "#"+((r2 << 16) | (g2 << 8) | b2).toString(16);

   $('#gradient').css({
     background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
      background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
    
    step += gradientSpeed;
    if ( step >= 1 )
    {
      step %= 1;
      colorIndices[0] = colorIndices[1];
      colorIndices[2] = colorIndices[3];
      
      //pick two new target color indices
      //do not pick the same as the current one
      colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
      colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
      
    }
  }

    updateGradient();
  // setInterval(updateGradient,10);
});

$(function() {
         
   
    $('.fade-container').hover(function() {
      $( this ).find('.fade-2').animate({"opacity": 0.0}, 0);
      $( this ).find('.caption-2').addClass( "pattern" );
      $( this ).find('.caption-2').animate({"opacity": 1}, 0);
      $( this ).find('.caption-2').animate({"z-index": 1}, 0);          
    },

    function(){
      $( this ).find('.fade-2').animate({"opacity": 1}, 0);
      $( this ).find('.caption-2').animate({"opacity": 0}, 0);
      $( this ).find('.caption-2').removeClass( "pattern" );
    }
  );
          
});

function checkWidth(init)
{
    if ($(window).width() < 967) {
        $( ".border" ).removeClass( "fade-2" )
    }
    else {
        if (!init) {
            $( ".border" ).addClass( "fade-2" )
        }
    }
}

$(document).ready(function() {
    checkWidth(true);

    $(window).resize(function() {
        checkWidth(false);
    });
});




function sticky_relocate() {
    // var window_top = $(window).scrollTop();
    // if($('#sticky-anchor').length > 0) {
    //     var div_top = $('#sticky-anchor').offset().top;
    //     if (window_top > div_top) {
    //         $('.blog-stuck').addClass('stick');
    //         // $('.blog-stuck-2').addClass('stick-2');
    //     } else {
    //         $('.blog-stuck').removeClass('stick');
    //         // $('.blog-stuck-2').removeClass('stick-2');
    //     }
    // }

}



$(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});

$('a[href^="#"]').on('click', function(event) {

    var target = $( $(this).attr('href') );

    if( target.length ) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top-100
        }, 700);
    }

});

// $("#button").click(function() {
//     $('html, body').animate({
//         scrollTop: $("#about").offset().top
//     }, 0);
// });

$('#mce-EMAIL').click(function(e){    
    // $('#mc-embedded-subscribe').fadeIn('fast', function(){
    //     $('input[type="email"]').animate({width: "80%"}, 500)
    // });

$('input[type="email"]').animate({width: "70%"}, 500, function(){
        $('#mc-embedded-subscribe').fadeIn('fast');
    });

});

/* FOR jQuery WITH THE BUTTON I THINK IT IS EITHER THIS ------------ */


$("#modalLauncher").click(function (e) {
    $('#myModal').foundation('reveal', 'open');
});


/* OR THIS ---------------*/

$('a.reveal-modal').trigger('onsubmit');

/* This is the function code under this line */
(function($) {

/*---------------------------
 Defaults for Reveal
----------------------------*/
   
/*---------------------------
 Listener for data-reveal-id attributes
----------------------------*/

  // $('input[data-reveal-id]').live('click', function(e) {
  //       e.preventDefault();
  //       var modalLocation = $(this).attr('data-reveal-id');
  //       $('#'+modalLocation).reveal($(this).data());
  //   });

/*---------------------------
 Extend and Execute
----------------------------*/

    $.fn.reveal = function(options) {
        
        
        var defaults = {  
        animation: 'fadeAndPop', //fade, fadeAndPop, none
        animationspeed: 300, //how fast animtions are
        closeonbackgroundclick: true, //if you click background will modal close?
        dismissmodalclass: 'close-reveal-modal' //the class of a button or element that will close an open modal
      }; 
      
        //Extend dem' options
        var options = $.extend({}, defaults, options); 
  
        return this.each(function() {
        
/*---------------------------
 Global Variables
----------------------------*/
          var modal = $(this),
            topMeasure  = parseInt(modal.css('top')),
        topOffset = modal.height() + topMeasure,
              locked = false,
        modalBG = $('.reveal-modal-bg');

/*---------------------------
 Create Modal BG
----------------------------*/
      if(modalBG.length == 0) {
        modalBG = $('<div class="reveal-modal-bg" />').insertAfter(modal);
      }       
     
/*---------------------------
 Open & Close Animations
----------------------------*/
      //Entrance Animations
      modal.bind('reveal:open', function () {
        modalBG.unbind('click.modalEvent');
        $('.' + options.dismissmodalclass).unbind('click.modalEvent');
        if(!locked) {
          lockModal();
          if(options.animation == "fadeAndPop") {
            modal.css({'top': $(document).scrollTop()-topOffset, 'opacity' : 0, 'visibility' : 'visible'});
            modalBG.fadeIn(options.animationspeed/2);
            modal.delay(options.animationspeed/2).animate({
              "top": $(document).scrollTop()+topMeasure + 'px',
              "opacity" : 1
            }, options.animationspeed,unlockModal());         
          }
          if(options.animation == "fade") {
            modal.css({'opacity' : 0, 'visibility' : 'visible', 'top': $(document).scrollTop()+topMeasure});
            modalBG.fadeIn(options.animationspeed/2);
            modal.delay(options.animationspeed/2).animate({
              "opacity" : 1
            }, options.animationspeed,unlockModal());         
          } 
          if(options.animation == "none") {
            modal.css({'visibility' : 'visible', 'top':$(document).scrollTop()+topMeasure});
            modalBG.css({"display":"block"}); 
            unlockModal()       
          }
        }
        modal.unbind('reveal:open');
      });   

      //Closing Animation
      modal.bind('reveal:close', function () {
        if(!locked) {
          lockModal();
          if(options.animation == "fadeAndPop") {
            modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
            modal.animate({
              "top":  $(document).scrollTop()-topOffset + 'px',
              "opacity" : 0
            }, options.animationspeed/2, function() {
              modal.css({'top':topMeasure, 'opacity' : 1, 'visibility' : 'hidden'});
              unlockModal();
            });         
          }   
          if(options.animation == "fade") {
            modalBG.delay(options.animationspeed).fadeOut(options.animationspeed);
            modal.animate({
              "opacity" : 0
            }, options.animationspeed, function() {
              modal.css({'opacity' : 1, 'visibility' : 'hidden', 'top' : topMeasure});
              unlockModal();
            });         
          }   
          if(options.animation == "none") {
            modal.css({'visibility' : 'hidden', 'top' : topMeasure});
            modalBG.css({'display' : 'none'});  
          }   
        }
        modal.unbind('reveal:close');
      });     
    
/*---------------------------
 Open and add Closing Listeners
----------------------------*/
          //Open Modal Immediately
      modal.trigger('reveal:open')
      
      //Close Modal Listeners
      var closeButton = $('.' + options.dismissmodalclass).bind('click.modalEvent', function () {
        modal.trigger('reveal:close')
      });
      
      if(options.closeonbackgroundclick) {
        modalBG.css({"cursor":"pointer"})
        modalBG.bind('click.modalEvent', function () {
          modal.trigger('reveal:close')
        });
      }
      $('body').keyup(function(e) {
            if(e.which===27){ modal.trigger('reveal:close'); } // 27 is the keycode for the Escape key
      });
      
      
/*---------------------------
 Animations Locks
----------------------------*/
      function unlockModal() { 
        locked = false;
      }
      function lockModal() {
        locked = true;
      } 
      
        });//each call
    }//orbit plugin call
})(jQuery);
        




/*VALIDATION SCRIPT */
$(document).ready(function () {
    $('#myform').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true,
                minlength: 5
            },
        },
        submitHandler: function (form) { // for demo
            $('#myModal').foundation('reveal', 'open');
            return false; // for demo
            
        },
        messages:{ email: "please enter valid email"}

    });
})

