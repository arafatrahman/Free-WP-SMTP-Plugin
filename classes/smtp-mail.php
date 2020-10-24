<?php

class KauSmtpMail {

    public static function sendSmtpMail($subject, $to, $msg) {
        
        require_once SMTP_PATH . '/vendor/autoload.php';
        global $wp_version;

        if (version_compare($wp_version, '5.4.99') > 0) {
            require_once ABSPATH . WPINC . '/PHPMailer/PHPMailer.php';
            require_once ABSPATH . WPINC . '/PHPMailer/SMTP.php';
            $mail = new PHPMailer\PHPMailer\PHPMailer;
        } else {
            require_once ABSPATH . WPINC . '/class-phpmailer.php';
            $mail = new PHPMailer\PHPMailer\PHPMailer;
        }


        $smtpValue = Setting::getSMTP();

        $mail->IsSMTP();

        $mail->SMTPDebug = 0;


        $mail->SMTPAuth = kauget('kau-smtp-authorization-smtp', $smtpValue);
        $mail->SMTPSecure = kauget('kau-encryption-type', $smtpValue);
        $mail->Host = kauget('kau-smtp-host', $smtpValue);
        $mail->Port = kauget('kau-port-smtp', $smtpValue);
        $mail->Username = kauget('kau-username-smtp', $smtpValue);
        $mail->Password = kauget('kau-password-smtp', $smtpValue);


        $mail->SetFrom(kauget('kau-from-email', $smtpValue), kauget('kau-from-name', $smtpValue));

        $mail->Subject = $subject;

        $mail->IsHTML(kauget('kau-smtp-html-allow', $smtpValue));

        $mail->Body = $msg;


        $mail->AddAddress($to, 'Recipients Name');


        if (!$mail->Send()) {
            $error_message = "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $error_message = "Successfully sent!";
        }
    }

}
