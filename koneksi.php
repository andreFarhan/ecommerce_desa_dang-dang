<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_ecommerce_desa_dangdang"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

	if (!$koneksi) {
		die("Koneksi Gagal:".mysqli_connect_error());
	}
 ?>