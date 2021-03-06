<?php
session_start();
include_once('/usr/local/web/p5auth/authFactory.php'); 
include_once('classes/clsAuthenticate.php');
$auth=authfactory::create(); 

if(isset($_GET['auth']))
{
	$details=unserialize($auth->decrypt($_GET['auth']));
	$rolesWithAccess=array("Staff","cn_Staff","my_staff"); 
	if(testAuthentication::hasValidRole($details['roles'],$rolesWithAccess))
	{
		setcookie("_lgd", "true", time()+3600, "/", "destinations.nottingham.ac.uk", 0);
		$_SESSION["loggedin"]=true;
		
		testAuthentication::$access="";
		header("location:http://".$_SERVER["HTTP_HOST"]);
	}
	else
	{
		$reason="not got appropriate role to access";
		denyAccess($reason);
	}
	
	
	
}

if(isset($_GET['access']) && $_GET['access']=="false")
{
	switch($_GET["reason"])
	{
		case "service":
				{
					$reason="authentication system unavailable";
					break;
				}
		case "token":
			{
				$reason="not able to access authentication system";
				break;
			}
		default:
			{
				$reason = "Invalid username or password";
				break;
			}
	}
	
	denyAccess($reason);
}

function denyAccess($reason)
{
	
	header("location:http://".$_SERVER["HTTP_HOST"]."/login.php?reason=".urlencode($reason));
}
?> 