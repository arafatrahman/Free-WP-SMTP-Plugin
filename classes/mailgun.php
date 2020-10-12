<?php

class KauMailGun {

    public static function sendMailGunEmail() {

        require_once SMTP_PATH . '/vendor/autoload.php';
       

        $mgClient = new Mailgun\Mailgun('c1d8e8ac28081fd848d5904644296b9d-0d2e38f7-d227614a');
        $domain = "sandbox6850f3ccf8304d5295ebe28ceaf256e5.mailgun.org";

        $result = $mgClient->sendMessage($domain, array(
            'from' => 'Excited User <mailgun@YOUR_DOMAIN_NAME>',
            'to' => 'Baz <YOU@YOUR_DOMAIN_NAME>',
            'subject' => 'Hello',
            'text' => 'Testing some Mailgun awesomness!'
        ));
        
        return $result ;
    }

}
