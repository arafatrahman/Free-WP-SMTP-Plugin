<?php

class smtp_admin extends Setting{


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


         if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){

            $todo = kauget('kau_form_submit',$_POST);
                    
            if($todo == "kau_misc_settings"){
                KauMailGun::sendMailGunEmail();
                self::saveMISC($_POST);
            }
            else if($todo == "kau_smtp_settings"){

               self::saveSMTP($_POST);
            }
            else if($todo == "kau_testing_settings"){
                 self::saveEmailTesting($_POST);
                 $smtpValue = self::getSMTP();
                 $from = kauget('from-email',$smtpValue);
                 $fname = kauget('from-name',$smtpValue);
                 $subject = kauget('email-subject',$_POST);
                 $to = kauget('recipient-email',$_POST);
                 $msg = kauget('email-body',$_POST);
                 
                if(kauget('mailer-types', $smtpValue) == "2"){
                    
                     KauAuthExtends::sendTestMail($from, $fname, $subject, $to, $msg);
                }
                
                if(kauget('mailer-types', $smtpValue) == "3"){
                    
                  
                    $msAccessToken = kauget('kau-microsoft-access-token',$smtpValue);                   
                    KauOutlookAuth::sendOutlookMail($msAccessToken, $to, $subject, $msg);
                }
                
                if(kauget('mailer-types', $smtpValue) == "5"){
                    
                    KauSendinBlue::sendmail();
                    //$sendinblueApiKey = kauget('kau-sendinblue-api-key',$smtpValue);
                    
                   // KauSendinBlue::sendInMailEmailSending($sendinblueApiKey, $to, $subject, $msg, $from, $fname);
                   
                }
                
                elseif (kauget('mailer-types', $smtpValue) == "4") {
                   
                   KauSmtpMail::sendSmtpMail($subject, $to, $msg);
                }
                
                
                 
            }
            
            if($todo == "kau_smtp_reset_settings"){
                unset($_GET);
                delete_option( self::SMTP_SETTINGS );
            }
            else if($todo == "kau_misc_reset_settings"){
             delete_option( self::MISC_SETTINGS );

            }
            
        }
        
        include_once SMTP_PATH .  "/views/settings-view.php" ;
        
    }
       

}
