<h2>Hapus Data Produk</h2>
<?php 

// $foto_produk->hapus_produk($_GET['id']);
$id = ($_GET['id']);

$produk->hapus_produk($id);

// echo "<script>alert('Hapus Produk Berhasil');
// location='index.php?halaman=produk';</script>";
 ?>