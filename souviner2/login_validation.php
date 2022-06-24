<?php
    require ("common.php");
    
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $password= mysqli_real_escape_string($con, $_POST['password']);
    $password= md5($password);
    
    $select_query = "SELECT name,email_id FROM members WHERE email_id='" .$email . "'AND password='" .$password ."'";
    $result = mysqli_query($con, $select_query) or die(mysqli_error($con));
    $num = mysqli_num_rows($result);
    if($result){
        if(isset($_POST['rememberme'])){
            setcookie('emailcookie',$email,time()+86400);
            setcookie('passwordcookie',$password,time()+86400);
            header('location: index.php');
        }else{
            header('location: index.php');//error
        }

    }
    
    if($num == 0){
        echo "<script>alert('Wrong Email Id')</script>";
        echo ("<script>location.href='index.php'</script>");
    }else{
        $row = mysqli_fetch_array($result);
        $_SESSION['email_id'] = $row['email_id'];
        header('location: index.php');
    }
?>