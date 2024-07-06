    <?php 
        error_reporting(E_ERROR | E_PARSE);
        $id_user = $_SESSION['id_user'];      
        $id_toko = $_SESSION['id_toko'];      
        $status = $_SESSION['status'];
     ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#"><img src="images/Icon/logo-desa-dangdang.png" width="36px">E-Commerce</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <?php if (isset($id_user)): ?>
                            <a class="dropdown-item" href="settings.php?id_user=<?= $id_user; ?>">Settings</a>
                        <?php else: ?>
                            <a class="dropdown-item" href="settings_toko.php?id_toko=<?= $id_toko; ?>">Settings</a>
                        <?php endif ?>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                    <?php if ($_SESSION['status'] == 'admin'): ?>
                        <?php if ($_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/toko.php'): ?>
                            <a class="nav-link active" href="toko.php">
                        <?php else: ?>
                            <a class="nav-link" href="toko.php">
                        <?php endif ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-shop"></i></div>
                                Data Toko
                            </a>
                    <?php endif ?>

                    <?php if ($_SESSION['status'] == 'penjual' OR $_SESSION['status'] == 'admin'): ?>
                        <?php if ($_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/daftar_menu.php'): ?>
                            <a class="nav-link active" href="daftar_menu.php">
                        <?php else: ?>
                            <a class="nav-link" href="daftar_menu.php">
                        <?php endif ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Produk
                            </a>

                    <?php else: ?>
                        <?php if ($_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/menu_pembeli.php'): ?>
                            <a class="nav-link active" href="menu_pembeli.php">
                        <?php else: ?>
                            <a class="nav-link" href="menu_pembeli.php">
                        <?php endif ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Beranda
                            </a>
                    <?php endif ?>

                    <?php if ($_SESSION['status'] == 'penjual' OR $_SESSION['status'] == 'admin'): ?>
                        <?php if ($_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/pelanggan.php'): ?>
                            <a class="nav-link active" href="pelanggan.php">
                        <?php else: ?>
                            <a class="nav-link" href="pelanggan.php">
                        <?php endif ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data Pelanggan
                            </a>

                        <?php if ($_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/pesanan.php' OR $_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/detail_pesanan.php'): ?>
                            <a class="nav-link active" href="pesanan.php">
                        <?php else: ?>
                            <a class="nav-link" href="pesanan.php">
                        <?php endif ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-receipt"></i></div>
                                Detail Pesanan
                            </a>

                    <?php else: ?>
                        <?php if ($_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/pesanan_pembeli.php'): ?>
                            <a class="nav-link active" href="pesanan_pembeli.php">
                        <?php else: ?>
                            <a class="nav-link" href="pesanan_pembeli.php">
                        <?php endif ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-burger"></i></div>
                                Pesanan
                            </a>

                        <?php if ($_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/riwayat_pesanan.php' OR $_SERVER['SCRIPT_NAME'] == '/ecommerce_desa_dangdang/riwayat_pesanan.php'): ?>
                            <a class="nav-link active" href="riwayat_pesanan.php">
                        <?php else: ?>
                            <a class="nav-link" href="riwayat_pesanan.php">
                        <?php endif ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-receipt"></i></div>
                                Riwayat Pesanan
                            </a>
                            
                    <?php endif ?>

                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                
            </nav>
        </div>