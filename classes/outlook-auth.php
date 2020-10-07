<?php

class KauOutlookAuth {

    public static function getOutlookAuthURL() {
        $smtpValue = Setting::getSMTP();
        $url = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize';
        $params = array();
        $params['client_id'] = kauget('ms-client-id', $smtpValue);
        $params['response_type'] = 'code';
        $params['redirect_uri'] = esc_url_raw(admin_url("admin.php"));
        $params['response_mode'] = 'query';
        $params['state'] = '4321';
        $params['scope'] = 'https://outlook.office.com/mail.send';

        return $url . '?' . http_build_query($params);
    }

    public static function saveOutlookAccessToken($code) {
        $smtpValue = Setting::getSMTP();
        $token_request_data = array(
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => esc_url_raw(admin_url("admin.php")),
            "scope" => 'https://outlook.office.com/mail.send',
            "client_id" => kauget('ms-client-id', $smtpValue),
            "client_secret" => kauget('ms-client-secret', $smtpValue)
        );
        $body = http_build_query($token_request_data);
        $response = self::runCurl('https://login.microsoftonline.com/common/oauth2/v2.0/token', $body);
        $response = json_decode($response);
        return $response->access_token;
    }

    public static function runCurl($url, $post = null, $headers = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $post == null ? 0 : 1);
        if ($post != null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($headers != null) {
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_code >= 400) {
            echo "Error executing request to Office365 api with error code=$http_code<br/><br/>\n\n";
            echo "<pre>";
            print_r($response);
            echo "</pre>";
            die();
        }
        return $response;
    }
    
    

    public static function isKauMicrosoftClientsSaved() {
        $smtpValue = Setting::getSMTP();
        return !empty(kauget('ms-client-id', $smtpValue)) && !empty(kauget('ms-client-secret', $smtpValue));
    }

    public static function isKauMicrosoftAuthRequired() {
        $smtpValue = Setting::getSMTP();
        return !empty(kauget('kau-microsoft-access-token', $smtpValue));
    }
    
    
    
    
    /*
      public static function getOutlookAccessToken() {


      $guzzle = new \GuzzleHttp\Client();
      $url = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
      $token = json_decode($guzzle->post($url, [
      'form_params' => [
      'client_id' => '17ce23c1-5bbf-48b6-8bc2-55c8c94cb1d6',
      'client_secret' => 'H-CC-cHQTBLCo2_h3qTcSTX02~_4VMnObb',
      'scope' => 'https://graph.microsoft.com/.default',
      'grant_type' => 'client_credentials',
      ],
      ])->getBody()->getContents());
      $accessToken = $token->access_token;





      } */
}
