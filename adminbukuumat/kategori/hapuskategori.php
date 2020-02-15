<h3>Hapus Kategori</h3>

<?php 

$kategori->hapus_kategori($_GET['id']);
echo "<script>alert('Hapus kategori berhasil '); location='index.php?halaman=kategori';</script>";

 ?>