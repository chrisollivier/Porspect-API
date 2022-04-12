<?php
header('Content-type: application/json; charset=utf-8');
include_once '../classes/dbh.classes.php';
include_once '../classes/Prospect.php';
if(isset($_GET['raisonsocial'])){
    $raisonsocial = $_GET['raisonsocial'];
    $Prospect = new Prospect();
    echo json_encode(array('Prospect'=>$Prospect->getOneProspect($raisonsocial)));
}else{
    echo 'Error: No attribut fined';
}
