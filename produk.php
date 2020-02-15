<?php
include 'config/class.php';

$limit = "8";

if(isset($_GET['halaman'])){
    $page = ($_GET['halaman']-1)*$limit;
}else{
    $page=0;    
}


$tampil = $produk->paginasi_tampil();
$halaman = $produk->pagination();


// jika ada parameter cari, maka
if(isset($_GET['cari'])){
	$dataproduk = $produk->cari_produk($_GET['cari']);
}else{
    $dataproduk = $produk->tampil_produk($page,$limit);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Produk</title>
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
	<link rel="icon" href="assets/logo/1.ico" type="image/ico" sizes="16x16">
</head>
<body>
	<?php
	$aktif = "produk";
	include 'navbar.php';
	?>

    
	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">

					<!-- awal semua produk -->
					<div class="produk">
						<?php if(isset($_GET['cari'])): ?>
						    <?php if(!empty($dataproduk)): ?>
						<div class="row">
							<div class="box-header">
								<h3 class="box-title text-center">Semua Produk</h3>
								<hr>
							</div>

								<?php foreach ($dataproduk as $key => $value): ?>
											
										
								<div class="col-md-3">
									<div class="thumbnail">
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
											<div style="height: 170px;">
											    <a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" ?>	
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
												<span class="price-product"> Rp. <?php echo number_format($value['harga_produk']); ?>,- </span>
											</p>

											<p>
												<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
												<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
											</p>
										</div>
									</div>
								</div>
								
							<?php endforeach ?>	
						</div>
						<?php else:?>
						    <div class="box-header">
								<h3 class="box-title text-center">Produk Tidak Ditemukan</h3>
								<hr>
							</div>
						<?php endif ?>
						<?php else: ?>
						    <div class="row">
							<div class="box-header">
								<h3 class="box-title text-center">Semua Produk</h3>
								<hr>
							</div>

								<?php foreach ($dataproduk as $key => $value): ?>
											
										
								<div class="col-md-3">
									<div class="thumbnail">
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
											<div style="height: 170px;">
											    <a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" ?>	
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
												<span class="price-product"> Rp. <?php echo number_format($value['harga_produk']); ?>,- </span>
											</p>

											<p>
												<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
												<a href="detailproduk.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-color">Detail</a>
											</p>
										</div>
									</div>
								</div>
								
							<?php endforeach ?>	
						</div>
					    <?php endif ?>
					</div>

					
					<?php if(!isset($_GET['cari']) AND !empty($dataproduk)): ?>
					<div class="text-center">
						
						<ul class="pagination">
							<?php if (isset($_GET['halaman'])): ?>
								<?php if ($_GET['halaman']!=1): ?>
									<li>
										<a href="?halaman=<?php echo $_GET['halaman']-1; ?>"><i class="fa fa-arrow-left"></i></a>
									</li>
								<?php endif ?>
								<?php else: ?>
									<li>
										<a href="?halaman=2"><i class="fa fa-arrow-left"></i></a>
									</li>	
								<?php endif ?>
							<?php for ($i=1; $i<=$halaman ; $i++): ?>
								<li>
									<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
								</li>
							<?php endfor ?>
							<?php if (isset($_GET['halaman'])): ?>
								<?php if ($_GET['halaman']!=$halaman): ?>
									<li>
										<a href="?halaman=<?php echo $_GET['halaman']+1; ?>"><i class="fa fa-arrow-right"></i></a>
									</li>
								<?php endif ?>
								<?php else: ?>
									<li>
										<a href="?halaman=2"><i class="fa fa-arrow-right"></i></a>
									</li>	
								<?php endif ?>
							</ul>

						</div>
                    <?php endif ?>



						<!-- akhir semua produk -->	

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
