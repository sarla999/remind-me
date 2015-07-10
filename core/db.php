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
	protected $fields = '*';
	protected $where ;
	
	//定义私有属性
	private static $_instance = null;
	private $dsh ;
	private $sql ;

	//公共属性
	public $msg ;

	//定义mysql属性
	private static $mysql = array(

								'host'=>'192.168.0.42',
								'user'=>'web',
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
                            //$this->init_data()r
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

					}else{
						return $this->dsh;
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
		if(is_array($this->fields)){
			$this->fields = '`'.implode('`,`',$this->fields).'`';	
		}	

		$this->sql = 'SELECT '.$this->fields.' FROM '.$this->tableName. $this->where;
		$sth = $this->dsh->query($this->sql);

		if(!$sth){
			$this->msg = $this->errorInfo();
			return false;
		}else{
			$res = $sth->fetch(PDO::FETCH_ASSOC);
			return $res === false ? array() : $res ;
		}
	}


	/**
	* 插入一条数据
	* @return int
	**/
	public function insert(array $data)
	{
		$this->sql  = sprintf('INSERT INTO %s SET %s' , $this->tableName , implode(',',$this->build_query_data($data)));
		if(!$this->dsh->query($this->sql)){
			$this->msg = $this->dsh->errorInfo();
			return false;
		}
		return $this->dsh->lastInsertId();
	}


	/**
	* 删除一条数据
	* @return int
	**/
	public function delete()
	{
		$this->sql = sprintf('DELETE FROM %s %s', $this->tableName, $this->where);
		$res = $this->dsh->exec($this->sql);

		if($res===false){
			$this->msg = $this->dsh->errorInfo();	
		}

		return $res;		


	}


	/**
	* 构造插入收据数组 
	* @return array
	**/
	private function build_query_data(array $data)
	{
		$returnData = array();
		foreach($data as $key=>$val){
			if(in_array($key,$this->fields)){
				if(empty($val)){
					array_push($returnData,sprintf('`%s`=NULL',$key));	
				}elseif(is_string($val)){
					array_push($returnData,sprintf('`%s`=%s',$key,$this->dsh->quote($val)));
				}elseif(is_int($val)){
					array_push($returnData,sprintf('`%s`=%d',$key,$val));
				}else{
					array_push($returnData,sprintf('`%s`=%s',$key,$this->dsh->quote($val)));
				}	 

			}else{
				continue;
			}

		}
		return $returnData;
	}


	/**
	* 设置查询条件
	* @param mixed $input
	**/
	public function where($input)
	{
		if(is_string($input) && !empty($input)){

			$this->where = ' WHERE '.$input;
		}else{
			$this->where = null ;
		}	

		return $this->where ;
	}


	/**
	* 更新数据库
	* @param array 
	**/
	public function update(array $data)
	{
		$this->sql = sprintf('UPDATE %s SET %s %s ',$this->tableName, implode(',',$this->build_query_data($data)), $this->where);
		$res = $this->dsh->exec($this->sql);
		
		if($res===false){
			$this->msg = $this->dsh->errorInfo();	
		}

		return $res;		
	}

	//设置查询条件
	public function condition()
	{
	}




}


class remind extends core_db{

	protected $dbName = "club";	
	protected $dbType = "mysql";
	protected $fields = array(
				'id',
				'uid',
				'realname',
				'adminid',
				'dateline',
				);


	public function __construct(){
		parent::__construct();
		$this->where("id = 12");
		//$a = $this->delete();
		//var_dump($a);
		/*for($i=0;$i<6;$i++){
		$data = array('uid'=>9527,'realname'=>'test'.$i,'adminid'=>234,'dateline'=>6677);	
		print_r($this->insert($data));

		}*/
		$data = array('uid'=>9527,'realname'=>'shiyili','adminid'=>567,'dateline'=>8877);	
		print_r($this->update($data));

	}




}

new remind();
