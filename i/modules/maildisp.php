<?php

    class Email
    {
        public function __construct($OP,$DATA)
        {
            switch($OP)
            {
                case "ACCOUNT_CREATION":
                    $this->sendConfirmation($DATA[0],$DATA[1]);
                    break;
            }
        }
        private function sendConfirmation($email,$username)
        {
            $to = "d_ivanovbg@abv.bg";
            $subject = 'Welcome to CoinMine';
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            $message = "<html><body style=\"background-color:#5ED7FF;\">";
            $message .= "<h1>Text $username</h1>";
            // HTML STRUCTURE FOR EMAIL
            $message .= "</html></body>";
            mail($to, $subject, $message, $headers);
        }
    }
?>