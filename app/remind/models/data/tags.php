<?php
/*
*通用tags data
*/

class remind_models_data_tags
{
	private $daoObj;

	public function __construct()
	{
		$this->daoObj = new remind_models_dao_tags();	
	}

	//添加tags
	public function addTag($tagname,$username)
	{
		return $this->daoObj->addTag($tagname,$username);
	}

	//检测tag是否存在
	public function checkTag($tagname)
	{
		return $this->daoObj->checkTag($tagname);
	}	

	//获取所有tag信息
	public function getAllTags()
	{
		return $this->daoObj->getAllTags();

	}

	//更新tag引用次数
	public function updateTagRef($tagname)
	{

		return $this->daoObj->updateTagRef($tagname);

	}
		


}
