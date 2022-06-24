<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
                if(isset($_SESSION['email_id']))
            {?>
                <a href="homepage.php" class="navbar-brand"> Souvenir </a>
            
            <?php
            } else {?>
                <a href="index.php" class="navbar-brand"> Souvenir </a>
            <?php }?>    
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION['email_id']))
                {?>
                    <li><a href="aboutus.php"><span class="glyphicon glyphicon-lock"></span> DegiLocker </a></li>
                    <li><a href = "settings.php"><span class = "glyphicon glyphicon-user"></span> Settings</a></li>
                    <li><a href = "upload.php"><span class = "glyphicon glyphicon-plus"></span> Add memory</a></li>
                    <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-in"></span> Logout</a></li>
                <?php
                } else {?>
                    <li><a href="aboutus.php"><span class="glyphicon glyphicon-lock"></span> DegiLocker </a></li>
                    <li><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>