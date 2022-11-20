<?php

include("db_connection.php");

if(isset($_POST['user_id1']) && isset($_POST['user_id2'])){
    $blocker = $_POST['user_id1'];
    $blocked = $_POST['user_id2']; 
}
else{
    $response = [];
    $response['success'] = false; 
    echo json_encode($response); 
    return;
}

$query = $mysqli -> prepare("INSERT INTO blocks(user_id1 , user_id2) values(? , ?)");
$query -> bind_param("ii" , $blocker , $blocked);
$query-> execute();
$response = []; 
$response["success"] = "success";
echo json_encode($response);
