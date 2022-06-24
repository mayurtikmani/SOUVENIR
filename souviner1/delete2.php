<?php
    require 'common.php';

    
    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];
        $sql= "SELECT * FROM `digilocker` WHERE id =$id";
        $viewresult = mysqli_query($con, $sql);
        $rows1= mysqli_fetch_array($viewresult);
        
        unlink($rows1['file_location']);
        
        $sql1 = "DELETE FROM `digilocker` WHERE id =$id";
        $viewresult1 = mysqli_query($con, $sql1);
        
        $rows= mysqli_num_rows($viewresult);
        $row2= mysqli_num_rows($viewresult1);
        if($rows==0 && $row2==0){
            header("Location:aboutus.php?success=1");
            
        }
        else {
            header("Location:aboutus.php?success=2");
        }
        
    }
    else {
        echo 'There is no such file in your database';
    }
?>