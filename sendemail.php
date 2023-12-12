<?php
    require 'vendor/autoload.php';

    class sendemail{
        public static function sendmail($to, $subject, $content){
            $key = '40A848D0E3F78AD88A25C09CB1E4AD6A83E4F11BDADDCCB0A4393DDFA9FC3E54646043795EE3D0ECD0C0DC8AB3EF34C4';
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