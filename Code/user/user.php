<?php include('../constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/userStyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Document</title>
</head>

<body>
    <header>
      <!-- navbar -->
      <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light main-navbar">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Logo</a>
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
                      <a class="nav-link" href="#tourType" tabindex="-1" aria-disabled="true">Categories</a>
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
    <!-- Slider -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/main.jpg" class="d-block w-100" alt="slider" style="height: 600px;">
            </div>
            <div class="carousel-banner">
                <h1>Tìm điểm du lịch tại Việt Nam</h1>
                <span>Việt Nam nơi có nhiều danh lam thắng cảnh trải khắp tổ quốc</span>
            </div>
        </div>
    </div>

    <!-- Hot tours -->
    <section class="container mt-5">
        <div class="container">
            <div class="suggest">
                <p class="text-uppercase text-center">Đề Xuất</p>
                <h2 class="text-uppercase text-center">Các điểm đến của chúng tôi</h2>
            </div>

            <div class="row place">
                <div class="place-hot col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="place-hot-item border rounded" style="background: url('../assets/img/ha-noi-mien-bac.jpg') top center/cover no-repeat">
                        <div class="place-hot-content">
                            <h4 class="place__heading">Vịnh Hạ Long</h4>
                            <p class="place__title">Kỳ Quan Thiên Nhiên Thế Giới</p>
                        </div>
                    </div>
                </div>

                <div class="place-hot col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="place-hot-item border rounded" style="background: url('../assets/img/ho_chi_minh_city_skyline.jpg') top center/cover no-repeat">
                        <div class="place-hot-content">
                            <h4 class="place__heading">Hồ Chí Minh</h4>
                            <p class="place__title">Thành Phố Mang Tên Bác</p>
                        </div>
                        </div>       
                </div>

                <div class="place-hot col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="place-hot-item border rounded" style="background: url('../assets/img/quang_truong_da_lat.jpg') top center/cover no-repeat">
                        <div class="place-hot-content">
                            <h4 class="place__heading">Đà lạt</h4>
                            <p class="place__title">Biểu Tượng Thành Phố Ngàn Hoa</p>
                        </div>   
                    </div>
                </div>

                <div class="place-hot col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="place-hot-item border rounded" style="background: url('../assets/img/phong_nha_ke_bang.jpg') top center/cover no-repeat">
                        <div class="place-hot-content">
                            <h4 class="place__heading">Phong Nha Kẻ Bàng</h4>
                            <p class="place__title">Vẻ Đẹp Hùng Vỹ</p>
                        </div>
                    </div> 
                </div>

                <div class="place-hot col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="place-hot-item border rounded" style="background: url('../assets/img/sapa.jpg') top center/cover no-repeat">
                        <div class="place-hot-content">
                            <h4 class="place__heading">Sapa - Lào Cai</h4>
                            <p class="place__title">Thành Phố Sương Mù</p>
                        </div>   
                    </div>
                </div>

                <div class="place-hot col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="place-hot-item border rounded" style="background: url('../assets/img/phu_quoc.jpg') top center/cover no-repeat">
                        <div class="place-hot-content">
                            <h4 class="place__heading">Phú Quốc</h4>
                            <p class="place__title">Bãi Biển Xanh Thơ Mộng</p>
                        </div>   
                    </div>
                </div>
            </div>
        
        </div>
    </section>

    <!-- Tour suggest -->
    <div class="container">
        <section class="pt-5" id="tourType">
            <h3 class="text-center mt-3">Các loại hình thú vị</h3>
            <div class="row mt-3">
                <div class="col-md-4 mt-3">
                    <h4 class="text-center">Du lịch trên biển</h4>
                    <div class="card-test">
                        <div class="img-content">
                            <a href="../user/categories.php" class="btn btn-primary text-center btn-categories">Xem Tour</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 mt-3">
                    <h4 class="text-center">Du lịch trên biển</h4>
                    <div class="card-test">
                        <div class="img-content">
                            <a href="../user/categories.php" class="btn btn-primary text-center btn-categories">Xem Tour</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 mt-3">
                    <h4 class="text-center">Du lịch trên biển</h4>
                    <div class="card-test">
                        <div class="img-content">
                            <a href="../user/categories.php" class="btn btn-primary text-center btn-categories">Xem Tour</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Tour MEnu Section Starts Here -->
    <section class="tour-menu mt-5">
        <div class="container">
            <h2 class="text-center pt-3">Các Tour hiện có</h2>
            <div class="row">
            
            <?php 
            
            //Getting tours from Database that are active and featured
            //SQL Query
            $sql = "SELECT * FROM Tour LIMIT 6";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether tour available or not
            if($count>0)
            {
                //tour Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get all the values
                    $maTour = $row['MaTour'];
                    $title = $row['TenTour'];
                    $description = $row['MoTa'];
                    $image_name = $row['HinhAnh'];
                    $day_start = $row['NgayKhoiHanh'];
                    $day_end = $row['NgayKetThuc'];

            ?>
                    <div class="tour-menu-box p-3 border border-success m-2 rounded" style="width:48%">
                        <div class="row">
                            <div class="col-md-4">
            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>assets/img/<?php echo $image_name.'.jpg'; ?>" alt="" class="img-fluid">
                                    <?php
                                }
            ?>
                            
                            </div>
                            <div class="col-md-8">
                                <h4><?php echo $title; ?></h4>
                                <p class="tour-price">$<?php echo $maTour; ?></p>
                                <p>Ngày Khỏi Hành: <?php echo $day_start ?></p>
                                <p>Ngày Kết Thúc: <?php echo $day_end ?></p>
                                <p class="tour-detail">
                                    <?php echo $description; ?>
                                </p>
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
                echo "<div class='error'>Food not available.</div>";
            }

            mysqli_close($conn);
            
            ?>
            </div>

        </div>

        <p class="text-center mt-3">
        <a href="#boxnoidung" aria-expanded="false" data-toggle="collapse">Bấm vào đây</a>
            <!-- <a href="#">Xem thêm</a> -->
        </p>
    </section>
    <!-- Tour Menu Section Ends Here -->
      

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