<?php

include("db_connection.php");

if(isset($_GET['username']) && isset($_GET['password'])){
    $username = $_GET['username'];
    $password = $_GET['password'];
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
$hashedPasssword = password_hash($password, PASSWORD_BCRYPT);
$response = [];
if(password_verify($password , $user['password'])){
    $response['success'] = "success";
}
else{
    $response['success'] = false; 
}

echo json_encode($response);