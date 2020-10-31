<?php

class kauEmailProcess {

    public static function kauEmailProvider() {

        $smtpValue = Setting::getSMTP();
        if (kauget('mailer-types', $smtpValue) == "1") {
            return "smtp";
        } elseif (kauget('mailer-types', $smtpValue) == "2") {
            return "gmail";
        } elseif (kauget('mailer-types', $smtpValue) == "3") {
            return "microsoft";
        } elseif (kauget('mailer-types', $smtpValue) == "4") {
            return "default";
        } elseif (kauget('mailer-types', $smtpValue) == "5") {
            return "mailgun";
        } elseif (kauget('mailer-types', $smtpValue) == "6") {
            return "zohomail";
        }

        return;
    }

    public static function kauEmailSending($to, $subject, $message, $headers, $attachments) {

        $kauEmailProvider = self::kauEmailProvider();

        if ($kauEmailProvider == "gmail") {

            self::mailSendingByGmail($to, $subject, $message, $headers, $attachments);
        } elseif ($kauEmailProvider == "microsoft") {

            self::mailSendingByMicrosoft($to, $subject, $message, $headers, $attachments);
        } elseif ($kauEmailProvider == "mailgun") {

            self::mailSendingByMailgun($to, $subject, $message, $headers, $attachments);
        } elseif ($kauEmailProvider == "zohomail") {

            self::mailSendingByZohomail($to, $subject, $message, $headers, $attachments);
        } elseif ($kauEmailProvider == "default") {

            self::mailSendingByDefault($to, $subject, $message, $headers, $attachments);
        } else {
            return false;
        }
    }

