<?php
include("db_connection.php"); 

$query = $mysqli-> prepare("SELECT * FROM posts");

$query->execute();
$array = $query->get_result();
$response = $array->fetch_assoc();
echo json_encode($response);