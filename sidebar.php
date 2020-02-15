

<!-- awal sidebar kategori -->
<div class="panel panel-color">
	<div class="panel-heading">
		<h3 class="panel-title">
			<i class="fa fa-bars"> Kategori</i>
		</h3>
	</div>
	<div class="list-group">
		<?php $datakategori = $kategori->tampil_kategori(); ?>
		<?php foreach ($datakategori as $key => $value): ?>
			
			<a href=" tampilprodukkategori.php?id=<?php echo $value['id_kategori']; ?>" class="list-group-item"><i class="fa fa-chevron-circle-right" ></i>  <?php echo $value["nama_kategori"]; ?></a>
		<?php endforeach ?>
		
	</div>
</div>
<!-- akhir sidebar kategori -->

<!-- awal sidebar terlaris -->
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Terlaris</h3>
		<div class="box-tools" id="letaknavterlaris"></div>
	</div>
	<div class="box-body">
		<?php $produkterlaris = $produk->tampil_produk_terlaris(); ?>
			
		<div class="owl-carousel owl-theme slider-terlaris">
			<?php foreach ($produkterlaris as $key => $value): ?>
				<?php 
				$data_foto = $foto_produk->foto_produk($value['id_produk']);
				$nama_foto = $data_foto['0']['nama_foto'];
			 ?>
				<div>
					<div class="image-product">
					    <a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>">
						<img src="assets/foto_produk/<?php echo $nama_foto ?>">
					   </a>
					</div>
					<h3 class="title-product">
					    
						<a href="detailproduk.php?id=<?php echo $value['id_produk'];?>"><?php echo $value['nama_produk']; ?>
						</a>
					</h3>
					<span class="price-product">Rp. <?php echo number_format($value['harga_produk'], "0", ",", "."); ?></span>
					<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
					<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
				</div>
			<?php endforeach ?>

		
		</div>
	</div>
</div>
<!-- akhir sidebar terlaris -->

<!-- awal sidebar testimoni -->

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Testimoni</h3>
	</div>
	<div class="box-body">
		<?php $datatestimoni = $testimoni->tampil_testimoni(); 
		
		?>

		<div class="owl-carousel owl-theme slider-testimoni">
			<?php foreach ($datatestimoni as $key => $value): ?>
				<div class="text-center">
					<img src="assets/foto_testimoni/<?php echo $value['foto_testimoni']; ?>" class="testimoni-image img-circle">	
					<h4 class="testimoni-title"><?php echo $value['nama_testimoni']; ?></h4>
					<p class="testimoni-content">
						<?php echo $value['isi_testimoni']; ?>
					</p>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
