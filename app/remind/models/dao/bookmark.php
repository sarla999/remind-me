<?php
/*
*bookmark dao
*/
class remind_models_dao_bookmark extends core_db{
        protected $dbName = 'sso';
        protected $tableName = 'bookmark';
		protected $dbType = 'mysql';
	protected $fields = array(
		'id',
		'uid',
		'name',
		'location',
		'tags',
		'notes',
		'public',
		'status', //1为正常4为禁止
		'addtime',
		'updatetime',
	);

	public function __construct(){
		parent::__construct();
	}

	//添加一条新书签
	public function addBookMark($uid,$name,$location,$tags,$notes,$public){

		$filedsArr['addtime'] = $filedsArr['updatetime'] = $_SERVER['REQUEST_TIME'];
        $filedsArr['uid'] = $uid;
        $filedsArr['name'] = $name;
        $filedsArr['location'] = $location;
        $filedsArr['tags'] = $tags;
		$filedsArr['notes'] = $notes;
		$filedsArr['public'] = $public;
		$filedsArr['status'] = 1;

        return $this->insert($filedsArr);
		
	}	


	//禁止某书签
	public function bannedBookMark($bookmarkid){
		$this->resetwhere();
		$this->where("id=$bookmarkid");	
		$status = 4;
		return $this->update(array('status'=>$status));
	}

	//获得所有书签信息
	public function getAllBookMark(){
		$this->resetwhere();
		$resdata = $this->findAll();
		return $resdata;	

	}

	//检测域名是否己经登记过
	public function checkBookMark($location){
		$this->resetwhere();
		$this->where("location = '$location'");	
		$resdata = $this->find();
		return $resdata;
	}




}
