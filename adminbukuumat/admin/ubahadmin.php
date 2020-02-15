<h2>Ubah Data Admin</h2>
<?php 
$ida = $_GET['id'];

$detailadmin = $admin->ambil_admin($ida);



?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $detailadmin['nama_admin']; ?>">
	</div>
	<div class="form-group">
		<label>E-Mail</label>
		<input type="text" name="email" class="form-control" value="<?php echo $detailadmin['email']; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" value="<?php echo $detailadmin['password']; ?>">
	</div>
	<div class="form-group">
		<select name="jk" class="form-control">

			<option value="laki-laki" <?php if($detailadmin['jk_admin']=="laki-laki") {echo "selected";}  ?>>Laki-laki</option>
			<option value="perempuan" <?php if($detailadmin['jk_admin']=="perempuan"){echo "selected";}?>>Perempuan</option>
		</select>
		
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" value="<?php echo $detailadmin['telp_admin']; ?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control" ><?php echo $detailadmin['alamat_admin']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<br>
		<img src="../assets/foto_admin/<?php echo $detailadmin['foto_admin']; ?>" width="100px">
		<input type="file" name="foto" class="form-control">
	</div>
	<button name="simpan" class="btn btn-primary">simpan</button>
</form>

<?php 
if(isset($_POST['simpan']))
{
	$admin->ubah_admin($_POST['nama'], $_POST['email'], $_POST['password'], $_POST['jk'], $_POST['telepon'], $_POST['alamat'], $_FILES['foto'], $_GET['id']);

	echo "<script>alert('Data Admin berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=admin';</script>";
}

?> 