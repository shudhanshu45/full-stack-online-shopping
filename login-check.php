<?php
if(!isset($_SESSION['user'])){
    $_SESSION['no-login-message'] = "<div class='error'>Please login to acess Admin Panel </div>";
    header('location:'.SITEURL.'admin/login.php');
}

?>
