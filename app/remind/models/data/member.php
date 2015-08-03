<?php
/*
*用户注册登录 data
*/

class remind_models_data_member
{
	private $daoObj;

	public function __construct()
	{
		$this->daoObj = new remind_models_dao_member();	

	}


	public function checkUsername($username)
	{
		return $this->daoObj->checkUsername($username);

	}	



}
