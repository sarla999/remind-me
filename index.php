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
		if(isset($_POST['action']) && $_POST['action']== 'add' ){
			$status = $this->add($_POST['title'],$_POST['sum'],$_POST['refunddate'],$_POST['desc']);	
			echo json_encode($status);
			exit;
		}

		if(isset($_POST['action']) && $_POST['action'] == 'delete'){
		
			$this->remindObj->del_byid($_POST['id']);
		}

		if(isset($_POST['action']) && $_POST['action'] == 'edit'){

			$this->remindObj->update($_POST['id'],$_POST['title'],$_POST['sum'],$_POST['refunddate'],$_POST['desc'],$_POST['addtime']);

		}


		$data = $this->remindObj->get_all();
		include(self::TPL.'index.html');

	}

	
	public function add($title,$sum,$refund_date,$desc)
	{
		$refund_date = strtotime($refund_date);
		$status = $this->remindObj->insert_data($title,$sum,$refund_date,$desc);
		return $status;
	}

}


$page = new index();
$page->lists();
