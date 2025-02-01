<?php
    require_once('i/moduleLoader.php');
    Module::load("login");
    Module::loadPackage("basic");
    DOM::head("Fast growing PTC network");
    DOM::fixedHeader();
?>

<?php
    DOM::pageEnd();
?>