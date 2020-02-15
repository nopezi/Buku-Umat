<h2>Data Pembayaran</h2>

<?php 

$id_pembelian = $_GET['id'];

$detailbayar = $pembelian->ambil_pembayaran($id_pembelian);



 ?>

 <?php if (empty($detailbayar)): ?>
 	<div class="alert alert-danger">Pelanggan belum melakukan pembayaran/belum input pembayaran</div>

<?php else: ?>

 <div class="row">
 	<div class="col-md-6">
 		<table class="table">
 			<tr>
 				<td>Nama</td>
 				<td><?php echo $detailbayar['nama_akun']; ?></td>
 			</tr>
 			<tr>
 				<td>Bank</td>
 				<td><?php echo $detailbayar['nama_bank']; ?></td>
 			</tr>
 			<tr>
 				<td>Jumlah</td>
 				<td>Rp. <?php echo number_format($detailbayar['jumlah_transfer']); ?></td>
 			</tr>
 			<tr>
 				<td>Tanggal Bayar</td>
 				<td><?php echo $detailbayar['tgl_transfer']; ?></td>
 			</tr>
 			<tr>
 				<td>Tanggal Konfirmasi </td>
 				<td><?php echo $detailbayar['tgl_konfirmasi']; ?></td>
 			</tr>
 		</table>

 		<form method="POST">
 			<div class="row">
 				<div class="col-md-4">
 					<div class="form-group">
 						<label>Status Pembelian</label>
 						<select name="status_pembelian" class="form-control">
 							<option value="Konfirmasi">Konfirmasi</option>
 							<option value="Lunas">Lunas</option>
 						</select>
 					</div>
 				</div>
 					<div class="col-md-4">
 						<div class="form-group">
 							<label >No. Resi</label>
 							<input type="text" name="no_resi" class="form-control">
 						</div>
 					</div>
 					<div class="col-md-2">
 						<div class="form-group">
 							<label for="">&nbsp;</label>
 							<button class="btn btn-primary" name="simpan">Simpan</button>
 						</div>
 					</div>
 				</div>
 		</form>
 		<?php 
 		if(isset($_POST['simpan'])){
 			$pembelian->ubah_pembelian($_POST['status_pembelian'], $_POST['no_resi'], $_GET['id']);
 			echo "<script>alert('Status pembayaran berhasil di ubah');location='index.php?halaman=pembelian';</script>";
 		}

 		 ?>
 	</div>
 	<div class="col-md-6">
 		<img src="../assets/bukti/<?php echo $detailbayar['struk_transfer']; ?>" class="img-responsive" width="200">
 	</div>
 </div>
 <?php endif ?>