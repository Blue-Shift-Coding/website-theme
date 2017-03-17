$(function() {

    // Mailchimp submit
    $('#mailchimp-form').submit(function(e) {
        var url = $(this).attr('action');
        var $input = $(this).find('input[type="text"]');
        var email = $input.val();

        $.ajax({
            url: url,
            type: 'post',
            data: {
                email: email
            },
            success: function(response) {
                if(response == 'OK') {
                    $input.val('');
                    $('.custom-modal-dialog').removeClass('hide');
                }
            }
        });

        e.preventDefault();
    });

    $('.custom-modal-dialog').click(function() {
        $(this).addClass('hide');
    });


});