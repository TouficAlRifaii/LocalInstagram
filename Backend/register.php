<?php
include("db_connection.php");

if(isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['email']) && $_POST['email'] != ""
&& isset($_POST['password']) && $_POST['password'] != "" && isset($_POST['name']) && $_POST['name'] != "" ){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];;
}
else{
    $response = [];
    $repsonse['success'] = false;
    echo json_encode($response);
    return;
}

$search_query = $mysqli->prepare("Select * from users where username = ?");
$search_query->bind_param("s" , $username);
if(mysqli_num_rows($search_query) > 0){
    echo "Username Already exists";
    return;
}
else{
        $query = mysqli-> prepare("INSERT INTO users(username, email, password, name) values(?,?,?,?");
        $query-> bind_param("ssss", $username, $email,$password,$name);
        $query->execute();
        $response = [];
        $response['success'] = "success";
        echo json_encode($response);
    }
 
