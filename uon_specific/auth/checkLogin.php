<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
date_default_timezone_set("Europe/London");

/**
 * Created by PhpStorm.
 * User: mszadm
 * Date: 28/03/2014
 * Time: 08:59
 */
require_once('signin.php');
print '<br/>'.'6 got here <br/>'.$_POST["username"].'<br/>';
$signin = new Signin();
if (isset($_POST["username"]) AND isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password1 = md5($_POST["password"]);
    $login = $signin->actionCheck($username,$password) ;
print '<br/>'.'5 got here <br/>'.'<br/>';
    exit;
    $host  = $_SERVER['HTTP_HOST'];
    print "host".$host.'<br/>';
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'login.php';
    print $login.'<br/>'.$login.'<br/>'.$login.'<br/> hhhh';
    print "Location: http://".$host.$uri.'/'.$extra;

    //header("Location: http://$host$uri/$extra");

    //header('Location: http://login.php?reason='.$login);

}

print "Username:-[".$username."]  <br/> Password:-[".$password."]";

