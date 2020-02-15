<?php include 'config/class.php'; 
$datarequest = $request->tampil_request();

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
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
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
					<h2>Data Request Buku Anda</h2>
					<hr>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Anda</th>
								<th>Nomor HP</th>
								<th>Judul Buku</th>
								<th>Penulis</th>
								<th>Penerbit</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($datarequest as $key => $value): ?>

								<tr>
									<td><?php echo $key+1; ?></td>
									<td><?php echo $value['nama_request']; ?></td>
									<td><?php echo $value['hp_request']; ?></td>
									<td><?php echo $value['judul_request']; ?></td>
									<td><?php echo $value['penulis']; ?></td>
									<td><?php echo $value['penerbit']; ?></td>

								</tr>
							<?php endforeach ?>
						</tbody>
					</table>


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