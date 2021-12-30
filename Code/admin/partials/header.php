<?php
    // include SITEURL."admin/partials/login-check.php";
    // include($_SERVER['DOCUMENT_ROOT']."/baitaplon/admin/partials/login-check.php");

    //Include login-check.php file in directory contain header.php file
    // Not directory contain file which includes header.php
    include dirname(__FILE__).'/login-check.php';
    
    $cur_dir_arr = explode('\\', getcwd()); // Get path of current directory and push to array
    $current_page_folder = $cur_dir_arr[count($cur_dir_arr)-1]; // Get name of current folder in array
    //echo $current_page_folder;
    
    
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.84.0" />
    <title>Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo SITEURL ?>admin/assets/css/style.css" />
</head>

<body>
    <div class="container-fluid px-0 overflow-hidden">
        <div class="row vh-100">
            <!-- Sidebar -->
            <div class="sidebar col-auto pe-0" style="background-color: #1a202e;">
                <div class="d-flex flex-column flex-shrink-0 me-auto px-0 py-0">
                    <a href="index.php" class="link-light text-decoration-none">
                        <i class="fas fa-plane-departure me-0 pt-2" style="font-size: 30px; margin-left: 12px;"></i>
                        <span class="fs-4 sidebar-item-text collapsing ms-1 d-none d-md-inline">Administration</span>
                    </a>
                    <hr class="mt-2 mb-2" style="border-bottom: 1px solid black;width: 70%; margin: auto;">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <!--  -->
                        <!--  -->
                        <li>
                            <a href="<?php echo SITEURL."admin/" ?>" class="nav-link link-light m-2 <?php echo ($current_page_folder == "admin" ? "active" : "") ?>">
                                <i class="bi bi-speedometer2 me-0" style="font-size: 24px;"></i>
                                <span class="sidebar-item-text collapsing ms-2 d-none d-md-inline">Thống kê</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL."admin/pages/manage-user" ?>" class="nav-link link-light m-2 <?php echo ($current_page_folder == "manage-user" ? "active" : "") ?>">
                                <i class="bi bi-person-circle me-0" style="font-size: 24px;"></i>
                                <span class="sidebar-item-text collapsing ms-2 d-none d-md-inline">Người dùng</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL."admin/pages/manage-tour" ?>" class="nav-link link-light m-2 <?php echo ($current_page_folder == "manage-tour" ? "active" : "") ?>">
                                <i class="fas fa-route me-0 mt-1" style="font-size: 24px;"></i>
                                <span class="sidebar-item-text collapsing ms-2 d-none d-md-inline">Tour</span>
                            </a>
                        <li>
                            <a href="<?php echo SITEURL."admin/pages/manage-partner" ?>" class="nav-link link-light m-2 <?php echo ($current_page_folder == "manage-partner" ? "active" : "") ?>">
                                <i class="far fa-handshake me-0 mt-1" style="font-size: 24px;"></i>
                                <span class="sidebar-item-text collapsing ms-2 d-none d-md-inline">Đối tác</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL."admin/pages/manage-admin" ?>" class="nav-link link-light m-2 <?php echo ($current_page_folder == "manage-admin" ? "active" : "") ?>">
                                <i class="fas fa-user-cog me-0 mt-1" style="font-size: 24px;"></i>
                                <span class="sidebar-item-text collapsing ms-2 d-none d-md-inline">Admin</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col px-0 container-fluid">
                <!-- Navrbar -->
                <div class="row ">
                    <div class="header col-md-12 sticky-md-top">
                        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1a202e;">
                            <div class="container-fluid ps-0">
                                <!-- <i class="bi bi-list btn-menu" data-bs-toggle="collapse"
                                    data-bs-target=".sidebar-item-text" style="font-size: 25px;"
                                    onclick="sidebar_collapse()"></i> -->
                                <span class="navbar-brand me-auto ms-2">
                                    <?php
                                    echo ($current_page_folder == "admin" ? "Thống kê" : "");
                                    echo ($current_page_folder == "manage-user" ? "Quản lý người dùng" : "");
                                    echo ($current_page_folder == "manage-tour" ? "Quản lý Tour" : "");
                                    echo ($current_page_folder == "manage-partner" ? "Quản lý đối tác" : "");
                                    echo ($current_page_folder == "manage-admin" ? "Quản lý admin" : "");
                                    ?>
                                </span>
                                <a href="<?php echo SITEURL ?>admin/logout.php" class="link-dark text-decoration-none rounded border text-warning p-1 ms-auto" style="background-color: #566573;">Logout</a>
                            </div>
                        </nav>
                    </div>
                    <div>
                        <!-- Content start -->