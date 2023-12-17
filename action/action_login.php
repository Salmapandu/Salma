<?php 

    include("../connection.php");
    session_start();

    if($_POST["submit"]){

        $username = $_POST["username"];
        $password = sha1($_POST["password"]);

        $process_login = $conn->query("SELECT * FROM user where username = '$username' and password =  '$password'");

        if($process_login->num_rows > 0){
            $row = $process_login->fetch_assoc();
           $_SESSION["username"] = $username;
           $_SESSION["user_role"] = $row["user_role"];
           $_SESSION["user_id"] = $row["user_id"];
           header("location: ../pharmacist/index.php");
        }else{
            header("location: ../login.php?sms=incorrect");
        }
    }
?>