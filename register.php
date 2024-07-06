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


    <title>Halaman Registrasi</title>
    <link rel="icon" type="image/x-icon" href="images/Icon/logo-desa-dangdang.png">
  </head>
  <body style="background-image: url(images/Background/bg.png); ">
 
 <!-- Form Registrasi -->
  <div class="container">
    <div class="card p-5 mt-3">
    <form method="POST" action="simpan_register.php">
    <h3 class="text-center mb-3">HALAMAN REGISTRASI PEMBELI</h3>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="user">Username</label>
          <input type="text" class="form-control" id="user" name="username" placeholder="Masukan Username" required oninvalid="this.setCustomValidity('Mohon isi Username Anda')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group col-md-6">
          <label for="pass">Password</label>
          <input type="password" class="form-control" id="pass" name="password" placeholder="Masukan Password" required oninvalid="this.setCustomValidity('Mohon isi Password Anda')" oninput="setCustomValidity('')">
        </div>
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama_lengkap" placeholder="Masukan Nama Lengkap" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Anda')" oninput="setCustomValidity('')">
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk" value="Laki-Laki" checked>
          <label class="form-check-label" for="jk">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk" value="Perempuan">
          <label class="form-check-label" for="jk">Perempuan</label>
        </div>
      </div>
      <div class="form-group">
        <label for="tgl">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl" name="tanggal_lahir" required oninvalid="this.setCustomValidity('Mohon isi Tanggal Lahir Anda')" oninput="setCustomValidity('')">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="rumah">Alamat</label>
          <textarea class="form-control" id="rumah" name="alamat" placeholder="Masukan Alamat" required oninvalid="this.setCustomValidity('Mohon isi Alamat Lengkap Anda')" oninput="setCustomValidity('')"></textarea>
        </div>
        <div class="form-group col-md-2">
          <label for="no_hp">No. Handphone</label>
          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. Handphone" required oninvalid="this.setCustomValidity('Mohon isi No Handphone Anda')" oninput="setCustomValidity('')">
        </div>
        <input type="hidden" name="status" value="user">
      </div>     
      <button type="register" class="btn btn-primary">Register</button>
      <a href="login.php" onclick="return confirm('Apakah Anda ingin membatalkan registrasi?')" class="btn btn-danger">Batal</a>
    </form>
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