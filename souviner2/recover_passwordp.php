<?php
            session_start();
            ob_start();
?>           
<!DOCTYPE html>
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
                 include("common.php");
                 if(isset($_POST['submit'])){
                $NewPassword = mysqli_real_escape_string($con, $_POST['password']);
                $Cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
                $NewPassword = md5($NewPassword);
                $Cpassword = md5($Cpassword);
                if(isset($_GET['token'])){
                    $token = $_GET['token'];
                    
                
                if($NewPassword === $Cpassword)
                {
                    $updatequery = "update members set password ='".$NewPassword."' where token = '".$token."'";
                    $iquery = mysqli_query($con,$updatequery);
                    if($iquery)
                    {
                        $_SESSION['msg'] = "Your password has been updated";
                        header('location:login.php');
                
                    }
                    else
                    {
                        $_SESSION['pmsg']="Your password has not been updated";
                        header('location:recover_passwordp.php');
                
                    }
                }    
                else 
                {
                    $_SESSION['pmsg']="Your password are not matching";
                 }
            }else{
                echo"No Token found";
            }
        }
 ?>
                <div id="content">
            <div id="banner-image">
                <div class="container" id="top">
                    <div class="row-6">
                        <div class="col-sm-10 col-md-4 col-md-offset-7">
                            <div id="test">
                                <div class="jambotroin" style="border-radius: 20px; min-height: 430px;">
                                    <b><h2 style="color:black; padding-top: 15px;">RECOVER PASSWORD</h2></b>
                                    <p><?php
                                    if(isset($_SESSION['pmsg'])){
                                        echo$_SESSION['pmsg'];
                                    }else{
                                        echo $_SESSION['pmsg']="";

                                    } 
                                      ?>  </p>
                                    
                                    <form  action="" method="POST">
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input type="password" class="form-control" placeholder="New Password" name="password" required>
                                        </div>
                                        
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                                        </div>
                                        <div style="padding-top:5px;" class="col-sm-11">
                                            <button type="submit" name="submit" class="btn btn-primary">Update Password</button>
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
