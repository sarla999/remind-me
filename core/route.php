<?php
/**
* 路由程序
* @ return array
**/

class core_route{

	public function __construct(){


	}


	public function get_request(){

		print_r($_GET);


	}






}


$a = new core_route();

echo $a->get_request();






