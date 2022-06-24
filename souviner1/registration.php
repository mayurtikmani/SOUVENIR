<?php
    require("common.php");
    
    $Name= mysqli_real_escape_string($con, $_POST['name']);
    $Email= mysqli_real_escape_string($con, $_POST['email']);
    $Password = mysqli_real_escape_string($con, $_POST['password']);
    $Birthdate = mysqli_real_escape_string($con, $_POST['birthday']);
    $Password = md5($Password);
    $contact_number = mysqli_real_escape_string($con, $_POST['phone']); 
    
    
    
    $query ="SELECT * FROM members WHERE email_id='$Email'";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    $num = mysqli_num_rows($result);
    
    if($num != 0){
        echo "<script>alert('Email already exist')</script>";
        echo ("<script>location.href='index.php'</script>");
    }else{
        $query = "INSERT INTO members(name,email_id,birthdate,phone,password)VALUES('" .$Name ."' , '" .$Email ."' ,'" .$Birthdate. "','".$contact_number. "','" .$Password ."')";
        mysqli_query($con, $query) or die(mysqli_error($con));
        $user_id = mysqli_insert_id($con);
        $_SESSION['Email_id'] = $Email;
        header('location: login.php');
    }
?>