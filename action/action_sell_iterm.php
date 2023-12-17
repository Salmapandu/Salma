<?php 
session_start();
    include("../connection.php");

    if(isset($_POST["submit"])){

        $iterm_id = $_POST["iterm_id"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $customer = $_POST["customer"];
        $status = 1;
        $available = $_POST["available"];
        $sale_date = date('Y-m-d');
        $user_id = $_SESSION['user_id'];


        if($available > 0){
            $insert = $conn->query("INSERT INTO sale (customerName,iterm_id,saleDate,quantity,unitPrice,sale_status,sale_user_id) 
            VALUES ('$customer', '$iterm_id','$sale_date','$quantity','$price','$status','$user_id')");

            $check_iterm = $conn->query("SELECT * from iterm where iterm_id = '$iterm_id'");
            if($check_iterm->num_rows > 0){
                $row = $check_iterm->fetch_assoc();
                $new_stock = $row['stock'] - $quantity;
                $update = $conn->query("UPDATE iterm SET stock = '$new_stock' WHERE iterm_id = '$iterm_id'");
            }
            header("location:../pharmacist/sales.php");
        }else{
            header("location:../pharmacist/sales.php");
        }
    }

?>