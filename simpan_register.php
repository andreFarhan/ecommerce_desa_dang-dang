<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$username=$_POST["username"];
$password=$_POST["password"]; 
$nama_lengkap=$_POST["nama_lengkap"];
$jenis_kelamin=$_POST["jenis_kelamin"];
$tanggal_lahir=$_POST["tanggal_lahir"];
$alamat=$_POST["alamat"];
$no_hp=$_POST["no_hp"];
$status=$_POST["status"];



//Menginput data ke tabel
  $hasil=mysqli_query($koneksi, "INSERT INTO user (username,password,nama_lengkap,jenis_kelamin,tanggal_lahir,alamat,no_hp,status) VALUES('$username','$password','$nama_lengkap','$jenis_kelamin','$tanggal_lahir','$alamat','$no_hp','$status')");

//Kondisi apakah berhasil atau tidak
  if ($hasil) 
  {
	echo "<script>
				alert('Anda Berhasil Registrasi !');
				document.location='login.php';
		  </script>";
  }
  else 
  {
	echo "<script>
				alert('Registrasi Anda Gagal !');
				document.location='register.php';
		  </script>";
  }

?>