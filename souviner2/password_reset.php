<!DOCTYPE html>

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
        <div id="content">
            <div id="banner-image">
                <div class="container" id="top">
                    <div class="row-6">
                        <div class="col-sm-10 col-md-4 col-md-offset-7">
                            <div id="test">
                                <div class="jambotroin" style="border-radius: 20px; min-height: 430px;">
                                    <b><h3 style="color:black; padding-top: 15px;">Recover Your Password</h3></b>
                                    <p class="text-center">Please fill your Email properly</p>
                                    <form  action="reset_config.php" method="POST">
                                        <div style="padding-top:5px;" class="form-group col-sm-11">
                                            <input type="email" class="form-control"  placeholder="Email" name="email" required>
                                        </div>
                                        <div style="padding-top:5px;" class="col-sm-11">
                                            <button type="submit" name="submit" class="btn btn-primary">Send Mail</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
