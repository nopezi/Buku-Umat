<?php 
include 'config/class.php';

$dataproduk = $produk->ambil_produk($_GET['id']);
$data_foto = $foto_produk->foto_produk($_GET['id']);
$dataprodukkategori = $produk->tampil_produkkategori($dataproduk['id_kategori']);
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
	$aktif = "produk";
	include 'navbar.php';
	?>


	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">
					<div class="produk">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Detail Produk</h3>
							</div>
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="owl-carousel slider-produk-detail">
											<?php if (empty($data_foto)): ?>
												<div class="text-center">
													<div class="image-product">
														<img src="assets/foto_produk/default.jpg">
													</div>
												</div>
												<?php else: ?>
													<?php foreach ($data_foto as $key => $value): ?>
														<div class="text-center">
															<div class="image-product">
																<img src="assets/foto_produk/<?php echo $value['nama_foto']; ?>">
															</div>
														</div>
													<?php endforeach ?>
												<?php endif ?>
											</div>
										</div>					
										<div class="col-md-6">
											<h3><?php echo $dataproduk['nama_produk']; ?></h3>
											<hr>
											<h3 class="text-danger">Rp. <?php echo number_format($dataproduk['harga_produk']); ?>
										</h3>
										<br>
										
										<table width="100%" height="50px">
											<style>
												th{
													width: 30%;

												}
												td{

													height: 30px;
												}
												td .titikdua{
													width: 30px;
												}
											</style>
											<tr>
												<th ><b>ISBN </b></td>
												<td class="titikdua" >: </td>
												<td> <?php echo $dataproduk['isbn'] ?></td>
											</tr>
											<tr>
												<th ><b>Penulis </b></td>
												<td class="titikdua" >: </td>
												<td><?php echo $dataproduk['penulis'] ?></td>
											</tr>
											<tr>
												<th ><b>Penerbit </b></td>
												<td class="titikdua"> : </td>
												<td><?php echo $dataproduk['penerbit'] ?></td>
											</tr>
											<tr>
												<th ><b>Jenis Cover </b></td>
												<td class="titikdua"> : </td>
												<td><?php echo $dataproduk['jenis_cover'] ?></td>
											</tr>
											<tr>
												<th ><b>Diskon </b> </td>
												<td> : </td>
												<td><?php echo $dataproduk['potongan'] ?> %</td>
											</tr>
										  	<tr>
										  		<th ><b>Berat </b></td>
										  		<td class="titikdua"> : </td>
										  		<td> <?php echo $dataproduk['berat_produk']; ?> gr</td>
										  	</tr>
										  	<tr>
										  		<th ><b>Stok  </b></td>
										  		<td class="titikdua"> : </td>
										  		<td><?php echo $dataproduk['stok_produk']; ?></td>
										  	</tr>
										 
										</table>

										<?php if ($dataproduk['stok_produk']==0): ?>
											<div class="alert alert-info">Stok Habis</div>
											<?php else: ?>
												<form class="form-inline" method="post">
													<div class="form-group">
														<input type="number" name="jumlah_beli" class="form-control" placeholder="Jumlah Beli">
													</div>
													<button type="submit" class="btn btn-primary" name="tambah_keranjang">Tambah Keranjang</button>

												</form>

												<?php 
												if(isset($_POST['tambah_keranjang'])){
													$keranjang->tambah_keranjang($_GET['id'], $_POST['jumlah_beli']);
													echo "<script>alert('Data berhasil masuk Keranjang'); location='keranjang.php';</script>";
												}
												?>



											<?php endif ?>



										</div>
										<hr>
										<div class="col-md-12" >
											
												<h3>Sinopsis</h3>
											
												<?php echo $dataproduk['sinopsis']; ?>
											
										</div>
									</div>
								</div>
							</div>

						</div>

						<?php include 'produkterkait.php'; ?>
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
