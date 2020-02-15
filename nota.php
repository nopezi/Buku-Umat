<?php include 'config/class.php'; 

// mengambil parameter id yang ada di url
$id_pembelian = $_GET['id'];

// obyek pembelian menjalankan function ambil_pembelian
$detailpembelian = $pembelian->ambil_pembelian($id_pembelian);

$produkpembelian = $pembelian->tampil_produk_pembelian($id_pembelian);
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Nota</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
</head>
<body>


	<?php
	
	include 'navbar.php';
	?>

	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="text-center">No. INVOICE: <?php echo $detailpembelian['kode_pembelian']; ?></h3>
						</div>
						<div class="panel-body">
							 <div class="row">
 	<div class="col-md-6">
 		<h3>Pembelian</h3>
 		
 		<p>Tanggal: <?php echo $detailpembelian['tgl_beli']; ?>: </p>
 		<p>Status: <span class="btn btn-danger btn-xs"><?php echo $detailpembelian['status_pembelian']; ?></span> </p>
 		<p>
 			No. Resi : 
 			<?php if (empty($detailpembelian['no_resi'])): ?>
 				<b>Resi belum keluar</b>
 				<?php else: ?>
 					<b><?php echo $detailpembelian['no_resi']; ?></b>
 			<?php endif ?>
 		</p>
 	</div>
 	
 	<div class="col-md-6">
 		<h3>Pengiriman</h3>
 		
 		<p>Nama : <?php echo $detailpembelian["nama_penerima"]; ?></p>
 		<p>Telepon : <?php echo $detailpembelian["telp_penerima"]; ?></p>
 		<p>Alamat : <?php echo $detailpembelian["alamat_penerima"]; ?></p>
 		<p>	<?php echo $detailpembelian["kodepos_penerima"]; ?>	</p>
 		<P>
 			Pengiriiman: <?php echo $detailpembelian['paket_expedisi']; ?>,
 			<?php echo $detailpembelian['expedisi']; ?>
 		

 		</P>
 	</div>
 </div>

 <table class="table table-bordered table-hover table-striped">
 	<thead>
 		<tr>
 			<th>No.</th>
 			<th>Produk</th>
 			<th>Harga</th>
 			<th>Berat</th>
 			<th>Jumlah</th>
 			<th>Sub Berat</th>
 			<th>Sub Harga</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($produkpembelian as $key => $value): ?>
 			<tr>
 				<td><?php echo $key+=1; ?></td>
 				<td><?php echo $value['nama_produk']; ?></td>
 				<td><?php echo $value['harga_produk']; ?></td>
 				<td><?php echo $value['berat_produk']; ?></td>
 				<td><?php echo $value['jumlah_produk']; ?></td>
 				<td><?php echo $value['subberat_produk']; ?></td>
 				<td><?php echo $value['subharga_produk']; ?></td>
 			</tr>
 		<?php endforeach ?>
 	</tbody>
 	<tfoot>
 		<tr>
 			<th colspan="6">Total Belanja</th>
 			<th>Rp. <?php echo number_format($detailpembelian["total_harga"]); ?></th>
 		</tr>
 		<tr>
 			<th colspan="6">Total Ongkos Kirim</th>
 			<th>Rp. <?php echo number_format($detailpembelian["biaya_ongkir"]); ?></th>
 		</tr>
 		<tr>
 			<th colspan="6">Diskon voucher</th>
 			<th>Rp. <?php echo number_format($detailpembelian["potongan"]); ?></th>
 		</tr>
 		<tr>
 			<th colspan="6">Kode Unik</th>
 			<th>Rp.  <?php echo number_format($detailpembelian["kode_unik"]); ?></th>
 		</tr>
 		<tr>
 			<th colspan="6">Total Pembelian</th>
 			<th>Rp.  <?php echo number_format($detailpembelian["total_harga"]+$detailpembelian["biaya_ongkir"]+$detailpembelian['kode_unik']-$detailpembelian['potongan']); ?></th>
 		</tr>

 	</tfoot>

 </table>
  <div class="alert alert-info">
 	<ul>
 		<li>Mohon untuk transfer ke no. rekening berikut :  </li>
 		<ol>
 			<li>BRI :301801010924539 a.n KHOLIDUN </li>
 			<li>Mandiri :9000044713619 a.n MAESAROH </li>
 		</ol>
 		<li>NOMOR INVOICE Anda adalah ==> <b><?php echo $detailpembelian['id_pembelian']; ?></b> </li>
 		<li>NOMOR INVOICE digunakan untuk CEK PESANAN!</li>
 	</ul>
 </div>
 <?php if ($detailpembelian['status_pembelian']!="Lunas"): ?>
  	<div class="pull-right">
 		<a href="konfirmasi.php?id=<?php echo $detailpembelian['kode_pembelian']; ?>" target="_blank" class="btn btn-success">
 			Konfirmasi
 		</a>
 	</div>
 <?php endif ?>

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

