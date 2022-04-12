<?php
header('Content-type: application/json; charset=utf-8');
include_once '../classes/dbh.classes.php';
include_once '../classes/Prospect.php';

$Prospect = new Prospect();
echo json_encode(array('Prospect'=>$Prospect->getAllProspect()));
