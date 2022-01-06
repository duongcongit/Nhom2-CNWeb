<?php include('../constants.php'); ?>
<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    if(!isset($_SESSION['loginAccount'])){
        header("location:".SITEURL);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../assets/js/userInfo.js"></script>
  <link rel="stylesheet" href="../assets/css/userInfoStyle.css">

  <title>Thông Tin Cá Nhân</title>
  </head>
  
<body>
    <?php
    require "partials/header.php";
    ?>

  <main>
    <div class="container mt-5 pt-5">
        <div class="container bootstrap snippets bootdey">
            <div class="panel-body inf-content">
                <div class="row">
                    <div class="col-md-4">
                        <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario"> 
                    </div>
                    <div class="col-md-6">
                        <h3 class ="text-center mt-3">Thông tin cá nhân</h3> 
                        <div class="table-responsive">
                        <table class="table table-user-information">
                            <tbody> 
                                <!-- Vùng này là Dữ liệu cần lặp lại hiển thị từ CSDL -->
                    <?php
                        if(!$conn){
                            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                        }
                        // Bước 02: Thực hiện truy vấn
                        $sql = "SELECT * FROM nguoidung where maNguoiDung = '{$_SESSION['loginAccount1']}'";
                        $result = mysqli_query($conn,$sql);
                        // Bước 03: Xử lý kết quả truy vấn
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                            ID Người Dùng                                              
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['maNguoiDung']; ?>    
                                    </td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            Họ Tên                                                
                                        </strong>
                                    </td>
                                    <td contenteditable data-id1="<?php echo $row['maNguoiDung'] ?>" class="text-primary hovaten"><?php echo $row['hoVaTen']; ?></td>
                                </tr>


                                <tr>        
                                    <td>
                                        <strong>
                                            Giới Tính                                                
                                        </strong>
                                    </td>
                                    <td contenteditable data-id2="<?php echo $row['maNguoiDung'] ?>" class="text-primary gioitinh"><?php echo $row['gioiTinh']; ?></td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            Số điện thoại                                                
                                        </strong>
                                    </td>
                                    <td contenteditable data-id3="<?php echo $row['maNguoiDung'] ?>" class="text-primary sodienthoai"><?php echo $row['soDienThoai']; ?></td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            Email                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['email']; ?>  
                                    </td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            Địa chỉ                                               
                                        </strong>
                                    </td>
                                    <td contenteditable data-id4="<?php echo $row['maNguoiDung'] ?>" class="text-primary diachi"><?php echo $row['diaChi']; ?></td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            Số CMND                                               
                                        </strong>
                                    </td>
                                    <td contenteditable data-id5="<?php echo $row['maNguoiDung'] ?>" class="text-primary socmnd"><?php echo $row['soCMT']; ?></td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
                                  
                            </tbody>
                        </table>
                        </div>
                        <h4>
                            Thay đổi thông tin đánh trực tiếp vào dòng
                        </h4>
                    </div>
                </div>
            </div>
        </div>                                        
    </div>

    <!-- Processing Tour -->
    <div class="container mt-5">
        
        <div class="container">
                <h2 class="text-center pt-3">Các Tour Đang Chờ Duyệt</h2>
                <div class="row">        
                <?php 
                
                //Getting tours from Database that are active and featured
                //SQL Query
                $sql1 = "SELECT tour.hinhAnh,phieudangkitour.maPhieuTour,phieudangkitour.maNguoiDung,tour.maTour,phieudangkitour.soKhach,
                phieudangkitour.hinhThucThanhToan,phieudangkitour.tongTien,phieudangkitour.tinhTrang,tour.tenTour
                 FROM phieudangkitour,tour,nguoidung where phieudangkitour.maTour = tour.maTour AND phieudangkitour.tinhTrang ='0'
                 AND nguoidung.maNguoiDung = phieudangkitour.maNguoiDung AND nguoidung.maNguoiDung = '{$_SESSION['loginAccount1']}'";
                
                //Execute the Query
                $res1 = mysqli_query($conn, $sql1);


                //Câu lệnh lấy thông tin chi tiết về giá tour của phiếu
                $sql3 = "SELECT distinct phieudangkitour.maPhieuTour,giatour.moTa,chitietgia.soLuong,chitietgia.thanhTien
                 FROM phieudangkitour,chitietgia,giatour where chitietgia.doTuoi = giatour.doTuoi AND chitietgia.maPhieuTour = phieudangkitour.maPhieuTour and giaTour.maTour = phieudangkitour.maTour";
                
                //Execute the Query
                $res3 = mysqli_query($conn, $sql3);
                
                
                //CHeck whether tour available or not
                if(mysqli_num_rows($res1) > 0)
                {
                    //tour Available
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                        //Get all the values
                        $hinhAnh = $row1['hinhAnh'];
                        $tenTour = $row1['tenTour'];
                        $maPhieuTour = $row1['maPhieuTour'];
                        $maKH = $row1['maNguoiDung'];
                        $maTour = $row1['maTour'];
                        $soLuong = $row1['soKhach'];
                        $hinhThucThanhToan = $row1['hinhThucThanhToan'];
                        $TongTien = $row1['tongTien'];
                        $TinhTrang = $row1['tinhTrang'];
                        
                ?>
                        <div class="tour-menu-box p-3 border border-success m-2 rounded">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php 
                                    //Check whether image available or not
                                    if($hinhAnh=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $hinhAnh.'.jpg'; ?>" alt="" class="img-fluid">
                                        <?php
                                    }
                ?>
                                
                            </div>
                            <div class="col-md-8">
                                <h4>Mã Phiếu Tour: <?php echo $maPhieuTour; ?></h4>
                                <h4>Tên Tour: <?php echo $tenTour; ?></h4>
                                <p>Mã Tour: <?php echo $maTour; ?></p>
                                <p>Hình thức thanh toán: <?php echo $hinhThucThanhToan ?></p>
                                <?php
                                    if(mysqli_num_rows($res3)>0){
                                        while($row3=mysqli_fetch_assoc($res3)){
                                            echo "<p>{$row3['moTa']}: {$row3['soLuong']} -> Thành Tiền: {$row3['thanhTien']}</p>";
                                            }
                                    }
                                ?>
                                <p>Tổng số lượng người: <?php echo $soLuong ?></p>
                                <p style="color:red">Tổng tiền: <?php echo $TongTien ?></p>
                                <br>
                                
                                <a href="<?php echo SITEURL; ?>user/bookTour.php?MaTour=<?php echo $maTour; ?>" class="btn btn-primary">Xem lại Tour</a>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                }else
                {
                    //Tour Not Available 
                    echo "<div class='error'>Bạn chưa đặt tour nào.</div>";
                }
                
                
                ?>
                </div>
                
            </div>
            
    </div>

    <!-- Booked Tour -->
    <div class="container mt-5">
        
    <div class="container">
                <h2 class="text-center pt-3">Các Tour Đã Đặt Thành Công</h2>
                <div class="row">        
                <?php 
                
                //Getting tours from Database that are active and featured
                //SQL Query
                $sql2 = "SELECT tour.hinhAnh,phieudangkitour.maPhieuTour,phieudangkitour.maNguoiDung,tour.maTour,phieudangkitour.soKhach,
                phieudangkitour.hinhThucThanhToan,phieudangkitour.tongTien,phieudangkitour.tinhTrang,tour.tenTour
                 FROM phieudangkitour,tour,nguoidung where phieudangkitour.maTour = tour.maTour AND phieudangkitour.tinhTrang ='1'
                 AND nguoidung.maNguoiDung = phieudangkitour.maNguoiDung AND nguoidung.maNguoiDung = '{$_SESSION['loginAccount1']}'";
                
                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);
                
                //Count Rows
                $count2 = mysqli_num_rows($res2);
                
                //CHeck whether tour available or not
                if($count2>0)
                {
                    //tour Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        //Get all the values
                        $hinhAnh = $row2['hinhAnh'];
                        $maPhieuTour = $row2['maPhieuTour'];
                        $maKH = $row2['maNguoiDung'];
                        $maTour = $row2['maTour'];
                        $soLuong = $row2['soKhach'];
                        $hinhThucThanhToan = $row2['hinhThucThanhToan'];
                        $TongTien = $row2['tongTien'];
                        $TinhTrang = $row2['tinhTrang'];
                        
                ?>
                        <div class="tour-menu-box p-3 border border-success m-2 rounded">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php 
                                    //Check whether image available or not
                                    if($hinhAnh=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $hinhAnh.'.jpg'; ?>" alt="" class="img-fluid">
                                        <?php
                                    }
                ?>
                                
                            </div>
                            <div class="col-md-8">
                                <h4>Mã Phiếu Tour: <?php echo $maPhieuTour; ?></h4>
                                <h4>Tên Tour: <?php echo $tenTour; ?></h4>
                                <p>Mã Tour: <?php echo $maTour; ?></p>
                                <p>Hình thức thanh toán: <?php echo $hinhThucThanhToan ?></p>
                                <?php
                                    if(mysqli_num_rows($res3)>0){
                                        while($row3=mysqli_fetch_assoc($res3)){
                                            echo "<p>{$row3['moTa']}: {$row3['soLuong']} -> Thành Tiền: {$row3['thanhTien']}</p>";
                                            }
                                    }
                                ?>
                                <p>Tổng số lượng người: <?php echo $soLuong ?></p>
                                <p style="color:red">Tổng tiền: <?php echo $TongTien ?></p>
                                <br>
                                
                                <a href="<?php echo SITEURL; ?>user/bookTour.php?MaTour=<?php echo $maTour; ?>" class="btn btn-primary">Xem lại Tour</a>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                }else
                {
                    //Tour Not Available 
                    echo "<div class='error'>Chưa có Tour nào được chấp nhận.</div>";
                }
                
                
                ?>
                </div>
                
            </div>
        
    </div>

    <?php
    include "partials/footer.php";
    ?>


    
  </main>


</body>

</html>