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
                    <a href="report.php"><button class="login-btn btn-primary-soft btn btn-icon-back"
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
                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Report Sell
                    </p>
                </td>
            </tr>

            <?php
            if (isset($_POST["search"])) {
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
                ?>
                <tr>

                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">
                            Sale report from "
                            <?php echo $start_date; ?>" to "
                            <?php echo $end_date; ?>"
                        </p>
                    </td>

                </tr>

                <?php
            }
            ?>

            <tr>
                <td>

                    <form action="" method="post" class="header-search">

                        <input style="margin-left: 8%;" type="date" name="start_date"
                            class="input-text header-searchbar" list="iterm">&nbsp;&nbsp;
                        <input type="date" name="end_date" class="input-text header-searchbar" list="iterm">&nbsp;&nbsp;
                        <input type="Submit" name="search" value="Search" class="login-btn btn-primary btn"
                            style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                    </form>

                </td>
            </tr>

            <br><br><br><br><br><br>

            <?php
            if (isset($_POST["search"])) {
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
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
                                                Customer Name
                                            </th>
                                            <th class="table-headin">
                                                Category
                                            </th>
                                            <th class="table-headin">
                                                Iterms Sold
                                            </th>
                                            <th class="table-headin">
                                                For what Price ?
                                            </th>
                                            <th class="table-headin">
                                                Worth Amount
                                            </th>
                                            <th class="table-headin">
                                                Stock Remain
                                            </th>
                                            <th class="table-headin">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT  i.iterm_name,i.stock,c.category_name,s.unitPrice,s.quantity,s.sale_status,s.customerName,(s.quantity * s.unitPrice) as worth
                                        from iterm i,category c,sale s where c.category_id = i.category_id and i.iterm_id = s.iterm_id and s.saleDate BETWEEN '$start_date' AND 
                                        '$end_date' order by i.iterm_name ASC";
                                        $sell_report = $conn->query($sql);
                                        if ($sell_report->num_rows > 0) {

                                            while ($row = $sell_report->fetch_array()) {
                                                $status = "";
                                                if ($row["sale_status"] == 1) {
                                                    $status = "Complete Sale";
                                                } else {
                                                    $status = "Incomplete Sale";
                                                }
                                                echo '<tr>
                                        <td> &nbsp;' .
                                                    $row["iterm_name"]
                                                    . '</td>
                                        <td>
                                            ' . $row["customerName"] . '
                                        </td>

                                        <td>
                                        ' . $row["category_name"] . '
                                    </td>

                                    <td>
                                    ' . $row["quantity"] . '
                                </td>

                                <td>
                                ' .number_format($row["unitPrice"],2) . '
                            </td>

                            <td>
                            ' .number_format($row["worth"],2). '
                        </td>

                        <td>
                        ' . $row["stock"] . '
                    </td>

                    <td>
                    <div style="display:flex;justify-content: center;">
                    &nbsp;&nbsp;&nbsp;
                    <a class="non-style-link"><button  class="btn-primary-soft btn button-icon"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">' . $status . '</font></button></a>
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
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">No sales iterm available </p>
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
    </div>

</body>

</html>