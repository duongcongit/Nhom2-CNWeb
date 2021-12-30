<?php
    include('../config/constants.php');
    // Kiểm tra và đăng xuất
    if(isset($_SESSION['adminAccount'])){
        unset($_SESSION['adminAccount']);
        header("location:" . SITEURL . "admin/login.php");
    }

?>