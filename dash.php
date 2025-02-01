<?php
    require_once('i/moduleLoader.php');
    Module::load("login");
    Module::loadPackage("basic");
    page::requirelogin();
    DOM::head("Fast growing PTC network");
    DOM::fixedHeader();
?>
    <script type="text/javascript">
        var _0x5409=["d","getElementsByName","t","show","hide"];var r=document[_0x5409[1]](_0x5409[0]);var t=document[_0x5409[1]](_0x5409[2]);function o(_0x720cx4){$(r[_0x720cx4])[_0x5409[3]]();$(t[_0x720cx4])[_0x5409[3]]()}function oo(_0x720cx4){$(r[_0x720cx4])[_0x5409[4]]();$(t[_0x720cx4])[_0x5409[4]]()}$( document ).ready(function(){ $(".user-clicks-stat").hide(); $(".user-clicks-stat").slideDown(1600); });
        </script>
        <div class="content">
            <div class="pageinfo"><h1>dashboard</h1></div>
        </div>
            <div class="content">
                <div class="panel-back">
                    <div class="inner">
                        <div class="left">
                            <p class="username"><?php echo user::$username; ?></p>
                            <a href="#" class="membership">standart</a>
                            <span class="avatar"></span>
                            <a href="#">Change picture</a>
                            <div class="vertical-menu">
                                <span>Account</span>
                                <a href="#">Account overview</a>
                                <a href="#">Settings</a>
                                <a href="#">Cashout</a>
                                <a href="#">Upgrade</a>
                                <span>Refferals</span>
                                <a href="#">Refferal link</a>
                                <a href="#">Rented refferals</a>
                                <a href="#">Direct refferals</a>
                                <span>Advertising</span>
                                <a href="#">Advertise with us</a>
                                <a href="#">Promote us</a>
                            </div>
                        </div>
                        <div class="right">
                            <span class="title">Account overview</span>
                            
                            <span class="section-title"><p>Balance</p></span>
                                <span class="money-box-main main"><b><?php echo user::$earned_balance; ?></b><p>Main Balance</p></span>
                                <span class="money-box-main purchase"><b><?php echo user::$payment_balance; ?></b><p>Purchase Balance</p></span>
                                <span class="money-box-main withdrawn"><b>0.00</b><p>Withdrawn</p></span>
                            <div class="clear"></div>
                            <a href="#" class="button-charge">Add funds</a>
                            <a href="#" class="button-cashout">Cashout</a>
                            <div style="margin-bottom:50px;" class="clear"></div>
                            <span class="section-title"><p>Clicks statistics</p></span>
                            <div class="user-clicks-stat">
                            <?php DOM::drawGraphSevenDay(); ?>
                            </div>
                            <span class="section-title"><p>Account details</p></span>
                            <div class="user-info">
                                <span class="membership">Standart</span>
                            <a href="#">Upgrade</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                
            </script>
<?php 
    DOM::pageEnd();
?>
<?php
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        login::input($username,$password);
    }
?>