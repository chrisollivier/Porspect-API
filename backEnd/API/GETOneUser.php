<?php
header('Content-type: application/json; charset=utf-8');
include_once '../classes/dbh.classes.php';
include_once '../classes/User.php';
if(isset($_GET['email'])){
    $UserApp = new User();
    echo json_encode(array('Prospect'=>$UserApp->getOneUser($_GET['email'])));
}else{
    echo 'Error: No attribut fined';
}
