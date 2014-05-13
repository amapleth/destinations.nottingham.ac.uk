<?php

 
class testAuthentication
{
	
	public static $access;
	
	
	public static function isValidUser()
	{
		
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true || $_COOKIE['_lgd']=="true")
		{
			
		 return true;
			
			
			
		}
		
		return false;
	}

	

	
	public static function hasValidRole($roles,$rolesWithAccess)
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