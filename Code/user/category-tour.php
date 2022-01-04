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
  <title>Tra cứu tour</title>
</head>

<body>
<?php
    include "partials/header.php";
    ?>
    <main>
        <?php 
            //CHeck whether id is passed or not
            if(isset($_GET['category_id']))
            {
                //Category id is set and get the id
                $category_id = $_GET['category_id'];
                // Get the CAtegory Title Based on Category ID
                $sql = "SELECT tenTour FROM tour WHERE maTour='$category_id'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Get the value from Database
                $row = mysqli_fetch_assoc($res);
                //Get the TItle
                $category_title = $row['tenTour'];
            }
            else
            {
                //CAtegory not passed
                //Redirect to Home page
                header('location:'.SITEURL);
            }
        ?>


        <!-- Tour sEARCH Section Starts Here -->
        <section class="tour-search text-center pt-5">
            <div class="container mt-5">
                
                <h2>Tour Du Lịch : "<?php echo $category_title; ?>"</a></h2>

            </div>
        </section>
        <!-- Tour sEARCH Section Ends Here -->



        <!-- Tour MEnu Section Starts Here -->
        <section class="food-menu container mt-5">
            <h2 class="text-center">Tour Menu</h2>
            <div class="row">

                <?php 
                
                    //Create SQL Query to Get tours based on Selected CAtegory
                    $sql2 = "SELECT * FROM tour WHERE maTour='$category_id'";

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Count the Rows
                    $count2 = mysqli_num_rows($res2);

                    //CHeck whether tour is available or not
                    if($count2>0)
                    {
                        //tour is Available
                        while($row2=mysqli_fetch_assoc($res2))
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
                                    <p class="tour-detail">
                                        Mô tả: 
                                        <?php echo $moTa; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>user/bookTour.php?MaTour=<?php echo $maTour; ?>" class="btn btn-primary">Đặt Tour Ngay</a>
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
        <!-- Tour Menu Section Ends Here -->


  </main>

  <?php
    include "partials/footer.php";
    ?>
</body>

</html>