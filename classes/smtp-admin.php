<?php

class smtp_admin extends Setting {

    public static function Init() {
        add_action("admin_menu", array(__CLASS__, "add_smtp_menu"));
    }

    public static function add_smtp_menu() {


        add_menu_page('WP SMTP Startup Page', 'WP Mailer SMTP', 'manage_options', 'smtpstartup', array(__CLASS__, "main_menu"), WPMS_ASSETS_DIR_URI . '/images/sending.svg');
        add_submenu_page('smtpstartup', 'SMTP Settings Page', 'SMTP Settings', 'manage_options', "smtp_settings", array(__CLASS__, "smtp_settings"));
    }

    public static function main_menu() {
        include_once WPMS_PATH . "/views/startup-view.php";
    }

    public static function smtp_settings() {


        if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {

            $todo = wpmsget('wpms_form_submit', $_POST);

            if ($todo == "wpms_misc_settings") {
                self::saveMISC($_POST);
            } else if ($todo == "wpms_smtp_settings") {
                $post  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                self::saveSMTP($post);
            } else if ($todo == "wpms_testing_settings") {
                self::saveEmailTesting($_POST);
                $smtpValue = self::getSMTP();
                $from = sanitize_email(wpmsget('kau-from-email', $smtpValue));
                $fname = sanitize_text_field(wpmsget('kau-from-name', $smtpValue));
                $subject = sanitize_text_field(wpmsget('email-subject', $_POST));
                $to = sanitize_email(wpmsget('recipient-email', $_POST));
                $msg = sanitize_textarea_field(wpmsget('email-body', $_POST));
                wp_mail($to,$subject,$msg);
                
            }

            if ($todo == "wpms_smtp_reset_settings") {
                unset($_GET);
                delete_option(self::SMTP_SETTINGS);
            } else if ($todo == "wpms_misc_reset_settings") {
                delete_option(self::MISC_SETTINGS);
            }
        }

        include_once WPMS_PATH . "/views/settings-view.php";
    }

}
