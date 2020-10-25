<?php

class KauMailGun {

    public static function sendMailgunTestEmail($from, $fname, $subject, $to, $msg,$mailgunApikey,$mailgunApiUrl,$html) {
        
        
        $mailgunData = array();
        $mailgunData['from'] = $fname . '<' . $from . '>';

        $mailgunData['to'] = $to;
        
        $mailgunData['subject'] = $subject;
        
        
        if($html == "true"){
           $mailgunData['html'] = $msg; 
        }
        else{
           $mailgunData['text'] = $msg;
        }
        
        

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $mailgunApiUrl . '/messages');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
      //  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $mailgunData);
        curl_setopt($ch, CURLOPT_USERPWD, 'api' . ':' . $mailgunApikey);
        
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        
    }

}
