<?php

class KauGmailAuth2 extends KauAuthExtends {

    public static function getGmailClient() {

        //Make object of Google API Client for call Google API
       // require_once dirname(__FILE__) . '/vendor/autoload.php';
        $googleClient = self::getGoogleClientConfig();
        $googleClient->setAccessType('offline');
        $googleClient->setApprovalPrompt('force');
        $googleClient->setIncludeGrantedScopes(true);

        $googleClient->setScopes(array(Google_Service_Gmail::MAIL_GOOGLE_COM));

        $googleClient->addScope('email');

        $googleClient->addScope('profile');
        $googleClient = apply_filters('wpsm_gmail_auth_get_client', $googleClient);

        if (isset($_GET['code'])) {
            
            $googleClient->fetchAccessTokenWithAuthCode(urldecode($_GET['code']));   

            $smtpValue = Setting::getSMTP();
            $smtpValue['kau-gmail-access-token'] = $googleClient->getAccessToken();
            $smtpValue['kau-gmail-refesh-token'] = $googleClient->getRefreshToken();
            Setting ::saveSMTP($smtpValue);
        }


        // Refresh the token if it's expired.
        if ($googleClient->isAccessTokenExpired()) {
            $refresh = $googleClient->getRefreshToken();
            $smtpValue = Setting::getSMTP();

            if (empty($refresh) && wpmsget('kau-gmail-refesh-token',$smtpValue)) {
                $refresh = wpmsget('kau-gmail-refesh-token',$smtpValue);
            }

            if (!empty($refresh)) {
                $googleClient->fetchAccessTokenWithRefreshToken($refresh);
                
                $smtpValue = Setting::getSMTP();
                $smtpValue['kau-gmail-access-token'] = $googleClient->getAccessToken();
                $smtpValue['kau-gmail-refesh-token'] = $googleClient->getRefreshToken();
                Setting ::saveSMTP($smtpValue);
            }
        }

        

        return $googleClient;
    }

}
