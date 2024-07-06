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
    <title>Data Toko</title>
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
                            <h1 class="mt-1">DATA TOKO</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <a href="tambah_toko.php" class="btn btn-success mb-4">TAMBAH TOKO</a>
                            <div class="row">
                                <table class="table table-bordered" id="example">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col">No.</th>
                                      <th scope="col">ID Toko</th>
                                      <th scope="col">Nama Toko</th>
                                      <th scope="col">Alamat</th>
                                      <th scope="col">No. Handphone</th>
                                      <th scope="col">Opsi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $nomor=1; ?>
                                    <?php 
                                      $ambil = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY id_toko DESC");
                                      $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
                                    ?>
                                    <?php foreach($result as $result) : ?>

                                    <tr>
                                      <th scope="row"><?php echo $nomor; ?></th>
                                      <td><?php echo $result["id_toko"]; ?></td>
                                      <td><?php echo $result["nama_toko"]; ?></td>
                                      <td><?php echo $result["alamat_toko"]; ?></td>
                                      <td><?php echo $result["no_hp"]; ?></td>
                                      <td>
                                        <a href="edit_toko.php?id_toko=<?php echo $result['id_toko']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>
                                      </td>
                                    </tr>
                                    <?php $nomor++; ?>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
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