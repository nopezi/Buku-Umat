<?php include "config/class.php"; 

$data_keranjang = $keranjang->tampil_keranjang();

if(isset($_POST['gunakan'])){
	$datavoucher = $voucher->cari_voucher($_POST['voucher']);
	if(empty($datavoucher)){
		echo "<script>alert('Voucher tidak ada!');location='checkout';</script>";
	}else{
		$potongan = $datavoucher['potongan'];
	}
}else{
	$potongan = "";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Check Out</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="assets/dist/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

</head>
<body>
	<?php include 'navbar.php'; ?>
	
	<main class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-md-push-3">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Belanja</h3>			
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No. </th>
										<th>Produk</th>
										<th>Jumlah</th>
										<th>Berat</th>
										<th>Harga</th>
										<th>Subberat</th>
										<th>Subharga</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$total_beli = 0;
									$total_belanja = 0; 
									$total_berat = 0;
									?>

									<?php foreach ($data_keranjang as $key => $value): ?>
										<tr>
											<td><?php echo $key+1; ?></td>
											<td><?php echo $value['nama_produk']; ?></td>
											<td><?php echo $value['jumlah_beli']; ?></td>
											<td><?php
											$sub_berat = $value['jumlah_beli']* $value['berat_produk']; 
											echo $sub_berat;
											?>
										</td>
										<td><?php echo $value['harga_potongan']; ?></td>
										<td><?php echo $value['berat_produk']*$value['jumlah_beli']; ?></td>
										<td><?php $sub_harga =  $value['harga_potongan']*$value['jumlah_beli'];
										echo $sub_harga;
										?>
									</td>
									<?php 
									$total_beli+=$value['jumlah_beli']; 
									$total_belanja+=$sub_harga;
									$total_berat+=$sub_berat;
									?>

								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="6">Total Belanja</th>
								<th><?php echo $total_belanja; ?></th>
							</tr>
							<tr>
								<th colspan="6">Total Ongkir</th>
								<th id="total_ongkir"></th>
							</tr>
							<tr>
								<th colspan="6">Potongan</th>
								<th id="potongan"><?php echo $potongan; ?></th>
							</tr>
							<tr>
								<th colspan="6">Total Bayar/tagihan</th>
								<th id="total_bayar"></th>
							</tr>
						</tfoot>
					</table>

					<form method="POST" class="form-inline">
						<div class="form-group">
							<input type="text" name="voucher" class="form-control" placeholder="Gunakan Voucher Belanja">
						</div>
						<button class="btn btn-primary" name="gunakan">Gunakan</button>
					</form>
					<br>
					<h3 class="panel-title">Check Out</h3>
					
					<hr>
					<form method="post">

						<div class="col-md-3">	
							<div class="form-group">
								<label>Provinsi</label>
								<select class="form-control" name="provinsi"></select>
							</div>
						</div>
						<div class="col-md-3">				
							<div class="form-group">
								<label>Kota</label>
								<select class="form-control" name="kota"></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Ekspedisi</label>
								<select class="form-control" name="ekspedisi"></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Ongkir</label>
								<select class="form-control" name="ongkir"></select>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Penerima</label>
								<input type="text"  class="form-control" name="nama_penerima" required="true">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Telepon Penerima</label>
								<input type="text"  class="form-control" name="telepon_penerima" required="true">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Alamat Email</label>
								<input type="text"  class="form-control" name="email" required="true">
							</div>
						</div>

						<div class="col-md-12">

							<div class="form-group">
								<label>Alamat Penerima</label>
								<textarea class="form-control" name="alamat_penerima" required="true"></textarea>
							</div>
						</div>

						<input type="text" name="potongan" hidden="" value="<?php echo $potongan; ?>">
						<input type="text" name="total_belanja" value="<?php echo $total_belanja; ?>" class="hidden">
						<input type="text" name="total_berat" value="<?= $total_berat; ?>" class = "hidden">
						<input type="text" name="nama_provinsi" placeholder="Nama Provinsi" class = "hidden">
						<input type="text" name="nama_kota" placeholder="Nama Kota" class = "hidden">
						<input type="text" name="tipe" placeholder="Tipe" class = "hidden">
						<input type="text" name="kodepos" placeholder="Kode Pos" class = "hidden">
						<input type="text" name="nama_ekspedisi" placeholder="Nama Ekspedisi" class = "hidden">
						<input type="text" name="nama_paket" placeholder="Nama Paket" class = "hidden">
						<input type="text" name="biaya_paket" placeholder="Biaya Paket" class = "hidden">
						<input type="text" name="lama_paket" placeholder="Lama Paket" class = "hidden">

						<div class="col-md-12">
							<button class="btn btn-primary" name="checkout">Check Out</button>
						</div>

					</form>
					<?php 
					if(isset($_POST["checkout"])){
						$tgl_beli = date("Y-m-d-H:i:s");
						$id_pembelian = $pembelian->tambah_pembelian($tgl_beli, $total_beli, $_POST['total_berat'], $_POST['total_belanja'], $_POST['biaya_paket'], $_POST['nama_ekspedisi'], $_POST['nama_paket'],$_POST['nama_penerima'], $_POST['alamat_penerima'], $_POST['telepon_penerima'], $_POST['email'], $_POST['kodepos'], 'Belum Lunas', 'pending', $_POST['potongan']);

						echo "<script>alert('Anda berhasil melakukan pembelian');location='nota.php?id=".$id_pembelian."';</script>";
					}
					?>


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

<?php include 'footer.php'; ?>
<script>
	$(document).ready(function(){
		$.ajax({
			url:'dataprovinsi.php',
			success:function(hasil)
			{
				$("select[name=provinsi]").html(hasil);
			}
		})
	});

	$(document).ready(function(){
		$("select[name=provinsi]").on("change",function(){
			var id_provinsi = $(this).val();
			var nama_provinsi = $("option:selected", this).attr("nama");
			$("input[name=nama_provinsi]").val(nama_provinsi);
			$.ajax({
				url:'datakota.php',
				type:'POST',
				data:'idprov='+id_provinsi,
				success:function(hasil)
				{
					$("select[name=kota]").html(hasil);
				}
			});

			$("select[name=ekspedisi]").val(null);
			$("select[name=ongkir]").val(null);
			
			$("input[name=nama_kota]").val(null);
			$("input[name=tipe]").val(null);
			$("input[name=kodepos]").val(null);
			$("input[name=nama_ekspedisi]").val(null);
			$("input[name=nama_paket]").val(null);
			$("input[name=biaya_paket]").val(null);
			$("input[name=lama_paket]").val(null);
		})

	});


	$(document).ready(function(){
		$("select[name=kota]").on("change",function(){

			var nama = $("option:selected",this).attr("nama");
			var kodepos = $("option:selected",this).attr("kodepos");
			var tipe = $("option:selected",this).attr("tipe");

			$("input[name=nama_kota]").val(nama);
			$("input[name=tipe]").val(tipe);
			$("input[name=kodepos]").val(kodepos);
		})
	});

	$(document).ready(function(){
		$.ajax({
			url:'dataekspedisi.php',
			success:function(hasil)
			{
				$("select[name=ekspedisi]").html(hasil);
			}
		})
	});


	$(document).ready(function(){
		$("select[name=ekspedisi]").on("change",function(){
			var nama = $("option:selected",this).attr("nama");
			$("input[name=nama_ekspedisi]").val(nama);
		})
	});

	$(document).ready(function(){
		$("select[name=ekspedisi]").on("change",function(){


			var id_kota = $("select[name=kota]").val();
			var ekspedisi = $("select[name=ekspedisi]").val();
			var total_berat = $("input[name=total_berat]").val();
			$.ajax({
				url:'dataongkir.php',
				type: 'POST',
				data: 'id_kota='+id_kota+'&ekspedisi='+ekspedisi+'&total_berat='+total_berat,
				success:function(hasil)
				{

						// alert(hasil);
						$("select[name=ongkir]").html(hasil);
					}
				})
		})
	});

	$(document).ready(function(){
		$("select[name=ongkir]").on("change",function(){
			var nama = $("option:selected",this).attr("nama");
			var biaya = $("option:selected",this).attr("biaya");
			var lama = $("option:selected",this).attr("lama");

			$("input[name=nama_paket]").val(nama);
			$("input[name=biaya_paket]").val(biaya);
			$("input[name=lama_paket]").val(lama);

			var potongan = $("input[name=potongan]").val();

			if(potongan==""){
				var total_belanja = $("input[name=total_belanja]").val();
				var total_bayar = (parseInt(biaya) + parseInt(total_belanja));
			}else{
				var total_belanja = $("input[name=total_belanja]").val();
				var total_bayar = (parseInt(biaya) + parseInt(total_belanja))-parseInt(potongan);
			}
			$("#total_ongkir").html(biaya);
			$("#total_bayar").html(total_bayar);



		})
	})

</script>

</body>
</html>