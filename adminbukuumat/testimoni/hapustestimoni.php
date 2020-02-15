<h2>Hapus Data Testimoni</h2>

<?php 
$id = $_GET['id'];

$testimoni->hapus_testimoni($id);

echo "<script>alert('Data Testimoni berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=testimoni';</script>";

 ?>