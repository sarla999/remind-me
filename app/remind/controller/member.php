<?php
error_reporting(E_ALL);
//controller
	class remind_controller_member
	{
		private $dataObj;
	
		public function __construct()
		{
			$this->dataObj = new remind_models_data_member();

		}
		
		public function index()
		{
			echo 'this is member controller';
			$this->dataObj->checkUser();
			
		}


		public function adduser()
		{
			if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['passwd']) && !empty($_POST['passwd'])){

				if(libs_tools::checkEmail($_POST['username'])){
					if($this->dataObj->checkUser($_POST['username'])){
						$username=$_POST['username'];
						return $this->dataObj->adduser($username,$_POST['passwd']);
						}else{
							echo '邮箱己被注册，请更换';
						}
					}else{
						echo '邮箱格式错误';
					}
			}else{
				echo '缺少参数';
			}	
		}


		public function checkUsername()
		{
			$username = 'shiyili@eyou.com';
			$res = $this->dataObj->checkUsername($username);

			print_r($res);


		}

		



	}




