<?php 
$datakategori = $kategori->tampil_kategori();
?>
<h2>Tambah Data Produk</h2>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-md-2 control-label">Kategori</label>
		<div class="col-md-8">
			<select class="form-control" name="id_kategori" >
				<option>Pilih Kategori</option>
				<?php foreach ($datakategori as $key => $value): ?>

					
					<option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
					
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">ISBN</label>
		<div class="col-md-8">
			<input type="text" name="isbn" class="form-control">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-2 control-label">Judul Buku</label>
		<div class="col-md-8">
			<input type="text" name="judul" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Penulis</label>
		<div class="col-md-8">
			<input type="text" name="penulis" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Penerbit</label>
		<div class="col-md-8">
			<input type="text" name="penerbit" class="form-control">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-2 control-label">Jenis Cover</label>
		<div class="col-md-8">
			<input type="text" name="cover" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Berat Produk</label>
		<div class="col-md-3">
			<input type="text" name="berat" class="form-control">
		</div>
		gram/tebal
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Stok Produk</label>
		<div class="col-md-2">
			<input type="number" name="stok_produk" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Harga Produk</label>
		<div class="col-md-8">
			<input type="number" class="form-control" name="hp" id="hp">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Diskon</label>
		<div class="col-md-2">
			<input type="text" class="form-control" id="potongan" name="potongan">
		</div>
		%
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">nominal</label>
		<div class="col-md-8">
			<input type="number" class="form-control" id="nominal" name="nominal">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Harga Potongan</label>
		<div class="col-md-8">
			<input type="number" class="form-control" id="hpotongan" name="hpotongan">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Sinopsis</label>
		<div class="col-md-8">
			<textarea name="sinopsis" class="form-control ckeditor" rows="8"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Foto</label>
		<div class="col-md-8">
			<input type="file" name="foto" class="form-control">
		</div>
	</div>
	<div class="co-md-8 col-md-offset-2">
		
		<button name="simpan" class="btn btn-primary">Simpan</button>
	</div>

</form>
<script >
	$(document).on("change","#potongan",function(){
		var main = $('#hp').val();
		var disc = $('#potongan').val();
		var dec = (disc/100).toFixed(2);

		var mult = main*dec;
		var discont = main-mult;
		var nom = main-discont;
		$('#nominal').val(nom);
		$('#hpotongan').val(discont);
		
	});
</script>


<?php 
if(isset($_POST['simpan']))
{
	$produk->simpan_produk($_POST['id_kategori'], $_POST['isbn'],  $_POST['judul'], $_POST['penulis'], $_POST['penerbit'],  $_POST['cover'], $_POST['berat'], $_POST['stok_produk'], $_POST['hp'], $_POST['potongan'], $_POST['nominal'], $_POST['hpotongan'], $_POST['sinopsis'], $_FILES['foto']);

	echo "<script>alert('Data Produk Berhasil disimpan');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
} 

?>




