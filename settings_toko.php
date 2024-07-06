<?php
    require 'koneksi.php';

    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }

    $id_toko = $_GET['id_toko'];

    $sql = "SELECT * FROM toko WHERE id_toko = '$id_toko'";
    $eksekusi = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($eksekusi);

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
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Settings</h1>

                    <div class="card mb-4">
                        <form action="" method="POST">
                        	<input type="hidden" name="id_toko" value="<?= $data['id_toko']; ?>">
                        	<div class="form-control">
                        		<label for="username">Username</label>
                        		<input type="text" name="username" value="<?= $data['username']; ?>" class="form-control">
                        		<br>
                        		<label for="password">Password</label>
                        		<input type="password" name="password" value="<?= $data['password']; ?>" class="form-control">
                        		<br>
                                <label for="nama_toko">Nama Toko</label>
                                <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Masukan Nama Toko" required oninvalid="this.setCustomValidity('Mohon isi Nama Toko Anda')" oninput="setCustomValidity('')" value="<?= $data['nama_toko']; ?>">
                                <br>
                                <label for="nama_pemilik">Nama Pemilik</label>
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukan Nama Lengkap" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Anda')" oninput="setCustomValidity('')" value="<?= $data['nama_pemilik']; ?>">
                                <br>
                                <label for="alamat_toko">Alamat Toko</label>
                                <textarea class="form-control" id="alamat_toko" name="alamat_toko" placeholder="Masukan Alamat" required oninvalid="this.setCustomValidity('Mohon isi Alamat Lengkap Anda')" oninput="setCustomValidity('')"><?= $data['alamat_toko']; ?></textarea>
                                <br>
                                <label for="no_hp">No. Handphone</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. Handphone" required oninvalid="this.setCustomValidity('Mohon isi No Handphone Anda')" oninput="setCustomValidity('')" value="<?= $data['no_hp']; ?>">
                                <br>
                        		<button name="submit" class="btn btn-primary">Ubah</button>
        						<a href="daftar_menu.php" class="btn btn-danger">Batal</a>
                        	</div>
                        </form>
                        <?php 
                            if(isset($_POST['submit'])) {
                                $id_toko = $_SESSION['id_toko'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $nama_toko = $_POST['nama_toko'];
                                $nama_pemilik = $_POST['nama_pemilik'];
                                $alamat_toko = $_POST['alamat_toko'];
                                $no_hp = $_POST['no_hp'];

                                // Mengubah data toko
                                $update = mysqli_query($koneksi, "UPDATE toko SET 
                                    username = '$username', 
                                    password = '$password',
                                    nama_toko = '$nama_toko', 
                                    nama_pemilik = '$nama_pemilik', 
                                    alamat_toko = '$alamat_toko',
                                    no_hp = '$no_hp'
                                    WHERE id_toko = '$id_toko'");

                                // Dialihkan ke halaman nota
                                echo "<script>location= 'daftar_menu.php'</script>";
                            }
                        ?>
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