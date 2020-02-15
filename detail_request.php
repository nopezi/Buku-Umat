<?php include 'config/class.php'; 

$ambil = $request->ambil_request($_GET['id']);

echo "<pre>";
print_r($ambil);
echo "</pre>";

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Request</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
</head>
<body>


	<?php
	$aktif = "request";
	include 'navbar.php';
	?>

	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="text-center">Request Anda</h3>
						</div>
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr><th>Nama</th>
										<td><?php echo $ambil['nama_request']; ?></td>
									</tr>
									<tr>
										<th>Hp</th>
										<td><?php echo $ambil['hp_request']; ?></td>
									</tr>
									<tr>
										<th>Judul Buku</th>
										<td><?php echo $ambil['judul_request']; ?></td>
									</tr>
									<tr>
										<th>Penulis</th>
										<td><?php echo $ambil['penulis']; ?></td>
									</tr>
									<tr>
										<th>Penerbit</th>
										<td><?php echo $ambil['penerbit']; ?></td>
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

