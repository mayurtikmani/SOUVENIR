<!DOCTYPE html>
<?php
    require 'common.php';
    ob_start();
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
                    <div class="row">
                        <div class="col-sm-10 col-md-4 col-md-offset-1">
                            <div id="test">
                                <div class="jambotroin" style="border-radius: 20px; min-height: 350px;">
                                    <h3 style="color:black; padding-top:15px;">LOGIN</h3>
                                    <div>
                                        <p><?php 
                                        //Message printing on Sign up page
                                        if(isset($_SESSION['msg'])){
                                            echo $_SESSION['msg'];

                                        }else{
                                            echo $_SESSION['msg']="You are logged out.Please login in again";
                                        }
                                        
                                        ?> </p>
                                    </div>

                                    <form style="padding-top:15px; padding-right: 20px;" role="form" action="login_validation.php" method="POST">
                                        <div style="padding-top:15px;" class="form-group">
                                            <input type="email" class="form-control"  placeholder="Email" name="email" required
                                            value="<?php 
                                            if(isset($_COOKIE["emailcookie"])){ echo"$_COOKIE[emailcookie]";
                                                //Remember Me

                                            }
                                            ?>">
                                        </div>
                                        <div style="padding-top:15px;" class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password" required
                                            value="<?php 
                                            if(isset($_COOKIE["passwordcookie"])){ echo"$_COOKIE[passwordcookie]";//Remember Me

                                            }
                                            ?>"
                                            
                                            
                                            >
                                        </div>
                                        <!--Remember me box---->
                                        <div style="padding-top:15px;" class="form-group">
                                            <input type="checkbox"  name="rememberme" >Remember Me
                                        </div>
                                        <!--Remember me box---->
                                        <div style="padding-top:15px;">
                                            <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                        </div>
                                    </form>
                                    <!---Recovery--->
                                    <p style="color:white; font-size: 15px;">Forgot Password..No Worry <a href="password_reset.php">Click Here</a></p>
                                    <!---Recovery--->
                                    <p style="color:white; font-size: 15px;">Don't have an account? <a href="signup.php">Register</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>