<?php
error_reporting(E_ALL);
//系统配置文件

	class core_config
	{
		private static $appname;

		protected function __construct($appname)
		{
			self::$appname = $appname;
			
			//定义系统常量
			define('APP_NAME',self::$appname);
			define('ROOT_PATH',dirname(dirname(__FILE__)));
			define('APP_PATH',ROOT_PATH.'/app');
			define('TPL',ROOT_PATH.'/templates');

			//应用程序自动加载方法
			spl_autoload_register(array('self','sysAutoload'));

		}
		
		public static function appInit($appname)
		{
			return new self($appname);
		}


		private function sysAutoload($classname){

			$pathArr = array('core','libs'); //注册系统目录

			$prePath = explode('_',$classname);

			if(in_array(strtolower($prePath[0]),$pathArr)){
				$fh = ROOT_PATH.'/'.str_replace('_','/',strtolower($classname)).'.php';
				if(is_file($fh)){
					include_once($fh);
				}
			}else{
				$fh = ROOT_PATH.'/app/'.str_replace('_','/',strtolower($classname)).'.php';	
				if(is_file($fh)){
					include_once($fh);
				}

			}

		}
		

		public static function appRun()
		{
			$classaction = core_route::parse_request();			
			
			$classname = $classaction['class'];
			$action = $classaction['func'];
			
			$classObj = new $classname();
			return $classObj->$action();
			
			

		}

		


		


	}

