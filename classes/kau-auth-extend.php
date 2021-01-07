<?php

class KauAuthExtends {

    public static function getGoogleClientConfig() {
        require_once WPMS_PATH. '/vendor/autoload.php';
        $smtpValue = Setting::getSMTP();

        $google_client = new Google_Client(
                array(
            'client_id' => sanitize_text_field(wpmsget('gmail-client-id', $smtpValue)),
            'client_secret' => sanitize_text_field(wpmsget('gmail-client-secret', $smtpValue)),
            'redirect_uri' => admin_url("admin.php?page=smtp_settings"),
                )
        );

        return $google_client;
    }

  
    public static function isKauGmailClientsSaved() {
        $smtpValue = Setting::getSMTP();
        return !empty(wpmsget('gmail-client-id', $smtpValue)) && !empty(wpmsget('gmail-client-secret', $smtpValue));
    }

    public static function isKauGmailAuthRequired() {
        $smtpValue = Setting::getSMTP();
        return empty(wpmsget('kau-gmail-access-token', $smtpValue)) || empty(wpmsget('kau-gmail-refesh-token', $smtpValue));
    }
    
    public static function isMailgunApiKeyAndApiUrlSaved() {
        $smtpValue = Setting::getSMTP();
        return empty(wpmsget('kau-mailgun-api-key', $smtpValue)) || empty(wpmsget('kau-mailgun-api-url', $smtpValue));
    }
    
    public static function isDefaultValueSaved() {
        $smtpValue = Setting::getSMTP();
        return empty(wpmsget('kau-smtp-host', $smtpValue)) || empty(wpmsget('kau-smtp-authorization-smtp', $smtpValue)) || empty(wpmsget('kau-username-smtp', $smtpValue)) || empty(wpmsget('kau-password-smtp', $smtpValue)) || empty(wpmsget('kau-encryption-type', $smtpValue)) || empty(wpmsget('kau-port-smtp', $smtpValue));
    }

}
