<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Check out</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/custom.js"></script>
    </head>
    <body onload="loadcheckout()">
        <div class="container">
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
            <div class="container-fluid" id="checkoutbody">
                <div id="details"></div>

                <div class="row">


                    <div class="row">
                        <br/>
                        <div class="container-fluid">
                            <form class="form-horizontal" >
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Credit Card</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="cardnumber" class="form-control" id="cardnumber" placeholder="credit card number" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">CVV</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="cvv" class="form-control" id="cvv" placeholder="CVV" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Expiry</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="month" class="form-control" id="month" placeholder="month" required="true"></br>
                                        <input type="text" name="year" class="form-control" id="year" placeholder="year" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Address</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="address" class="form-control" id="address" placeholder="street address" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">City</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="city" class="form-control" id="city" placeholder="city " required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">State</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="state" class="form-control" id="state" placeholder="state" required="true">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">zipcode</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="zipcode " required="true">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="button" value="place order" onclick="placeorder('<?php echo $_SESSION['username']?>')" class="btn btn-primary col-sm-4"/>
                                    </div>
                                </div>
                            </form>
                            <p id="message"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
