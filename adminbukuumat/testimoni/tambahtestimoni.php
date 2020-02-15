<h2>Tambah Data Testimoni</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>

	<div class="form-group">
		<label>Testimoni</label>
		<textarea name="testimoni" class="form-control" >
		</textarea>
	</div>

	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
</form>

<?php 
if(isset($_POST['simpan']))
{
	$testimoni->simpan_testimoni($_POST['nama'], $_POST['testimoni'], $_FILES['foto']);

	echo "<script>alert('Data Testimoni berhasil di simpan');</script>";
	echo "<script>location='index.php?halaman=testimoni';</script>";
}
?>