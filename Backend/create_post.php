<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: * ");

include("db_connection.php");
error_reporting(0);
 
// If upload button is clicked ...
if (isset($_POST['description']) && isset($_POST['user_id']) && isset($_POST['file']) && $_POST['file'] != "") {
    $description = $_POST['description'];
    $user_id = $_POST['user_id'];
    $likes = 0; 
    $image = $_POST['file'];
 
    // Get all the submitted data from the form
    $query = $mysqli-> prepare( "INSERT INTO posts (description , user_id , image_name , like_count) VALUES (? , ?, ? , ?)");
    $query -> bind_param("sisi" , $description, $user_id , $image , $likes);
    $query-> execute(); 
    $response = [] ;
    $response["success"] = true; 
    echo json_encode($response);
    // Execute query
    
 
    //  move the uploaded image into the folder: image
}
else{
    $response = [] ;
    $response["success"] = false; 
    echo json_encode($response);
    return;
}
?>