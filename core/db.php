<?php
/**
*数据库基础操作类
*author shiyili
**/
error_reporting(E_ALL);

class core_db extends PDO
{
	//子类可覆盖属性
	protected $dbName = 'club';
    protected $tableName = 'bbs_activity_official_account';
    protected $dbType = 'sqlite';
	protected $orderByField = 'id';
	protected $fileds = '*';
	
	//定义私有属性
	private static $_instance = null;
    private $dsh ;
	private $sql ;

	//公共属性
	public $msg ;

	//定义mysql属性
	private static $mysql = array(

								'host'=>'192.168.0.42',
								'user'=>'',
								'password'=>'',
								'port'=>'3306',

								);


	public function __construct()
	{
		$this->init_db();
    }


	//初始化数据库
	protected function init_db()
	{
		if($this->dbType == 'sqlite'){

        	$dsn = 'sqlite:'.$this->dbName ;

            if(file_exists($this->dbName)){
                $this->dsh = new PDO($dsn);
                }else{
                    $dsn = 'sqlite:'.$this->dbName ;
                    $this->dsh = new PDO($dsn);
                        if($this->dsh){
                            //$this->init_table();
                            //$this->init_data();
                        }else{
                            die('Create DB error');
                        }
                    }
        }elseif($this->dbType == 'mysql'){

                if(empty(self::$_intance)){
					try{
						$dsn = 'mysql:host='.self::$mysql['host'].';port='.self::$mysql['port'].';dbname='.$this->dbName.';charset=utf8';
						$this->dsh = new PDO($dsn,self::$mysql['user'],self::$mysql['password']);

						}catch (PDOException $e){
						die('Database error');
						}

					}
         }

	}


	
	/**
	 * 根据查询条件返回一条记录
	 * @param int $returnType 参见 $this->row() 注释
	 * @return array|mixed
	 */
	public function find($returnType = 1)
	{
		$this->sql = 'SELECT '.$this->fileds.' FROM '.$this->tableName . $this->condition();
		return $this->getRows($this->sql, PDO::FETCH_ASSOC, $returnType);
	}


	/**
	* 执行查询并返回数据
	* @param $sql
	* @param int $type
	* @param int $returnType 1 默认（sql错误时返回空数组，没查到数据时返回false） ，2 （sql错误时返回 false，没查到数据时返回空数组）
	* @return array|bool|mixed
	* @auth zhangjie
	*/
	public function getRows($sql,$type=PDO::FETCH_ASSOC, $returnType = 1)
	{
		$this->sql = $sql;
		$sth = $this->dsh->query($this->sql);
		if (!$sth) {
			$this->msg = $this->errorInfo();
			return $returnType == 1 ? array() : false;
		}
		$res = $sth->fetch($type);
		return ($returnType == 1 || !empty($res)) ? $res : array();
	}


	//
	public function condition()
	{
	}




}


class remind extends core_db{

	protected $dbName = "club";	
	protected $dbType = "mysql";

	
	public function __construct(){
		$this->init_db();
		print_r($this->find());

	}




}

new remind();
