<?php
/**
*数据库基础操作类
*author shiyili
**/
error_reporting(E_ALL);

class core_db extends PDO
{
	//子类可覆盖属性
	protected $dbName = 'phpmyadmin';
	protected $tableName = 'pma_history';
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

								'host'=>'localhost',
								'user'=>'root',
								'password'=>'416andsrd',
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
	 * @param int $returnType
	 * @return array
	 */
	public function find()
	{
		$this->sql = 'SELECT '.$this->fileds.' FROM '.$this->tableName. $this->condition();
		$sth = $this->dsh->query($this->sql);

		if($sth){
			$res = $sth->fetch(PDO::FETCH_ASSOC);
			return $res === false ? array() : $res ;
		}else{
			$this->msg = $this->errorInfo();
			return false;
		}
	}


	/**
	* 插入一条数据
	* @return array
	**/
	public function insert(array $data)
	{
		$data = $this->build_insert_data($data);
		print_r($data);	


	}


	/**
	* 构造插入收据数组 
	* @return array
	**/
	private function build_insert_data(array $data)
	{
		$returnData = array();
		foreach($data as $key=>$val){
			if(is_string($key)){
				if(in_array($key,$this->fields)){
					if(is_null($val)){
						array_push($returnData,sprintf("`%s`=NULL",$key));
					}else{
						array_push($returnData,sprintf("`%s`=%s",$key,$this->dsh->quote($val)));
					}
				}else{
					continue;
				}	
			}elseif(is_int($key) && is_int($val)){
				array_push($returnData,sprintf("`%d`=%d",$key,$val));
			}else{
				array_push($returnData,sprintf("%s=%s",$key,$this->dsh->quote($val)));
			}

		}

		return $returnData;
	}


	//
	public function condition()
	{
	}




}


class remind extends core_db{

	protected $dbName = "phpmyadmin";	
	protected $dbType = "mysql";
	protected $fields = array(
				'id',
				'username',
				'db',
				'table',
				'timevalue',
				'sqlquery',
				7,
				);


	public function __construct(){
		$this->init_db();
		$data = array('username'=>'shiyili','db'=>'aaa','talbe'=>'ddddee','timevalue'=>123456,'sqlquery'=>'nimenhaoma',7=>8);	
		print_r($this->insert($data));

	}




}

new remind();
