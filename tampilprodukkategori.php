<?php 
include 'config/class.php';
$dataproduk = $produk->tampil_produkkategori($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Kategori Produk</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/logo/1.ico" type="image/ico" sizes="16x16">
</head>
<body>



	<?php
	
	include 'navbar.php';
	?>


	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">

					<!-- awal produk kategori -->
					<div class="produk">
						<div class="row">
							<div class="box-header">
								<h3 class="box-title">Produk Kategori</h3>
							</div>

							<?php foreach ($dataproduk as $key => $value): ?>			
								<div class="col-md-3">
									<div class="thumbnail">
										<div class="image-product" style="">

											<?php $data_foto = $foto_produk->foto_produk($value['id_produk']);
										// if(!empty($data_foto))
										// {
											$nama_foto = $data_foto['0']['nama_foto'];
										// }else
										// {
										// 	$nama_foto = "default.jpg";
										// }
											?>
											<div style="height: 170px;">
										<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>">	    	
												<img src="assets/foto_produk/<?php echo $nama_foto; ?>" width="150px" class="img-rounded">
										</a>
											</div>
										</div>
										<div class="caption text-center">
											<h3 class="title-product" style="height: 40px;"> 
												<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>">
													<?php echo substr($value['nama_produk'], 0, 30);  ?>
												</a>
											</h3>
											<p>
												<span class="price-product"> Rp. <?php echo $value['harga_produk']; ?>,- </span>
											</p>

											<p>
												<a href="beli.php?id=<?= $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
												<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
											</p>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>




					<!-- akhir produk kategori -->	

					<!-- awal slider produk terbaru -->
					<?php include 'produkterbaru.php'; ?>
					<!-- akhir slider produk terbaru-->

				</div>
				<div class="col-md-3 col-md-pull-9">
					<?php include 'sidebar.php'; ?>
				</div>
			</div>
			<!-- akhir sidebar testimoni -->
		</div>
	</main>

	<?php
	include 'footer.php';
	?>


</body>
</html>
