<?php include 'config/class.php';
if(isset($_SESSION['keranjang'])){

$data_keranjang = $keranjang->tampil_keranjang();
}else{
	$data_keranjang=array();
}

// jika ada parameter hapus di url maka
if(isset($_GET['hapus'])){


	$keranjang->hapus_keranjang($_GET['hapus']);
	echo "<script>alert('Produk berhasil di hapus dari keranjang');location='keranjang.php';</script>";
}


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
				
				<!-- awal slider produk -->
				<div class="box table-responsive">
					<div class="box-header">
						<h3 class="box-title">Keranjang</h3>
					</div>
					<div class="box-body">
						<?php if(empty($data_keranjang)): ?>
							<div class="alert alert-info">Keranjang masih kosong, silakan mengisi keranjang terlebih dahulu!</div>
						<?php else: ?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No.</th>
									<th>Produk</th>
									<th>Jumlah</th>
									<th>Berat</th>
									<th>Harga</th>
									<th>Sub Berat</th>
									<th>Sub Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_keranjang as $key => $value): ?>
									
								<tr>
									<td><?php echo $key+1; ?></td>
									<td><?php echo $value['nama_produk'] ?></td>
									<td><?php echo $value['jumlah_beli']; ?></td>
									<td><?php echo $value['berat_produk']; ?> gram/halaman</td>
									<td><?php echo $value['harga_potongan']; ?></td>
									<td><?php echo $value['berat_produk'] * $value['jumlah_beli']; ?></td>
									<td><?php echo $value['harga_potongan'] * $value['jumlah_beli']; ?></td>
									<td>
										<a href="keranjang.php?hapus=<?php echo $value['id_produk'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<a href="produk.php" class="btn btn-primary">Belanja lagi</a>
						<a href="checkout.php" class="btn btn-color pull-right"> Check Out</a>
					<?php endif ?>
					</div>
				</div>
				<!-- akhir slider produk -->

		</div>
			<div class="col-md-3 col-md-pull-9">
				<!-- awal sidebar kategori -->
				<?php include 'sidebar.php'; ?>
				
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