<?php

class KauSendinBlue {
    /*
    public static function sendInMailEmailSending($apiKey, $recipentEmail, $subject, $body, $senderName, $senderEmail) {

        require_once SMTP_PATH . '/vendor/autoload.php';

        // Configure API key authorization: api-key
        $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $apiKey);



        $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                new GuzzleHttp\Client(), $config
        );
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
        $sendSmtpEmail['to'] = array(array('email' => $recipentEmail, 'name' => 'John Doe'));
        $sendSmtpEmail['subject'] = $subject;
        $sendSmtpEmail['htmlContent'] = $body;
        $sendSmtpEmail['sender'] = array(array('email' => $senderEmail, 'name' => $senderName));
        $sendSmtpEmail['templateId'] = 59;
        $sendSmtpEmail['params'] = array('name' => 'John', 'surname' => 'Doe');
        $sendSmtpEmail['headers'] = array('X-Mailin-custom' => 'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling SMTPApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }
    }

*/
    public static function sendmail() {
        $request = array(
                "sender" => array(
                    "name" => "riyad",
                    "email" => "ar.riyad.sign@gmail.com"
                ),
                "to" =>  array(
                    "email" => "webkaunia@gmail.com",
                    "name" => "webkaunia"
                ),
                "htmlContent" => "This is subjectThis is <br> subjectThis is subject",
                "textConten" => "This is subjectThis is subjectThis is subjectThis is subject",
                "subject" => "This is subject",
            
                );

        $request = json_encode($request);
        $headers = array(
            "accept: application/json",
            "api-key: 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",
            "content-type: application/json",
            "Content-Length: " . strlen($request)
        );

        $response = kau_Run_Curl("https://api.sendinblue.com/v3/smtp/email", $request, $headers);
       
    }
    
    
}
