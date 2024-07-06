<?php 
session_start();

$id_menu = $_GET['id_menu'];
$jumlah = $_GET['jumlah'];
$id_toko = $_GET['id_toko'];


if (isset($_SESSION['pesanan'][$id_menu]))
{
	$_SESSION['pesanan'][$id_menu]+=$jumlah;
}

else 
{
	$_SESSION['pesanan'][$id_menu]=$jumlah;
}

echo "<script>location= 'pesanan_pembeli.php?id_toko=$id_toko'</script>";

 ?>