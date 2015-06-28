<?php
error_reporting(E_ALL);

class index
{
	const TPL = './templates/';

	private $remindObj ;

	public function __construct()
	{
		include('remind.php');
		$this->remindObj = new remind();
	}



	public function lists()
	{
		$data = $this->remindObj->get_all();
		include(self::TPL.'index.html');

	}

	
	public function add($title,$sum,$refund_date,$desc)
	{
		$refund_date = strtotime($refund_date);
		$this->remindObj->insert_data($title,$sum,$refund_date,$desc);
	}

}


$page = new index();
//$page->add('还北京银行贷款',1800,'2015-07-15','每月15号还');
//$page->add('还华夏银行',2900,'2015-07-20','每月20号还');
//$page->add('还工行公积金',4054,'2015-07-20','每月20号还');
$page->lists();

