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
        <form class="box" action="registration.php" method="POST">
            <h1>SIGN UP</h1>
            <input type="text" placeholder="Name" name="name" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="date"  placeholder="Birthdate" size="10" name="birthday" >
            <input type="text"  placeholder="Contact" name="phone" required>
            <button type="submit" name="submit">Submit</button>
            <p style="color:white; font-size: 15px; padding-top: 5px;">  Already have an account ?<a href="login.php">Login</a></p>
        </form>                       
    </body>
</html>
