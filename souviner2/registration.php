<?php
    require("common.php");
    
    $Name= mysqli_real_escape_string($con, $_POST['name']);
    $Email= mysqli_real_escape_string($con, $_POST['email']);
    $Password = mysqli_real_escape_string($con, $_POST['password']);
    $Cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $Birthdate = mysqli_real_escape_string($con, $_POST['birthday']);
    $Password = md5($Password);
    $Cpassword = md5($Cpassword);
    $token = bin2hex(random_bytes(15));
    $contact_number = mysqli_real_escape_string($con, $_POST['phone']);

    
    
    
    $query ="SELECT * FROM members WHERE email_id='$Email'";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    $num = mysqli_num_rows($result);
    
    if($num != 0){
        echo "<script>alert('Email already exist')</script>";
        echo ("<script>location.href='index.php'</script>");
    }else{
        $query = "INSERT INTO members(name,email_id,birthdate,phone,password,token,status,cpassword)VALUES('" .$Name ."' , '" .$Email ."' ,'" .$Birthdate. "','".$contact_number. "','" .$Password ."','" .$token."',' inactive','".$Cpassword."' )";
        mysqli_query($con, $query) or die(mysqli_error($con));
        if($query){
            //$to_email = "parth34342019@gmail.com";
            $subject = "Email Activation";
            $body = "Hi, $Name. Click Here to activate your Account
            http://localhost/souviner1/activate.php?token=$token";
            $headers = "From: parth8780166465@gmail.com";

            if (mail($Email, $subject, $body, $headers)) {
                $_SESSION['msg']="Check your mail to activate your account $Email";
                header('location:login.php');
            } else {
                echo "Email sending failed...";
             }
            }else{
                echo"Not Inserted";

        }

        $user_id = mysqli_insert_id($con);
        $_SESSION['Email_id'] = $Email;
        header('location: login.php');
    }
?>