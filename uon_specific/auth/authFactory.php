<?php
include_once('UoNLDAPAuthenticate.php'); 

class AuthFactory
{
	
	public static function create()
	{
		return new UoNLDAPAuthenticate();
	}
}