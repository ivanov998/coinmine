<?php
    require_once('i/moduleLoader.php');
    Module::load("db");
    Module::load("basic");
    Module::load("user");
    if(!user::isLogged())
        header("location:index.php");
    Module::load("login");
    login::logout();
?>
    <head>
        <link rel="stylesheet" type="text/css" href="i/style.css" />
        <link href='https://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
        <script type="text/javascript"></script>
        <meta http-equiv="refresh" content="3;URL=index.php">
        <script type="text/javascript">
            var _0xa86b=["onload","index.php","assign","location"];window[_0xa86b[0]]= function(){setTimeout(function(){window[_0xa86b[3]][_0xa86b[2]](_0xa86b[1])},2020)}
        </script>
    </head>
    <body style="background:#fff !important;">
        <div class="content index">
            <div class="logout">
                <img src="img/icons/logout_load.gif"/>
                <br>
                <h1>Logging you out securely</h1>
            </div>
        </div>
    </body>