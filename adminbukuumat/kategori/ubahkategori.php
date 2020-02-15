<h3>Ubah Kategori</h3>

<?php 


$idk = $_GET['id'];

$detailkategori = $kategori->ambil_kategori($idk);

 ?>


 <form method="post">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $detailkategori['nama_kategori']; ?>">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control"">  <?php echo $detailkategori['keterangan_kategori']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
	
</form>

<?php 
if(isset($_POST['simpan']))
{
	$kategori->ubah_kategori($_POST['nama'], $_POST['keterangan'], $_GET['id']);

	echo "<script>alert('Data Kategori berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=kategori';</script>";
}


 ?>