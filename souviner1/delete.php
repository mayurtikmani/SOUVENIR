<?php
    require 'common.php';

    
    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];
        $sql= "SELECT * FROM `memory_database` WHERE id =$id";
        $viewresult = mysqli_query($con, $sql);
        $rows1= mysqli_fetch_array($viewresult);
        $filename=$rows1['file_location'];
        
        unlink($rows1['file_location']);
        unlink($filename.'.enc');
        $sql1 = "DELETE FROM `memory_database` WHERE id =$id";
        $viewresult1 = mysqli_query($con, $sql1);
        
        $rows= mysqli_num_rows($viewresult);
        $row2= mysqli_num_rows($viewresult1);
        if($rows==0 && $row2==0){
            header("Location:homepage.php?success=1");
            
        }
        else {
            header("Location:homepage.php?success=2");
        }
        
    }
    else {
        echo 'There is no such file in your database';
    }
?>