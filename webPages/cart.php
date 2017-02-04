<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cart</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/custom.js"></script>
    </head>
    <body onload="cartdata1()">
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
                                <li  class="active"><a id="cart" href="cart.php">cart <span class="sr-only"></span></a></li>
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
            <div id="cartbody">
                
            
        </div>
            </div>
        </div>
    </body>
</html>
