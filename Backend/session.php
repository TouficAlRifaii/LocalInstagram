<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");

session_start();
echo json_encode($_SESSION);
$response = [];
$response['logged_in'] = $_SESSION["loggedin"];
$response['id'] = $_SESSION['id'];
$response['username'] = $_SESSION['username'];
echo json_encode($response);