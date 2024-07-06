<?php 
include 'koneksi.php';

  if (isset($_SESSION['login_user'])) {
    header("Location: menu_pembeli.php");
    exit; 
  }
  error_reporting(E_ERROR | E_PARSE);
?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->


    <title>E-Commerce Desa Dangdang</title>
    <link rel="icon" type="image/x-icon" href="images/Icon/logo-desa-dangdang.png">
  </head>
  <body style="background-image: url(images/Background/bg2.jpg); ">
  <!-- Form Login -->
    <div class="container bg-light">
      <h4 class="text-center"><img src="images/Icon/logo-desa-dangdang.png"> LOGIN E-COMMERCE</h4>
      <hr>
      <form method="POST" action="">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
              <input type="text" class="form-control" placeholder="Masukkan Username" name="username" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
              </div>
              <input type="password" class="form-control" placeholder="Masukkan Password" name="password" autocomplete="off">
          </div>
        </div>
        <p>Belum punya akun? Silahkan registrasi</p>
        <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
        <a href="pilih_register.php" class="btn btn-info">REGISTRASI</a>
      </form>
    </div>
  <!-- Akhir Form Login -->

  <!-- Eksekusi Form Login -->
      <?php 
        if(isset($_POST['submit'])) {
          $user = $_POST['username'];
          $password = $_POST['password'];

          // Query untuk memilih tabel
          $cek_data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$password'");
          $hasil = mysqli_fetch_array($cek_data);
          $status = $hasil['status'];
          $login_user = $hasil['username'];
          $row = mysqli_num_rows($cek_data);

          // Pengecekan Kondisi Login Berhasil/Tidak
            if ($row > 0) {
                session_start();   
                $id_user = $hasil['id_user'];
                $nama_lengkap = $hasil['nama_lengkap'];
                $status = $hasil['status'];

                if(isset($_SESSION['login_user'])) {
                  header("location: menu_pembeli.php");
                }

                $_SESSION['id_user'] = $id_user;
                $_SESSION['nama_lengkap'] = $nama_lengkap;
                $_SESSION['status'] = $status;
                $_SESSION['login_user'] = $login_user;

                if ($status == 'admin') {
                  echo "<script>location= 'daftar_menu.php'</script>";
                }elseif ($status == 'user') {
                  echo "<script>location= 'menu_pembeli.php'</script>";
                }
            }else{
              // Query untuk memilih tabel
              $cek_data = mysqli_query($koneksi, "SELECT * FROM toko WHERE username = '$user' AND password = '$password'");
              $hasil = mysqli_fetch_array($cek_data);
              $status = $hasil['status'];
              $login_user = $hasil['username'];
              $row = mysqli_num_rows($cek_data);

              // Pengecekan Kondisi Login Berhasil/Tidak
              if ($row > 0) {
                  session_start();   
                  $id_toko = $hasil['id_toko'];
                  $nama_toko = $hasil['nama_toko'];
                  $nama_pemilik = $hasil['nama_pemilik'];
                  $no_hp = $hasil['no_hp'];
                  $status = $hasil['status'];

                  if(isset($_SESSION['login_user'])) {
                    header("location: menu_pembeli.php");
                  }

                  $_SESSION['id_toko'] = $id_toko;
                  $_SESSION['nama_toko'] = $nama_toko;
                  $_SESSION['nama_pemilik'] = $nama_pemilik;
                  $_SESSION['no_hp'] = $no_hp;
                  $_SESSION['status'] = $status;
                  $_SESSION['login_user'] = $login_user;

                  if ($status == 'penjual') {
                    echo "<script>location= 'daftar_menu.php'</script>";
                  }
              }else{
                  echo "<script>alert('Login gagal!, Cek kembali Username atau Password Anda');</script>";
                  echo "<script>location= 'login.php'</script>";
              }
            }

          
        }
       ?>
  <!-- Akhir Eksekusi Form Login -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>