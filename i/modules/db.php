<?php
    define("DEBUG",true);
    if(DEBUG)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }
    $host = "localhost";
    $table = "ptc";
    $user = "root";
    $password = '123123';

    try
    {
        db::$DBH = new PDO("mysql:host=$host;dbname=$table", $user, $password);
    }
    catch(PDOException $e)
    {
        echo "<center><h1>Unexpected error occured.If this problem persists, try contacting support.<br>Error code:1".$e->getCode().
            "</h1></center>";
        exit;
    }
    class db
    {
        static $DBH;
        static function closePDO()
        {
            self::$DBH = NULL;
        }
    }
?>