<header>
      <!-- navbar -->
      <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-white  main-navbar" style="box-shadow: 7px 7px 7px rgb(0 0 0 / 30%);z-index:1;position:fixed;left:0;right:0:top:56px">
              <div class="container-fluid">
                <a class="navbar-brand" href="user.php">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php
                        if(isset($_SESSION['loginAccount']))
                        {
                            echo '<li class="nav-item">';
                            echo "<a class='nav-link' href='userInfo.php'>Xin chào: ".$_SESSION['loginAccount']."</a>";
                            echo '</li>';
                        }

                    ?>
                    <li class="nav-item">
                      <a class="nav-link" href="categories.php" tabindex="-1" aria-disabled="true">Thư Viện</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="userInfo.php" tabindex="-1" aria-disabled="true">Giỏ Hàng</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logOut.php" tabindex="-1" aria-disabled="true">Đăng Xuất</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
        </div>
      </div>
</header>