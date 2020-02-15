<?php 
$data_produk =$produk->tampil_produk_terbaru();
 ?>
<div class="box">
						<div class="box-header">
							<h3 class="box-title">Produk Terbaru</h3>
							<div class="box-tools" id="letaknavproduk"></div>
						</div>
						<div class="box-body">
							<div class="owl-carousel slider-produk owl-theme">
								<?php foreach ($data_produk as $key => $value): ?>

									<div class="text-center">
										<div class="image-product">

											<?php $data_foto = $foto_produk->foto_produk($value['id_produk']);

												if(!empty($data_foto))
												{
													$nama_foto = $data_foto['0']['nama_foto'];
												}else
												{
													$nama_foto = "default.jpg";
												}
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
												<span class="price-product"> Rp. <?php echo number_format($value['harga_produk']); ?>,- </span>
											</p>

											<p>
												<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
												<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
											</p>
										</div>
									</div>

								<?php endforeach ?>
							</div>
						</div>
					</div>