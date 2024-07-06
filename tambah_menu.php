<?php 
  include 'koneksi.php';
  session_start();
  if(!isset($_SESSION['login_user'])) {
    header("location: login.php");
  }
  $id_toko = $_SESSION['id_toko'];
  $sql = "SELECT * FROM toko WHERE id_toko = '$id_toko'";
  $eksekusi = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($eksekusi);

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

    <title>Form Tambah Produk</title>
    <link rel="icon" type="image/x-icon" href="images/Icon/logo-desa-dangdang.png">
  </head>
  <body>
 
 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN TAMBAH PRODUK</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu">Nama Toko</label>
          <input type="text" class="form-control" value="<?= $data['nama_toko']; ?>" disabled>
          <input type="hidden" name="id_toko" value="<?= $id_toko; ?>">
        </div>
        <div class="form-group">
          <label for="nama_menu">Nama Produk</label>
          <input type="text" class="form-control" name="nama_menu" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="#">Kategori</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Makanan" name="jenis_menu">Makanan 
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Minuman" name="jenis_menu">Minuman
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Kerajinan" name="jenis_menu">Kerajinan
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Bahan Mentah" name="jenis_menu">Bahan Mentah
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Lainnya" name="jenis_menu" checked>Lainnya
            </label>
          </div>
         </div>
        <div class="form-group">
          <label for="harga">Harga Produk</label>
          <input type="text" class="form-control" name="harga" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="stok">Stok</label>
          <input type="text" class="form-control" name="stok" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="satuan">Satuan Produk</label>
          <input type="text" class="form-control" name="satuan" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Produk</label>
          <textarea class="form-control" name="deskripsi"></textarea>
        </div>
        <div class="form-group">
          <label for="gambar">Foto Produk</label>
          <input type="file" class="form-control-file border" name="gambar">
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        <a href="daftar_menu.php" class="btn btn-danger">Kembali</a>
      </form>

      <?php 
  if(isset($_POST['tambah'])){
    $nama = $_POST['nama_menu'];
    $jenis = $_POST['jenis_menu'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $deskripsi = $_POST['deskripsi'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './upload/';
    $id_toko = $_POST['id_toko'];

    move_uploaded_file($source, $folder.$nama_file);
    $insert = mysqli_query($koneksi, "INSERT INTO produk VALUES (NULL, '$nama', '$jenis', '$stok', '$harga', '$satuan', '$deskripsi', '$nama_file', '$id_toko')");

    if($insert){
      echo "<script>location= 'daftar_menu.php'</script>";
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