<?php
require 'db_config.php';

if($_POST){
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    $user_password 	= mysqli_real_escape_string($mysqli,$_POST['password']);
    $password 	= md5($user_password);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result =  mysqli_query($mysqli,$sql);
    while($row = $result->fetch_assoc()){
        $json[] = $row;
     }

    $count = mysqli_num_rows($result);
    if($count){
        session_start();
        $_SESSION['email']= $email;
        $data = $json;
    }else{
        $data = "Incorrect email or password";
    }

    echo json_encode($data); 
}