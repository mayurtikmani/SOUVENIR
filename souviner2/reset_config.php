<?php
    require 'common.php';
    $Email= mysqli_real_escape_string($con, $_POST['email']);
    $query ="SELECT * FROM members WHERE email_id='$Email'";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    $num = mysqli_num_rows($result);
        if($num){
            $userdata = mysqli_fetch_array($result);
            $username = $userdata['name'];
            $token = $userdata['token'];
            $subject = "Password Reset";
            $body = "Hi, $username Click Here to Reset Password
            http://localhost/souviner1/recover_passwordp.php?token=$token";//Change here name
            $headers = "From: parth8780166465@gmail.com";

            if (mail($Email, $subject, $body, $headers)) {
                $_SESSION['msg']="Check your mail to reset your password $Email";
                header('location:login.php');
            } else {
                echo "Email sending failed...";
             }
            }else{
                echo"No Email Found";

            }
        

        $user_id = mysqli_insert_id($con);
        $_SESSION['Email_id'] = $Email;
        header('location: login.php');
    
?>