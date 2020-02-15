<?php include 'config/class.php'; ?>

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
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/logo/1.ico" type="image/ico" sizes="16x16">
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
					<h2>Input Data Request Buku</h2>
					<hr>
					<form method="post">
						<div class="form-group">
							<label>Nama </label>
							<input type="text" name="nama" class="form-control">
						</div>
						<div class="form-group">
							<label>HP</label>
							<input type="number" name="hp" class="form-control">
						</div>
						<div class="form-group">
							<label>Judul Buku</label>
							<input type="text" name="judul" class="form-control">
						</div>

						<div class="form-group">
							<label>Penulis</label>
							<input type="text" name="penulis" class="form-control">
						</div>

						<div class="form-group">
							<label>Penerbit</label>
							<input type="text" name="penerbit" class="form-control">
						</div>


						<button name="request" class="btn btn-color">Kirim Request</button>
					</form>
					<hr>
					<?php 
					if(isset($_POST["request"]))
					{
						$id_request = $request->simpan_request($_POST['nama'], $_POST['hp'],  $_POST['judul'], $_POST['penulis'], $_POST['penerbit']);



						echo "<script>alert('Permintaan buku Anda segera kami proses, kami akan menghubungi Anda segera!');</script>";
						echo "<script>location='detail_request.php?id=".$id_request."';</script>";
					}

					?>
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

