<?php

class KauZohoMail {

    public static function kauZohoMailAuthUrl() {
        $smtpValue = Setting::getSMTP();
        $url = "https://accounts.zoho".wpmsget('zohomail-domain-extensions', $smtpValue)."/oauth/v2/auth";
        $params = array();
        $state = wp_create_nonce( 'redirect_url');
        $params['client_id'] = sanitize_text_field(wpmsget('kau-zohomail-client-id', $smtpValue));
        $params['response_type'] = 'code';
        $params['state'] = $state;
        $params['prompt'] = 'consent';
        $params['access_type'] = 'offline';
        $params['redirect_uri'] = esc_url_raw(admin_url("admin.php"));
        $params['scope'] = 'VirtualOffice.messages.CREATE,VirtualOffice.accounts.READ';

        return $url . '?' . http_build_query($params);
    }

    public static function getOZohoMailToken($code) {
        $smtpValue = Setting::getSMTP();
       
        $state = wp_create_nonce('redirect_url');
        $token_request_data = array(
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => esc_url_raw(admin_url("admin.php")),
            "client_id" => sanitize_text_field(wpmsget('kau-zohomail-client-id', $smtpValue)),
            "client_secret" => sanitize_text_field(wpmsget('kau-zohomail-client-secret', $smtpValue)),
            "scope" => "VirtualOffice.messages.CREATE,VirtualOffice.accounts.READ",
            "state" => $state,
        );
        $body = http_build_query($token_request_data);
        $response = wpms_Run_Curl("https://accounts.zoho".wpmsget('zohomail-domain-extensions', $smtpValue)."/oauth/v2/token", $body);
        $response = json_decode($response);
        return $response;
    }

    
    public static function saveZohoMailUserID($accessToken) {
       $smtpValue = Setting::getSMTP();
       
       $urlZohoAccounts = "https://mail.zoho".wpmsget('zohomail-domain-extensions', $smtpValue)."/api/accounts";
       $headr = array();
       $accesstoken = get_option('zmail_access_token');
       $headr[] = 'Authorization: Zoho-oauthtoken '.$accessToken;
       $args = array(
               'headers' => array(
                     'Authorization' => 'Zoho-oauthtoken '.$accessToken
                )
              );
       $bodyAccounts = wp_remote_retrieve_body(wp_remote_get( $urlZohoAccounts, $args));
      $jsonbodyAccounts = json_decode($bodyAccounts);
      return $jsonbodyAccounts->data[0]->accountId;
       
      
    }

    public static function isKauZohoClientsSaved() {
        $smtpValue = Setting::getSMTP();
        return !empty(wpmsget('kau-zohomail-client-id', $smtpValue)) && !empty(wpmsget('kau-zohomail-client-secret', $smtpValue));
    }

    public static function isKauZohomailAuthRequired() {
        $smtpValue = Setting::getSMTP();
        return empty(wpmsget('kau-zohoMail-access-token', $smtpValue));
    }

}
