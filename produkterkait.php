<div class="box">
	<div class="box-header">
		<h3 class="box-title">Produk Terkait</h3>
		<div class="box-tools" id="letaknavproduk"></div>
	</div>
	<div class="box-body">
		<div class="owl-carousel slider-produk owl-theme">
			<?php foreach ($dataprodukkategori as $key => $value): ?>

				<?php if ($dataproduk['id_produk']!=$value['id_produk']): ?>
					<div class="text-center">
					<div class="image-product">

						<?php 
						$data_foto = $foto_produk->foto_produk($value['id_produk']);
						$nama_foto = $data_foto['0']['nama_foto']; 
						?>
						<div>
						    <a href="detailproduk.php?id=<?= $value['id_produk']; ?>">
							<img src="assets/foto_produk/<?php echo $nama_foto; ?>" width="70px" class="img-rounded">
							</a>
						</div>
					</div>
					<div class="caption text-center">
						<h3 class="title-product" style="height: 30px;"> 
							<a href="detailproduk.php?id=<?= $value['id_produk']; ?>">
								<?php echo substr($value['nama_produk'], 0, 20);  ?>
							</a>
						</h3>
						<p>
							<span class="price-product"> Rp. <?php echo $value['harga_produk']; ?>,- </span>
						</p>

						<p>
							<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
							<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
						</p>
					</div>
				</div>
				<?php endif ?>

			<?php endforeach ?>
		</div>
	</div>
</div>