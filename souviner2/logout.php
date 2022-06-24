<?php
session_start();
if (!isset($_SESSION['email_id'])) {
    header('location: login.php');
}
session_destroy();
setcookie('emailcookie','',time()-86400);
setcookie('passwordcookie','',time()-86400);
header('location: index.php');
?>