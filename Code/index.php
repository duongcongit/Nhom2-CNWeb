<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Document</title>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light main-navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="logIn.php" tabindex="-1" aria-disabled="true">Đăng nhập</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php" tabindex="-1" aria-disabled="true">Đăng kí</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <main>
    <!-- Slider -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/slider.jpg" class="d-block w-100" alt="slider">
            </div>
        </div>
    </div>

    <!-- Hot tours -->
    <section class="container mt-5">
       <h3 style="color: red;">Các tour đang hot <i class="fas fa-fire-alt"></i></h3>
        <div class="popular-post row">
            <div class="col-md-4 mt-3">
                <div class="card" style="width: 100%;">
                    <img src="assets/img/du-lich-hoi-an.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tour La Khê -Đống Đa</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Khám phá ngay</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card" style="width: 100%;">
                    <img src="assets/img/du-lich-hoi-an.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tour La Khê -Đống Đa</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Khám phá ngay</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card" style="width: 100%;">
                    <img src="assets/img/du-lich-hoi-an.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tour La Khê -Đống Đa</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Khám phá ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tour suggest -->
    <div class="container">
        <section class="pt-5" id="tourType">
            <h3 class="text-center mt-3">Combo đi khắp mọi nơi</h3>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card"">
                        <img src="assets/img/ha-noi-mien-bac.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Miền Bắc</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="user/categories.php" class="btn btn-primary">Xem Tour</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card">
                        <img src="assets/img/ha-noi-mien-bac.jpg" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Miền Trung</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="user/categories.php" class="btn btn-primary">Xem Tour</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card">
                        <img src="assets/img/ha-noi-mien-bac.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Miền Nam</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="user/categories.php" class="btn btn-primary">Xem Tour</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Tour list -->
    <section class = "container mt-5 tour-list">
        <h3 class="text-center">Các Tour hiện có</h3>
        <!-- Tour item -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="assets/img/mien-trung.jpg" alt="" class="img-fluid">
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
                            <img src="assets/img/mien-trung.jpg" alt="" class="img-fluid">
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
                            <img src="assets/img/mien-trung.jpg" alt="" class="img-fluid">
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
                            <img src="assets/img/mien-trung.jpg" alt="" class="img-fluid">
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
                            <img src="assets/img/mien-trung.jpg" alt="" class="img-fluid">
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
                            <img src="assets/img/mien-trung.jpg" alt="" class="img-fluid">
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

    </section>

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