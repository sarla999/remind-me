<?php
error_reporting(E_ALL);

class index
{
	const TPL = './templates/';

	public function __construct()
	{
		include('remind.php');
	}



	public function lists()
	{
		$remindObj = new remind();
		$data = $remindObj->get_all();
		include(self::TPL.'index.html');

	}

}


$page = new index();
$page->lists();

