<h2>Hapus Data Admin</h2>
<?php 
$ida = $_GET['id'];
$admin->hapus_admin($ida);

echo "<script>alert('Data Admin berhasil di hapus');</script>";
echo "<script>location='index.php?halaman=admin';</script>";


 ?>