<?php
include "../../../config/constants.php";


if (isset($_POST['tableID'])) {
    $tableID    = $_POST['tableID'];
    $page       = $_POST['page'];
    $numRow     = $_POST['numRow'];
    $sortBy     = $_POST['sortBy'];

    if ($tableID == "all-user") {
        $sqlTotalRow        = "SELECT * FROM nguoidung";
    } elseif ($tableID == "pending-verification-user") {
        $sqlTotalRow        = "SELECT * FROM nguoidung WHERE tinhTrang=0";
    } elseif ($tableID == "active-user") {
        $sqlTotalRow        = "SELECT * FROM nguoidung WHERE tinhTrang=1";
    } elseif ($tableID == "disabled-user") {
        $sqlTotalRow        = "SELECT * FROM nguoidung WHERE tinhTrang=2";
    }


    $totalRow   = $conn->query($sqlTotalRow)->num_rows;

    $numPage    = ceil($totalRow / $numRow);

    $start      = ($page - 1) * $numRow;

    $sql        = $sqlTotalRow . " ORDER BY $sortBy" . " LIMIT $start, $numRow";

    $result     = $conn->query($sql);


    if ($totalRow > 0) {

        echo "<select class='custom-select' style='font-size: 12px' id='select-sort-by' data-table_id='$tableID' data-page='$page' data-numrow='$numRow' data-sort_by='$sortBy'>";
?>
        <option value="0" <?php echo ($sortBy == "manguoidung asc" ? "selected" : "") ?>>Mã người dùng</option>
        <option value="1" <?php echo ($sortBy == "manguoidung desc" ? "selected" : "") ?> <?php echo ($sortBy == "1" ? "selected" : "") ?>>Mã người dùng giảm dần</option>
        <option value="2" <?php echo ($sortBy == "hovaten asc" ? "selected" : "") ?>>Họ và tên A-Z</option>
        <option value="3" <?php echo ($sortBy == "hovaten desc" ? "selected" : "") ?>>Họ và tên Z-A</option>
        <option value="4" <?php echo ($sortBy == "ngaysinh desc" ? "selected" : "") ?>>Độ tuổi tăng dần</option>
        <option value="5" <?php echo ($sortBy == "ngaysinh asc" ? "selected" : "") ?>>Độ tuổi giảm dần</option>
        <option value="6" <?php echo ($sortBy == "tinhtrang" ? "selected" : "") ?>>Tình trạng</option>
        </select>
        <div style="width: 90%;height:80vh;overflow: auto;">
            <table class="table table-hover table-sm">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">STT</th>
                        <th scope="col">Mã người dùng</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col" class="d-none">Số điện thoại</th>
                        <th scope="col" class="d-none">Email</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = $start;
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td scop="row"><?= ++$i ?></td>
                            <td><?= $row['maNguoiDung']; ?></td>
                            <td><?= $row['hoVaTen']; ?></td>
                            <td><?= $row['ngaySinh']; ?></td>
                            <td><?= $row['gioiTinh']; ?></td>
                            <td class="d-none"><?= $row['soDienThoai']; ?></td>
                            <td class="d-none"><?= $row['email']; ?></td>

                            <?php
                            if ($row['tinhTrang'] == 0) {
                            ?>
                                <td><i class="bi bi-record-circle-fill" style="font-size:20px; color: gray"></i></td>
                                <?php
                                echo "<td><i class='btn-action bi-toggle-on btn text-info p-0 d-inline btn btn-disable-user' data-user_id='{$row['maNguoiDung']}' data-table_id='$tableID' data-page='$page' data-numrow='$numRow' data-sort_by='$sortBy'></i>";
                                //echo "<td><button data-user_id='{$row['maNguoiDung']}' data-table_id='$tableID' data-status='{$row['tinhTrang']}' data-page='$page' data-numrow='$numRow' data-sort_by='$sortBy' class='btn btn-sm btn-info btn-mail-user' style='width: 110px'>Gửi Mail</button></td>";
                                ?>
                            <?php
                            } elseif ($row['tinhTrang'] == 1) {
                            ?>
                                <td><i class="bi bi-record-circle-fill" style="font-size:20px; color: green"></i></td>
                                <?php
                                echo "<td><i class='btn-action bi-toggle-on btn text-info p-0 d-inline btn btn-disable-user' data-user_id='{$row['maNguoiDung']}' data-table_id='$tableID' data-page='$page' data-numrow='$numRow' data-sort_by='$sortBy'></i>";
                                ?>
                            <?php
                            } elseif ($row['tinhTrang'] == 2) {
                            ?>
                                <td><i class="bi bi-record-circle-fill" style="font-size:20px; color: orange"></i></td>
                            <?php
                                echo "<td><i class='btn-action bi-toggle-off btn text-info p-0 d-inline btn-activate-user' data-user_id='{$row['maNguoiDung']}' data-table_id='$tableID' data-page='$page' data-numrow='$numRow' data-sort_by='$sortBy' data-numrow='$numRow' ></i>";
                            }
                            echo "<i class='btn-action bi bi-trash-fill btn btn-delete-user text-danger p-0 d-inline' data-user_id='{$row['maNguoiDung']}' data-table_id='$tableID' data-page='$page' data-numrow='$numRow' data-sort_by='$sortBy'></i>";
                            echo "<i class='btn btn-action p-0 d-inline bi bi-gear-fill'></i></td>";
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                    </li>
                    <?php
                    echo "<li class='page-item " . ($page == 1 ? 'disabled' : '') . "'>
                        <a class='page-link btnPrevious' href='#' aria-label='Previous' data-table_id='$tableID' data-page='$page' data-numrow='$numRow' data-sort_by='$sortBy'>
                            <span aria-hidden='true'>&laquo;</span>
                        </a>
                    </li>";
                    echo "<input type='text' class='page-link px-2' autocomplete='off' value='$page' data-table_id='$tableID' data-numrow='$numRow' data-sort_by='$sortBy' data-numpage='$numPage' id='currentPage' style='width: 50px;'>";
                    echo "<li class='page-item " . ($page == $numPage ? 'disabled' : '') . "'>
                    <a class='page-link btnNext' href='#' aria-label='Next' data-table_id='$tableID' data-page='$page' data-numrow='$numRow' data-sort_by='$sortBy'>
                        <span aria-hidden='true'>&raquo;</span>
                    </a>";
                    ?>
                    </li>
                </ul>
            </nav>
        </div>
<?php
    } else {
        echo "Không có dữ liệu";
    }
    mysqli_close($conn);
}

?>