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
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $dest= 'upload/'.$fileNameNew;
                    
                    
                    define('FILE_ENCRYPTION_BLOCKS', 10000);

                    /**
                    * Encrypt the passed file and saves the result in a new file with ".enc" as suffix.
                    * 
                    * @param string $source Path to file that should be encrypted
                    * @param string $key    The key used for the encryption
                    * @param string $dest   File name where the encryped file should be written to.
                    * @return string|false  Returns the file name that has been created or FALSE if an error occured
                    */
                    function encryptFile($source, $key, $dest)
                    {
                        $key = substr(sha1($key, true), 0, 16);
                        $iv = openssl_random_pseudo_bytes(16);

                        $error = false;
                        if ($fpOut = fopen($dest, 'w')) {
                            // Put the initialzation vector to the beginning of the file
                            fwrite($fpOut, $iv);
                            if ($fpIn = fopen($source, 'rb')) {
                                while (!feof($fpIn)) {
                                    $plaintext = fread($fpIn, 16 * FILE_ENCRYPTION_BLOCKS);
                                    $ciphertext = openssl_encrypt($plaintext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
                                    // Use the first 16 bytes of the ciphertext as the next initialization vector
                                    $iv = substr($ciphertext, 0, 16);
                                    fwrite($fpOut, $ciphertext);
                                }
                                fclose($fpIn);
                            } else {
                                $error = true;
                            }
                            fclose($fpOut);
                        } else {
                            $error = true;
                        }

                        return $error ? false : $dest;
                    }
                    $fileName = 'upload/'.$fileNameNew;
                    $key = 'my secret key';
                    file_put_contents($fileName, 'Hello World, here I am.');
                    encryptFile($fileName, $key, $fileName . '.enc');
                    
                    //move_uploaded_file($fileTmpname, $fileNameNew);
                    $username = $_SESSION['email_id'];
                    $memoryName= mysqli_real_escape_string($con, $_POST['fname']);
                    $memoryDescription= mysqli_real_escape_string($con, $_POST['desc']);
                    $nomineeName= mysqli_real_escape_string($con, $_POST['nname']);
                    $nomineeEmail= mysqli_real_escape_string($con, $_POST['nemail']);
                    
                    $q="INSERT INTO `memory_database`(`email_id`, `memory_title`, `memory_discription`, `file_location`, `nominee_name`, `nominee_email`) VALUES ('$username','$memoryName','$memoryDescription','$fileNameNew','$nomineeName','$nomineeEmail')";
                    
                    $insertResult = mysqli_query($con, $q) or die(mysqli_error($con));
                    
                    header("Location:upload.php?uploadsuccess");
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