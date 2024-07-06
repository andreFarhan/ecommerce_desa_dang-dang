<?php 
    include('koneksi.php');
    session_start();
    if(!isset($_SESSION['login_user'])) {
      echo "<script>location= 'login.php'</script>";
    }
    if(empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"]))
    {
      echo "<script>location= 'menu_pembeli.php'</script>";
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
    <title>Data Pesanan</title>
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
                            <h1 class="mt-1">PESANAN ANDA</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="row">
                                <table class="table table-bordered" id="example">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Nama Pesanan</th>
                                      <th scope="col">Harga</th>
                                      <th scope="col">Jumlah</th>
                                      <th scope="col">Subharga</th>
                                      <th scope="col">Opsi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php $nomor=1; ?>
                                      <?php $totalbelanja = 0; ?>
                                      <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) : ?>

                                      <?php 
                                        include('koneksi.php');
                                        $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
                                        $pecah = $ambil -> fetch_assoc();
                                        $subharga = $pecah["harga"]*$jumlah;
                                        $id_toko = $_GET['id_toko'];
                                      ?>
                                    <tr>
                                      <td><?= $nomor; ?></td>
                                      <td><?= $pecah["nama_menu"]; ?></td>
                                      <td>Rp. <?= number_format($pecah["harga"]); ?></td>
                                      <td><?= $jumlah; ?></td>
                                      <td>Rp. <?= number_format($subharga); ?></td>
                                      <td>
                                        <a href="hapus_pesanan.php?id_menu=<?= $id_menu; ?>&id_toko=<?= $id_toko; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                      </td>
                                    </tr>
                                      <?php $nomor++; ?>
                                      <?php $totalbelanja+=$subharga; ?>
                                      <?php endforeach ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th colspan="4">Total Belanja</th>
                                      <th colspan="2">Rp. <?= number_format($totalbelanja) ?></th>
                                    </tr>
                                  </tfoot>
                                </table><br>
                                <form method="POST" action="">
                                  <a href="menu_pembeli_toko.php?id_toko=<?= $id_toko; ?>" class="btn btn-primary btn-sm">Lihat Menu</a>
                                  <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
                                </form>        

                                <?php 
                                if(isset($_POST['konfirm'])) {
                                    $id_user = $_SESSION['id_user'];

                                    $tanggal_pemesanan=date("Y-m-d");

                                    // Menyimpan data ke tabel pemesanan
                                    $insert = mysqli_query($koneksi, "INSERT INTO pemesanan VALUES (NULL, '$tanggal_pemesanan', '$totalbelanja', 'belum bayar','$id_user','$id_toko')");

                                    // Mendapatkan ID barusan
                                    $id_terbaru = $koneksi->insert_id;

                                    // Menyimpan data ke tabel pemesanan produk
                                    foreach ($_SESSION["pesanan"] as $id_menu => $jumlah)
                                    {
                                      $insert = mysqli_query($koneksi, "INSERT INTO pemesanan_produk (id_pemesanan, id_menu, jumlah) 
                                        VALUES ('$id_terbaru', '$id_menu', '$jumlah') ");
                                    }          

                                    // Mengosongkan pesanan
                                    unset($_SESSION["pesanan"]);

                                    // Dialihkan ke halaman nota
                                    echo "<script>location= 'riwayat_pesanan.php'</script>";
                                }
                                ?>
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