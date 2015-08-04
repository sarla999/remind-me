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
			//if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['passwd']) && !empty($_POST['passwd'])){
			if(isset($_GET['username']) && !empty($_GET['username']) && isset($_GET['passwd']) && !empty($_GET['passwd'])){

				if(libs_tools::checkEmail($_GET['username'])){
					if($this->dataObj->checkUsername($_GET['username'])){
						echo '邮箱己被注册，请更换';
						}else{
							$username=$_GET['username'];
							$resdata =  $this->dataObj->adduser($username,$_GET['passwd']);
							echo $resdata;
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

		}


		public function checkUser()
		{
			$username = 'shiyili@eyou.com';
			$passwd = 112233;
			$res = $this->dataObj->checkUser($username,$passwd);
			print_r($res);

		}

		

		public function getall(){

			$res = $this->dataObj->getAlluser();
			print_r($res);
			}



	}




