<?php
/*
*用户留言 data
*/

class remind_models_data_feedback
{
	private $daoObj;

	public function __construct()
	{
		$this->daoObj = new remind_models_dao_feedback();	
	}

	//添加新留言
	public function addFeedback($username,$comment)
	{
		return $this->daoObj->addFeedback($username,$comment);
	}


	//获取所有留言
	public function getAllFeedback()
	{
		return $this->daoObj->getAllFeedback();

	}

	
	//更新留言处理状态
	public function processFeedback($feedbackid)
	{
		return $this->daoObj->processFeedback($feedbackid);

	}


}
