<?php
include("db_connection.php");
error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['description']) && isset($_POST['user_id']) && !empty($_FILES["uploadfile"]["name"])) {
    $description = $_POST['description'];
    $user_id = $_POST['user_id'];
    $likes = 0; 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "C:/Users/altou/OneDrive/Desktop/LocalInstagram/Frontend/" . $filename;
 
    $db = mysqli_connect("localhost", "root", "", "geeksforgeeks");
 
    // Get all the submitted data from the form
    $query = $mysqli-> prepare( "INSERT INTO posts (description , user_id , image_name , like_count) VALUES (? , ?, ? , ?)");
    $query -> bind_param("sisi" , $description, $user_id , $filename , $likes);
    // Execute query
    $query-> execute; 
 
    //  move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        
    } else {
        $response = []; 
        $response['success'] = false;
        echo json_encode($response);
        
    }
}
else{
    $response = [] ;
    $response["success"] = false; 
    echo json_encode($response);
    return;
}
?>