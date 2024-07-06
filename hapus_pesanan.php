<?php 
session_start();
 
$id_menu = $_GET['id_menu'];
$id_toko = $_GET['id_toko'];

unset($_SESSION["pesanan"][$id_menu]);

echo "<script>location= 'pesanan_pembeli.php?id_toko=$id_toko'</script>";


?>