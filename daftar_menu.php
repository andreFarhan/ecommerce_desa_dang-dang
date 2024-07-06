<?php 
    include('koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }
    $id_toko = $_SESSION['id_toko'];
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
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4 mt-2">
                        <div class="card-header">
                            <h1 class="mt-1">PRODUK ANDA</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <a href="tambah_menu.php" class="btn btn-success mt-3">TAMBAH PRODUK</a>
                            <div class="row">
                              <?php 
                                include('koneksi.php');

                                $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_toko = '$id_toko'  ORDER BY id_menu DESC");
                                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                              ?>

                              <?php foreach($result as $result) : ?>
                              <div class="col-md-3 mt-4">
                                <div class="card">
                                    <div style="max-height: 350px; overflow: hidden;">
                                        <img src="upload/<?php echo $result['gambar'] ?>" style="width: 100%; height: auto; display: block;">
                                    </div>
                                  <div class="card-body">
                                    <h5 class="card-title font-weight-bold"><?php echo $result['nama_menu'] ?></h5>
                                   <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>
                                    <a href="edit_menu.php?id_menu=<?php echo $result['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

                                    <a onclick="return confirm('Apakah Anda ingin menghapus produk ini?')" href="hapus_menu.php?id_menu=<?php echo $result['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
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

</body>
</html>