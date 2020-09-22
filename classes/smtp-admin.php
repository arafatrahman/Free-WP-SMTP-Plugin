<?php
class smtp_admin extends smtp_setting{

	 public static function Init(){
		 add_action("admin_menu",array(__CLASS__,"add_smtp_menu"));
              }

         public static function add_smtp_menu(){
            

             add_menu_page('WP SMTP Startup Page', 'Free WP SMTP', 'manage_options', 'smtpstartup',array(__CLASS__,"main_menu"));
            add_submenu_page( 'smtpstartup', 'SMTP Settings Page', 'SMTP Settings', 'manage_options', "smtp_settings",array(__CLASS__,"smtp_settings"));           
            

         }

         public static function main_menu(){
            include_once SMTP_PATH .  "/views/startup-view.php" ;	
         }

         public static function smtp_settings(){
           	
        
            
         $smtpSettings=array(
            'smtp-activation'=>$_POST['smtp-activation'],
            'from-email'=>$_POST['from-email'],
            'from-name'=>$_POST['from-name'],
            'mailer-type'=>$_POST['mailer-type'],
            'gmail-client-secret'=>$_POST['gmail-client-secret'],
            'gmailredirectURI'=>$_POST['gmailredirectURI'],
            'gmail-authorization'=>$_POST['gmail-authorization'],
            'mo-smtp-api-key'=>$_POST['mo-smtp-api-key'],
            'mo-smtp-sender-name'=>$_POST['mo-smtp-sender-name'],
            'smtp-api-key'=>$_POST['smtp-api-key'],
            'smtp-sender-name'=>$_POST['smtp-sender-name'],
            'smtpredirectURI'=>$_POST['smtpredirectURI'],
            'smtp-host'=>$_POST['smtp-host'],
            'smtp-authorization'=>$_POST['smtp-authorization'],
            'username-smtp'=>$_POST['username-smtp'],
            'password-smtp'=>$_POST['password-smtp'],
            'connection-type'=>$_POST['connection-type'],
            'port-smtp'=>$_POST['port-smtp'],
            'ssl-verification'=>$_POST['ssl-verification'],
        );

         self::save_smtp_settings($smtpSettings);
       
         include_once SMTP_PATH .  "/views/settings-view.php" ;
         }

   

       

        

}
