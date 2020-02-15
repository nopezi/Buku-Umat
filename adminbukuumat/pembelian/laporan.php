<h2>Laporan</h2>

<?php 

$bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

$datapembelian = $pembelian->laporan_pembelian();
if(isset($_POST['cari'])){
	if(empty($_POST['bulan'])){
		$datapembelian = $pembelian->cari_laporan_pembelian_tahun($_POST['tahun']);
	}else{
		$datapembelian = $pembelian->cari_laporan_pembelian($_POST['bulan'], $_POST['tahun']);
	}
}
 ?>

 <form method="POST" class="form-inline">
 	<div class="form-group">
 		<select name="bulan" class="form-control">
 			<option value="">- Pilih Bulan -</option>
 			<?php foreach ($bulan as $no_bulan => $nama_bulan): ?>
 				<option value="<?php echo $no_bulan+1 ?>">
 					<?php echo $nama_bulan; ?>
 				</option>
 			<?php endforeach ?>
 		</select>
 	</div>

 	<div class="form-group">
	<select name="tahun" class="form-control" required="">
		<option value="">- Pilih Tahun - </option>
		<?php for ($i=2018; $i<=date('Y');$i++): ?>
			<option value="<?php echo $i; ?>"><?php echo $i ?></option>
		<?php endfor ?>
	</select>
	<button class="btn btn-primary" name="cari">Cari</button>
</div>
 </form>
<br>
<?php if (isset($_POST['cari'])): ?>
	<?php if (!empty($_POST['tahun']) AND !empty($_POST['bulan'])): ?>
		<h5>Laporan Bulan <?php echo $bulan[$_POST['bulan']-1];  ?> Tahun <?php echo $_POST['tahun']; ?></h5>
	<?php endif ?>
<?php endif ?>


 <table class="table table-bordered" id="thetable">
 	<thead>
 		<tr>
 			
 		<th>No. </th>
 		<th>Tanggal</th>
 		<th>Pelangggan</th>
 		<th>Total Barang</th>
 		<th>Total Pembelian</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($datapembelian as $key => $value): ?>
 			
 		<tr>
 			<td><?php echo $key+=1; ?></td>
 			<td><?php echo $value['tgl_beli']; ?></td>
 			<td><?php echo $value['nama_penerima']; ?></td>
 			<td class='text-right'>Rp. <?php echo number_format($value['total_harga']); ?>,-</td>
 			<td class='text-right'>Rp. <?php echo number_format($total = $value['total_harga']+$value['biaya_ongkir']+$value['kode_unik']-$value['potongan']); ?>,-
 			
 			</td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
 </table>