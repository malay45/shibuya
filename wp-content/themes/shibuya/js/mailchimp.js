jQuery(function($){
    $('body').on('click', '.send-newsletter', function(e) {
        e.preventDefault();
        email = $('#email').val();
        if(isEmail(email)) {
            var data = {
                'action': 'subscribe_user',
                'email': email,
                'security': aw.security
            };
      
            $.post(aw.ajaxurl, data, function(response) {
                if (response == 200) {
                    $(".input-newsletter").prop("value", "Grazie conferma la tua iscrizione!"); 
                } else {
                    $(".input-newsletter").prop("value", response); 
                }
            });
        } else {
            $(".input-newsletter").prop("value", 'L\'email non è valida'); 
        }
    });
});
 
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}