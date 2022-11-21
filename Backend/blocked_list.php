<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");
include("db_connection.php"); 


if(isset($_GET['userId'])){
    $user_id = $_GET['userId'];
}

$query = $mysqli->prepare("Select user_id2 as blocked_user FROM blocks where user_id1 = ? ");
$query -> bind_param("i" , $user_id);
$query -> execute();
$array = $query-> get_result();
$response = $array-> fetch_assoc();

echo json_encode($response);