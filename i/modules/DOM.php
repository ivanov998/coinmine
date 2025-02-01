<?php //DOM

    class DOM
    {
        static function head($title)
        {
            if(!empty($title))
                $title = "- " . $title;
            echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
        <html>
            <head>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"i/style.css\" />
        <script src=\"//code.jquery.com/jquery-1.11.2.min.js\"></script>
        <script src=\"//code.jquery.com/jquery-migrate-1.2.1.min.js\"></script>
        <script src=\"script/generic.js\"></script>
        <title>CoinMine $title</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,600' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Mono:300,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
        <meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
        <meta name='keywords' content='tagove' />
        <meta name='description' content='opisanie' />
        <meta http-equiv=\"content-language\" content=\"en\" />
        <meta name='google' content=”notranslate' />
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name='robots' content='index, nofollow' />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    </head>
    <body>
    ";
        }
        
        static function fixedHeader()
        {
            echo "
            <div class=\"fixed-header\">
                <div class=\"inner-header\">
                    <a href=\"index.php\" class=\"logo\" title=\"CoinMine homepage\"></a>
                    <div class=\"nav\">";
                if(!user::isLogged()):
                        echo "
                        <a href=\"#\">Advertise</a>
                        <a href=\"#\">Support</a>
                        <a href=\"register.php\">Register</a>
                        <a href=\"login.php\">Login</a>
                        ";
                else:
                        echo "
                        <a href=\"#\">Advertisements</a>
                        <a href=\"#\">Support</a>
                        <a href=\"logout.php\">Forums</a>";
                endif;
                echo "
                    </div>
                    ";
                if(user::isLogged()):
                    echo"
                    <div class=\"user-panel\">
                        <div class=\"dropdown\">
                            <span class=\"menu-btn\"></span>
                            <span class=\"submenus\">
                                <a href=\"dash.php\">Dashboard</a>
                                <a href=\"dash.php\">Cashout/Charge funds</a>
                                <a href=\"dash.php\">Settings</a>
                                <a href=\"logout.php\">Logout</a>
                            </span>
                        </div>
                        <div class=\"icon-navigation\">
                            <a href=\"settings.php\" class=\"icon settings\" title=\"Settings\"></a>
                            <a href=\"settings.php\" class=\"icon stats\" title=\"Detailed statistics\"></a>
                            <a href=\"settings.php\" class=\"icon refferals\" title=\"Refferals\"></a>
                            <a href=\"settings.php\" class=\"icon link\" title=\"Refferal link\"></a>
                        </div>
                        <a href=\"#\" class=\"money\">$" . user::$earned_balance . "</a>
                        <a href=\"dash.php\" class=\"username\">" . user::$username . "</a>
                    </div>
                    ";
                endif;
            echo"
                </div>
            </div>";
            if(ntf::isAvailable()):
            $type = ntf::$notification['TYPE'];
            $type = $type===0 ?"e":"s";
            echo "
            <span id=\"notification\" class=\"notification $type\">" . ntf::$notification['TITLE'] . "</span>";
            ntf::clear();
            endif;
        }
        
        static function loadNotification()
        {
            echo "
            <div class=\"notification success\">
                <div class=\"inner\">
                    <p>You logged in successfully</p>
                    <a class=\"close\"></a>
                </div>
            </div>
            ";
        }
        
        static function pageEnd()
        {
            echo "
            
            </body>
            </html>
            ";
            db::closePDO();
        }
        static function drawGraphSevenDay()
        {
            $days = array(8,20,30,40,7,72,20);
            $date = array();
            $daysPos = array();
            $division = ceil(ceil((max($days)*0.8))/7/2) * 2;
            $max = $division*10;
            for($i = 0;$i<7;$i++)
            {
                $daysPos[$i]=300-(($days[$i]/$max)*300);
            }
            for($i = 0;$i<7;$i++)
                $date[$i] = date("d.m.y",time()-(86400*$i));
            echo
            '            
                <svg xmlns:xlink="http://www.w3.org/1999/xlink">

              <line x1="52" y1="0" x2="52" y2="310" style="stroke:#777;stroke-width:1" />
              <line x1="52" y1="30" x2="640" y2="30" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="60" x2="640" y2="60" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="90" x2="640" y2="90" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="120" x2="640" y2="120" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="150" x2="640" y2="150" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="180" x2="640" y2="180" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="210" x2="640" y2="210" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="240" x2="640" y2="240" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="270" x2="640" y2="270" style="stroke:#000;stroke-width:0.1" />
              <line x1="52" y1="300" x2="640" y2="300" style="stroke:#000;stroke-width:0.1" />

            <text x="46" dy=".05em" y="300" style="text-anchor: end;alignment-baseline:middle;">0</text>
            <text x="46" dy=".05em" y="270" style="text-anchor: end;alignment-baseline:middle;">'.$division.'</text>
            <text x="46" dy=".05em" y="240" style="text-anchor: end;alignment-baseline:middle;">'.($division*2) .'</text>
            <text x="46" dy=".05em" y="210" style="text-anchor: end;alignment-baseline:middle;">'.($division*3) .'</text>
            <text x="46" dy=".05em" y="180" style="text-anchor: end;alignment-baseline:middle;">'.($division*4) .'</text>
            <text x="46" dy=".05em" y="150" style="text-anchor: end;alignment-baseline:middle;">'.($division*5) .'</text>
            <text x="46" dy=".05em" y="120" style="text-anchor: end;alignment-baseline:middle;">'.($division*6) .'</text>
            <text x="46" dy=".05em" y="90" style="text-anchor: end;alignment-baseline:middle;">'.($division*7) .'</text>
            <text x="46" dy=".05em" y="60" style="text-anchor: end;alignment-baseline:middle;">'.($division*8) .'</text>
            <text x="46" dy=".05em" y="30" style="text-anchor: end;alignment-baseline:middle;">'.($division*9) .'</text>

              <line x1="52" y1="'.$daysPos[0].'" x2="149" y2="'.$daysPos[1].'" style="stroke:rgb(70,225,225);stroke-width:3" />
              <line x1="149" y1="'.$daysPos[1].'" x2="246" y2="'.$daysPos[2].'" style="stroke:rgb(70,225,225);stroke-width:3" />
              <line x1="246" y1="'.$daysPos[2].'" x2="343" y2="'.$daysPos[3].'" style="stroke:rgb(70,225,225);stroke-width:3" />
              <line x1="343" y1="'.$daysPos[3].'" x2="440" y2="'.$daysPos[4].'" style="stroke:rgb(70,225,225);stroke-width:3" />
              <line x1="440" y1="'.$daysPos[4].'" x2="537" y2="'.$daysPos[5].'" style="stroke:rgb(70,225,225);stroke-width:3" />
              <line x1="537" y1="'.$daysPos[5].'" x2="634" y2="'.$daysPos[6].'" style="stroke:rgb(70,225,225);stroke-width:3" />

                <circle cx="52" cy="'.$daysPos[0].'" r="5" onmouseover="o(0)" onmouseout="oo(0)" fill="rgb(70,225,225)" />
                <circle cx="149" cy="'.$daysPos[1].'" r="5" onmouseover="o(1)" onmouseout="oo(1)"  fill="rgb(70,225,225)" />
                <circle cx="246" cy="'.$daysPos[2].'" r="5" onmouseover="o(2)" onmouseout="oo(2)"  fill="rgb(70,225,225)" />
                <circle cx="343" cy="'.$daysPos[3].'" r="5" onmouseover="o(3)" onmouseout="oo(3)"  fill="rgb(70,225,225)" />
                <circle cx="440" cy="'.$daysPos[4].'" r="5" onmouseover="o(4)" onmouseout="oo(4)"  fill="rgb(70,225,225)" />
                <circle cx="537" cy="'.$daysPos[5].'" r="5" onmouseover="o(5)" onmouseout="oo(5)"  fill="rgb(70,225,225)" />
                <circle cx="634" cy="'.$daysPos[6].'" r="5" onmouseover="o(6)" onmouseout="oo(6)"  fill="rgb(70,225,225)" />
                
                <rect x="60" y="'.($daysPos[0]-30).'" width="100" height="18" name="d"/>
                <text x="65" y="'.($daysPos[0]-16).'" name="t">'.$date[6].', '.$days[0].'</text>     
                
                <rect x="157" y="'.($daysPos[1]-30).'" width="100" height="18" name="d"/>
                <text x="162" y="'.($daysPos[1]-16).'" name="t">'.$date[5].', '.$days[1].'</text>
                
                <rect x="254" y="'.($daysPos[2]-30).'" width="100" height="18" name="d"/>
                <text x="259" y="'.($daysPos[2]-16).'" name="t">'.$date[4].', '.$days[2].'</text>
                
                <rect x="351" y="'.($daysPos[3]-30).'" width="100" height="18" name="d"/>
                <text x="356" y="'.($daysPos[3]-16).'" name="t">'.$date[3].', '.$days[3].'</text>
                
                <rect x="448" y="'.($daysPos[4]-30).'" width="100" height="18" name="d"/>
                <text x="453" y="'.($daysPos[4]-16).'" name="t">'.$date[2].', '.$days[4].'</text>
                
                <rect x="448" y="'.($daysPos[5]-30).'" width="100" height="18" name="d"/>
                <text x="453" y="'.($daysPos[5]-16).'" name="t">'.$date[1].', '.$days[5].'</text>
                
                <rect x="535" y="'.($daysPos[6]-30).'" width="100" height="18" name="d"/>
                <text x="540" y="'.($daysPos[6]-16).'" name="t">'.$date[0].', '.$days[6].'</text>
                
              Your browser is not supporting SVG(Scalable Vector Graphics).Sorry
            </svg>
            <span class="heading"><p>Recent click history</p></span>
    ';
        }
    }

?>