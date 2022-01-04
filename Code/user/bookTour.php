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
  <title>Đặt Tour</title>
</head>

<body>
    <?php
    include "partials/header.php";
    ?>

<?php 
    //CHeck whether Tour id is set or not
    if(isset($_GET['MaTour']))
    {
        //Get the Food id and details of the selected food
        $maTour = $_GET['MaTour'];

        //Get the DEtails of the SElected Food
        $sql = "SELECT * FROM tour WHERE maTour='$maTour'";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //Count the rows
        $count = mysqli_num_rows($res);
        //CHeck whether the data is available or not
        if($count==1)
        {
            //WE Have DAta
            //GEt the Data from Database
            $row = mysqli_fetch_assoc($res);

            $tenTour = $row['tenTour'];
            // $price = $row['price'];
            $hinhAnh = $row['hinhAnh'];
            $ngayKhoiHanh = $row['ngayKhoiHanh'];
            $ngayKetThuc = $row['ngayKetThuc'];
            $diemKhoiHanh = $row['diemKhoiHanh'];
            $diemKetThuc = $row['diemKetThuc'];
            $loaiHinh = $row['loaiHinh'];
            $moTa = $row['moTa'];
            $maCongTy = $row['maCongTy'];
            $first_date = strtotime($ngayKhoiHanh);
            $second_date = strtotime($ngayKetThuc);
            $datediff = abs($first_date - $second_date);
            $day = floor($datediff / (60*60*24));     
        }
        else
        {
            //Food not Availabe
            //REdirect to Home Page
            header('location:'.SITEURL);
        }

        $sql1 = "SELECT gia,moTa FROM giatour WHERE maTour='$maTour' and doTuoi = 1";
        //Execute the Query
        $res1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($res1)>0){
          while($row1 = mysqli_fetch_assoc($res1)){
            $tuoi1 = $row1['moTa'];
            $giaTuoi1 = $row1['gia'];
          }
        }else{
          $giaTuoi1 = "";
        }

        $sql2 = "SELECT gia,moTa FROM giatour WHERE maTour='$maTour'and doTuoi = 2";
        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($res2)>0){
          while($row2 = mysqli_fetch_assoc($res2)){
            $tuoi2 = $row2['moTa'];
            $giaTuoi2 = $row2['gia'];
          }
        }else{
          $giaTuoi2 = "";
        }

        $sql3 = "SELECT gia,moTa FROM giatour WHERE maTour='$maTour' and doTuoi = 3";
        //Execute the Query
        $res3 = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($res3)>0){
          //Count the rows
          while($row3 = mysqli_fetch_assoc($res3)){
            //CHeck whether the data is available or not
            $tuoi3 = $row3['moTa'];
            $giaTuoi3 = $row3['gia'];
          }
        }else{
          $giaTuoi3 = "";
        }

    }
    else
    {
        //Redirect to homepage
        header('location:'.SITEURL);
    }
?>

