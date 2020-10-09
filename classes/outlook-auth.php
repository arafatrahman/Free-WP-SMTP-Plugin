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

    public static function sendOutlookMail($accessToken, $reciepent, $sub, $msg) {

        $to = array();
        $toFromForm = explode(";", $reciepent);
        foreach ($toFromForm as $eachTo) {
            if (strlen(trim($eachTo)) > 0) {
                $thisTo = array(
                    "EmailAddress" => array(
                        "Address" => trim($eachTo)
                    )
                );
                array_push($to, $thisTo);
            }
        }
        if (count($to) == 0) {
            die("Need email address to send email");
        }

        $request = array(
            "Message" => array(
                "Subject" => $sub,
                "ToRecipients" => $to,
                "Body" => array(
                    "ContentType" => "HTML",
                    "Content" => utf8_encode($msg)
                )
            )
        );

        $request = json_encode($request);
        $headers = array(
            "User-Agent: php-tutorial/1.0",
            "Authorization: Bearer ".$accessToken,
            "Accept: application/json",
            "Content-Type: application/json",
            "Content-Length: " . strlen($request)
        );

        $response = self::runCurl("https://outlook.office.com/api/v2.0/me/sendmail", $request, $headers);
        
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
        return empty(kauget('kau-microsoft-access-token', $smtpValue));
    }

    public static function getOutlookAccessToken() {
        require_once SMTP_PATH . '/vendor/autoload.php';
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
        update_option('microsoft-access-token', $accessToken);

        $request = array(
            "Message" => array(
                "Subject" => "this is test",
                "ToRecipients" => "ar.riyad.sign@gmail.com",
                "Attachments" => "",
                "Body" => array(
                    "ContentType" => "HTML",
                    "Content" => utf8_encode("this is test <br> riyad")
                )
            )
        );

        $request = json_encode($request);
        $headers = array(
            "User-Agent: php-tutorial/1.0",
            "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJub25jZSI6Im5jdEtEcU9yUXByN25vbHhMbWhIRXI5YXp6cEJGREtsM2llN2NDT1hKaEEiLCJhbGciOiJSUzI1NiIsIng1dCI6ImtnMkxZczJUMENUaklmajRydDZKSXluZW4zOCIsImtpZCI6ImtnMkxZczJUMENUaklmajRydDZKSXluZW4zOCJ9.eyJhdWQiOiJodHRwczovL2dyYXBoLm1pY3Jvc29mdC5jb20iLCJpc3MiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC83MmY5ODhiZi04NmYxLTQxYWYtOTFhYi0yZDdjZDAxMWRiNDcvIiwiaWF0IjoxNjAyMjU5NTg4LCJuYmYiOjE2MDIyNTk1ODgsImV4cCI6MTYwMjM0NjI4OCwiYWlvIjoiRTJSZ1lEQm5ELzVnbnYxbTArbXorejkxWEY3UUFBQT0iLCJhcHBfZGlzcGxheW5hbWUiOiJyaXlhZCIsImFwcGlkIjoiMTdjZTIzYzEtNWJiZi00OGI2LThiYzItNTVjOGM5NGNiMWQ2IiwiYXBwaWRhY3IiOiIxIiwiaWRwIjoiaHR0cHM6Ly9zdHMud2luZG93cy5uZXQvNzJmOTg4YmYtODZmMS00MWFmLTkxYWItMmQ3Y2QwMTFkYjQ3LyIsImlkdHlwIjoiYXBwIiwicmgiOiIwLkFSb0F2NGo1Y3ZHR3IwR1JxeTE4MEJIYlI4RWp6aGVfVzdaSWk4SlZ5TWxNc2RZYUFBQS4iLCJ0ZW5hbnRfcmVnaW9uX3Njb3BlIjoiV1ciLCJ0aWQiOiI3MmY5ODhiZi04NmYxLTQxYWYtOTFhYi0yZDdjZDAxMWRiNDciLCJ1dGkiOiJkVEFTZFpqSmNFZU5NTDMxMUpJYkFBIiwidmVyIjoiMS4wIiwieG1zX3RjZHQiOjEyODkyNDE1NDd9.NZ16c8DGQVo5Qxma2KpHT8VrZKUyebd2D8DkAPfXkQT3CSL6NY6Ry-nZ2NiKjqcLcTPdcKMEY4zAhdQ7rgrkdnMHMcmLKm0gzz3wv-gju6e18r6vkCno6q9eWH1TSooRAGKaoOrlH5jyiMMPdm1HbDnGhiTNsAJ7TNYWQCvXQI497N_WrbKaoptfBpC8imWRvk7kVtH-nnRUHVjfBB0CIQQTjy9aBG5RrkBzfjqg7I30A8Rvx4-j74BRNHP3e_se6e5hyjfidOM3wVLyGHjJx6SCFDAO8O8Jl54U_s5JJTjKnQkqXY1VjXXFI7QvhM0zh5x9-2cE00vFk_OLQ19P5g",
            "Accept: application/json",
            "Content-Type: application/json",
            "Content-Length: " . strlen($request)
        );

        $response = self::runCurl("https://outlook.office.com/api/v2.0/me/sendmail", $request, $headers);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
    }

}
