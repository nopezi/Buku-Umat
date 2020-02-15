
<?php include 'config/class.php'; 
$dataproduk = $produk->tampil_produk();
?>
 <!-- belajar git hub -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Buku Umat</title>
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

	$aktif = "home";
	include 'navbar.php';
	?>

	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">
					<!-- area slider -->
					<?php $datamedia = $media->tampil_media(); ?>
					<div class="owl-carousel slider-utama">
						<?php foreach ($datamedia as $key => $value): ?>
							<div>
								<?php $namafoto = $value['foto_media']; ?>

								

								<img src="assets/foto_media/<?php echo $namafoto; ?>">

							
							</div>
						<?php endforeach ?>
					</div>
					
					<!-- akhir slider -->

					<!-- awal infobox -->
					<div class="infobox">
						<div class="row">
							<div class="col-md-4 infobox-item text-center text-center">
								<h3 class="infobox-title">Garansi uang kembali</h3>
								<span class="infobox-text">Uang kembali 100 persen bila buku rusak dari penerbit atau produk tidak sesuai gambar iklan</span>
							</div>
							<div class="col-md-4 infobox-item text-center">
								<h3 class="infobox-title">Gratis Ongkir</h3>
								<span class="infobox-text">Gratis ongkir Jogja, Solo dan jabodetabek dengan pilihan ekspedisi J&T, JNE dan Pos Kilat dengan minimal pembelian harga produk Rp. 150.000</span>
							</div>
							<div class="col-md-4 infobox-item text-center">
								<h3 class="infobox-title">Diskon Tiap Bulan</h3>
								<span class="infobox-text">Tiap bulan diskon harga buku tertentu lebih murah dari harga normal</span>
							</div>
						</div>

					</div>

					<!-- akhir infobox -->

					<!-- awal slider produk terbaru -->
					<?php include 'produkterbaru.php'; ?>
					<!-- akhir slider produk terbar-->

					
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