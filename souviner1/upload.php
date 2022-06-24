<!DOCTYPE html>
<?php
    require 'common.php';
?>
<html>
    <head>
	<style>
            body{
                background: url("images/back.jpg");
                background-size: cover;
                
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" charset="UTF-8" content="width=device-width,initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            include 'common/header.php';
        ?>
        <form style="color: white;margin-top: 30px;" class="box" role="form" action="uploadbackend.php" method="POST" enctype="multipart/form-data">
            <h1> Upload Form</h1>
              
            <input style="margin-bottom:0;" type="text" name="fname" placeholder="Memory Title">
            <h4 style="color:white;"> Description:</h4>
            <textarea  rows="5" cols="35" name="desc"></textarea>
            <input style="margin-bottom:0;" type="text" name="nname" placeholder="Nominee name">
            <input style="margin-bottom:0;" type="email" name="nemail" placeholder="Nominee Email"><br>
            <input type="file" name="file" id="file"> 
            <button type="submit" value=submit" name="submit">Submit</button>
        </form>                    
    </body>
</html>