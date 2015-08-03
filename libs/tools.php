<?php
/*
*基础工具类
*/

class libs_tools
{
	public static function checkEmail($email)
	{
		return filter_var($email,FILTER_VALIDATE_EMAIL);

	}


	public static function checkUrl($url)
	{
		return filter_var($url,FILTER_VALIDATE_URL);
	}


	public static function getIp()
	{  
		$unknown = 'unknown';  
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown) ) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
			} elseif ( isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){  
				$ip = $_SERVER['REMOTE_ADDR'];  
			}  

		if (false !== strpos($ip, ','))  
		$ip = reset(explode(',', $ip));  

 		return $ip;  


	} 




}
