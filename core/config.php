<?php
error_reporting(E_ALL);
//系统配置文件

	class core_config
	{
		private static $appname;

		protected function __construct($appname)
		{
			$this->appname = $appname;
			
			//定义系统常量
			define('APP_NAME',$this->appname);
			define('ROOT_PATH',dirname(dirname(__FILE__)));
			define('APP_PATH',ROOT_PATH.'/app');

			//应用程序自动加载方法
			spl_autoload_register(array('self','appAutoload'));

		}
		
		public static function appInit($appname)
		{
			return new self($appname);
		}


		public static function appAutoload($classname){

			$fh = ROOT_PATH.'/app/'.str_replace('_','/',strtolower($classname)).'.php';	
			if(is_file($fh)){
				include_once($fh);
				return ;
			}
			$fh = APP_PATH.'/'.str_replace('_','/',strtolower($classname)).'.php';
				include_once($fh);

		}

		


		


	}

