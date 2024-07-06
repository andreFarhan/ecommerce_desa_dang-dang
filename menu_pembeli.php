<?php 
    include('koneksi.php');

    if (isset($_GET['jenis_menu'])) {
        $jenis_menu = $_GET['jenis_menu'];
        $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE jenis_menu = '$jenis_menu' ORDER BY id_menu DESC");
    }else{
        $query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_menu DESC");
    }
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/Icon/logo-desa-dangdang.png">
    <title>Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4 mt-2">
                        <div class="card-header">
                            <h1 class="mt-1">MENU</h1>
                            <a href="menu_pembeli.php" class="btn btn-primary btn-sm">Semua</a>
                            <a href="menu_pembeli.php?jenis_menu=Makanan" class="btn btn-primary btn-sm">Makanan</a>
                            <a href="menu_pembeli.php?jenis_menu=Minuman" class="btn btn-primary btn-sm">Minuman</a>
                            <a href="menu_pembeli.php?jenis_menu=Kerajinan" class="btn btn-primary btn-sm">Kerajinan</a>
                            <a href="menu_pembeli.php?jenis_menu=Bahan%20Mentah" class="btn btn-primary btn-sm">Bahan Mentah</a>
                            <a href="menu_pembeli.php?jenis_menu=Lainnya" class="btn btn-primary btn-sm">Lainnya</a>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="row">

                                <?php foreach($result as $result) : ?>
                                <div class="col-md-3 mt-4">
                                  <div class="card">
                                    <div style="max-height: 300px; overflow: hidden;">
                                        <img src="upload/<?= $result['gambar'] ?>" style="width: 100%; height: auto; display: block;">
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title font-weight-bold"><?= $result['nama_menu'] ?></h5>
                                     <label class="card-text harga"><strong>Rp.</strong> <?= number_format($result['harga']); ?></label><br>
                                        <a href="menu_pembeli_toko.php?id_menu=<?= $result['id_menu']; ?>" class="btn btn-success">Cek Toko</a>
                                    </div>
                                  </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>