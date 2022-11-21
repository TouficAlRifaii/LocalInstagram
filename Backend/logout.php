<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");

session_start();
$_SESSION['loggedin'] = false;
$_SESSION['id'] = null;
$_SESSION['username'] = null;  
session_destroy();

echo json_encode($_SESSION);