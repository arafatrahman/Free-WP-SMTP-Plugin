<?php
class smtp_admin{

	 public static function Init(){
		 add_action("admin_menu",array(__CLASS__,"add_smtp_menu"));
              }

         public static function add_smtp_menu(){

             add_menu_page('WP SMTP Startup Page', 'Free WP SMTP', 'manage_options', 'smtp-startup',array(__CLASS__,"main_menu"));
            add_submenu_page( 'smtp-startup', 'SMTP Settings Page', 'SMTP Settings', 'manage_options', "smtp_settings",array(__CLASS__,"smtp_settings"));
            
            

         }

         public static function main_menu(){
		echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Theme</h2></div>';			
         }

         public static function smtp_settings(){
					
             echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>Settings</h2></div>';
         }

       

        

}
