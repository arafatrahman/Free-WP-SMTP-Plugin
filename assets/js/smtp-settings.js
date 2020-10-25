
jQuery(document).ready(function ($) {




    /* mailer CheckBox js */

    $("#gmail-settings-id").hide();

   


    if ($('input#mailer-type-gmail').is(':checked')) {
        $("#gmail-settings-id").show();
        $("#gmail-settings-label").show();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();
        $("#mailgun-settings-id").hide();
        $("#mailgun-settings-label").hide();
        $("#zohomail-settings-id").hide();
        $("#zohomail-settings-label").hide();

    }
    ;


    if ($('input#mailer-type-microsoft').is(':checked')) {
        $("#microsoft-settings-id").show();
        $("#microsoft-settings-label").show();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();
        $("#mailgun-settings-id").hide();
        $("#mailgun-settings-label").hide();
        $("#zohomail-settings-id").hide();
        $("#zohomail-settings-label").hide();

    }
    ;

    if ($('input#mailer-type-mailgun').is(':checked')) {
        $("#mailgun-settings-id").show();
        $("#mailgun-settings-label").show();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#zohomail-settings-id").hide();
        $("#zohomail-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();


    }
    ;

    
    if ($('input#mailer-type-zohomail').is(':checked')) {


        $("#zohomail-settings-id").show();
        $("#zohomail-settings-label").show();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#mailgun-settings-id").hide();
        $("#mailgun-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();
    }
    ;
   
    

    if ($('input#mailer-type-default').is(':checked')) {
        $("#default-settings-id").show();
        $("#default-settings-label").show();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();
        $("#mailgun-settings-id").hide();
        $("#mailgun-settings-label").hide();
        $("#zohomail-settings-id").hide();
        $("#zohomail-settings-label").hide();

    }
    ;



  

    $('#mailer-type-gmail').click(function () {
        $("#gmail-settings-id").show();
        $("#gmail-settings-label").show();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();
        $("#mailgun-settings-id").hide();
        $("#mailgun-settings-label").hide();
        $("#zohomail-settings-id").hide();
        $("#zohomail-settings-label").hide();

    });


    $('#mailer-type-microsoft').click(function () {
        $("#microsoft-settings-id").show();
        $("#microsoft-settings-label").show();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();
        $("#mailgun-settings-id").hide();
        $("#mailgun-settings-label").hide();
        $("#zohomail-settings-id").hide();
        $("#zohomail-settings-label").hide();

    });
    
        $('#mailer-type-mailgun').click(function () {
        $("#mailgun-settings-id").show();
        $("#mailgun-settings-label").show();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();
        $("#zohomail-settings-id").hide();
        $("#zohomail-settings-label").hide();
        

    });

     $('#mailer-type-zohomail').click(function () {
        $("#zohomail-settings-id").show();
        $("#zohomail-settings-label").show();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#mailgun-settings-id").hide();
        $("#mailgun-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();

    });


    $('#mailer-type-default').click(function () {
        $("#default-settings-label").show();
        $("#default-settings-id").show();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();
        $("#mailgun-settings-id").hide();
        $("#mailgun-settings-label").hide();
        $("#zohomail-settings-id").hide();
        $("#zohomail-settings-label").hide();

    });



    /* mailer CheckBox close Here */


    /* Email testing validation Start */



    $("#recipient-email").change(function () {


        var smtpEmail = $('#recipient-email').val();


        if (IsEmail(smtpEmail) == false) {

            $('#kau-testing-invalid-msg').show();
            $('#kau-testing-empty-msg').hide();
            $('#kau-testing-valid-msg').hide();
            $('#recipient-email').css('border-color', 'red');
            return false;
        }

        if (IsEmail(smtpEmail) == true) {

            $('#kau-testing-valid-msg').show();
            $('#kau-testing-invalid-msg').hide();
            $('#kau-testing-empty-msg').hide();
            $('#kau-testing-invalid-msg').hide();
            $('#kau-from-email').css('border-color', 'green');
            return false;
        }

        return true;
    });




    $('#retcipient-email').blur(function () {
        if ($(this).val()) {
            $('#kau-testing-empty-msg').hide();
            $('#retcipient-email').css('border-color', 'green');
        }
    });






    /* Email testing validation Close Here */




    /* SMTP Settings Here */

    $('#kau-from-name').blur(function () {
        if ($(this).val()) {
            $('#kau-from-name-empty').hide();
            $('#kau-from-name').css('border-color', 'green');
        }
    });

    $("#kau-from-email").change(function () {

        var smtpEmail = $('#kau-from-email').val();


        if (IsEmail(smtpEmail) == false) {
            $('#kau-invalid-msg').show();
            $('#kau-valid-msg').hide();
            $('#kau-from-email-empty').hide();
            $('#kau-from-email').css('border-color', 'red');
            return false;
        }

        if (IsEmail(smtpEmail) == true) {

            $('#kau-invalid-msg').hide();
            $('#kau-from-email-empty').hide();
            $('#kau-valid-msg').show();
            $('#kau-from-email').css('border-color', 'green');
            return false;
        }

    });
    
    
    


    
    $('#kau_smtp_settings_save').click(function() {

        
        
        
       if($('#mailer-type-gmail').is(':checked')) { 
        $("input[name='gmail-client-id']").attr("required","required");
        $("input[name='gmail-client-secret']").attr("required","required");
        }
       
       if($('#mailer-type-sendinblue').is(':checked')) { 
        $("input[name='kau-sendinblue-api-key']").attr("required","required");
        
       
       }
       
       if($('#mailer-type-zohomail').is(':checked')) { 
        $("input[name='kau-zohomail-client-id']").attr("required","required");
        $("input[name='kau-zohomail-client-secret']").attr("required","required");
       
       }
        
       if($('#mailer-type-microsoft').is(':checked')) { 
        $("input[name='ms-client-id']").attr("required","required");
        $("input[name='ms-client-secret']").attr("required","required");
       
       }
        
       if($('#mailer-type-default').is(':checked')) { 
           
           $("#kau-username-smtp").change(function () {

        var smtpEmail = $('#kau-username-smtp').val();


        if (IsEmail(smtpEmail) == false) {
          
            $('#kau-invalid-email').show();
            $('#kau-valid-email').hide();
            $('#kau-username-smtp').css('border-color', 'red');
            return false;
        }

        else if (IsEmail(smtpEmail) == true) {
           
            $('#kau-valid-email').show();
            $('#kau-invalid-email').hide();
            $('#kau-username-smtp').css('border-color', 'green');
            return false;
        }

    });
        $("input[name='kau-smtp-host']").attr("required","required");
        $("input[name='kau-smtp-authorization-smtp']").attr("required","required");
        $("input[name='kau-username-smtp']").attr("required","required");
        $("input[name='kau-password-smtp']").attr("required","required");
        $("input[name='kau-port-smtp']").attr("required","required");
       }
    
    
    });


    /* SMTP Settings Close Here */
    
    
    
    /*
    $('input[name="mailer-types"]:checked').change(function () {
        var mailerTypes = $("input[name='mailer-types']:checked").val();
        if(mailerTypes == "4"){
            
            $("input[name='kau-smtp-host']").attr("required","required");
             $("input[name='kau-smtp-host']").css('border-color', 'red');
        }
    });*/







    function IsEmail(smtpEmail) {


        var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        return $.trim(smtpEmail).match(pattern) ? true : false;
    }



});

  