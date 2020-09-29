
jQuery(document).ready(function($){


  

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
      
    };

  
     if ($('input#mailer-type-gmail').is(':checked')) {
      $("#gmail-settings-id").show();
      $("#gmail-settings-label").show();
      $("#smtp-settings-id").hide();
      $("#microsoft-settings-id").hide();
      $("#smtp-settings-label").hide();
      $("#microsoft-settings-label").hide();
      $("#default-settings-label").hide();
      $("#default-settings-id").hide();

  
    };

   
      if ($('input#mailer-type-microsoft').is(':checked')) {
      $("#microsoft-settings-id").show();
      $("#microsoft-settings-label").show();
      $("#smtp-settings-id").hide();
      $("#gmail-settings-id").hide();
      $("#gmail-settings-label").hide();
      $("#smtp-settings-label").hide();
      $("#default-settings-label").hide();
      $("#default-settings-id").hide();

  
    };


  
      if ($('input#mailer-type-default').is(':checked')) {
          $("#default-settings-id").show();
      $("#default-settings-label").show();
      $("#smtp-settings-id").hide();
      $("#gmail-settings-id").hide();
      $("#gmail-settings-label").hide();
      $("#smtp-settings-label").hide();
       $("#microsoft-settings-id").hide();
       $("#microsoft-settings-label").hide();

  
    };
    
    
    
             $('#mailer-type-smtp').click(function(){
              $("#smtp-settings-id").show();
              $("#smtp-settings-label").show();
              $("#gmail-settings-id").hide();
              $("#microsoft-settings-id").hide();
              $("#gmail-settings-label").hide();
              $("#microsoft-settings-label").hide();
              $("#default-settings-label").hide();
              $("#default-settings-id").hide();


          
            });
            
            $('#mailer-type-gmail').click(function(){
              $("#gmail-settings-id").show();
              $("#gmail-settings-label").show();
              $("#smtp-settings-id").hide();
              $("#microsoft-settings-id").hide();
              $("#smtp-settings-label").hide();
              $("#microsoft-settings-label").hide();
              $("#default-settings-label").hide();
              $("#default-settings-id").hide();

          
            });
            
            
             $('#mailer-type-microsoft').click(function(){
              $("#microsoft-settings-id").show();
              $("#microsoft-settings-label").show();
              $("#smtp-settings-id").hide();
              $("#gmail-settings-id").hide();
              $("#gmail-settings-label").hide();
              $("#smtp-settings-label").hide();
              $("#default-settings-label").hide();
              $("#default-settings-id").hide();

          
            });
            
            $('#mailer-type-default').click(function(){
              $("#default-settings-label").show();
              $("#default-settings-id").show();
              $("#smtp-settings-id").hide();
              $("#gmail-settings-id").hide();
              $("#gmail-settings-label").hide();
              $("#smtp-settings-label").hide();
               $("#microsoft-settings-id").hide();
               $("#microsoft-settings-label").hide();

          
            });




            $("#kau-from-email").change(function(){

              var smtpEmail = $('#kau-from-email').val();
              
             
             if(IsEmail(smtpEmail)==false ){
                 $('#kau-invalid-msg').show();
                 $('#kau-from-email').css('border-color', 'red');
                 return false;
             }

             if(IsEmail(smtpEmail)==true ){

             
              $('#kau-invalid-msg').hide();
              $('#kau-valid-msg').show();
                 $('#kau-from-email').css('border-color', 'green');
                 return false;


             }
            





            });


            function IsEmail(smtpEmail) {

              
              var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

              return $.trim(smtpEmail).match(pattern) ? true : false;
            }



    
});

  