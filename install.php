<html>
    <body>
        <form method="POST">
            <input type="submit" name="install" value="Install DB" /><br>
            <input type="submit" name="init" value="Initial records" />
        </form>
    </body>
</html>
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
    
    $mysqli = new mysqli($host,$user,$password,$table);
    if(isset($_POST['install'])):
       // $mysqli->query("DROP TABLE `users`,`payments`");
        $mysqli->query("CREATE TABLE `users`
        (
            id int(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username varchar(18),
            password varchar(255),
            email varchar(40),
            confirmed boolean DEFAULT FALSE,
            userGroup ENUM('user','premium') NOT NULL DEFAULT 'user',
            refferedBy int(4),
            session varchar(256),
            timeOfRegister int,
            earnedBalance float DEFAULT 0,
            paymentBalance float DEFAULT 0,
            eventHistory varchar(1000),
            ipLog varchar(1000),
            visualizationLog varchar(1000)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE utf8_bin AUTO_INCREMENT=1;
        ");
        $mysqli->query("CREATE TABLE `payments`
        (
            id int(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            userId int(4),
            password varchar(255),
            timeOfRegister int,
            amount float
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
        ");
        header("Location:install.php");
    endif;
    if(isset($_POST['init'])):
        $time = time();
        $mysqli->query("INSERT INTO `users` (`username`,`password`,`email`,`timeOfRegister`) VALUES ('Quadcore','password','email','$time')");
        header("Location:install.php");
    endif;
?>