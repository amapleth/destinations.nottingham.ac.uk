<?php
session_start();
include_once('/usr/local/web/p5auth/authFactory.php');
include_once('uon_specific/classes/clsAuthenticate.php');

$auth=authfactory::create(); 
$token = $auth->client();
$applicationName="GEMS";
echo "<!--",$_SERVER['SERVER_ADDR'],"-->";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="templates/style/login.css" rel="Stylesheet" type="text/css" media="screen" />
<!--[if IE]>
<link href="templates/style/ie-login.css" rel="Stylesheet" type="text/css" media="screen" />
<![endif]-->
<title>Graduate Employment Market Statistics (GEMS)</title>
</head>
<body>

<!-- start amended uon logon form -->
<form action="https://www.nottingham.ac.uk/p5auth/auth.php?/templates/uon_specific/verify.php" method="post" id="login"> 
<div id="branding">

<h2><a href="http://my.nottingham.ac.uk">Intranet</a></h2>

</div>
<h3><?php echo $applicationName; ?></h3>

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
