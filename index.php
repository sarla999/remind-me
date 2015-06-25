<?php
error_reporting(E_ALL);
include('remind.php');

$remindObj = new remind();
$data = $remindObj->get_all();
print_r($data);

