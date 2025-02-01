<?php
    class login
    {
        
        static function input($account_username,$account_password,$get)
        {
            //limits the numbers of queries
            sleep(mt_rand(1,4));
            
            // SANITIZE
            if(self::spellCheck($account_username,$account_password))
            {
                self::handleFailure();
                return;
            }
            
            $statement = "SELECT * FROM `users` WHERE `username` = :username AND `password` = :password LIMIT 1";
            $q = db::$DBH->prepare($statement);
            $q->bindParam(":username",$account_username,PDO::PARAM_STR);
            $q->bindParam(":password",$account_password,PDO::PARAM_STR);
            $q->execute();
            
            $results = $q->rowCount();
            
            if($results==1)
                self::handleSuccess($account_username,$get);
            else
                self::handleFailure();
        }
        
        static function spellCheck($u,$p)
        {
            if(strlen($u)<5 || strlen($u)>18)
                return true;
            if(strlen($p)<5)
                return true;
            return false;
        }
        
        static function handleFailure()
        {
            ntf::create(0,"Incorrect username or password");
            page::refresh();
        }
        
        static function handleSuccess($input,$redirect)
        {
            $session_key = self::generateSession();
            $statement = "UPDATE `users` SET session = :session WHERE username = :username LIMIT 1";
            $q = db::$DBH->prepare($statement);
            $q->bindParam(":session",$session_key);
            $q->bindParam(":username",$input);
            $q->execute();
            $_SESSION['user']['key']=$session_key;
            ntf::create(1,"You have logged in successfully");
            if(!isset($redirect))
            page::redirect("dash.php");
            else
            page::redirect($redirect);
        }
        
        static function generateSession()
        {
            return hash("sha1",(mt_rand(-6999,6999)*mt_rand()*mt_rand()/mt_rand()+mt_rand()+200));
        }
        
        static function logout()
        {
            $_SESSION['user'] = null;
            unset($_SESSION['user']);
            ntf::create(1,"You logged off sucessfully");
        }
        
    }
?>