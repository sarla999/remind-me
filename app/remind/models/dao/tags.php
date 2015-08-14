<?php
/*
*通用tags dao
*/
class remind_models_dao_tags extends core_db{
        protected $dbName = 'sso';
        protected $tableName = 'common_tags';
		protected $dbType = 'mysql';
	protected $fields = array(
		'id',
		'tagname',
		'father',
		'reference',
		'addtime',
	);

	public function __construct(){
		parent::__construct();
	}

	//添加一条tag
	public function addTag($tagname,$username){
		$filedsArr['addtime'] = $_SERVER['REQUEST_TIME'];
		$filedsArr['tagname'] = $tagname;
		$filedsArr['father'] = $username;

		return $this->insert($filedsArr);
		

	}	

	//调取所有tags
	public function getAllTags(){
		$this->resetwhere();
		$resdata = $this->findAll();
		return $resdata;		

	}


	//检测是否己有该tag
	public function checkTag($tagname)
	{
		$this->resetwhere();
		$this->where("tagname=$tagname");
		$resdata = $this->find();
		return $resdata;	

	}


	//更新tags引用次数
	public function updateTagRef($tagname)
	{
		$this->resetwhere();
		$this->where("tagname=$tagname");
        return $this->counter($this->fields[3]);
		
	}

}
