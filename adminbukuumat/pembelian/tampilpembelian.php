<h2>Data Pembelian</h2>

<?php 



$datapembelian = $pembelian->tampil_pembelian();



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
 			<td><?php echo $value['total_harga']; ?></td>
 			<td>
 				<a href="index.php?halaman=nota&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-info btn-sm">Nota</a>
 				<?php if ($value['status_pembelian']!="Lunas"): ?>
 				<a href="index.php?halaman=pembayaran&id=<?php echo $datapembelian[0]['id_pembelian']; ?>" class="btn btn-success btn-sm">Pembayaran</a>
 				<?php endif ?>
 			</td>
 		</tr>
 		<?php endforeach ?>

 		<?php
 		echo "<pre>"; 
 		print_r($datapembelian); 
 		echo "</pre>";
 		?>
 	</tbody>
 </table>