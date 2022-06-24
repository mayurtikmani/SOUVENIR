<?php
            session_start();
            require("common.php");
            ob_start();
?>            
                $NewPassword = mysqli_real_escape_string($con, $_POST['password']);
                $Cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
                $NewPassword = md5($NewPassword);
                if(isset($_GET['token'])){
                    $token = $_GET['token'];
                    
                
                if($NewPassword === $Cpassword)
                {
                    $updatequery = "update members set password ='$NewPassword'where token = $token";
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
                    $_SESSION['msg']="Your password are not matching";
                 }
            }else{
                echo"No Token found";
            }
        
        ?>
