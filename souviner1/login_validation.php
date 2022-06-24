<?php
    require ("common.php");
    
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $password= mysqli_real_escape_string($con, $_POST['password']);
    $password= md5($password);
    
    $select_query = "SELECT name,email_id FROM members WHERE email_id='" .$email . "'AND password='" .$password ."'";
    $result = mysqli_query($con, $select_query) or die(mysqli_error($con));
    $num = mysqli_num_rows($result);
    
    if($num == 0){
        echo "<script> echo 'Wrong Email Id or password'</script>";
        echo ("<script>location.href='login.php'</script>");
    }else{
        $row = mysqli_fetch_array($result);
        $_SESSION['email_id'] = $row['email_id'];
        header('location: homepage.php');
    }
?>