
jQuery(document).ready(function ($) {




    /* mailer CheckBox js */

    $("#gmail-settings-id").hide();

    if ($('input#mailer-type-smtp').is(':checked')) {


        $("#smtp-settings-id").show();
        $("#smtp-settings-label").show();
        $("#gmail-settings-id").hide();
        $("#microsoft-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#microsoft-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();

    }
    ;


    if ($('input#mailer-type-gmail').is(':checked')) {
        $("#gmail-settings-id").show();
        $("#gmail-settings-label").show();
        $("#smtp-settings-id").hide();
        $("#microsoft-settings-id").hide();
        $("#smtp-settings-label").hide();
        $("#microsoft-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();


    }
    ;


    if ($('input#mailer-type-microsoft').is(':checked')) {
        $("#microsoft-settings-id").show();
        $("#microsoft-settings-label").show();
        $("#smtp-settings-id").hide();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#smtp-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();


    }
    ;



    if ($('input#mailer-type-default').is(':checked')) {
        $("#default-settings-id").show();
        $("#default-settings-label").show();
        $("#smtp-settings-id").hide();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#smtp-settings-label").hide();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();


    }
    ;



    $('#mailer-type-smtp').click(function () {
        $("#smtp-settings-id").show();
        $("#smtp-settings-label").show();
        $("#gmail-settings-id").hide();
        $("#microsoft-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#microsoft-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();



    });

    $('#mailer-type-gmail').click(function () {
        $("#gmail-settings-id").show();
        $("#gmail-settings-label").show();
        $("#smtp-settings-id").hide();
        $("#microsoft-settings-id").hide();
        $("#smtp-settings-label").hide();
        $("#microsoft-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();


    });


    $('#mailer-type-microsoft').click(function () {
        $("#microsoft-settings-id").show();
        $("#microsoft-settings-label").show();
        $("#smtp-settings-id").hide();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#smtp-settings-label").hide();
        $("#default-settings-label").hide();
        $("#default-settings-id").hide();


    });

    $('#mailer-type-default').click(function () {
        $("#default-settings-label").show();
        $("#default-settings-id").show();
        $("#smtp-settings-id").hide();
        $("#gmail-settings-id").hide();
        $("#gmail-settings-label").hide();
        $("#smtp-settings-label").hide();
        $("#microsoft-settings-id").hide();
        $("#microsoft-settings-label").hide();


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



    $('#email-subject').blur(function () {
        if ($(this).val()) {
            $('#kau-testing-empty-sub').hide();
            $('#email-subject').css('border-color', 'green');
        }
    });
    $('#retcipient-email').blur(function () {
        if ($(this).val()) {
            $('#kau-testing-empty-msg').hide();
            $('#retcipient-email').css('border-color', 'green');
        }
    });
    $('#email-body').blur(function () {
        if ($(this).val()) {
            $('#kau-testing-empty-body').hide();
            $('#email-body').css('border-color', 'green');
        }
    });


    $('#emailTestingSubmit').click(function () {

        var recipientEmail = $('#recipient-email').val();
        var emailSubject = $('#email-subject').val();
        var emailBody = $('#email-body').val();



        if (emailSubject == '') {
            $('#kau-testing-empty-sub').show();
            $('#email-subject').css('border-color', 'red');
            return false;
        } else if (emailBody == '') {

            $('#kau-testing-empty-body').show();
            $('#email-body').css('border-color', 'red');
            return false;
        } else if (recipientEmail == '') {
            $('#kau-testing-empty-msg').show();
            $('#kau-testing-invalid-msg').hide();
            $('#recipient-email').css('border-color', 'red');
            return false;
        }

        return true;


    });
    
    
    /* Email testing validation Close Here */
    
    
    
    
  /* SMTP Settings Here */
  
    $('#kau-from-name').blur(function () {
        if ($(this).val()) {
            $('#kau-from-name-empty').hide();
            $('#kau-from-name').css('border-color', 'green');
        }
    });
    $('#kau-from-email').blur(function () {
        if ($(this).val()) {
            $('#kau-from-email-empty').hide();
            $('#kau-from-email').css('border-color', 'green');
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
            $('#kau-valid-msg').show();
            $('#kau-from-email').css('border-color', 'green');
            return false;
        }

    });
    
        $('#kau_smtp_settings_save').click(function () {

        $('#kau-settings-save-alert').show();
        
        var formEmail = $('#kau-from-email').val();
        var formName = $('#kau-from-name').val();
        



        if (formEmail == '') {
            $('#kau-from-email-empty').show();
            $('#kau-invalid-msg').hide();
            $('#kau-from-email').css('border-color', 'red');
            return false;
        } else if (formName == '') {

            $('#kau-from-name-empty').show();
            $('#kau-from-name').css('border-color', 'red');
            return false;
        }
        
        return true;


    });


    /* SMTP Settings Close Here */
    
    

    function IsEmail(smtpEmail) {


        var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

        return $.trim(smtpEmail).match(pattern) ? true : false;
    }



});

  