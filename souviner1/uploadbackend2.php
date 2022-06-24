<?php
    
    require 'common.php';
    
    if(isset($_POST['submit']))
    {
        $File=$_FILES['file'];
        $fileName= $_FILES['file']['name'];
        $fileTmpname=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
        
        $fileExt= explode('.', $fileName);
        $fileActualExt= strtolower(end($fileExt));
        
        $allowed= array('jpg','jpeg','png','pdf','wav','aac','mp4','mp3');
        
        if(in_array($fileActualExt, $allowed))
        {
            if($fileError === 0)
            {
                if($fileSize < 5000000)
                {
                    $fileNameNew = 'upload2/'.uniqid('',true).".".$fileActualExt;
                    $dest= 'upload2/'.$fileNameNew;
                    
                    move_uploaded_file($fileTmpname, $fileNameNew);
                    $username = $_SESSION['email_id'];
                    $memoryName= mysqli_real_escape_string($con, $_POST['fname']);
                    
                    $q="INSERT INTO `digilocker`(`email_id`, `file_name`, `file_location`) VALUES ('$username','$memoryName','$fileNameNew')";
                    
                    $insertResult = mysqli_query($con, $q) or die(mysqli_error($con));
                    
                    header("Location:upload2.php?uploadsuccess");
                }
                else {
                    echo "Your file is too big!";
                }
            }
            else {
                echo "There was an error uploading your file !";
            }
        }
        else{
            echo "Unvalid extension";
        }
    }
?>