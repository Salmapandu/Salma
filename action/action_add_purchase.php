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
        $purchase_date = $_POST["purchase_date"];
        $user_id = $_SESSION['user_id'];

        if($purchase_date == ""){
            $purchase_date = date('d-m-Y');
        }

        $check_exist = $conn->query("SELECT * from purchase WHERE iterm_name = '$iterm_name' and quantity = '$stock'
         AND iterm_price = '$price' and category_id = '$category_id' and status = '$status'");

        if($check_exist->num_rows > 0){
            header("location:../pharmacist/iterm.php?sms=exist");
        }else{
            $insert = $conn->query("INSERT INTO purchase (iterm_name,quantity,iterm_price,purchase_description,status,category_id,user_id,purchase_date) 
            VALUES ('$iterm_name', '$stock','$price','$description','$status','$category_id','$user_id','$purchase_date')");

            $check_iterm = $conn->query("SELECT * from iterm where iterm_name = '$iterm_name'");
            if($check_iterm->num_rows > 0){
                $row = $check_iterm->fetch_assoc();
                $new_stock = $stock + $row['stock'];
                $iterm_id = $row['iterm_id'];
                $update = $conn->query("UPDATE iterm SET stock = '$new_stock' WHERE iterm_id = '$iterm_id'");
            }
            header("location:../pharmacist/purchase.php");
        }
    }

?>