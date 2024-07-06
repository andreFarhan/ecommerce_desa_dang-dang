<?php 
    include('koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
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
    <title>Detail Pesanan</title>
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
                            <h1 class="mt-1">DETAIL PESANAN ANDA</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="row">
                                <table class="table table-bordered" id="example">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col">No.</th>
                                      <th scope="col">ID Pemesanan</th>
                                      <th scope="col">Nama Pesanan</th>
                                      <th scope="col">Harga</th>
                                      <th scope="col">Jumlah</th>
                                      <th scope="col">Subharga</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $nomor=1; ?>
                                    <?php $totalbelanja = 0; ?>
                                    <?php 
                                        $ambil = $koneksi->query("SELECT * FROM pemesanan_produk JOIN produk ON pemesanan_produk.id_menu=produk.id_menu 
                                          WHERE pemesanan_produk.id_pemesanan ='$_GET[id]'");
                                     ?>
                                     <?php while ($pecah=$ambil->fetch_assoc()) { ?>
                                     <?php $subharga1=$pecah['harga']*$pecah['jumlah']; ?>
                                    <tr>
                                      <th scope="row"><?php echo $nomor; ?></th>
                                      <td><?php echo $pecah['id_pemesanan_produk']; ?></td>
                                      <td><?php echo $pecah['nama_menu']; ?></td>
                                      <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                                      <td><?php echo $pecah['jumlah']; ?></td>
                                      <td>
                                        Rp. <?php echo number_format($pecah['harga']*$pecah['jumlah']); ?>
                                      </td>
                                    </tr>
                                    <?php $nomor++; ?>
                                    <?php $totalbelanja+=$subharga1; ?>
                                    <?php } ?>
                                  </tbody>
                                   <tfoot>
                                    <tr>
                                      <th colspan="5">Total Bayar</th>
                                      <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                                    </tr>
                                  </tfoot>
                                </table><br>
                                
                                <form method="POST" action="pembayaran.php">
                                    <?php if ($_SESSION['status'] == 'penjual'): ?>
                                        <a href="pesanan.php" class="btn btn-success btn-sm">Kembali</a>
                                    <?php else: ?>
                                        <a href="riwayat_pesanan.php" class="btn btn-success btn-sm">Kembali</a>
                                    <?php endif ?>
                                  <?php 
                                      $sql = "SELECT * FROM pemesanan WHERE id_pemesanan = '$_GET[id]'";
                                      $eksekusi = mysqli_query($koneksi, $sql);
                                      $data = mysqli_fetch_assoc($eksekusi);
                                      if ($data['bayar'] == 'belum bayar'): ?>
                                        <input type="hidden" name="id_pemesanan" value="<?= $data['id_pemesanan']; ?>">
                                        <input type="hidden" name="id_toko" value="<?= $data['id_toko']; ?>">
                                        <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
                                        <input type="hidden" name="totalbelanja" value="<?= $totalbelanja; ?>">
                                        <?php if ($_SESSION['status'] == 'admin' OR $_SESSION['status'] == 'penjual'): ?>
                                          <button class="btn btn-primary btn-sm" type="submit">Konfirmasi Pembayaran</button>
                                        <?php else: ?>
                                          <a href="information.php?id_toko=<?= $data['id_toko']; ?>" class="btn btn-primary btn-sm">Belum dibayar</a>
                                        <?php endif ?>
                                  <?php else: ?>
                                        <a href="detail_pembayaran.php?id_pemesanan=<?= $_GET['id']; ?>" class="btn btn-success btn-sm">Dibayar</a>
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