<?php

	class remind_controller_index
	{
	
		public function __construct()
		{
			//core_templates::view('test.html');

			$str = libs_tools::encrypt('shiyili@eyou.com');

			echo $str;
			echo '<br>';
			$str1 = libs_tools::decrypt($str);
			echo $str1;
		

		}

		public function index(){}	



	}




