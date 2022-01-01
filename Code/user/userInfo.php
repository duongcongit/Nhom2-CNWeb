<?php include('../constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/userInfoStyle.css">
  <title>Document</title>
</head>

<body>
    <header>
      <!-- navbar -->
      <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light main-navbar">
              <div class="container-fluid">
                <a class="navbar-brand" href="user.php">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" href="user.php" tabindex="-1" aria-disabled="true">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="categories.php" tabindex="-1" aria-disabled="true">Categories</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="userInfo.php" tabindex="-1" aria-disabled="true">User info</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
        </div>
      </div>
  </header>

  <main>
    <div class="container mt-5">
        <div class="container bootstrap snippets bootdey">
            <div class="panel-body inf-content">
                <div class="row">
                    <div class="col-md-4">
                        <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario"> 
                    </div>
                    <div class="col-md-6">
                        <h3 class ="text-center mt-3">Information</h3> 
                        <div class="table-responsive">
                        <table class="table table-user-information">
                            <tbody> 
                                <!-- Vùng này là Dữ liệu cần lặp lại hiển thị từ CSDL -->
                    <?php
                        // Bước 01: Kết nối Database Server
                        $conn = mysqli_connect('localhost','root','','testx');
                        if(!$conn){
                            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                        }
                        // Bước 02: Thực hiện truy vấn
                        $sql = "SELECT * FROM nguoidung";
                        $result = mysqli_query($conn,$sql);
                        // Bước 03: Xử lý kết quả truy vấn
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                            Id Khách Hàng                                               
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['MaNguoiDung']; ?>    
                                    </td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                            Họ Tên                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['HoTen']; ?>  
                                    </td>
                                </tr>


                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                            Giới Tính                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['GioiTinh']; ?>  
                                    </td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                            Số điện thoại                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['SoDienThoai']; ?>  
                                    </td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                            Email                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['Email']; ?>  
                                    </td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                            Địa chỉ                                               
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['DiaChi']; ?>  
                                    </td>
                                </tr>

                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                            Số CMND                                               
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo $row['SoCMT']; ?>  
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                        // Bước 04: Đóng kết nối Database Server
                        // mysqli_close($conn);
                    ?>
                                  
                            </tbody>
                        </table>
                        </div>
                        <button class="btn text-center btn-primary mb-3">
                            Thay đổi thông tin cá nhân<a href="update-info.php?id=<?php echo $row['MaNguoiDung']; ?>"></a>
                        </button>
                    </div>
                </div>
            </div>
        </div>                                        
    </div>

    <!-- Booked Tour -->
    <div class="container mt-5">
        <!-- <h3>Các Tour Bạn Đã Đặt</h3>
        <div class="row mt-3">
            <div class="card">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../assets/img/Tour1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Button</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        
        <div class="container">
                <h2 class="text-center pt-3">Các Tour Mà Bạn Đã Đặt</h2>
                <div class="row">        
                <?php 
                
                //Getting tours from Database that are active and featured
                //SQL Query
                $sql1 = "SELECT HinhAnh,MaPhieuTour,MaKhachHang,tour.MaTour,SoLuong,HinhThucThanhToan,TongTien,TinhTrang
                 FROM phieudangkitour,tour where phieudangkitour.MaTour = tour.MaTour";
                
                //Execute the Query
                $res1 = mysqli_query($conn, $sql1);
                
                //Count Rows
                $count1 = mysqli_num_rows($res1);
                
                //CHeck whether tour available or not
                if($count1>0)
                {
                    //tour Available
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                        //Get all the values
                        $hinhAnh = $row1['HinhAnh'];
                        $maPhieuTour = $row1['MaPhieuTour'];
                        $maKH = $row1['MaKhachHang'];
                        $maTour = $row1['MaTour'];
                        $soLuong = $row1['SoLuong'];
                        $hinhThucThanhToan = $row1['HinhThucThanhToan'];
                        $TongTien = $row1['TongTien'];
                        $TinhTrang = $row1['TinhTrang'];
                        
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
                                <p>Mã Tour: <?php echo $maTour; ?></p>
                                <p>Tổng số lượng người: <?php echo $soLuong ?></p>
                                <p>Hình thức thanh toán: <?php echo $hinhThucThanhToan ?></p>
                                <p>Tổng tiền: <?php echo $TongTien ?></p>
                                <br>
                                
                                <a href="<?php echo SITEURL; ?>user/bookTour.php?MaTour=<?php echo $maTour; ?>" class="btn btn-primary">Đặt Tour Ngay</a>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                }else
                {
                    //Tour Not Available 
                    echo "<div class='error'>Tour not available.</div>";
                }
                
                mysqli_close($conn);
                
                ?>
                </div>
                
            </div>
            
            <p class="text-center mt-3">
                <a href="#boxnoidung" aria-expanded="false" data-toggle="collapse">Bấm vào đây</a>
                <!-- <a href="#">Xem thêm</a> -->
            </p>
        
    </div>
      

  </main>

  <footer>
    <div class="col-md text-center text-muted bg-light mt-3">
      &copy;Nhom 2 12/2021
      <h4>ConTact</h4>
      <div class="col-md text-center text-muted bg-light">
          <a href="">Dương Văn Công</a>
          <a href="">Lê Công Minh</a>
          <a href="">Lê Đình Minh</a>
      </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>