<?php include('../constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <title>Thư Viện</title>
</head>

<body>
    <?php
    require "partials/header.php";
    ?>

  <main>
        <!-- Bắt đầu : Thư viện tất cả các tour mà web hiện có -->
        <section class="categories mt-5 pt-5">
            <div class="container">
                <h2 class="text-center">Các Tour Hiện Có</h2>

                <?php 

                    //Display all the cateories that are active
                    //Sql Query
                    $sql = "SELECT * FROM tour where tinhTrang='1'";

                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //CHeck whether categories available or not
                    if($count>0)
                    {
                        //CAtegories Available
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $maTour = $row['maTour'];
                            $tenTour = $row['tenTour'];
                            $moTa = $row['moTa'];
                            $hinhAnh = $row['hinhAnh'];
                            $diemKhoiHanh = $row['diemKhoiHanh'];
                            $diemKetThuc = $row['diemKetThuc'];
                            $ngayKhoiHanh = $row['ngayKhoiHanh'];
                            $ngayKetThuc = $row['ngayKetThuc'];
                            $loaiHinh = $row['loaiHinh'];
                            $first_date = strtotime($ngayKhoiHanh);
                            $second_date = strtotime($ngayKetThuc);
                            $datediff = abs($first_date - $second_date);
                            $day = floor($datediff / (60*60*24));
                          ?>
                          
                          <div class="tour-menu-box p-3 border border-success m-2 rounded">
                              <div class="row">
                              <div class="tour-menu-img col-md-4">
                                  <?php 
                                      if($hinhAnh=="")
                                      {
                                          //Image not Available
                                          echo "<div class='error'>Image not Available.</div>";
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

                              <div class="tour-menu-desc col-md-8">
                                <h4><?php echo $tenTour; ?></h4>
                                <p>Mã: <?php echo $maTour; ?></p>
                                <p><i class="bi bi-geo-alt me-3"></i>Khởi Hành: <?php echo $diemKhoiHanh; ?> <span>-> Kết Thúc: <?php echo $diemKetThuc; ?></span></p>
                                <p><i class="bi bi-calendar3 me-3"></i>Bắt Đầu: <?php echo $ngayKhoiHanh ?><span>-> Kết Thúc: <?php echo $ngayKetThuc ?></span> </p>
                                <p><i class="bi bi-clock me-3"></i>Thời Gian: <?php  echo $day.' ngày'?></p>
                                <p><i class="bi bi-flag me-3"></i>Loại Hình: <?php echo $loaiHinh ?></p>
                                <br>
                                <a href="<?php echo SITEURL; ?>user/bookTour.php?MaTour=<?php echo $maTour; ?>" class="btn btn-primary">Xem Thông Tin</a>
                              </div>
                          </div>
                          </div>

                          <?php
                      }
                  }
                  else
                  {
                      //Tour not available
                      echo "<div class='error'>Tour not Available.</div>";
                  }
                  
                  mysqli_close($conn);

              ?>
            
            </div>
        </section>
        <!-- Categories Section Ends Here -->

        <?php
    include "partials/footer.php";
    ?>
</body>

</html>