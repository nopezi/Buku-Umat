<h3>Tambah Kategori</h3>

<form method="post">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control"> </textarea>
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
	
</form>

<?php 
if(isset($_POST['simpan']))
{
	$hasil = $kategori->tambah_kategori($_POST['nama'], $_POST['keterangan']);
	if($hasil=="gagal")
	{
		echo "<script>alert('Tambah kategori gagal, data sudah ada');</script>";
		echo "<script>location='index.php?halaman=tambahkategori';</script>";
	}else{
		
	echo "<script>alert('Data Kategori berhasil di simpan');</script>";
	echo "<script>location='index.php?halaman=kategori';</script>";
	}

}

 ?>

