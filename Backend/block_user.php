<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");

include("db_connection.php");

if(isset($_POST['user_id1']) && isset($_POST['username'])){
    $blocker = $_POST['user_id1'];
    $blocked = $_POST['username']; 
}
else{
    $response = [];
    $response['success'] = false; 
    echo json_encode($response); 
    return;
}
$getBlocked = $mysqli -> prepare("SELECT user_id from users where username = ?");
$getBlocked  -> bind_param('s' , $blocked);
$getBlocked -> execute(); 
$array = $getBlocked -> get_result();
$blocked_id = $array-> fetch_assoc();
$query = $mysqli -> prepare("INSERT INTO blocks(user_id1 , user_id2) values(? , ?)");
$query -> bind_param("ii" , $blocker , $blocked_id['user_id']);
$query-> execute();
$response = []; 
$response["success"] = true;
echo json_encode($response);
