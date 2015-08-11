<?php
/*
*用户留言 dao
*/
class remind_models_dao_feedback extends core_db{
        protected $dbName = 'sso';
        protected $tableName = 'common_feedback';
		protected $dbType = 'mysql';
	protected $fields = array(
		'id',
		'username',
		'useragent',
		'time',
		'ip',
		'comment',
		'status', //0为未回复1为己回复
	);

	public function __construct(){
		parent::__construct();
	}

	//添加一条新留言
	public function addFeedback($username,$comment){
		$filedsArr['logintime'] = $_SERVER['REQUEST_TIME'];
		$filedsArr['ip'] = libs_tools::getIp();
		$filedsArr['username'] = $username;
		$filedsArr['useragent'] = $_SERVER['HTTP_USER_AGENT'];
		$filedsArr['comment'] = $comment;
		$filedsArr['status'] = 0;

		return $this->insert($filedsArr);
		

	}	

	//调取所有用户留言
	public function getAllFeedback(){
		$this->resetwhere();
		$resdata = $this->findAll();
		return $resdata;		

	}


	//更新处理留言状态
	public function processFeedback($feedbackid)
	{
		$this->resetwhere();
		$this->where("id=$feedbackid");
        $status = 1;
        return $this->update(array('status'=>$status));
		
	}
}
