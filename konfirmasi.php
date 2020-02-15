<?php include 'config/class.php'; 
$id_pembelian = $_GET['id'];
// obyek pembelian menjalankan function ambil_pembelian
$detailpembelian = $pembelian->cek_pembelian($id_pembelian);

$produkpembelian = $pembelian->tampil_produk_pembelian($detailpembelian['id_pembelian']);
// $data = $pembelian->ambil_pembelian($id_pembelian);
if($detailpembelian['status_pembelian']=="Lunas"){
	echo "<script>location='nota.php?id=".$id_pembelian."';</script>";
}
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
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/logo/1.ico" type="image/ico" sizes="16x16">
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
					<?php if (empty($detailpembelian)): ?>
						<div class="alert alert-info">
							No. Invoice tidak ditemukan, silakan melakukan pembelian terlebih dahulu.
						</div>
						<?php else: ?>

			
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="text-center">Nota Pembelian Anda</h3>
						</div>
						<div class="panel-body">
							 <div class="row">
 	<div class="col-md-6">
 		<h3>Pembelian</h3>
 		<p>NO: <?php echo $detailpembelian['kode_pembelian']; ?></p>
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
 			<th colspan="6">Potongan</th>
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
 		<li>Mohon untuk transfer ke no. rekening berikut : </li>
 		<ol>
 			<li>BRI : 301801010924539 a.n KHOLIDUN</li>
 			<li>Mandiri : 9000044713619 a.n MAESAROH</li>
 		</ol>
 		<li>NOMOR INVOICE Anda adalah <b><?php echo $detailpembelian['id_pembelian']; ?></b></li>
 		<li>NOMOR INVOICE digunakan untuk mengecek status pemesanan Anda!</li>
 	</ul>
 </div>

						</div>
					</div>
				
		
							<h2>Konfirmasi Pembayaran</h2>
					<hr>
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" name="nama" class="form-control">
						</div>
						<div class="form-group">
							<label>Bank Tujuan Transfer</label>
							<select class="form-control" name="btt">
								<option value="">Pilih Bank Tujuan</option>
								<option value="bri">BRI 301801010924539 a.n Kholidun</option>
								<option value="mandiri">Mandiri 9000044713619 a.n Maesaroh</option>
							</select>
						</div>
						<div class="form-group">
							<label>Besar Pembayaran</label>
							<input type="number" name="bp" class="form-control">
						</div>
						<div class="form-group">
							<label>Tanggal Pembayaran</label>
							<input type="date" name="tp" class="form-control">
						</div>
						<div class="form-group">
							<label>Bukti Transfer</label>
							<input type="file" name="bukti" class="form-control">
						</div>

						
						<button name="kirim" class="btn btn-color">Kirim</button>
					</form>
					<?php 
					if(isset($_POST["kirim"]))
					{
						$namabukti = $_FILES['bukti']['name'];
						$lokasibukti = $_FILES['bukti']['tmp_name'];

						$id_konfirmasi = $konfirmasi->simpan_konfirmasi($_POST['nama'], $_POST['btt'],  $_POST['bp'], $_POST['tp'], $lokasibukti,$namabukti, $_GET['id']);

						echo "<script>alert('Terima kasih Anda sudah konfirmasi, barang segera kami kirim!');</script>";
						echo "<script>location='detail_konfirmasi.php?id=".$id_konfirmasi."';</script>";
					}

					?>
				
					<?php endif ?>
				</div>
				<div class="col-md-3 col-md-pull-9">

					<?php include 'sidebar.php'; ?>
				</div>
			</div>
			
		</div>
	</div>
</div>
</main>
<hr>
<?php
include 'footer.php';
?>


</body>
</html>