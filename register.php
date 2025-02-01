<?php
    require_once('i/moduleLoader.php');
    Module::load("login");
    Module::loadPackage("basic");
    DOM::head("Safe login");
?>
    <script src="script/spell.js"></script>
    <div class="content allowfullwidth index">
        <div class="login-screen">
            <span class="gradient"></span>
            <a class="logo"></a>
            <h1>Sign up for free!</h1>
            <div class="input-boxes">
                <form method="POST">
                    <span class="textbox">
                        <span class="icon username"></span>
                        <input placeholder="Username" type="text" name="username">
                    </span>
                    <span class="textbox">
                        <span class="icon password"><img /></span>
                        <input placeholder="Password" type="password" name="password">
                    </span>
                    <div class="remember">
                        <input type="checkbox" /><p>Remember me</p>
                    </div>
                    <div class="forgotten-password">
                        <a href="#">Forgotten password</a>
                    </div>
                    <div class="clear"></div>
                    <input type="submit" class="btn-login" value="Login" name="send_login">
                </form>
            </div>
            <h1>... or use social media</h1>
            <div class="social-media">
                <a href="#" class="btn fb"><p>Facebook</p></a>
                <a href="#" class="btn gp"><p>Google+</p></a>
            </div>
        </div>
    </div>
<?php
if(isset($_POST['send_login'])):
        $username = $_POST['username'];
        $password = $_POST['password'];
        login::input($username,$password);
        endif;
    echo user::$username;
    DOM::pageEnd();
?>