<!-- Tour Info Section Starts Here -->
<section class="Tour-info text-center">
    <div class="container">
      <div class="row pt-5">
        <h3 class="mt-5">Thông Tin Tour</h3>
        <form method="POST" class="order">
            <div class="food-menu-img">
                <?php               
                    //CHeck whether the image is available or not
                    if($hinhAnh=="")
                    {
                        //Image not Availabe
                        echo "<div class='error'>Image not Available.</div>";
                    }
                    else
                    {
                        //Image is Available
                ?>
                    <img src="<?php echo SITEURL; ?>assets/images/tours/<?php echo $hinhAnh.'.jpg'; ?>" alt="Tour-img" style="max-height: 500px;" class="img-fluid">
                    <?php
                      }
                    
                ?>
                    
            </div>

            <div class="food-menu-desc text-center">
                <h4><?php echo $tenTour; ?></h4>
                <p>Mã: <?php echo $maTour; ?></p>
                <p><i class="bi bi-geo-alt me-3"></i>Khởi Hành: <?php echo $diemKhoiHanh; ?> <span>-> Kết Thúc: <?php echo $diemKetThuc; ?></span></p>
                <p><i class="bi bi-calendar3 me-3"></i></i>Bắt Đầu: <?php echo $ngayKhoiHanh ?><span>-> Kết Thúc: <?php echo $ngayKetThuc ?></span> </p>
                <p><i class="bi bi-clock me-3"></i>Thời Gian: <?php  echo $day.' ngày'?></p>
                <p><i class="bi bi-flag me-3"></i>Loại Hình: <?php echo $loaiHinh ?></p>
                <p>Thông tin về tour: <br> <?php echo $moTa; ?></p>
                <h4>Phương thức thanh toán</h4>

                <div class="d-flex justify-content-center">
                  <select class="form-select w-50" aria-label="Default select example" name="cast">
                    <option selected value ="Chuyển Khoản">Chuyển khoản</option>
                    <option value="Tiền Mặt">Tiền Mặt</option>
                  </select>
                </div>

                <h4 class="mt-3">Số Lượng Người Đăng Kí</h4>                    
                <div class="tour-num-people d-flex justify-content-center mt-3">
                  <div class="order-label me-3"><?php echo $tuoi1 ?>
                    <?php
                      if($giaTuoi1==""){
                        echo "<input type='number' name='quantity1' min='0' max='100' value ='0' disabled>";
                        echo '<br>';
                        echo "<p id='price1'>".$giaTuoi1."/1 người</p>";
                      }
                      else{
                        echo "<input type='number' name='quantity1' min='0' max='100' value ='0'>";
                        echo '<br>';
                        echo "<p id='price1'>".$giaTuoi1."/1 người</p>";
                      }
                    ?>
                  </div>

                  <div class="order-label me-3"><?php echo $tuoi2 ?>
                    <?php
                      if($giaTuoi2==""){
                        echo "<input type='number' name='quantity2' min='1' max='100' value ='0' disabled>";
                        echo '<br>';
                        echo "<p id='price2'>".$giaTuoi2."/1 người</p>";
                      }
                      else{
                        echo "<input type='number' name='quantity2' min='1' max='100' value ='0'>";
                        echo '<br>';
                        echo "<p id='price2'>".$giaTuoi2."/1 người</p>";
                      }
                    ?>
                  </div>

                  <div class="order-label me-3"><?php echo $tuoi3 ?>
                    <?php
                      if($giaTuoi3==""){
                        echo "<input type='number' name='quantity3' min='0' max='100' value ='0' disabled>";
                        echo '<br>';
                        echo "<p id='price3'>".$giaTuoi3."/1 người</p>";
                      }
                      else{
                        echo "<input type='number' name='quantity3' min='0' max='100' value ='0'>";
                        echo '<br>';
                        echo "<p id='price3'>".$giaTuoi3."/1 người</p>";

                      }
                    ?>
                  </div>
                </div>

                <?php 
                  $tongtien = 0;
                ?>
                <p class="mt-3" id="tour-price">Tổng Tiền: </p>
                    
            </div>

            

        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary mt-3">
      </form>

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
                //Execute the Query
                $res4 = mysqli_query($conn, $sql4);

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
        mysqli_close($conn);
        
        ?>
      </div>
    </div>
</section>
<!-- Tour info Section Ends Here -->

    <?php
    include "partials/footer.php";
    ?>

  <script>
      // var giaTien1 = Document.querySelectorAll('#quantity').[0].value;
      // var giaTien2 = Document.querySelectorAll('#quantity').[1].value;
      // var giaTien3 = Document.querySelectorAll('#quantity').[2].value;
      // var tongTien = 0;

    // $(document).ready(function(){
    //   //Luon dan bao chi thuc hien noi dung ben trong
    //   //khi trang dc tai xong ..(DOM)
    //   $("#quantity1").change(function(){
    //       $("#tour-price").css("color","red");
    //   })
    // });

    // $(document).ready(function(){
    //   //Luon dan bao chi thuc hien noi dung ben trong
    //   //khi trang dc tai xong ..(DOM)
    //   $("#quantity2").change(function(){
    //       $("#tour-price").css("color","red");
    //   })
    // });

    // $(document).ready(function(){
    //   //Luon dan bao chi thuc hien noi dung ben trong
    //   //khi trang dc tai xong ..(DOM)
    //   $("#quantity2").change(function(){
    //       $("#tour-price").css("color","red");
    //   })
    // });
  </script>
</body>

</html>