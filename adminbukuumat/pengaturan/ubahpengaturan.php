

<?php 

$id = $_GET['id'];
$detailpengaturan = $pengaturan->ambil_pengaturan($id);

echo "<pre>";
print_r($detailpengaturan);
echo "</pre>";

 ?>

<h2>Ubah Pengaturan</h2>

<form method="post">
	<div class="form-group">
		<label>Kolom</label>
		<input type="text" name="kolom" class="form-control" value="<?php echo $detailpengaturan['kolom']; ?>">
	</div>
	<div class="form-group">
		<label>Isi</label>
		<textarea class="form-control" rows="5" name="isi" ><?php echo $detailpengaturan['isi']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if(isset($_POST['ubah']))
{
	$pengaturan->ubah_pengaturan($_POST['kolom'], $_POST['isi'], $_GET['id']);

	echo "<script>alert('Pengaturan berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=pengaturan';</script>";
}

 ?>