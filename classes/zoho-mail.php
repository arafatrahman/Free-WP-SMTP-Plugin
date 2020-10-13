<?php

class KauZohoMail {

    public static function kauZohoMailAuthUrl() {
        $smtpValue = Setting::getSMTP();
        $url = 'https://accounts.zoho.com/oauth/v2/auth';
        $params = array();
        $params['client_id'] = kauget('kau-zohomail-client-id', $smtpValue);
        $params['response_type'] = 'code';
        $params['access_type'] = 'offline';
        $params['redirect_uri'] = esc_url_raw(admin_url("admin.php"));
        $params['state'] = '54321';
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
            "client_id" => kauget('kau-zohomail-client-id', $smtpValue),
            "client_secret" => kauget('kau-zohomail-client-secret', $smtpValue)
        );
        $body = http_build_query($token_request_data);
        $response = kau_Run_Curl('https://accounts.zoho.com/oauth/v2/token', $body);
        $response = json_decode($response);
        return $response;
    }

    public static function kauZohoMailSend($accessToken,$fromName,$fromEmail, $to, $sub, $msg,$userID) {
        
         if (!is_array($to)) {
            $to = explode(',', $to);
        }
        $zohoData = array();
        $zohoData['fromAddress'] = $fromName.'<'.$fromEmail.'>';
        $zohoData['subject'] = $sub;
        $zohoData['content'] =  $msg;
        $toAddresses = implode(',', $to);
        $zohoData['toAddress'] = $toAddresses;
        $zohoData['mailFormat'] = 'plaintext';
        $kauZohoHeaders = array(
            'Authorization' => 'Zoho-oauthtoken '.$accessToken,
            'Content-Type' => 'application/json'
        );

        $kauDataString = json_encode($zohoData);
        $KauArgs = array(
            'body' => $kauDataString,
            'headers' => $kauZohoHeaders,
            'method' => 'POST'
        );
        
       
        $mailSendUrl= 'https://mail.zoho.com/api/accounts/'.$userID.'/messages';
        $sendingResponse = wp_remote_post($mailSendUrl, $KauArgs);
        $http_code = wp_remote_retrieve_response_code($sendingResponse);
        if ($http_code == '200') {
            return true;
        }
        return false;
        
    }
    
    public static function saveZohoMailUserID($accessToken,$smtpValue) {
        
       $urlZohoAccounts = 'https://mail.zoho.com/api/accounts';
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
        return !empty(kauget('kau-zohomail-client-id', $smtpValue)) && !empty(kauget('kau-zohomail-client-secret', $smtpValue));
    }

    public static function isKauZohomailAuthRequired() {
        $smtpValue = Setting::getSMTP();
        return empty(kauget('kau-zohoMail-access-token', $smtpValue));
    }

}
