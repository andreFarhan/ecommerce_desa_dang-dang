<?php 
  include 'koneksi.php';

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

    <title>Form Tambah Penjual</title>
    <link rel="icon" type="image/x-icon" href="images/Icon/logo-desa-dangdang.png">
  </head>
  <body style="background-image: url(images/Background/bg.png); ">
 
 <!-- Form Registrasi -->
  <div class="container">
    <div class="card p-5 mt-3">
    <h3 class="text-center mt-3 mb-5">HALAMAN REGISTRASI PENJUAL</h3>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="user">Username</label>
            <input type="text" class="form-control" id="user" name="username" placeholder="Masukan Username" required oninvalid="this.setCustomValidity('Mohon isi Username Anda')" oninput="setCustomValidity('')" autocomplete="off">
          </div>
          <div class="form-group col-md-6">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="password" placeholder="Masukan Password" required oninvalid="this.setCustomValidity('Mohon isi Password Anda')" oninput="setCustomValidity('')" autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <label for="nama_toko">Nama Toko</label>
          <input type="text" name="nama_toko" class="form-control" placeholder="Masukkan Nama Toko Anda" autocomplete="off" required oninvalid="this.setCustomValidity('Mohon isi Nama Toko Anda')" oninput="setCustomValidity('')" minlength="3">
        </div>
        <div class="form-group">
          <label for="nama_pemilik">Nama Pemilik</label>
          <input type="text" name="nama_pemilik" class="form-control" placeholder="Masukkan Nama Anda" autocomplete="off" required oninvalid="this.setCustomValidity('Mohon isi Nama Anda')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <label for="alamat_toko">Alamat Toko</label>
          <textarea class="form-control" name="alamat_toko" required oninvalid="this.setCustomValidity('Mohon isi Alamat Toko Anda')" oninput="setCustomValidity('')" placeholder="Masukkan Alamat Toko Anda"></textarea>
        </div>
        <div class="form-group">
          <label for="no_hp">No. Handphone</label>
          <input type="number" name="no_hp" class="form-control" autocomplete="off" required oninvalid="this.setCustomValidity('Mohon isi Nomor Handphone Anda')" oninput="setCustomValidity('')" placeholder="Masukkan No. HP Anda">
        </div><br>
        <input type="hidden" name="status" value="penjual">
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        <a href="login.php" onclick="return confirm('Apakah Anda ingin membatalkan registrasi?')" class="btn btn-danger">Batal</a>
      </form>

      <?php 
  if(isset($_POST['tambah'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_toko = $_POST['nama_toko'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $alamat_toko = $_POST['alamat_toko'];
    $no_hp = $_POST['no_hp'];
    $status = $_POST['status'];

    $insert = mysqli_query($koneksi, "INSERT INTO toko VALUES (NULL, '$username', '$password', '$nama_toko', '$nama_pemilik', '$alamat_toko', '$no_hp', '$status')");

    if($insert){
      echo "<script>location= 'login.php'</script>";
    }
    else {
      echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    }
  }

   ?>

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