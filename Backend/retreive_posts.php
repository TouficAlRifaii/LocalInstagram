<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");
include("db_connection.php"); 

$query = $mysqli-> prepare("SELECT * FROM posts");

$query->execute();
$array = $query->get_result();
$response = $array->fetch_assoc();
echo json_encode($response);