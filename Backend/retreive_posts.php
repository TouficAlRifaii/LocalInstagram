<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");
include("db_connection.php"); 

$id = $_GET['id'];

$query = $mysqli-> prepare("SELECT * FROM posts where user_id != (Select user_id1 from blocks where user_id2 = ?");
$query-> bind_param("i" , $id);

$query->execute();
$array = $query->get_result();
$response = $array->fetch_assoc();
echo json_encode($response);