<h2>Tambah Data Voucher</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Voucher</label>
		<input type="text" name="nama" class="form-control">
	</div>

	<div class="form-group">
		<label>Potongan</label>
		<input type="number" name="potongan" class="form-control">
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
	
</form>

<?php 
if(isset($_POST['simpan']))
{
	$voucher->simpan_voucher($_POST['nama'], $_POST['potongan']);

	echo "<script>alert('Data Voucher berhasil di simpan');</script>";
	echo "<script>location='index.php?halaman=voucher';</script>";
}
?>