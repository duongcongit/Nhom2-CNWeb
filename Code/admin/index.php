<?php
include "../config/constants.php";
include "./partials/header.php";
?>


<div class="container-fluid px-0">
    <!-- Dashboard card start -->
    <div class="row me-0">
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_bills = "SELECT * FROM phieudangkitour";
                //Execute Query
                $res_bills = $conn->query($sql_bills);
                //Count Rows
                $count_bills = $res_bills->num_rows;
                ?>
                <h2 class="card-title d-inline"> <?php echo $count_bills ?> </h2>
                <i class="bi bi-receipt-cutoff icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Hóa đơn</h6>
        </div>
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_tours = "SELECT * FROM tour";
                //Execute Query
                $res_tours = $conn->query($sql_tours);
                //Count Rows
                $count_tours = $res_tours->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_tours ?></h2>
                <i class="fas fa-plane-departure icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Tour</h6>
        </div>
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_users = "SELECT distinct maNguoiDung FROM phieudangkitour, tour WHERE phieudangkitour.maTour = tour.maTour and tour.maCongTy = '{$_SESSION['partnerAccount']}'";
                //Execute Query
                $res_users = $conn->query($sql_users);
                //Count Rows
                $count_users = $res_users->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_users ?></h2>
                <i class="fas fa-users icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Người dùng</h6>
        </div>
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_partners = "SELECT * FROM doitac";
                //Execute Query
                $res_partners = $conn->query($sql_partners);
                //Count Rows
                $count_partners = $res_partners->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_partners ?></h2>
                <i class="fas fa-handshake icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Đối tác</h6>
        </div>
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_admins = "SELECT * FROM nhanvien";
                //Execute Query
                $res_admins = $conn->query($sql_admins);
                //Count Rows
                $count_admins = $res_admins->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_admins ?></h2>
                <i class="fas fa-user-shield icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Admin</h6>
        </div>
    </div>
    <!-- Dashboard card end -->
    <!--  -->
    <div class="row">
        <div class="col-md-7 recent-bills me-4 ms-2 shadow">
            <div class="d-flex justify-content-between">
                <h3 class="">Hóa đơn gần đây</h3>
                <?php
                $sql_recent_bills = "SELECT * FROM phieudangkitour ORDER BY thoiGianDat desc LIMIT 0,10";
                $res_recent_bills = $conn->query($sql_recent_bills);
                if ($res_recent_bills->num_rows > 0) {
                ?>
                    <a type="button" href="./pages/bill/index.php" class="btn btn-primary ms-auto">Xem tất cả</a>
            </div>
            <!--  -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Tình trạng</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($rows_recent_bills = $res_recent_bills->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $rows_recent_bills['maPhieuTour'] ?></th>
                            <td><?php echo $rows_recent_bills['tongTien'] ?></td>
                            <td><?php echo $rows_recent_bills['tinhTrang'] ?></td>
                        </tr>

                    <?php
                    }
                } else {
                    ?>
        </div>
        <div class="col-md-12 h-50 d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-binoculars text-muted" style="font-size: 80px;"></i>
            <p class="text-muted fs-3">Chưa có dữ liệu</p>

        </div>
    <?php
                }

    ?>
    </tbody>
    </table>
        </div>
        <div class="col-md-4 recent-users shadow">
            <div class="d-flex justify-content-between">
                <h3 class="">Hóa đơn gần đây</h3>
                <button class="btn btn-primary ms-auto">Xem tất cả</button>
            </div>
            <!--  -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <!--  -->
</div>




<!--  -->
<?php include "./partials/footer.php" ?>