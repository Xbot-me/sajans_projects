<?php
require 'db_config.php';

 if($_POST){
    $first_name = mysqli_real_escape_string($mysqli,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli,$_POST['last_name']);
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    $phone = mysqli_real_escape_string($mysqli,$_POST['phone']);
    $user_password 	= mysqli_real_escape_string($mysqli,$_POST['password']);
    $s_ans 	= mysqli_real_escape_string($mysqli,$_POST['s_ans']);
    $password 	= md5($user_password);


    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result =  mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($result);
    if($count == 0){
        $sql1 = "INSERT INTO users (first_name,last_name,password,email,phone,s_ans) VALUES ('$first_name','$last_name','$password','$email','$phone','$s_ans')";
        
        if (!mysqli_query($mysqli,$sql1))
            {    
                 $data = mysqli_error($mysqli);
            }else{
                session_start();
                $_SESSION['email']= $email;
                 $data = "User Created";
            }
            echo json_encode($data);   
    }
 }



