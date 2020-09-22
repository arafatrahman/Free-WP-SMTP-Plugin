
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
      
    };

  
     if ($('input#mailer-type-gmail').is(':checked')) {
      $("#gmail-settings-id").show();
      $("#gmail-settings-label").show();
      $("#smtp-settings-id").hide();
      $("#microsoft-settings-id").hide();
      $("#smtp-settings-label").hide();
      $("#microsoft-settings-label").hide();
      $("#default-settings-label").hide();

  
    };

   
      if ($('input#mailer-type-microsoft').is(':checked')) {
      $("#microsoft-settings-id").show();
      $("#microsoft-settings-label").show();
      $("#smtp-settings-id").hide();
      $("#gmail-settings-id").hide();
      $("#gmail-settings-label").hide();
      $("#smtp-settings-label").hide();
      $("#default-settings-label").hide();

  
    };


  
      if ($('input#mailer-type-default').is(':checked')) {
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


          
            });
            
            $('#mailer-type-gmail').click(function(){
              $("#gmail-settings-id").show();
              $("#gmail-settings-label").show();
              $("#smtp-settings-id").hide();
              $("#microsoft-settings-id").hide();
              $("#smtp-settings-label").hide();
              $("#microsoft-settings-label").hide();
              $("#default-settings-label").hide();

          
            });
            
            
             $('#mailer-type-microsoft').click(function(){
              $("#microsoft-settings-id").show();
              $("#microsoft-settings-label").show();
              $("#smtp-settings-id").hide();
              $("#gmail-settings-id").hide();
              $("#gmail-settings-label").hide();
              $("#smtp-settings-label").hide();
              $("#default-settings-label").hide();

          
            });
            
            $('#mailer-type-default').click(function(){
              $("#default-settings-label").show();
              $("#smtp-settings-id").hide();
              $("#gmail-settings-id").hide();
              $("#gmail-settings-label").hide();
              $("#smtp-settings-label").hide();
               $("#microsoft-settings-id").hide();
               $("#microsoft-settings-label").hide();

          
            });
    
    
    });

  