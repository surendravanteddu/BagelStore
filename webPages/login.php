 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
        <script src="../js/custom.js"></script>
    </head>
    <body>
        <div>
            <div>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="menu.php" style="margin-left: 5px">Online Baggle Store</a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="about.php">About Us</a></li>
                                <li  class="active"><a href="login.php">Login</a></li>
                                <li><a href="signup.php">Sign Up</a></li>
                            </ul>
                            <p style="float:right; margin-top: 18px;">6456 Old Beulah Street Alexandria VA 22315</p>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
            <div>
                <div class="container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row">
                                <br/>
                                <div class="container-fluid">
                                    <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Username</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="username" class="form-control" id="username" placeholder="username" required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password " required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" value="Login" class="btn btn-primary"/>
                                            </div>
                                        </div>
                                    </form>
                                    <p id="message"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                require_once '../services/class.Database.inc';
                $mysqli = Database::getInstance()->getConnection();

                if (isset($_POST['username'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $sql = "select role from customers where username='$username' and password='$password'";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_assoc();
                    if ($row['role'] == 'user') {
                        session_start();
                        $_SESSION['username'] = $username;
                        ?>
                        <script type="text/javascript">
                            setlocalstorage();
                            window.location.href = 'user_menu.php';
                        </script>
                        <?php
                    } else if ($row['role'] == 'admin') {
                        session_start();
                        $_SESSION['username'] = $username;
                        ?>
                        <script type="text/javascript">
                            setlocalstorage();
                            window.location.href = 'admin_menu.php';
                        </script>
        <?php
    } else {
        echo '<p class="alert alert-danger" align="center">Username or Password is incorrrect</p>';
    }
}
?>
            </div>
        </div>
    </body>
</html>
