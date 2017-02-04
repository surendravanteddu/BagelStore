<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
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
                                <li><a href="login.php">Login</a></li>
                                <li  class="active"><a href="signup.php">Sign Up</a></li>
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
                                            <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" id="username" placeholder="username" required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">First Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Last Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname" required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="email id " required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Confirm Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="cemail" class="form-control" id="cemail" placeholder="confirm email id " required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password " required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" value="Sign Up" class="btn btn-primary"/>
                                            </div>
                                        </div>
                                    </form>
                                    <p id="message"></p>
                                </div>
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
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $cemail = $_POST['cemail'];
                $password = $_POST['password'];
                if ($email == $cemail) {
                    $sql = "insert into customers values('$username','$firstname', '$password','$lastname', '$email','user')";
                    $result = $mysqli->query($sql);
                    if ($result) {
                        ?>
                        <script type="text/javascript">
                            window.location.href = 'login.php';
                        </script>
                        <?php
                    } else {
                        '<p class="alert alert-danger" align="center">Sign up failed</p>';
                    }
                } else {
                    echo '<p class="alert alert-danger" align="center">emails doesnot match</p>';
                }
            }
            ?>
        </div>
    </body>
</html>
