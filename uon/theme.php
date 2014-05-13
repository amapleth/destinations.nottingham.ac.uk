<?php
class Theme
{
	
	public static function getContent($url)
	{
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		
		return $output;
	}
	
	public static function getHeader()
	{
		return self::getContent("http://www.nottingham.ac.uk/common/assets/uon-app-header.html");
	}
	
	public static function getFooter()
	{
		return self::getContent("http://www.nottingham.ac.uk/common/assets/uon-app-footer.html");
	}
}