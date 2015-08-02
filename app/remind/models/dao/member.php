<?php

class remind_models_dao_member extends core_db{
        protected $dbName = 'sso';
        protected $tableName = 'common_member';
	protected $fields = array(
		'id',
		'username',
		'phone',
		'passwd',
		'regtime',
		'ip',
		'logintime',
		'status',
	);

	public function __construct(){
		parent::__construct();
	}


	public function newUser($username,$phone,$passwd){

		$filedsArr['logintime'] = $filedsArr['regtime'] = $_SERVER['REQUEST_TIME'];
		$filedsArr['ip'] = $_SERVER['REMOTE_ADDR'];
		$filedsArr['username'] = $username;
		$filedsArr['passwd'] = $passwd;
		$filedsArr['status'] = 1;

		return $this->insert($filedsArr);
		

	}	

	public function checkUser(){

		echo 'user and pass is ok or not';

	}

	public function updatePass(){

		echo 'user update passwd';
	}

	public function delUser(){
		echo 'delete user';

	}


	public function getAllUser(){
		echo 'view all user info';

	}



}
