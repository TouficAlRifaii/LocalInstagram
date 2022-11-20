<?php
session_start();
include("db_connection.php");
if (isset($_SESSION) && $_SESSION['loggedin']){
    $response = []; 
    $response['success'] = 'success';
    echo json_encode($response);
    return;
}

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
$response = [];
if(password_verify($password , $user['password'])){
    $response['success'] = "success";
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $user['id'];
    $_SESSION["username"] = $username;
    echo json_encode($_SESSION);
}
else{
    $response['success'] = false; 
}

echo json_encode($response);