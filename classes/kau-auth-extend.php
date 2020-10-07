<?php

class KauAuthExtends {

    public static function getGoogleClientConfig() {
        require_once SMTP_PATH. '/vendor/autoload.php';
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

    public static function isKauGmailClientsSaved() {
        $smtpValue = Setting::getSMTP();
        return !empty(kauget('gmail-client-id', $smtpValue)) && !empty(kauget('gmail-client-secret', $smtpValue));
    }

    public static function isKauGmailAuthRequired() {
        $smtpValue = Setting::getSMTP();
        return empty(kauget('kau-gmail-access-token', $smtpValue)) || empty(kauget('kau-gmail-refesh-token', $smtpValue));
    }

    public static function sendTestMail($from, $fname, $subject, $to, $msg) {
        require_once SMTP_PATH. '/vendor/autoload.php';
        require_once ABSPATH . WPINC . '/class-phpmailer.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer;
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";
        $subject = $subject;
        $msg = $msg;
        $from = $from;
        $fname = $fname;
        $mail->From = $from;
        $mail->FromName = $fname;
        $mail->AddAddress($to);
        $mail->AddReplyTo($from, $fname);
        $mail->Subject = $subject;
        $mail->Body = $msg;
        //create the MIME Message
        $mail->preSend();
        $mime = $mail->getSentMIMEMessage();
        $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');

        //create the Gmail Message
        $message = new Google_Service_Gmail_Message();
        $service = new Google_Service_Gmail(KauGmailAuth2::getGmailClient());
        $message->setRaw($mime);
        $message = $service->users_messages->send('me', $message);

        return $message;
        
    }

}
