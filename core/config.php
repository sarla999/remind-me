<?php
//系统配置文件

	class core_config
	{
		private static $config = array(
									//mysql连接信息
									'mysqlhost'=>'127.0.0.1',
									'mysqluser'=>'root',
									'mysqlpass'=>'620519',
									'mysqlport'=>'3306',

									); 

		public static function config($key)
		{

			return self::$config[$key];

		}






	}

