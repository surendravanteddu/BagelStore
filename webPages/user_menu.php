<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
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
                        <div class="navbar-header" style="background-color: #D0D5D6">
                            <a class="navbar-brand" href="user_menu.php" style="margin-left: 5px;">Online Bagel Store</a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a id="cart" href="cart.php">Cart <span class="sr-only"></span></a></li>
                                <li><a href="user_about.php">About Us</a></li>
                                <li><a href="myorders.php">My Orders</a></li>
                                <li><a href="#"><?php echo $_SESSION['username'] ?></a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                            <p style="float:right; margin-top: 18px;">6456 Old Beulah Street Alexandria VA 22315</p>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
            <div style="margin-left: 250px;">
                <?php
                require_once '../services/class.Database.inc';
                $mysqli = Database::getInstance()->getConnection();

                $details = array();
                try {
                    $sql = "select item_id,item_description, item_cost, imagename from items";
                    $result = $mysqli->query($sql);
                    $i = 0;
                    ?><table><?php
                    while (($row = $result->fetch_assoc())) {
                        if ($i == 0) {
                            ?><tr><?php
                            }
                            ?><td><?php
                            $i++;
                            echo "<img src='../images/" . $row['imagename'] . ".jpg' style='width : 250px;height:300px;' alt='" . $row['imagename'] . "'/>";
                            echo "</br><p style='margin-left:60px;'><b> Price: $" . $row['item_cost'] . "</b></p>";
                            echo "</br><button type=\"button\" style='margin-left:60px;' class=\"btn btn-secondary col-sm-6\" onclick='addtocart(".$row['item_id'].",".$row['item_cost'].",\"".$row['imagename']."\")'>Add to Cart</button></br></br>";
                            ?></td><?php
                                    if ($i == 3) {
                                        ?><tr><?php
                                        $i = 0;
                                    }
                                }
                                ?></table><?php
                                } catch (Exception $ex) {
                                    trigger_error($ex->getMessage());
                                }
                                ?>
            </div>
        </div>

    </body>
</html>
