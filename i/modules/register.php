<?php

//global $DBH; if(!$DBH) exit;

class RegisterUtils
    {
        public $username,$password,$cpassword,$email;
        public function input($data)
        {
            $this->username = $data['username'];
            $this->password = $data['password'];
            $this->cpassword = $data['cpassword'];
            $this->email = $data['email'];
            if(empty($this->errors()))
                $this->registerNewUser();
            else
                $this->triggerFailure($this->errors());
        }
        private function errors()
        {
            global $DBH;
            $error_list = array();
            //Проверка за символи, които не трябва да се използват
            if(preg_match("/[^a-z_\-0-9]/i",$this->username)) array_push($error_list,"Username contains illegal characters");
            if(strlen($this->username)<5) array_push($error_list,"Username cannot be less than 5 symbols long");
            if(strlen($this->username)>12) array_push($error_list,"Username cannot be more than 12 symbols long");
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) array_push($error_list,"Email is not valid");
            
            return $error_list;
        }
        private function triggerFailure($error_list)
        {
            var_dump($error_list);
        }
        private function registerNewUser()
        {
            
            try
            {
                $time = time();
                $statement = "INSERT INTO users (username,password,email,timeOfRegister) VALUES (:username,:password,:email,:time)";
                $q = $DBH->prepare($statement);
                $q->bindParam(":username",$this->username);
                $q->bindParam(":password",$this->password);
                $q->bindParam(":email",$this->email);
                $q->bindParam(":time",$time);
                if(!$q->execute())
                    die("Unexpected error occured.Refresh to try again");
                else
                    $q = null;
            }
            catch(PDOException $e)
            {
                echo "Unexpected error occured.";
            }
            //$this->dispatchEmail(); //-- Нужна е конфигурация на MAIL SERVER(SMTP)
        }
        public function dispatchEmail()
        {
            $data = array($this->email,$this->username);
            require("i/maildisp.php");
            new Email("ACCOUNT_CREATION",$data);
        }
    }
?>