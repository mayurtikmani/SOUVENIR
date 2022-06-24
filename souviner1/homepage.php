<?php
    require 'common.php';
?>

<html>
    <head>
        <title> Homepage </title>
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
        <div class="jambotroin">
        <div class="container">
            <h1 style="color:white;" class="text-center">Your Table of memories</h1>
            <br>
            <div class="table-responsive">
                <table style="width: 90%;" class="table table-bordered ">
                    <thead>
                        <th>Id</th>
                        <th>Memory title</th>
                        <th>Description</th>
                        <th>Nominee Name</th>
                        <th>Nominee Email</th>
                        <th>Viewing option</th>
                    </thead>
                    <tbody>
                        <?php
                            mysqli_select_db($con, 'memory_database');
                            $username=$_SESSION['email_id'];
                            
                            $display="SELECT `id`, `memory_title`, `memory_discription`, `nominee_name`, `nominee_email` FROM `memory_database` WHERE email_id='" .$username.  "'";
                                
                            $resultdiaplay= mysqli_query($con, $display);
                            
                            $row2= mysqli_num_rows($resultdiaplay);
                            
                            if($row2==0){
                                echo '"<h1 style="color:white;">"NO DATA FOUND"</h1>"';
                            }
                            else{
                                
                            while ($result= mysqli_fetch_array($resultdiaplay))
                                {
                        ?>
                                    <tr>
                                        <td><?php echo $result['id']; ?></td>
                                        <td><?php echo $result['memory_title']; ?></td>
                                        <td><?php echo $result['memory_discription']; ?></td>
                                        <td><?php echo $result['nominee_name']; ?></td>
                                        <td><?php echo $result['nominee_email']; ?></td>
                                        <td><?php echo'<a href="view.php?id='.$result['id'].'">view </a>';
                                        echo'<a href="update.php?id='.$result['id'].'"> Update </a>';
                                        echo'<a href="delete.php?id='.$result['id'].'"> Delete</a>';?></td>
                                    </tr>
                            <?php        }}
                                
                        ?>      
                    </tbody>
                </table>
            </div>
        </div>
            </div>
    </body>
</html>