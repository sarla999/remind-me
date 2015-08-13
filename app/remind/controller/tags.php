<?php
/*
*通用tags controller
*/
class remind_controller_tags
{

	private $dataObj;

	public function __construct()
	{
		$this->dataObj = new remind_models_data_tags();

	}


	public function index()
	{

		echo 'this is a tag func';

	}


	public function addtags()
	{
		 if(!isset($_GET['username']) && !empty($_GET['username']) && !isset($_GET['tagname']) && !empty($_GET['tagname'])){

			echo '提交参数错误';
		}
		
		if(libs_tools::checkEmail($_GET['username'])){
			$username = $_GET['username'];
		}else{

			echo '用户名错误';
			return ;
		}

		$tagname = libs_tools::filterXss($_GET['tagname']);

		$status = $this->dataObj->checkTag($tagname);
		//判断该tag是否己有，己有tag reference+1 else add new tag
		if($status)
		{
			return $this->dataObj->updateTagRef($tagname);
		}else{

			return $this->dataObj->addTag($tagname,$_GET['username']);
			
		}	

	}


	public function getalltags()
	{
		$resdata = $this->dataObj->getAllTags();
		print_r($resdata);

	}








}
