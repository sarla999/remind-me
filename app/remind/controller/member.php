<?php
error_reporting(E_ALL);
//controller
	class remind_controller_member
	{
		private $dataObj;
	
		public function __construct()
		{
			$this->dataObj = new remind_models_dao_member();

		}
		
		public function index()
		{
			echo 'this is member controller';
			$this->dataObj->checkUser();
			
		}


		public function adduser()
		{
			echo 'adduser';
			$username = 'shiyili@eyou.com';
			$phone = '123444';
			$passwd = '112233';
			$resdata = $this->dataObj->newUser($username,$phone,$passwd);
			print_r($resdata);
			


		}

		



	}




