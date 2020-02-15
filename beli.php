<?php 
include 'config/class.php';

$keranjang->tambah_keranjang($_GET['id'],1);
echo "<script>alert('Berhasil masuk keranjang');location='keranjang.php';</script>";

 ?>