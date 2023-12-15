<?php
    require 'vendor/autoload.php';

    class sendemail{
        public static function sendmail($to, $subject, $content){
            $key = '4B92A7EDA9C920257F45E7E2545A3AE19C5C83B19A82D72683E183BB37FF0002B69421452DFA57355E8CD1EE576A7F29';
            $email = new \SendGrid\Mail\Mail();
            $email->setfrom('danieljohnj@gmail.com', 'daniel email');
            $email->setsubject($subject);
            $email->addTo($to);
            $email->addcontent('text/plain', $content);

            $emailapi = new \SendGrid($key);

            try{
                $response = $emailapi->send($email);
                return $response;


            }catch(exception $e){
                echo 'Email exception caught :' . $e->getMessage() ."\n";
                return false;
            }
        }
    }



?>