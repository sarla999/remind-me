<?php
/*
*remind me todo somethins
*
*/
error_reporting(E_ALL);
class remind
{
	private $db_name = 'myremind.db';
	private $table_name = "remind";
	protected $db_type = 'sqlite';
	private $conn ;

	public function __construct()
	{
		$this->init_db($this->db_type);

	}
	
	//初始化数据库
	protected function init_db($dbtype)
	{
		if($this->db_type == 'sqlite'){
			$dsn = 'sqlite:'.$this->db_name ;

			if(file_exists($this->db_name)){
				$this->conn = new PDO($dsn);
				}else{
					$dsn = 'sqlite:'.$this->db_name ;
					$status = $this->conn = new PDO($dsn);
						if($status){
							$this->init_table();
							$this->init_data();
							echo 'create db ok!\n';
						}else{
							echo 'create db error!\n';
						}
					}
		}elseif($this->db_type == 'mysql'){
				echo 'use mysql db';	
				}

	}


	//初始化table
	protected function init_table()
	{
		$sql = "CREATE TABLE $this->table_name(id INTEGER PRIMARY KEY NOT NULL,
												title VARCHAR(50) NOT NULL,	
												sum REAL,
												refund_date INTEGER NOT NULL,
												desc VARCHAR(255) NOT NULL,
												add_date INTEGER NOT NULL,
												update_date INTEGER
												)";
		$this->conn->query($sql);
	}

	
	//初始化数据
	protected function init_data()
	{
		$add_date = time();
		$sql = "INSERT INTO $this->table_name (`title`,`sum`,`refund_date`,`desc`,`add_date`) VALUES('refund credit card',50,201582,'CMBchina',$add_date)";
		$res = $this->conn->exec($sql);
		return $res;

		//echo 'init data ok!\n';


	}	


	//查询所有数据
	public function get_all()
	{
		$sql = "SELECT * FROM $this->table_name ORDER by refund_date ASC";
		$res = $this->conn->query($sql);
		$data = $res->fetchall();
		return $data;

	}


	//插入数据
	public function insert_data($title,$sum,$refund_date,$desc)
	{
		$add_date = time();
		$sql = "INSERT INTO $this->table_name (`title`,`sum`,`refund_date`,`desc`,`add_date`) VALUES('$title',$sum,$refund_date,'$desc',$add_date)";
		$res = $this->conn->exec($sql);
		return $res;
	}

	//删除数据
	public function	del_byid($id)
	{
		$id = intval($id);
		$sql = "DELETE FROM $this->table_name WHERE id=$id";
		$res = $this->conn->exec($sql);
		return $res;

	}


	//更新数据
	public function update($id,$title,$sum,$refund_date,$desc,$add_date)
	{
		$update_date = time();
		$refund_date = strtotime($refund_date);
		$add_date = strtotime($add_date);
		$sql = "UPDATE $this->table_name SET `title`='$title' , `sum`=$sum , `refund_date`='$refund_date', `desc`='$desc',`add_date`=$add_date ,`update_date`=$update_date WHERE `id`=$id";
		$res = $this->conn->exec($sql);
		return $res;
	}
	



}
