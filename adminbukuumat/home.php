<h2>Selamat datang <?php echo $detailadmin['nama_admin']; ?>  di halaman utama</h2>
<hr/>
<h2>Data Pembelian</h2>
<?php
$datapembelian = $pembelian->tampil_pembelian();
$datamutasi = $api_mutasi->mutasi_terakhir();
?>
 <table class="table table-bordered" id="thetable">
 	<thead>
 		<tr>
 			
 		<th>No. </th>
 		<th>Tanggal</th>
 		<th>Pelangggan</th>
 		<th>Status</th>
 		<th>Total Pembelian</th>
 		<th>Aksi</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($datapembelian as $key => $value): ?>
 			
 		<tr>
 			<td><?php echo $key+=1; ?></td>
 			<td><?php echo $value['tgl_beli']; ?></td>
 			<td><?php echo $value['nama_penerima'] ?></td>
 			<td><?php echo $value['status_pembelian']; ?></td>
 			<td class='text-right'>Rp. <?php echo number_format($total = $value['total_harga']+$value['biaya_ongkir']+$value['kode_unik']-$value['potongan']); ?>,-</td>
 			
 			<td>
 				<a href="index.php?halaman=nota&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-info btn-sm">Nota</a>
 				<?php if ($value['status_pembelian']!="Lunas"): ?>
 				<a href="index.php?halaman=pembayaran&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-success btn-sm">Pembayaran</a>
 				<?php endif ?>
 			</td>
 		</tr>
 		<?php endforeach ?>
 	</tbody>
 </table>