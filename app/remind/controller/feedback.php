<?php
/*
*用户反馈 controller
*/
class remind_controller_feedback
{

	public function __construct()
	{
		$this->dataObj = new remind_models_data_feedback();

	}

	public function index()
	{

		echo 'this is a new func';

	}


	public function addfeedback()
	{
		 if(isset($_GET['username']) && !empty($_GET['username']) && isset($_GET['comment']) && !empty($_GET['comment'])){

			echo '提交参数错误';
		}

		$feedback = array();
		if($_GET['uid']){
			$feedback['uid'] = $_GET['uid'];
		}else{
			$_GET['uid'] = 0;
		}





	}











}
