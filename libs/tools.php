<?php
/*
*基础工具类
*/

class libs_tools
{
	//校验邮箱
	public static function checkEmail($email)
	{
		return filter_var($email,FILTER_VALIDATE_EMAIL);

	}

	//校验URL
	public static function checkUrl($url)
	{
		return filter_var($url,FILTER_VALIDATE_URL);
	}

	//获取用来源IP
	public static function getIp()
	{  
		$unknown = 'unknown';  

		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown) ) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
			} elseif ( isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){  
				$ip = $_SERVER['REMOTE_ADDR'];  
			}  

		if (false !== strpos($ip, ',')){
			$ip = reset(explode(',', $ip));  
		}  

 		return $ip;  

	} 

	//加密
	public static function encrypt($key)
	{
		$resstr = base64_encode(trim($key));
		$keylen = strlen($resstr);
		$m = intval($keylen/2);
		for($i=0;$i<$keylen;$i++){
			$resdata[$i] = $resstr[$i];
		}
		
		list($resdata[2],$resdata[$keylen-3]) = array($resdata[$keylen-3],$resdata[2]);
		list($resdata[4],$resdata[$keylen-5]) = array($resdata[$keylen-5],$resdata[4]);
		list($resdata[$m-1],$resdata[$m+1]) = array($resdata[$m+1],$resdata[$m-1]);
		return  implode("",$resdata);
	}

	//解密
	public static function decrypt($enkey)
	{
		$keylen = strlen(trim($enkey));	
		$m = intval($keylen/2);
		
		for($i=0;$i<$keylen;$i++){
			$resdata[$i] = $enkey[$i];
		}
		
		list($resdata[$keylen-3],$resdata[2]) = array($resdata[2],$resdata[$keylen-3]);
		list($resdata[$keylen-5],$resdata[4]) = array($resdata[4],$resdata[$keylen-5]);
		list($resdata[$m+1],$resdata[$m-1]) = array($resdata[$m-1],$resdata[$m+1]);
		$encrypt = implode("",$resdata);
		return base64_decode($encrypt);

	}
	


}
