<?php

class remind_models_dao_remind extends core_db{
        protected $dbName = 'myremind.db';
        protected $tableName = 'remind';
        protected $dbType = 'sqlite';


	public function __construct(){


		parent::__construct();

	}


	public function getData(){

		echo 'this is all data1111';

	}	



}
