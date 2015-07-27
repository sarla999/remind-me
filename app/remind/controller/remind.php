<?php
error_reporting(E_ALL);
//controller
	class remind_controller_remind
	{
		private $dataObj;
	
		public function __construct()
		{
			$this->dataObj = new remind_models_data_remind();

		}
		
		public function index()
		{
			$data = $this->dataObj->getData();
			
		}

		public function lists()
		{

			echo 'This is lists';

		}
		



	}




