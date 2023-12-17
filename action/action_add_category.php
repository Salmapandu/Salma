<?php 
session_start();
    include("../connection.php");

    if(isset($_POST["submit"])){

        $cat_name = $_POST["cat_name"];
        $cat_status = $_POST["cat_status"];
        $user_id = $_SESSION['user_id'];

        $check_exist = $conn->query("SELECT * from category WHERE category_name = '$cat_name' and category_status = '$cat_status'");

        if($check_exist->num_rows > 0){
            header("location:../pharmacist/category.php?sms=exist");
        }else{
            $insert = $conn->query("INSERT INTO category (category_name,category_status,user_id) 
            VALUES ('$cat_name', '$cat_status', '$user_id')");
            header("location:../pharmacist/category.php");
        }
    }

?>