<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <section class="vh-100 login-section">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card-login shadow-2-strong login-form" style="border-radius: 1rem;">
            <div class="card-body-login p-5 text-center">

              <h2 class="mb-5">Quản trị viên</h2>
              <form action="" method="post">
                <input type="txt" class="form-control form-control-lg mb-3 txt-input" placeholder="Tài khoản" name="userName" autocomplete="off" />
                <input type="password" class="form-control form-control-lg mb-3 txt-input" placeholder="Mật khẩu" name="passWord" />
                <div class="form-check d-flex justify-content-start mb-4">
                  <!-- <input class="form-check-input" type="checkbox" value="" id="form1Example3" /> -->
                  <!-- <label class="form-check-label" for="form1Example3"> Nhớ mật khẩu </label> -->
                  <?php
                  if (isset($_SESSION['loginAdminError'])) {
                    echo "<p style='color:red'> {$_SESSION['loginAdminError']} </p>";
                    unset($_SESSION['loginAdminError']);
                  }
                  ?>
                </div>

                <button class="btn btn-login btn-lg btn-block" type="submit" name="btnLogin">Đăng nhập</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php
// Kiểm tra nếu đã đăng nhập thì chuyển hướng tới trang Admin
if (isset($_SESSION['adminAccount'])) {
  header("location:" . SITEURL . "admin/");
} else {
  if (isset($_POST['btnLogin'])) {
    // Lấy dữ liệu từ form
    $username = $_POST['userName'];
    $password = $_POST['passWord'];

    // Kiểm tài khoản nhận từ form xem có trong cơ sở dữ liệu không
    // Nếu có thì tiến hành xác minh mật khẩu
    $sql = "SELECT * from nhanvien where username='$username'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) == 1) {
      // Lấy mật khẩu raw từ cơ sở dữ liệu
      $raw = $result->fetch_assoc();
      $raw_password = $raw['password'];
      $status = $raw['tinhTrang'];



      // Tiến hành xác minh mật khẩu nhận từ form và mật khẩu raw trên cơ sở dữ liệu
      if (password_verify($password, $raw_password)) { // Nếu mật khẩu chính xác

        if ($status == 1) {
          $_SESSION['adminAccount'] = $username; // Cấp thẻ làm việc
          header('location:' . SITEURL . 'admin/'); // Chuyển hướng tới trang admin
        } elseif ($status == 2) {
          $_SESSION['loginAdminError'] = "Tài khoản của bạn hiện không hoạt động, vui lòng kiểm tra lại!";
          header("location:" . SITEURL . "admin/login.php");
        }
      } else { // Nếu mật khẩu sai
        // Chuyển hướng lại về trang đăng nhập kèm theo thông báo lỗi
        $_SESSION['loginAdminError'] = "Mật khẩu không đúng. Vui lòng kiểm tra lại!";
        header("location:" . SITEURL . "admin/login.php");
      }
    } else { // Nếu không có tài khoản
      // Chuyển hướng lại về trang đăng nhập kèm theo thông báo lỗi
      $_SESSION['loginAdminError'] = "Thông tin tài khoản hoặc mật khẩu bạn nhập không chính xác!";
      header("location:" . SITEURL . "admin/login.php");
    }
    // Đóng kết nối
    mysqli_close($conn);
  }
}
?>