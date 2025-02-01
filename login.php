<?php
    require_once('i/moduleLoader.php');
    Module::load("login");
    Module::loadPackage("basic");
    page::notlogged();
    DOM::head("Member login");
?>
    <script src="script/spell.js"></script>
    <div class="content allowfullwidth">
        <div class="login-screen">
            <a class="logo"></a>
            <h1>Member login</h1>
            
            <?php if(ntf::isAvailable()): ?>
            <span class="error-field">
                <label><?php echo ntf::$notification['TITLE']; ?></label>
            </span>
            <?php ntf::clear(); endif; ?>
            <script type="text/javascript">
                window.onload = function(){
                   var submit = document.getElementsByName("send_login")[0];
                   submit.addEventListener("click",function(){submit.value="Please Wait...";});}
            </script>
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
                        <a href="#">Forgotten account credenitials?</a><br>
                        <a href="register.php">Have not signed up?</a>
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
            <div class="clear"></div>
            <div class="footer">
                Coinmine is a registered trademark of Quad Corporation.Copyright 2015
            </div>
                        <div class="clear"></div>

        </div>
    </div>
<?php
if(isset($_POST['send_login'])):
        $username = $_POST['username'];
        $password = $_POST['password'];
        login::input($username,$password,@$_GET['redirect']);
        endif;
    echo user::$username;
    DOM::pageEnd();
?>