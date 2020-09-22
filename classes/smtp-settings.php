<?php

 class smtpSetting {

    const SMTP_SETTINGS = 'kau_smtp_settings';

    public static function save($value) {
             update_option(self::SMTP_SETTINGS, json_encode($value));
    }

    public static function get() {

        $smtpSettings = json_decode(get_option(self::SMTP_SETTINGS), true);
            if (is_array($smtpSettings)) {
                return $smtpSettings;
            }
            return false;
        
    }
    
}
