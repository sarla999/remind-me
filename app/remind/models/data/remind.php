<?php
error_reporting(E_ALL);
class remind_models_data_remind
{
	private $daoObj;

	public function __construct()
	{
		$this->daoObj = new remind_models_dao_remind();

	}


	public function getData(){
		return $this->daoObj->getData();
	}







}









