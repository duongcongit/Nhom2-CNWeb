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

  <main>
    <!-- Tour list -->
    <!-- <section class = "container mt-5 tour-list">
        <h3 class="text-center">Các Tour hiện có</h3>
        <select class="form-select" aria-label="Default select example">
            <option selected>...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../assets/img/Tour1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../assets/img/Tour1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../assets/img/Tour1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../assets/img/Tour1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../assets/img/Tour1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../assets/img/Tour1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section> -->
    <section class="tour-search text-center mt-5">
        <div class="container">
        <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


        <h2 class="text-center">Tour theo yêu cầu của bạn: <span>"
            <?php echo $search; ?>"
            </span></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu container mt-3">
        <h2 class="text-center">Tour Menu</h2>
        <div class="row">

            <?php 

                //SQL Query to Get foods based on search keyword
                //$search = burger '; DROP database name;
                // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                $sql = "SELECT * FROM tour WHERE DiemKhoiHanh LIKE '%$search%' OR DiemKetThuc LIKE '%search%' OR TenTour LIKE '%$search%' OR LoaiHinh like '%search%'";
                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether food available of not
                if($count>0)
                {
                    //Food Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $maTour = $row['MaTour'];
                        $tenTour = $row['TenTour'];
                        $loaiHinh = $row['LoaiHinh'];
                        $moTa = $row['MoTa'];
                        $hinhAnh = $row['HinhAnh'];
                        $ngayKhoiHanh = $row['NgayKhoiHanh'];
                        $ngayKetThuc = $row['NgayKetThuc'];
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
                                <h4>Tên Tour: <?php echo $tenTour; ?></h4>
                                <p>Mã Tour: <?php echo $maTour?></p>
                                <p>Loại Hình: <?php echo $loaiHinh?></p>
                                <p>Ngày Khỏi Hành: <?php echo $ngayKhoiHanh ?></p>
                                <p>Ngày Kết Thúc: <?php echo $ngayKetThuc ?></p>
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
                    //Tour Not Available
                    echo "<div class='error'>Hiện không có tour du lịch này.</div>";
                }


            
                mysqli_close($conn);
            ?>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->



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