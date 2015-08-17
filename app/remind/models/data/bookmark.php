<?php
/*
*书签收藏 data
*/

class remind_models_data_bookmark
{
	private $daoObj;

	public function __construct()
	{
		$this->daoObj = new remind_models_dao_bookmark();	
	}

	//添加一条新书签
	public function addBookmark($uid,$name,$location,$tags,$notes,$public)
	{
		return $this->daoObj->addBookMark($uid,$name,$location,$tags,$notes,$public);
	}

	//检测书签是否己登记过
	public function checkBookMark($location)
	{
		return $this->daoObj->checkBookMark($location);
	}	

	//获取所有书签信息
	public function getAllBookMark()
	{
		return $this->daoObj->getAllBookMark();

	}

	//禁止某条书签
	public function bannedBookMark($bookmarkid)
	{
		return $this->daoObj->bannedUser($bookmarkid);
	}
		


}
