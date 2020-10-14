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
 define('KAU_ASSETS_DIR_URI', plugins_url('assets', __FILE__));

function kau_admin_init() {


    if (isset($_GET['code']) && isset($_GET['accounts-server'])) {
       $smtpValue = Setting::getSMTP();
      // $domainExtensions = kauget('zohomail-domain-extensions', $smtpValue);
      
       $zohoMailToken = KauZohoMail::getOZohoMailToken($_GET['code']);
       $smtpValue['kau-zohoMail-access-token'] = $zohoMailToken->access_token;
       $smtpValue['kau-zohoMail-refresh-token'] = $zohoMailToken->refresh_token;
       $smtpValue['kau-zohoMail-expires-in'] = $zohoMailToken->expires_in;
       $smtpValue['kau-zohoMail-authorization-code'] = $_GET['code'];
       $zohoUserId =  KauZohoMail::saveZohoMailUserID($zohoMailToken->access_token);
       $smtpValue['kau-zohomail-user-id'] = $zohoUserId;
       Setting ::saveSMTP($smtpValue);
       wp_safe_redirect(admin_url('admin.php?page=smtp_settings'));
       exit();
    }

    if (isset($_GET['code']) && isset($_GET['state'])) {
        
        $smtpValue = Setting::getSMTP();
        $microsoftToken = KauOutlookAuth::getOutlookToken($_GET['code']);
        $smtpValue['kau-microsoft-access-token'] = $microsoftToken->access_token;
        $smtpValue['kau-microsoft-refresh_token'] = $microsoftToken->refresh_token;
        $smtpValue['kau-microsoft-authorization-code'] = $_GET['code'];
        
        Setting ::saveSMTP($smtpValue);
        
        wp_safe_redirect(admin_url('admin.php?page=smtp_settings'));
        exit();
    }
}



if (isset($_SERVER['QUERY_STRING']) == 'page=smtp_settings') {
   add_action('admin_init', 'kau_admin_init');
}

function SMTP_plugin_load() {
    include_once dirname(__FILE__) . "/classes/zoho-mail.php";
    include_once dirname(__FILE__) . "/classes/sendin-blue.php";
    include_once dirname(__FILE__) . "/classes/outlook-auth.php";
    include_once dirname(__FILE__) . "/classes/kau-auth-extend.php";
    include_once dirname(__FILE__) . "/classes/gmail-auth.php";
    include_once dirname(__FILE__) . "/classes/smtp-mail.php";
    include_once dirname(__FILE__) . "/includes/functions.php";
    include_once dirname(__FILE__) . "/classes/smtp-settings.php";
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

        wp_enqueue_script('wpsmtp_admin_js', plugins_url('assets/js/smtp-settings.js', __FILE__), array(), '1.0');
        wp_enqueue_script('bootjquery', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '', true);
    } elseif ('free-wp-smtp_page_smtp_settings' === $screen->id) {
        // echo "<script type='text/javascript'>alert('worked');</script>";
        wp_enqueue_script('wpsmtp_admin_js', plugins_url('assets/js/smtp-settings.js', __FILE__), array(), '1.0');
        wp_enqueue_script('bootjquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array('jquery'), '', true);
        wp_enqueue_script('bootjquery2', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '', true);


        wp_enqueue_style('smtp_settings_admin_css', plugins_url('assets/css/smtp-settings-style.css', __FILE__), array(), '1.0');
        wp_enqueue_style('bootstrap4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    }
}
