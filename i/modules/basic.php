<?php
    class page
    {
        static $forbid_messages = FALSE;
        
        
        static function notlogged($redirect = null)
        {
            if(user::isLogged())
            {
                if($redirect!==NULL)
                    header("Location:".$redirect);
                else
                    header("Location:index.php");
                exit;
            }
        }
        
        static function requirelogin()
        {
            $r = basename($_SERVER['REQUEST_URI']);
            if(!user::isLogged())
                self::redirect("login.php?redirect=$r");
        }
        
        static function path()
        {
            
        }
        
        static function refresh()
        {
            header("Location:".basename($_SERVER['REQUEST_URI']));
        }
        
        static function redirect($loc)
        {
            header("Location:".$loc);
        }
        
    }
    
    class ntf
    {
        static $notification;
        static function create($type,$tt,$msg = null)
        {
            $_SESSION['ntf'] = array('TYPE' => $type,'TITLE' => $tt,'MESSAGE' => $msg);
        }
        
        static function isAvailable()
        {
            self::$notification = @$_SESSION['ntf'];
            return isset($_SESSION['ntf']) && !empty($_SESSION['ntf']);
        }
        
        static function clear()
        {
            unset($_SESSION['ntf']);
        }
    }
?>