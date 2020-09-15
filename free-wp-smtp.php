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
