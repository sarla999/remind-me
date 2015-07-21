<?php
/*
*模板解析
*
*/

class core_templates
{
	public function __construct()
	{


	}	


	public static function view($tplname)
	{

		$fh = ROOT_PATH.'/templates/'.$tplname;
		if(is_file($fh)){
			include_once($fh);
			return ;
		}else{
			echo 'template is not exists';
		}


	}



}
