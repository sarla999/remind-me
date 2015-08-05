<?php

class remind_models_dao_member extends core_db{
        protected $dbName = 'sso';
        protected $tableName = 'common_member';
		protected $dbType = 'mysql';
	protected $fields = array(
		'id',
		'username',
		'phone',
		'passwd',
		'regtime',
		'ip',
		'logintime',
		'status', //1为正常4为禁止
	);

	public function __construct(){
		parent::__construct();
	}

	//添加新用户 
	public function addUser($username,$passwd){
		$filedsArr['logintime'] = $filedsArr['regtime'] = $_SERVER['REQUEST_TIME'];
		$filedsArr['ip'] = libs_tools::getIp();
		$filedsArr['username'] = $username;
		$filedsArr['passwd'] = $passwd;
		$filedsArr['phone'] = '';
		$filedsArr['status'] = 1;

		return $this->insert($filedsArr);
		

	}	

	//检测用户名与密码是否正确
	public function checkUser($username,$passwd){
		$this->resetwhere();
		$this->where("username = '$username' AND passwd = '$passwd'");	
		$resdata = $this->find();
		return $resdata;		

	}

	//更新用户密码
	public function updatePasswd($uid,$passwd){
		$this->resetwhere();
		$this->where("id=$uid");
		return $this->update(array('passwd'=>$passwd));
	}

	//更新用户名称
	public function updateUsername($uid,$username){
		$this->resetwhere();
		$this->where("id=$uid");
		return $this->update(array('username'=>$username));
	}

	//禁止某用户
	public function bannedUser($uid){
		$this->resetwhere();
		$this->where("id=$uid");	
		$status = 4;
		return $this->update(array('status'=>$status));
	}

	//获得所有注册用户信息
	public function getAllUser(){
		$this->resetwhere();
		$resdata = $this->findAll();
		return $resdata;	

	}

	//检测用户名是否己被注册
	public function checkUsername($username){
		$this->resetwhere();
		$this->where("username = '$username'");	
		$resdata = $this->find();
		return $resdata;
	}



}
