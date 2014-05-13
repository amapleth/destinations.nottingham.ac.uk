<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
 
class Authenticate
{
	
	protected static $userRegEx = "/^[a-zA-Z0-9]{3,}$/"; 
	
	
	protected static function isValidUser()
	{
		
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true)
		{
			//this user is not authenticated hold name in session so force them back to login
			
		 return true;
			
			
			
		}
		return false;
	}

	

	protected function checkLdap($username,$password,$config)
	{
		
		
		if ($username && $password)
		{
			try
			{
				$connection = @ldap_connect ($config->ldaphost, $config->ldapport);
				if ($connection === false) throw new Exception("Unable to Connect to authentication server: ldap_connect($ldaphost, $ldapport)");

				$bind = ldap_bind($connection, $config->ldapuser, $config->ldappass);
				if ($bind === false) throw new Exception("Unable to Connect to  authentication server: ldap_bind($connection, $ldapuser, xxxxxxxxx)");

				$search = @ldap_search($connection, $config->ldaprootdn, $config->ldapquery,$config->ldapattributes);
				
				if ($search == false) 	throw new Exception("Unable to find user: ldap_search($connection, $ldaprootdn, $ldapquery, $ldapattributes)");
			
				$count = @ldap_count_entries($connection, $search);
				var_dump($count); 
				
				if ($count ==false) throw new Exception("Unable to find user details: ldap_count_entries($connection, $search)");

				$results = @ldap_get_entries($connection, $search);
				if ($results === false) throw new Exception("Unable to find user details: ldap_get_entries($connection, $search)");

				$authbind = @ldap_bind($connection, $results[0]["dn"], $password);
				if ($authbind === false) throw new Exception('Incorrect username or password: ldap_bind('.$connection.', '.$results[0]["dn"].',[password not shown])');
				
				ldap_close($connection);


				
				$userRoles = array();
				$personName = "";

				if(isset($results[0]))
				{
					
					if (isset($results[0]['pdsrole'])) $userRoles = $results[0]['pdsrole'];

					if (isset($results[0]['employeenumber'][0])) $userId = $results[0]['employeenumber'][0];

					if (isset($results[0]['displayname'][0])) $personName = $results[0]['displayname'][0];
				}
				
				return array("user"=>$username,"roles"=>$userRoles,"Name"=>$personName);
				
			}
			catch (Exception $ldapException)
			{
				$errors=explode(":",$ldapException->getMessage());
				error_log("[AUTH ERROR:]".$ldapException->getMessage()); 
				return array("error"=>$errors[0]);
				
			}
			
		}
		
}

	
	

	protected function hasValidRole($roles,$rolesWithAccess)
	{
		foreach($roles as $role)
		{
			if(in_array(strtolower($role),array_map('strtolower',$rolesWithAccess)))
			{
				return true;
			}
		}
		return false;
	}
	
}
