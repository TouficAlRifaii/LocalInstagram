<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");

session_start();
include("db_connection.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}

else{
    $response = [];
    $response["success"] = false; 
    echo json_encode($response);
    return; 
}

$query = $mysqli-> prepare("SELECT * from users where username = ?");
$query-> bind_param("s" , $username);
$query->execute();
$array= $query->get_result();
$user = $array->fetch_assoc();
$response = [];
if(password_verify($password , $user['password'])){
    $response= [];
    $response["loggedin"] = true;
    $response["id"] = $user['user_id'];
    $response["username"] = $username;
    $response["success"] = true;
    echo json_encode($response);
}
else{
    $response['success'] = false; 
    echo json_encode($response);
}