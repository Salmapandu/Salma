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

    <title>Iterms</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }

        .sub-table {
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
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">
                                        <?php echo $_SESSION["user_role"]; ?>
                                    </p>
                                    <p class="profile-subtitle">
                                        <?php echo $_SESSION["username"]; ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../action/log_out.php"><input type="button" value="Log out"
                                            class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                            <div>
                                <p class="menu-text">Dashboard</p>
                        </a>
        </div></a>
        </td>
        </tr>
        <tr class="menu-row">
            <td class="menu-btn menu-icon-doctor ">
                <a href="category.php" class="non-style-link-menu ">
                    <div>
                        <p class="menu-text">Category</p>
                </a>
    </div>
    </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-schedule">
            <a href="iterm.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Iterms</p>
                </div>
            </a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-appoinment">
            <a href="sales.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Sales</p>
            </a></div>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-patient">
            <a href="purchase.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Purchase</p>
            </a></div>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-patient">
            <a href="report.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Report</p>
            </a></div>
        </td>
    </tr>

    </table>
    </div>
    <div class="dash-body">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
            <tr>
                <td width="13%">
                    <a href="sales.php"><button class="login-btn btn-primary-soft btn btn-icon-back"
                            style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px">
                            <font class="tn-in-text">Back</font>
                        </button></a>
                </td>
                <td width="15%">
                    <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                        Today's Date
                    </p>
                    <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php
                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                    </p>
                </td>
                <td width="10%">
                    <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img
                            src="../img/calendar.svg" width="100%"></button>
                </td>


            </tr>

            <tr>
                <td colspan="2" style="padding-top:30px;">
                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Sell Iterm
                    </p>
                </td>
            </tr>

            <?php 
                        if (isset($_POST["search"])) { ?>
            <tr>

                <td colspan="4" style="padding-top:10px;">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">
                        Result for keyword  " <?php echo $_POST["search"];?> "
                    </p>
                </td>

            </tr>

            <?php
                        }
                        ?>

            <tr>
                <td>

                    <form action="" method="post" class="header-search">

                        <input type="search" name="search" class="input-text header-searchbar"
                            placeholder="Search iterm here" list="iterm">&nbsp;&nbsp;

                        <input type="Submit" value="Search" class="login-btn btn-primary btn"
                            style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                    </form>

                </td>
            </tr>
            
            <br><br><br><br><br><br>

            <?php
            if (isset($_POST["search"])) {
                $iterm_name = $_POST["search"];
                ?>

                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <table width="93%" class="sub-table scrolldown" border="0">
                                    <thead>
                                        <tr>
                                            <th class="table-headin">
                                                Iterm Name
                                            </th>
                                            <th class="table-headin">
                                                Category
                                            </th>
                                            <th class="table-headin">
                                                Price
                                            </th>
                                            <th class="table-headin">
                                                Stock
                                            </th>
                                            <th class="table-headin">
                                                Description
                                            </th>
                                            <th class="table-headin">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $all_iterm = $conn->query("SELECT * from category c,iterm i where c.category_id = i.category_id and i.iterm_name LIKE '%$iterm_name%' order by i.iterm_name asc");
                                        if ($all_iterm->num_rows > 0) {

                                            while ($row = $all_iterm->fetch_array()) {
                                                $iterm_id = $row['iterm_id'];
                                                $status = "";
                                                if ($row["category_status"] == 1) {
                                                    $status = "Available";
                                                } else {
                                                    $status = "Not Available";
                                                }
                                                echo '<tr>
                                        <td> &nbsp;' .
                                                    $row["iterm_name"]
                                                    . '</td>
                                        <td>
                                            ' . $row["category_name"] . '
                                        </td>

                                        <td>
                                        ' . $row["iterm_price"] . '
                                    </td>

                                    <td>
                                    ' . $row["stock"] . '
                                </td>

                                <td>
                                ' . $row["iterm_description"] . '
                            </td>

                                        <td>
                                        <div style="display:flex;justify-content: center;">
                                        <a href="?action=sell&id='.$iterm_id.'&error=0" class="non-style-link"><button
                                        class="login-btn btn-primary btn button-icon"
                                        style="display: flex;justify-content: center;align-items: center;margin-left:75px;">Sell
                                        Iterm</font></button>
                                </a>
                                        </div>
                                        </td>
                                    </tr>';
                                            }

                                        } else {
                                            echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">No iterm available now</p>
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

                <?php
            }
            ?>
                <!-- ikiwa huj search appaaaaaa zije list ya vitu vyote vilivouzwa -->
            <?php if (!isset($_POST["search"])) { ?>
                <br><br><br>
                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <table width="93%" class="sub-table scrolldown" border="0">
                                    <thead>
                                        <tr>
                                            <th class="table-headin">
                                                Customer Name
                                            </th>
                                            <th class="table-headin">
                                                Iterm
                                            </th>
                                            <th class="table-headin">
                                                Category
                                            </th>
                                            <th class="table-headin">
                                                Price
                                            </th>
                                            <th class="table-headin">
                                                Quantity
                                            </th>
                                            <th class="table-headin">
                                                Total
                                            </th>
                                            <th class="table-headin">
                                                Status
                                            </th>
                                            <th class="table-headin">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $all_sells = $conn->query("SELECT  i.iterm_name,c.category_name,s.quantity,s.unitPrice,s.saleDate,s.sale_status,s.customerName
                                    from category c,iterm i,sale s where c.category_id = i.category_id and i.iterm_id = s.iterm_id order by i.iterm_name asc");
                                        if ($all_sells->num_rows > 0) {

                                            while ($row = $all_sells->fetch_array()) {
                                                $status = "";
                                                if ($row["sale_status"] == 1) {
                                                    $status = "Sale Complete";
                                                } else {
                                                    $status = "Sale not Complete";
                                                }
                                                echo '<tr>
                                        <td> &nbsp;' .
                                                    $row["customerName"]
                                                    . '</td>
                                        <td>
                                            ' . $row["iterm_name"] . '
                                        </td>

                                        <td>
                                        ' . $row["category_name"] . '
                                    </td>

                                    <td>
                                    ' . number_format($row["unitPrice"], 2) . '
                                </td>

                                <td>
                                ' . $row["quantity"] . '
                            </td>

                            <td>
                            ' . number_format($row["quantity"] * $row["unitPrice"], 2) . '
                        </td>

                                <td>
                                ' . $status . '
                            </td>

                            <td>
                            <div style="display:flex;justify-content: center;">
                            &nbsp;&nbsp;&nbsp;
                            <a class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                            </div>
                            </td>
                                    </tr>';
                                            }

                                        } else {
                                            echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">No sales iterm available now</p>
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

            <?php
            }
            ?>


        </table>
    </div>
    </div>
    <?php
    if ($_GET) {

        $iterm_id = $_GET["id"];
        $action = $_GET["action"];
        if ($action == 'sell') {

            $iterm = $conn->query("SELECT * from iterm where iterm_id = '$iterm_id'");
            $row = $iterm->fetch_assoc();
                echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    
                        <a class="close" href="sales.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Sell Iterm.</p><br><br>
                                </td>
                            </tr>
                            
                            <form action="../action/action_sell_iterm.php" method="POST" class="add-new-form">
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Iterm Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" disabled class="input-text" value="'.$row["iterm_name"].'" required><br>
                                    <input type="hidden" class="input-text" name="iterm_id" value="'.$iterm_id.'" required>
                                </td>
                                
                            </tr>

                            <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="name" class="form-label">Iterm Price: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <input type="text" disabled class="input-text" value="'.$row["iterm_price"].'" required><br>
                                <input type="hidden" name="price" class="input-text" value="'.$row["iterm_price"].'" required>
                            </td>
                            
                        </tr>

                        <tr>
                                
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">Total in Stock: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" disabled class="input-text" value="'.$row["stock"].' iterms" required><br>
                            <input type="hidden" class="input-text" name="available" value="'.$row["stock"].' iterms" required>
                        </td>
                        
                    </tr>

                            <tr>
                            <td class="label-td" colspan="2">
                                <label for="name" class="form-label">Customer Name: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <input type="text" name="customer" class="input-text" placeholder="Customer Name" required><br>
                            </td>
                            
                        </tr>

                    <tr>
                    <td class="label-td" colspan="2">
                        <label for="name" class="form-label">Quantity Sold: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="number" name="quantity" class="input-text" required><br>
                    </td>
                    
                </tr>
                           
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" name="submit" value="Sell" class="login-btn btn-primary btn">
                                </td>
                
                            </tr>
                           
                            </form>
                            </tr>
                        </table>
                        </div>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        } elseif ($action == 'edit') {
        }
        ;
    }
    ;

    ?>
    </div>

</body>

</html>