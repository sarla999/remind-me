<?php
error_reporting(E_ALL);
include('./core/config.php');

core_config::appInit('remind');
core_config::appRun();
