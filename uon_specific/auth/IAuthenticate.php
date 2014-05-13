<?php
/**
 * 
 * @author Shaun Hare
 * @abstract A interface for the central php Authentication service - to be replaced by CAS
 *
 */
interface IAuthenticate 
{
	
	public function getUser();
	
	public function forceAuthentication();
	
	public function client();
	
}