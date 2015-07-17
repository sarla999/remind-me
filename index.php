<?php
error_reporting(E_ALL);
include('./core/config.php');

core_config::appInit('remind');
$a = new remind_controller_index();
