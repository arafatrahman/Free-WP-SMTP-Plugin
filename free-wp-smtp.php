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
    

    if (is_admin()) {
        include_once SMTP_PATH . "/classes/smtp-admin.php";
        smtp_admin::Init();
    }
}

add_action("wp_loaded", "SMTP_plugin_load");
add_action('admin_enqueue_scripts', 'smtp_admin_styles');
function smtp_admin_styles() {
    $screen = get_current_screen();
   
    if ('toplevel_page_smtp-startup' === $screen->id) {
      
        wp_enqueue_style('smtp_startup_admin_css', plugins_url('css/startup.css', __FILE__), array(), '1.0');
      
    } elseif('free-wp-smtp_page_smtp_settings' === $screen->id) {
       // echo "<script type='text/javascript'>alert('worked');</script>";
      wp_enqueue_script( 'wpsmtp_admin_js', plugins_url('js/smtp-settings.js', __FILE__), array(), '1.0');
      wp_enqueue_script( 'bootjquery','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array( 'jquery' ),'',true );  
      wp_enqueue_script( 'bootjquery2','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array( 'jquery' ),'',true );
      wp_enqueue_script( 'bootjquery3','https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array( 'jquery' ),'',true );  

      wp_enqueue_style('smtp_settings_admin_css', plugins_url('css/smtp-settings-style.css', __FILE__), array(), '1.0');
      wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    }
}

