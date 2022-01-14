<?php
include "../../../config/constants.php";
include "../../partials/header.php";
?>

<div class="container-fluid px-0">
    <div class="row me-0">
        <!--  -->
        <h3 class="text-muted">Thống kê tour</h3>
        <div class="col-md-12 form-search-user shadow">
            <form class="d-flex">
                <div class="col ms-3">
                    <p>Từ ngày:</p>
                    <input type="date" class="shadow" id="start-date-tour" name="trip-start" value="2020-01-01" min="2018-01-01" max="2099-01-01">
                </div>
                <div class="col">
                    <p>Đến ngày:</p>
                    <input type="date" id="end-date-tour" name="trip-start" value="2020-01-01" min="2018-01-01" max="2099-01-01">
                </div>
            </form>
            <div class="mt-4 ms-3">
                <button id="refesh-user" type="button"><i class="fas fa-sync me-1"></i>Làm mới</button>
                <button id="search-user" type="button"><i class="fas fa-search me-1"></i>Tìm kiếm</button>
                <button id="export-user" type="button"><i class="fas fa-download me-1"></i></i>Xuất ra Excel</button>
            </div>
        </div>

        <div class="col-md-12 table-show-user shadow">
            <h3 class="text-danger"><i class="fas fa-users me-1"></i>DANH SÁCH NGƯỜI DÙNG</h3>
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



        <!--  -->
    </div>
</div>






<?php include "../../partials/footer.php"; ?>