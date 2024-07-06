<?php 
    include('koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }
    if (isset($_GET['id_toko'])) {
        $id_toko = $_GET['id_toko'];
    }
    $eksekusi = mysqli_query($koneksi,"SELECT * FROM toko WHERE id_toko = '$id_toko'");
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
    <title>Information</title>
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
                            <h1 class="mt-1">Informasi</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <table class="table">
                                <tr>
                                    <th>Nama Toko</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nomor Whatsapp</th>
                                    <th>Alamat Toko</th>
                                </tr>
                                    <?php while($data = mysqli_fetch_array($eksekusi)): ?>
                                <tr>
                                    <td><?= $data['nama_toko']; ?></td>
                                    <td><?= $data['nama_pemilik']; ?></td>
                                    <td><?= $data['no_hp']; ?></td>
                                    <td><?= $data['alamat_toko']; ?></td>
                                </tr>
                                    <?php endwhile; ?>
                            </table>
                              <a href="riwayat_pesanan.php" class="btn btn-primary btn-sm">Kembali</a>
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