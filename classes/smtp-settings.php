<?php

 class Setting {

    const SMTP_SETTINGS = 'kau_smtp_settings';
    const MISC_SETTINGS = 'kau_misc_settings';
    const EMAIL_TESTING = 'kau_email_testing';

    public static function saveSMTP($value) {
             update_option(self::SMTP_SETTINGS, json_encode($value));
    }
    public static function saveEmailTesting($value) {
        update_option(self::EMAIL_TESTING, json_encode($value));
    }

    public static function saveMISC($value) {
        update_option(self::MISC_SETTINGS, json_encode($value));
    }

    public static function getSMTP() {

        $smtpSettings = json_decode(get_option(self::SMTP_SETTINGS), true);
            if (is_array($smtpSettings)) {
                return $smtpSettings;
            }
            return false;
        
    }

    public static function getEmailTesting() {

        $emailTesting = json_decode(get_option(self::EMAIL_TESTING), true);
            if (is_array($emailTesting)) {
                return $emailTesting;
            }
            return false;
        
    }

    public static function getMISC() {

        $miscSettings = json_decode(get_option(self::MISC_SETTINGS), true);
            if (is_array($miscSettings)) {
                return $miscSettings;
            }
            return false;
        
    }
    
     public static function deleteMISC() {

        $miscSettings = json_decode(get_option(self::MISC_SETTINGS), true);
            if (is_array($miscSettings)) {
                return $miscSettings;
            }
            return false;
        
    }
    
    
    
}
