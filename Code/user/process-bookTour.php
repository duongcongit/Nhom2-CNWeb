<?php 

//CHeck whether submit button is clicked or not
if(isset($_POST['submit']))
{
    // Get all the details from the form

    if($giaTuoi1==""){
      $giaTuoi1 = 0;
    }
    if($giaTuoi2==""){
      $giaTuoi2 = 0;
    }
    if($giaTuoi3==""){
      $giaTuoi3 = 0;
    }
    $quantity1 = $_POST['quantity1'];
    $quantity2 = $_POST['quantity2'];
    $quantity3 = $_POST['quantity3'];
    $soLuong = $quantity1+$quantity2+$quantity3;
    $hinhThucThanhToan = $_POST['cast'];
    $tongTien = $giaTuoi1* $quantity1 + $giaTuoi2* $quantity2+ $giaTuoi3* $quantity3; // total = price x qty 
    $maPhieuTour = 'PT'.rand(0000,9999);
    $ngayDat = date("Y-m-d h:i:sa"); 

    $tinhTrang = 0; 

    //Save the Order in Databaase
    //Create SQL to save the data
    $sql4 = "INSERT INTO phieudangkitour(maPhieuTour,maNguoiDung,soKhach,maTour,thoiGianDat,hinhThucThanhToan,tinhTrang,tongTien)
     VALUES ('$maPhieuTour','1','$soLuong','$maTour','$ngayDat','$hinhThucThanhToan','$tinhTrang','$tongTien')";
        // maPhieuTour = '$maPhieuTour', 
        // maNguoiDung = '1',
        // soKhach = '$soLuong',
        // maTour = '$maTour',
        // thoiGianDat = '$ngayDat',
        // hinhThucThanhToan = '$hinhThucThanhToan',
        // tinhTrang = '$tinhTrang',
        // tongTien = '$tongTien'

    echo $sql4;
    //Execute the Query
    $res4 = mysqli_query($conn, $sql4);
    echo $res4;

    //Check whether query executed successfully or not
    if($res4==true)
    {
        //Query Executed and Order Saved
        $_SESSION['order'] = "<div class='success text-center'>Chúc mừng bạn đã đặt Tour thành công</div>";
        // header('location:'.SITEURL);
    }
    else
    {
        //Failed to Save Order
        $_SESSION['order'] = "<div class='error text-center'>Đặt TOUR Thất Bại.</div>";
        // header('location:'.SITEURL);
    }

}

?>