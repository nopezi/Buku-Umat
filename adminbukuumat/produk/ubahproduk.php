<h2>Ubah Data Produk</h2>
<?php 
$id_produk = $_GET['id'];
$dataproduk = $produk->ambil_produk($id_produk);

$datakategori = $kategori->tampil_kategori();
?>



<form method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-md-2 control-label">Kategori</label>
		<div class="col-md-8">
			<select class="form-control" name="id_kategori">
				<option>Pilih Kategori</option>
				<?php foreach ($datakategori as $key => $value): ?>

					<option value="<?php echo $value['id_kategori']; ?>"
						<?php if($value["id_kategori"]==$dataproduk["id_kategori"]) { echo "selected";}?>>
						<?php echo $value['nama_kategori']; ?>
					</option>
				<?php endforeach ?>

			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">ISBN</label>
		<div class="col-md-8">
			<input type="text" name="isbn" class="form-control" value="<?php echo $dataproduk['isbn']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Nama Produk</label>
		<div class="col-md-8">
			<input type="text" name="nama" class="form-control" value="<?php echo $dataproduk['nama_produk']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Penulis</label>
		<div class="col-md-8">
			<input type="text" name="penulis" value="<?php echo $dataproduk['penulis']; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Penerbit</label>
		<div class="col-md-8">
			<input type="text" name="penerbit" class="form-control" value="<?php echo $dataproduk['penerbit']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Jenis Cover</label>
		<div class="col-md-8">
			<input type="text" name="cover" class="form-control" value="<?php echo $dataproduk['jenis_cover']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Harga</label>
		<div class="col-md-8">
			<input type="number" name="harga" class="form-control" value="<?php echo $dataproduk['harga_produk']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Berat</label>
		<div class="col-md-8">
			<input type="number" name="berat" value="<?php echo $dataproduk['berat_produk']; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Stok</label>
		<div class="col-md-8">
			<input type="number" name="stok" value="<?php echo $dataproduk['stok_produk']; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Diskon</label>
		<div class="col-md-2">
			<input type="number" name="diskon" class="form-control" value="<?php echo $dataproduk['potongan']; ?>"  > 
		</div>
		%
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Anda Hemat</label>
		<div class="col-md-8">
			<input type="number" name="hemat" class="form-control" value="<?php echo $dataproduk['nominal']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Harga Promo</label>
		<div class="col-md-8">
			<input type="number" name="hargapromo" class="form-control" value="<?php echo $dataproduk['harga_potongan']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Sinopsis</label>
		<div class="col-md-8">
			<textarea name="sinopsis" class="form-control ckeditor" rows="10"><?php echo $dataproduk['sinopsis']; ?></textarea>
		</div>
	</div>
	<div class="col-md-8 col-md-offset-2">

		<button class="btn btn-primary" name="ubah">Update</button>
	</div>

</form>





<?php 
if (isset($_POST['ubah'])) 
{
	$produk->ubah_produk($_POST['id_kategori'], $_POST['isbn'], $_POST['nama'], $_POST['penulis'], $_POST['penerbit'], $_POST['cover'], $_POST['harga'], $_POST['berat'], $_POST['stok'], $_POST['diskon'], $_POST['hemat'], $_POST['hargapromo'], $_POST['sinopsis'], $id_produk);

	echo "<script>alert('Produk Terubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}



?>