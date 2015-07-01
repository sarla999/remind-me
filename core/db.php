<?php
/**
*数据库基础操作类
*author shiyili
**/
error_reporting(E_ALL);
class core_db extends PDO
{
	//子类可覆盖属性
	protected $dbname = 'myremind.db';
    protected $table_name = "remind";
    protected $db_type = 'sqlite';
	protected $orderByField = 'id';
	
	//定义私有属性
	private static $_instance;
    private $conn ;


	public function __construct()
	{

    }


	//初始化数据库
	private function init_db($this->db_type)
	{
		

	}














}



new core_db();
