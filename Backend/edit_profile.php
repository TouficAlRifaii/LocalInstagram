<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");

include("db_connection.php");

if(isset($_POST['email']) && isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['user_id'];
    $query = $mysqli->prepare("UPDATE users SET email = ? , name = ? WHERE user_id = ?");
    $query-> bind_param("ssi" , $email , $name , $id);
    $query-> execute();
    $response = []; 
    $response['success'] = true;
    echo json_encode($response);
} else {
    $response = []; 
    $response['success'] = false;
    echo json_encode($response);
    return;
}

