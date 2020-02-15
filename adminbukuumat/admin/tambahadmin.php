
<h2>Tambah Data</h2>



<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label>E-Mail</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control">
	</div>
	<div class="form-group">
		<select name="jk" class="form-control">
		<option >Pilih Jenis Kelamin</option>
		<option value="laki-laki">Laki-laki</option>
		<option value="perempuan">Perempuan</option>
		</select>
		
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="Telepon" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button name="simpan" class="btn btn-primary">simpan</button>
</form>

<?php 
// jika ada tombol simpan maka
if(isset($_POST['simpan']))
{
	// $admin->simpan_admin($_POST['nama'], $_POST['email'], $_POST['password'], $_POST['jk'], $_POST['telepon'], $_POST['alamat'], $_FILES['foto']);
	// echo "<script>alert('Data Admin tersimpan');</script>";
	// echo "<script>location='index.php?halaman=admin';</script>";

	$hasil = $admin->simpan_admin($_POST['nama'], $_POST['email'], $_POST['password'], $_POST['jk'], $_POST['telepon'], $_POST['alamat'], $_FILES['foto']);
	if($hasil=="gagal")
	{
		echo "<script>alert('Tambah admin gagal, data sudah ada');</script>";
		echo "<script>location='index.php?halaman=tambahadmin';</script>";
	}else{
		
	echo "<script>alert('Data admin berhasil di simpan');</script>";
	echo "<script>location='index.php?halaman=admin';</script>";
	}
}

 ?>