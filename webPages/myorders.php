<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>About us</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/custom.js"></script>
    </head>
    <body onload="cartdata()">
        <div>
            <?php
            session_start();

            if (!isset($_SESSION['username'])) {
                ?>
                <script type="text/javascript">
                    window.location.href = 'login.php';
                </script>
                <?php
            }
            ?>
            <div>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="user_menu.php" style="margin-left: 5px">Online Baggle Store</a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a id="cart" href="cart.php">cart <span class="sr-only"></span></a></li>
                                <li><a href="user_about.php">About Us</a></li>
                                <li class="active"><a href="myorders.php">My Orders</a></li>
                                <li><a href="#"><?php echo $_SESSION['username'] ?></a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                            <p style="float:right; margin-top: 18px;">6456 Old Beulah Street Alexandria VA 22315</p>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
            <div>
                <div style="margin-left: 250px;">
                    <?php
                    require_once '../services/class.Database.inc';
                    $mysqli = Database::getInstance()->getConnection();

                    $details = array();
                    try {
                        $sql = "SELECT orders.order_id as oid, orders.order_date as date, items.imagename as imagename, items.item_cost as cost,orders.status as status FROM orders,orders_items,items,customers WHERE orders.order_id=orders_items.order_id and orders_items.items_id=items.item_id and customers.username=orders.customer_id and customers.username='".$_SESSION['username']."' ORDER BY oid ASC;";
                        $result = $mysqli->query($sql);
                        $tempoid = 0;
                        $cost = 0;
                        $i = 0;
                        $t = 0;
                        $status = "";
                        while (($row = $result->fetch_assoc())) {
                            if ($tempoid != $row['oid']) {
                                if($t==1){
                                    $i=0;
                                    echo "</table>";
                                    echo "<p class='alert alert-warning' style='margin-right :200px'><b>Total Cost $".$cost."</b> <b style='margin-left: 500px;'>".$status."</b></p>";
                                    $cost = 0;
                                    echo "</br></br></br>";
                                }
                                $t = 1;
                                $tempoid = $row['oid'];
                                $status = $row['status'];
                                echo "<p class='alert alert-warning' style='margin-right :200px'><b>Order Id ".$row['oid']."</br>Order Date ".$row['date']."</b></p>";
                                
                                echo "</br>";
                                ?><table><?php
                                }


                                if ($i == 0) {
                                    echo "<tr>";
                                }
                                echo "<td><img src='../images/" . $row['imagename'] . ".jpg' style='width : 150px;height:200px;' />";
                                echo "<p style='margin-left:30px;'><b> Price: $" . $row['cost'] . "</b></p></td>";
                                $i++;
                                $cost = $cost + $row['cost'];
                                if ($i == 5) {
                                    echo "</tr>";
                                    $i = 0;
                                }
                            }
                           if($t==1){
                            echo "</table>";
                           
                            echo "<p class='alert alert-warning' style='margin-right :200px'><b>Total Cost $".$cost."</b><b style='margin-left: 500px;'>".$status."</b></p>";
                           }else{
                               echo "<p align='center' class='alert alert-warning' style='margin-right :200px'><b>No Orders</b></p>";
                           }
                        } catch (Exception $ex) {
                            trigger_error($ex->getMessage());
                        }
                        ?>
                </div>

            </div>
        </div>
    
</body>
</html>
