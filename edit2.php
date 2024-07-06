<?php 
include('koneksi.php');

$id_toko = $_POST['id_toko'];
$nama_toko = $_POST['nama_toko'];
$alamat_toko = $_POST['alamat_toko'];
$no_hp = $_POST['no_hp'];
$edit = mysqli_query($koneksi, "UPDATE toko SET nama_toko='$nama_toko', alamat_toko='$alamat_toko', no_hp='$no_hp' WHERE id_toko='$id_toko' ");

if($edit){	
    echo "<script>location= 'toko.php'</script>";
}
else{
	echo "Edit Toko Gagal";
}


 ?>