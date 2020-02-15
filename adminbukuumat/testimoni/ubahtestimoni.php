<h2>Ubah Testimoni</h2>

<?php 

$id = $_GET['id'];
$datatestimoni = $testimoni->ambil_testimoni($id);


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $datatestimoni['nama_testimoni']; ?>">
	</div>
	<div class="form-group">
		<label>Testimoni</label>
		<textarea class="form-control" name="testimoni" ><?php echo $datatestimoni['isi_testimoni']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<br/>
		<img src="../assets/foto_testimoni/<?php echo $datatestimoni['foto_testimoni']; ?>" width="100px">
		<input type="file" name="foto">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if(isset($_POST["ubah"]))
{
	$testimoni->ubah_testimoni($_POST['nama'], $_POST['testimoni'], $_FILES['foto'], $_GET['id']);

	echo "<script>alert('Data Testimoni berhasil diubah');</script>";
	echo "<script>location = 'index.php?halaman=testimoni';</script>";
}


 ?>