<?php include('../constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

<?php 
    //CHeck whether food id is set or not
    if(isset($_GET['MaTour']))
    {
        //Get the Food id and details of the selected food
        $maTour = $_GET['MaTour'];

        //Get the DEtails of the SElected Food
        $sql = "SELECT * FROM tour WHERE MaTour='$maTour'";
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

            $title = $row['TenTour'];
            // $price = $row['price'];
            $image_name = $row['HinhAnh'];
            $ngayKhoiHanh = $row['NgayKhoiHanh'];
            $ngayKetThuc = $row['NgayKetThuc'];
            $diemKhoiHanh = $row['DiemKhoiHanh'];
            $diemKetThuc = $row['DiemKetThuc'];
            $loaiHinh = $row['LoaiHinh'];
            $moTa = $row['MoTa'];
            $maCongTy = $row['MaCongTy'];     
        }
        else
        {
            //Food not Availabe
            //REdirect to Home Page
            header('location:'.SITEURL);
        }
    }
    else
    {
        //Redirect to homepage
        header('location:'.SITEURL);
    }
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">
        
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Tour</legend>

                <div class="food-menu-img">
                    <?php 
                    
                        //CHeck whether the image is available or not
                        if($image_name=="")
                        {
                            //Image not Availabe
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image is Available
                            ?>
                            <img src="<?php echo SITEURL; ?>assets/img/<?php echo $image_name.'.jpg'; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }
                    
                    ?>
                    
                </div>

                <div class="food-menu-desc">
                    <h3>Tour du lịch: <?php echo $title; ?></h3>
                    <p>Điểm Khởi Hành: <?php echo $diemKhoiHanh; ?></p>
                    <p>Điểm kết thúc: <?php echo $diemKetThuc; ?></p>
                    <p>Ngày Khời Hành: <?php echo $ngayKhoiHanh; ?></p>
                    <p>Ngày Kết Thúc: <?php echo $ngayKetThuc; ?></p>
                    <p>Loại Hình: <?php echo $loaiHinh; ?></p>
                    <p>Thông tin về tour: <?php echo $moTa; ?></p>
                    <h3>Số Lượng Người Đăng Kí</h3>
                    
                    <div class="tour-num-people" style="display:flex">
                      <div class="order-label me-3">Trẻ em
                        <input type="number" id="quantity" name="quantity" min="0" max="5" value ="0">
                      </div>

                      <div class="order-label me-3">Người lớn
                        <input type="number" id="quantity" name="quantity" min="0" max="5" value ="0">
                      </div>

                      <div class="order-label me-3">Người già
                        <input type="number" id="quantity" name="quantity" min="0" max="5" value ="0">
                      </div>
                    </div>

                    <p class="food-price mt-3">Tổng Tiền: <?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    
                </div>

            </fieldset>
            
            <fieldset>
                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary mt-3">
            </fieldset>

        </form>

        <?php 

            //CHeck whether submit button is clicked or not
            if(isset($_POST['submit']))
            {
                // Get all the details from the form

                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty; // total = price x qty 

                $order_date = date("Y-m-d h:i:sa"); //Order DAte

                $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];


                //Save the Order in Databaase
                //Create SQL to save the data
                $sql2 = "INSERT INTO tbl_order SET 
                    food = '$food',
                    price = $price,
                    qty = $qty,
                    total = $total,
                    order_date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                ";

                //echo $sql2; die();

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Check whether query executed successfully or not
                if($res2==true)
                {
                    //Query Executed and Order Saved
                    $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    //Failed to Save Order
                    $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                    header('location:'.SITEURL);
                }

            }
        
        ?>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

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