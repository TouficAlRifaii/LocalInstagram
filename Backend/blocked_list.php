<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");
include("db_connection.php"); 


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $query = $mysqli->prepare("SELECT username FROM users JOIN blocks ON user_id = user_id2 WHERE user_id1 = ? ");
    $query -> bind_param("i" , $user_id);
    $query -> execute();
    $array = $query-> get_result();
    $result = array();
    while($response =  mysqli_fetch_assoc($array)){
        $result[] = $response;


    }
    

    echo json_encode($result);
}else {
    $response = []; 
    $response['success'] = false; 
    echo json_encode($response);
}

