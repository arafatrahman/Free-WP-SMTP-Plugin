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
                self::saveMISC($_POST);
            }
            else if($todo == "kau_smtp_settings"){

               self::saveSMTP($_POST);
            }
            else if($todo == "kau_testing_settings"){
                 self::saveEmailTesting($_POST);
            }
           
            
         }
        
         
         include_once SMTP_PATH .  "/views/settings-view.php" ;
         }
       

}
