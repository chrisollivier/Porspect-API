<?php
header('Content-type: application/json; charset=utf-8');
include_once '../classes/dbh.classes.php';
include_once '../classes/User.php';

$UserApp = new User();
echo json_encode(array('UserApp'=>$UserApp->getAllUser()));

