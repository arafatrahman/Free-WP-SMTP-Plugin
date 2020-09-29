<?php

class KauGmailAuth2 {

    public static function getGmailClient() {

        //Make object of Google API Client for call Google API
        $google_client = new Google_Client();

        $smtpValue = Setting::getSMTP();

        //Set the OAuth 2.0 Client ID
        $google_client->setClientId(kauget('gmail-client-id', $smtpValue));

        //Set the OAuth 2.0 Client Secret key
        $google_client->setClientSecret(kauget('gmail-client-secret', $smtpValue));

        //Set the OAuth 2.0 Redirect URI
        $google_client->setRedirectUri(admin_url("admin.php?page=smtp_settings"));
        $google_client->setAccessType('offline');
        $google_client->setApprovalPrompt('force');
        $google_client->setIncludeGrantedScopes(true);
        // We request only the sending capability, as it's what we only need to do.
        $google_client->setScopes(array(Google_Service_Gmail::MAIL_GOOGLE_COM));

        $google_client->addScope('email');

        $google_client->addScope('profile');
         return $google_client;
    }

    public static function createMessage($sender, $to, $subject, $messageText) {
        $message = new Google_Service_Gmail_Message();

        $rawMessageString = "From: <{$sender}>\r\n";
        $rawMessageString .= "To: <{$to}>\r\n";
        $rawMessageString .= 'Subject: =?utf-8?B?' . base64_encode($subject) . "?=\r\n";
        $rawMessageString .= "MIME-Version: 1.0\r\n";
        $rawMessageString .= "Content-Type: text/html; charset=utf-8\r\n";
        $rawMessageString .= 'Content-Transfer-Encoding: quoted-printable' . "\r\n\r\n";
        $rawMessageString .= "{$messageText}\r\n";

        $rawMessage = strtr(base64_encode($rawMessageString), array('+' => '-', '/' => '_'));
        $message->setRaw($rawMessage);
        return $message;
    }

    public static function sendMessage($service,$message) {
        
        $mailer = $service->users_messages;
       

        try {
            $message = $service->users_messages->send('me', $message);
            print 'Message with ID: ' . $message->getId() . ' sent.';
            return $message;
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
        }

        return null;
    }

}
