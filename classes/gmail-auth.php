<?php

class KauGmailAuth2 {

       
    public static function getGmailClient() {

        
        require_once SMTP_PATH. '/vendor/autoload.php';

        //Make object of Google API Client for call Google API
        $google_client = new Google_Client();

        $smtpValue = Setting::getSMTP();

        //Set the OAuth 2.0 Client ID
        $google_client->setClientId(kauget('gmail-client-id',$smtpValue));

        //Set the OAuth 2.0 Client Secret key
        $google_client->setClientSecret(kauget('gmail-client-secret',$smtpValue));

        //Set the OAuth 2.0 Redirect URI
        $google_client->setRedirectUri(admin_url("admin.php?page=smtp_settings"));
        $google_client->setAccessType( 'offline' );
        $google_client->setApprovalPrompt( 'force' );
        $google_client->setIncludeGrantedScopes( true );
        // We request only the sending capability, as it's what we only need to do.
        $google_client->setScopes( array( Google_Service_Gmail::MAIL_GOOGLE_COM ) );

        $google_client->addScope('email');

        $google_client->addScope('profile');
        
        return $google_client;
       
    }

     
}

