<?php

class KauOutlookAuth {

    public static function getOutlookAuthURL() {
        $smtpValue = Setting::getSMTP();
        $url = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize';
        $params = array();
        $state = wp_create_nonce( 'redirect_url');
        $params['client_id'] = kauget('ms-client-id', $smtpValue);
        $params['response_type'] = 'code';
        $params['redirect_uri'] = esc_url_raw(admin_url("admin.php"));
        $params['response_mode'] = 'query';
        $params['state'] = $state;
        $params['scope'] = 'offline_access https://outlook.office.com/mail.send';

        return $url . '?' . http_build_query($params);
    }

    public static function getOutlookToken($code) {
        $smtpValue = Setting::getSMTP();
        $token_request_data = array(
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => esc_url_raw(admin_url("admin.php")),
            "scope" => 'offline_access https://outlook.office.com/mail.send',
            "client_id" => kauget('ms-client-id', $smtpValue),
            "client_secret" => kauget('ms-client-secret', $smtpValue)
        );
        $body = http_build_query($token_request_data);
        $response = kau_Run_Curl('https://login.microsoftonline.com/common/oauth2/v2.0/token', $body);
        $response = json_decode($response);
        return $response;
    }
    
    public static function getNewAccessToken($refreshToken) {
        $smtpValue = Setting::getSMTP();
        $token_request_data = array(
            
            "refresh_token" => $refreshToken,
            "redirect_uri" => esc_url_raw(admin_url("admin.php")),
            "scope" => 'offline_access https://outlook.office.com/mail.send',
            "grant_type" => "refresh_token",
            "client_id" => kauget('ms-client-id', $smtpValue),
            "client_secret" => kauget('ms-client-secret', $smtpValue)
        );
        $body = http_build_query($token_request_data);
        $response = kau_Run_Curl('https://login.microsoftonline.com/common/oauth2/v2.0/token', $body);
        $response = json_decode($response);
        return $response->access_token;
    }

    public static function isKauMicrosoftClientsSaved() {
        $smtpValue = Setting::getSMTP();
        return !empty(kauget('ms-client-id', $smtpValue)) && !empty(kauget('ms-client-secret', $smtpValue));
    }

    public static function isKauMicrosoftAuthRequired() {
        $smtpValue = Setting::getSMTP();
        return empty(kauget('kau-microsoft-access-token', $smtpValue));
    }

   

}
