<?php
/*
*用户注册登录 data
*/

class remind_models_data_member
{
	private $daoObj;

	public function __construct()
	{
		$this->daoObj = new remind_models_dao_member();	
	}

	//添加新用户 
	public function addUser($username,$passwd)
	{
		return $this->daoObj->addUser($username,$passwd);
	}

	//检测用户是否己注册
	public function checkUsername($username)
	{
		return $this->daoObj->checkUsername($username);
	}	

	//获取所有注册用户信息
	public function getAlluser()
	{
		return $this->daoObj->getAlluser();

	}

	//检测用户名与密码是否正确
	public function checkUser($username,$passwd)
	{
		return $this->daoObj->checkUser($username,$passwd);
	}

	//禁止用户
	public function bannedUser($uid)
	{
		return $this->daoObj->bannedUser($uid);
	}
		
	//用户退出登录
	public function loginOut()
	{

		setcookie('SSOLOGINID','',time()-3600);	

	}


	//更新用户密码
	public function updatePasswd($uid,$passwd)
	{
		return $this->daoObj->updatePasswd($uid,$passwd);
	}

	//更新用户名称
	public function updateUsername($uid,$username)
	{
		return $this->daoObj->updateUsername($uid,$username);
	}


	//注册用户cookie
	public function regCookie($encryptname)
	{
		setcookie('SSOLOGINID',$encryptname,COOKIE_EXPIRE,COOKIE_DOMAIN);
		
	}


	//读取用户cookie
	public function getCookie()
	{
		if(isset($_COOKIE['SSOLOGINID'])){
			return $_COOKIE['SSOLOGINID'];
		}else{
			return false;
		}
	}

	//获得用户登录信息
	public function checkLogin()
	{
		if($this->getCookie()){
			$cookieinfo = $this->getCookie();
			return explode('&',libs_tools::decrypt($cookieinfo));
		}else{

			return array();
		}

	}


	//检测用户是否己登录如未登录，跳转至登录页
	public function needLogin()
	{
		if($this->checkLogin()){
			return $this->checkLogin();
		}
		else{
			header("Location:login.php");
			return ;
		}

	}



}
