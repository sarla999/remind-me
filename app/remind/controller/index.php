<?php

	class remind_controller_index
	{
	
		public function __construct()
		{
			//core_templates::view('test.html');

			$str = libs_tools::encrypt('shiyili@eyou.com@52');

			echo $str;
			echo '<br>';
			$str1 = libs_tools::decrypt($str);
			echo $str1;
			
			$ada = new remind_models_data_member();
			$ada->regCookie($str);
			echo '<br>---';
			$ada->getCookie();



		}

		public function index(){}	



	}




