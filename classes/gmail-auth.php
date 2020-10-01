<?php

class KauGmailAuth2 extends KauAuthExtends {

    public static function getGmailClient() {

        //Make object of Google API Client for call Google API

        $google_client = self::getGoogleClientConfig();
        $google_client->setAccessType('offline');
        $google_client->setApprovalPrompt('force');
        $google_client->setIncludeGrantedScopes(true);

        $google_client->setScopes(array(Google_Service_Gmail::MAIL_GOOGLE_COM));

        $google_client->addScope('email');

        $google_client->addScope('profile');
        $google_client = apply_filters('kau_free_mail_smtp_providers_gmail_auth_get_client_custom_options', $google_client);

        if (isset($_GET['code'])) {
            
            $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
            

            $smtpValue = Setting::getSMTP();
            $smtpValue['kau-gmail-access-token'] = $google_client->getAccessToken();
            $smtpValue['kau-gmail-refesh-token'] = $google_client->getRefreshToken();
            Setting ::saveSMTP($smtpValue);
        }


        // Refresh the token if it's expired.
        if ($google_client->isAccessTokenExpired()) {
            $refresh = $google_client->getRefreshToken();
            $smtpValue = Setting::getSMTP();

            if (empty($refresh) && kauget('kau-gmail-refesh-token',$smtpValue)) {
                $refresh = kauget('kau-gmail-refesh-token',$smtpValue);
            }

            if (!empty($refresh)) {
                $google_client->fetchAccessTokenWithRefreshToken($refresh);
                
                $smtpValue = Setting::getSMTP();
                $smtpValue['kau-gmail-access-token'] = $google_client->getAccessToken();
                $smtpValue['kau-gmail-refesh-token'] = $google_client->getRefreshToken();
                Setting ::saveSMTP($smtpValue);
            }
        }

        

        return $google_client;
    }

}
