function my_js_function() 
{
     jQuery.ajax({
     url: my_ajax_script.ajaxurl,
     data: ({action : 'get_my_option'}),
     success: function() {
      //Do stuff here
     }
     });
}