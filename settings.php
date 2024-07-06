<?php
    require 'koneksi.php';

    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }

    $id_user = $_GET['id_user'];

    $sql = "SELECT * FROM user WHERE id_user = '$id_user'";
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
                        	<input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
                        	<div class="form-control">
                        		<label for="username">Username</label>
                        		<input type="text" name="username" value="<?= $data['username']; ?>" class="form-control">
                        		<br>
                        		<label for="password">Password</label>
                        		<input type="password" name="password" value="<?= $data['password']; ?>" class="form-control">
                        		<br>
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama_lengkap" placeholder="Masukan Nama Lengkap" required oninvalid="this.setCustomValidity('Mohon isi Nama Lengkap Anda')" oninput="setCustomValidity('')" value="<?= $data['nama_lengkap']; ?>">
                                <br>
                                <label for="jk">Jenis Kelamin</label><br>
                                <select id="jk" class="form-control" name="jenis_kelamin" required>
                                    <option value="<?= $data['jenis_kelamin']; ?>" hidden><?= $data['jenis_kelamin']; ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <br>
                                <label for="tgl">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl" name="tanggal_lahir" required oninvalid="this.setCustomValidity('Mohon isi Tanggal Lahir Anda')" oninput="setCustomValidity('')" value="<?= $data['tanggal_lahir']; ?>">
                                <br>
                                  <label for="rumah">Alamat</label>
                                  <textarea class="form-control" id="rumah" name="alamat" placeholder="Masukan Alamat" required oninvalid="this.setCustomValidity('Mohon isi Alamat Lengkap Anda')" oninput="setCustomValidity('')"><?= $data['alamat']; ?></textarea>
                                <br>
                                  <label for="no_hp">No. Handphone</label>
                                  <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. Handphone" required oninvalid="this.setCustomValidity('Mohon isi No Handphone Anda')" oninput="setCustomValidity('')" value="<?= $data['no_hp']; ?>">
                                <br>
                        		<button name="submit" class="btn btn-primary">Ubah</button>
        						<a href="menu_pembeli.php" class="btn btn-danger">Batal</a>
                        	</div>
                        </form>
                        <?php 
                            if(isset($_POST['submit'])) {
                                $id_user = $_SESSION['id_user'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $nama_lengkap = $_POST['nama_lengkap'];
                                $jenis_kelamin = $_POST['jenis_kelamin'];
                                $tanggal_lahir = $_POST['tanggal_lahir'];
                                $alamat = $_POST['alamat'];
                                $no_hp = $_POST['no_hp'];

                                // Mengubah data user
                                $update = mysqli_query($koneksi, "UPDATE user SET 
                                    username = '$username', 
                                    password = '$password',
                                    nama_lengkap = '$nama_lengkap', 
                                    jenis_kelamin = '$jenis_kelamin',
                                    tanggal_lahir = '$tanggal_lahir',
                                    alamat = '$alamat',
                                    no_hp = '$no_hp'
                                    WHERE id_user = '$id_user'");

                                // Dialihkan ke halaman nota
                                echo "<script>location= 'menu_pembeli.php'</script>";
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