<?php

 class smtp_setting {

    const SMTP_SETTINGS = 'kau-smtp-settings';

    public static function save_smtp_settings($value) {
             update_option(self::SMTP_SETTINGS, json_encode($value));
    }

    public static function get_smtp_settings() {

        $smtpSettings = json_decode(get_option(self::SMTP_SETTINGS), true);
            if (is_array($smtpSettings)) {
                return $smtpSettings;
            }
            return false;
        
    }
    
}
