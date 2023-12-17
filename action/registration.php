<?php

include('../connection.php');

if(isset($_POST["username"])){


    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $full_name = $_POST["fname"] . "" . $_POST["lname"];
    $role = "Pharmacist";
    $status = 1;

    $check_exist = $conn->query("SELECT * from user where username = '$username' and password = '$password'");

    if($check_exist->num_rows >  0){
        header("location:../signup.php?sms=user_exist");
    }else{
        $insert = $conn->query("INSERT INTO user (full_name,username,password,user_role,status) VALUES 
        ('$full_name', '$username', '$password','$role', '$status')");
        header("location:../login.php?sms=registration_success");
    }

}

?>