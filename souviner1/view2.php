<?php
    require 'common.php';

    
    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];
        $sql = "SELECT * FROM digilocker WHERE id =$id";
        
        $viewresult = mysqli_query($con, $sql);
        
        $result= mysqli_fetch_array($viewresult);
        
        
        $fileName =$result['file_location'];
    }
    else {
        echo 'There is no such file in your database';
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
            include 'header2.php';
        ?>
        <iframe  src="<?php echo $fileName;?>" width="100%" height="100%" frameborder="0"  ></iframe>
    </body>
</html>
