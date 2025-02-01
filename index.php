<?php
    require_once('i/moduleLoader.php');
    Module::loadPackage("basic");
    DOM::head("Fast growing PTC network");
    DOM::fixedHeader();
?>
        <div class="content index">
            <div class="fullscreen">
                <div class="inner intro">
                    <h1 class="unselectable">Earning money online has never been easier!</h1>
                    <a class="btn up">Sign up</a>
                    <a class="btn in">Sign in</a>
                </div>
                <a style="cursor:pointer;" onclick="introductionScroll()" class="btn-scroll-down">
                </a>
            </div>
        </div>
        <div class="content">
            <div class="introduction">
                <h1>Why choose us?</h1>
            </div>
            <div class="introduction second">
                <h1>How it works?</h1>
            </div>    
        </div>
        
<?php 
    DOM::pageEnd();
?>