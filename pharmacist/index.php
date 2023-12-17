<?php
  include("check_session.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
    
    
</head>
<body>
    <?php
    include("../connection.php");
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo $_SESSION["user_role"];?></p>
                                    <p class="profile-subtitle"><?php echo $_SESSION["username"];?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../action/log_out.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor ">
                        <a href="category.php" class="non-style-link-menu "><div><p class="menu-text">Category</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule">
                        <a href="iterm.php" class="non-style-link-menu"><div><p class="menu-text">Iterms</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="sales.php" class="non-style-link-menu"><div><p class="menu-text">Sales</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="purchase.php" class="non-style-link-menu"><div><p class="menu-text">Purchase</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="report.php" class="non-style-link-menu"><div><p class="menu-text">Report</p></a></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Dashboard Report </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>

                                        <?php
                                               $all_cat = $conn->query("SELECT * from category order by category_name asc");
                                               $cat_number = $all_cat->num_rows;
                                            ?>

                                                <div class="h1-dashboard">
                                                    <?php echo $cat_number;?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Categories &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                        <?php
                                               $all_iterms = $conn->query("SELECT * from iterm");
                                               $iterm_number = $all_iterms->num_rows;
                                            ?>
                                                <div class="h1-dashboard">
                                                    <?php echo $iterm_number;?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Iterms &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                        <?php
                                               $all_sales = $conn->query("SELECT * from sale");
                                               $sale_number = $all_sales->num_rows;
                                            ?>
                                                <div class="h1-dashboard" >
                                                    <?php echo $sale_number;?>
                                                </div><br>
                                                <div class="h3-dashboard" >
                                                    Number of Sales &nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../img/icons/book-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;padding-top:26px;padding-bottom:26px;">
                                        <div>
                                        <?php
                                               $all_purchase = $conn->query("SELECT * from purchase");
                                               $purchase_number = $all_purchase->num_rows;
                                            ?>
                                                <div class="h1-dashboard">
                                                        <?php echo $purchase_number;?>
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                    Number of Purchases
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session-iceblue.svg');"></div>
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>


                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                        <?php
                                               $total_amount_stock = $conn->query("SELECT SUM((stock * iterm_price)) as total from iterm");
                                               $stock_amount = $total_amount_stock->fetch_assoc();
                                            ?>
                                                <div class="h1-dashboard">
                                                <?php if($stock_amount["total"] == null){
                                                        echo number_format(0,2);
                                                   }else{
                                                    echo number_format($stock_amount["total"],2);
                                                   }?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                TOTAL AMOUNT IN  STOCK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                        <?php
                                               $total_purchase_stock = $conn->query("SELECT SUM((quantity * iterm_price)) as total from purchase where purchase_date <= CURDATE()");
                                               $stock_purchase_amount = $total_purchase_stock->fetch_assoc();
                                            ?>
                                                <div class="h1-dashboard">
                                                <?php if($stock_purchase_amount["total"] == null){
                                                        echo number_format(0,2);
                                                   }else{
                                                    echo number_format($stock_purchase_amount["total"],2);
                                                   }?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                TOTAL PURCHASE UP TODAY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>

                                        <?php
                                               $total_sale_general = $conn->query("SELECT SUM((quantity * unitPrice)) as total from sale");
                                               $total_sale_general_amount = $total_sale_general->fetch_assoc();
                                            ?>
                                                <div class="h1-dashboard" >
                                                <?php if($total_sale_general_amount["total"] == null){
                                                        echo number_format(0,2)." tzs";
                                                   }else{
                                                    echo number_format($total_sale_general_amount["total"],2);
                                                   }?>
                                                </div><br>
                                                <div class="h3-dashboard" >
                                                TOTAL SALES GENERALLY &nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../img/icons/book-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;padding-top:26px;padding-bottom:26px;">
                                        <div>
                                        <?php
                                            $year = date('Y');
                                               $total_sale_this_year = $conn->query("SELECT SUM((quantity * unitPrice)) as total from sale WHERE YEAR(saleDate) = '$year'");
                                               $total_sale_this_year_amount = $total_sale_this_year->fetch_assoc();
                                            ?>
                                                <div class="h1-dashboard">
                                                <?php if($total_sale_this_year_amount["total"] == null){
                                                        echo number_format(0,2)." tzs";
                                                   }else{
                                                    echo number_format($total_sale_this_year_amount["total"],2);
                                                   }?>     
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                TOTAL SALES FOR THIS YEAR
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session-iceblue.svg');"></div>
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                        <?php
                                               $today_sale_amount = $conn->query("SELECT SUM((quantity * unitPrice)) as total from sale where saleDate = CURDATE()");
                                               $sale_amount = $today_sale_amount->fetch_assoc();
                                            ?>
                                                <div class="h1-dashboard">
                                                   <?php if($sale_amount["total"] == null){
                                                        echo number_format(0,2)." ";
                                                   }else{
                                                    echo number_format($sale_amount["total"],2)." ";
                                                   }?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                Today Sales &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                        <?php
                                               $today_purchase_amount = $conn->query("SELECT SUM((quantity * iterm_price)) as total from purchase where purchase_date = CURDATE()");
                                               $purchase_amount = $today_purchase_amount->fetch_assoc();
                                            ?>
                                                <div class="h1-dashboard">
                                                <?php if($purchase_amount["total"] == null){
                                                        echo number_format(0,2)." ";
                                                   }else{
                                                    echo number_format($purchase_amount["total"],2);
                                                   }?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                Today Purchase &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                        <?php
                                               $today_sale = $conn->query("SELECT * from sale where saleDate = CURDATE()");
                                               $today_sale_number = $today_sale->num_rows;
                                            ?>
                                                <div class="h1-dashboard" >
                                                <?php echo $today_sale_number;?> Iterms
                                                </div><br>
                                                <div class="h3-dashboard" >
                                                Iterms Sold Today &nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../img/icons/book-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;padding-top:26px;padding-bottom:26px;">
                                        <div>
                                        <?php
                                               $today_purchase = $conn->query("SELECT * from purchase where purchase_date = CURDATE()");
                                               $today_purchase_number = $today_purchase->num_rows;
                                            ?>
                                                <div class="h1-dashboard">
                                                <?php echo $today_purchase_number;?> Iterms
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                Iterms Purchased Today
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session-iceblue.svg');"></div>
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <table width="100%" border="0" class="dashbord-tables">
                            <label for="" style="margin-left: 5%;">Latest Sales Iterms</label>
                            <tr>
                                <td width="50%">
                                    <center>
                                        <div class="abc scroll" style="height: 200px;">
                                        <table width="85%" class="sub-table scrolldown" border="0">
                                        <thead>
                                        <tr>    
                                                <th class="table-headin" style="font-size: 12px;">        
                                                Item Name
                                                </th>
                                                <th class="table-headin">
                                                Quantity
                                                </th>
                                                <th class="table-headin">
                                                Price
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                   <?php
                                                $latest_sale = $conn->query("SELECT * FROM sale s,iterm i where i.iterm_id = s.iterm_id order by s.saleDate desc limit  5");
                                                if($latest_sale->num_rows > 0){
                                                    while($row = $latest_sale->fetch_array()){
                                                        echo '<tr>
                                                        <td> &nbsp;'.
                                                            $row["iterm_name"]
                                                        .'</td>
                                                        <td>
                                                            '. $row["quantity"].'
                                                        </td>
                                                        <td>
                                                        '. $row["unitPrice"].'
                                                    </td>
                                                    </tr>';
                                                    }
                                                }else{
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">No sales available now</p>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                }
                                           ?>
                                            </tbody>
                
                                        </table>
                                        </div>
                                        </center>
                                </td>
                                <td width="50%" style="padding: 0;">
                                <label for="" style="margin-left: 5%;">Recently Added Iterms</label>
                                    <center>
                                        <div class="abc scroll" style="height: 200px;padding: 0;margin: 0;">
                                        <table width="85%" class="sub-table scrolldown" border="0" >
                                        <thead>
                                        <tr>
                                                
                                                <th class="table-headin">
                                                    Iterm Name
                                                </th>
                                                <th class="table-headin">
                                                    Amount Price
                                                </th>
                                                    
                                                </tr>
                                        </thead>
                                        <tbody>
                                        
                                                <?php
                                                $recent_added = $conn->query("SELECT iterm_name,(stock * iterm_price) as total FROM iterm order by iterm_id desc limit 5");
                                                $num_rows = $recent_added->num_rows;
                                                if($num_rows > 0){

                                                    while($row = $recent_added->fetch_array()){
                                                        echo '<tr>
                                                        <td> &nbsp;'.
                                                            $row["iterm_name"]
                                                        .'</td>
                                                        <td>
                                                            '.number_format($row["total"],2).'
                                                        </td>
                                                    </tr>';  
                                                    }

                                                }else{
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">No iterms available now</p>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>'; 
                                                }
                                                ?>
                 
                                            </tbody>
                
                                        </table>
                                        </div>
                                        </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <a href="iterm.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Iterms</button></a>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="sales.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Sales</button></a>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                        </table>
                        </center>
                        </td>
                </tr>
            </table>
        </div>
    </div>


</body>
</html>