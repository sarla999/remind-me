<?php
/*
*收藏书签 controller
*/
class remind_controller_bookmark
{

	private $dataObj;
	private $userObj;

	public function __construct()
	{
		$this->dataObj = new remind_models_data_bookmark();
		$this->userObj = new remind_models_data_member();
	

	}


	public function index()
	{

		echo 'this is a tag func';
		$logininfo = $this->userObj->needLogin();
		print_r($logininfo);

	}


	public function addbookmark()
	{
		//检测用户是否己登录
		$logininfo = $this->userObj->needLogin();
		
		//判断用户提交参数是否合法	
		 if(!isset($_GET['uid']) && !empty($_GET['uid']) && !isset($_GET['name']) && !empty($_GET['name']) && !isset($_GET['location']) && !empty($_GET['location']) && !isset($_GET['tags']) && !empty($_GET['tags']) && !isset($_GET['notes']) && !empty($_GET['notes']) && !isset($_GET['public']) && !empty($_GET['public'])){

			echo '提交参数错误';
		}

		
		//对提交信息进行安全过滤
		$uid = intval($_GET['uid']);
		
		//判断登录ID与提交ID是否一致
		if($uid != $logininfo[1]){

			echo '非法提交信息';
			return ;

			}

		$name =	libs_tools::filterXss($_GET['name']);
		$location = libs_tools::filterXss($_GET['location']);
		$tags = libs_tools::filterXss($_GET['tags']);
		$notes = libs_tools::filterXss($_GET['notes']);
		$public = intval($_GET['public']);

		
		//执行插入
		$resdata = $this->dataObj->addBookMark($uid,$name,$location,$tags,$notes,$public);

	}


	public function getallbookmark()
	{
		$resdata = $this->dataObj->getAllBookMark();
		print_r($resdata);

	}








}
