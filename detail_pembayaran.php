<?php 

	include('koneksi.php');
    session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: login.php");
	}

	if (isset($_GET['id_pemesanan'])) {
        $id_pemesanan = $_GET['id_pemesanan'];
    }

    $sql = "SELECT * FROM pembayaran WHERE id_pemesanan = '$id_pemesanan'";
    $eksekusi = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($eksekusi);
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
    <title>Detail Pembayaran</title>
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
                            <h1 class="mt-1">DETAIL PEMBAYARAN</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="row">
                                <table class="table table-bordered" id="example">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col">ID Pembayaran</th>
                                      <th scope="col">Total Pembayaran</th>
                                      <th scope="col">Uang Bayar</th>
                                      <th scope="col">Kembalian</th>
                                      <th scope="col">Tanggal Bayar</th>
                                      <th scope="col">ID Pemesanan</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <tr>
                                      <td><?= $data["id_pembayaran"]; ?></td>
                                      <td>Rp. <?= number_format($data['total_pembayaran']); ?></td>
                                      <td>Rp. <?= number_format($data['uang_bayar']); ?></td>
                                      <td>Rp. <?= number_format($data['kembalian']); ?></td>
                                      <td><?= $data["tanggal_bayar"]; ?></td>
                                      <td><?= $data["id_pemesanan"]; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <a href="pesanan.php" class="btn btn-success btn-sm">Kembali</a>
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