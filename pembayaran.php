<?php 

	include('koneksi.php');
    session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: login.php");
	}

  date_default_timezone_set('asia/jakarta');

	$totalbelanja = $_POST['totalbelanja'];
    $id_pembeli = $_POST['id_user'];
    $id_pemesanan = $_POST['id_pemesanan'];

    if (isset($_POST['bayar'])) {
        $totalbelanja = $_POST['totalbelanja'];
        $id_pembeli = $_POST['id_user'];
        $uang_bayar = $_POST['uang_bayar'];
        if ($uang_bayar >= $totalbelanja) {
          $kembalian = $uang_bayar - $totalbelanja;
          $id_pemesanan = $_POST['id_pemesanan'];
          $sql_pemesanan = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'");
          $fetch_pemesanan = mysqli_fetch_assoc($sql_pemesanan);
          
          $cek_sql_update = mysqli_affected_rows($koneksi);

        } else {
          $kembalian = $uang_bayar - $totalbelanja;
        	echo "<script>location= 'detail_pesanan.php?id=$id_pemesanan'</script>";
            die;
        }
      }
    if (isset($_POST['selesai'])) {
        $totalbelanja = $_POST['totalbelanja'];
        $uang_bayar = $_POST['uang_bayar'];
        $kembalian = $uang_bayar - $totalbelanja;
        $id_pemesanan = $_POST['id_pemesanan'];
        $tanggal_bayar = date('Y-m-d\TH:i:s');

        $sql_pembayaran = mysqli_query($koneksi, "INSERT INTO pembayaran VALUES (NULL, '$totalbelanja', '$uang_bayar', '$kembalian', '$tanggal_bayar', '$id_pembeli', '$id_pemesanan')");

        $sql_bayar = mysqli_query($koneksi, "UPDATE pemesanan SET bayar = 'dibayar' WHERE id_pemesanan = '$id_pemesanan'");

        echo "<script>location= 'detail_pesanan.php?id=$id_pemesanan'</script>";
        die;
    }
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
    <title>Pembayaran</title>
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
                            <h1 class="mt-1">PEMBAYARAN</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="row">
                                <form method="POST">
                                  <a href="pesanan.php" class="btn btn-success btn-sm">Kembali</a>
                                 <div class="form-group mt-3">
                                 	<label for="id_pemesanan">ID Pemesanan</label>
	                                <input class="form-control" type="hidden" name="id_pemesanan" value="<?= $id_pemesanan; ?>">
                                    <input class="form-control" type="number" value="<?= $id_pemesanan; ?>" disabled>
                                 </div>
                                 <div class="form-group mt-3">
                                 	<label for="id_user">ID Pembeli</label>
                                    <input class="form-control" type="hidden" name="id_user" value="<?= $id_pembeli; ?>">
	                                <input class="form-control" type="number" value="<?= $id_pembeli; ?>" disabled>
	                             </div>
                                 <div class="form-group mt-3">
                                 	<label for="totalbelanja">Total Belanja</label>
                                    <input class="form-control" type="hidden" name="totalbelanja" value="<?= $totalbelanja; ?>">
	                                <input class="form-control" type="number" value="<?= $totalbelanja; ?>" disabled>
	                             </div>
                                 <div class="form-group mt-3">
                                 	<label for="uang_bayar">Uang yang dibayar</label>
                                 	<?php if (isset($_POST['bayar'])): ?>
	                                	<input class="form-control" type="number" name="uang_bayar" value="<?= $uang_bayar; ?>">
                                 	<?php else: ?>
	                                	<input class="form-control" type="number" name="uang_bayar" required>
                                 	<?php endif ?>
	                              </div>
	                                <?php if (isset($_POST['bayar'])): ?>
	                                <div class="form-group mt-3">
                                 		<label for="kembalian">Kembalian</label>
	                                	<input type="number" class="form-control" value="<?= $kembalian; ?>">
	                                </div>
										<button type="submit" name="selesai" class="btn btn-primary mt-3"><i class="fas fa-fw fa-handshake"></i> Selesai</button>
									<?php else: ?>
										<button type="submit" name="bayar" class="btn btn-primary mt-3"><i class="fas fa-fw fa-handshake"></i> Bayar</button>
									<?php endif ?>
                                </form>                                
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