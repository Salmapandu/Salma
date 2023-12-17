<?php 
session_start();
    include("../connection.php");

    if(isset($_POST["submit"])){

        $iterm_name = $_POST["iterm_name"];
        $stock = $_POST["quantity"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $category_id = $_POST["category"];
        $status = 1;
        $user_id = $_SESSION['user_id'];

        $check_exist = $conn->query("SELECT * from iterm WHERE iterm_name = '$iterm_name' and stock = '$stock'
         AND iterm_price = '$price' and category_id = '$category_id' and status = '$status'");

        if($check_exist->num_rows > 0){
            header("location:../pharmacist/iterm.php?sms=exist");
        }else{
            $insert = $conn->query("INSERT INTO iterm (iterm_name,stock,iterm_price,iterm_description,status,category_id,user_id) 
            VALUES ('$iterm_name', '$stock','$price','$description','$status','$category_id','$user_id')");
            header("location:../pharmacist/iterm.php");
        }
    }

?>