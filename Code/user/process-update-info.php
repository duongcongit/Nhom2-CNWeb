<?php
include '../constants.php';
?>
<?php

    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    // session_start();
    // if(!isset($_SESSION['isLoginOK'])){
    //     header("location:index.php");
    // }

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $text = $_POST['text'];
        $column_name = $_POST['column_name'];
    }
    
    // Thực hiện truy vấn
    $sql = "UPDATE nguoidung SET $column_name='$text' where maNguoiDung = '$id' ";
    echo $sql;

    $ketqua = mysqli_query($conn,$sql);
    
    // if(!$ketqua){
    //     header("location: error.php"); //Chuyển hướng lỗi
    // }else{
    //     header("location: userInfo.php"); //Chuyển hướng lại Trang Quản trị
    // }

    // Bước 03: Đóng kết nối
    mysqli_close($conn);

?>