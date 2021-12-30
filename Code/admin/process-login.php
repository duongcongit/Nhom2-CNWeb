<?php
    // Tạo SESSION: mặc định mỗi phiên làm việc có thời hạn là 24 phút
    session_start();

    if(isset($_POST['btnSignIn'])){
        $user = $_POST['txtUser'];
        $pass = $_POST['txtPass'];
        //Bước 1: Kết nối Database server
        include('../config/constants.php');
        if(!$conn){
            die('Kết nối thất bại!');
        }
        // Bước 2: Thực hiện truy vấn
        $sql = "SELECT * from nhanvien where UserName='$user'";

        $result = mysqli_query($conn, $sql);
        // Kiểm tra tài khoản
        if(mysqli_num_rows($result) > 0){
            // Kiểm tra mật khẩu
            $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['PassWord'])){
                $_SESSION['isLoginOK'] = $user;
                header("location: index.php");
            }
            else{
                $error = "Mật khẩu sai. Vui lòng nhập lại!";
                header("location: login.php?error=$error");
            }   
        }
        else{
            $error = "Thông tin tài khoản hoặc mật khẩu bạn nhập không chính xác!";
            header("location: login.php?error=$error");
        }
        // Bước 3: Đóng kết nối
        mysqli_close($conn);
    }
    else{
        header("location: login.php");
    }
?>