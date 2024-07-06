<?php 
include('koneksi.php');

$id_toko = $_GET['id_toko'];

$ambil = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$id_toko'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


    <title>Form Edit Toko</title>
    <link rel="icon" type="image/x-icon" href="images/Icon/logo-desa-dangdang.png">
  </head>
  <body>
 
 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN EDIT TOKO</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="edit2.php" enctype="multipart/form-data">
        <input type="hidden" name="id_toko" value="<?php echo $result[0]['id_toko'] ?>">
        <div class="form-group">
          <label for="nama_toko">Nama Toko</label>
          <input type="text" name="nama_toko" class="form-control" value="<?php echo $result[0]['nama_toko'] ?>">
        </div>
        <div class="form-group">
          <label for="alamat_toko">Alamat Toko</label>
          <textarea class="form-control" name="alamat_toko"><?php echo $result[0]['alamat_toko'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="no_hp">No. Handphone</label>
          <input type="number" name="no_hp" class="form-control" value="<?php echo $result[0]['no_hp'] ?>">
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        <a href="toko.php" class="btn btn-danger">Kembali</a>

  </div>
  </div>
  <!-- Akhir Form Registrasi --> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>