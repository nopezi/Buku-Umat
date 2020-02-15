<h2>Ubah Media</h2>
<?php 
$id = $_GET['id'];

$datamedia = $media->ambil_media($id);
 ?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Media</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $datamedia['nama_media']; ?>">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if(isset($_POST['ubah']))
{
	$media->ubah_media($_POST['nama'], $_FILES['foto'], $_GET['id']);

	echo "<script>alert ('Data Media berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=media';</script>";
}

 ?>