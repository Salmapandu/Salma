<?php 
session_start();
    if($_SESSION["user_id"] == ""){
        header("location:../action/log_out.php");
    }
?>