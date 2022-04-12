<?php
header('charset=utf-8');

// récupération du flux JSON
$json = file_get_contents('php://input');
$obj = json_decode($json);