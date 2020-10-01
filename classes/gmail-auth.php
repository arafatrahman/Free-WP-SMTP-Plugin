<?php

class KauGmailAuth2 extends KauAuthExtends {

    public static function getGmailClient() {
        $google_client = self::getGoogleClientConfig();
        $google_client->setAccessType('offline');
        $google_client->setApprovalPrompt('force');
        $google_client->setIncludeGrantedScopes(true);

        $google_client->setScopes(array(Google_Service_Gmail::MAIL_GOOGLE_COM));

        $google_client->addScope('email');

        $google_client->addScope('profile');

        if (isset($_GET['code'])) { // we received the positive auth callback, get the token and store it in option
            $google_client->authenticate($_GET['code']);
            $getToken = $google_client->getAccessToken();

            self::updateAccessToken( kauget('access_token',$getToken));
            self::updateRefeshToken( kauget('refresh_token',$getToken));
        }

        return $google_client;
    }

}
