<?php 
	$datafoto = $foto_produk->foto_produk($_GET['id']);
?>

 <div class="row">
 	<?php foreach ($datafoto as $key => $value): ?>
 		
 	<div class="col-md-3">
 		<div>
 			<a href="index.php?halaman=fotoproduk&id=<?php echo $_GET['id']; ?>&id_foto=<?php echo $value['id_foto'] ?>" title="Hapus foto ini" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></a>


 			<img src="../assets/foto_produk/<?php echo $value['nama_foto']; ?>" width="100%" clas="img-rounded">
 		</div>
 	</div>
 	<?php endforeach ?>

 </div>
 <br>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
	<div class="form-group">
		
	<label class="col-md-2">Tambah Foto</label>
	<div class="col-md-8">
		
	<input type="file" name="foto_produk" class="form-control">
	</div>
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>	
</form>





 <?php 
if(isset($_GET['id_foto']))
{
	$foto_produk->hapus_foto_produk($_GET['id_foto']);
	$id_produk = $_GET['id'];
	echo "<script>location='index.php?halaman=fotoproduk&id=$id_produk';</script>";
}

if(isset($_POST['simpan']))
{
	$foto_produk->tambah_foto_produk($_FILES['foto_produk'], $_GET['id']);
	$id_produk = $_GET['id'];
	echo "<script>location='index.php?halaman=fotoproduk&id=$id_produk';</script>";
}


  ?>