<?php

/**
 * Plugin Name: Free WP SMTP 
 * Plugin URI: http://www.kuaniaweb.com
 * Description: SMTP Mailer plugin allows you to configure a mail server which handles all outgoing email from your website. It takes control of the wp_mail function and use SMTP instead
 * Version: 1.0
 * Author: Arafat Rahman Riyad
 * Author URI: Author's website
 * License: GPL
 */
define("SMTP_PATH", dirname(__FILE__));

function SMTP_plugin_load() {

session_start();
    require_once dirname(__FILE__)  . '/vendor/autoload.php';
    include_once dirname(__FILE__) . "/classes/kau-auth-extend.php" ;
    include_once dirname(__FILE__) . "/classes/gmail-auth.php" ;
    include_once dirname(__FILE__) . "/includes/functions.php" ;
    include_once dirname(__FILE__) . "/classes/smtp-settings.php" ;
    if (is_admin()) {
        include_once SMTP_PATH . "/classes/smtp-admin.php";
        smtp_admin::Init();
    }
}
SMTP_plugin_load();
//add_action("wp_loaded", "SMTP_plugin_load");
add_action('admin_enqueue_scripts', 'smtp_admin_styles');
function smtp_admin_styles() {
    $screen = get_current_screen();
   
    if ('toplevel_page_smtpstartup' === $screen->id) {
        wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
        wp_enqueue_style('smtp_startup_admin_css', plugins_url('assets/css/startup.css', __FILE__), array(), '1.0');
        
        wp_enqueue_script( 'wpsmtp_admin_js', plugins_url('assets/js/smtp-settings.js', __FILE__), array(), '1.0');
        wp_enqueue_script( 'bootjquery','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array( 'jquery' ),'',true );

      
    } elseif('free-wp-smtp_page_smtp_settings' === $screen->id) {
       // echo "<script type='text/javascript'>alert('worked');</script>";
      wp_enqueue_script( 'wpsmtp_admin_js', plugins_url('assets/js/smtp-settings.js', __FILE__), array(), '1.0');
      wp_enqueue_script( 'bootjquery','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array( 'jquery' ),'',true );  
      wp_enqueue_script( 'bootjquery2','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array( 'jquery' ),'',true );
      

      wp_enqueue_style('smtp_settings_admin_css', plugins_url('assets/css/smtp-settings-style.css', __FILE__), array(), '1.0');
      wp_enqueue_style('bootstrap4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
      wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    }
}

