<?php
    if(!Module::isLoaded("db")) exit;
    //AUTO LOAD DATA
    user::isLogged()===TRUE?user::loadData():null;

    class user
    {
        static $data = array();
        static $isLogged = null;
        static $isDataLoaded = false;
        static $username,$email,$earned_balance,$payment_balance,$ad_log;
        static $id,$DTregister,$event_history,$group,$isConfirmed;
        
        static function isLogged()
        {
            return self::isExisting(@$_SESSION['user']['key']);
        }
        
        static function isExisting($input)
        {
            if(self::$isLogged===NULL)
            {
                if(empty($input) || !isset($input))
                    return false;
                $statement = "SELECT * FROM `users` WHERE `session` = '$input' LIMIT 1";
                $q=db::$DBH->prepare($statement);
                $q->execute();
                $q = $q->rowCount();
                self::$isLogged=$q>0?true:false;
                return self::$isLogged;
            }
            else
                return self::$isLogged;
        }

        static function loadData()
        {
            if(!empty(self::$data))
                return;
            $key = $_SESSION['user']['key'];
            $statement = "SELECT * FROM `users` WHERE `session` = '$key' LIMIT 1";
            $q = db::$DBH->prepare($statement);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            self::$data = $data;
            $q = null;
            self::fillVars($data);
        }

        static function fillVars($data)
        {
            self::$id               = $data['id'];
            self::$username         = $data['username'];
            self::$email            = $data['email'];
            self::$earned_balance   = $data['earnedBalance'];
            self::$payment_balance  = $data['paymentBalance'];
            self::$DTregister       = $data['timeOfRegister'];
            self::$event_history    = $data['eventHistory'];
            self::$group            = $data['userGroup'];
            self::$isConfirmed      = $data['confirmed']==0?false:true;
            self::$ad_log           = $data['visualizationLog'];
            //Format
            self::$earned_balance = number_format(self::$earned_balance,4);
            self::$payment_balance = number_format(self::$payment_balance,4);
        }
        
    }
?>