<?php
    require 'common.php';
?>

<html>
    <head>
        <title> Digi Locker </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" charset="UTF-8" content="width=device-width,initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css">
        <style>
            body{
                background: url("images/back.jpg");
                background-size: fixed;
                
            }
        </style>
    </head>
    <body>
        <?php
            include 'header2.php';
            
            if ( isset($_GET['success']) && $_GET['success'] == 1 )
            {
                echo 'File deleted Successfully';
            }
            if ( isset($_GET['success']) && $_GET['success'] == 2 )
            {
                echo 'There is some error please try again..';
            }
        ?>
        <div class="jambotroin">
        <div class="container">
            <h1 style="color:white;" class="text-center">Data</h1>
            <br>
            <div class="table-responsive">
                <table style="width: 90%;" class="table table-bordered ">
                    <thead>
                        <th>ID</th>
                        <th>File Name</th>
                        <th>options</th>
                    </thead>
                    <tbody>
                        <?php
                            mysqli_select_db($con, 'digilocker');
                            $username=$_SESSION['email_id'];
                            
                            $display="SELECT `id`, `email_id`, `file_name`, `file_location` FROM `digilocker` WHERE email_id='" .$username.  "'";
                                
                            $resultdisplay= mysqli_query($con, $display);
                            
                            $row3= mysqli_num_rows($resultdisplay);
                            
                            if($row3==0){
                                echo '"<h1 style="color:white;">"NO DATA FOUND"</h1>"';
                            }
                            else{
                                
                            while ($result= mysqli_fetch_array($resultdisplay))
                                {
                        ?>
                                    <tr>
                                        <td><?php echo $result['id']; ?></td>
                                        <td><?php echo $result['file_name']; ?></td>
                                        <td><?php echo'<a href="view2.php?id='.$result['id'].'">View </a>';
                                        echo'<a href="update2.php?id='.$result['id'].'"> Update </a>';
                                        echo'<a href="delete2.php?id='.$result['id'].'"> Delete</a>';?></td>
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