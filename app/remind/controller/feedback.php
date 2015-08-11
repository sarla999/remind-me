<?php
/*
*用户反馈 controller
*/
class remind_controller_feedback
{

	private $dataObj;

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
		 if(!isset($_GET['username']) && !empty($_GET['username']) && !isset($_GET['comment']) && !empty($_GET['comment'])){

			echo '提交参数错误';
		}
		
		if(libs_tools::checkEmail($_GET['username'])){
			$username = $_GET['username'];
		}else{

			echo '用户名错误';
			return ;
		}

		$feedback = array();
		/*if($_GET['uid']){
			$feedback['uid'] = $_GET['uid'];
		}else{
			$_GET['uid'] = 0;
		}*/
		$comment = libs_tools::filterXss($_GET['comment']);
		return $this->dataObj->addFeedback($_GET['username'],$comment);

	}


	public function getallfeedback()
	{
		$resdata = $this->dataObj->getAllFeedback();
		print_r($resdata);

	}


	public function processfeedback()
	{
		$feedbackid = 4;
		$resdata = $this->dataObj->processFeedback($feedbackid);

	}











}
