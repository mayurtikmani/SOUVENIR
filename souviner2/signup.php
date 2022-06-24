<!DOCTYPE html>
<?php
    require 'common.php';
?>
<html>
    <head>
	<style>
            body{
                background: url("images/back.jpg");
                background-size: cover;
                }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" charset="UTF-8" content="width=device-width,initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            include 'common/header.php';
        ?>
        <div id="content">
            <div id="banner-image">
                <div class="container" id="top">
                    <div class="row-6">
                        <div class="col-sm-10 col-md-4 col-md-offset-7">
                            <div id="test">
                                <div class="jambotroin" style="border-radius: 20px; min-height: 430px;">
                                    <b><h2 style="color:black; padding-top: 15px;">SIGN UP</h2></b>
                                    <form  action="registration.php" method="POST">
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input class="form-control" placeholder="Name" name="name" required>
                                        </div>
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input type="email" class="form-control"  placeholder="Email" name="email" required>
                                        </div>
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                                        </div>
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                                        </div>
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input type="date" class="form-control"  placeholder="Birthdate" size="10" name="birthday" >
                                        </div>
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input type="text" class="form-control"  placeholder="Contact" name="phone" required>
                                        </div>
                                        <div style="padding-top:5px;" class="col-sm-11">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        <div style="padding-top:5px;" class="col-sm-11">
                                          <p style="color:white; font-size: 15px; padding-top: 5px;">  Already have an account ?<a href="login.php">Login</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
