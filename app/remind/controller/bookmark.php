<?php
/*
*收藏书签 controller
*/
class remind_controller_bookmark
{

	private $dataObj;

	public function __construct()
	{
		$this->dataObj = new remind_models_data_bookmark();

	}


	public function index()
	{

		echo 'this is a tag func';

	}


	public function addbookmark()
	{
		//检测用户是否己登录
		
		//判断用户提交参数是否合法	
		 if(!isset($_GET['uid']) && !empty($_GET['uid']) && !isset($_GET['name']) && !empty($_GET['name']) && !isset($_GET['location']) && !empty($_GET['location']) && !isset($_GET['tags']) && !empty($_GET['tags']) && !isset($_GET['notes']) && !empty($_GET['notes']) && !isset($_GET['public']) && !empty($_GET['public'])){

			echo '提交参数错误';
		}

		print_r($_GET);
		
		//对提交信息进行安全过滤
		$uid = intval($_GET['uid']);
		$name =	libs_tools::filterXss($_GET['name']);
		$location = libs_tools::filterXss($_GET['location']);
		$tags = libs_tools::filterXss($_GET['tags']);
		$notes = libs_tools::filterXss($_GET['notes']);
		$public = intval($_GET['public']);

		//判断标签是否己有
		//$status = $this->dataObj->checkBookMark($_GET['location']);
		
		//执行插入
		$resdata = $this->dataObj->addBookMark($uid,$name,$location,$tags,$notes,$public);

	}


	public function getallbookmark()
	{
		$resdata = $this->dataObj->getAllBookMark();
		print_r($resdata);

	}








}
