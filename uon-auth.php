<?php 
// PHP Error Settings
//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', '1');
//include_once("/opt/webspace/www/destinations.nottingham.ac.uk/2011/docs/templates/uon_specific/authenticate.php");
include_once("/opt/webspace/www/destinations.nottingham.ac.uk/templates/uon_specific/authenticate.php");
setcookie("_uonSS", session_Id() ."-".$_SERVER['SERVER_ADDR'] , time()+3600, '/');
?>