    public static function mailSendingByDefault($to, $subject, $message, $headers, $attachments) {

        global $phpmailer;
        $smtpValue = Setting::getSMTP();

        // (Re)create it, if it's gone missing.
        if (!( $phpmailer instanceof PHPMailer\PHPMailer\PHPMailer )) {
            require_once ABSPATH . WPINC . '/PHPMailer/PHPMailer.php';
            require_once ABSPATH . WPINC . '/PHPMailer/SMTP.php';
            require_once ABSPATH . WPINC . '/PHPMailer/Exception.php';
            $phpmailer = new PHPMailer\PHPMailer\PHPMailer(true);

            $phpmailer::$validator = static function ( $email ) {
                return (bool) is_email($email);
            };
        }

        // Headers.
        $cc = array();
        $bcc = array();
        $reply_to = array();

        if (empty($headers)) {
            $headers = array();
        } else {
            if (!is_array($headers)) {
                // Explode the headers out, so this function can take
                // both string headers and an array of headers.
                $tempheaders = explode("\n", str_replace("\r\n", "\n", $headers));
            } else {
                $tempheaders = $headers;
            }
            $headers = array();

            // If it's actually got contents.
            if (!empty($tempheaders)) {
                // Iterate through the raw headers.
                foreach ((array) $tempheaders as $header) {
                    if (strpos($header, ':') === false) {
                        if (false !== stripos($header, 'boundary=')) {
                            $parts = preg_split('/boundary=/i', trim($header));
                            $boundary = trim(str_replace(array("'", '"'), '', $parts[1]));
                        }
                        continue;
                    }
                    // Explode them out.
                    list( $name, $content ) = explode(':', trim($header), 2);

                    // Cleanup crew.
                    $name = trim($name);
                    $content = trim($content);

                    switch (strtolower($name)) {

                       
                        case 'cc':
                            $cc = array_merge((array) $cc, explode(',', $content));
                            break;
                        case 'bcc':
                            $bcc = array_merge((array) $bcc, explode(',', $content));
                            break;
                        case 'reply-to':
                            $reply_to = array_merge((array) $reply_to, explode(',', $content));
                            break;
                        default:
                            // Add it to our grand headers array.
                            $headers[trim($name)] = trim($content);
                            break;
                    }
                }
            }
        }

        // Empty out the values that may be set.
        $phpmailer->clearAllRecipients();
        $phpmailer->clearAttachments();
        $phpmailer->clearCustomHeaders();
        $phpmailer->clearReplyTos();

        $phpmailer->setFrom(kauget('kau-from-email', $smtpValue), kauget('kau-from-name', $smtpValue), false);
        $phpmailer->Subject = $subject;
        $phpmailer->Body = $message;
        $addressHeaders = compact('to', 'cc', 'bcc', 'reply_to');

        foreach ($addressHeaders as $addressHeaders => $addresses) {
            if (empty($addresses)) {
                continue;
            }

            foreach ((array) $addresses as $address) {
                try {

                    $recipientName = '';

                    if (preg_match('/(.*)<(.+)>/', $address, $matches)) {
                        if (count($matches) == 3) {
                            $recipientName = $matches[1];
                            $address = $matches[2];
                        }
                    }

                    switch ($addressHeaders) {
                        case 'to':
                            $phpmailer->addAddress($address, $recipientName);
                            break;
                        case 'cc':
                            $phpmailer->addCc($address, $recipientName);
                            break;
                        case 'bcc':
                            $phpmailer->addBcc($address, $recipientName);
                            break;
                        case 'reply_to':
                            $phpmailer->addReplyTo($address, $recipientName);
                            break;
                    }
                } catch (PHPMailer\PHPMailer\Exception $e) {
                    continue;
                }
            }
        }



        $phpmailer->isSMTP();
        $phpmailer->Host = kauget('kau-smtp-host', $smtpValue);
        $phpmailer->SMTPAuth = kauget('kau-smtp-authorization-smtp', $smtpValue);
        $phpmailer->Username = kauget('kau-username-smtp', $smtpValue);
        $phpmailer->Password = kauget('kau-password-smtp', $smtpValue);
        $phpmailer->SMTPSecure = kauget('kau-encryption-type', $smtpValue);
        $phpmailer->Port = kauget('kau-port-smtp', $smtpValue);
        $phpmailer->SMTPAutoTLS = false;



        $phpmailer->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        if (!isset($content_type)) {
            $content_type = 'text/plain';
        }

        $content_type = apply_filters('wp_mail_content_type', $content_type);

        $phpmailer->ContentType = $content_type;

        // Set whether it's plaintext, depending on $content_type.
        if ('text/html' === $content_type) {
            $phpmailer->isHTML(true);
        }


        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                try {
                    $phpmailer->addAttachment($attachment);
                } catch (PHPMailer\PHPMailer\Exception $e) {
                    continue;
                }
            }
        }

        // Send!
        try {
            return $phpmailer->send();
        } catch (PHPMailer\PHPMailer\Exception $e) {

            $mail_error_data = compact('to', 'subject', 'message', 'headers', 'attachments');
            $mail_error_data['phpmailer_exception_code'] = $e->getCode();
            do_action('wp_mail_failed', new WP_Error('wp_mail_failed', $e->getMessage(), $mail_error_data));

            return false;
        }
    }

    public static function mailSendingByMailgun($to, $subject, $message, $headers, $attachments) {

        $mailgunData = array();
        $smtpValue = Setting::getSMTP();
        $fromEmail = kauget('kau-from-email', $smtpValue);
        $fromName = kauget('kau-from-name', $smtpValue);
        $mailgunApikey = kauget('kau-mailgun-api-key', $smtpValue);
        $mailgunApiUrl = kauget('kau-mailgun-api-url', $smtpValue);
        $html = kauget('kau-mailgun-html-allow', $smtpValue);
        $mailgunData['from'] = $fromName . '<' . $fromEmail . '>';

        foreach ($to as $address) {
            $mailgunData['to'] = $address;
        }
        $mailgunData['subject'] = $subject;

        if ($html == "true") {
            $mailgunData['html'] = $message;
        } else {
            $mailgunData['text'] = $message;
        }



        if (!empty($attachments)) {
            foreach ($attachments as $attachFile) {
                $mailgunData['attachment'] = curl_file_create($attachFile);
            }
        }
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $mailgunApiUrl . '/messages');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        if (!empty($attachments)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $mailgunData);
        curl_setopt($ch, CURLOPT_USERPWD, 'api' . ':' . $mailgunApikey);

        $result = curl_exec($ch);


        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public static function mailSendingByZohomail($to, $subject, $message, $headers, $attachments) {

        $smtpValue = Setting::getSMTP();
        $accessToken = kauget('kau-zohoMail-access-token', $smtpValue);

        $fromEmail = kauget('kau-from-email', $smtpValue);
        $fromName = kauget('kau-from-name', $smtpValue);
        $msgType = kauget('kau-zoho-html-allow', $smtpValue);
        $userID = kauget('kau-zohomail-user-id', $smtpValue);
        $domainExtensions = kauget('zohomail-domain-extensions', $smtpValue);
        $clientId = kauget('kau-zohomail-client-id', $smtpValue);
        $clientSecret = kauget('kau-zohomail-client-secret', $smtpValue);

        if (empty(get_option('kau_zohomail_integ_timestamp')) || time() - get_option('kau_zohomail_integ_timestamp') > 3000) {
            update_option('kau_zohomail_integ_timestamp', time(), false);
            $urlForRefreshToken = 'https://accounts.zoho' . $domainExtensions . '/oauth/v2/token?refresh_token=' . base64_decode($accessToken) . '&grant_type=refresh_token&client_id=' . $clientId . '&client_secret=' . $clientSecret . '&redirect_uri=' . admin_url() . 'admin.php&scope=VirtualOffice.messages.CREATE,VirtualOffice.accounts.READ';
            $zohoAccessToken = wp_remote_retrieve_body(wp_remote_post($urlForRefreshToken));
            $response = json_decode($zohoAccessToken);
            $smtpValue = Setting::getSMTP();
            $smtpValue['kau-zohoMail-access-token'] = $response->access_token;
            Setting::saveSMTP($smtpValue);
        }


        $zohoData = array();
        $zohoData['fromAddress'] = $fromName . '<' . $fromEmail . '>';
        $zohoData['subject'] = $subject;
        $zohoData['content'] = $message;
        $toAddresses = implode(',', $to);


        $zohoData['toAddress'] = $toAddresses;


        if (!empty($attachments)) {
            $attachmentJSONArr = array();
            $zohoData['attachments'] = $attachments;
            $headers1 = array(
                'Authorization' => 'Zoho-oauthtoken ' . $accessToken,
                'Content-Type' => 'application/octet-stream'
            );
            $count = 0;
            $flag = 'true';
            foreach ($attachments as $attfile) {
                $fileName = basename($attfile);
                $attachurl = 'https://mail.zoho' . $domainExtensions . '/api/accounts/' . $userID . '/messages/attachments' . '?fileName=' . $fileName;


                $args = array(
                    'body' => file_get_contents($attfile),
                    'headers' => $headers1,
                    'method' => 'POST'
                );
                $resultatt = wp_remote_post($attachurl, $args);
                $responseSending = wp_remote_retrieve_body($resultatt);
                $http_code = wp_remote_retrieve_response_code($resultatt);



                $attachmentupload = array();
                if ($http_code == '200') {
                    $responseattachjson = json_decode($responseSending);
                    $attachmentupload['storeName'] = $responseattachjson->data->storeName;
                    $attachmentupload['attachmentPath'] = $responseattachjson->data->attachmentPath;
                    $attachmentupload['attachmentName'] = $responseattachjson->data->attachmentName;
                    $attachmentJSONArr[$count] = $attachmentupload;
                    $count = $count + 1;
                } else {
                    $flag = 'false';
                }
            }
            if ($flag == 'true') {
                $zohoData['attachments'] = $attachmentJSONArr;
            }
        }


        if ($msgType == "true") {
            $zohoData['mailFormat'] = 'html';
        } else {
            $zohoData['mailFormat'] = 'plaintext';
        }


        $kauZohoHeaders = array(
            'Authorization' => 'Zoho-oauthtoken ' . $accessToken,
            'Content-Type' => 'application/json'
        );

        $kauDataString = json_encode($zohoData);
        $KauArgs = array(
            'body' => $kauDataString,
            'headers' => $kauZohoHeaders,
            'method' => 'POST'
        );


        $mailSendUrl = "https://mail.zoho" . $domainExtensions . "/api/accounts/" . $userID . '/messages';
        $sendingResponse = wp_remote_post($mailSendUrl, $KauArgs);
        $http_code = wp_remote_retrieve_response_code($sendingResponse);
        if ($http_code == '200') {

            return true;
        }
        return false;
    }

    public static function mailSendingByMicrosoft($reciepent, $subject, $message, $headers, $attachments) {


        if (!empty($attachments)) {
            $attachment = array();
            for ($i = 0; $i < 6; $i++) {

                if (strlen(trim($attachments[$i])) > 0) {
                    $content = base64_encode(file_get_contents($attachments[$i]));
                    $fileName = pathinfo($attachments[$i]);
                    $attach = array(
                        "@odata.type" => "#Microsoft.OutlookServices.FileAttachment",
                        "Name" => $fileName['basename'],
                        "ContentBytes" => $content
                    );
                    array_push($attachment, $attach);
                }
            }
        }

        $to = array();
        foreach ($reciepent as $address) {

            $toFromForm = explode(";", $address);
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
        }

        $request = array(
            "Message" => array(
                "Subject" => $subject,
                "ToRecipients" => $to,
                "Body" => array(
                    "ContentType" => "HTML",
                    "Content" => utf8_encode($message)
                ),
            )
        );

        if (!empty($attachments)) {
            $request['Message']['Attachments'] = $attachment;
        }

        $request = json_encode($request);
        $smtpValue = Setting::getSMTP();
        $headers = array(
            "User-Agent: php-tutorial/1.0",
            "Authorization: Bearer " . kauget('kau-microsoft-access-token', $smtpValue),
            "Accept: application/json",
            "Content-Type: application/json",
            "Content-Length: " . strlen($request)
        );

        $response = kau_Run_Curl("https://outlook.office.com/api/v2.0/me/sendmail", $request, $headers);
    }

    public static function mailSendingByGmail($to, $subject, $message, $headers, $attachments) {
        require_once SMTP_PATH . '/vendor/autoload.php';
        require_once ABSPATH . WPINC . '/class-phpmailer.php';

        $smtpValue = Setting::getSMTP();
        $mail = new PHPMailer\PHPMailer\PHPMailer;
        $mail->CharSet = "UTF-8";
        $mail->Encoding = "base64";
        $from = kauget('kau-from-email', $smtpValue);
        $fname = kauget('kau-from-name', $smtpValue);
        $mail->From = $from;
        $mail->FromName = $fname;
        foreach ($to as $address) {
            $mail->AddAddress($address);
        }

        $mail->AddReplyTo($from, $fname);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        if (!empty($attachments)) {
            foreach ($attachments as $attachFile) {
                $mail->AddAttachment($attachFile);
            }
        }
        $mail->Body = $message;
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
