<?php
/**
* 路由程序
* @ return array
**/
class core_route{
	
	private static $request = array();
	private static $classname ;

	public function __construct(){


	}

	//解析URL请求
	public static function parse_request(){

		$param = parse_url($_SERVER['REQUEST_URI']);	

		if(isset($param['query'])){
			$tmparr = explode('&',$param['query']);
			foreach($tmparr as $val){
				$arr = explode('=',$val);
				if($arr[0] == 'mod'){
					self::$request['modules'] = $arr[1] ;
				}elseif($arr[0] == 'act'){
					self::$request['action'] = $arr[1];
				}
			}
		}else{
			echo 'request param error';
		}
		return self::gen_classname(self::$request);
		
	}

	
	//转换参数成类名
	private static function gen_classname(array $requestArr)
	{
		if($requestArr){
			if(isset($requestArr['modules']))
			{
				self::$classname = $requestArr['modules'].'_controller_';

			}
			if(isset($requestArr['action']))
			{
				self::$classname .= $requestArr['action'];

			}else{
				self::$classname .='index';
			}

		}

		return self::$classname;

	}





}







