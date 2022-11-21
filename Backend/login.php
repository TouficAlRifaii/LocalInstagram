<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");

session_start();
include("db_connection.php");
if (isset($_SESSION) && $_SESSION['loggedin']){
    $response = []; 
    $response['success'] = 'success';
    
    echo json_encode($_SESSION);
    return;
}

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
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $user['user_id'];
    $_SESSION["username"] = $username;
    $response= [];
    $response["success"] = true;
    echo json_encode($response);
    // echo json_encode($_SESSION);
}
else{
    $response['success'] = false; 
}