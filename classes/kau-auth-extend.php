<?php

class KauAuthExtends {

    public static function getGoogleClientConfig() {


        $smtpValue = Setting::getSMTP();

        $google_client = new Google_Client(
                array(
            'client_id' => kauget('gmail-client-id', $smtpValue),
            'client_secret' => kauget('gmail-client-secret', $smtpValue),
            'redirect_uri' => admin_url("admin.php?page=smtp_settings"),
                )
        );

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

    public static function sendMessage($service, $message) {

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
