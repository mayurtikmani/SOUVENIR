<?php
    require 'common.php';

    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];
        $sql = "SELECT * FROM memory_database WHERE id =$id";
        
        $viewresult = mysqli_query($con, $sql);
        
        $result= mysqli_fetch_array($viewresult);
        
        
        $dest= 'upload/';
        /**
        * Dencrypt the passed file and saves the result in a new file, removing the
        * last 4 characters from file name.
        * 
        * @param string $source Path to file that should be decrypted
        * @param string $key    The key used for the decryption (must be the same as for encryption)
        * @param string $dest   File name where the decryped file should be written to.
        * @return string|false  Returns the file name that has been created or FALSE if an error occured
        */
        function decryptFile($source, $key, $dest)
        {
            $key = substr(sha1($key, true), 0, 16);

            $error = false;
            if ($fpOut = fopen($dest, 'w')) {
                if ($fpIn = fopen($source, 'rb')) {
                   // Get the initialzation vector from the beginning of the file
                    $iv = fread($fpIn, 16);
                    while (!feof($fpIn)) {
                        $ciphertext = fread($fpIn, 16 * (FILE_ENCRYPTION_BLOCKS + 1)); // we have to read one block more for decrypting than for encrypting
                        $plaintext = openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
                        // Use the first 16 bytes of the ciphertext as the next initialization vector
                        $iv = substr($ciphertext, 0, 16);
                        fwrite($fpOut, $plaintext);
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
        
        $fileName =$result['file_location'];
        file_put_contents($fileName, 'Hello World, here I am.');
        $key = 'my secret key';
        decryptFile($fileName . '.enc', $key, $fileName . '.dec');
        
        //$fileName =$result['file_location'];
    }
?>
<html>
    <head>
        <title> View page </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" charset="UTF-8" content="width=device-width,initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css">
        <style>
            body{
                background: url("images/back.jpg");
                background-size: cover;
                
            }
        </style>
    </head>
    <body>
        <?php
            include 'common/header.php';
        ?>
        <iframe  src="<?php echo $dest.$fileName;?>" width="100%" height="100%" frameborder="0"  ></iframe>
    </body>
</html>

