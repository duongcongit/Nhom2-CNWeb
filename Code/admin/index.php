<?php
  include "../config/constants.php";
  include "./partials/header.php";
?>


<div class="container-fluid main mx-0 w-9 row">
  <div class="row m-0 mt-5" style="height: fit-content">
    <div class="col-md my-3 mx-0 d-flex justify-content-center">
      <a href="./manage-user.php" class="link-dark text-decoration-none">
        <div class="card text-center shadow dashboard-card">
          <?php
          //Sql Query 
          $sql_user = "SELECT * FROM nguoidung";
          //Execute Query
          $res_user = mysqli_query($conn, $sql_user);
          //Count Rows
          $count_user = mysqli_num_rows($res_user);
          ?>
          <div class="card-body">
            <h1 class="card-title d-inline" style="font-size: 30px">
              <?php echo $count_user ?>
            </h1>
            <i class="bi bi-person-circle" style="font-size: 27px;"></i>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">Người dùng</h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md my-3 mx-0 d-flex justify-content-center">
      <a href="./manage-tour.php" class="link-dark text-decoration-none">
        <div class="card text-center shadow dashboard-card">
          <?php
          //Sql Query 
          $sql_tour = "SELECT * FROM tour";
          //Execute Query
          $res_tour = mysqli_query($conn, $sql_tour);
          //Count Rows
          $count_tour = mysqli_num_rows($res_tour);
          ?>
          <div class="card-body">
            <h2 class="card-title d-inline" style="font-size: 30px">
              <?php echo $count_tour ?>
            </h2>
            <i class="fas fa-route" style="font-size: 27px;"></i>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">Tour</h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md my-3 mx-0 d-flex justify-content-center">
      <a href="./manage-partner.php" class="link-dark text-decoration-none">
        <div class="card text-center shadow dashboard-card">
          <?php
          //Sql Query 
          $sql_partner = "SELECT * FROM congtydoitac";
          //Execute Query
          $res_partner = mysqli_query($conn, $sql_partner);
          //Count Rows
          $count_partner = mysqli_num_rows($res_partner);
          ?>
          <div class="card-body">
            <h2 class="card-title d-inline" style="font-size: 30px">
              <?php echo $count_partner ?>
            </h2>
            <i class="far fa-handshake" style="font-size: 27px;"></i>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">Đối tác</h6>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md my-3 mx-0 d-flex justify-content-center">
      <a href="./manage-admin.php" class="link-dark text-decoration-none">
        <div class="card text-center shadow dashboard-card">
          <?php
          //Sql Query 
          $sql_admin = "SELECT * FROM nhanvien";
          //Execute Query
          $res_admin = mysqli_query($conn, $sql_admin);
          //Count Rows
          $count_admin = mysqli_num_rows($res_admin);
          ?>
          <div class="card-body">
            <h2 class="card-title d-inline" style="font-size: 30px">
              <?php echo $count_admin ?>
            </h2>
            <i class="fas fa-user-cog" style="font-size: 27px;"></i>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">Admin</h6>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>


<!--  -->
<?php include "./partials/footer.php" ?>