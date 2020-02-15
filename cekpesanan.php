<?php include 'config/class.php'; 
$dataproduk = $produk->tampil_produk();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Buku Umat</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
</head>
<body>



	<?php
	$aktif = "cekpesanan";
	include 'navbar.php';
	?>

	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">

					<!-- awal slider produk -->
					<?php include 'produkterbaru.php'; ?>
					<!-- akhir slider produk -->

				</div>
				<div class="col-md-3 col-md-pull-9">
					<!-- awal sidebar kategori -->

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