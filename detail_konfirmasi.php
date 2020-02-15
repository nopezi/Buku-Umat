<?php include 'config/class.php'; 
$ambil = $konfirmasi->ambil_pembayaran($_GET['id']);
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Konfirmasi</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
</head>
<body>


	<?php
	$aktif = "konfirmasi";
	include 'navbar.php';
	?>

	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="text-center">Konfirmasi Anda</h3>
						</div>
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr><th>Nama Lengkap</th>
										<td><?php echo $ambil['nama_akun']; ?></td>
									</tr>
									<tr>
										<th>Bank Tujuan Transfer</th>
										<td><?php echo $ambil['nama_bank']; ?></td>
									</tr>
									<tr>
										<th>Besar Pembayaran</th>
										<td><?php echo $ambil['jumlah_transfer']; ?></td>
									</tr>
									
									<tr>
										<th>Tanggal Pembayaran</th>
										<td><?php echo $ambil['tgl_transfer']; ?></td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-md-pull-9">
					<!-- awal sidebar kategori -->
					<?php 
					include 'sidebar.php';
					?>
					<!-- akhir sidebar kategori -->
				</div>
			</div>
		</div>
	</main>

	<?php
	include 'footer.php';
	?>


</body>
</html>

