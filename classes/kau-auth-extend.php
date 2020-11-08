<?php

class KauAuthExtends {

    public static function getGoogleClientConfig() {
        require_once SMTP_PATH. '/vendor/autoload.php';
        $smtpValue = Setting::getSMTP();

        $google_client = new Google_Client(
                array(
            'client_id' => kauget('gmail-client-id', $smtpValue),
            'client_secret' => kauget('gmail-client-secret', $smtpValue),
            'redirect_uri' => admin_url("admin.php?page=smtp_settings"),
                )
        );

        return $google_client;
    }

  
    public static function isKauGmailClientsSaved() {
        $smtpValue = Setting::getSMTP();
        return !empty(kauget('gmail-client-id', $smtpValue)) && !empty(kauget('gmail-client-secret', $smtpValue));
    }

    public static function isKauGmailAuthRequired() {
        $smtpValue = Setting::getSMTP();
        return empty(kauget('kau-gmail-access-token', $smtpValue)) || empty(kauget('kau-gmail-refesh-token', $smtpValue));
    }

}
