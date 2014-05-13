<?php
date_default_timezone_set("Europe/London");
error_reporting(E_ALL);
ini_set("display_errors", 1);

//include_once('uon_specific/auth//usr/local/web/p5auth/authFactory.php');
include_once('authFactory.php');
include_once('clsAuthenticate.php');

//$auth=authfactory::create();
//$token = $auth->client();
$auth = AuthFactory::create();
$token = $auth->client();
$applicationName="GEMS";
echo "<!--",$_SERVER['SERVER_ADDR'],"-->";
if (isset($_GET['error'])){
    $error = $_GET['error'];
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../../templates/style/login.css" rel="Stylesheet" type="text/css" media="screen" />
<!--[if IE]>
<link href="../../templates/style/ie-login.css" rel="Stylesheet" type="text/css" media="screen" />
<![endif]-->
<title>Graduate Employment Market Statistics (GEMS)</title>
</head>
<body>

<!-- start amended uon logon form -->
<form action="checkLogin.php" method="post" id="login">
<div id="branding">

<h2><a href="http://my.nottingham.ac.uk">Intranet</a></h2>

</div>
<h3><?php echo $applicationName; ?></h3>
    <?php
    if (isset($error)){
        print "$error <br/>";
}

    ?>


    <fieldset>
<?php if(isset($_GET["reason"]))
{
	echo "<p class='warning'>", htmlentities($_GET['reason']),"</p>"; 
}?>
<?php $auth->forceAuthentication();?>



<input type="submit" value="login" class="btn" />


<input type="hidden" class="hidden" value="login" name="action" />
</fieldset>
</form>

</body>
</html>
