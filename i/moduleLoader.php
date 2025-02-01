<?php
    class Module
    {
        public static $loadedModules = array();
        private static $packs = array("basic"=>array("basic","db","user","DOM"));
        static function load($module_name)
        {
            if(!@include("modules/".$module_name.".php"))
                die("<center>Fatal error: Module ".$module_name." not found!</center>");
            array_push(self::$loadedModules,$module_name);
        }
        
        static function loadIfNOT($module_name)
        {
            if(!self::isLoaded($module_name))
                self::load($module_name);
        }
        
        static function isLoaded($m)
        {
            if(in_array($m,self::$loadedModules))
                return true;
            else
                return false;
        }
        
        static function loadPackage($pack)
        {
            if(@!is_array(self::$packs[$pack]) || @empty(self::$packs[$pack]))
                die("No such module package found");
            foreach(self::$packs[$pack] as $mname)
            {
                self::load($mname);
            }
        }
    }
    session_start(array("name"=>"SID"));
?>