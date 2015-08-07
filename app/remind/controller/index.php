<?php

	class remind_controller_index
	{
	
		public function __construct()
		{
			//core_templates::view('test.html');
			//$sta = 'shiyili@eyou.com&2223';
			//print_r(explode('&',$sta));
			$str = libs_tools::encrypt('shiyili@eyou.com&223');

			echo $str;
			echo '<br>';
			$str1 = libs_tools::decrypt($str);
			print_r(explode('&',$str1));
			echo $str1;
			
			$ada = new remind_models_data_member();
			$ada->regCookie($str);
			//$ada->loginOut();
			echo '<br>---';
			$cookie = $ada->getCookie();
			if($cookie){

			echo 'yes you are loin';
				}else{
			echo 'who are you';

			}

			echo '<pre>';
			$str2 = '<img src="http://www.baidu.com">';

			$strs = libs_tools::filterXss($str2);

			var_dump($strs);


		}

		public function index(){}	



	}




