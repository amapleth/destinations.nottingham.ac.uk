<?php
$con = mysql_connect('mysql01.nottingham.ac.uk', 'uczgcw_career', '3ZA8U75');
$con = mysql_connect('dev.webapps.nottingham.ac.uk', 'uczgcw_career', 'password');
//$con = mysql_connect('dev.webapps.nottingham.ac.uk', 'mszadm', 'badsqlmonkey');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("uczgcw_career_development", $con);


function on_session_start($save_path, $session_name) {
	error_log($session_name . " ". session_id());
}

function on_session_end() {
	// Nothing needs to be done in this function
	// since we used persistent connection.
}

function on_session_read($key) {
	error_log($key);
	$stmt = "select session_data from sessions ";
	$stmt .= "where session_id ='$key' ";
	$stmt .= "and unix_timestamp(session_expiration) > unix_timestamp(date_add(now(),interval 1 hour))";
	$sth = mysql_query($stmt);

	if($sth)
	{
		$row = mysql_fetch_array($sth);
		return($row['session_data']);
	}
	else
	{
		return $sth;
	}
}
function on_session_write($key, $val) {
	error_log("$key = $val");
	$val = addslashes($val);
	$insert_stmt  = "Insert into uczgcw_career_development.sessions ('session_id','session_data','session_expiration') values('$key', ";
	$insert_stmt .= "'$val',(date_add(now(), interval 1 hour)))";

	$update_stmt  = "update sessions set session_data ='$val', ";
	$update_stmt .= "session_expiration = (date_add(now(), interval 1 hour))";
	$update_stmt .= "where session_id ='$key '";
	
	// First we try to insert, if that doesn't succeed, it means
	// session is already in the table and we try to update
	
	
	mysql_query($insert_stmt);
	
	$err = mysql_error();
	
	if ($err != 0)
	{
		error_log( mysql_error());
		mysql_query($update_stmt);
	}
}

function on_session_destroy($key) {
	mysql_query("delete from sessions where session_id = '$key'");
}

function on_session_gc($max_lifetime) 
{
	mysql_query("delete from sessions where unix_timestamp(session_expiration) < unix_timestamp(now())");
}
	
    	    
// Set the save handlers
session_set_save_handler("on_session_start",   "on_session_end",
			"on_session_read",    "on_session_write",
			"on_session_destroy", "on_session_gc");
	

session_start();
include_once('uon_specific/classes/clsAuthenticate.php'); 


 if (!testAuthentication::isValidUser())
 {
 	 	if(isset($_SESSION))
 	 	{
 	 		$_SESSION = array();
			if (isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-42000, '/');
			if (isset($_COOKIE["_uonA"])) setcookie("_uonA", '', time()-42000, '/');
		
			session_destroy();
 	 	}	
 		header("Location:login.php");
 }
 	
 

 
