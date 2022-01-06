<?php
include "../../../config/constants.php";
include "../../partials/header.php";

// Get values from URL, if not set will default
$table = isset($_GET['table']) ? $_GET['table'] : 'all-admin';
$page = isset($_GET['page']) ? $_GET['page'] : '1';
$numrow = isset($_GET['numrow']) ? $_GET['numrow'] : '10';
$sortby = isset($_GET['sortby']) ? $_GET['sortby'] : 'manhanvien asc';
// Show data
echo "<script>showAdminsData('$table', $page, $numrow, '$sortby')</script>";
?>
<!-- Modal Start-->

<!-- Modal success -->
<div class="modal fade" id="modal-success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-success">
      <div class="modal_header w-100">
        <i class="bi bi-check-circle icon"></i>
      </div>
      <h2 class="px-4 mt-2 mb-0 modal-title mt-2 mb-4">Thành công</h2>
      <div id="verify-email-info">
      <i class="bi bi-info-circle-fill" style="color: #FF0066;"></i>
        <b>Người dùng này chưa xác minh email. <br>Cần xác minh email để có thể sử dụng tài khoản.</b>
      </div>
      <div class="btn-footer">
        <button type="button" class="btn btn-secondary p-0 mx-4" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal success -->

<!-- Modal error -->
<div class="modal fade" id="modal-error" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-error">
      <div class="modal_header w-100">
        <i class="bi bi-check-circle icon"></i>
      </div>
      <h2 class="px-4 mt-2 mb-0 modal-title mt-2 mb-4">Thất bại</h2>
      <div class="btn-footer">
        <button type="button" class="btn btn-secondary p-0 mx-4" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal error -->

<!-- Modal Activate -->
<div class="modal fade" id="modal-activate-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-activate-confirm">
      <div class="modal_header w-100">
        <i class="bi bi-question-circle icon"></i>
      </div>
      <h2 class="px-4 mt-2 mb-0 modal-title mt-2 mb-4">Xác nhận kích hoạt</h2>
      <p>Người dùng <b class="user-id-confirm"></b>?</p>
      <div class="btn-footer">
        <button type="button" class="btn btn-secondary p-0 mx-4" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-success p-0 mx-4" id="confirm-activate">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Activate -->

<!-- Modal Disable -->
<div class="modal fade" id="modal-disable-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-disable-confirm">
      <div class="modal_header w-100">
        <i class="bi bi-question-circle icon"></i>
      </div>
      <h2 class="px-4 mt-2 mb-0 modal-title mt-2 mb-4">Xác nhận vô hiệu hóa</h2>
      <p>Người dùng <b class="user-id-confirm"></b>?</p>
      <div class="btn-footer">
        <button type="button" class="btn btn-secondary p-0 mx-4" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-success p-0 mx-4" id="confirm-disable">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Disable -->

<!-- Modal Delete -->
<div class="modal fade" id="modal-delete-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-delete-confirm">
      <div class="modal_header w-100">
        <i class="bi bi-question-circle icon"></i>
      </div>
      <!-- <h3 class="modal-title text-center mt-2" id="staticBackdropLabel">Xóa</h3> -->
      <h2 class="px-4 mt-2 mb-0 modal-title mt-2 mb-1">Xác nhận xóa</h2>
      <p>Người dùng <b class="user-id-confirm"></b>?</p>
      <p class="px-5"><b>Chú ý: </b> Mọi dữ liệu liên quan tới người dùng này sẽ bị xóa và
        không thể hoàn tác!</p>
      <div class="mt-2 mb-2" style="bottom: 0;">
        <button type="button" class="btn btn-secondary p-0 mx-4" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-success p-0 mx-4" id="confirm-delete">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Delete -->

<!-- Modal End -->


<div class="container-fluid main mx-0 row px-0 position-fixed" style="overflow: hidden;">
  <div class="row m-0 mt-1">
    <div class="col-md-12 px-0" style="height: 79vh">
      <nav class="px-0" style="height: fit-content">
        <div class="nav nav-tabs conatiner-fluid" id="nav-tab" role="tablist">
          <button class="nav-link btn-page" id="btn-all-user" type="button">Tất cả</button>
          <button class="nav-link btn-page" id="btn-active-user" type="button">Bình thường</button>
          <button class="nav-link btn-page" id="btn-pending-verification-user" type="button">Chờ kích hoạt email</button>
          <button class="nav-link btn-page" id="btn-disabled-user" type="button">Tài khoản vô hiệu hóa</button>
          <!-- -->
        </div>
      </nav>
      <div class="tab-content" id="user-view">
        <div class="tab-pane fade" id="all-user" role="tabpanel" aria-labelledby="nav-home-tab">

        </div>
        <div class="tab-pane fade" id="active-user" role="tabpanel" aria-labelledby="nav-profile-tab">
        </div>
        <div class="tab-pane fade" id="pending-verification-user" role="tabpanel" aria-labelledby="nav-contact-tab">

        </div>
        <div class="tab-pane fade" id="disabled-user" role="tabpanel" aria-labelledby="nav-contact-tab">

        </div>




      </div>
    </div>
  </div>
</div>
<!--  -->
<?php include "../../partials/footer.php" ?>